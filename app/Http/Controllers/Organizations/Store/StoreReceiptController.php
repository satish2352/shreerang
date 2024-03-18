<?php

namespace App\Http\Controllers\Organizations\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Organizations\Store\StoreReceiptServices;
use Session;
use Validator;
use Config;
use Carbon;
// use App\Models\ {
//     DesignModel,
//     DesignDetailsModel
//     };

class StoreReceiptController extends Controller
{ 
    public function __construct(){
        $this->service = new StoreReceiptServices();
    }

    public function index(){
        try {
            $getOutput = $this->service->getAll();
            return view('organizations.store.store-receipt.list-store-receipt', compact('getOutput') );
        } catch (\Exception $e) {
            return $e;
        }
    }  
    
    public function add(){
        try {
            return view('organizations.store.store-receipt.add-store-receipt');
        } catch (\Exception $e) {
            return $e;
        }
    } 
    public function store(Request $request){
        $rules = [
                'store_date' => 'required',
                'name' => 'required|string',
                'contact_number' => 'required|string',
                'remark' => 'required|string',
                'signature' => 'required|image|mimes:jpeg,png,jpg',
                // 'signature' => 'required|image|mimes:jpeg,png,jpg|max:10240|min:5',
            ];

            $messages = [                        
                        'store_date.required' => 'Please enter a valid Store Date.',
                        
                        'name.required' => 'The Store Person name is required.',
                        'name.string' => 'The Store Person name must be a valid string.',
                        
                        'contact_number.required' => 'Please Enter contact number.',
                        'contact_number.string' => 'The contact number must be a valid string.',

                        'remark.required' => 'The remark is required.',
                        'remark.string' => 'The remark must be a valid string.',
                        
                        'signature.required' => 'The signature image is required.',
                        'signature.image' => 'The signature image must be a valid image file.',
                        'signature.mimes' => 'The signature image must be in JPEG, PNG, JPG format.',
                        // 'signature.max' => 'The signature image size must not exceed 10MB.',
                        // 'signature.min' => 'The signature image- size must not be less than 5KB.',
                    ];

  
          try {
              $validation = Validator::make($request->all(), $rules, $messages);
              
              if ($validation->fails()) {
                  return redirect('add-store-receipt')
                      ->withInput()
                      ->withErrors($validation);
              } else {
                  $add_record = $this->service->addAll($request);
                
                  if ($add_record) {
                      $msg = $add_record['msg'];
                      $status = $add_record['status'];
  
                      if ($status == 'success') {
                          return redirect('list-store-receipt')->with(compact('msg', 'status'));
                      } else {
                          return redirect('add-store-receipt')->withInput()->with(compact('msg', 'status'));
                      }
                  }
              }
          } catch (Exception $e) {
              return redirect('add-store-receipt')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
          }
      }


    public function edit(Request $request){
        $edit_data_id = base64_decode($request->id);
      
        $editData = $this->service->getById($edit_data_id);
       
        // dd($editData);
        // die();
        return view('organizations.store.store-receipt.edit-store-receipt', compact('editData'));
    }

}
