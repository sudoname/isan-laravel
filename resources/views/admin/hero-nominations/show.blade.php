@extends('admin.layouts.admin')

@section('title', 'Nomination Details')
@section('page-title', 'Hero Nomination Details')

@section('content')
<div class="space-y-6">
    <!-- Nomination Details -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-start mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">{{ $heroNomination->nominee_title }} {{ $heroNomination->nominee_name }}</h2>
                <div class="flex items-center gap-4 mt-2">
                    <span class="px-3 py-1 text-sm font-semibold bg-blue-100 text-blue-800 rounded">{{ $heroNomination->category }}</span>
                    @if($heroNomination->status === 'approved')
                        <span class="px-3 py-1 text-sm font-semibold bg-green-100 text-green-800 rounded">Approved</span>
                    @elseif($heroNomination->status === 'rejected')
                        <span class="px-3 py-1 text-sm font-semibold bg-red-100 text-red-800 rounded">Rejected</span>
                    @else
                        <span class="px-3 py-1 text-sm font-semibold bg-yellow-100 text-yellow-800 rounded">Pending Review</span>
                    @endif
                </div>
            </div>
            <div class="text-right">
                @if($heroNomination->total_votes > 0)
                    <div class="flex items-center justify-end mb-1">
                        <span class="text-yellow-500 text-2xl mr-2">★</span>
                        <span class="text-3xl font-bold">{{ number_format($heroNomination->average_rating, 1) }}</span>
                        <span class="text-gray-500 ml-1">/10</span>
                    </div>
                    <p class="text-sm text-gray-500">{{ $heroNomination->total_votes }} vote(s)</p>
                @else
                    <p class="text-gray-400">No votes yet</p>
                @endif
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            <div>
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Nomination Details</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Why They Should Be Recognized</label>
                        <p class="mt-1 text-gray-900">{{ $heroNomination->reason }}</p>
                    </div>

                    @if($heroNomination->achievements)
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Key Achievements</label>
                            <p class="mt-1 text-gray-900">{{ $heroNomination->achievements }}</p>
                        </div>
                    @endif

                    <div>
                        <label class="block text-sm font-medium text-gray-500">Submitted</label>
                        <p class="mt-1 text-gray-900">{{ $heroNomination->created_at->format('F j, Y \a\t g:i A') }}</p>
                    </div>
                </div>
            </div>

            <div>
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Nominator Information</h3>
                <div class="space-y-3">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Name</label>
                        <p class="mt-1 text-gray-900">{{ $heroNomination->nominator_name }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Email</label>
                        <p class="mt-1 text-gray-900">{{ $heroNomination->nominator_email }}</p>
                    </div>
                    @if($heroNomination->nominator_phone)
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Phone</label>
                            <p class="mt-1 text-gray-900">{{ $heroNomination->nominator_phone }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Voting Section -->
    <div class="bg-gradient-to-br from-blue-50 to-indigo-100 rounded-lg shadow p-6">
        <h3 class="text-xl font-bold text-gray-900 mb-4">Cast Your Vote</h3>
        @php
            $userVote = $heroNomination->votes()->where('user_id', Auth::id())->first();
        @endphp

        @if($userVote)
            <div class="bg-white rounded-lg p-4 mb-4">
                <p class="text-sm text-gray-600 mb-2">Your current vote:</p>
                <div class="flex items-center">
                    <span class="text-yellow-500 text-3xl mr-2">★</span>
                    <span class="text-2xl font-bold">{{ $userVote->rating }}</span>
                    <span class="text-gray-500 ml-1">/10</span>
                </div>
                @if($userVote->comment)
                    <p class="mt-2 text-sm text-gray-700">{{ $userVote->comment }}</p>
                @endif
            </div>
        @endif

        <form action="{{ route('admin.hero-nominations.vote', $heroNomination) }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-3">Rate this nomination (1-10)</label>
                <div class="flex gap-2">
                    @for($i = 1; $i <= 10; $i++)
                        <label class="cursor-pointer">
                            <input type="radio" name="rating" value="{{ $i }}" {{ ($userVote && $userVote->rating == $i) ? 'checked' : '' }} required class="hidden peer">
                            <div class="w-12 h-12 flex items-center justify-center border-2 border-gray-300 rounded-lg peer-checked:border-blue-500 peer-checked:bg-blue-500 peer-checked:text-white hover:border-blue-400 transition font-bold">
                                {{ $i }}
                            </div>
                        </label>
                    @endfor
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Comment (Optional)</label>
                <textarea name="comment" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">{{ $userVote ? $userVote->comment : '' }}</textarea>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white px-6 py-3 rounded-lg font-bold hover:bg-blue-700 transition">
                {{ $userVote ? 'Update' : 'Submit' }} Vote
            </button>
        </form>
    </div>

    <!-- All Votes -->
    @if($heroNomination->votes()->count() > 0)
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-xl font-bold text-gray-900 mb-4">All Votes ({{ $heroNomination->total_votes }})</h3>
            <div class="space-y-3">
                @foreach($heroNomination->votes as $vote)
                    <div class="border-l-4 border-blue-500 pl-4 py-2">
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="font-semibold text-gray-900">{{ $vote->user->name }}</span>
                                <span class="text-gray-500 text-sm ml-2">{{ $vote->created_at->diffForHumans() }}</span>
                            </div>
                            <div class="flex items-center">
                                <span class="text-yellow-500 mr-1">★</span>
                                <span class="font-bold text-lg">{{ $vote->rating }}</span>
                            </div>
                        </div>
                        @if($vote->comment)
                            <p class="text-sm text-gray-600 mt-1">{{ $vote->comment }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <!-- Actions -->
    <div class="flex gap-4">
        @if($heroNomination->status === 'pending')
            <form action="{{ route('admin.hero-nominations.approve', $heroNomination) }}" method="POST" class="flex-1">
                @csrf
                <button type="submit" class="w-full bg-green-600 text-white px-6 py-3 rounded-lg font-bold hover:bg-green-700 transition">
                    <i class="fas fa-check mr-2"></i> Approve Nomination
                </button>
            </form>

            <button type="button" onclick="document.getElementById('rejectModal').classList.remove('hidden')"
                    class="flex-1 bg-red-600 text-white px-6 py-3 rounded-lg font-bold hover:bg-red-700 transition">
                <i class="fas fa-times mr-2"></i> Reject Nomination
            </button>
        @endif

        <a href="{{ route('admin.hero-nominations.index') }}" class="px-6 py-3 border border-gray-300 rounded-lg hover:bg-gray-50 transition flex items-center justify-center">
            Back to List
        </a>
    </div>
</div>

<!-- Reject Modal -->
<div id="rejectModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg p-8 max-w-md w-full mx-4">
        <h3 class="text-xl font-bold text-gray-900 mb-4">Reject Nomination</h3>
        <form action="{{ route('admin.hero-nominations.reject', $heroNomination) }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Reason for rejection (optional)</label>
                <textarea name="admin_notes" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg"></textarea>
            </div>
            <div class="flex gap-4">
                <button type="submit" class="flex-1 bg-red-600 text-white px-6 py-3 rounded-lg font-bold hover:bg-red-700 transition">
                    Reject
                </button>
                <button type="button" onclick="document.getElementById('rejectModal').classList.add('hidden')"
                        class="flex-1 border border-gray-300 px-6 py-3 rounded-lg hover:bg-gray-50 transition">
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
