<?php

namespace App\Http\Controllers\Organizations\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Organizations\Store\UploadFinanceDocumentsServices;
use Session;
use Validator;
use Config;
use Carbon;
// use App\Models\ {
//     DesignModel,
//     DesignDetailsModel
//     };

class DocUploadFianaceController extends Controller
{ 
    public function __construct(){
        $this->service = new UploadFinanceDocumentsServices();
    }

    public function index(){
        try {          

            $getOutput = $this->service->getAll();
            return view('organizations.store.docuploadfinance.list-docuploadfinance', compact('getOutput'));
            
        } catch (\Exception $e) {
            return $e;
        }
    }  
    
    public function add(){
        try {

            return view('organizations.store.docuploadfinance.add-docuploadfinance');
            
        } catch (\Exception $e) {
            return $e;
        }
    } 

    public function store(Request $request){
        $rules = [
                'grn_image' => 'required|image|mimes:jpeg,png,jpg',
                // 'grn_image' => 'required|image|mimes:jpeg,png,jpg|max:10240|min:5',
                'sr_image' => 'required|image|mimes:jpeg,png,jpg',
                // 'sr_image' => 'required|image|mimes:jpeg,png,jpg|max:10240|min:5',
            ];

            $messages = [                                               
                        
                                                
                        'grn_image.required' => 'The GRN image is required.',
                        'grn_image.image' => 'The GRN image must be a valid image file.',
                        'grn_image.mimes' => 'The GRN image must be in JPEG, PNG, JPG format.',
                        // 'grn_image.max' => 'The GRN image size must not exceed 10MB.',
                        // 'grn_image.min' => 'The GRN image- size must not be less than 5KB.',

                        'sr_image.required' => 'The SR image is required.',
                        'sr_image.image' => 'The SR image must be a valid image file.',
                        'sr_image.mimes' => 'The SR image must be in JPEG, PNG, JPG format.',
                        // 'sr_image.max' => 'The SR image size must not exceed 10MB.',
                        // 'sr_image.min' => 'The SR image size must not be less than 5KB.',
                    ];

  
          try {
              $validation = Validator::make($request->all(), $rules, $messages);
              
              if ($validation->fails()) {
                  return redirect('add-docuploadfinance')
                      ->withInput()
                      ->withErrors($validation);
              } else {
                  $add_record = $this->service->addAll($request);
                
                  if ($add_record) {
                      $msg = $add_record['msg'];
                      $status = $add_record['status'];
  
                      if ($status == 'success') {
                          return redirect('list-docuploadfinance')->with(compact('msg', 'status'));
                      } else {
                          return redirect('add-docuploadfinance')->withInput()->with(compact('msg', 'status'));
                      }
                  }
              }
          } catch (Exception $e) {
              return redirect('add-docuploadfinance')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
          }
      }

    public function edit(Request $request){
        try {
          
            $edit_data_id = base64_decode($request->id);
      
            $editData = $this->service->getById($edit_data_id);

            return view('organizations.store.docuploadfinance.edit-docuploadfinance'  , compact('editData'));

        } catch (\Exception $e) {
            return $e;
        }
    } 
    

    // public function add(){
    //     return view('organizations.productions.products.add-products');
    // }
}
