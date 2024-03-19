@extends('admin.layouts.master')
@section('content')
<style>
label {
    margin-top: 20px;
}

label.error {
    color: red;
    /* Change 'red' to your desired text color */
    font-size: 12px;
    /* Adjust font size if needed */
    /* Add any other styling as per your design */
}
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="sparkline12-list">
                <div class="sparkline12-hd">
                    <div class="main-sparkline12-hd">
                        <center>
                            <h1>Add Remark Data</h1>
                        </center>
                    </div>
                </div>
                <div class="sparkline12-graph">
                    <div class="basic-login-form-ad">
                        <div class="row">
                            @if (session('msg'))
                            <div class="alert alert-{{ session('status') }}">
                                {{ session('msg') }}
                            </div>
                            @endif

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
                                        <form action="{{ route('store-security-remark') }}" method="POST" id="addDesignsForm"
                                            enctype="multipart/form-data">
                                            @csrf        
                                            
                                            <div class="form-group-inner">
                                                <div class="row">                                                
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <label for="purchase_id">Select PO Number:</label>
                                                        <!-- <input type="text" class="form-control" id="purchase_id"
                                                            name="purchase_id" placeholder="Enter PO No"> -->
                                                            <select class="form-control custom-select-value" name="purchase_id" id="purchase_id">
                                                                <ul class="dropdown-menu ">
                                                                <option value="">Select PO</option>  
                                                                <option value="po1">PO 1</option>
                                                                <option value="po2">PO 2</option>
                                                                <option value="po3">PO 3</option>                                                              
                                                            </select>
                                                    </div>                                                                                                                                          
                                                    
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <label for="remark">Remark:</label>
                                                        <input type="text" class="form-control" id="remark"
                                                            name="remark" 
                                                            value="{{ old('remark') }}"
                                                            placeholder="Enter Remark">
                                                    </div>                                                                                                                                                                                        
                                                </div>
                                            </div>    

                                                <div class="login-btn-inner">
                                                    <div class="row">
                                                        <div class="col-lg-5"></div>
                                                        <div class="col-lg-7">
                                                            <div class="login-horizental cancel-wp pull-left">
                                                                <a href="{{ route('list-security-remark') }}" class="btn btn-white"
                                                                    style="margin-bottom:50px">Cancel</a>
                                                                <button class="btn btn-sm btn-primary login-submit-cs"
                                                                    type="submit" style="margin-bottom:50px">Save
                                                                    Data</button>
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
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
var i = 0;



</script>
<script>
jQuery.noConflict();
jQuery(document).ready(function($) {
    $("#addDesignsForm").validate({
        rules: {          
            purchase_id: {
                required: true
            },
            department_id : {
                required : true
            },
            remark :{
                required : true,
            },           
            status :{
                required : true,
            },            
        },
        messages: {
            purchase_id: {
                required: "Please Enter Po Number.",
            },              
            department_id : {
                required: "Please Enter Department.",
            },           
            remark : {
                required: "Please enter Remark.",
            },                      
            status : {
                required: "Please enter Status.",
            },            
        },
    });
});
</script>

@endsection