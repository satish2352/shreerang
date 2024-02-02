<!-- Static Table Start -->
@extends('organizations.layouts.master')
@section('content')
<style>
/* Add border to form-control border class */
.form-control {
  border: 2px solid #ced4da;
  border-radius: 4px;
}

/* Additional margin for the delete button */
.btn-remove {
  margin-top: 30px;
}
</style>

<div class="data-table-area mg-tb-15">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="sparkline13-list">
          <div class="sparkline13-hd">
            <div class="main-sparkline13-hd">
              <h1>Purchase Order<span class="table-project-n">Data</span> Table</h1>

            </div>
          </div>
          <form action="{{route('store-purchase-order')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label>Client <span class="text-danger">*</span></label>
                  <input class="form-control border border" type="email" name="email">

                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label>Project <span class="text-danger">*</span></label>
                  <input class="form-control border" type="email" name="email">

                </div>
              </div>

              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label>Email</label>
                  <input class="form-control border" type="email" name="email">
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label>Tax</label>
                  <input class="form-control border" type="email" name="email">
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label>Client Address</label>
                  <textarea class="form-control border" rows="3" name="client_address"></textarea>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label>Billing Address</label>
                  <textarea class="form-control border" rows="3" name="billing_address"></textarea>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label>Invoice date <span class="text-danger">*</span></label>
                  <div class="cal-icon">
                    <input class="form-control border datetimepicker" type="text" name="invoice_date">
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label>Due Date <span class="text-danger">*</span></label>
                  <div class="cal-icon">
                    <input class="form-control border datetimepicker" type="text" name="due_date">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Discount </label>
                  <input class="form-control border text-right" type="text" name="discount" value="0">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Status</label>
                  <select name="status" class="select2 form-control border">
                    <option value="paid">Paid</option>
                    <option value="pending">Pending</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Other Information</label>
                  <textarea class="form-control border" name="note"></textarea>
                </div>
              </div>
            </div>
            <div class="submit-section">
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- </div> -->
    <div class="container">
      <div class="form-group-inner login-btn-inner row">
        <div class="col-lg-10"></div>
        <div class="col-lg-2">
          <div class="login-horizental cancel-wp pull-left">
            <button class="btn btn-sm btn-primary login-submit-cs" type="submit" value="Add More" id="addmorebtn">Add
              More</button>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-10 col-sm-12">
        </div>
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <form action="" class="MutipleRecord">
              <div class="row duplicate-row">

                <div class="col-lg-2 col-md-2 col-sm-4">
                  <label for="part_no">Part No.</label>
                  <input type="text" name="part_no" class="form-control border" />
                </div>

                <div class="col-lg-2 col-md-2 col-sm-4">
                  <label for="description">Description</label>
                  <input type="text" name="description" class="form-control border" />
                </div>

                <div class="col-lg-2 col-md-2 col-sm-4">
                  <label for="due_date">Due Date</label>
                  <input type="text" name="due_date" class="form-control border datetimepicker" />
                </div>

                <div class="col-lg-2 col-md-1 col-sm-2">
                  <label for="hsn">HSN</label>
                  <input type="text" name="hsn" class="form-control border" />
                </div>

                <div class="col-lg-1 col-md-1 col-sm-2">
                  <label for="quantity">Quantity</label>
                  <input type="text" name="quantity" class="form-control border" />
                </div>

                <div class="col-lg-1 col-md-1 col-sm-2">
                  <label for="rate">Rate</label>
                  <input type="text" name="rate" class="form-control border" />
                </div>
                <div class="col-lg-1 col-md-2 col-sm-4">
                  <label for="amount">Amount</label>
                  <input type="text" name="amount" class="form-control border " readonly />
                </div>
                <div class="form-group-inner login-btn-inner row">
                  <div class="col-lg-10"></div>
                  <div class="col-lg-2">
                    <div class="login-horizental cancel-wp pull-left">
                      <a value="&#xf014;" class="btn btn-danger btn-remove " />Delete</a>
                    </div>
                  </div>
                </div>
              </div>
            </form>
            <div class="login-btn-inner">
              <div class="row">
                <div class="col-lg-5"></div>
                <div class="col-lg-7">
                  <div class="login-horizental cancel-wp pull-left">
                    <a href="{{ route('list-purchase') }}" class="btn btn-white" style="margin-bottom:50px">Cancel</a>
                    <button class="btn btn-sm btn-primary login-submit-cs" type="submit" style="margin-bottom:50px">Save
                      Data</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
  <script>
  $(document).ready(function() {
    $("#addmorebtn").click(function() {
      var newRow = $(".MutipleRecord .duplicate-row:last-child").clone();
      newRow.find("input").val(""); // Clear input fields in the new row
      newRow.appendTo(".MutipleRecord");
    });

    $(document).on('click', '.btn-remove', function() {
      if ($(".MutipleRecord .duplicate-row").length > 1) {
        $(this).parents(".duplicate-row").remove();
        updateAmounts();
      }
    });

    $(document).on('input', '.duplicate-row input[name^="quantity"], .duplicate-row input[name^="rate"]',
      function() {
        updateAmounts();
      });

    function updateAmounts() {
      $(".MutipleRecord .duplicate-row").each(function() {
        var quantity = $(this).find('input[name^="quantity"]').val();
        var rate = $(this).find('input[name^="rate"]').val();
        var amount = quantity * rate;
        $(this).find('input[name^="amount"]').val(amount);
      });
    }
  });
  </script>
  @endsection