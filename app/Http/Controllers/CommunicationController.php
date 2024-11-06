<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactComunication;
use App\Models\ContactNote;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;
class CommunicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            // Retrieve the communication record by ID
            $communication = ContactComunication::findOrFail($id);
    
            // Retrieve the associated notes
            $notes = ContactNote::where('contact_id', $communication->id)->get();
    
            // Pass the data to the edit view
            return view('admin.communication.edit', compact('communication', 'notes'));
    
        } catch (ModelNotFoundException $e) {
            // If communication or notes are not found, redirect back with an error message
            return redirect()->back()->with('error', 'Communication or Notes not found.');
        } catch (\Exception $e) {
            // Catch any other exceptions
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again later.');
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
    try {
        // Find the contact communication record by ID
        $note = ContactComunication::findOrFail($id);
        
        // Delete the note
        $note->delete();
        
        // Redirect back with success message
        return redirect()->back()->with('success', 'Note deleted successfully!');
        
    } catch (ModelNotFoundException $e) {
        // Handle the case where the note was not found
        return redirect()->back()->with('error', 'Note not found.');
    } catch (\Exception $e) {
        // Handle any other unexpected errors
        return redirect()->back()->with('error', 'An error occurred while deleting the note. Please try again later.');
    }
}

public function contact_delete($id)
{
    try {
        // Attempt to find the note by ID
        $note = ContactNote::findOrFail($id);
        
        // Delete the note
        $note->delete();
        
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Note deleted successfully!');
        
    } catch (ModelNotFoundException $e) {
        // Handle the case where the note is not found
        return redirect()->back()->with('error', 'Note not found.');
    } catch (Exception $e) {
        // Handle any other unexpected errors
        return redirect()->back()->with('error', 'An error occurred while deleting the note. Please try again later.');
    }
}

    public function contact(){
        try {
            // Retrieve all rows with pagination
            $rows = ContactComunication::paginate(10);
    
            // Return the view with the paginated rows
            return view('admin.communication.contact', compact('rows'));
    
        } catch (Exception $e) {
            // If an error occurs, catch the exception and return an error message
            return redirect()->back()->with('error', 'An error occurred while retrieving contacts. Please try again later.');
        }
    }
    
    public function contact_person(Request $request){
        try {
            // Validate the contact data
            $contactData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:contact_comunications,email',
                'dob' => 'required|date',
                'phone_number' => 'required|string|max:15',
                'address' => 'required|string|max:255',
                'bussiness' => 'required|string|max:255',
            ]);
    
            // Create a new contact
            $contact = ContactComunication::create($contactData);
    
            // Create a new note and associate it with the contact
            $note = new ContactNote();
            $note->contact_id = $contact->id;
            $note->note = $request->note;
            $note->save();
    
            // Redirect back with a success message
            return redirect()->back()->with('success', 'Contact and notes saved successfully.');
    
        } catch (Exception $e) {
            // If an error occurs, catch the exception and display a generic error message
            return redirect()->back()->with('error', 'An error occurred while saving the contact and notes. Please try again later.');
        }
    }

    public function contact_update(Request $request, $id)
    {
        try {
            // Retrieve the contact by ID
            $contact = ContactComunication::findOrFail($id);
    
            // Validate contact data
            $contactData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:contact_comunications,email,' . $id,
                'dob' => 'required|date',
                'phone_number' => 'required|string|max:15',
                'address' => 'required|string|max:255',
                'bussiness' => 'required|string|max:255',
            ]);
    
            // Update the contact with validated data
            $contact->update($contactData);
    
            // Redirect back with a success message
            return redirect()->back()->with('success', 'Contact updated successfully.');
    
        } catch (Exception $e) {
            // If an error occurs, catch the exception and display a generic error message
            return redirect()->back()->with('error', 'An error occurred while updating the contact. Please try again later.');
        }
    }

    public function updateNote(Request $request, $id)
    {
        try {
            // Find the note by ID
            $note = ContactNote::findOrFail($id);
    
            // Validate the note data
            $request->validate([
                'note' => 'required|string|max:255',
            ]);
    
            // Update the note with the new data
            $note->update([
                'note' => $request->note,
            ]);
    
            // Return a success response in JSON format
            return response()->json(['success' => true, 'message' => 'Note updated successfully.']);
    
        } catch (Exception $e) {
            // If an error occurs, return an error response
            return response()->json(['success' => false, 'message' => 'An error occurred while updating the note. Please try again later.']);
        }
    }
    public function createMore(Request $request, $communicationId)
    {
        try {
            // Validate the incoming request
            $request->validate([
                'note' => 'required|string|max:255',
            ]);
    
            // Find the communication record by its ID
            $communication = ContactComunication::findOrFail($communicationId);
    
            // Create a new note and associate it with the communication
            $note = new ContactNote();
            $note->contact_id = $communication->id;
            $note->note = $request->note;
            $note->save();
    
            // Redirect back with a success message
            return redirect()->back()->with('success', 'Note created successfully!');
        } catch (Exception $e) {
            // Handle any error that occurs during the process
            return redirect()->back()->with('error', 'An error occurred while creating the note. Please try again later.');
        }
    }
}
