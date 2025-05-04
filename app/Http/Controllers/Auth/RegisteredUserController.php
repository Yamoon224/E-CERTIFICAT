<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Citizen;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'phone' => ['required', 'string', 'max:9', 'min:9', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        
        $data = $request->except(['_token']);

        DB::BeginTransaction();
            $user = User::create(['name' => $request->firstname." ".$request->name, 'phone' => $request->phone, 'email' => $request->email, 'password' => Hash::make($request->password)]);
            event(new Registered($user));

            $data['citizen']['name'] = $request->name;
            $data['citizen']['firstname'] = $request->firstname;
            $data['citizen']['email'] = $user->email;
            $data['citizen']['phone'] = $user->phone;
            $data['citizen']['created_by'] = $user->id;
            Citizen::create($data['citizen']);

            Auth::login($user);
        DB::commit();

        return redirect(RouteServiceProvider::HOME);
    }
}
