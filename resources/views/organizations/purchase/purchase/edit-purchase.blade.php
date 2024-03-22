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
                            <h1>Edit Purchase Order Data</h1>
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
                                        <form action="{{ route('update-purchase', $editData[0]->purchase_main_id) }}"
                                            method="POST" id="editDesignsForm" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="purchase_main_id"
                                                            id="" class="form-control"
                                                            value="{{ $editData[0]->purchase_main_id}}"
                                                            placeholder="">
                                           
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
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <label for="po_date">PO Date:</label>
                                                        <input type="date" class="form-control" id="po_date"
                                                            name="po_date"
                                                            value="{{ old('po_date', isset($editDataNew) ? date('Y-m-d', strtotime($editDataNew->po_date)) : '') }}"
                                                            placeholder="Select PO Date">
                                                    </div>
                                                    
                                                    <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-select-list">
                                                            <label for="vendor_id">Select Vendor:</label>
                                                            <select class="form-control custom-select-value" name="vendor_id" id="vendor_id" value="{{ $editDataNew->vendor_id }}">
                                                                <ul class="dropdown-menu ">
                                                                <option value="">Select Vendor</option>  
                                                                <option value="vendor1">Vendor 1</option>
                                                                <option value="vendor2">Vendor 2</option>
                                                                <option value="vendor3">Vendor 3</option>                                                              
                                                            </select>
                                                        </div>                                                                                                   
                                                    </div> -->

                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-select-list">
                                                            <label for="vendor_id">Select Vendor:</label>
                                                            <select class="form-control custom-select-value" name="vendor_id" id="vendor_id">
                                                                <option value="">Select Vendor</option>
                                                                <option value="vendor1" {{ $editDataNew->vendor_id == 'vendor1' ? 'selected' : '' }}>Vendor 1</option>
                                                                <option value="vendor2" {{ $editDataNew->vendor_id == 'vendor2' ? 'selected' : '' }}>Vendor 2</option>
                                                                <option value="vendor3" {{ $editDataNew->vendor_id == 'vendor3' ? 'selected' : '' }}>Vendor 3</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                            @endif
                                            @endforeach

                                            <div style="margin-top:10px;"> 
                                                <table class="table table-bordered" id="dynamicTable">
                                                    <tr>
                                                        <th>Part No</th>
                                                        <th>Description</th>
                                                        <th>Due Date</th>
                                                        <th>HSN</th>
                                                        <th>Quantity</th>
                                                        <th>Rate</th>
                                                        <th>Amount</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    @foreach ($editData as $key => $editDataNew)
                                                    <?php 
                                                    // dd($editDataNew);
                                                    // die();
                                                    ?>
                                                    <tr>
                                                        <input type="hidden" name="design_count"
                                                            id="design_id_{{ $key }}" class="form-control"
                                                            value="{{ $key}}"
                                                            placeholder="">

                                                        <input type="hidden" name="design_id_{{ $key }}"
                                                            id="design_id_{{ $key }}" class="form-control"
                                                            value="{{ $editDataNew->purchase_order_details_id }}"
                                                            placeholder="">

                                                    <td>
                                                        <input type="text"
                                                            name="part_no_{{ $key }}"
                                                            value="@if (old('part_no')) {{ old('part_no') }}@else{{ $editDataNew->part_no}} @endif"
                                                            placeholder="Enter Part No" 
                                                            class="form-control" />
                                                    </td>

                                                    <td>
                                                        <input type="text"
                                                            name="description_{{ $key }}"
                                                            value="@if (old('description')) {{ old('description') }}@else{{ $editDataNew->description}} @endif"
                                                            placeholder="Enter Description" 
                                                            class="form-control" />
                                                    </td>

                                                    <td>
                                                        <input type="date"
                                                            name="due_date_{{ $key }}"
                                                            value="{{ old('due_date', isset($editDataNew) ? date('Y-m-d', strtotime($editDataNew->due_date)) : '') }}"
                                                            placeholder="Enter Due Date" 
                                                            class="form-control" />
                                                    </td>

                                                    <td>
                                                        <input type="text"
                                                            name="hsn_no_{{ $key }}"
                                                            value="@if (old('hsn_no')) {{ old('hsn_no') }}@else{{ $editDataNew->hsn_no}} @endif"
                                                            placeholder="Enter HSN No"
                                                            class="form-control" />
                                                    </td>

                                                    <td>
                                                        <input type="text"
                                                            name="quantity_{{ $key }}"
                                                            value="@if (old('quantity')) {{ old('quantity') }}@else{{ $editDataNew->quantity}} @endif"
                                                            placeholder="Enter Quantity"
                                                            class="form-control" />
                                                    </td>

                                                    <td>
                                                        <input type="text"
                                                            name="rate_{{ $key }}"
                                                            value="@if (old('rate')) {{ old('rate') }}@else{{ $editDataNew->rate}} @endif"
                                                            placeholder="Enter Rate"
                                                            class="form-control" />
                                                    </td>

                                                    <td>
                                                        <input type="text"
                                                            name="amount_{{ $key }}"
                                                            value="@if (old('amount')) {{ old('amount') }}@else{{ $editDataNew->amount}} @endif"
                                                            placeholder="Enter Amount" class="form-control" />
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

                                                @foreach ($editData as $key => $editDataNew)
                                                    @if ($key == 0)                                                            
                                                        <div class="form-group-inner">
                                                            <div class="row">                                                                
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                    <label for="terms_condition">Terms & Condition:</label>
                                                                    <input type="text" class="form-control" id="terms_condition"
                                                                        name="terms_condition" 
                                                                        value="@if (old('terms_condition')) {{ old('terms_condition') }}@else{{ $editDataNew->terms_condition }} @endif"
                                                                        placeholder="Enter Terms & Condition">
                                                                </div>

                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                    <label for="remark">Remark:</label>
                                                                    <input type="text" class="form-control" id="remark"
                                                                        name="remark" 
                                                                        value="@if (old('remark')) {{ old('remark') }}@else{{ $editDataNew->remark }} @endif"
                                                                        placeholder="Enter Remark">
                                                                </div>
                                                        </div>    

                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <label for="transport_dispatch">Transport/Dispatch:</label>
                                                                <input type="text" class="form-control" id="transport_dispatch"
                                                                    name="transport_dispatch" 
                                                                    value="@if (old('transport_dispatch')) {{ old('transport_dispatch') }}@else{{ $editDataNew->transport_dispatch }} @endif"
                                                                    placeholder="Enter Transport/Dispatch">
                                                            </div>                                                             
                                                    @endif
                                                    @endforeach    
                                                                                                                
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <label for="image">Image:</label>
                                                                <input type="file" class="form-control"
                                                                    accept="image/*" id="image" name="image">
                                                                <div id="oldImageDisplay">
                                                                    @if (isset($editDataNew->image))
                                                                        <b>Image Preview: </b>
                                                                        <img src="{{ Config::get('FileConstant.PURCHASE_ORDER_VIEW') . $editDataNew->image }}"
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
                                                    

                                                        <div class="login-btn-inner">
                                                            <div class="row">
                                                                <div class="col-lg-5"></div>
                                                                <div class="col-lg-7">
                                                                    <div class="login-horizental cancel-wp pull-left">
                                                                        <a href="{{ route('list-purchase') }}"
                                                                            class="btn btn-white"
                                                                            style="margin-bottom:50px">Cancel</a>
                                                                        <button class="btn btn-sm btn-primary login-submit-cs" id="submitButton"
                                                                            type="submit" style="margin-bottom:50px">Update
                                                                            Data</button>
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


    <form method="POST" action="{{ route('delete-addmore') }}" id="deleteform">
        @csrf
        <input type="hidden" name="delete_id" id="delete_id" value="">
    </form>

    {{-- <form method="POST" action="{{ route('add-addmore') }}" id="addform">
        @csrf
        <input type="hidden" name="add_id" id="add_id" value="">
    </form> --}}

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
            // '<tr>  <input type="hidden" name="addmore[' + i + '][design_count]" class="form-control" value="' + i + '" placeholder=""> <input type="hidden" name="addmore[' + i + '][purchase_id]" class="form-control" value="' + i + '" placeholder=""><td><input type="text" name="addmore[' + i + '][design_name]" placeholder="Enter Product Name" class="form-control" /></td><td><input type="text" name="addmore[' + i + '][product_quantity]" placeholder="Enter Product Quantity" class="form-control" /></td><td><input type="text" name="addmore[' + i + '][product_size]" placeholder="Enter Product Price" class="form-control" /></td><td><input type="text" name="addmore[' + i + '][product_unit]" placeholder="Enter Product Unit" class="form-control" /></td><td> <a class="remove-tr delete-btn btn btn-danger m-1" title="Delete"><i class="fas fa-archive"></i></a></td></tr>'
            '<tr><td><input type="text" name="addmore[' +
            i +
            '][part_no]" placeholder="Enter Part No" class="form-control" /></td><td><input type="text" name="addmore[' +
            i +
            '][description]" placeholder="Enter Description" class="form-control" /></td><td><input type="date" name="addmore[' +
            i +
            '][due_date]" placeholder="Select Due Date" class="form-control" /></td><td><input type="text" name="addmore[' +
            i +
            '][hsn_no]" placeholder="Enter HSN No" class="form-control" /></td><td><input type="text" name="addmore[' +
            i +
            '][quantity]" placeholder="Enter Quantity" class="form-control" /></td><td><input type="text" name="addmore[' +
            i +
            '][rate]" placeholder="Enter Rate" class="form-control" /></td><td><input type="text" name="addmore[' +
            i +
            '][amount]" placeholder="Enter Amount" class="form-control" /></td><td><a class="remove-tr delete-btn btn btn-danger m-1" title="Delete"><i class="fas fa-archive"></i></a></td></tr>'
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
                po_date: {
                    required: true,
                    date: true,
                },
                vendor_id: {
                    required: true,
                },
                terms_condition: {
                    required: true,
                },            
                remark: {
                    required: true,
                },
                transport_dispatch : {
                    required: true,
                },
                image: {
                    required: true,
                },

                // Add validation rules for other fields
                'addmore[0][part_no]': {
                    required: true,
                    number : true                
                },
                'addmore[0][description]': {
                    required: true,
                },
                'addmore[0][due_date]': {
                    required: true,
                    date : true,
                },
                'addmore[0][hsn_no]': {
                    required: true,
                    number: true
                },
                'addmore[0][quantity]': {
                    required: true,
                    number: true
                },
                'addmore[0][rate]': {
                    required: true,
                    number: true
                },
                'addmore[0][amount]': {
                    required: true,
                    number: true
                },
            },

            messages: {
                po_date: {
                    required: "Please Select PO Date.",
                    date: "Please Select a valid PO date."
                },
                vendor_id: {
                    required: "Please Select Vendor.",
                },
                terms_condition: {
                    required: "Please Enter Terms And Condition.",
                },
                remark: {
                    required: "Please Enter Remark.",
                },            
                transport_dispatch: {
                    required: "Please Enter Transport/Dispatch.",
                },
                image: {
                    required: "Please Upload an Image.",
                    accept: "Please Upload an Image file.",
                },

                // Add error messages for other fields
                'addmore[0][part_no]': {
                    required: "Please Enter Part No",
                    number: "Part No should contain only numbers."
                },
                'addmore[0][description]': {
                    required: "Please Enter Description.",
                },
                'addmore[0][due_date]': {
                    required: "Please Select Due Date",
                    date: "Please Enter a valid Due date."
                },
                'addmore[0][hsn_no]': {
                    required: "Please Enter HSN No",
                    number: "HSN No should contain only numbers."
                },
                'addmore[0][quantity]': {
                    required: "Please Enter Quantity",
                    number: "Quantity should contain only numbers."
                },
                'addmore[0][rate]': {
                    required: "Please Enter Rate",
                    number: "Rate should contain only numbers."
                },
                'addmore[0][amount]': {
                    required: "Please Enter Amount",
                    number: "Amount should contain only numbers."
                },            
            },
        });
    });
</script>

<!-- Make sure you have jQuery and jquery.validate.js included before this script -->
<!-- <script>
        $(document).ready(function() {
            var currentSignatureImage = $("#currentSignatureImage").val();
    
            // Function to check if all input fields are filled with valid data
            function checkFormValidity() {
                const po_date = $('#po_date').val();
                const vendor_id = $('#vendor_id').val();
                const terms_condition = $('#terms_condition').val();
                const remark = $('#remark').val();
                const transport_dispatch = $('#transport_dispatch').val();
                const image = $('#image').val();
    
                // Update the old PDF values if there are any selected files
                if (image !== currentSignatureImage) {
                    $("#currentSignatureImage").val(image);
                }                  
            }
    
            // Call the checkFormValidity function on file input change
            $('input, #image').on('change', function() {
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
                    po_date: {
                        required: true,
                        date: true,
                    },
                    vendor_id: {
                        required: true,
                    },
                    terms_condition: {
                        required: true,
                    },            
                    remark: {
                        required: true,
                    },
                    transport_dispatch : {
                        required: true,
                    },
                    image: {
                        validImage: true,
                        fileSize: [10, 2048], // Min 180KB and Max 2MB (2 * 1024 KB)
                    },     
                    // Add validation rules for other fields
                    'addmore[0][part_no]': {
                        required: true,
                        number : true                
                    },
                    'addmore[0][description]': {
                        required: true,
                    },
                    'addmore[0][due_date]': {
                        required: true,
                        date : true,
                    },
                    'addmore[0][hsn_no]': {
                        required: true,
                        number: true
                    },
                    'addmore[0][quantity]': {
                        required: true,
                        number: true
                    },
                    'addmore[0][rate]': {
                        required: true,
                        number: true
                    },
                    'addmore[0][amount]': {
                        required: true,
                        number: true
                    },                  
                },
                messages: {
                    po_date: {
                        required: "Please Select PO Date.",
                        date: "Please Select a valid PO date."
                    },
                    vendor_id: {
                        required: "Please Select Vendor.",
                    },
                    terms_condition: {
                        required: "Please Enter Terms And Condition.",
                    },
                    remark: {
                        required: "Please Enter Remark.",
                    },            
                    transport_dispatch: {
                        required: "Please Enter Transport/Dispatch.",
                    },                        
                    image: {
                        validImage: "Only JPG, JPEG, PNG images are allowed.",
                        fileSize: "The file size must be between 10 KB and 2048 KB.",
                    },

                    // Add error messages for other fields
                    'addmore[0][part_no]': {
                        required: "Please Enter Part No",
                        number: "Part No should contain only numbers."
                    },
                    'addmore[0][description]': {
                        required: "Please Enter Description.",
                    },
                    'addmore[0][due_date]': {
                        required: "Please Select Due Date",
                        date: "Please Enter a valid Due date."
                    },
                    'addmore[0][hsn_no]': {
                        required: "Please Enter HSN No",
                        number: "HSN No should contain only numbers."
                    },
                    'addmore[0][quantity]': {
                        required: "Please Enter Quantity",
                        number: "Quantity should contain only numbers."
                    },
                    'addmore[0][rate]': {
                        required: "Please Enter Rate",
                        number: "Rate should contain only numbers."
                    },
                    'addmore[0][amount]': {
                        required: "Please Enter Amount",
                        number: "Amount should contain only numbers."
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
            $("#image").change(function() {
                var reader = new FileReader();
                reader.onload = function(e) {
                    // Display the selected image for English
                    // You can remove this if you don't need to display the image on the page
                    $("#currentEnglishImageDisplay").attr('src', e.target.result);
                    validator.element("#image"); // Revalidate the file input
                };
                reader.readAsDataURL(this.files[0]);
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

@endsection