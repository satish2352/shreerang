<?php

namespace App\Http\Controllers\Organizations\Business;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Organizations\Business\VendorServices;
use Session;
use Validator;
use Config;
use Carbon;
use App\Models\ {
    Vendor
    };

class VendorController extends Controller
{ 
    public function __construct(){
        $this->service = new VendorServices();
    }

    public function index(){
        try {

            $getOutput = $this->service->getAll();
            
            return view('organizations.business.vendor.list-vendor', compact('getOutput') );

        } catch (\Exception $e) {
            return $e;
        }
    }  
    
    public function add(){
        try {
          
            return view('organizations.business.vendor.add-vendor');

        } catch (\Exception $e) {
            return $e;
        }
    } 

    public function store(Request $request){

        // dd($request);

        $rules = [                
                'vendor_name' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'gst_no' => 'required|string',
                'contact_no' => 'required|string',
                'email' => 'required|email|max:255',
                'quote_no' => 'required|string',
                'payment_terms' => 'required|string',
            ];

            $messages = [                                                
                        'vendor_name.required' => 'The Vendor name is required.',
                        'vendor_name.string' => 'The Vendor name must be a valid string.',
                        'vendor_name.max' => 'The Vendor name must not exceed 255 characters.',
                        
                        'address.required' => 'Please enter the address.',
                        'address.string' => 'The address must be a valid string.',
                        'address.max' => 'The address must not exceed 255 characters.',

                        'gst_no.required' => 'The gst_no is required.',
                        'gst_no.string' => 'The gst_no must be a valid string.',

                        'contact_no.required' => 'Please enter the Contact number.',
                        'contact_no.string' => 'The Contact number must be a valid string.',
                        'contact_no.max' => 'The Contact number must not exceed 20 characters.',

                        'email.required' => 'Please enter the email.',
                        'email.email' => 'Please enter a valid email address.',
                        'email.max' => 'The email must not exceed 255 characters.',

                        'quote_no.required' => 'The Quote No is required.',
                        'quote_no.string' => 'The Quote No must be a valid string.',

                        'payment_terms.required' => 'The Payment Terms is required.',
                        'payment_terms.string' => 'The Payment Terms must be a valid string.',                       
                    ];

  
          try {
              $validation = Validator::make($request->all(), $rules, $messages);
              
              if ($validation->fails()) {
                  return redirect('add-vendor')
                      ->withInput()
                      ->withErrors($validation);
              } else {
                  $add_record = $this->service->addAll($request);
                
                  if ($add_record) {
                      $msg = $add_record['msg'];
                      $status = $add_record['status'];
  
                      if ($status == 'success') {
                          return redirect('list-vendor')->with(compact('msg', 'status'));
                      } else {
                          return redirect('add-vendor')->withInput()->with(compact('msg', 'status'));
                      }
                  }
              }
          } catch (Exception $e) {
              return redirect('add-vendor')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
          }
      }



    public function edit(Request $request){
        try {          
            $edit_data_id = base64_decode($request->id);
        
            $editData = $this->service->getById($edit_data_id);
            // dd($editData);
            // die();

            return view('organizations.business.vendor.edit-vendor', compact('editData'));

        } catch (\Exception $e) {
            return $e;
        }
    } 

    public function update(Request $request){
        $rules = [                
            'vendor_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'gst_no' => 'required|string',
            'contact_no' => 'required|string',
            'email' => 'required|email|max:255',
            'quote_no' => 'required|string',
            'payment_terms' => 'required|string',
        ];

        $messages = [                                                
                    'vendor_name.required' => 'The Vendor name is required.',
                    'vendor_name.string' => 'The Vendor name must be a valid string.',
                    'vendor_name.max' => 'The Vendor name must not exceed 255 characters.',
                    
                    'address.required' => 'Please enter the address.',
                    'address.string' => 'The address must be a valid string.',
                    'address.max' => 'The address must not exceed 255 characters.',

                    'gst_no.required' => 'The gst_no is required.',
                    'gst_no.string' => 'The gst_no must be a valid string.',

                    'contact_no.required' => 'Please enter the Contact number.',
                    'contact_no.string' => 'The Contact number must be a valid string.',
                    'contact_no.max' => 'The Contact number must not exceed 20 characters.',

                    'email.required' => 'Please enter the email.',
                    'email.email' => 'Please enter a valid email address.',
                    'email.max' => 'The email must not exceed 255 characters.',

                    'quote_no.required' => 'The Quote No is required.',
                    'quote_no.string' => 'The Quote No must be a valid string.',

                    'payment_terms.required' => 'The Payment Terms is required.',
                    'payment_terms.string' => 'The Payment Terms must be a valid string.',                       
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
                        return redirect('list-vendor')->with(compact('msg', 'status'));
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
                    return redirect('list-vendor')->with(compact('msg', 'status'));
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
                    return redirect('edit-vendor/{id}')->with(compact('msg', 'status'));
                    
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

    public function removeVendorDetails(Request $request, $rowId) {
        try {
            $designDetails = Vendor::find($rowId);
    
            if ($designDetails) {
                $designDetails->delete();
                return response()->json(['msg' => 'Vendor details removed successfully.']);
            } else {
                return response()->json(['msg' => 'Vendor details not found.'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['msg' => 'Failed to remove Vendor details.', 'error' => $e->getMessage()], 500);
        }
    }
    
}
