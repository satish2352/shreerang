<?php

namespace App\Http\Controllers\Organizations\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Organizations\Store\RequisitionServices;
use Session;
use Validator;
use Config;
use Carbon;
use App\Models\ {
    Requisition,
    RequisitionDetails
    };

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
                // 'signature' => 'required|image|mimes:jpeg,png,jpg|',
            ];

            if($request->has('signature')) {
                $rules['signature'] = 'required|image|mimes:jpeg,png,jpg|max:'.Config::get("AllFileValidation.REQUISITION_IMAGE_MAX_SIZE").'|min:'.Config::get("AllFileValidation.REQUISITION_IMAGE_MIN_SIZE");
            }
    
            //|dimensions:min_width=1500,min_height=500,max_width=2000,max_height=1000

            $messages = [
                'req_name.required' => 'The Requisition name is required.',
                'req_name.string' => 'The Requisition name must be a valid string.',
                
                'req_number.required' => 'Please Enter Requisition number.',
                'req_number.string' => 'The Requisition number must be a valid string.',

                'req_date.required' => 'Please enter a valid Store Date.',
                
                'signature.required' => 'The image is required.',
                'signature.image' => 'The image must be a valid image file.',
                'signature.mimes' => 'The image must be in JPEG, PNG, JPG format.',
                'signature.max' => 'The image size must not exceed '.Config::get("AllFileValidation.REQUISITION_IMAGE_MAX_SIZE").'KB .',
                'signature.min' => 'The image size must not be less than '.Config::get("AllFileValidation.REQUISITION_IMAGE_MIN_SIZE").'KB .',
                // 'signature.dimensions' => 'The image dimensions must be between 1500x500 and 2000x1000 pixels.',
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
    
    public function update(Request $request){            
        $rules = [
            'req_name' => 'required|string',                               
            'req_number' => 'required|string',
            'req_date' => 'required',
            // 'signature' => 'required|image|mimes:jpeg,png,jpg',
            // 'signature' => 'required|image|mimes:jpeg,png,jpg|max:10240|min:5',
        ];

        if($request->has('signature')) {
            $rules['signature'] = 'required|image|mimes:jpeg,png,jpg|max:'.Config::get("AllFileValidation.REQUISITION_IMAGE_MAX_SIZE").'|min:'.Config::get("AllFileValidation.REQUISITION_IMAGE_MIN_SIZE");
        }

        //|dimensions:min_width=1500,min_height=500,max_width=2000,max_height=1000

        $messages = [
            'req_name.required' => 'The Requisition name is required.',
            'req_name.string' => 'The Requisition name must be a valid string.',
            
            'req_number.required' => 'Please Enter Requisition number.',
            'req_number.string' => 'The Requisition number must be a valid string.',

            'req_date.required' => 'Please enter a valid Store Date.',
            
            'signature.required' => 'The image is required.',
            'signature.image' => 'The image must be a valid image file.',
            'signature.mimes' => 'The image must be in JPEG, PNG, JPG format.',
            'signature.max' => 'The image size must not exceed '.Config::get("AllFileValidation.REQUISITION_IMAGE_MAX_SIZE").'KB .',
            'signature.min' => 'The image size must not be less than '.Config::get("AllFileValidation.REQUISITION_IMAGE_MIN_SIZE").'KB .',
            // 'signature.dimensions' => 'The image dimensions must be between 1500x500 and 2000x1000 pixels.',
        ];

        try {
            $validation = Validator::make($request->all(),$rules, $messages);
            if ($validation->fails()) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors($validation);
            } else {
                
                $update_data = $this->service->updateAll($request);
                
                if ($update_data) {
                    $msg = $update_data['msg'];
                    $status = $update_data['status'];
                    if ($status == 'success') {
                        return redirect('list-requistion')->with(compact('msg', 'status'));
                    } else {
                        return redirect()->back()
                            ->withInput()
                            ->with(compact('msg', 'status'));
                    }
                }
            }
        } catch (Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with(['msg' => $e->getMessage(), 'status' => 'error']);
        }
    }

    public function destroy(Request $request){
        $delete_data_id = base64_decode($request->id);
        try {
            $delete_record = $this->service->deleteById($delete_data_id);            
            if ($delete_record) {
                $msg = $delete_record['msg'];
                $status = $delete_record['status'];
                if ($status == 'success') {
                    return redirect('list-requistion')->with(compact('msg', 'status'));
                } else {
                    return redirect()->back()
                        ->withInput()
                        ->with(compact('msg', 'status'));
                }
            }
        } catch (\Exception $e) {
            return $e;
        }
    } 


    public function destroyAddmore(Request $request){
        try {
            $delete_rti = $this->service->deleteByIdAddmore($request->delete_id);
            if ($delete_rti) {
                $msg = $delete_rti['msg'];
                $status = $delete_rti['status'];
                if ($status == 'success') {
                    return redirect('edit-requistion/{id}')->with(compact('msg', 'status'));
                    
                } else {
                    return redirect()->back()
                        ->withInput()
                        ->with(compact('msg', 'status'));
                }
            }
        } catch (\Exception $e) {
            return $e;
        }
    } 

    public function removeRequisitionDetails(Request $request, $rowId) {
        try {
            $designDetails = RequisitionDetails::find($rowId);
    
            if ($designDetails) {
                $designDetails->delete();
                return response()->json(['msg' => 'Requisition details removed successfully.']);
            } else {
                return response()->json(['msg' => 'Requisition details not found.'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['msg' => 'Failed to remove Requisition details.', 'error' => $e->getMessage()], 500);
        }
    }



}
