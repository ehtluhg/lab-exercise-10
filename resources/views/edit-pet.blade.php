@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Edit Pet Record</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/save-edit-pet" method="POST">
                <input type="hidden" name="id" value="{{ $pet->getId() }}" />
                @csrf
                <div class="form-group">
                    <label>Name of Pet</label>
                    <input type="text" class="form-control" name="pet_name" value="{{ $pet->getName() }}" required>
                </div>
                <div class="form-group">
                    <label>Animal Type</label>
                    <select name="animal_type" class="form-control">
                        <option value="mammal" @if ($pet->isMammal()) selected @endif>Mammal Pet</option>
                        <option value="bird" @if ($pet->isBird()) selected @endif>Bird Pet</option>
                        <option value="fish" @if ($pet->isFish()) selected @endif>Fish Pet</option>
                        <option value="reptile" @if ($pet->isReptile()) selected @endif>Reptile Pet</option>
                        <option value="amphibian" @if ($pet->isAmphibian()) selected @endif>Amphibian Pet</option>
                        <option value="arthropod" @if ($pet->isArthropod()) selected @endif>Arthropod Pet</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Owner of Pet</label>
                    <input type="text" class="form-control" name="pet_owner" value="{{ $pet->getOwner() }}" required>
                </div>
                <div class="form-group">
                    <label>Address of Owner</label>
                    <textarea class="form-control" name="owner_address">{{ $pet->getAddress() }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>

        <hr />

        
    </div>
</div>
@endsection
