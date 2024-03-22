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
                            <h1>Edit Requisition Data</h1>
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
                                    <form action="{{ route('update-requistion', $editData[0]->requisition_main_id) }}"
                                            method="POST" id="editDesignsForm" enctype="multipart/form-data">

                                            @csrf
                                           
                                            <input type="hidden" name="requisition_main_id"
                                                id="" class="form-control"
                                                value="{{ $editData[0]->requisition_main_id}}"
                                                placeholder="">
                                                
                                            <a
                                             {{-- href="{{ route('add-more-data') }}" --}}
                                            class="btn btn-sm btn-primary ml-3"> 
                                            <button type="button" name="add" id="add" class="btn btn-success">Add More</button></a>

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

                                        @foreach ($editData as $key => $editDataNew)
                                        @if ($key == 0)
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <label for="req_name">Requisition Name :</label>
                                                        <input type="text" class="form-control" id="req_name"
                                                            name="req_name" 
                                                            value="@if (old('req_name')) {{ old('req_name') }}@else{{$editDataNew->req_name}} @endif"
                                                            placeholder="Enter your Requisition Name ">
                                                    </div>

                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <label for="req_number">Requisition Number :</label>
                                                        <input type="text" class="form-control" id="req_number"
                                                            name="req_number" 
                                                            value="@if (old('req_number')) {{ old('req_number') }}@else{{$editDataNew->req_number}} @endif"
                                                            placeholder="Enter your Requisition Number ">
                                                    </div>
                                                </div>    

                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <label for="req_date">Requisition Date :</label>
                                                        <input type="date" class="form-control" id="req_date"
                                                            name="req_date" 
                                                            value="{{ old('req_date', isset($editDataNew) ? date('Y-m-d', strtotime($editDataNew->req_date)) : '') }}"
                                                            placeholder="Enter Requisition Date ">
                                                    </div>

                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <label for="signature">Image:</label>
                                                        <input type="file" class="form-control"
                                                            accept="image/*" id="signature" name="signature">
                                                        <div id="oldImageDisplay">
                                                            @if (isset($editDataNew->signature))
                                                                <b>Image Preview: </b>
                                                                <img src="{{ Config::get('FileConstant.REQUISITION_VIEW') . $editDataNew->signature}}"
                                                                    alt="Old Image" style="max-width: 100px;">
                                                            @endif
                                                        </div>
                                                        <div id="selectedImageDisplay" style="display: none;">
                                                            <b>Image Preview: </b>
                                                            <img src="" alt="Selected Image"
                                                                style="max-width: 100px;">
                                                        </div>
                                                    </div>                                                        
                                                </div>
                                            @endif
                                        @endforeach

                                        <div style="margin-top:10px">
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
                                                
                                                @foreach ($editData as $key => $editDataNew)                                                        
                                                    <tr>
                                                        <input type="hidden" name="design_count"
                                                        id="design_id_{{ $key }}" class="form-control"
                                                        value="{{ $key}}"
                                                        placeholder="">

                                                        <input type="hidden" name="design_id_{{ $key }}"
                                                            id="design_id_{{ $key }}" class="form-control"
                                                            value="{{ $editDataNew->requisition_details_id }}"
                                                            placeholder="">
                                                                                                                    
                                                        <td>
                                                            <input type="text"
                                                                name="description_{{$key}}"
                                                                value="@if (old('description')) {{ old('description') }}@else{{$editDataNew->description}} @endif"
                                                                placeholder="Enter Description"
                                                                class="form-control" />
                                                        </td>                                                                                                                                

                                                        <td>
                                                            <input type="text"
                                                                name="quantity_{{$key}}"
                                                                value="@if (old('quantity')) {{ old('quantity') }}@else{{$editDataNew->quantity}} @endif"
                                                                placeholder="Enter Quantity"
                                                                class="form-control" />
                                                        </td>

                                                        <td>
                                                            <input type="text"
                                                                name="unit_{{$key}}"
                                                                value="@if (old('unit')) {{ old('unit') }}@else{{$editDataNew->unit}} @endif"
                                                                placeholder="Enter Unit" class="form-control" />
                                                        </td>

                                                        <td>
                                                            <input type="text"
                                                                name="day_{{$key}}"
                                                                value="@if (old('day')) {{ old('day') }}@else{{$editDataNew->day}} @endif"
                                                                placeholder="Enter Day" class="form-control" />
                                                        </td>

                                                        <td>
                                                            <input type="text"
                                                                name="remark_{{$key}}"
                                                                value="@if (old('remark')) {{ old('remark') }}@else{{$editDataNew->remark}} @endif"
                                                                placeholder="Enter Remark" class="form-control" />
                                                        </td>

                                                        <td>
                                                            <input type="text"
                                                                name="stock_{{$key}}"
                                                                value="@if (old('stock')) {{ old('stock') }}@else{{$editDataNew->stock}} @endif"
                                                                placeholder="Enter Stock" class="form-control" />
                                                        </td>

                                                        <td>
                                                            <a data-id="{{ $editDataNew->id }}"
                                                                class="delete-btn btn btn-danger m-1"
                                                                title="Delete Tender"><i
                                                                    class="fas fa-archive"></i></a>
        
                                                            </td>
                                                    </tr>
                                                    @endforeach                                        
                                            </table>
                                        </div>    
                                                
                                        <div class="login-btn-inner">
                                            <div class="row">
                                                <div class="col-lg-5"></div>
                                                <div class="col-lg-7">
                                                    <div class="login-horizental cancel-wp pull-left">
                                                        <a href="{{ route('list-requistion') }}"
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

    <!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
 
<script>
    
    $(document).ready(function() {
    var i = {!! count($editData) !!}; // Initialize i with the number of existing rows

    $("#add").click(function() {
        ++i;

        $("#dynamicTable").append(
            
            '<tr><td><input type="text" name="addmore[' +
                i +
                '][description]" placeholder="Enter Description" class="form-control" /></td><td><input type="text" name="addmore[' +
                i +
                '][quantity]" placeholder="Enter Quantity" class="form-control" /></td><td><input type="text" name="addmore[' +
                i +
                '][unit]" placeholder="Enter Unit" class="form-control" /></td><td><input type="text" name="addmore[' +
                i +
                '][day]" placeholder="Enter Day" class="form-control" /></td><td><input type="text" name="addmore[' +
                i +
                '][remark]" placeholder="Enter Remark" class="form-control" /></td><td><input type="text" name="addmore[' +
                i +
                '][stock]" placeholder="Enter Stock" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>'
                
        );
    });

    $(document).on("click", ".remove-tr", function() {
        $(this).parents("tr").remove();
    });
});

</script>

<script>
    jQuery.noConflict();
    jQuery(document).ready(function($) {
        $("#editDesignsForm").validate({
            rules: {
                req_name: {
                    required: true,
                    noNumbers: true
                },
                req_number: {
                    required: true,
                    number: true 
                },
                stock: {
                    required: true,
                    date : true
                },
                signature: {
                    required: true,
                    accept: "Please select an Signature Image file.",
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
                req_name: {
                    required: "Please Enter Requisition name.",
                    noNumbers: "Requisition Name should not contain any numbers."
                },
                req_number: {
                    required: "Please Enter Requisition Number.",
                    number: "Requisition Number should contain only numbers."
                },
                req_date: {
                    required: "Please Select Requisition date.",
                    date: "Please Select a valid Requisition date."
                },
                signature: {
                    required: "Please Upload a Signature.",
                    accept: "Please Upload an Signature image file.",
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
            var currentSignatureImage = $("#currentSignatureImage").val();
    
            // Function to check if all input fields are filled with valid data
            function checkFormValidity() {
                const req_name = $('#req_name').val();
                const req_number = $('#req_number').val();
                const stock = $('#stock').val();
                const signature = $('#signature').val();
    
                // Update the old PDF values if there are any selected files
                if (signature !== currentSignatureImage) {
                    $("#currentSignatureImage").val(signature);
                }                  
            }
    
            // Call the checkFormValidity function on file input change
            $('input, #signature').on('change', function() {
                checkFormValidity();
                validator.element(this); // Revalidate the file input
            });
    
            $.validator.addMethod("validImage", function(value, element) {
                // Check if a file is selected
                if (element.files && element.files.length > 0) {
                    var extension = element.files[0].name.split('.').pop().toLowerCase();
                    // Check the file extension
                    return (extension == "jpg" || extension == "jpeg" || extension == "png");
                }
                return true; // No file selected, so consider it valid
            }, "Only JPG, JPEG, PNG images are allowed.");
    
            $.validator.addMethod("fileSize", function(value, element, param) {
                // Check if a file is selected
                if (element.files && element.files.length > 0) {
                    // Convert bytes to KB
                    const fileSizeKB = element.files[0].size / 1024;
                    return fileSizeKB >= param[0] && fileSizeKB <= param[1];
                }
                return true; // No file selected, so consider it valid
            }, "File size must be between {0} KB and {1} KB.");
    
            $.validator.addMethod("noNumbers", function(value, element) {
                return this.optional(element) || !/\d/.test(value);
            }, "Requisition Name should not contain any numbers.");

            // Initialize the form validation
            var form = $("#editDesignsForm");
            var validator = form.validate({
                rules: {
                    req_name: {
                        required: true,
                        noNumbers: true
                    },
                    req_number: {
                        required: true,
                        number: true 
                    },
                    stock: {
                        required: true,
                        date : true
                    },
                    signature: {
                        validImage: true,
                        fileSize: [10, 2048], // Min 180KB and Max 2MB (2 * 1024 KB)
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
                    req_name: {
                        required: "Please Enter Requisition name.",
                        noNumbers: "Requisition Name should not contain any numbers."
                    },
                    req_number: {
                        required: "Please Enter Requisition Number.",
                        number: "Requisition Number should contain only numbers."
                    },
                    req_date: {
                        required: "Please Select Requisition date.",
                        date: "Please Select a valid Requisition date."
                    },                        
                    signature: {
                        validImage: "Only JPG, JPEG, PNG images are allowed.",
                        fileSize: "The file size must be between 10 KB and 2048 KB.",
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
    
            // You can remove the following two blocks if you don't need to display selected images on the page
            $("#signature").change(function() {
                var reader = new FileReader();
                reader.onload = function(e) {
                    // Display the selected image for English
                    // You can remove this if you don't need to display the image on the page
                    $("#currentEnglishImageDisplay").attr('src', e.target.result);
                    validator.element("#signature"); // Revalidate the file input
                };
                reader.readAsDataURL(this.files[0]);
            });        
        });
</script> -->

<!-- <script>
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
</script> -->

<!-- {{-- <script>
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

</script> --}} -->
@endsection