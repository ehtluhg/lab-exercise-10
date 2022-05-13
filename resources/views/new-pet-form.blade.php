@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Add a New Pet</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/save-new-pet" method="POST">
                @csrf
                <div class="form-group">
                    <label>Name of Pet</label>
                    <input type="text" class="form-control" name="pet_name" required>
                </div>
                <div class="form-group">
                    <label>Animal Type</label>
                    <select name="animal_type" class="form-control">
                        <option value="mammal">Mammal</option>
                        <option value="bird">Bird</option>
                        <option value="fish">Fish</option>
                        <option value="reptile">Reptile</option>
                        <option value="amphibian">Amphibian</option>
                        <option value="arthropod">Arthropod</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Owner of Pet</label>
                    <input type="text" class="form-control" name="pet_owner" required>
                </div>
                <div class="form-group">
                    <label>Address of Owner</label>
                    <textarea class="form-control" name="owner_address"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
    </div>
</div>
@endsection
