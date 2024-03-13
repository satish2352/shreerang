<?php
namespace App\Http\Services\Organizations\Designers;
use App\Http\Repository\Organizations\Designers\DesignsRepository;
use Carbon\Carbon;
use App\Models\ {
    DesignModel
    };

use Config;
    class DesignsServices
    {
        protected $repo;
        public function __construct(){
        $this->repo = new DesignsRepository();
    }

    
    public function getAllNewRequirement(){
        try {
            return $this->repo->getAllNewRequirement();
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function getAll(){
        try {
            return $this->repo->getAll();
        } catch (\Exception $e) {
            return $e;
        }
    }
   
   
    public function getById($id){
        try {
            return $this->repo->getById($id);
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function updateAll($request){
        try {
           
            $last_id = $this->repo->updateAll($request);
            $path = Config::get('FileConstant.DESIGNS_ADD');
            $designImageName = $last_id['designImageName'];
            $bomImageName = $last_id['bomImageName'];
            uploadImage($request, 'design_image', $path, $designImageName);
            uploadImage($request, 'bom_image', $path, $bomImageName);

            if ($last_id) {
                return ['status' => 'success', 'msg' => 'Data Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => ' Data get Not Added.'];
            } 
        } catch (Exception $e) {
            // If an exception occurs, return error response with the error message
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }
    }

    // public function updateAll($request){
    //     try {
    //         $return_data = $this->repo->updateAll($request);
    //         // dd($request);
    //         $path = Config::get('FileConstant.DESIGNS_ADD');
    //         if ($request->hasFile('design_image')) {
    //             if ($return_data['design_image']) {
    //                 if (file_exists_view(Config::get('FileConstant.DESIGNS_DELETE') . $return_data['design_image'])) {
    //                     removeImage(Config::get('FileConstant.DESIGNS_DELETE') . $return_data['design_image']);
    //                 }

    //             }
    //             $designImageName = $return_data['last_insert_id'] . '_' . rand(100000, 999999) . '_english.' . $request->design_image->extension();
    //             uploadImage($request, 'design_image', $path, $designImageName);
    //             $slide_data = DesignModel::find($return_data['last_insert_id']);
    //             $slide_data->design_image = $designImageName;
    //             $slide_data->save();
    //         }
    
    //         if ($request->hasFile('bom_image')) {
    //             if ($return_data['bom_image']) {
    //                 if (file_exists_view(Config::get('FileConstant.DESIGNS_DELETE') . $return_data['bom_image'])) {
    //                     removeImage(Config::get('FileConstant.DESIGNS_DELETE') . $return_data['bom_image']);
    //                 }
    //             }
    //             $bomImageName = $return_data['last_insert_id'] . '_' . rand(100000, 999999) . '_marathi.' . $request->bom_image->extension();
    //             uploadImage($request, 'bom_image', $path, $bomImageName);
    //             $slide_data = DesignModel::find($return_data['last_insert_id']);
    //             $slide_data->bom_image = $bomImageName;
    //             $slide_data->save();
    //         }
    //         dd($return_data);
    //         if ($return_data) {
    //             return ['status' => 'success', 'msg' => 'Data Updated Successfully.'];
    //         } else {
    //             return ['status' => 'error', 'msg' => 'Data  Not Updated.'];
    //         }  
    //     } catch (Exception $e) {
    //         return ['status' => 'error', 'msg' => $e->getMessage()];
    //     }      
    // }
    // public function updateAll($request){
    //     try {
    //         $return_data = $this->repo->updateAll($request);
    //         // dd($request);
    //         $path = Config::get('FileConstant.DESIGNS_ADD');
            
    //         if ($request->hasFile('design_image') && isset($return_data['last_insert_id'])) {
    //             if (isset($return_data['design_image']) && file_exists_view(Config::get('FileConstant.DESIGNS_DELETE') . $return_data['design_image'])) {
    //                 removeImage(Config::get('FileConstant.DESIGNS_DELETE') . $return_data['design_image']);
    //             }
    //             $designImageName = $return_data['last_insert_id'] . '_' . rand(100000, 999999) . '_design.' . $request->design_image->extension();
    //             uploadImage($request, 'design_image', $path, $designImageName);
    //             $slide_data = DesignModel::find($return_data['last_insert_id']);
    //             $slide_data->design_image = $designImageName;
    //             $slide_data->save();
    //         }
    
    //         if ($request->hasFile('bom_image') && isset($return_data['last_insert_id'])) {
    //             if (isset($return_data['bom_image']) && file_exists_view(Config::get('FileConstant.DESIGNS_DELETE') . $return_data['bom_image'])) {
    //                 removeImage(Config::get('FileConstant.DESIGNS_DELETE') . $return_data['bom_image']);
    //             }
    //             $bomImageName = $return_data['last_insert_id'] . '_' . rand(100000, 999999) . '_bom.' . $request->bom_image->extension();
    //             uploadImage($request, 'bom_image', $path, $bomImageName);
    //             $slide_data = DesignModel::find($return_data['last_insert_id']);
    //             $slide_data->bom_image = $bomImageName;
    //             $slide_data->save();
    //         }
    //         dd($return_data);
    //         if ($return_data) {
    //             return ['status' => 'success', 'msg' => 'Data Updated Successfully.'];
    //         } else {
    //             return ['status' => 'error', 'msg' => 'Data  Not Updated.'];
    //         }  
    //     } catch (Exception $e) {
    //         return ['status' => 'error', 'msg' => $e->getMessage()];
    //     }      
    // }
    //    public function deleteById($id)
    // {
    //     try {
    //         $delete = $this->repo->deleteById($id);
    //         // dd($delete);
    //         if ($delete) {
    //             return ['status' => 'success', 'msg' => 'Deleted Successfully.'];
    //         } else {
    //             return ['status' => 'error', 'msg' => ' Not Deleted.'];
    //         }  
    //     } catch (Exception $e) {
    //         return ['status' => 'error', 'msg' => $e->getMessage()];
    //     } 
    // }
}