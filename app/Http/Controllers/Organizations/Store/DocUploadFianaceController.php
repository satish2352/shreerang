<?php

namespace App\Http\Controllers\Organizations\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Organizations\Store\UploadFinanceDocumentsServices;
use Session;
use Validator;
use Config;
use Carbon;
use App\Models\ {
    UploadFinanceDocument
};

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
        // $rules = [
        //         'grn_image' => 'required|image|mimes:jpeg,png,jpg',
        //         // 'grn_image' => 'required|image|mimes:jpeg,png,jpg|max:10240|min:5',
        //         'sr_image' => 'required|image|mimes:jpeg,png,jpg',
        //         // 'sr_image' => 'required|image|mimes:jpeg,png,jpg|max:10240|min:5',
        //     ];

        if($request->has('grn_image')) {
            $rules['grn_image'] = 'required|image|mimes:jpeg,png,jpg|max:'.Config::get("AllFileValidation.FINANCE_DOCUMENT_IMAGE_MAX_SIZE").'|dimensions:min_width=1500,min_height=500,max_width=2000,max_height=1000|min:'.Config::get("AllFileValidation.FINANCE_DOCUMENT_IMAGE_MIN_SIZE");
        }

        if($request->has('sr_image')) {
            $rules['sr_image'] = 'required|image|mimes:jpeg,png,jpg|max:'.Config::get("AllFileValidation.FINANCE_DOCUMENT_IMAGE_MAX_SIZE").'|dimensions:min_width=1500,min_height=500,max_width=2000,max_height=1000|min:'.Config::get("AllFileValidation.FINANCE_DOCUMENT_IMAGE_MIN_SIZE");
        }

        $messages = [
            'grn_image.required' => 'The image is required.',
            'grn_image.image' => 'The image must be a valid image file.',
            'grn_image.mimes' => 'The image must be in JPEG, PNG, JPG format.',
            'grn_image.max' => 'The image size must not exceed '.Config::get("AllFileValidation.FINANCE_DOCUMENT_IMAGE_MAX_SIZE").'KB .',
            'grn_image.min' => 'The image size must not be less than '.Config::get("AllFileValidation.FINANCE_DOCUMENT_IMAGE_MIN_SIZE").'KB .',
            'grn_image.dimensions' => 'The image dimensions must be between 1500x500 and 2000x1000 pixels.',

            'sr_image.required' => 'The image is required.',
            'sr_image.image' => 'The image must be a valid image file.',
            'sr_image.mimes' => 'The image must be in JPEG, PNG, JPG format.',
            'sr_image.max' => 'The image size must not exceed '.Config::get("AllFileValidation.FINANCE_DOCUMENT_IMAGE_MAX_SIZE").'KB .',
            'sr_image.min' => 'The image size must not be less than '.Config::get("AllFileValidation.FINANCE_DOCUMENT_IMAGE_MIN_SIZE").'KB .',
            'sr_image.dimensions' => 'The image dimensions must be between 1500x500 and 2000x1000 pixels.',
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
    

    public function update(Request $request){
        // $rules = [
        //     'grn_image' => 'required|image|mimes:jpeg,png,jpg',
        //     // 'grn_image' => 'required|image|mimes:jpeg,png,jpg|max:10240|min:5',
        //     'sr_image' => 'required|image|mimes:jpeg,png,jpg',
        //     // 'sr_image' => 'required|image|mimes:jpeg,png,jpg|max:10240|min:5',
        // ];

        if($request->has('grn_image')) {
            $rules['grn_image'] = 'required|image|mimes:jpeg,png,jpg|max:'.Config::get("AllFileValidation.FINANCE_DOCUMENT_IMAGE_MAX_SIZE").'|dimensions:min_width=1500,min_height=500,max_width=2000,max_height=1000|min:'.Config::get("AllFileValidation.FINANCE_DOCUMENT_IMAGE_MIN_SIZE");
        }

        if($request->has('sr_image')) {
            $rules['sr_image'] = 'required|image|mimes:jpeg,png,jpg|max:'.Config::get("AllFileValidation.FINANCE_DOCUMENT_IMAGE_MAX_SIZE").'|dimensions:min_width=1500,min_height=500,max_width=2000,max_height=1000|min:'.Config::get("AllFileValidation.FINANCE_DOCUMENT_IMAGE_MIN_SIZE");
        }

        $messages = [
            'grn_image.required' => 'The image is required.',
            'grn_image.image' => 'The image must be a valid image file.',
            'grn_image.mimes' => 'The image must be in JPEG, PNG, JPG format.',
            'grn_image.max' => 'The image size must not exceed '.Config::get("AllFileValidation.FINANCE_DOCUMENT_IMAGE_MAX_SIZE").'KB .',
            'grn_image.min' => 'The image size must not be less than '.Config::get("AllFileValidation.FINANCE_DOCUMENT_IMAGE_MIN_SIZE").'KB .',
            'grn_image.dimensions' => 'The image dimensions must be between 1500x500 and 2000x1000 pixels.',

            'sr_image.required' => 'The image is required.',
            'sr_image.image' => 'The image must be a valid image file.',
            'sr_image.mimes' => 'The image must be in JPEG, PNG, JPG format.',
            'sr_image.max' => 'The image size must not exceed '.Config::get("AllFileValidation.FINANCE_DOCUMENT_IMAGE_MAX_SIZE").'KB .',
            'sr_image.min' => 'The image size must not be less than '.Config::get("AllFileValidation.FINANCE_DOCUMENT_IMAGE_MIN_SIZE").'KB .',
            'sr_image.dimensions' => 'The image dimensions must be between 1500x500 and 2000x1000 pixels.',
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
                        return redirect('list-docuploadfinance')->with(compact('msg', 'status'));
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
                    return redirect('list-docuploadfinance')->with(compact('msg', 'status'));
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
                    return redirect('edit-docuploadfinance/{id}')->with(compact('msg', 'status'));
                    
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
            $designDetails = UploadFinanceDocument::find($rowId);
    
            if ($designDetails) {
                $designDetails->delete();
                return response()->json(['msg' => 'Finance Documents details removed successfully.']);
            } else {
                return response()->json(['msg' => 'Finance Documents details not found.'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['msg' => 'Failed to remove Finance Documents details.', 'error' => $e->getMessage()], 500);
        }
    }
    
}
