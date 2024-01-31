<!-- Static Table Start -->
@extends('organizations.layouts.master')
@section('content')
<style>
.fixed-table-loading {
    display: none;
}
#table thead th {
    white-space: nowrap;
}
#table thead th{
    width: 300px !important; 
    padding-right: 49px !important;
padding-left: 20px !important;
}
.custom-datatable-overright table tbody tr td {
    padding-left: 19px !important;
    padding-right: 5px !important;
    font-size: 14px;
    text-align: left;
}
</style>

<div class="data-table-area mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1>Organization <span class="table-project-n">Data</span> Table</h1>
                                <div class="form-group-inner login-btn-inner row">
                                    <div class="col-lg-2" >
                                        <div class="login-horizental cancel-wp pull-left">
                                                <a href="{{ route('hr-add-employees') }}" ><button class="btn btn-sm btn-primary login-submit-cs" type="submit" >Add Staffs</button></a>
                                        </div>
                                    </div>
                                <div class="col-lg-10"></div>
                            </div>
                        </div>
                    </div>

                      @if (Session::get('status') == 'success')
                           <div class="alert alert-success alert-success-style1">
                                <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
										<span class="icon-sc-cl" aria-hidden="true">&times;</span>
									</button>
                                <i class="fa fa-check adminpro-checked-pro admin-check-pro" aria-hidden="true"></i>
                                <p><strong>Success!</strong> {{ Session::get('msg') }}</p>
                            </div>
                             @endif
                            @if (Session::get('status') == 'error')
                              <div class="alert alert-danger alert-mg-b alert-success-style4">
                                <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
										<span class="icon-sc-cl" aria-hidden="true">&times;</span>
									</button>
                                <i class="fa fa-times adminpro-danger-error admin-check-pro" aria-hidden="true"></i>
                                <p><strong>Danger!</strong> {{ Session::get('msg') }}</p>
                            </div>
                            @endif

                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <div id="toolbar">
                                <select class="form-control">
                                    <option value="">Export Basic</option>
                                    <option value="all">Export All</option>
                                    <option value="selected">Export Selected</option>
                                </select>
                            </div>                         
                           
                          
                            <div class="table-responsive"> 
                                <table id="table" data-toggle="table" data-pagination="true" data-search="true"
                                    data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true"
                                    data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                    data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true"
                                    data-toolbar="#toolbar">
                                    <thead>
                                        <tr>
                                            <th data-field="state" data-checkbox="true"></th>
                                            <th data-field="id">ID</th>
                                            <th data-field="company_name" data-editable="true">Employee Name</th>
                                            <th data-field="email" data-editable="true">Email</th>
                                            <th data-field="mobile_number" data-editable="true">Mobile Number</th>
                                            <th data-field="role_name" data-editable="true">Role Name</th>
                                            <th data-field="department_name" data-editable="true">Department Name</th>
                                            <th data-field="address" data-editable="true">Address</th>
                                            <th data-field="aadhar_number" data-editable="true">Aadhar Number</th>
                                            <th data-field="pancard_number" data-editable="true">Pancard Number</th>
                                            <th data-field="total_experience" data-editable="true">Total Experience</th>
                                            <th data-field="highest_qualification" data-editable="true">Highest Qualification</th>
                                            <th data-field="gender" data-editable="true">Gender</th>
                                            <th data-field="joining_date" data-editable="true">Joining Date</th>
                                            <th data-field="image" data-editable="false">Image</th>
                                            <th data-field="action">Action</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        @foreach($getOutput as $data)
                                        <tr>
                                            <td></td>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ucwords($data->employee_name)}}</td>
                                            <td>{{ucwords($data->email)}}</td>
                                            <td>{{ucwords($data->mobile_number)}}</td>
                                            <td>{{ isset($data->department->department_name) ? $data->department->department_name : 'N/A' }}</td>
                                            <td>{{ isset($data->role->role_name) ? $data->role->role_name : 'N/A' }}</td>
                                            <td>{{ucwords($data->address)}}</td>
                                            <td>{{ucwords($data->aadhar_number)}}</td>
                                            <td>{{ucwords($data->pancard_number)}}</td>
                                            <td>{{ucwords($data->total_experience)}}</td>
                                            <td>{{ucwords($data->highest_qualification)}}</td>
                                            <td>{{ucwords($data->gender)}}</td>
                                            <td>{{ucwords($data->joining_date)}}</td>
                                            <td><img style="max-width:250px; max-height:150px;" src="{{ Config::get('DocumentConstant.EMPLOYEES_VIEW') . $data->emp_image }}" alt="{{ strip_tags($data['company_name']) }} Image" /></td>
                                            <td>
                                                <div style="display: flex; align-items: center;">
                                                    <a href="{{route('hr-edit-employees', base64_encode($data->id))}}"><button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                                    <a href="{{route('hr-delete-employees', base64_encode($data->id))}} "><button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                                                </div>
                                            </td>
                                           </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
