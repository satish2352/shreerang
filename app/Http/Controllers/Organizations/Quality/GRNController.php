<?php

namespace App\Http\Controllers\Organizations\Quality;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Organizations\Quality\GRNServices;
use Session;
use Validator;
use Config;
use Carbon;
// use App\Models\ {
//     GRN,
//     GRNDetails
//     };

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
                'image' => 'required|image|mimes:jpeg,png,jpg',
                // 'image' => 'required|image|mimes:jpeg,png,jpg|max:10240|min:5',
            ];

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
                        
                        'image.required' => 'The signature image is required.',
                        'image.image' => 'The signature image must be a valid image file.',
                        'image.mimes' => 'The signature image must be in JPEG, PNG, JPG format.',
                        // 'signature.max' => 'The signature image size must not exceed 10MB.',
                        // 'signature.min' => 'The signature image- size must not be less than 5KB.',
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
}