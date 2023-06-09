<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\userController;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;




class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'min:8', 'unique:users'],
            'telefono' => ['required', 'string', 'regex:/^[+\s0-9]+$/i', 'min:8', 'max:255', function ($attribute, $value, $fail) {
                $plusCount = substr_count($value, '+');
                if ($plusCount > 1) {
                    $fail('Il campo :attribute può contenere al massimo un carattere "+"');
                }
            }],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'età' => ['required', 'integer', 'between:0,100'],

        ]);
        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'età' => $request->età,
            'telefono' => $request->telefono,
            'genere' => $request->genere,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);


        event(new Registered($user));

        Auth::login($user);


        return redirect('/');
    }
}
