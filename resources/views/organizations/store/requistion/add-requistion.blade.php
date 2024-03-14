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
                            <h1>Add Requistion Data</h1>
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
                                        <form action="{{ route('store-products') }}" method="POST" id="addDesignsForm"
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
                                                    <label for="req_name">Requistion Name :</label>
                                                        <input type="text" class="form-control" id="req_name"
                                                            name="req_name" placeholder="Enter your requistion name ">
                                                    </div>

                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <label for="req_number">Requistion Number :</label>
                                                        <input type="text" class="form-control" id="req_number"
                                                            name="req_number" placeholder="Enter your requistion number ">
                                                    </div>

                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <label for="req_date">Requistion Date :</label>
                                                        <input type="date" class="form-control" id="req_date"
                                                            name="req_date" placeholder="Enter requistion date ">
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <label for="signature">Signature :</label>
                                                        <input type="file" class="form-control" accept="image/*" id="signature"
                                                            name="signature" placeholder="Enter signature">
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
                                                            <td><input type="text" name="addmore[0][description]"
                                                                    placeholder="Enter your description" class="form-control" />
                                                            </td>

                                                            <td><input type="text" name="addmore[0][quantity]"
                                                                    placeholder="Enter your quntity" class="form-control" />
                                                            </td>

                                                            <td><input type="text" name="addmore[0][unit]"
                                                                    placeholder="Enter your unit" class="form-control" />
                                                            </td>
                                                            <td><input type="text" name="addmore[0][day]"
                                                                    placeholder="Enter your day" class="form-control" />
                                                            </td>
                                                            <td><input type="text" name="addmore[0][remark]"
                                                                    placeholder="Enter your remark" class="form-control" />
                                                            </td>
                                                            <td><input type="text" name="addmore[0][stock]"
                                                                    placeholder="Enter your stock" class="form-control" />
                                                            </td>

                                                            <td><button type="button" name="add" id="add"
                                                                    class="btn btn-success">Add More</button></td>

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
                // Add your custom validation rule if needed
            },
            req_name: {
                required: true,
            },
            req_number: {
                required: true,
            },
            req_date: {
                required: true,
            },
            description: {
                required: true,
            },
            quantity: {
                required: true,
            },
            unit: {
                required: true,
            },
            day: {
                required: true,
            },          
            remark: {
                required: true,
            },
            stock: {
                required: true,
            },
            signature: {
                required: true,
            },
            status: {
                required: true,
            },
        },
        messages: {
          
            department_id: {
                required: "Please select a valid department id.",
            },
            req_name: {
                required: "Please enter requistion name.",
            },
            req_number: {
                required: "Please enter requistion number.",
            },
            req_date: {
                required: "Please enter requistion date.",
            },
            description: {
                required: "Please enter description.",
            },
            quantity: {
                required: "Please enter quantity.",
            },
            unit: {
                required: "Please enter unit.",
            },
            day: {
                required: "Please enter day.",
            },
            remark: {
                required: "Please enter remark.",
            },
            stock: {
                required: "Please enter stock.",
            },
            signature: {
                required: "Please select a signature.",
                accept: "Please select an image file.",
            },
        
            status: {
                required: "Please enter status",
            },

        },
    });
});
</script>



@endsection