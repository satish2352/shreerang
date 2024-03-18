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
                                            <a
                                            {{-- href="{{ route('add-more-data') }}" --}}
                                           > 
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
                                                            name="po_date" value="{{ $editDataNew->po_date }}"
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
                                                            value="{{ $editDataNew->part_no }}"
                                                            placeholder="Enter Part No" class="form-control" />
                                                    </td>

                                                    <td>
                                                        <input type="text"
                                                            name="description_{{ $key }}"
                                                            value="{{ $editDataNew->description }}"
                                                            placeholder="Enter Description" class="form-control" />
                                                    </td>

                                                    <td>
                                                        <input type="date"
                                                            name="due_date_{{ $key }}"
                                                            value="{{ $editDataNew->due_date }}"
                                                            placeholder="Enter Due Date" class="form-control" />
                                                    </td>

                                                    <td>
                                                        <input type="text"
                                                            name="hsn_no_{{ $key }}"
                                                            value="{{ $editDataNew->hsn_no }}"
                                                            placeholder="Enter HSN No"
                                                            class="form-control" />
                                                    </td>

                                                    <td>
                                                        <input type="text"
                                                            name="quantity_{{ $key }}"
                                                            value="{{ $editDataNew->quantity }}"
                                                            placeholder="Enter Quantity"
                                                            class="form-control" />
                                                    </td>

                                                    <td>
                                                        <input type="text"
                                                            name="rate_{{ $key }}"
                                                            value="{{ $editDataNew->rate }}"
                                                            placeholder="Enter Rate"
                                                            class="form-control" />
                                                    </td>

                                                    <td>
                                                        <input type="text"
                                                            name="amount_{{ $key }}"
                                                            value="{{ $editDataNew->amount }}"
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
                                                                        value="{{ $editDataNew->terms_condition }}"
                                                                        placeholder="Enter Terms & Condition">
                                                                </div>

                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                    <label for="remark">Remark:</label>
                                                                    <input type="text" class="form-control" id="remark"
                                                                        name="remark" 
                                                                        value="{{ $editDataNew->remark }}"
                                                                        placeholder="Enter Remark">
                                                                </div>
                                                        </div>    

                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <label for="transport_dispatch">Transport/Dispatch:</label>
                                                                <input type="text" class="form-control" id="transport_dispatch"
                                                                    name="transport_dispatch" 
                                                                    value="{{ $editDataNew->transport_dispatch }}"
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
                                                                        <button class="btn btn-sm btn-primary login-submit-cs"
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

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
    var i = {!! count($editData) !!}; // Initialize i with the number of existing rows

    $("#add").click(function() {
        ++i;

        $("#dynamicTable").append(
            '<tr>  <input type="hidden" name="addmore[' + i + '][design_count]" class="form-control" value="' + i + '" placeholder=""> <input type="hidden" name="addmore[' + i + '][purchase_id]" class="form-control" value="' + i + '" placeholder=""><td><input type="text" name="addmore[' + i + '][design_name]" placeholder="Enter Product Name" class="form-control" /></td><td><input type="text" name="addmore[' + i + '][product_quantity]" placeholder="Enter Product Quantity" class="form-control" /></td><td><input type="text" name="addmore[' + i + '][product_size]" placeholder="Enter Product Price" class="form-control" /></td><td><input type="text" name="addmore[' + i + '][product_unit]" placeholder="Enter Product Unit" class="form-control" /></td><td> <a class="remove-tr delete-btn btn btn-danger m-1" title="Delete"><i class="fas fa-archive"></i></a></td></tr>'
        );
    });

    $(document).on("click", ".remove-tr", function() {
        $(this).parents("tr").remove();
    });
});

        // $(document).ready(function() {
        //     var i = {!! count($editData) !!}; // Initialize i with the number of existing rows

        //     $("#add").click(function() {
        //         ++i;

        //         $("#dynamicTable").append(
        //             '<tr>  <input type="hidden" name="addmore[' + i + '][design_count]" class="form-control" value="" placeholder=""><input type="hidden" name="addmore[' + i + '][design_id]" id="design_id" class="form-control" value="" placeholder=""><td><input type="text" name="addmore[' + i + '][design_name]" placeholder="Enter Product Name" class="form-control" /></td><td><input type="text" name="addmore[' + i + '][product_quantity]" placeholder="Enter Product Quantity" class="form-control" /></td><td><input type="text" name="addmore[' + i + '][product_size]" placeholder="Enter Product Price" class="form-control" /></td><td><input type="text" name="addmore[' + i + '][product_unit]" placeholder="Enter Product Unit" class="form-control" /></td><td><button class="delete-btn btn btn-danger m-1 remove-tr" type="button">Delete</button></td></tr>'
        //         );
        //     });

        //     $(document).on("click", ".remove-tr", function() {
        //         $(this).parents("tr").remove();
        //     });
        // });
    </script>
{{-- <script>
    $(document).ready(function() {
    var i = {!! count($editData) !!}; // Initialize i with the number of existing rows

    $("#add").click(function() {
        ++i;

        $("#dynamicTable").append(
            '<tr><td><input type="text" name="design_name_' + i + '" placeholder="Enter Product Name" class="form-control" /></td><td><input type="text" name="product_quantity_' + i + '" placeholder="Enter Product Quantity" class="form-control" /></td><td><input type="text" name="product_size_' + i + '" placeholder="Enter Product Price" class="form-control" /></td><td><input type="text" name="product_unit_' + i + '][product_unit_]" placeholder="Enter Product Unit" class="form-control" /></td><td><a class="delete-btn btn btn-danger m-1 remove-tr" title="Delete Tender"><i class="fas fa-archive"></i></a></td></tr>'
        );
    });

    $(document).on("click", ".remove-tr", function() {
        $(this).parents("tr").remove();
    });

    // Hide the "Add More" button initially if needed
    // $("#add").hide();
});

</script> --}}
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