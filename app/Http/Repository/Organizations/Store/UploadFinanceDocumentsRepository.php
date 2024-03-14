<?php
namespace App\Http\Repository\Organizations\Store;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
use App\Models\ {
    UploadFinanceDocument
};
use Config;

class UploadFinanceDocumentsRepository  {

    public function getAll(){
        try {
            $data_output= UploadFinanceDocument::get();

            // $data_output = requisition::leftJoin('requisition_details', 'purchase_orders.id', '=', 'requisition_details.store_receipt_id')
            // ->select('requisition_details.*','requisition_details.id as designs_details_id', 'purchase_orders.id as purchase_main_id', 'purchase_orders.vendor_id', 'purchase_orders.po_date', 'purchase_orders.terms_condition', 'purchase_orders.image')
            // ->where('purchase_orders.id', $id)
            // ->get();
          
            return $data_output;

        } catch (\Exception $e) {
      
            return $e;
        }
    }
    // repository
public function addAll($request)
{
    try {
        $dataOutput = new UploadFinanceDocument();
        $dataOutput->grn_image = 'null';
        $dataOutput->sr_image = 'null';
        $dataOutput->save();
        $last_insert_id = $dataOutput->id;

        
        // Updating image name in finance documents
        $imageName = $last_insert_id . '_' . rand(100000, 999999) . '_image.' . $request->grn_image->extension();
        $finalOutput = UploadFinanceDocument::find($last_insert_id);
        $finalOutput->grn_image = $imageName;
        $finalOutput->save();

        $srImageName = $last_insert_id . '_' . rand(100000, 999999) . '_image.' . $request->sr_image->extension();
        $finalOutput = UploadFinanceDocument::find($last_insert_id);
        $finalOutput->sr_image = $srImageName;
        $finalOutput->save();

        return [
            'ImageName' => $imageName,
            'srImageName' => $srImageName,
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
            $designData= UploadFinanceDocument::get();

            // $designData = UploadFinanceDocument::leftJoin('requisition_details', 'store_receipt.id', '=', 'requisition_details.store_receipt_id')
            //     ->select('requisition_details.*','requisition_details.id as requisition_details_id', 'store_receipt.id as store_receipt_main_id',
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
            // Update existing finance documents details
            
            // Update main Requisition data
            $dataOutput = Requisition::findOrFail($request->design_main_id);
            $dataOutput->save();                 
    
            // Updating GRN image name in Finance Documents if a new image is uploaded
            if ($request->hasFile('image')) {
                $imageName = $dataOutput->id . '_' . rand(100000, 999999) . '_image.' . $request->grn_image->extension();
                $dataOutput->grn_image = $imageName;
                $dataOutput->save();
            }

             // Updating SR image name in Finance Documents if a new image is uploaded
             if ($request->hasFile('image')) {
                $imageName = $dataOutput->id . '_' . rand(100000, 999999) . '_image.' . $request->sr_image->extension();
                $dataOutput->sr_image = $imageName;
                $dataOutput->save();
            }
    
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
                $deleteDataById = UploadFinanceDocument::find($id);
                
                if ($deleteDataById) {
                    if (file_exists_view(Config::get('FileConstant.UPLOAD_FINANCE_DOC_DELETE') . $deleteDataById->image)){
                        removeImage(Config::get('FileConstant.UPLOAD_FINANCE_DOC_DELETE') . $deleteDataById->image);
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
    //         $rti = RequisitionDetails::find($id);
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
