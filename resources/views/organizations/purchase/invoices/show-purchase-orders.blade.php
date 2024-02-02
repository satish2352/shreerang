@extends('organizations.layouts.master')
@section('content')
<br>
<div class="container-fluid">
  <strong>
    <div class="row">
      <div class="col-sm-6 col-md-10 m-b-20">
        <img src="" class="inv-logo" alt="logo">
        <ul class="list-unstyled">
          <li>{{ env('APP_NAME', 'Shreerag') }}</li>

          <li>W-127 A, MIDC, Ambad , Nashik-422010 , Maharashtra Code-27 , CIN U99999MH1997PTC108601</li>
          <li>shreerageng@rediffmail.com</li>
          <li>Contact Number:- +91 9822502226</li>
        </ul>
      </div>
      <div class="col-sm-6 col-md-2 m-b-20">
        <div class="invoice-details">
          <h4 class="text-uppercase">PO No : ST-{{$invoice->id}}</h4>
          <ul class="list-unstyled">
            <li>Issued Date: <span>{{date_format(date_create($invoice->invoice_date),'d M, Y')}}</span></li>
            <li>Due date: <span>{{date_format(date_create($invoice->due_date),'d M, Y')}}</span></li>
          </ul>
        </div>
      </div>
    </div><br><br>
  </strong>
  <div class="row">
    <div class="col-sm-6 col-lg-7 col-xl-8 m-b-20">
      <h5>To:</h5>
      <strong>
        <ul class="list-unstyled">
          <li>
            Client Name :- {{$invoice->client_name}}
          </li>
          <li>Client Address :- {{$invoice->client_address}}</li>
          <li>Email :- <a href="javascript:void(0)">{{$invoice->email}}</a></li>
          <li>GST Number :- {{$invoice->gst_number}}</li>
        </ul>
      </strong>
    </div>

  </div><br><br>
  <div class="table-responsive">
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th class="col-sm-2">Part No.</th>
          <th class="col-md-2">Description</th>
          <th class="col-md-2">Due Date</th>
          <th class="col-md-2">HSN</th>
          <th class="col-md-2">Quantity</th>
          <th class="col-md-2">Rate</th>
          <th>Amount</th>
        </tr>
      </thead>
      <tbody>
        @php
        $items = json_decode($invoice->items, true);
        @endphp

        @if(is_array($items))
        @foreach ($items as $item)
        <tr>
          <td>{{ $item['id'] }}</td>
          <td>{{ $item['part_no'] }}</td>
          <td class="d-none d-sm-table-cell">{{ $item['description'] }}</td>
          <td>{{ $item['due_date'] }}</td>
          <td>{{ $item['hsn'] }}</td>
          <td>{{ $item['quantity'] }}</td>
          <td>{{ $item['rate'] }}</td>
          <td class="text-right">{{$item['amount']}}</td>

        </tr>
        @endforeach
        @endif
      </tbody>


    </table>
  </div>
  <div>
    <div class="row invoice-payment">
      <div class="col-sm-7">
      </div>
      <div class="col-sm-5">
        <div class="m-b-20">
          <div class="table-responsive no-border">
            <table class="table mb-0">
              <tbody>
                <tr>
                  <th>Subtotal:</th>
                  <td class="text-right">
                    {{$invoice->total}} Rs.</td>
                </tr>
                <tr>
                  <th>Discount: <span class="text-regular">({{$invoice->discount}}%)</span></th>
                  <td class="text-right">
                    {{'- '.(($invoice->discount/100) * $invoice->total).' Rs. '}}
                  </td>
                </tr>
                <tr>
                  <th>Tax: <span class="text-regular">({{$invoice->tax}}%)</span></th>
                  <td class="text-right">
                    {{'+ '.(($invoice->tax/100) * ($invoice->total-(($invoice->discount/100) * $invoice->total))).' Rs. '}}
                  </td>
                </tr>
                <tr>

                <tr>
                  <th>Total:</th>
                  <td class="text-right text-primary">
                    <h5>
                      {{' '.(($invoice->total -(($invoice->discount/100) * $invoice->total))  + (($invoice->percentage/100) * ($invoice->total-(($invoice->discount/100) * $invoice->total))))+((($invoice->tax/100) * ($invoice->total-(($invoice->discount/100) * $invoice->total)))).' Rs.'}}
                    </h5>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="invoice-info">
      <h5>Other information</h5>
      <p class="text-muted">{{$invoice->note}}</p>
    </div><br>
  </div>
</div>
</div>
</div>
</div>
@endsection


@section('scripts')
<!-- Select2 JS -->
<script src="{{asset('assets/plugins/select2/select2.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-repeater/jquery.repeater.min.js')}}"></script>
<script>
$(document).ready(function() {
  'use strict';
  var index = 0;

  var tax = $('#inv_tax').val();

  $('table.repeater').repeater({

    show: function() {
      var id = $(`input[name="items[${index}][id]"]`);
      var name = $(`input[name="items[${index}][name]"]`);
      var unit_cost = $(`input[name="items[${index}][unit_cost]"]`);
      var quantity = $(`input[name="items[${index}][quantity]"]`);
      var amount = $(`input[name="items[${index}][amount]"]`);
      var item_amount = unit_cost.val() * quantity.val();
      amount.val(item_amount);

      index++;
      id.val(index)
      $(this).slideDown();
    },

    hide: function(deleteElement) {
      index--;
      $(this).slideUp(deleteElement);
    },

  });

});
</script>
@endsection