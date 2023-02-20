
<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Models\Masters\Rcacademymapping;

function encode5t($str)
{
	for ($i = 0; $i < 5; $i++) {
		$str = strrev(base64_encode($str));
	}
	return $str;
}
function decode5t($str)
{
	for ($i = 0; $i < 5; $i++) {
		$str = base64_decode(strrev($str));
	}
	return $str;
}

function getRcList()
{
	$token = getJwtToken();
	$response = Http::withToken($token)->get(env('DYNAMIC_URL') .'api/StakeHolder/GetStakeHolder_RDList');
	$data = json_decode($response->body());
	return $data;
}

function getRcDetails($id)
{
	// echo $id;
	$token = getJwtToken();
	$response = Http::withToken($token)->get(env('DYNAMIC_URL') .'api/StakeHolder/GetStakeHolder_RDDetail', ['user_id' => $id]);
	// $rc_details = $response->collect();
	$rc_details = json_decode($response->body());
	// $rc_details = $response->body();
	// print_r($rc_details);
	return $rc_details;
}

function getJwtToken()
{

	$response = Http::post(env('DYNAMIC_URL') .'api/Login/generateJWTToken', [
		'roleid' => 0,
		'detailid' => 0,
		'username' => 'string',
		'isAdmin' => false,
	]);

	$token =  $response->body();
	return $token;
}


function get_center_id($centerid)
{
	$data = Rcacademymapping::where('academy_id', '=', $centerid)->orderBy('id', 'desc')->limit(1)->get();
	$academy_name = $data[0]['academy_name'];
	return $academy_name;
}


// function getRoleName($role_id){
//    try {
// 	$data = DB::table('roles')->find($role_id);
// 	return $data->name;
//    } catch (\Exception $ex) {
// 	$message = 'Somthing went wrong, Please try again...';
//     return view('404_page',['message'=>$message,'error_code' => 400]);
//    }
// }
