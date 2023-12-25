<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class ResetPasswordRequestController extends Controller
{

    public function reqForgotPasswordView()
    {
        if(Auth::check()){
            return redirect()->route('dashboard');
        }
        return view('admin.auth.forget-password');
    }

    public function reqForgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            ]);
        if(!$this->validEmail($request->email)) {
            return view('admin.auth.forget-password')->with(['message' => 'Email not found']);
        } else {
            $this->sendEmail($request->email);
            return view('admin.auth.forget-password')->with(['message' => 'We’ve sent you an email with a link to finish resetting your password.']);
        }

    }


    public function sendEmail($email)
    {
        $token = $this->createToken($email);
        dispatch(new \App\Jobs\ForgotPasswordJobs($email, $token));
        // $token = $this->createToken($email);
        // Mail::to($email)->send(new ForgetPasswordMail($token));
    }

    public function validEmail($email)
    {
       return !!User::where('email', $email)->first();
    }

    public function createToken($email)
    {
      $isToken = PasswordReset::where('email', $email)->first();
      if($isToken) {
        return $isToken->token;
      }
      $token = Str::random(80);;
      $this->saveToken($token, $email);
      return $token;
    }

    public function saveToken($token, $email)
    {
        PasswordReset::insert([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
    }

    public function updateForgotPassword(Request $request)
    {

        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
            'confirm-password' => 'required|same:password'
            ]);

        return $this->validateToken($request)->count() > 0 ? $this->changePassword($request) : $this->noToken();
    }

    private function validateToken($request)
    {
        return PasswordReset::where([
            'email' => $request->email,
            'token' => $request->passwordToken
        ]);
    }

    public function resetPasswordView($token){

        return view('admin.auth.reset-password',['token' => $token]);
    }

    private function noToken()
    {
        return view('admin.auth.reset-password')->with(['message' => 'Email or token does not exist.']);
    }

    private function changePassword($request)
    {
        $user = User::whereEmail($request->email)->first();
        $user->update([
          'password'=>Hash::make($request->password)
        ]);
        $this->validateToken($request)->delete();
        return view('admin.auth.reset-password')->with(['message' => 'Password changed successfully. Please Login']);
    }

    public function getEmailFromToken(Request $request)
    {
        $email =  $this->get_user_by_token($request->token);
        return $email;
    }

    private function get_user_by_token($token): String
    {
        $records =  PasswordReset::get();
        foreach ($records as $record) {
            if ($token=== $record->token ) {
               return $record->email;
            }
        }
    }


}
