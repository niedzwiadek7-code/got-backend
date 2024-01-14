<?php

namespace App\Http\Controllers;

use App\Enums\BadgeAwardStatus;
use App\Enums\GotBookEntryStatus;
use App\Exceptions\GrantingBadgeException;
use App\Exceptions\VerifyingEntryException;
use App\Models\Badge;
use App\Models\BadgeAward;
use App\Models\GotBookEntry;
use App\Models\MountainGroup;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Finder\Exception\AccessDeniedException;

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

    // TODO Refactor to TRW verification
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

    // TODO Refactor to TRW verification
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

    public function verifyBookEntryByLeader(GotBookEntry $gotBookEntry): JsonResponse
    {
        try {
            $userWithRole = User::whereHas('roles', function ($query) {
                $query->where('name', 'LEADER');
            })->find(Auth::user()->id);

            if (!$userWithRole) {
                throw new AccessDeniedException("User has no LEADER authority");
            }

            $section = $gotBookEntry->section()->first();

            $mountainGroupPermissionExists = MountainGroup::query()
                ->join('mountain_ranges', 'mountain_groups.id', '=', 'mountain_ranges.mountain_group_id')
                ->join('mountain_group_user', 'mountain_groups.id', '=', 'mountain_group_user.mountain_group_id')
                ->where('mountain_ranges.id', '=', $section->mountainRange()->first()->id)
                ->where('mountain_group_user.user_id', '=', Auth::user()->id)
                ->exists();

            if (!$mountainGroupPermissionExists) {
                throw new AccessDeniedException("Leader has no permission in this mountain group");
            }

            if ($gotBookEntry->status !== GotBookEntryStatus::WAITING_FOR_LEADER_VERIFICATION->name) {
                throw new VerifyingEntryException("Wrong book entry status - should be WAITING_FOR_LEADER_VERIFICATION");
            }

            $gotBookEntry->status = GotBookEntryStatus::VERIFIED_BY_LEADER->name;
            $gotBookEntry->save();

            return response()->json([
                'message' => 'Badge award verified by leader',
                'entry' => $gotBookEntry,
            ]);
        } catch (VerifyingEntryException $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'entry' => $gotBookEntry,
            ], 400);
        } catch (AccessDeniedException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 403);
        }
    }

    public function getBadgeAwardsForVerification(): JsonResponse
    {
        $userId = Auth::user()->id;
        $badgeAwards = BadgeAward::query()
            ->with(['badge', 'tourist', 'tourist.gotBook', 'entries', 'entries.section'])
            ->whereExists(function ($query) use ($userId) {
                $query->select(DB::raw(1))
                    ->from('got_book_entries')
                    ->join('sections as s', 'got_book_entries.section_id', '=', 's.id')
                    ->join('mountain_ranges as mr', 's.mountain_range_id', '=', 'mr.id')
                    ->join('mountain_group_user as mgu', 'mr.mountain_group_id', '=', 'mgu.mountain_group_id')
                    ->join('badge_awards as ba', 'got_book_entries.badge_award_id', '=', 'ba.id')
                    ->where('mgu.user_id', $userId)
                    ->where('got_book_entries.status', 'WAITING_FOR_LEADER_VERIFICATION')
                    ->whereColumn('got_book_entries.badge_award_id', 'badge_awards.id');
            })
            ->orderBy('grant_date', 'desc')
            ->get();

        return response()->json($badgeAwards);
    }

}
