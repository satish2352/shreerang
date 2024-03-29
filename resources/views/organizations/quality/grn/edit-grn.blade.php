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
                            <h1>Edit GRN Data</h1>
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
                                        <form action="{{ route('update-grn', $editData[0]->grn_main_id) }}"
                                            method="POST" id="editDesignsForm" enctype="multipart/form-data">
                                            @csrf
                                           
                                            <input type="hidden" name="grn_main_id"
                                                id="" class="form-control"
                                                value="{{ $editData[0]->grn_main_id}}"
                                                placeholder="">

                                            <a
                                             {{-- href="{{ route('add-more-data') }}" --}}
                                            class="btn btn-sm btn-primary ml-3"> <button type="button" name="add" id="add" class="btn btn-success">Add More</button></a>

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
                                                                <label for="grn_date">GRN Date:</label>
                                                                <input type="date" class="form-control" id="grn_date"
                                                                    name="grn_date" 
                                                                    value="{{ old('grn_date', isset($editDataNew) ? date('Y-m-d', strtotime($editDataNew->grn_date)) : '') }}"
                                                                    placeholder="Enter GRN Date">
                                                            </div>

                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <label for="purchase_id">PO No.:</label>
                                                                <input type="text" class="form-control" id="purchase_id"
                                                                    name="purchase_id" 
                                                                    value="@if (old('purchase_id')) {{ old('purchase_id') }}@else{{ $editDataNew->purchase_id }} @endif"
                                                                    placeholder="Enter Purchase No.">
                                                            </div>
                                                        </div>

                                                        <div class="row">    
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <label for="po_date">PO Date :</label>
                                                                <input type="date" class="form-control" id="po_date"
                                                                    name="po_date" 
                                                                    value="{{ old('po_date', isset($editDataNew) ? date('Y-m-d', strtotime($editDataNew->po_date)) : '') }}"
                                                                    placeholder="Enter PO Date">
                                                            </div>                                               

                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <label for="invoice_no">Invoice No.:</label>
                                                                <input type="text" class="form-control" id="invoice_no"
                                                                    name="invoice_no" 
                                                                    value="@if (old('invoice_no')) {{ old('invoice_no') }}@else{{ $editDataNew->invoice_no }} @endif"
                                                                    placeholder="Enter Invoice No">
                                                            </div>
                                                        </div>    

                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <label for="invoice_date">Invoice Date:</label>
                                                                <input type="date" class="form-control" id="invoice_date"
                                                                    name="invoice_date" 
                                                                    value="{{ old('invoice_date', isset($editDataNew) ? date('Y-m-d', strtotime($editDataNew->invoice_date)) : '') }}"
                                                                    placeholder="Enter Invoice Date">
                                                            </div>

                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                    <label for="image">Image:</label>
                                                                    <input type="file" class="form-control"
                                                                        accept="image/*" id="image" name="image">
                                                                    <div id="oldImageDisplay">
                                                                        @if (isset($editDataNew->image))
                                                                            <b>Image Preview: </b>
                                                                            <img src="{{ Config::get('FileConstant.GRN_VIEW') . $editDataNew->image }}"
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
                                                    </div> 
                                                @endif
                                                @endforeach

                                                <div style="margin-top:30px;"> 
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
                                                        @foreach ($editData as $key => $editDataNew)
                                                        
                                                            <tr>                                                                                                                      
                                                                <td>

                                                                <input type="hidden" name="design_count"
                                                                    id="design_id_{{ $key }}" class="form-control"
                                                                    value="{{ $key}}"
                                                                    placeholder="">

                                                                <input type="hidden" name="design_id_{{ $key }}"
                                                                    id="design_id_{{ $key }}" class="form-control"
                                                                    value="{{ $editDataNew->tbl_grn_details_id }}"
                                                                    placeholder="">
                                                                    
                                                                    <input type="text"
                                                                        name="description_{{ $key }}"
                                                                        value="@if (old('description')) {{ old('description') }}@else{{ $editDataNew->description }} @endif"
                                                                        placeholder="Enter Description"
                                                                        class="form-control" />
                                                                </td>
                                                                        
                                                                <td>
                                                                    <input type="text"
                                                                        name="qc_check_remark_{{ $key }}"
                                                                        value="@if (old('qc_check_remark')) {{ old('qc_check_remark') }}@else{{ $editDataNew->qc_check_remark }} @endif"
                                                                        placeholder="Enter QC Check"
                                                                         class="form-control" />
                                                                </td>

                                                                <td>
                                                                    <input type="text"
                                                                        name="chalan_quantity_{{ $key }}"
                                                                        value="@if (old('chalan_quantity')) {{ old('chalan_quantity') }}@else{{ $editDataNew->chalan_quantity }} @endif"
                                                                        placeholder="Enter Chalan Qty"
                                                                        class="form-control" />
                                                                </td>

                                                                <td>
                                                                    <input type="text"
                                                                        name="actual_quantity_{{ $key }}"
                                                                        value="@if (old('actual_quantity')) {{ old('actual_quantity') }}@else{{ $editDataNew->actual_quantity }} @endif"
                                                                        placeholder="Enter Actual Qty"
                                                                        class="form-control" />
                                                                </td>

                                                                <td>
                                                                    <input type="text"
                                                                        name="accepted_quantity_{{ $key }}"
                                                                        value="@if (old('accepted_quantity')) {{ old('accepted_quantity') }}@else{{ $editDataNew->accepted_quantity }} @endif"
                                                                        placeholder="Enter Accepted Qty"
                                                                        class="form-control" />
                                                                </td>

                                                                <td>
                                                                    <input type="text"
                                                                        name="rejected_quantity_{{ $key }}"
                                                                        value="@if (old('rejected_quantity')) {{ old('rejected_quantity') }}@else{{ $editDataNew->rejected_quantity }} @endif"
                                                                        placeholder="Enter Rejected Qty"
                                                                        class="form-control" />
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

                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <label for="remark">Remark:</label>
                                                        <input type="text" class="form-control" id="remark"
                                                            name="remark"
                                                            value="@if (old('remark')) {{ old('remark') }}@else{{ $editDataNew->remark }} @endif"
                                                            placeholder="Enter Remark">
                                                    </div>
                                                </div>

                                                
                                                <div class="login-btn-inner">
                                                    <div class="row">
                                                        <div class="col-lg-5"></div>
                                                        <div class="col-lg-7">
                                                            <div class="login-horizental cancel-wp pull-left">
                                                                <a href="{{ route('list-grn') }}"
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
    $(document).ready(function() {
    var i = {!! count($editData) !!}; // Initialize i with the number of existing rows

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
});
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

<script>
    jQuery.noConflict();
    jQuery(document).ready(function($) {
        $("#editDesignsForm").validate({
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

<!-- Make sure you have jQuery and jquery.validate.js included before this script -->
<!-- <script>
    $(document).ready(function() {
        var currentSignatureImage = $("#currentSignatureImage").val();

        // Function to check if all input fields are filled with valid data
        function checkFormValidity() {
            const grn_date = $('#grn_date').val();
            const purchase_id = $('#purchase_id').val();
            const po_date = $('#po_date').val();
            const invoice_no = $('#invoice_no').val();
            const invoice_date = $('#invoice_date').val();
            const remark = $('#remark').val();
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
       
        // Initialize the form validation
        var form = $("#editDesignsForm");
        var validator = form.validate({
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
                    validImage: true,
                    fileSize: [10, 2048], // Min 180KB and Max 2MB (2 * 1024 KB)
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
                    validImage: "Only JPG, JPEG, PNG images are allowed.",
                    fileSize: "The file size must be between 10 KB and 2048 KB.",
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
    $(document).on("click", ".remove-tr", function() {
        var rowId = $(this).data('row-id');
        var row = $(this).closest('tr');
        alert(rowId);
        $.ajax({
        url: '/remove-GRN-details/' + rowId,
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

</script>
@endsection
