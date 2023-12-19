<?php

namespace App\Http\Controllers;

use App\Enums\BadgeAwardStatus;
use App\Exceptions\GrantingBadgeException;
use App\Models\Badge;
use App\Models\BadgeAward;
use App\Models\GotBookEntry;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BadgeAwardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $badgeAwards = BadgeAward::all();
        return response()->json($badgeAwards);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'badge_id' => 'required|exists:badges,id',
            'grant_date' => 'required|date',
            'badge_award_status' => 'required|string',
            'points_from_previous_badge' => 'integer|nullable',
        ]);

        $badgeAward = new BadgeAward();
        $badgeAward->user_id = $validatedData['user_id'];
        $badgeAward->badge_id = $validatedData['badge_id'];
        $badgeAward->grant_date = $validatedData['grant_date'];
        $badgeAward->badge_award_status = $validatedData['badge_award_status'];
        $badgeAward->points_from_previous_badge = $validatedData['points_from_previous_badge'];
        $badgeAward->save();

        return response()->json($badgeAward);
    }

    /**
     * Display the specified resource.
     */
    public function show(BadgeAward $badgeAward): JsonResponse
    {
        return response()->json($badgeAward);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BadgeAward $badgeAward): JsonResponse
    {
        $validatedData = $request->validate([
            'user_id' => 'exists:users,id',
            'badge_id' => 'exists:badges,id',
            'grant_date' => 'date',
            'badge_award_status' => 'string',
            'points_from_previous_badge' => 'integer|nullable',
        ]);

        $badgeAward->fill($validatedData);
        $badgeAward->save();

        return response()->json($badgeAward);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BadgeAward $badgeAward)
    {
        $badgeAward->delete();
        return response()->json(['message' => 'Badge award deleted']);
    }

    public function passAwardToLeaderVerification(BadgeAward $badgeAward): JsonResponse
    {
        try {
            if ($badgeAward->badge_award_status !== BadgeAwardStatus::COLLECTING_POINTS->name) {
                throw new GrantingBadgeException("Wrong badge award status - should be COLLECTING_POINTS");
            }
            if ($badgeAward->grant_date !== null) {
                throw new GrantingBadgeException("This badge award was already granted");
            }

            $badge = Badge::query()
                ->where('id', $badgeAward->badge_id)
                ->get()
                ->first();

            $entries = GotBookEntry::query()
                ->with('section')
                ->where('badge_award_id', $badgeAward->id)
                ->get();

            $tourist = User::query()
                ->where('id', $badgeAward->user_id)
                ->get()
                ->first();

            $badgeAwards = BadgeAward::query()
                ->where('user_id', $tourist->id)
                ->whereYear('grant_date', now()->year)
                ->get();

            if ($badgeAwards->count() > 0) {
                throw new GrantingBadgeException("Another badge award was already granted this year");
            }

            $sumOfPoints = 0;
            foreach ($entries as $entry) {
                $sumOfPoints += $entry->b_to_a
                    ? $entry->section->badge_points_b_to_a
                    : $entry->section->badge_points_a_to_b;
            }

            $pointsToNextBadge = $badgeAward->points_from_previous_badge
                + $sumOfPoints - $badge->point_threshold;

            if ($pointsToNextBadge < 0) {
                throw new GrantingBadgeException("Not enough points to grant badge");
            }

            $badgeAward->badge_award_status = BadgeAwardStatus::WAITING_FOR_LEADER_VERIFICATION->name;
            $badgeAward->save();

            return response()->json([
                'message' => 'Badge award passed to leader verification',
                'badge' => $badge,
                'badge_award' => $badgeAward,
                'entries' => $entries,
                'tourist' => $tourist,
                'points_to_next_badge' => $pointsToNextBadge
            ]);
        } catch (GrantingBadgeException $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'badge' => $badge ?? null,
                'badge_award' => $badgeAward,
                'entries' => $entries ?? null,
                'tourist' => $tourist ?? null,
                'points_to_next_badge' => $pointsToNextBadge ?? null
            ], 400);
        }
    }

    public function verifyAwardByLeader(BadgeAward $badgeAward): JsonResponse
    {
        try {
            if ($badgeAward->badge_award_status !== BadgeAwardStatus::WAITING_FOR_LEADER_VERIFICATION->name) {
                throw new GrantingBadgeException("Wrong badge award status - should be WAITING_FOR_LEADER_VERIFICATION");
            }

            if ($badgeAward->grant_date !== null) {
                throw new GrantingBadgeException("This badge award was already granted");
            }

            $badge = Badge::query()
                ->where('id', $badgeAward->badge_id)
                ->get()
                ->first();

            $entries = GotBookEntry::query()
                ->with('section')
                ->where('badge_award_id', $badgeAward->id)
                ->get();

            $tourist = User::query()
                ->where('id', $badgeAward->user_id)
                ->get()
                ->first();

            $badgeAwards = BadgeAward::query()
                ->where('user_id', $tourist->id)
                ->whereYear('grant_date', now()->year)
                ->get();

            if ($badgeAwards->count() > 0) {
                throw new GrantingBadgeException("Another badge award was already granted this year");
            }

            $sumOfPoints = 0;
            foreach ($entries as $entry) {
                $sumOfPoints += $entry->b_to_a
                    ? $entry->section->badge_points_b_to_a
                    : $entry->section->badge_points_a_to_b;
            }

            $pointsToNextBadge = $badgeAward->points_from_previous_badge
                + $sumOfPoints - $badge->point_threshold;

            if ($pointsToNextBadge < 0) {
                throw new GrantingBadgeException("Not enough points to grant badge");
            }

            $badgeAward->badge_award_status = BadgeAwardStatus::VERIFIED_BY_LEADER->name;
            $badgeAward->grant_date = now();
            $badgeAward->save();

            $newBadgeAward = new BadgeAward();

            if ($badge->next_badge !== null) {
                $newBadgeAward->badge_id = $badge->next_badge;
                $newBadgeAward->user_id = $badgeAward->user_id;
                $newBadgeAward->badge_award_status = BadgeAwardStatus::COLLECTING_POINTS->name;
                $newBadgeAward->points_from_previous_badge = $pointsToNextBadge;
                $newBadgeAward->save();
            }

             return response()->json([
                'message' => 'Badge award verified by leader',
                'badge' => $badge,
                'badge_award' => $badgeAward,
                'entries' => $entries,
                'tourist' => $tourist,
                'points_to_next_badge' => $pointsToNextBadge
            ]);
        } catch (GrantingBadgeException $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'badge' => $badge ?? null,
                'badge_award' => $badgeAward,
                'entries' => $entries ?? null,
                'tourist' => $tourist ?? null,
                'points_to_next_badge' => $pointsToNextBadge ?? null
            ], 400);
        }
    }

    public function getBadgeAwardsForGotBook(): JsonResponse
    {
        $badgeAwards = BadgeAward::query()
            ->with(['badge', 'tourist.gotBook', 'entries', 'entries.section'])
            ->where('user_id', Auth::user()->id)
            ->orderBy('grant_date', 'desc')
            ->get();

        return response()->json($badgeAwards);
    }

}
