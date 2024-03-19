<?php
namespace App\Http\Repository\Organizations\Store;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
use App\Models\ {
Requisition,
RequisitionDetails
};
use Config;

class RequisitionRepository  {


    public function getAll(){
        try {
            $data_output= Requisition::get();

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
        $dataOutput = new Requisition();
        $dataOutput->req_name = $request->req_name;
        $dataOutput->req_number = $request->req_number;
        $dataOutput->req_date = $request->req_date;
        $dataOutput->signature = 'null';
        $dataOutput->save();
        $last_insert_id = $dataOutput->id;

        // Save data into DesignDetailsModel
        foreach ($request->addmore as $item) {
            $designDetails = new RequisitionDetails();
            $designDetails->requisition_id = $last_insert_id;
            $designDetails->description = $item['description'];
            $designDetails->quantity = $item['quantity'];
            $designDetails->unit = $item['unit'];
            $designDetails->day = $item['day'];
            $designDetails->remark = $item['remark'];
            $designDetails->stock = $item['stock'];
            $designDetails->save();
        }

        // Updating image name in requisition
        $imageName = $last_insert_id . '_' . rand(100000, 999999) . '_image.' . $request->signature->extension();
        $finalOutput = Requisition::find($last_insert_id);
        $finalOutput->signature = $imageName;
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
            // $designData= Requisition::get();

            $designData = Requisition::leftJoin('requisition_details', 'requisition.id', '=', 'requisition_details.requisition_id')
            ->select('requisition_details.*', 'requisition_details.id as requisition_details_id', 'requisition.id as requisition_main_id', 'requisition.req_name', 'requisition.req_number', 'requisition.req_date','requisition.signature')
            ->where('requisition.id', $id)
            ->get();


            // $designData = Requisition::leftJoin('requisition_details', 'store_receipt.id', '=', 'requisition_details.store_receipt_id')
            //     ->select('requisition_details.*','requisition_details.id as requisition_details_id', 'store_receipt.id as store_receipt_main_id',
            //      'store_receipt.store_date', 'store_receipt.name', 'store_receipt.contact_number', 'store_receipt.remark', 'store_receipt.signature')
            //     ->where('store_receipt.id', $id)
            //     ->get();
            //     dd($designData);

            $designData = Requisition::leftJoin('requisition_details', 'requisition.id', '=', 'requisition_details.requisition_id')
                ->select('requisition_details.*', 'requisition_details.id as requisition_details_id', 
                'requisition.id as requisition_main_id', 
                'requisition.req_name', 'requisition.req_number', 
                'requisition.req_date','requisition.signature')
                ->where('requisition.id', $id)
                ->get();
            
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
            // Update existing Requisition details
            for ($i = 0; $i <= $request->design_count; $i++) {
                $designDetails = RequisitionDetails::findOrFail($request->input("design_id_" . $i));
                
                $designDetails->requisition_id = $request->input("requisition_id_" . $i);
                $designDetails->description = $request->input("description_" . $i);
                $designDetails->quantity = $request->input("quantity_" . $i);
                $designDetails->unit = $request->input("unit_" . $i);
                $designDetails->day = $request->input("day_" . $i);
                $designDetails->remark = $request->input("remark_" . $i);                
                $designDetails->stock = $request->input("stock_" . $i);
                $designDetails->save();
            }
    
            // Update main Requisition data
            $dataOutput = Requisition::findOrFail($request->requisition_main_id);
            $dataOutput->req_name = $request->req_name;
            $dataOutput->req_number = $request->req_number;
            $dataOutput->req_date = $request->req_date;
            $dataOutput->save();     

            // Add new Requisition details
            if ($request->has('addmore')) {
                foreach ($request->addmore as $key => $item) {
                    $designDetails = new RequisitionDetails();
              
                    // Assuming 'requisition_id' is a foreign key related to 'Requisition'
                    $designDetails->requisition_id = $request->requisition_main_id; // Set the parent design ID                    
                    $designDetails->description = $item['description'];
                    $designDetails->quantity = $item['quantity'];
                    $designDetails->unit = $item['unit'];
                    $designDetails->day = $item['day'];
                    $designDetails->remark = $item['remark'];
                    $designDetails->stock = $item['stock'];                   
                    $designDetails->save();                     
                }
            }
            
    
            // Updating image name in Requisition if a new image is uploaded
            if ($request->hasFile('image')) {
                $imageName = $dataOutput->id . '_' . rand(100000, 999999) . '_image.' . $request->signature->extension();
                $dataOutput->signature = $imageName;
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
                $deleteDataById = Requisition::find($id);
                
                if ($deleteDataById) {
                    if (file_exists_view(Config::get('FileConstant.REQUISITION_DELETE') . $deleteDataById->image)){
                        removeImage(Config::get('FileConstant.REQUISITION_DELETE') . $deleteDataById->image);
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
            $rti = RequisitionDetails::find($id);
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
