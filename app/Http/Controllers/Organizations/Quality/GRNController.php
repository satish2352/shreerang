<?php

namespace App\Http\Controllers\Organizations\Quality;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Organizations\Quality\GRNServices;
use Session;
use Validator;
use Config;
use Carbon;
use App\Models\ {
    GRN,
    GRNDetails
    };

class GRNController extends Controller
{ 
    public function __construct(){
        $this->service = new GRNServices();
    }

    public function index(){
        try {
            $getOutput = $this->service->getAll();
            return view('organizations.quality.grn.list-grn', compact('getOutput'));

        } catch (\Exception $e) {
            return $e;
        }
    }  
    
    public function add(){
        try {
            return view('organizations.quality.grn.add-grn');
        } catch (\Exception $e) {
            return $e;
        }
    } 

    public function store(Request $request){
        $rules = [
            'grn_date' => 'required',
            'purchase_id' => 'required|string',
            'po_date' => 'required',
            'invoice_no' => 'required|string',
            'invoice_date' => 'required',
            'remark' => 'required|string',
            // 'image' => 'required|image|mimes:jpeg,png,jpg|',
        ];

        if($request->has('image')) {
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg|max:'.Config::get("AllFileValidation.GRN_IMAGE_MAX_SIZE").'|min:'.Config::get("AllFileValidation.GRN_IMAGE_MIN_SIZE");
        }

        //|dimensions:min_width=1500,min_height=500,max_width=2000,max_height=1000

        $messages = [                        
            'grn_date.required' => 'Please enter a valid GRN Date.',
            
            'purchase_id.required' => 'The Purchase Number is required.',
            'purchase_id.string' => 'The Purchase Number must be a valid string.',
            
            'po_date.required' => 'Please enter a valid PO Date.',
            
            'invoice_no.required' => 'Please Enter Invoice Number.',
            'invoice_no.string' => 'The Invoice Number must be a valid string.',

            'invoice_date.required' => 'Please enter a valid Invoice Date.',

            'remark.required' => 'The remark is required.',
            'remark.string' => 'The remark must be a valid string.',
            
            'image.required' => 'The image is required.',
            'image.image' => 'The image must be a valid image file.',
            'image.mimes' => 'The image must be in JPEG, PNG, JPG format.',
            'image.max' => 'The image size must not exceed '.Config::get("AllFileValidation.GRN_IMAGE_MAX_SIZE").'KB .',
            'image.min' => 'The image size must not be less than '.Config::get("AllFileValidation.GRN_IMAGE_MIN_SIZE").'KB .',
            // 'image.dimensions' => 'The image dimensions must be between 1500x500 and 2000x1000 pixels.',            
        ];
  
          try {
              $validation = Validator::make($request->all(), $rules, $messages);
              
              if ($validation->fails()) {
                  return redirect('add-grn')
                      ->withInput()
                      ->withErrors($validation);
              } else {
                  $add_record = $this->service->addAll($request);
                
                  if ($add_record) {
                      $msg = $add_record['msg'];
                      $status = $add_record['status'];
  
                      if ($status == 'success') {
                          return redirect('list-grn')->with(compact('msg', 'status'));
                      } else {
                          return redirect('add-grn')->withInput()->with(compact('msg', 'status'));
                      }
                  }
              }
          } catch (Exception $e) {
              return redirect('add-grn')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
          }
      }
      
    public function edit(Request $request){
           
        $edit_data_id = base64_decode($request->id);
      
        $editData = $this->service->getById($edit_data_id);

        return view('organizations.quality.grn.edit-grn', compact('editData'));
        
    }

    public function update(Request $request){
            
        $rules = [
            'grn_date' => 'required',
            'purchase_id' => 'required|string',
            'po_date' => 'required',
            'invoice_no' => 'required|string',
            'invoice_date' => 'required',
            'remark' => 'required|string',
            // 'image' => 'required|image|mimes:jpeg,png,jpg|',
        ];

        if($request->has('image')) {
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg|max:'.Config::get("AllFileValidation.GRN_IMAGE_MAX_SIZE").'|min:'.Config::get("AllFileValidation.GRN_IMAGE_MIN_SIZE");
        }

        //|dimensions:min_width=1500,min_height=500,max_width=2000,max_height=1000

        $messages = [                        
            'grn_date.required' => 'Please enter a valid GRN Date.',
            
            'purchase_id.required' => 'The Purchase Number is required.',
            'purchase_id.string' => 'The Purchase Number must be a valid string.',
            
            'po_date.required' => 'Please enter a valid PO Date.',
            
            'invoice_no.required' => 'Please Enter Invoice Number.',
            'invoice_no.string' => 'The Invoice Number must be a valid string.',

            'invoice_date.required' => 'Please enter a valid Invoice Date.',

            'remark.required' => 'The remark is required.',
            'remark.string' => 'The remark must be a valid string.',
            
            'image.required' => 'The image is required.',
            'image.image' => 'The image must be a valid image file.',
            'image.mimes' => 'The image must be in JPEG, PNG, JPG format.',
            'image.max' => 'The image size must not exceed '.Config::get("AllFileValidation.GRN_IMAGE_MAX_SIZE").'KB .',
            'image.min' => 'The image size must not be less than '.Config::get("AllFileValidation.GRN_IMAGE_MIN_SIZE").'KB .',
            // 'image.dimensions' => 'The image dimensions must be between 1500x500 and 2000x1000 pixels.',            
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
                        return redirect('list-grn')->with(compact('msg', 'status'));
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
            // dd($delete_record);
            if ($delete_record) {
                $msg = $delete_record['msg'];
                $status = $delete_record['status'];
                if ($status == 'success') {
                    return redirect('list-grn')->with(compact('msg', 'status'));
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
                    return redirect('edit-grn/{id}')->with(compact('msg', 'status'));
                    
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

    public function removeGRNDetails(Request $request, $rowId) {
        try {
            $designDetails = GRNDetails::find($rowId);
    
            if ($designDetails) {
                $designDetails->delete();
                return response()->json(['msg' => 'GRN details removed successfully.']);
            } else {
                return response()->json(['msg' => 'GRN details not found.'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['msg' => 'Failed to remove GRN details.', 'error' => $e->getMessage()], 500);
        }
    }

}