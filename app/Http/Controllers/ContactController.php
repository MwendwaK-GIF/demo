<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Group; // Don't forget to import the Group model

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        $groups = Group::all();
        return view('contacts.index', compact('contacts', 'groups'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:contacts|max:255',
            'group_id' => 'required', // Ensure a group is selected
        ]);

        Contact::create($validatedData);

        return redirect('/contacts')->with('success', 'Contact added successfully!');
    }


    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.show', compact('contact'));
    }

    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        $groups = Group::all(); // Fetch all groups
        return view('contacts.edit', compact('contact', 'groups'));
    }


   public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'group_id' => 'required', // Ensure a group is selected
        ]);

        $contact = Contact::findOrFail($id);
        $contact->update($validatedData);

        return redirect('/contacts')->with('success', 'Contact updated successfully!');
    }


    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect('/contacts')->with('success', 'Contact deleted successfully!');
    }
}
