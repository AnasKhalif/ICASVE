<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Traits\FlashAlert;

class UserController extends Controller
{
    use FlashAlert;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rolesToDisplay = ['indonesia-presenter', 'foreign-presenter', 'indonesia-participants', 'foreign-participants'];
        $users = User::whereHas('roles', function ($query) use ($rolesToDisplay) {
            $query->whereIn('name', $rolesToDisplay);
        })->with('roles')->paginate(10);
        return view('participants.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::whereIn('name', [
            'indonesia-presenter',
            'foreign-presenter',
            'indonesia-participants',
            'foreign-participants'
        ])->get();
        return view('participants.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'institution' => ['required', 'string', 'max:255'],
            'job_title' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:15', 'regex:/^[0-9\-\+\(\)\s]*$/'],
            'attendance' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role_id' => ['required']
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'institution' => $validatedData['institution'],
            'job_title' => $validatedData['job_title'],
            'phone_number' => $validatedData['phone_number'],
            'attendance' => $validatedData['attendance'],
            'password' => Hash::make($validatedData['password']),
        ]);

        $role = Role::find($validatedData['role_id']);

        $user->roles()->attach($role);

        return redirect()->route('admin.participant.index')->with($this->alertCreated());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $user = User::findOrFail($id);
            $roles = Role::whereIn('name', [
                'indonesia-presenter',
                'foreign-presenter',
                'indonesia-participants',
                'foreign-participants'
            ])->get();

            return view('participants.edit', compact('user', 'roles'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.participant.index')->with($this->alertNotFound());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);

            $validatedData = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
                'institution' => ['required', 'string', 'max:255'],
                'job_title' => ['required', 'string', 'max:255'],
                'phone_number' => ['required', 'string', 'max:15', 'regex:/^[0-9\-\+\(\)\s]*$/'],
                'attendance' => ['required', 'string', 'max:255'],
                'role_id' => ['required']
            ]);

            $user->update([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'institution' => $validatedData['institution'],
                'job_title' => $validatedData['job_title'],
                'phone_number' => $validatedData['phone_number'],
                'attendance' => $validatedData['attendance']
            ]);

            $roles = $user->roles;

            foreach ($roles as $role) {
                $user->roles()->detach($role);
            }

            $role = Role::find($validatedData['role_id']);

            $user->roles()->attach($role);

            return redirect()->route('admin.participant.index')->with($this->alertUpdated());
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.participant.index')->with($this->alertNotFound());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);

            $roles = $user->roles;

            foreach ($roles as $role) {
                $user->roles()->detach($role);
            }

            $user->delete();

            return redirect()->route('admin.participant.index')->with($this->alertDeleted());
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.participant.index')->with($this->alertNotFound());
        }
    }
}
