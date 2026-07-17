<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TeamController extends Controller
{
    public function index()
    {
        $store = Auth::user()->store;
        $members = $store->users()->paginate(10);
        return view('user.pages.team.index', compact('store', 'members'));
    }

    public function create()
    {
        $member = new User();
        return view('user.pages.team.create', compact('member'));
    }
    public function store(Request $request)
    {
        $store = Auth::user()->store;    // You, 10 minutes ago · Uncommitted changes
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'store_id' => $store->id
        ]);

        return redirect()->route('user.team.index')->with('success', 'Team member created successfully.');
    }

    public function edit(User $member)
    {
        $this->authorizeMember($member);
        return view('user.pages.team.edit', compact('member'));
    }

    public function update(Request $request, User $member)
    {
        $this->authorizeMember($member);
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $member->id,
            'password' => 'nullable|string|confirmed',
        ]);

        $member->name = $data['name'];
        $member->email = $data['email'];
        if (!empty($data['password'])) {
            $member->password = Hash::make($data['password']);
        }

        return redirect()->route('user.team.index')
            ->with('success', 'Member updated successfully');
    }

    public function destroy(User $member)
    {
        $this->authorizeMember($member);
        $member->delete();
        return redirect()->route('user.team.index')->with('success', 'Team member deleted successfully.');
    }

    private function authorizeMember(User $member)
    {
        $store = Auth::user()->store;

        if ($member->store_id !== $store->id) {
            abort(403, 'Unauthorized action.');
        }
    }
}
