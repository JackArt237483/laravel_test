@extends('layouts.app')

@section('content')
    <div class="account-container">
        <h1>Your Account</h1>
        @if (session('status'))
            <div class="status-message">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('account.update') }}" method="POST">
            @csrf
            <div>
                <label for="username">Username</label>
                <input type="text" name="username" id="username" value="{{ $user->username }}" required>
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}" required>
            </div>
            <div>
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" value="{{ $user->phone }}" required>
            </div>
            <div>
                <label for="password">New Password</label>
                <input type="password" name="password" id="password">
            </div>
            <div>
                <label for="password_confirmation">Confirm New Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation">
            </div>
            <button type="submit">Update Profile</button>
        </form>
    </div>
@endsection
