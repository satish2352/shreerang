<?php
namespace App\Http\Repository\Organizations\Business;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
use App\Models\ {
Business
};
use Config;

class BusinessRepository  {


    public function getAll(){
        try {
            $data_output= Business::get();
            return $data_output;
        } catch (\Exception $e) {
            return $e;
        }
    }


public function addAll($request)
{
    try {
        $dataOutput = new Business();
        $dataOutput->title = $request->title;
        $dataOutput->descriptions = $request->descriptions;
        $dataOutput->remarks = $request->remarks;
      
        $dataOutput->save();

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
    

    public function getById($id){
    try {
            $dataOutputByid = Business::find($id);
            // dd($dataOutputByid);
            if ($dataOutputByid) {
                return $dataOutputByid;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return [
                'msg' => $e,
                'status' => 'error'
            ];
        }
    }

        public function updateAll($request){
        try { 
            $dataOutput = Business::find($request->id);
            // dd($dataOutput);

            if (!$dataOutput) {
                return [
                    'msg' => 'Update Data not found.',
                    'status' => 'error'
                ];
            }

            $dataOutput->title = $request->title;
            $dataOutput->descriptions = $request->descriptions;
            $dataOutput->remarks = $request->remarks;
            

            $dataOutput->save();

            return [
            'msg' => 'Data Added Successfully',
            'status' => 'success'
        ];
        
        } catch (\Exception $e) {
            return [
                'msg' => 'Failed to Update Data.',
                'status' => 'error',
                'error' => $e->getMessage() // Return the error message for debugging purposes
            ];
        }
    }


    public function deleteById($id){
            try {
                $deleteDataById = Business::find($id);
                
                if ($deleteDataById) {
                    $deleteDataById->delete();
                    return $deleteDataById;
                } else {
                    return null;
                }
            } catch (\Exception $e) {
                return $e;
            }
    }

}