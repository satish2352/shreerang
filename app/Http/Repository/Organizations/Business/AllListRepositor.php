<?php
namespace App\Http\Repository\Organizations\Business;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
use App\Models\ {
Business,
DesignModel,
BusinessApplicationProcesses
};
use Config;

class AllListRepositor  {


    public function getAllListForwardedToDesign(){
        try {

            $array_to_be_check = [config('constants.DESIGN_DEPARTMENT.LIST_NEW_REQUIREMENTS_RECEIVED_FOR_DESIGN')];
            $data_output= DesignModel::leftJoin('businesses', function($join) {
                $join->on('designs.business_id', '=', 'businesses.id');
              })
              ->leftJoin('business_application_processes', function($join) {
                $join->on('designs.business_id', '=', 'business_application_processes.business_id');
              })
              ->whereIn('business_application_processes.design_status_id',$array_to_be_check)
              ->where('businesses.is_active',true)
              ->select(
                  'businesses.id',
                  'businesses.title',
                  'businesses.descriptions',
                  'businesses.remarks',
                  'businesses.is_active',
                  'designs.business_id',
                  'designs.created_at'

              )->get();

            return $data_output;
        } catch (\Exception $e) {
            return $e;
        }
    }

}