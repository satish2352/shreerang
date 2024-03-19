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
                                                            value="{{ $editDataNew->req_name }}"
                                                            placeholder="Enter your Requisition Name ">
                                                    </div>

                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <label for="req_number">Requisition Number :</label>
                                                        <input type="text" class="form-control" id="req_number"
                                                            name="req_number" 
                                                            value="{{ $editDataNew->req_number }}"
                                                            placeholder="Enter your Requisition Number ">
                                                    </div>
                                                </div>    

                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <label for="req_date">Requisition Date :</label>
                                                        <input type="date" class="form-control" id="req_date"
                                                            name="req_date" 
                                                            value="{{ $editDataNew->req_date }}"
                                                            placeholder="Enter Requisition Date ">
                                                    </div>

                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <label for="signature">Image:</label>
                                                        <input type="file" class="form-control"
                                                            accept="image/*" id="signature" name="signature">
                                                        <div id="oldImageDisplay">
                                                            @if (isset($editDataNew->signature))
                                                                <b>Image Preview: </b>
                                                                <img src="{{ Config::get('FileConstant.REQUISITION_VIEW') . $editDataNew->signature }}"
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
                                                                name="description_{{ $key }}"
                                                                value="{{ $editDataNew->description}}"
                                                                placeholder="Enter Description"
                                                                class="form-control" />
                                                        </td>                                                                                                                                

                                                        <td>
                                                            <input type="text"
                                                                name="quantity_{{ $key }}"
                                                                value="{{ $editDataNew->quantity}}"
                                                                placeholder="Enter Quantity"
                                                                class="form-control" />
                                                        </td>

                                                        <td>
                                                            <input type="text"
                                                                name="unit_{{ $key }}"
                                                                value="{{ $editDataNew->unit}}"
                                                                placeholder="Enter Unit" class="form-control" />
                                                        </td>

                                                        <td>
                                                            <input type="text"
                                                                name="day_{{ $key }}"
                                                                value="{{ $editDataNew->day}}"
                                                                placeholder="Enter Day" class="form-control" />
                                                        </td>

                                                        <td>
                                                            <input type="text"
                                                                name="remark_{{ $key }}"
                                                                value="{{ $editDataNew->remark}}"
                                                                placeholder="Enter Remark" class="form-control" />
                                                        </td>

                                                        <td>
                                                            <input type="text"
                                                                name="stock_{{ $key }}"
                                                                value="{{ $editDataNew->stock}}"
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
    // $(document).ready(function() {
    //     var i = {!! count($editData) !!}; // Initialize i with the number of existing rows

    //     $("#add").click(function() {
    //         ++i;

    //         $("#dynamicTable").append(
    //             '<tr><td><input type="text" name="design_name_' + i + '" placeholder="Enter Product Name" class="form-control" /></td><td><input type="text" name="product_quantity_' + i + '" placeholder="Enter Product Quantity" class="form-control" /></td><td><input type="text" name="product_size_' + i + '" placeholder="Enter Product Price" class="form-control" /></td><td><input type="text" name="product_unit_' + i + '" placeholder="Enter Product Unit" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>'
    //         );
    //     });

    //     $(document).on("click", ".remove-tr", function() {
    //         $(this).parents("tr").remove();
    //     });

    //     // Hide the "Add More" button initially if needed
    //     // $("#add").hide();
    // });

    $(document).ready(function() {
    var i = {!! count($editData) !!}; // Initialize i with the number of existing rows

    $("#add").click(function() {
        ++i;

        $("#dynamicTable").append(
            // '<tr><td><input type="text" name="design_name_' + i + '" placeholder="Enter Product Name" class="form-control" /></td><td><input type="text" name="product_quantity_' + i + '" placeholder="Enter Product Quantity" class="form-control" /></td><td><input type="text" name="product_size_' + i + '" placeholder="Enter Product Price" class="form-control" /></td><td><input type="text" name="product_unit_' + i + '][product_unit_]" placeholder="Enter Product Unit" class="form-control" /></td><td><a class="delete-btn btn btn-danger m-1 remove-tr" title="Delete Tender"><i class="fas fa-archive"></i></a></td></tr>'

            '<tr><td><input type="text" name="addmore[' +
                i +
                '][description]" placeholder="Enter your description" class="form-control" /></td><td><input type="text" name="addmore[' +
                i +
                '][quantity]" placeholder="Enter your quantity" class="form-control" /></td><td><input type="text" name="addmore[' +
                i +
                '][unit]" placeholder="Enter your unit" class="form-control" /></td><td><input type="text" name="addmore[' +
                i +
                '][day]" placeholder="Enter your day" class="form-control" /></td><td><input type="text" name="addmore[' +
                i +
                '][remark]" placeholder="Enter your rremark" class="form-control" /></td><td><input type="text" name="addmore[' +
                i +
                '][stock]" placeholder="Enter your stock" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>'
                
        );
    });

    $(document).on("click", ".remove-tr", function() {
        $(this).parents("tr").remove();
    });

    // Hide the "Add More" button initially if needed
    // $("#add").hide();
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
