<?php

namespace App\Http\Controllers\Organizations\Security;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Organizations\Security\SecurityRemarkServices;
use Session;
use Validator;
use Config;
use Carbon;
// use App\Models\ {
//     DesignModel,
//     DesignDetailsModel
//     };

class SecurityRemarkController extends Controller
{ 
    public function __construct(){
        $this->service = new SecurityRemarkServices();
    }

    public function index(){
        try {

            $getOutput = $this->service->getAll();
            return view('organizations.security.remark.list-remark', compact('getOutput'));

        } catch (\Exception $e) {
            return $e;
        }
    }  
    
    public function add(){
        try {
            return view('organizations.security.remark.add-remark');
        } catch (\Exception $e) {
            return $e;
        }
    } 

    public function store(Request $request){
        $rules = [
                'purchase_id' =>'required|string',
                'remark' => 'required|string',
            ];

            $messages = [                        
                        'purchase_id.required' => 'The Purchase Number is required.',
                        'purchase_id.string' => 'The Purchase Number must be a valid string.',
                                                
                        'remark.required' => 'The remark is required.',
                        'remark.string' => 'The remark must be a valid string.',                        
                    ];


          try {
              $validation = Validator::make($request->all(), $rules, $messages);
              
              if ($validation->fails()) {
                  return redirect('add-security-remark')
                      ->withInput()
                      ->withErrors($validation);
              } else {
                  $add_record = $this->service->addAll($request);
                
                  if ($add_record) {
                      $msg = $add_record['msg'];
                      $status = $add_record['status'];
  
                      if ($status == 'success') {
                          return redirect('list-security-remark')->with(compact('msg', 'status'));
                      } else {
                          return redirect('add-security-remark')->withInput()->with(compact('msg', 'status'));
                      }
                  }
              }
          } catch (Exception $e) {
              return redirect('add-security-remark')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
          }
      }


    public function edit(Request $request){
        try {
            $edit_data_id = base64_decode($request->id);
      
            $editData = $this->service->getById($edit_data_id);
            
            return view('organizations.security.remark.edit-remark', compact('editData'));

        } catch (\Exception $e) {
            return $e;
        }
    }
}