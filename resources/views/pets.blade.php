@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (Session::has('message'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
            </div>
            @endif
            @if (Session::has('error'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('error') }}
            </div>
            @endif

            <div>
                <a class="btn btn-sm btn-primary" href="/add-pet-form">
                    Add New Pet
                </a>
            </div>

            <table class="table" id="pets-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name of Pet</th>
                        <th>Animal Type</th>
                        <th>Owner of Pet</th>
                        <th>Address of Owner</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pets as $pet)
                    <tr>
                        <td>{{ $pet->getId() }}</td>
                        <td>{{ $pet->getName() }}</td>
                        <td>{{ $pet->getType() }}</td>
                        <td>{{ $pet->getOwner() }}</td>
                        <td>{{ $pet->getAddress() }}</td>
                        <td>
                            <a href="/edit-pet/{{ $pet->getId() }}" class="btn btn-primary btn-sm">
                                Edit
                            </a>
                            <a onclick="return confirmDelete()" href="/delete-pet/{{ $pet->getId() }}" class="btn btn-danger btn-sm">
                                Delete
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>

$(document).ready( function () {
    $('#pets-table').DataTable();
} );

function confirmDelete() {
    var answer = confirm('Are you sure you want to delete this record? this is not reversible');
    if (answer == true) {
        return true;
    }
    return false;
}

</script>

@endsection
