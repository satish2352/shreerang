<?php
namespace App\Http\Repository\Organizations\Quality;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
use App\Models\ {
    GRN,
    GRNDetails
};
use Config;

class GRNRepository  {

    public function getAll(){
        try {
            $data_output= GRN::get();

            // $data_output = GRN::leftJoin('purchase_order_details', 'purchase_orders.id', '=', 'purchase_order_details.store_receipt_id')
            // ->select('purchase_order_details.*','purchase_order_details.id as designs_details_id', 'purchase_orders.id as purchase_main_id', 'purchase_orders.vendor_id', 'purchase_orders.po_date', 'purchase_orders.terms_condition', 'purchase_orders.image')
            // ->where('purchase_orders.id', $id)
            // ->get();

           
          
            return $data_output;
        } catch (\Exception $e) {
      
            return $e;
        }
    }

    
    public function addAll($request)
    {
        try {
            $dataOutput = new GRN();
            $dataOutput->grn_date = $request->grn_date;
            $dataOutput->purchase_id = $request->purchase_id;
            $dataOutput->po_date = $request->po_date;
            $dataOutput->invoice_no = $request->invoice_no;
            $dataOutput->invoice_date = $request->invoice_date;
            $dataOutput->remark = $request->remark;
            $dataOutput->image = 'null';
            $dataOutput->save();
            $last_insert_id = $dataOutput->id;

            // Save data into GRNDetails
            foreach ($request->addmore as $item) {
                $designDetails = new GRNDetails();
                $designDetails->grn_id = $last_insert_id;
                $designDetails->description = $item['description'];
                $designDetails->qc_check_remark = $item['qc_check_remark'];
                $designDetails->chalan_quantity = $item['chalan_quantity'];
                $designDetails->actual_quantity = $item['actual_quantity'];
                $designDetails->accepted_quantity = $item['accepted_quantity'];
                $designDetails->rejected_quantity = $item['rejected_quantity'];
                $designDetails->save();
            }

            // Updating image name in GRN
            $imageName = $last_insert_id . '_' . rand(100000, 999999) . '_image.' . $request->image->extension();
            $finalOutput = GRN::find($last_insert_id);
            $finalOutput->image = $imageName;
            $finalOutput->save();

            return [
                'ImageName' => $imageName,
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
            // $designData= GRN::get();

            $designData = GRN::leftJoin('tbl_grn_details', 'tbl_grn.id', '=', 'tbl_grn_details.grn_id')
            ->select('tbl_grn_details.*', 'tbl_grn_details.id as tbl_grn_details_id', 
                'tbl_grn.id as grn_main_id', 'tbl_grn.grn_date', 
                'tbl_grn.purchase_id' , 'tbl_grn.po_date', 
                'tbl_grn.invoice_no','tbl_grn.invoice_date',
                'tbl_grn.remark',
                'tbl_grn.image')
            ->where('tbl_grn.id', $id)
            ->get();
            // dd($designData);

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
            // Update existing Store Receipt details
            for ($i = 0; $i <= $request->design_count; $i++) {
                $designDetails = GRNDetails::findOrFail($request->input("design_id_" . $i));
                
                $designDetails->description = $request->input("description_" . $i);
                $designDetails->qc_check_remark = $request->input("qc_check_remark_" . $i);
                $designDetails->chalan_quantity = $request->input("chalan_quantity_" . $i);
                $designDetails->actual_quantity = $request->input("actual_quantity_" . $i);                
                $designDetails->accepted_quantity = $request->input("accepted_quantity_" . $i);
                $designDetails->rejected_quantity = $request->input("rejected_quantity_" . $i);
                $designDetails->save();
            }
    
            // Update main design data
            $dataOutput = GRN::findOrFail($request->grn_main_id);
            $dataOutput->grn_date = $request->grn_date;
            $dataOutput->purchase_id = $request->purchase_id;
            $dataOutput->po_date = $request->po_date;
            $dataOutput->invoice_no = $request->invoice_no;
            $dataOutput->invoice_date = $request->invoice_date;
            $dataOutput->remark = $request->remark;
            $dataOutput->save();     


            // Add new design details
            if ($request->has('addmore')) {
                foreach ($request->addmore as $key => $item) {
                    $designDetails = new GRNDetails();
              
                    // Assuming 'store_receipt_id' is a foreign key related to 'GRN'
                    $designDetails->grn_id = $request->grn_main_id; // Set the parent design ID                    
                    $designDetails->description = $item['description'];
                    $designDetails->qc_check_remark = $item['qc_check_remark'];                    
                    $designDetails->chalan_quantity = $item['chalan_quantity'];
                    $designDetails->actual_quantity = $item['actual_quantity'];  
                    $designDetails->accepted_quantity = $item['accepted_quantity'];
                    $designDetails->rejected_quantity = $item['rejected_quantity'];                   
                    $designDetails->save();                     
                }
            }
    
            // Updating image name in GRN if a new image is uploaded
            if ($request->hasFile('image')) {
                $imageName = $dataOutput->id . '_' . rand(100000, 999999) . '_image.' . $request->image->extension();
                $dataOutput->image = $imageName;
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
                $deleteDataById = GRN::find($id);
                
                if ($deleteDataById) {
                    if (file_exists_view(Config::get('FileConstant.GRN_DELETE') . $deleteDataById->image)){
                        removeImage(Config::get('FileConstant.GRN_DELETE') . $deleteDataById->image);
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

    public function deleteByIdAddmore($id){
        try {
            $rti = GRNDetails::find($id);
            if ($rti) {
                $rti->delete();           
                return $rti;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return $e;
        }
    }
}
