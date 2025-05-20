<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordEmail;
use App\Mail\WelcomeMail;
use App\Models\CustomerAddress;
use App\Models\Order;
use App\Models\User;
use App\Models\UploadedFile;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login() {
        return view('front.account.login');
    }

    public function register() {
        return view('front.account.register');
    }

    public function processRegister(Request $request) {

        $validator = Validator::make($request->all(),[
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|confirmed'
        ]);

        if($validator->passes()) {

            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->companyname = $request->companyname;
            $plainPassword = $request->password;
            $user->password = Hash::make($request->password);
            $user->save();

            session()->flash('success','You Have Been Registered Succesfully. A Mail Has Been Sent To You');
            
            Mail::to($user->email)->send(new WelcomeMail($user, $plainPassword));

            return response()->json([

                'status' => true,
            ]);

        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function authenticate(Request $request) {

        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->passes()) {

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->filled('remember'))) {
                if (session()->has('url.intended')) {
                    return redirect()->intended(session()->get('url.intended'));
                }
                return redirect()->route('account.profile');
            }
             else {
                // session()->flash('error','Either email/password is incorrect');
                return redirect()->route('account.login')
                ->withInput($request->only('email'))
                ->with('error','Either email/password is incorrect');

            }

        } else {
            return redirect()->route('account.login')
            ->withErrors($validator)
            ->withInput($request->only('email'));
        }
    }

    public function profile() {

        $user = Auth::user();

        $orders =  Order::where('user_id',$user->id)->orderBy('created_at','DESC')->get();
        $customerAddress = CustomerAddress::where('user_id',$user->id)->orderBy('created_at','DESC')->get();
        $uploadedFiles = UploadedFile::where('user_id',$user->id)->orderBy('created_at','DESC')->get();

        $data['orders'] = $orders;
        $data['customerAddress'] = $customerAddress;
        $data['uploadedFiles'] = $uploadedFiles;

        return view('front.account.profile', $data);
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('account.login')
        ->with('success','You Successfully Logged Out');
    }
    public function forgotPassword() {

        return view('front.account.forgot-password');
    }
    public function processForgotPassword(Request $request) {

       $validator =  Validator::make($request->all(),[
            'email' => 'required|email|exists:users,email'
        ]);
        if ($validator->fails()) {
            return redirect()->route('front.forgotPassword')->withInput()->withErrors($validator);
        }

        $token = Str::random(60);
        \DB::table('password_reset_tokens')->where('email',$request->email)->delete();

        \DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => now()
        ]);
        // send-email Here
        $user = User::where('email', $request->email)->first();

        $formData = [
            'token' => $token,
            'user' => $user,
            'mailSubject' => 'You Have Request To Reset Your Password'
        ];

        Mail::to($request->email)->send(new ResetPasswordEmail($formData));

        return redirect()->route('front.forgotPassword')->with('success','Please Cheack Your Inbox To Reset Your Password.');
    }

    public function resetPassword($token) {
        $tokenExist = \DB::table('password_reset_tokens')->where('token',$token)->first();

        if($tokenExist == null) {
            return redirect()->route('front.forgotPassword')->with('error','Invalid Request');
        }
        return view('front.account.reset-password',[
            'token' => $token
        ]);
    }
    public function processResetPassword(Request $request) {
        $token = $request->token;

        $tokenObj = \DB::table('password_reset_tokens')->where('token',$token)->first();

        if($tokenObj == null) {
            return redirect()->route('front.forgotPassword')->with('error','Invalid Request');
        }

        $user = User::where('email', $tokenObj->email)->first();

        $validator =  Validator::make($request->all(),[
            'new_password' => 'required|min:5',
            'confirm_password' => 'required|same:new_password'
        ]);
        if ($validator->fails()) {
            return redirect()->route('front.resetPassword', $token)->withErrors($validator);
        }
        User::where('id', $user->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        \DB::table('password_reset_tokens')->where('email',$user->email)->delete();

        return redirect()->route('account.login')->with('success','You Have Successfully Upadated Your Password.');

    }
    public function checkAuth()
    {
        return response()->json([
            'authenticated' => Auth::check()
        ]);
    }
}
