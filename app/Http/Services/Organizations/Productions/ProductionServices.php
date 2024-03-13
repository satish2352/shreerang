<?php
namespace App\Http\Services\Organizations\Productions;
use App\Http\Repository\Organizations\Productions\ProductionRepository;
use Carbon\Carbon;
use App\Models\ {
    DesignModel
    };

use Config;
    class ProductionServices
    {
        protected $repo;
        public function __construct(){
        $this->repo = new ProductionRepository();
    }

    
    public function getAllNewRequirement(){
        try {
            return $this->repo->getAllNewRequirement();
        } catch (\Exception $e) {
            return $e;
        }
    }


    public function getAllacceptdesign(){
        try {
            return $this->repo->getAllacceptdesign();
        } catch (\Exception $e) {
            return $e;
        }
    }


    public function getAllrejectdesign(){
        try {
            return $this->repo->getAllrejectdesign();
        } catch (\Exception $e) {
            return $e;
        }
    }


    public function acceptdesign($id){
        try {
            $update_data = $this->repo->acceptdesign($id);
        } catch (\Exception $e) {
            return $e;
        }
    } 


    public function rejectdesign($id){
        try {
            $update_data = $this->repo->rejectdesign($id);
        } catch (\Exception $e) {
            return $e;
        }
    } 

}