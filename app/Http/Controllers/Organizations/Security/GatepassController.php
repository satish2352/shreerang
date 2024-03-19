<?php

namespace App\Http\Controllers\Organizations\Security;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Organizations\Security\GatepassServices;
use Session;
use Validator;
use Config;
use Carbon;
use App\Models\ {
    Gatepass
    };

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

    public function update(Request $request){
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
                        return redirect('list-gatepass')->with(compact('msg', 'status'));
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
                    return redirect('list-gatepass')->with(compact('msg', 'status'));
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
                    return redirect('edit-gatepass/{id}')->with(compact('msg', 'status'));
                    
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

    public function removeGatepassDetails(Request $request, $rowId) {
        try {
            $designDetails = Gatepass::find($rowId);
    
            if ($designDetails) {
                $designDetails->delete();
                return response()->json(['msg' => 'Gatepass details removed successfully.']);
            } else {
                return response()->json(['msg' => 'Gatepass details not found.'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['msg' => 'Failed to remove Gatepass details.', 'error' => $e->getMessage()], 500);
        }
    }
    

}