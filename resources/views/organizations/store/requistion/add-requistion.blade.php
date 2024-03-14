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
                            <h1>Add Requisition Data</h1>
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
                                        <form action="{{ route('store-requistion') }}" method="POST" id="addDesignsForm"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group-inner">

                                                {{-- ========================== --}}
                                                <div class="container-fluid">
                                                    {{-- <form 
                                                    action="{{ route('addmorePost') }}"
                                                    method="POST"> --}}

                                                    {{-- @csrf --}}

                                                    @if ($errors->any())
                                                    <div class="alert alert-danger">

                                                        <ul>

                                                            @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                            @endforeach

                                                        </ul>

                                                    </div>
                                                    @endif

                                                    @if (Session::has('success'))
                                                    <div class="alert alert-success text-center">

                                                        <a href="#" class="close" data-dismiss="alert"
                                                            aria-label="close">×</a>

                                                        <p>{{ Session::get('success') }}</p>

                                                    </div>
                                                    @endif


                                                </div>

                                                {{-- =================== --}}

                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <label for="req_name">Requisition Name :</label>
                                                        <input type="text" class="form-control" id="req_name"
                                                            name="req_name" 
                                                            value="{{ old('req_name') }}"
                                                            placeholder="Enter your Requisition name ">
                                                    </div>

                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <label for="req_number">Requisition Number :</label>
                                                        <input type="text" class="form-control" id="req_number"
                                                            name="req_number" 
                                                            value="{{ old('req_number') }}"
                                                            placeholder="Enter your Requisition number ">
                                                    </div>

                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <label for="req_date">Requisition Date :</label>
                                                        <input type="date" class="form-control" id="req_date"
                                                            name="req_date" 
                                                            value="{{ old('req_date') }}"
                                                            placeholder="Enter Requisition date ">
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <label for="signature">Signature :</label>
                                                        <input type="file" class="form-control" accept="image/*" id="signature"
                                                            name="signature" 
                                                            value="{{ old('signature') }}"
                                                            placeholder="Enter signature">
                                                    </div>
                                                    </div>


                                                    <div style="margin-top:30px;" >
                                                    <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " > -->                                    
                                                    <table class="table table-bordered" id="dynamicTable">

                                                        <tr>
                                                            <th>Description</th>
                                                            <th>Quantity</th>
                                                            <th>Unit</th>
                                                            <th>Day</th>
                                                            <th>Remark</th>
                                                            <th>Stock</th>
                                                            <th>Action</th>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <input type="text" name="addmore[0][description]" value="{{ old('description') }}"
                                                                    placeholder="Enter your Description" class="form-control" />
                                                            </td>

                                                            <td>
                                                                <input type="text" name="addmore[0][quantity]" value="{{ old('quantity') }}"
                                                                    placeholder="Enter your quntity" class="form-control" />
                                                            </td>

                                                            <td>
                                                                <input type="text" name="addmore[0][unit]" value="{{ old('unit') }}"
                                                                    placeholder="Enter your unit" class="form-control" />
                                                            </td>

                                                            <td>
                                                                <input type="text" name="addmore[0][day]" value="{{ old('day') }}"
                                                                    placeholder="Enter your day" class="form-control" />
                                                            </td>

                                                            <td>
                                                                <input type="text" name="addmore[0][remark]" value="{{ old('remark') }}"
                                                                    placeholder="Enter your remark" class="form-control" />
                                                            </td>

                                                            <td>
                                                                <input type="text" name="addmore[0][stock]" value="{{ old('stock') }}"
                                                                    placeholder="Enter your stock" class="form-control" />
                                                            </td>

                                                            <td>
                                                                <button type="button" name="add" id="add"
                                                                    class="btn btn-success">Add More</button>
                                                            </td>

                                                        </tr>

                                                    </table>
                                                    <!-- </div> -->
                                                    </div>
                                                <div class="login-btn-inner">
                                                    <div class="row">
                                                        <div class="col-lg-5"></div>
                                                        <div class="col-lg-7">
                                                            <div class="login-horizental cancel-wp pull-left">
                                                                <a href="{{ route('list-requistion') }}" class="btn btn-white"
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

$("#add").click(function() {
    ++i;

    $("#dynamicTable").append(
        '<tr><td><input type="text" name="addmore[' +
        i +
        '][description]" placeholder="Enter your description" class="form-control" /></td><td><input type="text" name="addmore[' +
        i +
        '][quantity]" placeholder="Enter your quantity" class="form-control" /></td><td><input type="text" name="addmore[' +
        i +
        '][unit]" placeholder="Enter your unit" class="form-control" /></td><td><input type="text" name="addmore[' +
        i +
        '][day]" placeholder="Enter your day" class="form-control" /></td><td><input type="text" name="addmore[' +
        i +
        '][remark]" placeholder="Enter your rremark" class="form-control" /></td><td><input type="text" name="addmore[' +
        i +
        '][stock]" placeholder="Enter your stock" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>'
    );
});

$(document).on("click", ".remove-tr", function() {
    $(this).parents("tr").remove();
});
</script>
<script>
jQuery.noConflict();
jQuery(document).ready(function($) {
    $("#addDesignsForm").validate({
        rules: {          
            department_id: {
                required: true,
            },
            req_name: {
                required: true,
            },
            req_number: {
                required: true,
                number: true 
            },
            req_date: {
                required: true,
                date : true
            },
            signature: {
                required: true,
            },

            'addmore[0][description]': {
                required : true,                
            },
            'addmore[0][quantity]': {
                required : true,
                number: true
            },
            'addmore[0][unit]': {
                required : true,
            },
            'addmore[0][day]': {
                required : true,
            },
            'addmore[0][remark]': {
                required : true,
            },   
            'addmore[0][stock]': {
                required : true,
            },
        },

        messages: {
          
            department_id: {
                required: "Please select a valid department id.",
            },
            req_name: {
                required: "Please enter Requisition name.",
            },
            req_number: {
                required: "Please enter Requisition Number.",
                number: "Requisition Number should contain only numbers."
            },
            req_date: {
                required: "Please enter Requisition date.",
                date: "Please enter a valid Requisition date."
            },

            'addmore[0][description]': {
                required: "Please Enter Description.",                
            },
            'addmore[0][quantity]': {
                required: "Please Enter Quantity.",
                number: "Quantity should contain only numbers."
            },            
            'addmore[0][unit]': {
                required: "Please Enter Unit.",
            }, 
            'addmore[0][day]': {
                required: "Please Enter Day.",
            },
            'addmore[0][remark]': {
                required: "Please Enter Remark.",
            },
            'addmore[0][stock]': {
                required: "Please Enter Stock.",
            },     
            signature: {
                required: "Please select a Signature.",
                accept: "Please select an Signature image file.",
            },
        },
    });
});
</script>



@endsection