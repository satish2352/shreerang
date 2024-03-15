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
                                            <form action="{{ route('update-vendor', 
                                        ) }}"
                                            method="POST" id="editDesignsForm" enctype="multipart/form-data">
                                            @csrf
                                        
                                            <!-- <a
                                            {{-- href="{{ route('add-more-data') }}" --}}
                                            class="btn btn-sm btn-primary ml-3"> <button type="button" name="add" id="add" class="btn btn-success">Add More</button></a> -->

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
                                                                    <label for="vendor_name">Vendor Name:</label>
                                                                    <input type="text" class="form-control" id="vendor_name"
                                                                        name="vendor_name" 
                                                                        value="{{ $editDataNew->vendor_name }}"
                                                                        placeholder="Enter Vendor name">
                                                            </div>                                           

                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <label for="address">Address :</label>
                                                                <input type="text" class="form-control" id="address"
                                                                    name="address" 
                                                                    value="{{ $editDataNew->address }}"
                                                                    placeholder="Enter Address">
                                                            </div>    
                                                        </div>    

                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <label for="gst_no">GST No:</label>
                                                                <input type="text" class="form-control" id="gst_no"
                                                                    name="gst_no" 
                                                                    value="{{ $editDataNew->gst_no }}"
                                                                    placeholder="Enter GST number">
                                                            </div>

                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <label for="contact_no">Contact No. :</label>
                                                                <input type="text" class="form-control" id="contact_no"
                                                                    name="contact_no" 
                                                                    value="{{ $editDataNew->contact_no }}"
                                                                    placeholder="Enter Contact No."
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
                                                                    value="{{ $editDataNew->email }}"
                                                                    placeholder="Enter Email">
                                                            </div>

                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <label for="quote_no">Quote No:</label>
                                                                <input type="text" class="form-control" id="quote_no"
                                                                    name="quote_no" 
                                                                    value="{{ $editDataNew->quote_no }}"
                                                                    placeholder="Enter Quote No">
                                                            </div>
                                                        </div>    
                                                        
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                    <label for="payment_terms">Payment Terms:</label>
                                                                    <input type="text" class="form-control" id="payment_terms"
                                                                        name="payment_terms" 
                                                                        value="{{ $editDataNew->payment_terms }}"
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
                                                @endif
                                            @endforeach   
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
            '<tr><td><input type="text" name="design_name_' + i + '" placeholder="Enter Product Name" class="form-control" /></td><td><input type="text" name="product_quantity_' + i + '" placeholder="Enter Product Quantity" class="form-control" /></td><td><input type="text" name="product_size_' + i + '" placeholder="Enter Product Price" class="form-control" /></td><td><input type="text" name="product_unit_' + i + '][product_unit_]" placeholder="Enter Product Unit" class="form-control" /></td><td><a class="delete-btn btn btn-danger m-1 remove-tr" title="Delete Tender"><i class="fas fa-archive"></i></a></td></tr>'
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
