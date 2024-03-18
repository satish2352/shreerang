<?php
namespace App\Http\Repository\Organizations\Business;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
use App\Models\ {
Vendor
};
use Config;

class VendorRepository  {

    public function getAll(){
        try {
            $data_output= Vendor::get();

            // $data_output = Vendor::leftJoin('purchase_order_details', 'purchase_orders.id', '=', 'purchase_order_details.store_receipt_id')
            // ->select('purchase_order_details.*','purchase_order_details.id as designs_details_id', 'purchase_orders.id as purchase_main_id', 'purchase_orders.vendor_id', 'purchase_orders.po_date', 'purchase_orders.terms_condition', 'purchase_orders.image')
            // ->where('purchase_orders.id', $id)
            // ->get();
          
            return $data_output;
        } catch (\Exception $e) {
      
            return $e;
        }
    }

    
//     public function addAll($request)
//     {
//         try {
//             $dataOutput = new Vendor();
//             $dataOutput->vendor_name = $request->vendor_name;
//             $dataOutput->address = $request->address;
//             $dataOutput->gst_no = $request->gst_no;
//             $dataOutput->contact_no = $request->contact_no;
//             $dataOutput->email =  $request->email;
//             $dataOutput->quote_no =  $request->quote_no;
//             $dataOutput->payment_terms =  $request->payment_terms;
//             $dataOutput->save();
//             $last_insert_id = $dataOutput->id;
// // dd($dataOutput);
//         } catch (\Exception $e) {
//             return [
//                 'msg' => $e->getMessage(),
//                 'status' => 'error'
//             ];
//         }
//     }


    
public function addAll($request)
{
    try {
        $dataOutput = new Vendor();
            $dataOutput->vendor_name = $request->vendor_name;
            $dataOutput->address = $request->address;
            $dataOutput->gst_no = $request->gst_no;
            $dataOutput->contact_no = $request->contact_no;
            $dataOutput->email =  $request->email;
            $dataOutput->quote_no =  $request->quote_no;
            $dataOutput->payment_terms =  $request->payment_terms;
            $dataOutput->save();
            $last_insert_id = $dataOutput->id;

        return [
            'msg' => 'Data Added Successfully',
            'status' => 'success'
        ];

    } catch (\Exception $e) {
        return [
            'msg' => $e->getMessage(),
            'status' => 'error'
        ];
    }
}

    public function getById($id) {
        try {
            $designData= Vendor::get();

            // $designData = Vendor::leftJoin('store_receipt_details', 'store_receipt.id', '=', 'store_receipt_details.store_receipt_id')
            //     ->select('store_receipt_details.*','store_receipt_details.id as store_receipt_details_id', 'store_receipt.id as store_receipt_main_id',
            //      'store_receipt.store_date', 'store_receipt.name', 'store_receipt.contact_number', 'store_receipt.remark', 'store_receipt.signature')
            //     ->where('store_receipt.id', $id)
            //     ->get();
            //     dd($designData);

            if ($designData->isEmpty()) {
                return null;
            } else {
                return $designData;
            }
        } catch (\Exception $e) {
            return [
                'msg' => 'Failed to get by id Citizen Volunteer.',
                'status' => 'error',
                'error' => $e->getMessage(), 
            ];
        }
    }

    
    public function updateAll($request){
       
        try {
           
    
            // Update main design data
            $dataOutput = Vendor::findOrFail($request->design_main_id);
            $dataOutput->vendor_name = $request->vendor_name;
            $dataOutput->address = $request->address;
            $dataOutput->gst_no = $request->gst_no;
            $dataOutput->contact_no = $request->contact_no;
            $dataOutput->email =  $request->email;
            $dataOutput->quote_no =  $request->quote_no;
            $dataOutput->payment_terms =  $request->payment_terms;
            $dataOutput->save();     

            // Returning success message
            return [
                'msg' => 'Data updated successfully.',
                'status' => 'success',
                'designDetails' => $request->all()
            ];
        } catch (\Exception $e) {
            return [
                'msg' => 'Failed to update data.',
                'status' => 'error',
                'error' => $e->getMessage()
            ];
        }
    }
    
    public function deleteById($id){
            try {
                $deleteDataById = DesignModel::find($id);
                
                if ($deleteDataById) {
                    if (file_exists_view(Config::get('FileConstant.STORE_RECEIPT_DELETE') . $deleteDataById->image)){
                        removeImage(Config::get('FileConstant.STORE_RECEIPT_DELETE') . $deleteDataById->image);
                    }
                    $deleteDataById->delete();
                    
                    return $deleteDataById;
                } else {
                    return null;
                }
            } catch (\Exception $e) {
                return $e;
            }
    }

    // public function deleteByIdAddmore($id){
    //     try {
    //         $rti = VendorDetails::find($id);
    //         if ($rti) {
    //             $rti->delete();           
    //             return $rti;
    //         } else {
    //             return null;
    //         }
    //     } catch (\Exception $e) {
    //         return $e;
    //     }
    // }
}
