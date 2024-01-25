<?php
namespace App\Http\Repository\Organizations\HR\Employees;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
use App\Models\ {
HREmployee,User
};
use Config;

class EmployeesHrRepository  {


    public function getAll(){
        try {
            $data_output= HREmployee::with(['role', 'department'])
                        ->where('organization_id', session()->get('org_id'))
                        ->orderBy('updated_at', 'desc')
                        ->get();
            // dd($data_output);
            return $data_output;
        } catch (\Exception $e) {
            return $e;
        }
    }


    public function addAll($request)
{   
    try {
        // Insert data to users table
        // $userData = new User();
        // $userData->u_email = $request->email;
        // $userData->role_id = $request->role_id;
        // $userData->u_password = bcrypt($request->password);
        // $userData->save();

        $dataOutput = new HREmployee();
        $dataOutput->employee_name = $request->employee_name;
        $dataOutput->email = $request->email;
        $dataOutput->mobile_number = $request->mobile_number;
        $dataOutput->role_id = $request->role_id;
        $dataOutput->department_id = $request->department_id;
        $dataOutput->address = $request->address;
        $dataOutput->aadhar_number = $request->aadhar_number; // Add Aadhar number
        $dataOutput->pancard_number = $request->pancard_number; // Add Pancard number
        $dataOutput->total_experience = $request->total_experience; // Add Total Experience
        $dataOutput->highest_qualification = $request->highest_qualification; // Add Highest Qualification
        $dataOutput->gender = $request->gender; // Add Gender
        $dataOutput->joining_date = $request->joining_date; // Add Joining Date
        $dataOutput->image = 'null';
        $dataOutput->organization_id = $request->session()->get('org_id');
        $dataOutput->save();
        
        $last_insert_id = $dataOutput->id;
        $imageName = $last_insert_id . '_' . rand(100000, 999999) . '_image.' . $request->image->extension();

        $finalOutput = HREmployee::find($last_insert_id);
        $finalOutput->image = $imageName;
        $finalOutput->save();

        return [
            'ImageName' => $imageName,
            'status' => 'success'
        ];

    } catch (\Exception $e) {
        return [
            'msg' => $e->getMessage(),
            'status' => 'error'
        ];
    }
}

    public function getById($id){
    try {
            $dataOutputByid = HREmployee::find($id);
            if ($dataOutputByid) {
                return $dataOutputByid;
            } else {
                return null;
            }
        } catch (\Exception $e) {
            return [
                'msg' => $e,
                'status' => 'error'
            ];
        }
    }

   public function updateAll($request)
{
    try {
        $dataOutput = HREmployee::find($request->id);

        if (!$dataOutput) {
            return [
                'msg' => 'Update Data not found.',
                'status' => 'error'
            ];
        }

        $previousEnglishImage = $dataOutput->image;
        $dataOutput->employee_name = $request->employee_name;
        $dataOutput->email = $request->email;
        $dataOutput->mobile_number = $request->mobile_number;
        $dataOutput->role_id = $request->role_id;
        $dataOutput->department_id = $request->department_id;
        $dataOutput->address = $request->address;
        $dataOutput->aadhar_number = $request->aadhar_number; // Add Aadhar number
        $dataOutput->pancard_number = $request->pancard_number; // Add Pancard number
        $dataOutput->total_experience = $request->total_experience; // Add Total Experience
        $dataOutput->highest_qualification = $request->highest_qualification; // Add Highest Qualification
        $dataOutput->gender = $request->gender; // Add Gender
        $dataOutput->joining_date = $request->joining_date; // Add Joining Date
        $dataOutput->image = 'null';
        $dataOutput->organization_id = $request->session()->get('org_id');

        $dataOutput->save();
        $last_insert_id = $dataOutput->id;

        $return_data['last_insert_id'] = $last_insert_id;
        $return_data['image'] = $previousEnglishImage;
        return  $return_data;

    } catch (\Exception $e) {
        return [
            'msg' => 'Failed to Update Data.',
            'status' => 'error',
            'error' => $e->getMessage() // Return the error message for debugging purposes
        ];
    }
}


    public function deleteById($id){
            try {
                $deleteDataById = HREmployee::find($id);
                // $userData = User::where('u_email', $deleteDataById->email)->first();
                // $userData->delete();
                // dd($deleteDataById->delete());
                if ($deleteDataById) {
                    if (file_exists_view(Config::get('DocumentConstant.EMPLOYEES_HR_DELETE') . $deleteDataById->image)){
                        removeImage(Config::get('DocumentConstant.EMPLOYEES_HR_DELETE') . $deleteDataById->image);
                    }
                    $deleteDataById->delete();
                    
                    return $deleteDataById;
                } else {
                    return null;
                }
            } catch (\Exception $e) {
                return $e;
            }
    }

}
