<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::all();
        return view('groups.index', compact('groups'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Group::create($validatedData);

        return redirect('/groups')->with('success', 'Group added successfully!');
    }

    public function show($id)
    {
        $group = Group::with('contacts')->findOrFail($id); // Eager load contacts
        return view('groups.show', compact('group'));
    }


    public function edit($id)
    {
        $group = Group::findOrFail($id);
        return view('groups.edit', compact('group'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $group = Group::findOrFail($id);
        $group->update($validatedData);

        return redirect('/groups')->with('success', 'Group updated successfully!');
    }

    public function destroy($id)
    {
        $group = Group::findOrFail($id);
        $group->delete();

        return redirect('/groups')->with('success', 'Group deleted successfully!');
    }
    public function addMembersForm(Group $group)
    {
        return view('groups.add_members_form', compact('group'));
    }

}
