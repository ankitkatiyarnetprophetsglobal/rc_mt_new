<?php

namespace App\Http\Controllers\Front;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class IndexController extends Controller
{
    public function index(){
       //dd(Session::get('user')->user_id);
      // Session::get('rc_id')->rc_id
    //     $response = Http::post('http://192.168.23.253:8034/api/Login/generateJWTToken', [
    //         'roleid' => 0,
    //         'detailid' => 0,
    //         'username' => 'string',
    //         'isAdmin' => false,
    //     ]);

    //    $token =  $response->body();

    //    $response = Http::withToken($token)->get('http://192.168.23.253:8034/api/StakeHolder/GetStakeHolder_Ath_Coach_SS_Count', [
    //     'roleid' => 47,
    //     'userid' => 2495,
    //    ]);
    //    $data = json_decode($response->body());
    //    return view('front.pages.index',['data' => $data]);
       return view('front.pages.index');
    }
}
