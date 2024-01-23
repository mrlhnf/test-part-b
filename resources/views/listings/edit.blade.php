@extends('layouts.app')

@section('content')
<div class="mx-5">
    <div class="pull-left mb-3">
        <h2>Update Listing</h2>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('listings.update', $listing->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control border border-dark" id="name" name="name" style="width: 25%" required value="{{ $listing->name }}">
        </div>
        <div class="mb-3">
            <label for="latitude" class="form-label">Latitude</label>
            <input type="number" class="form-control border border-dark" id="latitude" name="latitude" style="width: 25%" step="any" required min="-90" max="90" value="{{ $listing->latitude }}">
        </div>
        <div class="mb-3">
            <label for="longitude" class="form-label">Longitude</label>
            <input type="number" class="form-control border border-dark" id="latitude" name="longitude" style="width: 25%" step="any" required min="-180" max="180" value="{{ $listing->longitude }}">
        </div>
        <button type="submit" class="btn btn-primary me-2">Update</button>
        <a class="btn btn-primary" href="{{ route('listings.index') }}">Back</a>
    </form>
</div>
@endsection