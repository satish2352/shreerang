<?php

namespace App\Http\Controllers\Organizations\Productions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Organizations\Productions\ProductionServices;
use Illuminate\Validation\Rule;
use Session;
use Validator;
use Config;
use Carbon;

class ProductionController extends Controller
{ 
    public function __construct(){
        $this->service = new ProductionServices();
    }
    
    public function getAllNewRequirement(Request $request){
        try {
            $data_output = $this->service->getAllNewRequirement();
        
            return view('organizations.productions.product.design-upload.list-new-requirements-received-for-design', compact('data_output'));
        } catch (\Exception $e) {
            return $e;
        }
    } 
    public function index(){
        try {
            $data_output = $this->service->getAll();
            return view('organizations.designer.design-upload.list-design-upload', compact('data_output'));
        } catch (\Exception $e) {
            return $e;
        }
    }     
    

    public function acceptdesign($id){
        try {
            $update_data = $this->service->acceptdesign($id);
            $data_output = $this->service->getAllacceptdesign();
            return view('organizations.designer.design-upload.list-design-accepted', compact('data_output'));
        } catch (\Exception $e) {
            return $e;
        }
    } 

    public function rejectdesign($request){
        try {
            $update_data = $this->service->rejectdesign($request);
            $data_output = $this->service->getAllrejectdesign();
            return view('organizations.designer.design-upload.list-design-rejected', compact('data_output'));
        } catch (\Exception $e) {
            return $e;
        }
    } 
 
}