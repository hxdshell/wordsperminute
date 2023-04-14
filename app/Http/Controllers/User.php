<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;
use App\Models\User as ModelsUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rules\Password;
use PhpParser\Node\Expr\StaticCall;

use function PHPUnit\Framework\returnSelf;
use SebastianBergmann\CodeCoverage\Report\Xml\Tests;

class User extends Controller
{
    public static function show($username){
        if(Auth::check() == false){
            return view('userlogin');
        }
        else{
            $user = ModelsUser::where('username',$username)->first();
            $tests = Test::where('user_id',$user->id)->orderBy('time','desc')->get();
            return view('account',['data' => ['user' => $user,'tests'=>$tests]]);
        }
    }
    public static function showauth(){
        if(Auth::check() == false)
            return view('userlogin');
        else{
            $user = Auth::user();
            return redirect()->route('account',$user->username);
        }
    }
    public static function register(Request $request){
        $validated = $request->validate([
            'username' => ['required','unique:users,username'],
            'email' => ['required','email','unique:users,email'],
            'password' => ['required','string',Password::min(8)
                                                        ->letters()
                                                        ->mixedCase()
                                                        ->numbers()
                                                        ->symbols()
                          ],
            'confirmpass' => ['required','string','same:password',Password::min(8)
                                                        ->letters()
                                                        ->mixedCase()
                                                        ->numbers()
                                                        ->symbols(),
                            ]
        ]);
        $user = ModelsUser::create([
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        if($request->filled('remember2'))
            Auth::login($user,true);
        else
            Auth::login($user);

        return redirect()->route('account',[$validated['username']]);
    }
    public static function authenticate(Request $request){
        $credentials = $request->validate([
            'unameoremail' => 'required',
            'loginpassword' => 'required'
        ]);

        if($request->filled('remember'))
            $remember = true;
        else
            $remember = false;

        if(Auth::attempt(['username' => $credentials['unameoremail'],'password'=>$credentials['loginpassword']],$remember) 
        || Auth::attempt(['email' => $credentials['unameoremail'],'password'=>$credentials['loginpassword']],$remember))
        {
            $request->session()->regenerate();
            $user = Auth::user();
            $username = $user->username;
            return redirect()->route('account',[$username]);
        }    
        else{
            return back()->with('error','Invalid username/email or password');
        }
    }
    public static function logout(){
        Auth::logout();
        return redirect('/login');
    }
    public Static function showrank(){
        $users = ModelsUser::select(['username','highscore','high_acc'])
                            ->orderBy('highscore','desc')
                            ->orderBy('high_acc','desc')
                            ->get();
        return view('leaderboard',['data' => ['users' => $users,'currentuser' => Auth::user()]]);
    }
}
