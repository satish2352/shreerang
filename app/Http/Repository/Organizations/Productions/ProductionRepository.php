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

            // $data_output = DesignModel::leftJoin('designs_details', 'designs.id', '=', 'designs_details.designs_id')
            // ->select('designs_details.*','designs_details.id as designs_details_id', 'designs.id as designs_main_id', 'designs.project_name', 'designs.design_page', 'designs.time_allocation', 'designs.image')
            // ->where('designs.id', $id)
            // ->get();
            dd($data_output);
            die();
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
            $designDetails->product_unit = $item['product_unit'];
            $designDetails->save();
        }

        // Updating image name in DesignModel
        $imageName = $last_insert_id . '_' . rand(100000, 999999) . '_image.' . $request->image->extension();
        $finalOutput = DesignModel::find($last_insert_id);
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

    // public function getById($id){
    // try {
    //         $dataOutputByid = DesignModel::find($id);
    //         if ($dataOutputByid) {
    //             return $dataOutputByid;
    //         } else {
    //             return null;
    //         }
    //     } catch (\Exception $e) {
    //         return [
    //             'msg' => $e,
    //             'status' => 'error'
    //         ];
    //     }
    // }

    public function getById($id) {
        try {
            $designData = DesignModel::leftJoin('designs_details', 'designs.id', '=', 'designs_details.designs_id')
                ->select('designs_details.*','designs_details.id as designs_details_id', 'designs.id as designs_main_id', 'designs.project_name', 'designs.design_page', 'designs.time_allocation', 'designs.image')
                ->where('designs.id', $id)
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
            // Update existing design details
            for ($i = 0; $i <= $request->design_count; $i++) {
                $designDetails = DesignDetailsModel::findOrFail($request->input("design_id_" . $i));
                
                $designDetails->design_name = $request->input("design_name_" . $i);
                $designDetails->product_quantity = $request->input("product_quantity_" . $i);
                $designDetails->product_size = $request->input("product_size_" . $i);
                $designDetails->product_unit = $request->input("product_unit_" . $i);
                $designDetails->save();
            }
    
            // Update main design data
            $dataOutput = DesignModel::findOrFail($request->design_main_id);
            $dataOutput->design_page = $request->design_page;
            $dataOutput->project_name = $request->project_name;
            $dataOutput->time_allocation = $request->time_allocation;
            $dataOutput->save();
   
            // Add new design details
            if ($request->has('addmore')) {
                foreach ($request->addmore as $key => $item) {
                    $designDetails = new DesignDetailsModel();
              
                    // Assuming 'designs_id' is a foreign key related to 'DesignModel'
                    $designDetails->designs_id = $request->design_main_id; // Set the parent design ID
                    $designDetails->design_name = $item['design_name'];
                    $designDetails->product_quantity = $item['product_quantity'];
                    $designDetails->product_size = $item['product_size'];
                    $designDetails->product_unit = $item['product_unit'];
                  
                 
                    $designDetails->save();
                     
                }
            }
    
            // Updating image name in DesignModel if a new image is uploaded
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
    
    







    //     public function updateAll($request){
    //     try {
            
    //         for ($i=0; $i <= $request->design_count; $i++) { 

    //             $designDetails = DesignDetailsModel::where('id', $request->get("design_id_".$i))
    //             // ->where('design_name', $request->get("design_name_".$i))
    //             ->first();

    //             $designDetails->design_name =$request["design_name_".$i];
    //             $designDetails->product_quantity = $request["product_quantity_".$i];
    //             $designDetails->product_size = $request["product_size_".$i];
    //             $designDetails->product_unit = $request["product_unit_".$i];
    //             $designDetails->save();

    //         }

    //         $dataOutput = DesignModel::find($request->id);
    
    //         if (!$dataOutput) {
    //             return [
    //                 'msg' => 'Update Data not found.',
    //                 'status' => 'error'
    //             ];
    //         }
    
    //         $dataOutput->design_page = $request->design_page;
    //         $dataOutput->project_name = $request->project_name;
    //         $dataOutput->time_allocation = $request->time_allocation;
    //         $dataOutput->save();
    

    //         if (isset($request->addmore)) {
    //             foreach ($request->addmore as $item) {
    //                 $designDetails = new DesignDetailsModel();
    //                 $designDetails->designs_id = $request->get("design_id_" . $item['key']);
    //                 $designDetails->design_name = $item['design_name'];
    //                 $designDetails->product_quantity = $item['product_quantity'];
    //                 $designDetails->product_size = $item['product_size'];
    //                 $designDetails->product_unit = $item['product_unit'];
    //                 $designDetails->save();

    //             //    dd($designDetails);
    //             //    die(); 
    //             }
    //         }
    //         // Array to hold all designDetails data
    //         $allDesignDetails = [];
        
    //         // Updating image name in DesignModel if a new image is uploaded
    //         if ($request->hasFile('image')) {
    //             $imageName = $dataOutput->id . '_' . rand(100000, 999999) . '_image.' . $request->image->extension();
    //             $finalOutput = DesignModel::find($dataOutput->id);
    //             $finalOutput->image = $imageName;
    //             $finalOutput->save();
    //         }
    
    //         // Returning all designDetails data along with success message
    //         return [
    //             'msg' => 'Data updated successfully.',
    //             'status' => 'success',
    //             'designDetails' => $allDesignDetails
    //         ];
    
    //     } catch (\Exception $e) {
    //         return [
    //             'msg' => 'Failed to update data.',
    //             'status' => 'error',
    //             'error' => $e->getMessage() // Return the error message for debugging purposes
    //         ];
    //     }
    // }

    //     public function updateAll($request){
    //     try { 
       
    //         $dataOutput = DesignModel::find($request->id);

    //         if (!$dataOutput) {
    //             return [
    //                 'msg' => 'Update Data not found.',
    //                 'status' => 'error'
    //             ];
    //         }

    //         $previousEnglishImage = $dataOutput->image;
    //         $dataOutput->design_name = $request->design_name;
    //         $dataOutput->design_page = $request->design_page;
    //         $dataOutput->project_name = $request->project_name;
    //         $dataOutput->time_allocation=$request->time_allocation;
            

    //         $dataOutput->save();
    //         $last_insert_id = $dataOutput->id;

    //         $return_data['last_insert_id'] = $last_insert_id;
    //         $return_data['image'] = $previousEnglishImage;
    //         return  $return_data;
        
    //     } catch (\Exception $e) {
    //         return [
    //             'msg' => 'Failed to Update Data.',
    //             'status' => 'error',
    //             'error' => $e->getMessage() // Return the error message for debugging purposes
    //         ];
    //     }
    // }


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

    public function deleteByIdAddmore($id){
        try {
            $rti = DesignDetailsModel::find($id);
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