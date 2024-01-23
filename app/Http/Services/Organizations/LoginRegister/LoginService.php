<?php
namespace App\Http\Services\Organizations\LoginRegister;

use Illuminate\Http\Request;
use App\Http\Repository\Organizations\LoginRegister\LoginRepository;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Models\RolesModel;
class LoginService 
{
	protected $repo;
	public function __construct()
    {        
        $this->repo = new LoginRepository();
    }

    public function checkLogin($request) {
        $response = $this->repo->checkLogin($request);
        $roleName = RolesModel::join('tbl_employees', 'tbl_employees.role_id', '=', 'tbl_roles.id')
                ->where('tbl_employees.email',$request->email )
                ->select('tbl_roles.role_name')
                ->get();     
        $role="";
        foreach($roleName as $name)
        {
            $role=$name->role_name;
        }
            if($response['user_details']) {
            $password = $request['password'];
            if (Hash::check($password, $response['user_details']['u_password'])) {
                $request->session()->put('org_id',$response['user_details']['id']);
                $request->session()->put('role_name',$role);
                $request->session()->put('u_email',$response['user_details']['u_email']);
                $json = ['status'=>'success','msg'=>$response['user_details'],'role_id'=>$response['user_details']['role_id']];
            } else {
                $json = ['status'=>'failed','msg'=>'These credentials do not match our records.'];
            }
            
        } else {
            $json = ['status'=>'failed','msg'=>'These credentials do not match our records.'];
        }
        return $json;
    }
}