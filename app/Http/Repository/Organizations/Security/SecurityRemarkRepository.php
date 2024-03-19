<?php
namespace App\Http\Repository\Organizations\Security;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
use App\Models\ {
    SecurityRemark
};
use Config;

class SecurityRemarkRepository  {

    public function getAll(){
        try {
            // $dataOutputByid = SecurityRemark::find($id);

            $data_output= SecurityRemark::get();
          
            return $data_output;
        } catch (\Exception $e) {
      
            return $e;
        }
    }

    public function addAll($request)
    {
        try {
            $dataOutput = new SecurityRemark();
            $dataOutput->purchase_id = $request->purchase_id;
            $dataOutput->remark = $request->remark;
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

    // public function getById($id) {
    //     try {
    //         $designData= SecurityRemark::get();

    //         if ($designData->isEmpty()) {
    //             return null;
    //         } else {
    //             return $designData;
    //         }
    //     } catch (\Exception $e) {
    //         return [
    //             'msg' => 'Failed to get by id Citizen Volunteer.',
    //             'status' => 'error',
    //             'error' => $e->getMessage(), 
    //         ];
    //     }
    // }

    public function getById($id) {
        try {
           
            $dataOutputById = SecurityRemark::find($id);
            // dd($dataOutputById);
            // Check if data is found
            if ($dataOutputById !== null) {
                return $dataOutputById;
            } else {
                // Data not found
                return null;
            }
        } catch (\Exception $e) {
            // Catch and handle exceptions
            return [
                'msg' => $e->getMessage(), // Retrieve error message
                'status' => 'error'
            ];
        }
    }

    
    public function updateAll($request){
       
        try {
            // Update main Security Remark data
            $dataOutput = SecurityRemark::findOrFail($request->id);
            $dataOutput->purchase_id = $request->purchase_id;
            $dataOutput->remark = $request->remark;
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
                $deleteDataById = SecurityRemark::find($id);
                
                if ($deleteDataById) {
                    // if (file_exists_view(Config::get('FileConstant.STORE_RECEIPT_DELETE') . $deleteDataById->image)){
                    //     removeImage(Config::get('FileConstant.STORE_RECEIPT_DELETE') . $deleteDataById->image);
                    // }
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
    //         $rti = GatepassDetails::find($id);
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
