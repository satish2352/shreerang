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
                            <h1>Add Store Data</h1>
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
                                        <form action="{{ route('store-store-receipt') }}" method="POST" id="addDesignsForm"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <label for="store_date">Date:</label>
                                                            <input type="date" class="form-control" id="store_date" 
                                                                name="store_date"  value="{{ old('po_date') }}" >
                                                    </div>
                                                    
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <label for="name">Name of Store Person :</label>
                                                        <input type="text" class="form-control" id="name"  
                                                            value="{{ old('name') }}"
                                                            name="name" placeholder="Enter Name of Store Person">
                                                    </div>

                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <label for="contact_number">Contact No. :</label>
                                                        <input type="text" class="form-control" id="contact_number"  
                                                            value="{{ old('contact_number') }}"
                                                            name="contact_number" placeholder="Enter Contact No."
                                                            pattern="[789]{1}[0-9]{9}" 
                                                            oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" 
                                                            maxlength="10" 
                                                            minlength="10"
                                                            >
                                                    </div>

                                                    <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <label for="address">Address:</label>
                                                        <input type="text" class="form-control" id="address"
                                                            name="address" placeholder="Enter Address">
                                                    </div> -->
                                                        
                                                </div>
                                                    
                                                <div style="margin-top:10px;" >
                                                    <table class="table table-bordered" id="dynamicTable">
                                                        <tr>
                                                            <th>Quantity</th>
                                                            <th>Description</th>
                                                            <th>Price</th>
                                                            <th>Amount</th>
                                                            <th>Total</th>
                                                            <th>Action</th>
                                                        </tr>

                                                        <tr>

                                                            <td>
                                                                <input type="text" name="addmore[0][quantity]"  value="{{ old('quantity') }}"
                                                                    placeholder="Enter Quantity" class="form-control" />
                                                            </td>

                                                            <td>
                                                                <input type="text" name="addmore[0][description]"  value="{{ old('description') }}" 
                                                                    placeholder="Enter Description" class="form-control" />
                                                            </td>

                                                            <td>
                                                                <input type="text" name="addmore[0][price]"  value="{{ old('price') }}"
                                                                    placeholder="Enter Price" class="form-control" />
                                                            </td>

                                                            <td>
                                                                <input type="text" name="addmore[0][amount]"  value="{{ old('amount') }}"
                                                                    placeholder="Enter Amount" class="form-control" />
                                                            </td>

                                                            <td>
                                                                <input type="text" name="addmore[0][total]"  value="{{ old('total') }}"
                                                                    placeholder="Enter Total" class="form-control" />
                                                            </td>

                                                            <td><button type="button" name="add" id="add"
                                                                    class="btn btn-success">Add More</button>
                                                            </td>
                                                        </tr>
                                                    </table>                                                
                                                </div>

                                                <div class='row'>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <label for="remark">Remark :</label>
                                                        <input type="text" class="form-control" id="remark"  
                                                            value="{{ old('remark') }}"
                                                            name="remark" placeholder="Enter Remark here">
                                                    </div>
                                                                                                        
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <label for="signature">Signature :</label>
                                                        <input type="file" class="form-control" accept="image/*" id="signature"
                                                            value="{{ old('signature') }}"
                                                            name="signature" placeholder="Enter signature">
                                                    </div>                                                
                                                </div>                                            

                                                    <div class="login-btn-inner">
                                                        <div class="row">
                                                            <div class="col-lg-5"></div>
                                                            <div class="col-lg-7">
                                                                <div class="login-horizental cancel-wp pull-left">
                                                                    <a href="{{ route('list-store-receipt') }}" class="btn btn-white"
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
        '][quantity]" placeholder="Enter  Quantity" class="form-control" /></td><td><input type="text" name="addmore[' +
        i +
        '][description]" placeholder="Enter  Description" class="form-control" /></td><td><input type="text" name="addmore[' +
        i +
        '][price]" placeholder="Enter Price" class="form-control" /></td><td><input type="text" name="addmore[' +
        i +
        '][amount]" placeholder="Enter Amount" class="form-control" /></td><td><input type="text" name="addmore[' +
        i +
        '][total]" placeholder="Enter Total" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>'
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
            store_date: {
                required: true,
                date: true,
            },
            name: {
                required: true,
                noNumbers: true
            },
            contact_number: {
                required: true,
                digits: true 
            },
            address: {
                required: true,
            },           
            remark: {
                required: true,
            },
            signature: {
                required: true,
            },
            'addmore[0][quantity]': {
                required : true,
                number: true 
            },
            'addmore[0][description]': {
                required : true,
            },
            'addmore[0][price]': {
                required : true,
                number: true 
            },
            'addmore[0][amount]': {
                required : true,
                number: true 
            },
            'addmore[0][total]': {
                required : true,
                number: true 
            },            
        },

        messages: {
            store_date: {
                required: "Please Select a Store Date.",
                date: "Please enter a valid Store date."
            },
            receipt_date: {
                required: "Please Select a Receipt date.",
                date: "Please enter a valid Receipt date."
            },
            // receipt_no: {
            //     required: "Please Enter receipt No.",
            // },
            name: {
                required: "Please Enter Store Person Name.",
                noNumbers: "Store Person Name should not contain any numbers."
            },
            contact_number: {
                required: "Please Enter a valid Contact No.",
                digits: "Contact Number should contain only digits."
            },
            // address: {
            //     required: "Please enter a valid address.",
            // },           
            remark: {
                required: "Please Write Remark",
            },
            signature: {
                required: "Please Upload an Signature Image.",
                accept: "Please Upload an Signature Image file.",
            },
        
            'addmore[0][quantity]': {
                required: "Please Enter Quantity.",
                number: "Quantity should contain only numbers."
            },
            'addmore[0][description]': {
                required: "Please Enter Description.",                
            },
            'addmore[0][price]': {
                required: "Please Enter Price.",
                number: "Price should contain only numbers."
            },
            'addmore[0][amount]': {
                required: "Please Enter Amount.",
                number: "Amount should contain only numbers."
            },
            'addmore[0][total]': {
                required: "Please Enter Total.",
                number: "Total should contain only numbers."
            },    

        },
    });

    $.validator.addMethod("noNumbers", function(value, element) {
            return this.optional(element) || !/\d/.test(value);
        }, "Vendor Name should not contain any numbers.");
        
});
</script>



@endsection