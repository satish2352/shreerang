<?php

namespace App\Http\Controllers\Organizations\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Http\Services\Organizations\Productions\ProductionServices;
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
    // public function __construct(){
    //     $this->service = new ProductionServices();
    // }



    public function index(){
        try {
          
          
            return view('organizations.store.store-receipt.list-store-receipt');
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
                // 'design_page' => 'required|max:255',
                // 'project_name' => 'required|string|max:20',
                // 'time_allocation' => 'required|string|max:255',
                // 'image' => 'required|image|mimes:jpeg,png,jpg|max:10240|min:5',
            ];

            $messages = [                        
                        // 'design_page.required' => 'The design page is required.',
                        // 'design_page.max' => 'The design page must not exceed 255 characters.',
                        
                        // 'project_name.required' => 'The project name is required.',
                        // 'project_name.string' => 'The project name must be a valid string.',
                        // 'project_name.max' => 'The project name must not exceed 20 characters.',
                        
                        // 'time_allocation.required' => 'The time allocation is required.',
                        // 'time_allocation.string' => 'The time allocation must be a valid string.',
                        // 'time_allocation.max' => 'The time allocation must not exceed 255 characters.',
                        
                        // 'image.required' => 'The image is required.',
                        // 'image.image' => 'The image must be a valid image file.',
                        // 'image.mimes' => 'The image must be in JPEG, PNG, JPG format.',
                        // 'image.max' => 'The image size must not exceed 10MB.',
                        // 'image.min' => 'The image size must not be less than 5KB.',
                    ];

  
          try {
              $validation = Validator::make($request->all(), $rules, $messages);
              
              if ($validation->fails()) {
                  return redirect('add-purchase')
                      ->withInput()
                      ->withErrors($validation);
              } else {
                  $add_record = $this->service->addAll($request);
                
                  if ($add_record) {
                      $msg = $add_record['msg'];
                      $status = $add_record['status'];
  
                      if ($status == 'success') {
                          return redirect('list-purchase')->with(compact('msg', 'status'));
                      } else {
                          return redirect('add-purchase')->withInput()->with(compact('msg', 'status'));
                      }
                  }
              }
          } catch (Exception $e) {
              return redirect('add-purchase')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
          }
      }

    public function edit(){
        try {
          
          
            return view('organizations.store.store-receipt.edit-store-receipt');
        } catch (\Exception $e) {
            return $e;
        }
    } 
    

    // public function add(){
    //     return view('organizations.store.products.add-products');
    // }



}
