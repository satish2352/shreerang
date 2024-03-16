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
        
            return view('organizations.productions.product.list_design_received_for_production', compact('data_output'));
        } catch (\Exception $e) {
            return $e;
        }
    } 
    
    public function acceptdesignlist(){
        try {
            $data_output = $this->service->getAllacceptdesign();
            return view('organizations.productions.product.list-design-accepted', compact('data_output'));
        } catch (\Exception $e) {
            return $e;
        }
    } 

    public function rejectdesignlist(){
        try {
            $data_output = $this->service->getAllrejectdesign();
            return view('organizations.productions.product.list-design-rejected', compact('data_output'));
        } catch (\Exception $e) {
            return $e;
        }
    } 
 

    public function acceptdesign($id){
        try {
            $acceptdesign = base64_decode($id);
            $update_data = $this->service->acceptdesign($acceptdesign);
            $data_output = $this->service->getAllacceptdesign();
            return view('organizations.productions.product.list-design-accepted', compact('data_output'));
        } catch (\Exception $e) {
            return $e;
        }
    } 

    public function rejectdesignedit($idtoedit){
        try {
            
            return view('organizations.productions.product.reject-design', compact('idtoedit'));
        } catch (\Exception $e) {
            return $e;
        }
    } 

    public function rejectdesign(Request $request){
        try {
            $update_data = $this->service->rejectdesign($request);
            $data_output = $this->service->getAllrejectdesign();
            return view('organizations.productions.product.list-design-rejected', compact('data_output'));
        } catch (\Exception $e) {
            return $e;
        }
    } 
 
}