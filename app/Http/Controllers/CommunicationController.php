<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactComunication;
use App\Models\ContactNote;
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
        // Retrieve the communication record by ID
        $communication = ContactComunication::findOrFail($id);
        $notes = ContactNote::where('contact_id',$communication->id)->get();        // Pass the data to the edit view
        return view('admin.communication.edit', compact('communication','notes'));
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
    public function destroy($id)
    {
        $note = ContactComunication::findOrFail($id);
    
        // Delete the note
        $note->delete();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'Note deleted successfully!');
    }


    public function contact_delete($id){
        $note = ContactNote::findOrFail($id);
    
        // Delete the note
        $note->delete();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'Note deleted successfully!');
    }

    public function contact(){
        $rows = ContactComunication::paginate(10);
        return view('admin.communication.contact',compact('rows'));
    }
    
    public function contact_person(Request $request){
        $contactData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:contact_comunications,email',
            'dob' => 'required|date',
            'phone_number' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'bussiness' => 'required|string|max:255',
        ]);
    $contact = ContactComunication::create($contactData);
        $note = new ContactNote;
        $note->contact_id = $contact->id;
        $note->note = $request->note;
        $note->save();
    return redirect()->back()->with('success', 'Contact and notes saved successfully.');
    }

    public function contact_update(Request $request, $id)
{
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
    }

    public function updateNote(Request $request, $id)
{
    $note = ContactNote::findOrFail($id);

    $request->validate([
        'note' => 'required|string|max:255',
    ]);

    $note->update([
        'note' => $request->note,
    ]);

    return response()->json(['success' => true]);
}
public function createMore(Request $request, $communicationId)
{
    // Validate the incoming request
    $request->validate([
        'note' => 'required|string|max:255',
    ]);
    // Find the communication record by its ID
    $communication = ContactComunication::findOrFail($communicationId);
    $note = new ContactNote();
    $note->contact_id = $communication->id;
    $note->note = $request->note;
    $note->save();
    // Redirect back with a success message
    return redirect()->back()->with('success', 'Note created successfully!');
}
}
