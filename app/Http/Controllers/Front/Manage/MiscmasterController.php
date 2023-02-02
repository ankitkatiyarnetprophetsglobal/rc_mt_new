<?php

namespace App\Http\Controllers\Front\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Masters\Finance;
use App\Models\Masters\Miscmaster;
use App\Models\Masters\Agency;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class MiscmasterController extends Controller
{
    public function index(){      
      
      try {

        $user_id = Session::get('user')->user_id;
        $data = Miscmaster::with(['all_miscmaster'])->whereCreatedBy($user_id)->get();
        return view('front.pages.masters.miscmaster.index', ['data' => $data]);

      } catch (\Exception $ex) {

        $message = 'Somthing went wrong, Please try again...';
        return view('404_page', ['message' => $message, 'error_code' => 400]);
      }
    }
  
    public function create(){

      try{
        
        return view('front.pages.masters.miscmaster.create');      
      }catch (\Exception $ex) {

        $message = 'Somthing went wrong, Please try again...';
        return view('404_page', ['message' => $message, 'error_code' => 400]);
      }
    }

    public function store(Request $request){
      
      
      try {

        // $created_by = '1';
        // $created_for = '1';
        // $updated_by = '1';
        // $deleted_by = '1';
        $user_id = Session::get('user')->user_id;

        foreach ($request->miscmaster as $key => $value) {

          
          $validator = Validator::make($value, [
            "detail_cwp_slp" => ['required', Rule::unique('misc_master')->where(function ($query) use ($user_id,$value) {
                $query->where('detail_cwp_slp', $value['detail_cwp_slp'])->where('deleted_at', null);
                return $query;                
             })],
             "court_name" => 'required',
          ],);

          if ($validator->fails()) {
              
              Session::flash('message', 'Record Created.');
              return response()->json(['error_message' => false, 'message' => $validator->errors()->first()]);
          }

          $Miscmaster = new Miscmaster();
          $Miscmaster->detail_cwp_slp = $value['detail_cwp_slp'];
          $Miscmaster->court_name = $value['court_name'];
          $Miscmaster->court_case = $value['court_case'];
          $Miscmaster->parties_name = $value['parties_name'];
          $Miscmaster->counsel_name = $value['counsel_name'];
          $Miscmaster->created_by = $user_id;
          $Miscmaster->created_for = $user_id;
          $Miscmaster->status = 1;
          $Miscmaster->save();
        }

  
        Session::flash('message', 'Record Created.');
        return response()->json(['success' => true, 'message' => 'Data added successfully!']);
      
      } catch (\Exception $ex) {
        
        return response()->json(['success' => false, 'error_message' => 'Somthing went wrong.']);
      }
    }

    public function edit($id){
    
      try {
        
        $miscmaster = Miscmaster::with(['all_miscmaster'])->findOrFail(decode5t($id));
        $agencies = Agency::whereStatus(true)->pluck('name', 'id');
        return view ('front.pages.masters.miscmaster.edit', ['data' => $miscmaster,'agencies' => $agencies]);
      
      } catch (\Exception $ex) {

        $message = 'Somthing went wrong, Please try again...';
        return view('404_page', ['message' => $message, 'error_code' => 400]);
      }
    }

    public function update(Request $request){  
      
      try {

        $validator = Validator::make($request->all(), [
          "detail_cwp_slp" => ['required', Rule::unique('misc_master')->where(function ($query) use ($request) {
              $query->where('detail_cwp_slp', $request->detail_cwp_slp)->where('deleted_at', null);
              return $query;                
            })],
        ],);
          
        // if ($validator->fails()) {
            
        //   Session::flash('message', 'Record Created.');
        //   return response()->json(['error_message' => false, 'message' => $validator->errors()->first()]);
        // }

        $user_id = Session::get('user')->user_id;
        $miscmaster = Miscmaster::findOrFail($request->id);
        $miscmaster->detail_cwp_slp = $request->detail_cwp_slp;
        $miscmaster->court_name = $request->court_name;
        $miscmaster->court_case = $request->court_case;
        $miscmaster->parties_name = $request->parties_name;
        $miscmaster->counsel_name = $request->counsel_name;              
        $miscmaster->updated_by = $user_id;
        $miscmaster->created_for = $user_id;
        $miscmaster->status = 1;
        $miscmaster->save();
        Session::flash('message', 'Record Updated.');
        return redirect()->route('masters.miscmaster.index');
      
      } catch (\Exception $ex) {

        $id = encode5t($request->id);
        Session::flash('error_message', 'Please Enter a valid budget cost!');
        return redirect()->route('masters.miscmaster.edit', [$id]);

      }
    }

    public function delete($id){
      
      try {
        
        $Finance = Miscmaster::with(['all_miscmaster'])->findOrFail(decode5t($id));
        $Finance->delete();
        Session::flash('message', 'Record Deleted.');
        return redirect()->route('masters.miscmaster.index');
      } catch (\Exception $ex) {

        return response()->json(['success' => false, 'error_message' => 'Somthing went wrong.']);
      }
    }   
}

