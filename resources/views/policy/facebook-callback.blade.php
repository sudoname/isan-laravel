@extends('layouts.public')

@section('title', 'Facebook Data Deletion - Isan Ekiti')

@section('content')
<div class="bg-gray-50 py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-lg p-8 md:p-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Facebook Data Deletion Instructions</h1>
            <p class="text-sm text-gray-500 mb-8">Data Deletion Callback URL</p>

            <div class="prose prose-lg max-w-none">
                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">About This Page</h2>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        This page is provided as the Data Deletion Callback URL required by Facebook for applications that allow users to sign in with their Facebook account. This URL must be accessible to comply with Facebook's Platform Policy.
                    </p>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Request Data Deletion</h2>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        If you have logged into Isan Ekiti using Facebook and would like to delete your data from our platform, you have the following options:
                    </p>
                </section>

                <section class="mb-8">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Option 1: Delete Through Your Facebook Account</h3>
                    <ol class="list-decimal list-inside text-gray-700 space-y-2 mb-4">
                        <li>Go to your Facebook Account Settings</li>
                        <li>Navigate to "Apps and Websites"</li>
                        <li>Find "Isan Ekiti" in your list of apps</li>
                        <li>Click "Remove" to revoke access</li>
                    </ol>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        This will remove the app's access to your Facebook data. We will automatically stop receiving any updates from Facebook about your account.
                    </p>
                </section>

                <section class="mb-8">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Option 2: Delete Your Isan Ekiti Account</h3>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        To completely delete all your data from Isan Ekiti:
                    </p>
                    <ol class="list-decimal list-inside text-gray-700 space-y-2 mb-4">
                        <li>Log into your account on <a href="{{ route('login') }}" class="text-purple-600 hover:text-purple-700">isanekiti.com</a></li>
                        <li>Go to your Profile Settings</li>
                        <li>Click "Delete Account"</li>
                        <li>Confirm the deletion</li>
                    </ol>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        This will permanently delete all your personal data from our system.
                    </p>
                </section>

                <section class="mb-8">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Option 3: Contact Us Directly</h3>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        If you need assistance with data deletion, please contact us:
                    </p>
                    <div class="bg-gray-50 p-4 rounded-lg mb-4">
                        <p class="text-gray-700"><strong>Email:</strong> privacy@isanekiti.com</p>
                        <p class="text-gray-700"><strong>Subject:</strong> Data Deletion Request</p>
                        <p class="text-gray-700"><strong>Include:</strong> Your email address associated with the account</p>
                    </div>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        We will process your deletion request within 30 days and send you a confirmation email once completed.
                    </p>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">What Data Gets Deleted</h2>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        When you delete your data, we will remove:
                    </p>
                    <ul class="list-disc list-inside text-gray-700 space-y-2 mb-4">
                        <li>Your name and profile information</li>
                        <li>Your email address</li>
                        <li>Any Facebook-provided data (ID, token)</li>
                        <li>Your forum posts and comments</li>
                        <li>Your registration information</li>
                        <li>Any other personal data associated with your account</li>
                    </ul>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Data Retention</h2>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Please note that some data may be retained for a limited period to comply with legal obligations, resolve disputes, and enforce our agreements. After the retention period, all data will be permanently deleted.
                    </p>
                </section>

                <section class="mb-8">
                    <div class="bg-blue-50 border-l-4 border-blue-400 p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-blue-700">
                                    <strong>Note:</strong> This page serves as the Facebook Data Deletion Callback URL as required by Facebook's Platform Policy. All data deletion requests are processed according to our <a href="{{ route('policy.privacy') }}" class="underline">Privacy Policy</a>.
                                </p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Additional Resources</h2>
                    <div class="space-y-2">
                        <p class="text-gray-700">
                            <a href="{{ route('policy.privacy') }}" class="text-purple-600 hover:text-purple-700">Privacy Policy</a> - Learn more about how we handle your data
                        </p>
                        <p class="text-gray-700">
                            <a href="{{ route('policy.terms') }}" class="text-purple-600 hover:text-purple-700">Terms of Service</a> - Understand our terms and conditions
                        </p>
                        <p class="text-gray-700">
                            <a href="{{ route('contact') }}" class="text-purple-600 hover:text-purple-700">Contact Us</a> - Get help with your account
                        </p>
                    </div>
                </section>
            </div>

            <div class="mt-8 pt-8 border-t border-gray-200">
                <a href="{{ route('home') }}" class="text-purple-600 hover:text-purple-700 font-medium">
                    ← Back to Home
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
