<?php

namespace App\Http\Controllers\Organizations\Security;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Organizations\Security\GatepassServices;
use Session;
use Validator;
use Config;
use Carbon;
// use App\Models\ {
//     DesignModel,
//     DesignDetailsModel
//     };

class GatepassController extends Controller
{ 
    public function __construct(){
        $this->service = new GatepassServices();
    }

    public function index(){
        try {
            
            $getOutput = $this->service->getAll();
            return view('organizations.security.gatepass.list-gatepass', compact('getOutput'));

        } catch (\Exception $e) {
            return $e;
        }
    }  
    
    public function add(){
        try {
            return view('organizations.security.gatepass.add-gatepass');
        } catch (\Exception $e) {
            return $e;
        }
    } 

    public function store(Request $request){
        $rules = [
                'purchase_id' =>'required|string',                
                'gatepass_name' => 'required|string',
                'gatepass_date' => 'required',
                'gatepass_time' => 'required',
                'remark' => 'required|string',
            ];

            $messages = [                        
                        'purchase_id.required' => 'The Purchase Number is required.',
                        'purchase_id.string' => 'The Purchase Number must be a valid string.',
                        
                        'gatepass_name.required' => 'The Gatepass name is required.',
                        'gatepass_name.string' => 'The Gatepass Person name must be a valid string.',

                        'gatepass_date.required' => 'Please enter a valid Gatepass Date.',
                        
                        'gatepass_time.required' => 'Please Enter  a valid Gatepass Time.',

                        'remark.required' => 'The remark is required.',
                        'remark.string' => 'The remark must be a valid string.',                        
                    ];

  
          try {
              $validation = Validator::make($request->all(), $rules, $messages);
              
              if ($validation->fails()) {
                  return redirect('add-gatepass')
                      ->withInput()
                      ->withErrors($validation);
              } else {
                  $add_record = $this->service->addAll($request);
                
                  if ($add_record) {
                      $msg = $add_record['msg'];
                      $status = $add_record['status'];
  
                      if ($status == 'success') {
                          return redirect('list-gatepass')->with(compact('msg', 'status'));
                      } else {
                          return redirect('add-gatepass')->withInput()->with(compact('msg', 'status'));
                      }
                  }
              }
          } catch (Exception $e) {
              return redirect('add-gatepass')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
          }
      }
      

      
    public function edit(Request $request){
        try {
            $edit_data_id = base64_decode($request->id);
    //   dd($edit_data_id);
            $editData = $this->service->getById($edit_data_id);

            return view('organizations.security.gatepass.edit-gatepass', compact('editData'));
            
        } catch (\Exception $e) {
            return $e;
        }
    }
}