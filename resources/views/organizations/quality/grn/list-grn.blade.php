<!-- Static Table Start -->
@extends('admin.layouts.master')
@section('content')
<style>
.fixed-table-loading {
    display: none;
}
#table thead th {
    white-space: nowrap;
}
#table thead th{
    width: 300px !important; 
    padding-right: 49px !important;
padding-left: 20px !important;
}
.custom-datatable-overright table tbody tr td {
    padding-left: 19px !important;
    padding-right: 5px !important;
    font-size: 14px;
    text-align: left;
}


.zoomable-image {
    position: relative;
    width: 30%;
    cursor: pointer;
}

.zoomed-in {
    transform: scale(3.5) !important;
    position: fixed;
    top: 40%;
    left: 70%;
    transform: translate(-50%, -50%);
    z-index: 1;    

}

</style>

<div class="data-table-area mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1>GRN <span class="table-project-n">Data</span> Table</h1>
                                <div class="form-group-inner login-btn-inner row">
                                    <div class="col-lg-2" >
                                        <div class="login-horizental cancel-wp pull-left">
                                                <a href="{{ route('add-grn') }}" ><button class="btn btn-sm btn-primary login-submit-cs" type="submit" >Add GRN</button></a>
                                        </div>
                                    </div>
                                <div class="col-lg-10"></div>
                            </div>
                        </div>
                    </div>

                      @if (Session::get('status') == 'success')
                           <div class="alert alert-success alert-success-style1">
                                <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
										<span class="icon-sc-cl" aria-hidden="true">&times;</span>
									</button>
                                <i class="fa fa-check adminpro-checked-pro admin-check-pro" aria-hidden="true"></i>
                                <p><strong>Success!</strong> {{ Session::get('msg') }}</p>
                            </div>
                             @endif
                            @if (Session::get('status') == 'error')
                              <div class="alert alert-danger alert-mg-b alert-success-style4">
                                <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
										<span class="icon-sc-cl" aria-hidden="true">&times;</span>
									</button>
                                <i class="fa fa-times adminpro-danger-error admin-check-pro" aria-hidden="true"></i>
                                <p><strong>Danger!</strong> {{ Session::get('msg') }}</p>
                            </div>
                            @endif

                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <div id="toolbar">
                                <select class="form-control">
                                    <option value="">Export Basic</option>
                                    <option value="all">Export All</option>
                                    <option value="selected">Export Selected</option>
                                </select>
                            </div>                         
                           
                          
                            <div class="table-responsive"> 
                                <table id="table" data-toggle="table" data-pagination="true" data-search="true"
                                    data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true"
                                    data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                    data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true"
                                    data-toolbar="#toolbar">
                                    <thead>
                                        <tr>
                                            <th data-field="state" data-checkbox="true"></th>
                                            <th data-field="id">ID</th>
                                            <th data-field="grn_date" data-editable="true">GRN Date</th>
                                            <th data-field="purchase_id" data-editable="true">PO No</th>
                                            <th data-field="po_date" data-editable="true">PO Date</th>
                                            <th data-field="invoice_no" data-editable="true">Invoice No</th>
                                            <th data-field="invoice_date" data-editable="true">Invoice Date</th>
                                            <th data-field="remark" data-editable="true">Remark</th>
                                            <th data-field="image" data-editable="false">Signature</th>                                           
                                            <th data-field="action">Action</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                       
                                    @foreach($getOutput as $data)
                                        <tr>
                                            <td></td>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ucwords($data->grn_date)}}</td>
                                            <td>{{ucwords($data->purchase_id)}}</td>
                                            <td>{{ucwords($data->po_date)}}</td>
                                            <td>{{ucwords($data->invoice_no)}}</td>
                                            <td>{{ucwords($data->invoice_date)}}</td>
                                            <td>{{ucwords($data->remark)}}</td>
                                            <td>
                                                <div class="zoomable-image" onclick="toggleZoom(this)"> 
                                                    <img class="img-fluid" 
                                                    src="{{ Config::get('FileConstant.GRN_VIEW') . $data->image }}" 
                                                    alt="{{ strip_tags($data['company_name']) }} Image" />
                                                </div>    
                                            </td>
                                                                                       
                                            <td>
                                                <div style="display: flex; align-items: center;">
                                                    <a href="{{route('edit-grn', base64_encode($data->id))}}"><button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                                    {{-- <a href="{{route('delete-grn')}} "><button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a> --}}
                                                </div>
                                            </td>
                                        </tr>  
                                    @endforeach                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
        function toggleZoom(element) {
            element.classList.toggle('zoomed-in');
        }

        // Close zoomed image when clicking outside
        window.addEventListener('click', function (event) {
            var zoomedImages = document.querySelectorAll('.zoomed-in');
            zoomedImages.forEach(function (img) {
                if (!img.contains(event.target)) {
                    img.classList.remove('zoomed-in');                   
                }
            });
        });
</script>

@endsection
