<!-- resources/views/tickets/index.blade.php -->

@extends('layouts.app')

@section('content')
<section class="page-section bg-primary text-white mb-0" id="about">
    <div class="container mt-4">
        <h2>Purchase a Ticket</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="/tickets" method="post">
            @csrf

            <div class="form-group">
                <label for="trip_id">Select Trip:</label>
                <select name="trip_id" class="form-control" required>
                    @foreach($trips as $trip)
                        <option value="{{ $trip->id }}">{{ $trip->date }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="seat_number">Select Seat Number:</label>
                <input type="number" name="seat_number" class="form-control" min="1" max="36" required>
            </div>

            <button type="submit" >Purchase Ticket</button>
        </form>
    </div>
</section>
@endsection
