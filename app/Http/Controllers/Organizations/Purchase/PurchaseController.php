<?php

namespace App\Http\Controllers\Organizations\Purchase;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Organizations\Purchase\PurchaseServices;
use Session;
use Validator;
use Config;
use Carbon;

class PurchaseController extends Controller
{ 
   
    public function __construct(){
        $this->service = new PurchaseServices();
    }

    public function index(){
        try {
            // $getOutput = $this->service->getAll();
            $getOutput = $this->service->getAll();
            // dd($data_output);
            // dd($getOutput);
            // die();
            return view('organizations.purchase.purchase.list-purchase', compact('getOutput'));
        } catch (\Exception $e) {
            return $e;
        }
    }

    // public function index(){
    //     try {
    //         $getOutput = $this->service->getAll();
    //         dd($getOutput);
    //         die();
    //         return view('organizations.purchase.purchase.list-purchase', compact('getOutput'));
    //     } catch (\Exception $e) {
    //         return $e;
    //     }
    // }    


    public function add(){
            // $dept=DepartmentsModel::get();
            // $roles=RolesModel::get();
        return view('organizations.purchase.purchase.add-purchase');
    }


      public function store(Request $request){
        $rules = [
                'po_date' => 'required',
                'vendor_id' => 'required|string',
                'terms_condition' => 'required|string',
                'remark' => 'required|string',
                'transport_dispatch' => 'required|string',             
            ];

            if($request->has('image')) {
                $rules['image'] = 'required|image|mimes:jpeg,png,jpg|max:'.Config::get("AllFileValidation.PURCHASE_ORDER_IMAGE_MAX_SIZE").'|dimensions:min_width=1500,min_height=500,max_width=2000,max_height=1000|min:'.Config::get("AllFileValidation.PURCHASE_ORDER_IMAGE_MIN_SIZE");
            }

            $messages = [                        
                'po_date.required' => 'Please enter a valid PO Date.',
                        
                'vendor_id.required' => 'The Vendor is required.',
                'vendor_id.string' => 'The Vendor must be a valid string.',
                
                'terms_condition.required' => 'Please Enter Terms And Conditions.',
                'terms_condition.string' => 'The Terms And Conditions must be a valid string.',

                'remark.required' => 'The remark is required.',
                'remark.string' => 'The remark must be a valid string.',

                'transport_dispatch.required' => 'The Transport/Dispatch is required.',
                'transport_dispatch.string' => 'The Transport/Dispatch must be a valid string.',
                
                'image.required' => 'The image is required.',
                'image.image' => 'The image must be a valid image file.',
                'image.mimes' => 'The image must be in JPEG, PNG, JPG format.',
                'image.max' => 'The image size must not exceed '.Config::get("AllFileValidation.PURCHASE_ORDER_IMAGE_MAX_SIZE").'KB .',
                'image.min' => 'The image size must not be less than '.Config::get("AllFileValidation.PURCHASE_ORDER_IMAGE_MIN_SIZE").'KB .',
                'image.dimensions' => 'The image dimensions must be between 1500x500 and 2000x1000 pixels.',
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




  public function edit(Request $request){
    $edit_data_id = base64_decode($request->id);
    $editData = $this->service->getById($edit_data_id);
    // dd($editData);
    // die();
    return view('organizations.purchase.purchase.edit-purchase', compact('editData'));
}


        public function update(Request $request){
            
            $rules = [
                'po_date' => 'required',
                'vendor_id' => 'required|string',
                'terms_condition' => 'required|string',
                'remark' => 'required|string',
                'transport_dispatch' => 'required|string',             
            ];

            if($request->has('image')) {
                $rules['image'] = 'required|image|mimes:jpeg,png,jpg|max:'.Config::get("AllFileValidation.PURCHASE_ORDER_IMAGE_MAX_SIZE").'|dimensions:min_width=1500,min_height=500,max_width=2000,max_height=1000|min:'.Config::get("AllFileValidation.PURCHASE_ORDER_IMAGE_MIN_SIZE");
            }

            $messages = [                        
                'po_date.required' => 'Please enter a valid PO Date.',
                        
                'vendor_id.required' => 'The Vendor is required.',
                'vendor_id.string' => 'The Vendor must be a valid string.',
                
                'terms_condition.required' => 'Please Enter Terms And Conditions.',
                'terms_condition.string' => 'The Terms And Conditions must be a valid string.',

                'remark.required' => 'The remark is required.',
                'remark.string' => 'The remark must be a valid string.',

                'transport_dispatch.required' => 'The Transport/Dispatch is required.',
                'transport_dispatch.string' => 'The Transport/Dispatch must be a valid string.',
                
                'image.required' => 'The image is required.',
                'image.image' => 'The image must be a valid image file.',
                'image.mimes' => 'The image must be in JPEG, PNG, JPG format.',
                'image.max' => 'The image size must not exceed '.Config::get("AllFileValidation.PURCHASE_ORDER_IMAGE_MAX_SIZE").'KB .',
                'image.min' => 'The image size must not be less than '.Config::get("AllFileValidation.PURCHASE_ORDER_IMAGE_MIN_SIZE").'KB .',
                'image.dimensions' => 'The image dimensions must be between 1500x500 and 2000x1000 pixels.',
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
                            return redirect('list-purchase')->with(compact('msg', 'status'));
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
                        return redirect('list-purchase')->with(compact('msg', 'status'));
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
                        return redirect('edit-purchase/{id}')->with(compact('msg', 'status'));
                        
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

        public function removeDesignDetails(Request $request, $rowId) {
            try {
                $designDetails = DesignDetailsModel::find($rowId);
        
                if ($designDetails) {
                    $designDetails->delete();
                    return response()->json(['msg' => 'Design details removed successfully.']);
                } else {
                    return response()->json(['msg' => 'Design details not found.'], 404);
                }
            } catch (\Exception $e) {
                return response()->json(['msg' => 'Failed to remove design details.', 'error' => $e->getMessage()], 500);
            }
        }
        

}
