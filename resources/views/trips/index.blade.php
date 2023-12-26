<!-- resources/views/trips/index.blade.php -->

@extends('layouts.app')

@section('content')
<section class="page-section bg-primary text-white mb-0" id="about">
    <div class="container mt-4">
        <h2>Create a New Trip</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="/trips" method="post">
            @csrf

            <div class="form-group">
                <label for="date">Select Date:</label>
                <input type="date" name="date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="locations">Select Locations:</label>
                <select name="locations[]" class="form-control" multiple required>
                    @foreach($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" >Create Trip</button>
        </form>
    </div>
</section>
@endsection
