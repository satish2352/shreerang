@extends('admin.layouts.master')
@section('content')
<style>
label {
    margin-top: 10px;
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
                            <h1>Add GRN Data</h1>
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
                                        <form action="{{ route('store-grn') }}" method="POST" id="addDesignsForm"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <label for="grn_date">GRN Date:</label>
                                                        <input type="date" class="form-control" id="grn_date"
                                                            name="grn_date" 
                                                            value="{{ old('grn_date') }}"
                                                            placeholder="Enter GRN Date">
                                                    </div>

                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <label for="purchase_id">PO No.:</label>
                                                        <input type="text" class="form-control" id="purchase_id"
                                                            name="purchase_id" 
                                                            value="{{ old('purchase_id') }}"
                                                            placeholder="Enter Purchase No.">
                                                    </div>

                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <label for="po_date">PO Date :</label>
                                                        <input type="date" class="form-control" id="po_date"
                                                            name="po_date" 
                                                            value="{{ old('po_date') }}"
                                                            placeholder="Enter PO Date">
                                                    </div>                                               

                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <label for="invoice_no">Invoice No.:</label>
                                                        <input type="text" class="form-control" id="invoice_no"
                                                            name="invoice_no" 
                                                            value="{{ old('invoice_no') }}"
                                                            placeholder="Enter Invoice No">
                                                    </div>

                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <label for="invoice_date">Invoice Date:</label>
                                                        <input type="date" class="form-control" id="invoice_date"
                                                            name="invoice_date" 
                                                            value="{{ old('invoice_date') }}"
                                                            placeholder="Enter Invoice Date">
                                                    </div>

                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <label for="image">Signature:</label>
                                                        <input type="file" class="form-control" accept="image/*" id="image"
                                                            value="{{ old('image') }}"
                                                            name="image">
                                                    </div>
                                                </div>
                                                
                                                <div style="margin-top:20px">
                                                    <table class="table table-bordered" id="dynamicTable">
                                                        <tr>
                                                            <th>Description</th>
                                                            <th>QC Check</th>
                                                            <th>Chalan Quantity</th>
                                                            <th>Actual Quantity</th>
                                                            <th>Accepted Quantity</th>
                                                            <th>Rejected Quantity</th>
                                                            <th>Action</th>
                                                        </tr>

                                                        <tr>
                                                            <td><input type="text" name="addmore[0][description]" value="{{ old('description') }}"
                                                                    placeholder="Enter Description" class="form-control" />
                                                            </td>
                                                            <td><input type="text" name="addmore[0][qc_check_remark]" value="{{ old('qc_check_remark') }}"
                                                                    placeholder="Enter QC Check" class="form-control" />
                                                            </td>
                                                            <td><input type="text" name="addmore[0][chalan_quantity]" value="{{ old('chalan_quantity') }}" 
                                                                    placeholder="Enter Chalan Qty" class="form-control" />
                                                            </td>
                                                            <td><input type="text" name="addmore[0][actual_quantity]" value="{{ old('actual_quantity') }}"
                                                                    placeholder="Enter Actual Qty" class="form-control" />
                                                            </td>
                                                            <td><input type="text" name="addmore[0][accepted_quantity]" value="{{ old('accepted_quantity') }}"
                                                                    placeholder="Enter Accepted Qty" class="form-control" />
                                                            </td>
                                                            <td><input type="text" name="addmore[0][rejected_quantity]" value="{{ old('rejected_quantity') }}"
                                                                    placeholder="Enter Rejected Qty" class="form-control" />
                                                            </td>
                                                            <td><button type="button" name="add" id="add"
                                                                    class="btn btn-success">Add More</button></td>
                                                        </tr>
                                                    </table>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <label for="remark">Remark:</label>
                                                        <input type="text" class="form-control" id="remark"
                                                            name="remark" 
                                                            value="{{ old('remark') }}"
                                                            placeholder="Enter Remark">
                                                    </div>

                                                    <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <label for="remark">Remark:</label>
                                                            <textarea class="form-control" rows="3" type="text" class="form-control" id="remark"
                                                            name="remark" placeholder="Enter Remark"></textarea>
                                                    </div>                                                 -->
                                                </div>

                                                <div class="login-btn-inner">
                                                    <div class="row">
                                                        <div class="col-lg-5"></div>
                                                        <div class="col-lg-7">
                                                            <div class="login-horizental cancel-wp pull-left">
                                                                <a href="{{ route('list-grn') }}" class="btn btn-white"
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
        '][description]" placeholder="Enter Description" class="form-control" /></td><td><input type="text" name="addmore[' +
        i +
        '][qc_check_remark]" placeholder="Enter QC Check" class="form-control" /></td><td><input type="text" name="addmore[' +
        i +
        '][chalan_quantity]" placeholder="Enter Chalan Qty" class="form-control" /></td><td><input type="text" name="addmore[' +
        i +
        '][actual_quantity]" placeholder="Enter Actual Qty" class="form-control" /></td><td><input type="text" name="addmore[' +
        i+
        '][accepted_quantity]" placeholder="Enter Accepted Qty" class="form-control" /></td><td><input type="text" name="addmore[' +
        i+
        '][rejected_quantity]" placeholder="Enter Rejected Qty" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>'
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
            grn_date: {
                required: true,
                date: "Please enter a valid GRN date."
            },
            purchase_id: {
                required: true,
            },
            po_date:{
                required : true,
                date: "Please enter a valid PO date."
            },
            invoice_no: {
                required : true,
            },
            invoice_date : {
                required : true,
                date: "Please enter a valid Invoice date."
            },
            remark :{
                required : true,
            },
            image: {
                required: true,
                accept: "Please select an Signature Image file.",
            },
            'addmore[0][description]': {
                required : true,
            },
            'addmore[0][qc_check_remark]': {
                required : true,                
            },
            'addmore[0][chalan_quantity]': {
                required : true,
                number: true
            },
            'addmore[0][actual_quantity]': {
                required : true,
                number: true
            },
            'addmore[0][accepted_quantity]': {
                required : true,
                number: true
            },
            'addmore[0][rejected_quantity]': {
                required : true,
                number: true
            },  
        },
        messages: {
            grn_date: {
                required: "Please Select GRN Date.",
                date: "Please enter a valid GRN Date."
            },            
            purchase_id : {
                required: "Please Enter PO No",
            },
            po_date : {
                required: "Please Select PO Date.",
                date: "Please enter a valid PO Date."
            },            
            invoice_no: {
                required: "Please Enter Invoice No",
            },
            invoice_date : {
                required: "Please Select Invoice Date.",
                date: "Please enter a valid Invoice Date."
            },
            remark : {
                required: "Please Enter Remark.",
            },
            image: {
                    required: "Please Upload Signature.",
                    accept: "Please Upload an Signature file.",
            },            
            'addmore[0][description]': {
                required: "Please Enter Description.",
            },
            'addmore[0][qc_check_remark]': {
                required: "Please Enter QC Check.",
            },
            'addmore[0][chalan_quantity]': {
                required: "Please Enter Chalan Qty.",
                number: "Chalan Quantity should contain only numbers."
            },
            'addmore[0][actual_quantity]': {
                required: "Please Enter Actual Qty.",
                number: "Actual Quantity should contain only numbers."
            },
            'addmore[0][accepted_quantity]': {
                required: "Please Enter Accepted Qty.",
                number: "Accepted Quantity should contain only numbers."
            },
            'addmore[0][rejected_quantity]': {
                required: "Please Enter Rejected Qty.",
                number: "Rejected Quantity should contain only numbers."
            },
        },
    });
});
</script>





@endsection