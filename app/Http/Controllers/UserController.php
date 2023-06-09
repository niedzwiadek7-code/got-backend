<?php

namespace App\Http\Controllers;

use App\Models\MountainGroup;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUserWithMountainGroups(User $user)
    {
        $role = 'LEADER';
        $users = User::with(['mountainGroups' => function ($query) {
            $query->withPivot('assignment_date');
        }])
            ->whereHas('roles', function ($query) use ($role) {
                $query->where('name', $role);
            })
            ->where('id', '=', $user->id)
            ->get();

        return response()->json($users);
    }

    public function getAllUsersWithMountainGroups()
    {
        $role = 'LEADER';
        $users = User::with(['mountainGroups' => function ($query) {
            $query->withPivot('assignment_date');
        }])
            ->whereHas('roles', function ($query) use ($role) {
                $query->where('name', $role);
            })
            ->get();

        return response()->json($users);
    }


    public function getUsersWithRole(Request $request)
    {
        $role = $request->input('role');
        $users = User::whereHas('roles', function ($query) use ($role) {
            $query->where('name', $role);
        })->get();

        return response()->json($users);
    }

    public function assignLeaderPermission(Request $request)
    {
        $mountainGroupId = $request->input('mountain_group_id');
        $userId = $request->input('user_id');
        $assignmentDate = $request->input('assignment_date');

        $mountainGroup = MountainGroup::find($mountainGroupId);
        $user = User::find($userId);

        if ($mountainGroup &&
            $user &&
            $user->hasRole('LEADER') &&
            $assignmentDate) {
            if (!$user->mountainGroups->contains($mountainGroupId)) {
                $user->mountainGroups()->attach($mountainGroupId, ['assignment_date' => $assignmentDate]);
                return response()->json(['message' => 'Uprawnienie zostało przyznane przodownikowi.']);
            }
        } else {
            return response()->json(['error' => 'Nie mozna przypisac uprawnienia przodownikowi.'], 400);
        }
    }

    public function revokeLeaderPermission(Request $request)
    {
        $mountainGroupId = $request->input('mountain_group_id');
        $userId = $request->input('user_id');

        $mountainGroup = MountainGroup::find($mountainGroupId);
        $user = User::find($userId);

        if ($mountainGroup &&
            $user &&
            $user->hasRole('LEADER')) {
            $user->mountainGroups()->detach($mountainGroup);
            return response()->json(['message' => 'Uprawnienie zostało zabrane przodownikowi.']);
        } else {
            return response()->json(['error' => 'Nie udało się zabrać roli przodownikowi.'], 400);
        }
    }

    public function assignRole(Request $request)
    {
        $roleId = $request->input('role_id');
        $userId = $request->input('user_id');

        $role = Role::find($roleId);
        $user = User::find($userId);

        if ($role && $user) {
            $user->assignRole($role);
            return response()->json(['message' => 'Rola zostala przypisana uzytkownikowi.']);
        } else {
            return response()->json(['error' => 'Nie udało się przypisac roli uzytkownikowi.'], 400);
        }
    }

    public function removeRole(Request $request)
    {
        $roleId = $request->input('role_id');
        $userId = $request->input('user_id');

        $role = Role::find($roleId);
        $user = User::find($userId);

        if ($role && $user) {
            $user->revokeRole($role);
            return response()->json(['message' => 'Rola zostala usunieta uzytkownikowi.']);
        } else {
            return response()->json(['error' => 'Nie udało się usunac roli uzytkownikowi.'], 400);
        }
    }


}
