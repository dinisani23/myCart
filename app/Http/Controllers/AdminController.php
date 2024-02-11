<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $admins = User::where('type', 'admin')->get();
        return view('/admin/admin', compact('admins'));
    }

    public function registerAdmin()
    {
        return view('/admin/create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$data = $request->all();
        $data = array_merge($request->all(), ['type' => 'admin']);

        User::create($data);

        session()->flash('success', 'Admin is created successfully.');

        return redirect()->route('admin.list');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($adminId)
    {
        //return admin data
        $admin = User::where('id', $adminId)->first();
        return view('/admin/edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $adminId)
    {
        //update name email password la
        //$data = array_merge($request->all(), ['type' => 'admin']);

        $admin = User::where('id', $adminId)->first();

        $admin->fill($request->all());
        $admin->type = 'admin';

        $admin->save();

        //return redirect()->route('admin.list');
        return redirect()->route('admin.list')->with('success', 'Admin updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($userId)
    {
        //delete admin
        //$userId = auth()->user()->id;

        $admin = User::where('id', $userId)->first();

        if($admin)
        {
            $admin->delete();
            session()->flash('success', 'User deleted successfully.');
        }
        else
        {
            session()->flash('error', 'User not found or already deleted.');
        }
        return redirect()->route('admin.list');
    }
}
