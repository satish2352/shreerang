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
                            <h1>Vendor Registration Form</h1>
                        </center>
                    </div>
                </div>
                <div class="sparkline12-graph">
                    <div class="basic-login-form-ad">
                        <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="all-form-element-inner">
                                        <form action="{{ route('store-vendor') }}" method="POST" id="addDesignsForm"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group-inner">                                               
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <label for="vendor_name">Vendor Name:</label>
                                                            <input type="text" class="form-control" id="vendor_name"
                                                                name="vendor_name" 
                                                                value="{{ old('vendor_name') }}"
                                                                placeholder="Enter Vendor Name">
                                                    </div>                                           

                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <label for="address">Address :</label>
                                                        <input type="text" class="form-control" id="address"
                                                            name="address" 
                                                            value="{{ old('address') }}"
                                                            placeholder="Enter Address">
                                                    </div>  
                                                </div>      
                                                
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <label for="gst_no">GST No:</label>
                                                        <input type="text" class="form-control" id="gst_no"
                                                            name="gst_no" 
                                                            value="{{ old('gst_no') }}"
                                                            placeholder="Enter GST Number">
                                                    </div>

                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <label for="contact_no">Contact No. :</label>
                                                        <input type="text" class="form-control" id="contact_no"
                                                            name="contact_no" 
                                                            value="{{ old('contact_no') }}"
                                                            placeholder="Enter Contact No"
                                                            pattern="[789]{1}[0-9]{9}" 
                                                            oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" 
                                                            maxlength="10" 
                                                            minlength="10">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <label for="email">Email Id:</label>
                                                        <input type="email" class="form-control" id="email"
                                                            name="email" 
                                                            value="{{ old('email') }}"
                                                            placeholder="Enter Email">
                                                    </div>

                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <label for="quote_no">Quote No:</label>
                                                        <input type="text" class="form-control" id="quote_no"
                                                            name="quote_no" 
                                                            value="{{ old('quote_no') }}"
                                                            placeholder="Enter Quote No">
                                                    </div>
                                                </div>    

                                                <div class="row">                                                    
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <label for="payment_terms">Payment Terms:</label>
                                                            <input type="text" class="form-control" id="payment_terms"
                                                                name="payment_terms" 
                                                                value="{{ old('payment_terms') }}"
                                                                placeholder="Enter Payment Terms">
                                                    </div>  
                                                </div>
                                                                                        
                                                <div class="login-btn-inner">
                                                    <div class="row">
                                                        <div class="col-lg-5"></div>
                                                        <div class="col-lg-7">
                                                            <div class="login-horizental cancel-wp pull-left">
                                                                <a href="{{ route('list-vendor') }}" class="btn btn-white"
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
    jQuery.noConflict();
    jQuery(document).ready(function($) {
        $("#addDesignsForm").validate({
            rules: {
                vendor_name: {
                    required: true,
                    noNumbers: true
                },
                address: {
                    required: true,
                },
                gst_no: {
                    required: true,
                    // gstIN: true,
                },
                contact_no: {
                    required: true,
                    digits: true
                },
                email: {
                    required: true,
                    email: true,
                },
                quote_no: {
                    required: true,
                    number: true
                },
                payment_terms: {
                    required: true,
                },
            },

            messages: {
                vendor_name: {
                    required: "Please Enter Vendor Name.",
                    noNumbers: "Vendor Name should not contain any numbers."
                },
                address: {
                    required: "Please Enter Address.",
                },
                gst_no: {
                    required: "Please Enter GST No.",
                    // gstIN: "Please Enter a valid GST No.",
                },
                contact_no: {
                    required: "Please Enter a valid Contact No.",
                    digits: "Contact Number should contain only digits."
                },
                email: {
                    required: "Please Enter valid Email.",
                    email: "Please Enter a valid Email Address.",
                },
                quote_no: {
                    required: "Please Enter Quote No.",
                    number: "Quote No. should contain only numbers."
                },
                payment_terms: {
                    required: "Please Enter Payment terms.",
                },                             

            },
        });


        $.validator.addMethod("noNumbers", function(value, element) {
            return this.optional(element) || !/\d/.test(value);
        }, "Vendor Name should not contain any numbers.");
        
});

// // Custom validation method for GST No
// $.validator.addMethod("gstIN", function(value, element) {
//         return this.optional(element) || /^\d{2}[A-Z]{5}\d{4}[A-Z]\d[Z0-9]$/i.test(value);
//         }, "Please enter a valid GST No.");
</script>



@endsection