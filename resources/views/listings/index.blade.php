@extends('layouts.app')

@section('content')
    <div class="mx-5">
        <div class="row">
            <div class="col-lg-12 mb-3">
                <label for="listing" class="me-3 fs-3">Listings</label>
                <a id="listing" class="btn btn-success" href="{{ route('listings.create') }}">Add New Listing</a>
            </div>
        </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <table class="table table-bordered border border-dark">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="25%">Name</th>
                <th width="25%">Latitude</th>
                <th width="25%">Longitude</th>
                <th width="5%">User ID</th>
                <th width="15%">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listings as $s)
            <tr>
                <td>{{ $s->id }}</td>
                <td>{{ $s->name }}</td>
                <td>{{ $s->latitude }}</td>
                <td>{{ $s->longitude }}</td>
                <td>{{ $s->user_id }}</td>
                <td>
                    <form action="{{ route('listings.destroy', $s->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('listings.edit', $s->id) }}">Edit</a>
                        
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
@endsection