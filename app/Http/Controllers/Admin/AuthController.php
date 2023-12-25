<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\State;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:web')->except('logout');
    }

    public function registerview()
    {
        $data['state'] = State::all();
        return view('admin.auth.register',['data'=>$data]);
    }

    public function loginview()
    {
        return view('admin.auth.login');
    }
     /**
     * Create User
     * @param Request $request
     * @return User
     */
    public function createUser(Request $request)
    {
        try {
            //Validated
            $validateUser = Validator::make($request->all(),
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'mobile' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
                'password_confirmation' => 'required|same:password',
            ]);

            $request['password'] = Hash::make($request->password);

            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'mobile' => $request->mobile,
                'role_id' => $request->role_id,
                'user_type' => $request->user_type,
                'address' => $request->address,
                'state_id ' => $request->state_id,
                'city_id ' => $request->city_id,
                'pincode' => $request->pincode,
                'is_active' => $request->is_active,
                'is_admin ' => $request->is_admin,
                'email' => $request->email,
                'password' => $request['password']
            ]);

            $token = Auth::login($user);
            if($token){
                return redirect($this->redirectTo);
            }

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Login The User
     * @param Request $request
     * @return User
     */
    public function loginUser(Request $request)
    {
            $request->validate([
                'email' => 'required|email|exists:users,email',
                'password' => 'required',
                ]);

            $credentials = $request->only('email', 'password');
            $remember = $request->has('remember_me') ? true : false;
            $user = User::where(['email'=> $request->email,'is_active' =>1])->first();
            if(!$user){
                return redirect()->route('login')->withErrors(['error' => 'Your Account has been inactive. Please contact admin']);
            }
            if(Auth::attempt($credentials)){
                Auth::login($user,$remember);
                return redirect($this->redirectTo);
            }
            return redirect()->route('login')->withErrors(['error' => 'Invalid Credentials']);

    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');

    }

    public function refresh()
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }
}
