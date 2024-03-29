<?php
namespace App\Http\Services\Organizations\Store;
use App\Http\Repository\Organizations\Store\UploadFinanceDocumentsRepository;
use Carbon\Carbon;
use App\Models\ {
    UploadFinanceDocument
    };

use Config;
    class UploadFinanceDocumentsServices
    {
        protected $repo;
        public function __construct(){
        $this->repo = new UploadFinanceDocumentsRepository();
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

            $path = Config::get('FileConstant.UPLOAD_FINANCE_DOC_ADD');
            $ImageName = $last_id['ImageName'];
            $srImageName = $last_id['srImageName'];
            uploadImage($request, 'grn_image', $path, $ImageName);
            uploadImage($request, 'sr_image', $path, $srImageName);
            //  dd($last_id);
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
            
            $path = Config::get('FileConstant.UPLOAD_FINANCE_DOC_ADD');

            //GRN Image
            if (isset($return_data['grn_image'])) {
                if (file_exists_view(Config::get('FileConstant.UPLOAD_FINANCE_DOC_DELETE') . $return_data['grn_image'])) {
                    removeImage(Config::get('FileConstant.UPLOAD_FINANCE_DOC_DELETE') . $return_data['grn_image']);
                }
            }
            if ($request->hasFile('grn_image')) {
                $englishImageName = $return_data['last_insert_id'] . '_' . rand(100000, 999999) . '_image.' . $request->grn_image->extension();
                uploadImage($request, 'grn_image', $path, $englishImageName);
                $slide_data = UploadFinanceDocument::find($return_data['last_insert_id']);
                $slide_data->grn_image = $englishImageName;
                $slide_data->save();
            }

            //SR Image
            if (isset($return_data['sr_image'])) {
                if (file_exists_view(Config::get('FileConstant.UPLOAD_FINANCE_DOC_DELETE') . $return_data['sr_image'])) {
                    removeImage(Config::get('FileConstant.UPLOAD_FINANCE_DOC_DELETE') . $return_data['sr_image']);
                }
            }
            if ($request->hasFile('sr_image')) {
                $englishImageName = $return_data['last_insert_id'] . '_' . rand(100000, 999999) . '_image.' . $request->sr_image->extension();
                uploadImage($request, 'sr_image', $path, $englishImageName);
                $slide_data = UploadFinanceDocument::find($return_data['last_insert_id']);
                $slide_data->sr_image = $englishImageName;
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

    // public function deleteByIdAddmore($id){
    //     try {
    //         $delete = $this->repo->deleteByIdAddmore($id);
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