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
            <div class="row">
            	<div class="col-md-9">
            		<div class="card">
		                <div class="card-header">
		                    {{ __('Products') }}
		                    <button data-bs-toggle="modal" data-bs-target="#productModel" class="btn btn-sm btn-primary float-right"> <i class="fa fa-plus"></i> Create Product</button>
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
			                      <th>Brand</th>
			                      <th>Price</th>
                            <th>Quantity</th>
			                      <th>Stock</th>
			                      <th>Action</th>
			                    </tr>
			                  </thead>
			                  <tbody>
			                  	@foreach($products as $product)
			                    <tr>
			                      <td>{{ $loop->iteration }}</td>
			                      <td>{{ $product->name }}</td>
			                      <td>{{ $product->brand }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->quantity }}</td>
                            @if($product->alert_stock <= 100)
			                        <td><span class="badge badge-danger badge-pill">{{ $product->alert_stock }}</span></td>
                            @else
                             <td><span class="badge badge-success badge-pill">{{ $product->alert_stock }}</span></td>
                            @endif
			                      <td>
			                      	<a href="#" data-bs-toggle="modal" data-bs-target="#updateProduct{{ $product->id }}">
			                      		<i class="fa fa-edit indigo" style="color: blue;"></i>
			                      	</a> 
			                        / 
			                      	<a href="#" data-bs-toggle="modal" data-bs-target="#deleteProduct{{ $product->id }}">
			                      		<i class="fa fa-trash" style="color: red"></i>
			                      	</a>
			                      </td>
			                    </tr>
{{-- edit model --}}
<div class="modal fade" id="updateProduct{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog right">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Create User</b></h5>
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal" aria-label="Close"> <i class="fa fa-times"></i> </button>
      </div>
      <div class="modal-body">
      	<form action="{{ route('product.update', $product->id) }}" method="post">
      		@csrf
      		@method('put')
      	<div class="card-body">
           
           	<div class="form-group">
              <label>Name</label>
              <input type="text" name="name" value="{{ $product->name }}" class="form-control">
            </div>
            <div class="form-group">
              <label>Brand</label>
              <input type="text" name="brand" value="{{ $product->brand }}" class="form-control">
            </div>
            <div class="form-group">
              <label>Price</label>
              <input type="number" name="price" value="{{ $product->price }}" class="form-control">
            </div>
            <div class="form-group">
              <label>Quantity</label>
              <input type="number" name="quantity" value="{{ $product->quantity }}" class="form-control">
            </div>
            <div class="form-group">
              <label>Stock</label>
              <input type="number" name="alert_stock" value="{{ $product->alert_stock }}" class="form-control">
            </div>
            <div class="form-group">
              <label>Description</label>
              <input type="text" name="description" value="{{ $product->description }}" class="form-control">
            </div>
           
        </div>
        <div class="card-footer">
        	<button class="btn btn-primary">Update</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
{{-- delete model --}}
<div class="modal fade" id="deleteProduct{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog right">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Create User</b></h5>
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal" aria-label="Close"> <i class="fa fa-times"></i> </button>
      </div>
      <div class="modal-body">
      	<form action="{{ route('product.destroy', $product->id) }}" method="post">
      		@csrf
      		@method('delete')
      	<div class="card-body">
           
           	<p> Are you wanted delete this {{ $product->name }} !</p>
           
        </div>
        <div class="card-footer">
        	<button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        	<button class="btn btn-danger">Delete</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
			                    @endforeach
			                    
			                  </tbody>
                        
			                </table>
			            </div>
			        </div>
            	</div>
            	<div class="col-md-3">
            		<div class="card">
		                <div class="card-header">
		                    {{ __('Search') }}
		                </div>

		                <div class="card-body">
		                  
			            </div>
			            <div class="card-footer">
			            	<button type="submit" class="btn btn-danger">Save</button>
			            </div>
			        </div>
            	</div>
            </div>
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
