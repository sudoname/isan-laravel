@extends('admin.layouts.admin')

@section('title', 'Registration Details')
@section('page-title', 'Registration Details')

@section('content')
<div class="max-w-4xl">
    <div class="mb-6">
        <a href="{{ route('admin.registrations.index') }}" class="text-blue-600 hover:text-blue-800">
            <i class="fas fa-arrow-left mr-2"></i> Back to Registrations
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-500 mb-1">First Name</label>
                <p class="text-lg text-gray-900">{{ $registration->first_name }}</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-500 mb-1">Last Name</label>
                <p class="text-lg text-gray-900">{{ $registration->last_name }}</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-500 mb-1">Email</label>
                <p class="text-lg text-gray-900">{{ $registration->email }}</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-500 mb-1">Phone</label>
                <p class="text-lg text-gray-900">{{ $registration->phone ?? '-' }}</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-500 mb-1">Gender</label>
                <p class="text-lg text-gray-900 capitalize">{{ $registration->gender }}</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-500 mb-1">Date of Birth</label>
                <p class="text-lg text-gray-900">{{ $registration->date_of_birth ? $registration->date_of_birth->format('F d, Y') : '-' }}</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-500 mb-1">Hometown</label>
                <p class="text-lg text-gray-900">{{ $registration->hometown ?? '-' }}</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-500 mb-1">Current Location</label>
                <p class="text-lg text-gray-900">{{ $registration->current_location ?? '-' }}</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-500 mb-1">Occupation</label>
                <p class="text-lg text-gray-900">{{ $registration->occupation ?? '-' }}</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-500 mb-1">Status</label>
                <p class="text-lg">
                    @if($registration->status === 'approved')
                        <span class="px-3 py-1 text-sm font-semibold bg-green-100 text-green-800 rounded">
                            <i class="fas fa-check-circle mr-1"></i> Approved
                        </span>
                    @elseif($registration->status === 'rejected')
                        <span class="px-3 py-1 text-sm font-semibold bg-red-100 text-red-800 rounded">
                            <i class="fas fa-times-circle mr-1"></i> Rejected
                        </span>
                    @else
                        <span class="px-3 py-1 text-sm font-semibold bg-yellow-100 text-yellow-800 rounded">
                            <i class="fas fa-clock mr-1"></i> Pending
                        </span>
                    @endif
                </p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-500 mb-1">Registered</label>
                <p class="text-lg text-gray-900">{{ $registration->created_at->format('F d, Y') }}</p>
                <p class="text-sm text-gray-500">{{ $registration->created_at->diffForHumans() }}</p>
            </div>

            @if($registration->user)
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-500 mb-1">Associated User Account</label>
                    <p class="text-lg text-gray-900">
                        <a href="{{ route('admin.users.edit', $registration->user) }}" class="text-blue-600 hover:text-blue-800">
                            {{ $registration->user->name }} ({{ $registration->user->email }})
                        </a>
                    </p>
                </div>
            @endif

            @if($registration->additional_info)
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-500 mb-1">Additional Information</label>
                    <p class="text-gray-900">{{ $registration->additional_info }}</p>
                </div>
            @endif
        </div>

        <div class="flex justify-end gap-4 pt-6 border-t mt-6">
            <form action="{{ route('admin.registrations.destroy', $registration) }}"
                  method="POST"
                  onsubmit="return confirm('Are you sure you want to delete this registration?');">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="px-6 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                    <i class="fas fa-trash mr-2"></i> Delete Registration
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
