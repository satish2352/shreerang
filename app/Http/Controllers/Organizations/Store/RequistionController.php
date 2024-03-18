<?php

namespace App\Http\Controllers\Organizations\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Organizations\Store\RequisitionServices;
use Session;
use Validator;
use Config;
use Carbon;
// use App\Models\ {
//     DesignModel,
//     DesignDetailsModel
//     };

class RequistionController extends Controller
{ 
    public function __construct(){
        $this->service = new RequisitionServices();
    }


    public function index(){
        try {
                $getOutput = $this->service->getAll();

                return view('organizations.store.requistion.list-requistion', compact('getOutput'));

        } catch (\Exception $e) {
            return $e;
        }
    }  
    
    public function add(){
        try {
          
            return view('organizations.store.requistion.add-requistion');

        } catch (\Exception $e) {
            return $e;
        }
    } 

    public function store(Request $request){
        $rules = [
                'req_name' => 'required|string',                               
                'req_number' => 'required|string',
                'req_date' => 'required',
                'signature' => 'required|image|mimes:jpeg,png,jpg',
                // 'signature' => 'required|image|mimes:jpeg,png,jpg|max:10240|min:5',
            ];

            $messages = [                                               
                        
                        'req_name.required' => 'The Requisition name is required.',
                        'req_name.string' => 'The Requisition name must be a valid string.',
                        
                        'req_number.required' => 'Please Enter Requisition number.',
                        'req_number.string' => 'The Requisition number must be a valid string.',

                        'req_date.required' => 'Please enter a valid Store Date.',
                        
                        'signature.required' => 'The signature image is required.',
                        'signature.image' => 'The signature image must be a valid image file.',
                        'signature.mimes' => 'The signature image must be in JPEG, PNG, JPG format.',
                        // 'signature.max' => 'The signature image size must not exceed 10MB.',
                        // 'signature.min' => 'The signature image- size must not be less than 5KB.',
                    ];

  
          try {
              $validation = Validator::make($request->all(), $rules, $messages);
              
              if ($validation->fails()) {
                  return redirect('add-requsition')
                      ->withInput()
                      ->withErrors($validation);
              } else {
                  $add_record = $this->service->addAll($request);
                
                  if ($add_record) {
                      $msg = $add_record['msg'];
                      $status = $add_record['status'];
  
                      if ($status == 'success') {
                          return redirect('list-requistion')->with(compact('msg', 'status'));
                      } else {
                          return redirect('add-requistion')->withInput()->with(compact('msg', 'status'));
                      }
                  }
              }
          } catch (Exception $e) {
              return redirect('add-requistion')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
          }
      }



    public function edit(Request $request){
        try {
          
            $edit_data_id = base64_decode($request->id);
      
            $editData = $this->service->getById($edit_data_id);

            return view('organizations.store.requistion.edit-requistion' , compact('editData'));

        } catch (\Exception $e) {
            return $e;
        }
    } 
    

    // public function add(){
    //     return view('organizations.productions.products.add-products');
    // }



}
