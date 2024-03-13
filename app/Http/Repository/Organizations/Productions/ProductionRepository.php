<?php
namespace App\Http\Repository\Organizations\Productions;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
use App\Models\ {
Business, 
DesignModel,
BusinessApplicationProcesses,
ProductionModel
};
use Config;

class ProductionRepository  {
    
    public function getAllNewRequirement(){
        try {

            $array_to_be_check = [config('constants.PRODUCTION_DEPARTMENT.LIST_DESIGN_RECEIVED_FOR_PRODUCTION')];
            $data_output= ProductionModel::leftJoin('businesses', function($join) {
                $join->on('production.business_id', '=', 'businesses.id');
              })
              ->leftJoin('business_application_processes', function($join) {
                $join->on('production.business_id', '=', 'business_application_processes.business_id');
              })
              ->whereIn('business_application_processes.design_status_id',$array_to_be_check)
              ->where('businesses.is_active',true)
              ->select(
                  'businesses.id',
                  'businesses.title',
                  'businesses.descriptions',
                  'businesses.remarks',
                  'businesses.is_active',
                  'production.business_id'

              )->get();
            return $data_output;
        } catch (\Exception $e) {
            return $e;
        }
    }


    public function getAllacceptdesign(){
        try {

            $array_to_be_check = [config('constants.PRODUCTION_DEPARTMENT.ACCEPTED_DESIGN_RECEIVED_FOR_PRODUCTION')];
            $data_output= ProductionModel::leftJoin('businesses', function($join) {
                $join->on('production.business_id', '=', 'businesses.id');
              })
              ->leftJoin('business_application_processes', function($join) {
                $join->on('production.business_id', '=', 'business_application_processes.business_id');
              })
              ->whereIn('business_application_processes.design_status_id',$array_to_be_check)
              ->where('businesses.is_active',true)
              ->select(
                  'businesses.id',
                  'businesses.title',
                  'businesses.descriptions',
                  'businesses.remarks',
                  'businesses.is_active',
                  'production.business_id'

              )->get();
            return $data_output;
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function getAllrejectdesign(){
        try {

            $array_to_be_check = [config('constants.PRODUCTION_DEPARTMENT.DESIGN_SENT_TO_DESIGN_DEPT_FOR_REVISED')];
            $data_output= ProductionModel::leftJoin('businesses', function($join) {
                $join->on('production.business_id', '=', 'businesses.id');
              })
              ->leftJoin('business_application_processes', function($join) {
                $join->on('production.business_id', '=', 'business_application_processes.business_id');
              })
              ->whereIn('business_application_processes.design_status_id',$array_to_be_check)
              ->where('businesses.is_active',true)
              ->select(
                  'businesses.id',
                  'businesses.title',
                  'businesses.descriptions',
                  'businesses.remarks',
                  'businesses.is_active',
                  'production.business_id'

              )->get();
            return $data_output;
        } catch (\Exception $e) {
            return $e;
        }
    }


    public function acceptdesign($id){
        try {
            // $production_data = ProductionModel::where('business_id', $id)->first();
            // $production_data->business_id = $id;
            // $production_data->design_id = $dataOutput->id;
            // $production_data->save();

            $business_application = BusinessApplicationProcesses::where('business_id', $id)->first();
            if ($business_application) {
                $business_application->business_id = $id;
                $business_application->business_status_id = config('constants.HIGHER_AUTHORITY.NEW_REQUIREMENTS_SENT_TO_DESIGN_DEPARTMENT');
                // $business_application->design_id = $dataOutput->id;
                $business_application->design_status_id = config('constants.DESIGN_DEPARTMENT.ACCEPTED_DESIGN_BY_PRODUCTION');
                // $business_application->production_id = $production_data->id;
                $business_application->production_status_id = config('constants.PRODUCTION_DEPARTMENT.ACCEPTED_DESIGN_RECEIVED_FOR_PRODUCTION');
                $business_application->save();
            }
        } catch (\Exception $e) {
            return $e;
        }
    } 


    public function rejectdesign($request){
        try {
            $production_data = ProductionModel::where('business_id', $request->business_id)->first();
            // $production_data->business_id = $request->business_id;
            $production_data->design_id = $request->design_id;
            $production_data->reject_design_remark = $request->reject_design_remark;
            $production_data->save();

            $business_application = BusinessApplicationProcesses::where('business_id', $request->business_id)->first();
            if ($business_application) {
                $business_application->business_id = $request->business_id;
                $business_application->business_status_id = config('constants.HIGHER_AUTHORITY.LIST_DESIGN_RECIEVED_FROM_PROD_DEPT_FOR_REVISED');
                $business_application->design_id = $request->design_id;
                $business_application->design_status_id = config('constants.DESIGN_DEPARTMENT.LIST_DESIGN_RECIEVED_FROM_PROD_DEPT_FOR_REVISED');
                $business_application->production_id =  $request->production_id;
                $business_application->production_status_id = config('constants.PRODUCTION_DEPARTMENT.DESIGN_SENT_TO_DESIGN_DEPT_FOR_REVISED');
                $business_application->save();
            }
        } catch (\Exception $e) {
            return $e;
        }
    } 



}