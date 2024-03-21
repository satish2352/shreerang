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
    <div  class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline12-list">
                    <div class="sparkline12-hd">
                        <div class="main-sparkline12-hd">
                            <center>
                                <h1>Edit Vendor Data</h1>
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
                                    @if (Session::has('status'))
                                        <div class="col-md-12">
                                            <div class="alert alert-{{ Session::get('status') }} alert-dismissible"
                                                role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <strong>{{ ucfirst(Session::get('status')) }}!</strong>
                                                {{ Session::get('msg') }}
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="all-form-element-inner">
                                            <form action="{{ route('update-vendor')}}"
                                            method="POST" id="editDesignsForm" enctype="multipart/form-data">
                                            
                                           
                                            @csrf
                                        
                                            <input type="hidden" name="id" id="id" class="form-control"
                                                value="{{ $editData->id }}" placeholder="">

                                            <div class="container-fluid">
                                                <!-- @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif -->
                                                    <div class="form-group-inner">                                               
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                    <label for="vendor_name">Vendor Name:</label>
                                                                    <input type="text" class="form-control" id="vendor_name"
                                                                        name="vendor_name" 
                                                                        value="@if (old('vendor_name')) {{ old('vendor_name') }}@else{{ $editData->vendor_name }} @endif"
                                                                        placeholder="Enter Vendor name">
                                                            </div>                                           

                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <label for="address">Address :</label>
                                                                <input type="text" class="form-control" id="address"
                                                                    name="address" 
                                                                    value="@if (old('address')) {{ old('address') }}@else{{ $editData->address }} @endif"
                                                                    placeholder="Enter Address">
                                                            </div>    
                                                        </div>    

                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <label for="gst_no">GST No:</label>
                                                                <input type="text" class="form-control" id="gst_no"
                                                                    name="gst_no" 
                                                                    value="@if (old('gst_no')) {{ old('gst_no') }}@else{{ $editData->gst_no }} @endif"
                                                                    placeholder="Enter GST number">
                                                            </div>

                                                            <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <label for="contact_no">Contact No. :</label>
                                                                <input type="text" class="form-control" id="contact_no"
                                                                    name="contact_no" 
                                                                    value="@if (old('contact_no')) {{ old('contact_no') }}@else{{ $editData->contact_no }} @endif"
                                                                    placeholder="Enter Contact No."
                                                                    pattern="[789]{1}[0-9]{9}" 
                                                                    oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" 
                                                                    maxlength="10" 
                                                                    minlength="10">
                                                            </div> -->
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <label for="contact_no">Contact No. :</label>
                                                                <input type="text" class="form-control" id="contact_no" name="contact_no" 
                                                                    value="@if (old('contact_no')) {{ old('contact_no') }}@else{{ $editData->contact_no }} @endif"
                                                                    placeholder="Enter Contact No."
                                                                    pattern="[789]{1}[0-9]{9}"
                                                                    >
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <label for="email">Email Id:</label>
                                                                <input type="email" class="form-control" id="email"
                                                                    name="email" 
                                                                    value="@if (old('email')) {{ old('email') }}@else{{ $editData->email }} @endif"
                                                                    placeholder="Enter Email">
                                                            </div>

                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <label for="quote_no">Quote No:</label>
                                                                <input type="text" class="form-control" id="quote_no"
                                                                    name="quote_no" 
                                                                    value="@if (old('quote_no')) {{ old('quote_no') }}@else{{ $editData->quote_no }} @endif"
                                                                    placeholder="Enter Quote No">
                                                            </div>
                                                        </div>    
                                                        
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                    <label for="payment_terms">Payment Terms:</label>
                                                                    <input type="text" class="form-control" id="payment_terms"
                                                                        name="payment_terms" 
                                                                        value="@if (old('payment_terms')) {{ old('payment_terms') }}@else{{ $editData->payment_terms }} @endif"
                                                                        placeholder="Enter Payment Terms">
                                                            </div>  
                                                        </div>
                                                                                                        
                                                        <div class="login-btn-inner">
                                                            <div class="row">
                                                                <div class="col-lg-5"></div>
                                                                <div class="col-lg-7">
                                                                    <div class="login-horizental cancel-wp pull-left">
                                                                        <a href="{{ route('list-vendor') }}"
                                                                            class="btn btn-white"
                                                                            style="margin-bottom:50px">Cancel</a>
                                                                        <button class="btn btn-sm btn-primary login-submit-cs"
                                                                            type="submit" style="margin-bottom:50px">Update Data</button>
                                                                        
                                                                    </div>
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
    <form method="POST" action="{{ route('delete-addmore') }}" id="deleteform">
        @csrf
        <input type="hidden" name="delete_id" id="delete_id" value="">
    </form>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
 
    <script>
    jQuery.noConflict();
    jQuery(document).ready(function($) {
        $("#editDesignsForm").validate({
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
                },
                contact_no: {
                    required: true,
                    minlength: 10,
                    maxlength: 10,
                    digits: true
                },
                email: {
                    required: true,
                    email: true,
                },
                quote_no: {
                    required: true,
                    number : true,
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
                },
                contact_no: {
                    required: "Please Enter a valid Contact No.",
                    minlength: "Contact No. must be exactly 10 digits.",
                    maxlength: "Contact No. must be exactly 10 digits.",
                    digits: "Please enter only digits."
                },
                email: {
                    required: "Please Enter valid Email.",
                    email: "Please Enter a valid Email Address.",
                },
                quote_no: {
                    required: "Please Enter Quote No.",
                    number: "Quote No. should be contain any numbers.",
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

<script>
    $('.delete-btn').click(function(e) {

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $("#delete_id").val($(this).attr("data-id"));
                $("#deleteform").submit();
            }
        })

    });
</script>





{{-- <script>
 $(document).on("click", ".remove-tr", function() {
    var rowId = $(this).data('row-id');
    var row = $(this).closest('tr');
    alert(rowId);
    $.ajax({
    url: '/remove-design-details/' + rowId,
    type: 'DELETE',
    data: {
        _token: '{{ csrf_token() }}'
    },
    success: function(response) {
        row.remove();
        alert(response.msg);
    },
    error: function(xhr, status, error) {
        console.error(xhr.responseText);
        alert('Error occurred. Please check console for details.');
    }
});
});

</script> --}}
@endsection
