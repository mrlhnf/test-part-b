@extends('layouts.app')

@section('content')
<div class="mx-5">
  <div class="pull-left mb-3">
    <h2>Create Listing</h2>
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

  <form action="{{ route('listings.store') }}" method="POST">
    @csrf

    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" name="name" class="form-control border border-dark" id="name" style="width: 25%" required>
    </div>
    <div class="mb-3">
      <label for="latitude" class="form-label">Latitude</label>
      <input type="number" name="latitude" class="form-control border border-dark" id="latitude" style="width: 25%" step="any" required min="-90" max="90">
    </div>
    <div class="mb-3">
      <label for="longitude" class="form-label">Longitude</label>
      <input type="number" name="longitude" class="form-control border border-dark" id="latitude" style="width: 25%" step="any" required min="-180" max="180">
    </div>
    <button type="submit" class="btn btn-primary me-2">Create</button>
    <a class="btn btn-primary" href="{{ route('listings.index') }}">Back</a>
  </form>
</div>
@endsection