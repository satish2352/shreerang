<?php
namespace App\Http\Services\Organizations\Store;
use App\Http\Repository\Organizations\Store\RequisitionRepository;
use Carbon\Carbon;
use App\Models\ {
    Requisition
    };

use Config;
    class RequisitionServices
    {
        protected $repo;
        public function __construct(){
        $this->repo = new RequisitionRepository();
    }

    public function getAll(){
        try {
            $data = $this->repo->getAll();
            return $data; // Add this line to return the data
        } catch (\Exception $e) {
            return $e;
        }
    }
    
    public function addAll($request){
        try {
            $last_id = $this->repo->addAll($request);
            // dd($last_id);

            $path = Config::get('FileConstant.REQUISITION_ADD');
            $ImageName = $last_id['ImageName'];
            uploadImage($request, 'signature', $path, $ImageName);
            
            if ($last_id) {
                return ['status' => 'success', 'msg' => 'Data Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => ' Data Not Added.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }

    
    public function getById($id){
        try {
            $result = $this->repo->getById($id);
            // dd($result); // Dump the result
            // die();
            return $result;
        } catch (\Exception $e) {
            dd($e); // Dump the exception
            return $e;
        }
    }
    

    public function updateAll($request){
        try {
            $return_data = $this->repo->updateAll($request);
            
            $path = Config::get('FileConstant.REQUISITION_ADD');
            if (isset($return_data['signature'])) {
                if (file_exists_view(Config::get('FileConstant.REQUISITION_DELETE') . $return_data['signature'])) {
                    removeImage(Config::get('FileConstant.REQUISITION_DELETE') . $return_data['signature']);
                }
            }
            if ($request->hasFile('signature')) {
                $englishImageName = $return_data['last_insert_id'] . '_' . rand(100000, 999999) . '_image.' . $request->signature->extension();
                uploadImage($request, 'signature', $path, $englishImageName);
                $slide_data = Requisition::find($return_data['last_insert_id']);
                $slide_data->signature = $englishImageName;
                $slide_data->save();
            }
            if ($return_data) {
                return ['status' => 'success', 'msg' => 'Data Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Data Not Updated.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }

    public function deleteById($id)
    {
        try {
            $delete = $this->repo->deleteById($id);
            // dd($delete);
            if ($delete) {
                return ['status' => 'success', 'msg' => 'Deleted Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => ' Not Deleted.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        } 
    }

    public function deleteByIdAddmore($id){
        try {
            $delete = $this->repo->deleteByIdAddmore($id);
            if ($delete) {
                return ['status' => 'success', 'msg' => 'Deleted Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => ' Not Deleted.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        } 
    }
}