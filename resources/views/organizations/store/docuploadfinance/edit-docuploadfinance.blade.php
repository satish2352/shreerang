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
                            <h1>Edit Finance Documents Data</h1>
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
                                        <form action="{{ route('update-docuploadfinance') }}"
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
                                                                <label for="grn_image">GRN Image:</label>
                                                                    <input type="file" class="form-control"
                                                                        accept="image/*" id="grn_image" name="grn_image">
                                                                    <div id="oldImageDisplay">
                                                                        @if (isset($editData->grn_image))
                                                                            <b>Image Preview: </b>
                                                                            <img src="{{ Config::get('FileConstant.UPLOAD_FINANCE_DOC_VIEW') . $editData->grn_image }}"
                                                                                alt="Old GRN Image" style="max-width: 100px;">
                                                                        @endif
                                                                    </div>
                                                                    <div id="selectedImageDisplay" style="display: none;">
                                                                        <b>Image Preview: </b>
                                                                        <img src="" alt="Selected GRN Image"
                                                                            style="max-width: 100px;">
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                    <label for="sr_image">SR Image:</label>
                                                                    <input type="file" class="form-control"
                                                                        accept="image/*" id="sr_image" name="sr_image">
                                                                    <div id="oldImageDisplay">
                                                                        @if (isset($editData->sr_image))
                                                                            <b>Image Preview: </b>
                                                                            <img src="{{ Config::get('FileConstant.UPLOAD_FINANCE_DOC_VIEW') . $editData->sr_image }}"
                                                                                alt="Old Image" style="max-width: 100px;">
                                                                        @endif
                                                                    </div>
                                                                    <div id="selectedImageDisplay" style="display: none;">
                                                                        <b>Image Preview: </b>
                                                                        <img src="" alt="Selected SR Image"
                                                                            style="max-width: 100px;">
                                                                    </div>
                                                                </div>
                                                            </div> 
                                                        </div>                                                           
                                                    </div>      
                                                                                          

                                                    <div class="login-btn-inner">
                                                        <div class="row">
                                                            <div class="col-lg-5"></div>
                                                            <div class="col-lg-7">
                                                                <div class="login-horizental cancel-wp pull-left">
                                                                    <a href="{{ route('list-docuploadfinance') }}"
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
            grn_image: {
                required : true,
            },
            sr_image: {
                required : "Please Select Valid Image",
            },           
        },

        messages: {                 
            grn_image: {
                validImage: "Only JPG, JPEG, PNG images are allowed.",
                fileSize: "The file size must be between 10 KB and 2048 KB.",
            },
          
            sr_image: {
                validImage: "Only JPG, JPEG, PNG images are allowed.",
                fileSize: "The file size must be between 10 KB and 2048 KB.",
            },
        },
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




@endsection
