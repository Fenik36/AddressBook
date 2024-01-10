<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;




class ContactsController extends Controller
{
    // Show all contacts
    public function index()
    {
        $user = Auth::user();

        if ($user) {
            $contacts = $user->contacts()
                ->latest()
                ->filter(request(['tag', 'search']))
                ->paginate(50);
        } else {
            // User is not authenticated, handle accordingly
            $contacts = collect();
        }

        return view('contacts.index', [
            'contacts' => $contacts,
        ]);
    }

    //Show single contact
    public function show(Contacts $contact)
    {
        return view('contacts.show', [
            'contact' => $contact
        ]);
    }

    // Show Edit Form
    public function edit(Contacts $contact)
    {
        return view('contacts.edit', ['contact' => $contact]);
    }

    // Update contact Data
    public function update(Request $request, Contacts $contact)
    {
        // Make sure logged in user is owner
        if ($contact->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'firstname'   => 'required',
            'middlename'  => 'nullable',
            'lastname'    => 'nullable',
            'location'    => 'nullable',
            'company'     => 'nullable',
            'email'       => 'nullable|email',
            'tags'        => 'nullable',
            'comment'     => 'nullable',
            'phonenumbers' => 'required',
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }


        $contact->update($formFields);

        return back()->with('message', 'Contact updated successfully!');
    }

    // Show Create Form
    public function create()
    {
        return view('contacts.create');
    }

    // Store contact Data
    public function store(Request $request)
    {

        $formFields = $request->validate([
            'firstname'   => 'required',
            'middlename',
            'lastname',
            'location',
            'company',
            'email'       => 'nullable|email|',
            'tags',
            'comment',
            'phonenumbers' => 'required',


        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Contacts::create($formFields);

        return redirect('/')->with('message', 'Contact created successfully!');
    }
    // Delete contact
    public function destroy(Contacts $contact)
    {
        // Make sure logged in user is owner
        if ($contact->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        if ($contact->logo && Storage::disk('public')->exists($contact->logo)) {
            Storage::disk('public')->delete($contact->logo);
        }
        $contact->delete();
        return redirect('/')->with('message', 'contact deleted successfully');
    }
    // Manage contacts
    public function manage()
    {
        return view('contacts.manage', ['contacts' => auth()->user()->contacts()->get()]);
    }




    //export contacts
    public function export()
    {
        $user = Auth::user();

        $data = $user->contacts()->get();




        foreach ($data as $contact) {
            $vCardData = "BEGIN:VCARD\n";
            $vCardData .= "FN:" . $contact['FirstName'] . " " . $contact['LastName'] . "\n";
            $vCardData .= "N:" . $contact['MiddleName'] . "\n";
            $vCardData .= "TEL:" . $contact['PhoneNumbers'] . "\n";
            $vCardData .= "EMAIL:" . $contact['email'] . "\n";
            $vCardData .= "PHOTO:" . $contact['logo'] . "\n";
            $vCardData .= "ADR:" . $contact['location'] . "\n";
            $vCardData .= "ORG:" . $contact['company'] . "\n";
            $vCardData .= "END:VCARD\n";
            $vCardData .= "\n";           
        }

        // Save the vCard data to the file within the storage disk
        $filename = 'all_contacts.vcf';
        Storage::put('exports/' . $filename, $vCardData);

        // Provide a download link to the user
        return response()->download(storage_path('app/exports/' . $filename), $filename, [
            'Content-Type' => 'text/vcard',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ]);
    }
}
