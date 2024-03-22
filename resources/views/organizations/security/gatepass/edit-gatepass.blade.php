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
                            <h1>Edit Gatepass Data</h1>
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
                                        <form action="{{ route('update-gatepass')}}"
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
                                                            <label for="purchase_id">PO:</label>
                                                            <input type="text" class="form-control" id="purchase_id"
                                                                name="purchase_id" 
                                                                value="@if (old('purchase_id')) {{ old('purchase_id') }}@else{{ $editData->purchase_id }} @endif"
                                                                placeholder="Enter PO No">
                                                        </div>                                               

                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <label for="gatepass_name">Name:</label>
                                                            <input type="text" class="form-control" id="gatepass_name"
                                                                name="gatepass_name" 
                                                                value="@if (old('gatepass_name')) {{ old('gatepass_name') }}@else{{ $editData->gatepass_name }} @endif"
                                                                placeholder="Enter Name">
                                                        </div>

                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <label for="gatepass_date">Date:</label>
                                                            <input type="date" class="form-control" id="gatepass_date"
                                                                name="gatepass_date" 
                                                                value="{{ old('gatepass_date', isset($editData) ? date('Y-m-d', strtotime($editData->gatepass_date)) : '') }}"
                                                                placeholder="Select Date">
                                                        </div>

                                                        <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <label for="gatepass_time">Time:</label>
                                                            <input type="time" class="form-control" id="gatepass_time"
                                                                name="gatepass_time" 
                                                                value="@if (old('gatepass_time')) {{ old('gatepass_time') }}@else{{ $editData->gatepass_time }} @endif"
                                                                placeholder="Select Time">
                                                        </div> -->

                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <label for="gatepass_time">Time:</label>
                                                            <input type="time" class="form-control" id="gatepass_time" name="gatepass_time" 
                                                                value="{{ $editData->gatepass_time ? date('H:i', strtotime($editData->gatepass_time)) : '' }}"
                                                                placeholder="Select Time">
                                                        </div>

                                                
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <label for="remark">Remark:</label>
                                                            <input type="text" class="form-control" id="remark"
                                                                name="remark" 
                                                                value="@if (old('remark')) {{ old('remark') }}@else{{ $editData->remark }} @endif"
                                                                placeholder="Enter Remark">
                                                        </div>  
                                                    </div>   
                                                </div>   
                                                   
                                                <div class="login-btn-inner">
                                                    <div class="row">
                                                        <div class="col-lg-5"></div>
                                                        <div class="col-lg-7">
                                                            <div class="login-horizental cancel-wp pull-left">
                                                                <a href="{{ route('list-gatepass') }}"
                                                                    class="btn btn-white"
                                                                    style="margin-bottom:50px">Cancel</a>
                                                                <button class="btn btn-sm btn-primary login-submit-cs" id="submitButton"
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

    <!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script> -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
 
<script>
    jQuery.noConflict();
    jQuery(document).ready(function($) {
        $("#editDesignsForm").validate({
            rules: {          
                purchase_id: {
                    required: true
                },
                gatepass_name : {
                    required : true,
                    noNumbers: true ,
                },     
                gatepass_date : {
                    required : true,
                    date: true,
                },    
                gatepass_time : {
                    required : true,
                    time : true,
                },
                remark :{
                    required : true,
                },             
            },
            messages: {
                purchase_id: {
                    required: "Please Enter Po Number.",
                },              
                gatepass_name : {
                    required: "Please Enter Gatepass Name.",
                    noNumbers: "Store Gatepass Name should not contain any numbers."
                },
                gatepass_date : {
                    required: "Please Select Gatepass Date.",
                    date: "Please enter a valid Gatepass date."
                },
                gatepass_time : {
                    required: "Please Select Gatepass Time.",
                    time: "Please enter a valid Gatepass Time."
                },
                remark : {
                    required: "Please enter Remark.",
                },               
            },
        });

        $.validator.addMethod("noNumbers", function(value, element) {
                return this.optional(element) || !/\d/.test(value);
            }, "Vendor Name should not contain any numbers.");

    });
</script>

<!-- Make sure you have jQuery and jquery.validate.js included before this script -->
<!-- <script>
        $(document).ready(function() {                
            // Function to check if all input fields are filled with valid data
            function checkFormValidity() {
                const purchase_id = $('#purchase_id').val();
                const gatepass_name = $('#gatepass_name').val();
                const gatepass_date = $('#gatepass_date').val();
                const gatepass_time = $('#gatepass_time').val();
                const remark = $('#remark').val();                                  
            }
                
            $.validator.addMethod("noNumbers", function(value, element) {
                return this.optional(element) || !/\d/.test(value);
            }, "Gatepass Name should not contain any numbers.");

            // Initialize the form validation
            var form = $("#editDesignsForm");
            var validator = form.validate({
                rules: {
                    purchase_id: {
                        required: true
                    },
                    gatepass_name : {
                        required : true,
                        noNumbers: true ,
                    },     
                    gatepass_date : {
                        required : true,
                        date: true,
                    },    
                    gatepass_time : {
                        required : true,
                        time : true,
                    },
                    remark :{
                        required : true,
                    },                                     
                },
                messages: {
                    purchase_id: {
                        required: "Please Enter Po Number.",
                    },              
                    gatepass_name : {
                        required: "Please Enter Gatepass Name.",
                        noNumbers: "Store Gatepass Name should not contain any numbers."
                    },
                    gatepass_date : {
                        required: "Please Select Gatepass Date.",
                        date: "Please enter a valid Gatepass date."
                    },
                    gatepass_time : {
                        required: "Please Select Gatepass Time.",
                        time: "Please enter a valid Gatepass Time."
                    },
                    remark : {
                        required: "Please enter Remark.",
                    },                                                                 
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });                
                            
            // Submit the form when the "Update" button is clicked
            $("#submitButton").click(function() {
                // Validate the form
                if (form.valid()) {
                    form.submit();
                }
            });      
        });
</script> -->

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
