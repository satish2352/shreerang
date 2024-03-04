<?php

namespace App\Http\Controllers\Organizations\OwnerProduct;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Http\Services\Organizations\Productions\ProductionServices;
use Session;
use Validator;
use Config;
use Carbon;
// use App\Models\ {
//     DesignModel,
//     DesignDetailsModel
//     };

class OwnerProductController extends Controller
{ 
    // public function __construct(){
    //     $this->service = new ProductionServices();
    // }



    public function index(){
        try {
            return view('organizations.owner.owner-product.list-owner-product');
        } catch (\Exception $e) {
            return $e;
        }
    }  
    
    public function add(){
        try {
            return view('organizations.owner.owner-product.add-owner-product');
        } catch (\Exception $e) {
            return $e;
        }
    } 
    public function edit(){
        try {       
            return view('organizations.owner.owner-product.edit-owner-product');
        } catch (\Exception $e) {
            return $e;
        }
    }
}