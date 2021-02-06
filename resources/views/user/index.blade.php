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
		                    {{ __('Users') }}
		                    <button data-bs-toggle="modal" data-bs-target="#userModel" class="btn btn-sm btn-primary float-right"> <i class="fa fa-plus"></i> Create User</button>
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
			                      <th>Email</th>
			                      <th>Phone</th>
			                      <th>Role</th>
			                      <th>Action</th>
			                    </tr>
			                  </thead>
			                  <tbody>
			                  	@foreach($users as $user)
			                    <tr>
			                      <td>{{ $loop->iteration }}</td>
			                      <td>{{ $user->name }}</td>
			                      <td>{{ $user->email }}</td>
			                      <td>{{ $user->phone }}</td>
			                      <td>{{ $user->is_admin==1 ? 'Admin' : 'Cashire' }}</td>
			                      <td>
			                      	<a href="#" data-bs-toggle="modal" data-bs-target="#UpdateUserModel{{ $user->id }}">
			                      		<i class="fa fa-edit indigo" style="color: blue;"></i>
			                      	</a> 
			                        / 
			                      	<a href="#" data-bs-toggle="modal" data-bs-target="#deleteUserModel{{ $user->id }}">
			                      		<i class="fa fa-trash" style="color: red"></i>
			                      	</a>
			                      </td>
			                    </tr>
{{-- edit model --}}
<div class="modal fade" id="UpdateUserModel{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog right">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Create User</b></h5>
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal" aria-label="Close"> <i class="fa fa-times"></i> </button>
      </div>
      <div class="modal-body">
      	<form action="{{ route('user.update', $user->id) }}" method="post">
      		@csrf
      		@method('put')
      	<div class="card-body">
           
           	<div class="form-group">
           		<label>Name</label>
           		<input type="text" name="name" value="{{ $user->name }}" class="form-control">
           	</div>
           	<div class="form-group">
           		<label>Email</label>
           		<input type="text" name="email" value="{{ $user->email }}" class="form-control">
           	</div>
           	<div class="form-group">
           		<label>Phone</label>
           		<input type="text" name="phone" value="{{ $user->phone }}" class="form-control">
           	</div>
           	<div class="form-group">
           		<label>Password</label>
           		<input type="password" name="password" value="{{ $user->password }}" class="form-control" readonly>
           	</div>
           	<div class="form-group">
           		<label>Role</label>
           		<select name="is_admin" class="form-control">
           			<option>select</option>
           			<option value="1" @if($user->is_admin==1) selected @endif>Admin</option>
           			<option value="2" @if($user->is_admin==2) selected @endif>Cashire</option>
           		</select>
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
<div class="modal fade" id="deleteUserModel{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog right">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Create User</b></h5>
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal" aria-label="Close"> <i class="fa fa-times"></i> </button>
      </div>
      <div class="modal-body">
      	<form action="{{ route('user.destroy', $user->id) }}" method="post">
      		@csrf
      		@method('delete')
      	<div class="card-body">
           
           	<p> Are you wanted delete this {{ $user->name }} !</p>
           
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
<div class="modal fade" id="userModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog right">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Create User</b></h5>
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal" aria-label="Close"> <i class="fa fa-times"></i> </button>
      </div>
      <div class="modal-body">
      	<form action="{{ route('user.store') }}" method="post">
      		@csrf
      	<div class="card-body">
           
           	<div class="form-group">
           		<label>Name</label>
           		<input type="text" name="name" class="form-control">
           	</div>
           	<div class="form-group">
           		<label>Email</label>
           		<input type="text" name="email" class="form-control">
           	</div>
           	<div class="form-group">
           		<label>Phone</label>
           		<input type="text" name="phone" class="form-control">
           	</div>
           	<div class="form-group">
           		<label>Password</label>
           		<input type="text" name="password" class="form-control">
           	</div>
           	<div class="form-group">
           		<label>Role</label>
           		<select name="role" class="form-control">
           			<option>select</option>
           			<option value="1">Admin</option>
           			<option value="2">Cashire</option>
           		</select>
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
