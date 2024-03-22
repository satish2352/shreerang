<?php

namespace App\Http\Controllers\Organizations\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Organizations\Store\StoreReceiptServices;
use Session;
use Validator;
use Config;
use Carbon;
use App\Models\ {
    StoreReceipt,
    StoreReceiptDetails
};

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
            // 'signature' => 'required|image|mimes:jpeg,png,jpg',
        ];

        if($request->has('signature')) {
            $rules['signature'] = 'required|image|mimes:jpeg,png,jpg|max:'.Config::get("AllFileValidation.STORE_RECEIPT_IMAGE_MAX_SIZE").'|min:'.Config::get("AllFileValidation.STORE_RECEIPT_IMAGE_MIN_SIZE");
        }

        //|dimensions:min_width=1500,min_height=500,max_width=2000,max_height=1000

        $messages = [                        
            'store_date.required' => 'Please enter a valid Store Date.',
            
            'name.required' => 'The Store Person name is required.',
            'name.string' => 'The Store Person name must be a valid string.',
            
            'contact_number.required' => 'Please Enter contact number.',
            'contact_number.string' => 'The contact number must be a valid string.',

            'remark.required' => 'The remark is required.',
            'remark.string' => 'The remark must be a valid string.',
            
            'signature.required' => 'The image is required.',
            'signature.image' => 'The image must be a valid image file.',
            'signature.mimes' => 'The image must be in JPEG, PNG, JPG format.',
            'signature.max' => 'The image size must not exceed '.Config::get("AllFileValidation.STORE_RECEIPT_IMAGE_MAX_SIZE").'KB .',
            'signature.min' => 'The image size must not be less than '.Config::get("AllFileValidation.STORE_RECEIPT_IMAGE_MIN_SIZE").'KB .',
            // 'signature.dimensions' => 'The image dimensions must be between 1500x500 and 2000x1000 pixels.',
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
        return view('organizations.store.store-receipt.edit-store-receipt', compact('editData'));
    }

    public function update(Request $request){
            
        $rules = [
            'store_date' => 'required',
            'name' => 'required|string',
            'contact_number' => 'required|string',
            'remark' => 'required|string',
            // 'signature' => 'required|image|mimes:jpeg,png,jpg',
        ];

        if($request->has('signature')) {
            $rules['signature'] = 'required|image|mimes:jpeg,png,jpg|max:'.Config::get("AllFileValidation.STORE_RECEIPT_IMAGE_MAX_SIZE").'|min:'.Config::get("AllFileValidation.STORE_RECEIPT_IMAGE_MIN_SIZE");
        }

        //|dimensions:min_width=1500,min_height=500,max_width=2000,max_height=1000

        $messages = [                        
            'store_date.required' => 'Please enter a valid Store Date.',
            
            'name.required' => 'The Store Person name is required.',
            'name.string' => 'The Store Person name must be a valid string.',
            
            'contact_number.required' => 'Please Enter contact number.',
            'contact_number.string' => 'The contact number must be a valid string.',

            'remark.required' => 'The remark is required.',
            'remark.string' => 'The remark must be a valid string.',
            
            'signature.required' => 'The image is required.',
            'signature.image' => 'The image must be a valid image file.',
            'signature.mimes' => 'The image must be in JPEG, PNG, JPG format.',
            'signature.max' => 'The image size must not exceed '.Config::get("AllFileValidation.STORE_RECEIPT_IMAGE_MAX_SIZE").'KB .',
            'signature.min' => 'The image size must not be less than '.Config::get("AllFileValidation.STORE_RECEIPT_IMAGE_MIN_SIZE").'KB .',
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
                        return redirect('list-store-receipt')->with(compact('msg', 'status'));
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
                    return redirect('list-store-receipt')->with(compact('msg', 'status'));
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
                    return redirect('edit-store-receipt/{id}')->with(compact('msg', 'status'));
                    
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

    public function removeStoreReceiptDetails(Request $request, $rowId) {
        try {
            $designDetails = StoreReceiptDetails::find($rowId);
    
            if ($designDetails) {
                $designDetails->delete();
                return response()->json(['msg' => 'Store Receipt details removed successfully.']);
            } else {
                return response()->json(['msg' => 'Store Receipt details not found.'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['msg' => 'Failed to remove Store Receipt details.', 'error' => $e->getMessage()], 500);
        }
    }

}
