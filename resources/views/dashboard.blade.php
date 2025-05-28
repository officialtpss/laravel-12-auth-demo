@extends('layouts.app')

@section('content')
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900">
        <h2 class="text-2xl font-bold mb-4">Dashboard</h2>
        <p class="mb-4">Welcome back, {{ $user->name }}!</p>
        
        <div class="bg-gray-50 p-4 rounded-lg">
            <h3 class="text-lg font-semibold mb-2">Your Account Information</h3>
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Member since:</strong> {{ $user->created_at->format('F j, Y') }}</p>
        </div>

        <div class="mt-6">
            <a href="{{ route('profile') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Edit Profile
            </a>
        </div>
    </div>
</div>
@endsection 