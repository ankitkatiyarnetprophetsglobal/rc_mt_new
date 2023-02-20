<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function showLogin()
    {

        return view('auth.login');
    }
    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            "username" => 'required_without:mobile_no',
            "mobile_no" => 'required_without:username',

        ]);
        if ($validator->fails()) {
            Session::flash('error_message', $validator->errors()->first());
            return back()->withInput();
        }
        if (isset($request->username)) {
            $username = $request->username;
            $password = $request->password;
            $loginType = 'username';
        } else {
            $username = $request->mobile_no;
            $password = "";
            $loginType = 'otp';
        }
        //dd('done');
        try {
            //   $response = Http::post('http://192.168.23.254:8034/api/Login/generateJWTToken', [
            //       'roleid' => 0,
            //       'detailid' => 0,
            //       'username' => 'string',
            //       'isAdmin' => false,
            //   ]);

            //  $token =  $response->body();

            // $response = Http::post('http://192.168.23.254:8034/api/Login/Login', [
            $response = Http::post(env('DYNAMIC_URL') ."api/Login/Login",[
                'username' => trim($username),
                'password' => trim($password),
                'loginType' => $loginType,
                'appID' => 3,
            ]);
            if ($response->status() == 200) {
                $data = json_decode($response->body());
                //  dd($data);
            } else {
                //dd('done');
                Session::flash('error_message', 'Something went wrong, Please try Again.');
                return back()->withInput();
            }
            if ($loginType == 'otp') {

                if ($data->isMultipleExist) {
                    Session::flash('error_message', 'You cannot login with Mobile number.');
                    return back()->withInput();
                } else if ($data->otpId == -1) {
                    Session::flash(
                        'error_message',
                        'Please enter registered Mobile number.'
                    );
                    return back()->withInput();
                } else {

                    $mobile_user = [
                        'otpId' => $data->otpId,
                        'mobile_no' => $username
                    ];
                    $request->session()->put('mobile_user', $mobile_user);
                    return redirect()->route('verfyOtpPage');
                }
            }
            if (count($data)) {
                if (!$data[0]->isPasswordValidated) {
                    Session::flash('error_message', 'Wrong Password.');
                    return back()->withInput();
                }

                $rc_id = DB::table('rcacademymappings')->select('rc_id')->where('academy_id', $data[0]->user_id)->first();
                // dd($rc_id);

                $role_details = DB::table('roles')->select('id', 'role_id', 'name')->where('role_id', $data[0]->role_id)->first();
                if (!isset($role_details)) {
                    Session::flash('error_message', 'Access denied!');
                    return back()->withInput();
                }
                $data[0]->token_expire_time = time() + (250000 * 60);
                $request->session()->put('user', $data[0]);
                $request->session()->put('role_details', $role_details);
                $request->session()->put('rc_id', $rc_id);
                $request->session()->put('token', $data[0]->token);
                $request->session()->put('login_expire_time', time() + (250000 * 60));

                return redirect('/');
            } else {
                Session::flash('error_message', 'Login Credentials are not valid.');
                return back()->withInput();
            }
        } catch (\Exception $ex) {
            dd($ex->getMessage());
            $message = 'Something went wrong, Please try again...';
            return view('404_page', ['message' => $message, 'error_code' => 400]);
        }
    }

    public function logout(Request $request)
    {
        try {
            $request->session()->forget('user');
            $request->session()->forget('role_details');
            $request->session()->forget('token');
            return redirect()->route('login');
        } catch (\Exception $ex) {

            $message = 'Something went wrong, Please try again...';
            return view('404_page', ['message' => $message, 'error_code' => 400]);
        }
    }
    public function verfyOtpPage()
    {
        try {
            if (Session::has('mobile_user')) {
                return view('auth.otp');
            } else {
                return redirect()->route('login');
            }
        } catch (\Exception $ex) {
            $message = 'Something went wrong, Please try again...';
            return view('404_page', ['message' => $message, 'error_code' => 400]);
        }
    }
    public function verfyOtp(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "otp" => 'required',
            ]);
            if ($validator->fails()) {
                Session::flash('error_message', $validator->errors()->first());
                return back()->withInput();
            }

            $response = Http::withToken(Session::get('token'))->get('http://192.168.23.254:8034/api/Login/Login_Otp/ConfirmOtp', [
                'otpId' => Session::get('mobile_user')['otpId'],
                'otp' => $request->otp,
                'mobile' => Session::get('mobile_user')['mobile_no'],
            ]);
            if ($response->status() == 200) {
                $data = json_decode($response->body());
                if ($data[0]->isOtpValidated) {
                    $role_details = DB::table('roles')->select('id', 'role_id', 'name')->where('role_id', $data[0]->role_id)->first();
                    if (!isset($role_details)) {
                        //dd('done');
                        $request->session()->forget('mobile_user');
                        Session::flash('error_message', 'Access denied!');
                        return redirect()->route('login');
                    }
                    $request->session()->put('user', $data[0]);
                    $request->session()->put('role_details', $role_details);
                    $request->session()->put('token', $data[0]->token);
                    $request->session()->forget('mobile_user');
                    return redirect('/');
                } else {
                    Session::flash('error_message', 'Otp not matched!');
                    return back()->withInput();
                }
            } else {
                Session::flash('error_message', 'Something went wrong please try again');
                return redirect()->route('login');
            }
        } catch (\Exception $ex) {
            Session::flash('error_message', 'Something went wrong please try again');
            return redirect()->route('login');
        }
    }


    public function resendOtp(Request $request)
    {
        try {
            $response = Http::withToken(Session::get('token'))->get('http://192.168.23.254:8034/api/Login/ResendOtp', [
                'otpId' => Session::get('mobile_user')['otpId'],
                'mobile' => Session::get('mobile_user')['mobile_no'],
            ]);
            if ($response->status() == 200) {
                $data = json_decode($response->body());

                $mobile_user = [
                    'otpId' => $data,
                    'mobile_no' => Session::get('mobile_user')['mobile_no'],
                ];
                $request->session()->put('mobile_user', $mobile_user);
                Session::flash('message', 'OTP send successfully!');

                return redirect()->route('verfyOtpPage');
            }
        } catch (\Exception $ex) {

            Session::flash('message', 'Something went wrong!');
            return redirect()->route('verfyOtpPage');
        }
    }
}
