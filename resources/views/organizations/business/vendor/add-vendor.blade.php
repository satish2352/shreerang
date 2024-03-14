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
                                    <form action="{{ route('store-vendor') }}" method="POST" id="addDesignsForm"
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
                                                        <label for="vendor_name">Vendor Name:</label>
                                                        <input type="text" class="form-control" id="vendor_name"
                                                            name="vendor_name" 
                                                            value="{{ old('vendor_name') }}"
                                                            placeholder="Enter Vendor name">
                                                </div>                                           

                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <label for="address">Address :</label>
                                                    <input type="text" class="form-control" id="address"
                                                        name="address" 
                                                        value="{{ old('address') }}"
                                                        placeholder="Enter your address">
                                                </div>    
                                                
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <label for="gst_no">GST No:</label>
                                                    <input type="text" class="form-control" id="gst_no"
                                                        name="gst_no" 
                                                        value="{{ old('gst_no') }}"
                                                        placeholder="Enter GST number">
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <label for="contact_no">Contact No. :</label>
                                                    <input type="text" class="form-control" id="contact_no"
                                                        name="contact_no" 
                                                        value="{{ old('transport_dispatch') }}"
                                                        placeholder="Enter your contact No.">
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <label for="email">Email:</label>
                                                    <input type="email" class="form-control" id="email"
                                                        name="email" 
                                                        value="{{ old('email') }}"
                                                        placeholder="Enter your email">
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <label for="quote_no">Quote No:</label>
                                                    <input type="text" class="form-control" id="quote_no"
                                                        name="quote_no" 
                                                        value="{{ old('quote_no') }}"
                                                        placeholder="Enter your quote no">
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <label for="payment_terms">Payment Terms:</label>
                                                    <input type="text" class="form-control" id="payment_terms"
                                                        name="payment_terms" 
                                                        value="{{ old('payment_terms') }}"
                                                        placeholder="Enter your payment terms">
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
                    gstIN: true,
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
                    gstIN: "Please Enter a valid GST No.",
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

        // Custom validation method for GST No
        $.validator.addMethod("gstIN", function(value, element) {
            return this.optional(element) || /^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}[Z]{1}[0-9A-Z]{1}$/i.test(value);
        }, "Please Enter a valid GST No.");

        $.validator.addMethod("noNumbers", function(value, element) {
            return this.optional(element) || !/\d/.test(value);
        }, "Vendor Name should not contain any numbers.");
        
});
</script>



@endsection