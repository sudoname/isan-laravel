@extends('layouts.public')

@section('title', 'Privacy Policy - Isan Ekiti')

@section('content')
<div class="bg-gray-50 py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-lg p-8 md:p-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Privacy Policy</h1>
            <p class="text-sm text-gray-500 mb-8">Last updated: {{ date('F d, Y') }}</p>

            <div class="prose prose-lg max-w-none">
                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Introduction</h2>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Welcome to Isan Ekiti's official website. We are committed to protecting your personal information and your right to privacy. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website.
                    </p>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Information We Collect</h2>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        We collect information that you provide directly to us, including:
                    </p>
                    <ul class="list-disc list-inside text-gray-700 space-y-2 mb-4">
                        <li>Name and contact information</li>
                        <li>Email address</li>
                        <li>Registration information for community members</li>
                        <li>Information submitted through contact forms</li>
                        <li>Forum posts and comments</li>
                    </ul>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">How We Use Your Information</h2>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        We use the information we collect to:
                    </p>
                    <ul class="list-disc list-inside text-gray-700 space-y-2 mb-4">
                        <li>Provide, maintain, and improve our services</li>
                        <li>Send you technical notices and support messages</li>
                        <li>Respond to your comments and questions</li>
                        <li>Communicate with you about events, news, and updates</li>
                        <li>Facilitate community registration and verification</li>
                    </ul>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Social Media Integration</h2>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        When you connect your account with social media services (Google, Facebook, Instagram), we may receive information from those services including your name, email address, and profile information, in accordance with the authorization procedures determined by those services.
                    </p>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Data Security</h2>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        We implement appropriate technical and organizational security measures to protect your personal information. However, please note that no method of transmission over the Internet is 100% secure.
                    </p>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Your Rights</h2>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        You have the right to:
                    </p>
                    <ul class="list-disc list-inside text-gray-700 space-y-2 mb-4">
                        <li>Access your personal information</li>
                        <li>Correct inaccurate information</li>
                        <li>Request deletion of your information</li>
                        <li>Object to processing of your information</li>
                        <li>Request restriction of processing</li>
                    </ul>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Cookies</h2>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        We use cookies and similar tracking technologies to track activity on our website and store certain information. You can instruct your browser to refuse all cookies or to indicate when a cookie is being sent.
                    </p>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Changes to This Policy</h2>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        We may update this Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page and updating the "Last updated" date.
                    </p>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Contact Us</h2>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        If you have any questions about this Privacy Policy, please contact us at:
                    </p>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-gray-700">Email: privacy@isanekiti.com</p>
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
