<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RoleController extends Controller
{
    /**
     * Create a new role.
     *
     * @param  Request  $request
     * @return Response
     */
    public function createRole(Request $request): Response
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:roles',
            'tatra_podtatrze' => 'boolean',
            'tatra_slowackie' => 'boolean',
            'beskidy_zachodnie' => 'boolean',
            'beskidy_wschodnie' => 'boolean',
            'gory_swietokrzyskie' => 'boolean',
            'sudety' => 'boolean',
            'słowacja' => 'boolean',
        ]);

        // Konwertuj wartości pól boolean do typu bool
        $validatedData['tatra_podtatrze'] = (bool) $validatedData['tatra_podtatrze'];
        $validatedData['tatra_slowackie'] = (bool) $validatedData['tatra_slowackie'];
        $validatedData['beskidy_zachodnie'] = (bool) $validatedData['beskidy_zachodnie'];
        $validatedData['beskidy_wschodnie'] = (bool) $validatedData['beskidy_wschodnie'];
        $validatedData['gory_swietokrzyskie'] = (bool) $validatedData['gory_swietokrzyskie'];
        $validatedData['sudety'] = (bool) $validatedData['sudety'];
        $validatedData['słowacja'] = (bool) $validatedData['słowacja'];

        $role = Role::create($validatedData);

        return response(['message' => 'Rola stworzona pomyślnie', 'role' => $role], 201);
    }


    /**
     * Display the specified role.
     *
     * @return Response
     */
    public function showRoles(): Response
    {
        $roles = Role::all();

    return response(['roles' => $roles], 200);
    }

    /**
     * Update an existing role.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function updateRole(Request $request, $id): Response
    {
        $role = Role::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|unique:roles,name,'.$role->id,
            'tatra_podtatrze' => 'boolean',
            'tatra_slowackie' => 'boolean',
            'beskidy_zachodnie' => 'boolean',
            'beskidy_wschodnie' => 'boolean',
            'gory_swietokrzyskie' => 'boolean',
            'sudety' => 'boolean',
            'słowacja' => 'boolean',
        ]);

         // Konwertuj wartości pól boolean do typu bool
        $validatedData['tatra_podtatrze'] = (bool) $validatedData['tatra_podtatrze'];
        $validatedData['tatra_slowackie'] = (bool) $validatedData['tatra_slowackie'];
        $validatedData['beskidy_zachodnie'] = (bool) $validatedData['beskidy_zachodnie'];
        $validatedData['beskidy_wschodnie'] = (bool) $validatedData['beskidy_wschodnie'];
        $validatedData['gory_swietokrzyskie'] = (bool) $validatedData['gory_swietokrzyskie'];
        $validatedData['sudety'] = (bool) $validatedData['sudety'];
        $validatedData['słowacja'] = (bool) $validatedData['słowacja'];

        $role->update($validatedData);

        return response(['message' => 'Rola zaktualizowana pomyślnie', 'role' => $role], 200);
    }

    /**
     * Delete a role.
     *
     * @param  int  $id
     * @return Response
     */
    public function deleteRole($id): Response
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return response(['message' => 'Rola usunięta pomyślnie'], 200);
    }
}

