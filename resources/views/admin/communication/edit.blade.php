<!-- Extends template page-->
@extends('admin.layout.header')
<!-- Specify content -->
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title fx-20">Contact Edit</h2>
                <a href="{{ route('communication.contact.person')}}" class="btn btn-primary float-end">Contact List</a>
            </div>
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <div class="card-body">
                <div class="form-validation">
                    <form action="{{ route('contact.update',$communication->id)}}" method="POST" class="row">
                        @csrf()
                        @method('PUT')
                        <div class="col-md-4 mt-2">
                            <label for="validationCustom01" class="form-label">Name</label>
                            <input type="text" class="form-control" id="validationCustom01" name="name" value="{{$communication->name}}" required>
                        
                          </div>
                          <div class="col-md-4 mt-2">
                            <label for="validationCustom02" class="form-label">Email</label>
                            <input type="email" class="form-control" id="validationCustom02" name="email" value="{{$communication->email}}" required>
                           
                          </div>
                          <div class="col-md-4 mt-2">
                            <label for="validationCustom02" class="form-label">DOB</label>
                            <input type="date" class="form-control" id="validationCustom02" name="dob" value="{{$communication->dob}}" required>
                          
                          </div>
                          <div class="col-md-4 mt-2">
                            <label for="validationCustom02" class="form-label">Phone Number</label>
                            <input type="number" class="form-control" id="validationCustom02" name="phone_number" value="{{$communication->phone_number}}" required>
                           
                          </div>
                          <div class="col-md-4 mt-2">
                            <label for="validationCustom02" class="form-label">Address</label>
                            <input type="text" class="form-control" id="validationCustom02" name="address" value="{{$communication->address}}" required>
                           
                          </div>
                          <div class="col-md-4 mt-2">
                            <label for="validationCustom02" class="form-label">Bussiness</label>
                            <input type="text" class="form-control" id="validationCustom02" name="bussiness" value="{{$communication->bussiness}}" required>
                          </div>
                          <div class="col-12 mt-3">
                            <button class="btn btn-primary" type="submit">Edit Person</button>
                          </div>
                    </form>
                    <form action="{{ route('contact.notes.create.more',$communication->id)}}" method="POST" class="row">
                        @csrf()
                        @method('POST')
                        <div class="col-md-12 mt-3">
                            <div class="form-floating">
                              <textarea class="form-control" name="note" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                              <label for="floatingTextarea">Create Note</label>
                            </div>
                          </div>
                          <div class="col-12 mt-3">
                            <button class="btn btn-primary" type="submit">Create Notes</button>
                          </div>
                    </form>
                    <h5 class="mt-4">
                        History Notes
                    </h5>
                    <table id="example4" class="display table" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>Contact</th>
                                <th>Note</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notes as $note)
                                <tr>
                                    <td>{{ $note->contact->name }}</td>
                                    <td>
                                        <span class="note-text" id="note-text-{{ $note->id }}">{{ $note->note }}</span>
                                        <textarea class="note-edit" id="note-edit-{{ $note->id }}" style="display: none;">{{ $note->note }}</textarea>
                                    </td>
                                    <td>
                                        <button class="edit-btn btn btn-primary" onclick="editNote({{ $note->id }})"><i class="fa-solid fa-pen-to-square"></i></button>
                                        <button class="save-btn btn btn-primary" onclick="saveNote({{ $note->id }})" style="display: none;">Save</button>
                                        <form action="{{ route('contact.notes.delete', $note->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function editNote(id) {
    // Hide the note text and show the textarea
    document.getElementById(`note-text-${id}`).style.display = 'none';
    document.getElementById(`note-edit-${id}`).style.display = 'block';
    
    // Show the Save button and hide the Edit button
    document.querySelector(`.edit-btn[onclick="editNote(${id})"]`).style.display = 'none';
    document.querySelector(`.save-btn[onclick="saveNote(${id})"]`).style.display = 'inline-block';
}

function saveNote(id) {
    // Get the updated note content
    let updatedNote = document.getElementById(`note-edit-${id}`).value;

    // Make an AJAX request to update the note
    fetch(`/admin/notes/${id}/update`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ note: updatedNote })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Update the note text and toggle back to view mode
            document.getElementById(`note-text-${id}`).textContent = updatedNote;
            document.getElementById(`note-text-${id}`).style.display = 'block';
            document.getElementById(`note-edit-${id}`).style.display = 'none';
            
            // Show the Edit button and hide the Save button
            document.querySelector(`.edit-btn[onclick="editNote(${id})"]`).style.display = 'inline-block';
            document.querySelector(`.save-btn[onclick="saveNote(${id})"]`).style.display = 'none';
        } else {
            alert('Error updating note');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Failed to update note');
    });
}

</script>
@stop