@extends('admin.layouts.master')
@section('content')
<style>
    label {
        margin-top: 20px;
    }
    label.error {
    color: red; /* Change 'red' to your desired text color */
    font-size: 12px; /* Adjust font size if needed */
    /* Add any other styling as per your design */
}
</style>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="sparkline12-list">
            <div class="sparkline12-hd">
                <div class="main-sparkline12-hd">
                    <center><h1>Add Basic Product Specification</h1></center>
                </div>
            </div>
            <div class="sparkline12-graph">
                <div class="basic-login-form-ad">
                    <div class="row">
                        

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        @if (Session::get('status') == 'success')
                            <div class="col-md-12">
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>Success!</strong> {{ Session::get('msg') }}
                                </div>
                            </div>
                        @endif

                        @if (Session::get('status') == 'error')
                            <div class="col-md-12">
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>Error!</strong> {!! session('msg') !!}
                                </div>
                            </div>
                        @endif
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="all-form-element-inner">
                                <form action="" method="POST" id="addEmployeeForm" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group-inner">
                                        <div class="row d-grid justify-content-center  align-items-center">
                                            {{-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 "> --}}
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <label for="company_name">Title:</label>
                                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Employee name">
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="sparkline12-graph">
                                                    <div id="pwd-container1">
                                                        <div class="form-group">
                                                            <label for="password1">Description</label>
                                                            <textarea class="form-control" rows="3" type="text" class="form-control" id="description"
                                                            name="description" placeholder="Enter Remark"></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="pwstrength_viewport_progress"></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="sparkline12-graph">
                                                    <div id="pwd-container1">
                                                        <div class="form-group">
                                                            <label for="password1">Remark</label>
                                                            <textarea class="form-control" rows="3" type="text" class="form-control" id="remark"
                                                            name="remark" placeholder="Enter Remark"></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="pwstrength_viewport_progress"></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- </div> --}}
                                        </div>
                                        </div>
                                        <div class="login-btn-inner">
                                            <div class="row">
                                                <div class="col-lg-5"></div>
                                                <div class="col-lg-7">
                                                    <div class="login-horizental cancel-wp pull-left">
                                                        <a href="{{ route('list-owner-product') }}" class="btn btn-white" style="margin-bottom:50px">Cancel</a>
                                                        <button class="btn btn-sm btn-primary login-submit-cs" type="submit" style="margin-bottom:50px">Save Data</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="{{asset('js/password-meter/pwstrength-bootstrap.min.js')}}"></script>
    <script src="{{asset('js/password-meter/zxcvbn.js')}}"></script>
    <script src="{{asset('js/password-meter/password-meter-active.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
   jQuery.noConflict();
   jQuery(document).ready(function ($) {
      $("#addEmployeeForm").validate({
            rules: {
                title: {
                    required: true,
                },
                description: {
                    required: true,
                },
                remark: {
                    required: true,
                },
               
            },
            messages: {
                title: {
                    required: "Please enter Title.",
                },
                description: {
                    required: "Please enter Description.",
                },
                remark: {
                    required: "Please enter Remark.",
                },
              
            },
        });
    });
</script>
@endsection