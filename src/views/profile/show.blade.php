@extends('layouts.app') {{-- Assuming you have a default app layout --}}

@section('content')
<div class="container">
    <h1>Your Profile</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <p><strong>Name:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>

    <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
</div>
@endsection