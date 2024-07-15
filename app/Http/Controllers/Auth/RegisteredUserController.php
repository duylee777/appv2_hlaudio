<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

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
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['required', 'string', 'regex:/^[0-9]{10}+$/'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        $roleCustomer = Role::findByName(config('global.default_roles.customer'));
        if($roleCustomer != null) {
            $user->assignRole(config('global.default_roles.customer'));
        }
        else {
            Role::create(['name' => config('global.default_roles.customer')]);
        }

        $userId = $user->id;
        $cart = Cart::where('user_id',  $userId)->first();
        
        //check user has cart ?
        if(!$cart) {
            $cart = Cart::create([
                'user_id' => $userId,
                'total_price' => 0,
            ]);
        }
        else {
            $cart->update([
                'status' => true,
            ]);
        }

        return redirect(RouteServiceProvider::HOME);
    }
}
