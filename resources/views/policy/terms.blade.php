@extends('layouts.public')

@section('title', 'Terms of Service - Isan Ekiti')

@section('content')
<div class="bg-gray-50 py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-lg p-8 md:p-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Terms of Service</h1>
            <p class="text-sm text-gray-500 mb-8">Last updated: {{ date('F d, Y') }}</p>

            <div class="prose prose-lg max-w-none">
                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Agreement to Terms</h2>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        By accessing and using the Isan Ekiti website, you accept and agree to be bound by the terms and provision of this agreement. If you do not agree to abide by the above, please do not use this service.
                    </p>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Use License</h2>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Permission is granted to temporarily access the materials (information or software) on Isan Ekiti's website for personal, non-commercial transitory viewing only. This is the grant of a license, not a transfer of title, and under this license you may not:
                    </p>
                    <ul class="list-disc list-inside text-gray-700 space-y-2 mb-4">
                        <li>Modify or copy the materials</li>
                        <li>Use the materials for any commercial purpose or public display</li>
                        <li>Attempt to decompile or reverse engineer any software contained on the website</li>
                        <li>Remove any copyright or proprietary notations from the materials</li>
                        <li>Transfer the materials to another person or "mirror" the materials on any other server</li>
                    </ul>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">User Accounts</h2>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        When you create an account with us, you must provide accurate, complete, and current information. Failure to do so constitutes a breach of the Terms, which may result in immediate termination of your account.
                    </p>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        You are responsible for safeguarding the password that you use to access the service and for any activities or actions under your password.
                    </p>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Community Guidelines</h2>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        When participating in our forums and community features, you agree to:
                    </p>
                    <ul class="list-disc list-inside text-gray-700 space-y-2 mb-4">
                        <li>Treat all community members with respect</li>
                        <li>Not post offensive, abusive, or inappropriate content</li>
                        <li>Not spam or post irrelevant content</li>
                        <li>Not impersonate others or misrepresent your affiliation</li>
                        <li>Respect intellectual property rights</li>
                        <li>Not engage in any illegal activities</li>
                    </ul>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Content Ownership</h2>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        You retain all rights to content you submit, post, or display on or through the service. By submitting content, you grant us a worldwide, non-exclusive, royalty-free license to use, reproduce, and display such content in connection with operating the website.
                    </p>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Registration Information</h2>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        When registering as an indigene of Isan Ekiti, you certify that the information provided is accurate and truthful. Providing false information may result in account termination and may be subject to legal action.
                    </p>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Disclaimer</h2>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        The materials on Isan Ekiti's website are provided on an 'as is' basis. We make no warranties, expressed or implied, and hereby disclaim and negate all other warranties including, without limitation, implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property or other violation of rights.
                    </p>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Limitations</h2>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        In no event shall Isan Ekiti or its suppliers be liable for any damages (including, without limitation, damages for loss of data or profit, or due to business interruption) arising out of the use or inability to use the materials on our website.
                    </p>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Accuracy of Materials</h2>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        The materials appearing on Isan Ekiti's website could include technical, typographical, or photographic errors. We do not warrant that any of the materials on its website are accurate, complete or current. We may make changes to the materials contained on its website at any time without notice.
                    </p>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Links</h2>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Isan Ekiti has not reviewed all of the sites linked to its website and is not responsible for the contents of any such linked site. The inclusion of any link does not imply endorsement by Isan Ekiti. Use of any such linked website is at the user's own risk.
                    </p>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Modifications</h2>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        We may revise these terms of service for its website at any time without notice. By using this website you are agreeing to be bound by the then current version of these terms of service.
                    </p>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Governing Law</h2>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        These terms and conditions are governed by and construed in accordance with the laws of Nigeria and you irrevocably submit to the exclusive jurisdiction of the courts in that location.
                    </p>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Contact Information</h2>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        If you have any questions about these Terms of Service, please contact us:
                    </p>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-gray-700">Email: info@isanekiti.com</p>
                        <p class="text-gray-700">Website: <a href="{{ route('contact') }}" class="text-purple-600 hover:text-purple-700">Contact Form</a></p>
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
