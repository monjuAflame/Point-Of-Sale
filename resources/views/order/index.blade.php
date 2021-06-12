@extends('layouts.app')
@section('css')
	<style type="text/css">
		.modal-dialog.right {
		    position: absolute;
		    right: 0;
		    top: 0;
		    margin: 0;
		    min-width: 415px;
		}
	</style>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
          <form action="{{ route('order.store') }}" method="post">
            @csrf
            <div class="row">
            	<div class="col-md-8">
            		<div class="card">
		                <div class="card-header">
		                    {{ __('Orders') }}
		                </div>

		                <div class="card-body">
		                    @if (session('message'))
		                        <div class="alert alert-success" role="alert">
		                            {{ session('message') }}
		                        </div>
		                    @endif
			                <table class="table table-hover table-left">
			                  <thead>
			                    <tr>
			                      <th>#</th>
			                      <th>Name</th>
			                      <th>Qty</th>
			                      <th>Price</th>
                            <th>Dis%</th>
			                      <th>Total</th>
			                      <th>
                                <a href="#" class="btn btn-primary btn-sm addmore"><i class="fa fa-plus"></i></a>
                            </th>
			                    </tr>
			                  </thead>
			                  <tbody class="addMoreProduct">
			                  	<tr>
                            <td>1</td>
                            <td>
                                <select id="product_id" name="product_id[]" class="form-control product_id">
                                  <option value="">Select</option>
                              @foreach($products as $product)

                                  <option data-price="{{ $product->price }}" value="{{ $product->id }}">{{ $product->name }}</option>
                              @endforeach

                                </select>
                            </td>    
                            <td>
                              <input type="number" name="quantity[]" id="quantity" class="form-control quantity">
                            </td>
                            <td>
                              <input type="number" name="price[]" id="price" class="form-control price">
                            </td>
                            <td>
                              <input type="number" name="discount[]" id="discount" class="form-control discount">
                            </td>
                            <td>
                              <input type="number" name="total_amount[]" id="total" class="form-control total_amount">
                            </td>
                            <td>
                              <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></a>
                            </td>
                          </tr>
			                  </tbody>
                        
			                </table>
			            </div>
			        </div>
            	</div>
            	<div class="col-md-4">
            		<div class="card">
		                <div class="card-header">
		                    <p>Total <b class="total">0.00</b></p>
		                </div>

		                <div class="card-body">
		                  <div class="panel">
                        <div class="row">
                        <table class="table table-striped">
                        <tr>
                          <td>
                            <label for="customername">Customer Name</label>
                            
                            <input type="text" name="customer_name" id="" class="form-control">
                            
                          </td>
                          <td>
                            <label for="customerphone">Customer Phone</label>
                            
                            <input type="number" name="customer_phone" id="" class="form-control">
                            
                          </td>
                        </tr>
                        
                      </table>
                        
                        <td>Payment Method <br>
                          
                            <span class="radio-item">
                              <input type="radio" name="payment_method" id="cash" class="true" value="cash">
                              <label for="cash"> <i class="fa fa-money-bill text-success"></i> Cash</label>
                            </span>
                            <span class="radio-item">
                              <input type="radio" name="payment_method" id="bank" class="true" value="bank_transfer">
                              <label for="bank"><i class="fa fa-university text-success"></i>Bank</label>
                            </span>
                            <span class="radio-item">
                              <input type="radio" name="payment_method" id="card" class="true" value="credit_card">
                              <label for="card"><i class="fa fa-credit-card text-success"></i>Credit Card</label>
                            </span>
                          </td>
                          <td>
                            Payment
                            <input type="number" name="paid_amount" id="paid_amount" class="form-control">
                          </td>
                          <td>
                            Returning Change
                            <input type="number" name="balance" id="balance" class="form-control">
                          </td>
                          <td>
                            <button class="btn btn-primary btn-lg btn-block mt-3">Save</button>
                            <button class="btn btn-danger btn-lg btn-block mt-2">Calculator</button>
                            <a href="#" class="btn-danger mt-3">Log out</a>
                          </td>
                        
                        </div>
                      </div>
			            </div>
			        </div>
            	</div>
            </div>
          </form>
        </div>
    </div>
    <!-- Modal -->
<div class="modal fade" id="productModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog right">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Create Product</b></h5>
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal" aria-label="Close"> <i class="fa fa-times"></i> </button>
      </div>
      <div class="modal-body">
      	<form action="{{ route('product.store') }}" method="post">
      		@csrf
      	<div class="card-body">
           
           	<div class="form-group">
           		<label>Name</label>
           		<input type="text" name="name" class="form-control">
           	</div>
           	<div class="form-group">
           		<label>Brand</label>
           		<input type="text" name="brand" class="form-control">
           	</div>
           	<div class="form-group">
           		<label>Price</label>
           		<input type="number" name="price" class="form-control">
           	</div>
            <div class="form-group">
              <label>Quantity</label>
              <input type="number" name="quantity" class="form-control">
            </div>
            <div class="form-group">
              <label>Stock</label>
              <input type="number" name="alert_stock" class="form-control">
            </div>
            <div class="form-group">
              <label>Description</label>
              <input type="text" name="description" class="form-control">
            </div>
           
        </div>
        <div class="card-footer">
        	<button class="btn btn-primary">Save</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
@endsection

@section('js')
  <script>
    $(document).ready(function(){

        $('.addmore').on('click', function(){
          // alert(0);
          var product = $('#product_id').html();
          var numberflow = ($('.addMoreProduct tr').length - 0) +1;
          var tr = '<tr><td class="no">'+numberflow+'</td>' +
                    '<td><select class="form-control product_id" name="product_id[]">'+product+'</select></td>'+
                    '<td><input type="number" name="quantity[]" class="form-control quantity"></td>'+
                    '<td><input type="number" name="price[]" class="form-control price"></td>'+
                    '<td><input type="number" name="discount[]" class="form-control discount"></td>'+
                    '<td><input type="number" name="total_amount[]" class="form-control total_amount"></td>'+
                    '<td><a href="#" class="btn btn-danger btn-sm delete"><i class="fa fa-minus"></i></a></td></tr>';
              $('.addMoreProduct').append(tr);
        });
        $('.addMoreProduct').delegate('.delete', 'click', function(){
           $(this).parent().parent().remove();
        });

        function TotalAmount(){
          var total = 0;
          $('.total_amount').each(function(i,e){
            var amount = $(this).val() - 0;
            total += amount;
          })
          $(".total").html(total)
        }


        $('.addMoreProduct').delegate('.product_id', 'change', function(){
          var tr = $(this).parent().parent();
          
          var price = tr.find('.product_id option:selected').attr('data-price');
          tr.find('.price').val(price);
          var qty = tr.find('.quantity').val() - 0;
          var dis = tr.find('.discount').val() - 0;
          var price = tr.find('.price').val() - 0;
          var total_amount = (qty * price)-((qty * price * dis)/100);
          console.log(price);
          tr.find('.total_amount').val(total_amount);
          TotalAmount();
        });


        $('.addMoreProduct').delegate('.quantity , .discount', 'keyup', function(){
          var tr = $(this).parent().parent();
          var qty = tr.find('.quantity').val() - 0;
          var dis = tr.find('.discount').val() - 0;
          var price = tr.find('.price').val() - 0;
          var total_amount = (qty * price)-((qty * price * dis)/100);
          tr.find('.total_amount').val(total_amount);
          TotalAmount();
        });
        $("#paid_amount").keyup(function(){
          var total = $('.total').html();
          var paid_amount = $(this).val();
          var tot = paid_amount - total;
          $("#balance").val(tot).toFixed(2);
        })

    });
  </script>
@endsection
