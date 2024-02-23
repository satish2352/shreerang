<?php
namespace App\Http\Repository\Organizations\Productions;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
use App\Models\ {
DesignModel,
DesignDetailsModel
};
use Config;

class ProductionRepository  {


    public function getAll(){
        try {
            $data_output= DesignModel::get();
            return $data_output;
        } catch (\Exception $e) {
            return $e;
        }
    }


    // public function addAll($request)
    // {   
    //     try {
    //        //insert data to users table
           
    //         $dataOutput = new DesignModel();
    //         $dataOutput->design_name = $request->design_name;
    //         $dataOutput->design_page = $request->design_page;
    //         $dataOutput->project_name = $request->project_name;
    //         $dataOutput->time_allocation=$request->time_allocation;
    //         $dataOutput->image = 'null';
    //         $dataOutput->save();
    //         $last_insert_id = $dataOutput->id;
    //         $imageName = $last_insert_id . '_' . rand(100000, 999999) . '_image.' . $request->image->extension();

    //         $finalOutput = DesignModel::find($last_insert_id);
    //         $finalOutput->image = $imageName;
    //         $finalOutput->save();

    //         return [
    //             'ImageName' => $imageName,
    //             'status' => 'success'
    //         ];

    //     } catch (\Exception $e) {
    //         return [
    //             'msg' => $e->getMessage(),
    //             'status' => 'error'
    //         ];
    //     }
    // }
    // repository
public function addAll($request)
{
    try {
        $dataOutput = new DesignModel();
        $dataOutput->design_page = $request->design_page;
        $dataOutput->project_name = $request->project_name;
        $dataOutput->time_allocation = $request->time_allocation;
        $dataOutput->image = 'null';
        $dataOutput->save();
        $last_insert_id = $dataOutput->id;

        // Save data into DesignDetailsModel
        foreach ($request->addmore as $item) {
            $designDetails = new DesignDetailsModel();
            $designDetails->designs_id = $last_insert_id;
            $designDetails->design_name = $item['design_name'];
            $designDetails->product_quantity = $item['product_quantity'];
            $designDetails->product_size = $item['product_size'];
            $designDetails->save();
        }

        // Updating image name in DesignModel
        $imageName = $last_insert_id . '_' . rand(100000, 999999) . '_image.' . $request->image->extension();
        $finalOutput = DesignModel::find($last_insert_id);
        $finalOutput->image = $imageName;
        $finalOutput->save();
// dd($finalOutput);
// die();
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

    public function getById($id){
    try {
            $dataOutputByid = DesignModel::find($id);
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
       
            $dataOutput = DesignModel::find($request->id);

            if (!$dataOutput) {
                return [
                    'msg' => 'Update Data not found.',
                    'status' => 'error'
                ];
            }

            $previousEnglishImage = $dataOutput->image;
            $dataOutput->design_name = $request->design_name;
            $dataOutput->design_page = $request->design_page;
            $dataOutput->project_name = $request->project_name;
            $dataOutput->time_allocation=$request->time_allocation;
            

            $dataOutput->save();
            $last_insert_id = $dataOutput->id;

            $return_data['last_insert_id'] = $last_insert_id;
            $return_data['image'] = $previousEnglishImage;
            return  $return_data;
        
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
                $deleteDataById = DesignModel::find($id);
                
                if ($deleteDataById) {
                    if (file_exists_view(Config::get('DocumentConstant.DESIGNS_DELETE') . $deleteDataById->image)){
                        removeImage(Config::get('DocumentConstant.DESIGNS_DELETE') . $deleteDataById->image);
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

}