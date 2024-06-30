@extends('layouts.customer')

@section('title', 'My Profile - Shirona Salon and Bridal')

@section('content')
    <div class="container">
        <h2>My Profile</h2>
        <form id="profileForm" method="POST" action="{{ route('customer.updateProfile') }}">
            @csrf
            <div class="form-group">
                <label for="profileEmail">Email address</label>
                <input type="email" class="form-control" id="profileEmail" name="email" value="{{ $user->email }}" required>
            </div>
            <div class="form-group">
                <label for="profilePassword">Password</label>
                <input type="password" class="form-control" id="profilePassword" name="password" required>
            </div>
            <button type="submit" class="btn btn-custom">Update Profile</button>
        </form>
    </div>
@endsection
