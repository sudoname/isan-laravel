<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    /**
     * Display the registration form.
     */
    public function create()
    {
        return view('registration');
    }

    /**
     * Store a new registration.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:registrations,email'],
            'phone' => ['required', 'string', 'max:20'],
            'date_of_birth' => ['required', 'date', 'before:today'],
            'gender' => ['required', 'in:male,female'],
            'current_address' => ['required', 'string'],
            'hometown' => ['nullable', 'string', 'max:255'],
            'occupation' => ['nullable', 'string', 'max:255'],
        ], [
            'email.unique' => 'This email address has already been registered. If you have questions about your registration, please contact us.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $registration = Registration::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'current_address' => $request->current_address,
            'hometown' => $request->hometown,
            'occupation' => $request->occupation,
            'status' => 'pending',
        ]);

        return redirect()->route('registration')
            ->with('success', 'Registration submitted successfully! We will review your application and get back to you soon.');
    }
}
