<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Mentor;
use App\Models\MentorWallet;
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
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        

        $materialFile = '';

        if ($request->hasFile('material_file')) {
            $uploadedFile = $request->file('material_file');
            $materialFile = $uploadedFile->store('uploads/mentor-resume', 'public');
        }


        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => $request->type
        ]);

        if($request->type == 'mentor') {
            $mentor = new Mentor ([
                'first_name' => $request->name,
                'last_name' => $request->last_name,
                'contact' => $request->contact,
                'email' => $request->email,
                'user_id' => $user->id,
                
            ]);
    
            if ($materialFile !== '') {
                $mentor['resume_url'] = "storage/".$materialFile;
            }
    
            $mentor->save();

            $mentorWallet = new MentorWallet([
                'mentor_id' => $mentor->id,
                'remaining_amount' => 0,
                'withdraw_amount' => 0,
                'total_earnings' => 0,
            ]);
    
            $mentorWallet->save();

        } else {

        }

       

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
