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
                            <h1>Edit Store Receipt Data</h1>
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
                                        <form action="{{ route('update-store-receipt', $editData[0]->store_receipt_main_id) }}"
                                            method="POST" id="editDesignsForm" enctype="multipart/form-data">
                                            
                                            @csrf
                                            <input type="hidden" name="store_receipt_main_id"
                                                            id="" class="form-control"
                                                            value="{{ $editData[0]->store_receipt_main_id}}"
                                                            placeholder="">
                                                            
                                            <a
                                            {{-- href="{{ route('add-more-data') }}" --}}
                                           > 
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
                                                                    <label for="store_date">Date:</label>
                                                                    <input type="date" class="form-control" id="store_date"
                                                                    name="store_date" 
                                                                    value="{{ $editDataNew->store_date }}">
                                                            </div>   

                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <label for="name">Name of Store Person :</label>
                                                                <input type="text" class="form-control" id="name"
                                                                    name="name" placeholder="Enter Name of Store Person"
                                                                    value="{{ $editDataNew->name }}">
                                                            </div>

                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <label for="contact_number">Contact No. :</label>
                                                                <input type="text" class="form-control" id="contact_number"
                                                                    name="contact_number" placeholder="Enter Contact No."
                                                                    value="{{ $editDataNew->contact_number }}"
                                                                    pattern="[789]{1}[0-9]{9}" 
                                                                    oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" 
                                                                    maxlength="10" 
                                                                    minlength="10">
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach

                                                <div style="margin-top:10px;"> 
                                                    <table class="table table-bordered" id="dynamicTable">
                                                        <tr>
                                                            <th>Quantity</th>
                                                            <th>Description</th>
                                                            <th>Price</th>
                                                            <th>Amount</th>
                                                            <th>Total</th>
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
                                                                    value="{{ $editDataNew->store_receipt_details_id }}"
                                                                    placeholder="">
                                                            
                                                                <td>
                                                                    <input type="text"
                                                                        name="quantity_{{ $key }}"
                                                                        value="{{ $editDataNew->quantity }}"
                                                                        placeholder="Enter Quantity"
                                                                        class="form-control" />
                                                                </td>
                                                                        
                                                                <td>
                                                                    <input type="text"
                                                                        name="description_{{ $key }}"
                                                                        value="{{ $editDataNew->description }}"
                                                                        placeholder="Enter description" class="form-control" />
                                                                </td>

                                                                <td>
                                                                    <input type="text"
                                                                        name="price_{{ $key }}"
                                                                        value="{{ $editDataNew->price}}"
                                                                        placeholder="Enter Price"
                                                                        class="form-control" />
                                                                </td>

                                                                <td>
                                                                    <input type="text"
                                                                        name="amount_{{ $key }}"
                                                                        value="{{ $editDataNew->amount}}"
                                                                        placeholder="Enter amount" class="form-control" />
                                                                </td>

                                                                <td>
                                                                    <input type="text"
                                                                        name="total_{{ $key }}"
                                                                        value="{{ $editDataNew->total}}"
                                                                        placeholder="Enter total" class="form-control" />
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
                                                                    <label for="remark">Remark :</label>
                                                                    <input type="text" class="form-control" id="remark"
                                                                        name="remark" placeholder="Enter Remark here"
                                                                        value="{{ $editDataNew->remark }}">
                                                                </div>                                                            
                                                            
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                    <label for="signature">Image:</label>
                                                                    <input type="file" class="form-control"
                                                                        accept="image/*" id="signature" name="signature">
                                                                    <div id="oldImageDisplay">
                                                                        @if (isset($editDataNew->signature))
                                                                            <b>Image Preview: </b>
                                                                            <img src="{{ Config::get('FileConstant.STORE_RECEIPT_VIEW') . $editDataNew->signature }}"
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

                                                
                                                <div class="login-btn-inner">
                                                    <div class="row">
                                                        <div class="col-lg-5"></div>
                                                        <div class="col-lg-7">
                                                            <div class="login-horizental cancel-wp pull-left">
                                                                <a href="{{ route('list-store-receipt') }}"
                                                                    class="btn btn-white"
                                                                    style="margin-bottom:50px">Cancel</a>
                                                                <button class="btn btn-sm btn-primary login-submit-cs"
                                                                    type="submit" style="margin-bottom:50px">Update
                                                                    Data</button>
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
            // '<tr><td><input type="text" name="design_name_' + i + '" placeholder="Enter Product Name" class="form-control" /></td><td><input type="text" name="product_quantity_' + i + '" placeholder="Enter Product Quantity" class="form-control" /></td><td><input type="text" name="product_size_' + i + '" placeholder="Enter Product Price" class="form-control" /></td><td><input type="text" name="product_unit_' + i + '][product_unit_]" placeholder="Enter Product Unit" class="form-control" /></td><td><a class="delete-btn btn btn-danger m-1 remove-tr" title="Delete Tender"><i class="fas fa-archive"></i></a></td></tr>'

            '<tr><td><input type="text" name="addmore[' +
                i +
                '][quantity]" placeholder="Enter your quantity" class="form-control" /></td><td><input type="text" name="addmore[' +
                i +
                '][description]" placeholder="Enter your description" class="form-control" /></td><td><input type="text" name="addmore[' +
                i +
                '][price]" placeholder="Enter your Price" class="form-control" /></td><td><input type="text" name="addmore[' +
                i +
                '][amount]" placeholder="Enter your amount" class="form-control" /></td><td><input type="text" name="addmore[' +
                i +
                '][total]" placeholder="Enter your total" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>'
                
        );
    });

    $(document).on("click", ".remove-tr", function() {
        $(this).parents("tr").remove();
    });
});

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
            store_date: {
                required: true,
                date: true,
            },
            name: {
                required: true,
                noNumbers: true
            },
            contact_number: {
                required: true,
                digits: true 
            },
            address: {
                required: true,
            },           
            remark: {
                required: true,
            },
            signature: {
                required: true,
            },
            'addmore[0][quantity]': {
                required : true,
                number: true 
            },
            'addmore[0][description]': {
                required : true,
            },
            'addmore[0][price]': {
                required : true,
                number: true 
            },
            'addmore[0][amount]': {
                required : true,
                number: true 
            },
            'addmore[0][total]': {
                required : true,
                number: true 
            },            
        },

        messages: {
            store_date: {
                required: "Please Select a Store Date.",
                date: "Please enter a valid Store date."
            },
            receipt_date: {
                required: "Please Select a Receipt date.",
                date: "Please enter a valid Receipt date."
            },
            // receipt_no: {
            //     required: "Please Enter receipt No.",
            // },
            name: {
                required: "Please Enter Store Person Name.",
                noNumbers: "Store Person Name should not contain any numbers."
            },
            contact_number: {
                required: "Please Enter a valid Contact No.",
                digits: "Contact Number should contain only digits."
            },
            // address: {
            //     required: "Please enter a valid address.",
            // },           
            remark: {
                required: "Please Write Remark",
            },
            signature: {
                required: "Please Upload an Signature Image.",
                accept: "Please Upload an Signature Image file.",
            },
        
            'addmore[0][quantity]': {
                required: "Please Enter Quantity.",
                number: "Quantity should contain only numbers."
            },
            'addmore[0][description]': {
                required: "Please Enter Description.",                
            },
            'addmore[0][price]': {
                required: "Please Enter Price.",
                number: "Price should contain only numbers."
            },
            'addmore[0][amount]': {
                required: "Please Enter Amount.",
                number: "Amount should contain only numbers."
            },
            'addmore[0][total]': {
                required: "Please Enter Total.",
                number: "Total should contain only numbers."
            },    

        },
    });

    $.validator.addMethod("noNumbers", function(value, element) {
            return this.optional(element) || !/\d/.test(value);
        }, "Vendor Name should not contain any numbers.");
        
});

</script>

@endsection