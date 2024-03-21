<?php
namespace App\Http\Repository\Organizations\Store;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
use App\Models\ {
StoreReceipt,
StoreReceiptDetails
};
use Config;

class StoreReceiptRepository  {

    public function getAll(){
        try {
            $data_output= StoreReceipt::get();

            // $data_output = StoreReceipt::leftJoin('purchase_order_details', 'purchase_orders.id', '=', 'purchase_order_details.store_receipt_id')
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
            $dataOutput = new StoreReceipt();
            $dataOutput->store_date = $request->store_date;
            $dataOutput->name = $request->name;
            $dataOutput->contact_number = $request->contact_number;
            $dataOutput->remark = $request->remark;
            $dataOutput->signature = 'null';
            $dataOutput->save();
            $last_insert_id = $dataOutput->id;

            // Save data into StoreReceiptDetails
            foreach ($request->addmore as $item) {
                $designDetails = new StoreReceiptDetails();
                $designDetails->store_receipt_id = $last_insert_id;
                $designDetails->quantity = $item['quantity'];
                $designDetails->description = $item['description'];
                $designDetails->price = $item['price'];
                $designDetails->amount = $item['amount'];
                $designDetails->total = $item['total'];
                $designDetails->save();
            }

            // Updating image name in StoreReceipt
            $imageName = $last_insert_id . '_' . rand(100000, 999999) . '_image.' . $request->signature->extension();
            $finalOutput = StoreReceipt::find($last_insert_id);
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
            // $designData= StoreReceipt::get();
                       
            $designData = StoreReceipt::leftJoin('store_receipt_details', 'store_receipt.id', '=', 'store_receipt_details.store_receipt_id')
            ->select('store_receipt_details.*', 'store_receipt_details.id as store_receipt_details_id',
             'store_receipt.id as store_receipt_main_id',
             'store_receipt.store_date' ,'store_receipt.remark',
             'store_receipt.name', 'store_receipt.contact_number', 'store_receipt.signature')
            ->where('store_receipt.id', $id)
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
            // Update existing Store Receipt details
            for ($i = 0; $i <= $request->design_count; $i++) {
                $designDetails = StoreReceiptDetails::findOrFail($request->input("design_id_" . $i));
                
                $designDetails->quantity = $request->input("quantity_" . $i);
                $designDetails->description = $request->input("description_" . $i);
                $designDetails->price = $request->input("price_" . $i);
                $designDetails->amount = $request->input("amount_" . $i);                
                $designDetails->total = $request->input("total_" . $i);
                $designDetails->save();
            }
    
            // Update main design data
            $dataOutput = StoreReceipt::findOrFail($request->store_receipt_main_id);
            $dataOutput->store_date = $request->store_date;
            $dataOutput->name = $request->name;
            $dataOutput->contact_number = $request->contact_number;
            $dataOutput->remark = $request->remark;
            $dataOutput->save();     

            // Add new design details
            if ($request->has('addmore')) {
                foreach ($request->addmore as $key => $item) {
                    $designDetails = new StoreReceiptDetails();
              
                    // Assuming 'store_receipt_id' is a foreign key related to 'StoreReceipt'
                    $designDetails->store_receipt_id = $request->store_receipt_main_id; // Set the parent design ID                    
                    $designDetails->quantity = $item['quantity'];
                    $designDetails->description = $item['description'];
                    $designDetails->price = $item['price'];
                    $designDetails->amount = $item['amount'];  
                    $designDetails->total = $item['total'];                   
                    $designDetails->save();                     
                }
            }
    
            $previousImage = $dataOutput->signature;
           
            $last_insert_id = $dataOutput->id;
            $return_data['last_insert_id'] = $last_insert_id;
            $return_data['signature'] = $previousImage;
            return  $return_data;
    
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
                $deleteDataById = StoreReceipt::find($id);
                
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

    public function deleteByIdAddmore($id){
        try {
            $rti = StoreReceiptDetails::find($id);
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
