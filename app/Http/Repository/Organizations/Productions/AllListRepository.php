<?php
namespace App\Http\Repository\Organizations\Productions;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
use App\Models\ {
    Business, 
    DesignModel,
    BusinessApplicationProcesses,
    ProductionModel,
    DesignRevisionForProd
    };
use Config;

class AllListRepository  {


//   public function getAllListDesignRecievedForCorrection(){
//     try {

//         $array_to_be_check = [config('constants.PRODUCTION_DEPARTMENT.DESIGN_SENT_TO_DESIGN_DEPT_FOR_REVISED')];

//         $data_output= BusinessApplicationProcesses::leftJoin('production', function($join) {
//             $join->on('business_application_processes.business_id', '=', 'production.business_id');
//           })
//           ->leftJoin('designs', function($join) {
//             $join->on('business_application_processes.business_id', '=', 'designs.business_id');
//           })
//           ->leftJoin('businesses', function($join) {
//             $join->on('business_application_processes.business_id', '=', 'businesses.id');
//           })
//           ->leftJoin('design_revision_for_prod', function($join) {
//             $join->on('business_application_processes.business_id', '=', 'design_revision_for_prod.business_id');
//           })
//           ->whereIn('business_application_processes.production_status_id',$array_to_be_check)
//           ->where('businesses.is_active',true)
//           ->select(
//               'businesses.id',
//               'businesses.title',
//               'businesses.descriptions',
//               'businesses.remarks',
//               'businesses.is_active',
//               'production.business_id',
//               'design_revision_for_prod.reject_reason_prod',
//               'design_revision_for_prod.id as design_revision_for_prod_id',
//               'designs.bom_image',
//               'designs.design_image'

//           )
//           ->distinct('design_revision_for_prod.id')
//           ->get();
//         // dd($data_output);
//         return $data_output;
//     } catch (\Exception $e) {
//         dd($e);
//         return $e;
//     }
// }



  public function getAllNewRequirement(){
    try {

        $array_to_be_check = [config('constants.PRODUCTION_DEPARTMENT.LIST_DESIGN_RECEIVED_FOR_PRODUCTION')];
        $data_output= BusinessApplicationProcesses::leftJoin('production', function($join) {
            $join->on('business_application_processes.business_id', '=', 'production.business_id');
          })
          ->leftJoin('designs', function($join) {
            $join->on('business_application_processes.business_id', '=', 'designs.business_id');
          })
          ->leftJoin('businesses', function($join) {
            $join->on('business_application_processes.business_id', '=', 'businesses.id');
          })
          ->leftJoin('design_revision_for_prod', function($join) {
            $join->on('business_application_processes.business_id', '=', 'design_revision_for_prod.business_id');
          })
          ->whereIn('business_application_processes.production_status_id',$array_to_be_check)
          ->where('businesses.is_active',true)
          ->select(
              'businesses.id',
              'businesses.title',
              'businesses.descriptions',
              'businesses.remarks',
              'businesses.is_active',
              'production.business_id',
              'production.id as productionId',
              'design_revision_for_prod.reject_reason_prod',
              'design_revision_for_prod.id as design_revision_for_prod_id',
              'designs.bom_image',
              'designs.design_image'

          )
          ->get();
        // dd($data_output);
        return $data_output;
          dd($data_output);
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
            ->whereIn('business_application_processes.production_status_id',$array_to_be_check)
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
          dd($e);
          return $e;
      }
  }

  public function getAllrejectdesign(){
    try {

        $array_to_be_check = [config('constants.PRODUCTION_DEPARTMENT.DESIGN_SENT_TO_DESIGN_DEPT_FOR_REVISED')];

        $data_output= BusinessApplicationProcesses::leftJoin('production', function($join) {
            $join->on('business_application_processes.business_id', '=', 'production.business_id');
          })
          ->leftJoin('designs', function($join) {
            $join->on('business_application_processes.business_id', '=', 'designs.business_id');
          })
          ->leftJoin('businesses', function($join) {
            $join->on('business_application_processes.business_id', '=', 'businesses.id');
          })
          ->leftJoin('design_revision_for_prod', function($join) {
            $join->on('business_application_processes.business_id', '=', 'design_revision_for_prod.business_id');
          })
          ->whereIn('business_application_processes.production_status_id',$array_to_be_check)
          ->where('businesses.is_active',true)
          ->select(
              'businesses.id',
              'businesses.title',
              'businesses.descriptions',
              'businesses.remarks',
              'businesses.is_active',
              'production.business_id',
              'design_revision_for_prod.reject_reason_prod',
              'designs.bom_image',
              'designs.design_image'

          )->get();
        //   dd($data_output);
        return $data_output;
    } catch (\Exception $e) {
        dd($e);
        return $e;
    }
  }





}