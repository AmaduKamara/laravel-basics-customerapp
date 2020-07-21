@extends('layouts.app')

@section('title', 'Customer List')

@section('content')

  <h1 class="text-info font-weight-normal">Our Customers</h1>
  {{-- @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors as $error)
            <li>{{ $error }}</li>  
          @endforeach
        </ul>
      </div>
  @endif --}}
  {{-- In the form, Add an action to the page this form will get submitted to (customers) and the method = (POST) and also andd the name attributes to the form inputs --}}
  <form action="customers" method="POST">
    {{-- @csrf prevent cross site resource forgery and makes form submission possible --}}
    @csrf  
    <div class="form-group mb-2">
      <div>
        <label for="name">Customer Name</label>
        <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter customer Name">
        <p class="text-danger">{{ $errors->first('name') }}</p>
      </div>
      <div>
        <label for="email">Email</label>
        <input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter Email Address">
        <p class="text-danger">{{ $errors->first('email') }}</p>
      </div>
      <div>
        <label for="address">Address</label>
        <input type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="Enter customer Address">
        <p class="text-danger">{{ $errors->first('address') }}</p>
      </div>
    </div>

    <div class="form-group mb-4">
      <label for="active">Status</label>
      <select name="active" id="active" class="form-control">
        <option value="" disabled>Select Customer Status</option>
        <option value="1" >Active</option>
        <option value="0" >Inactive</option>
      </select>
    </div>

    <div class="form-group mb-4">
    <label for="active">Company</label>
    <select name="active" id="active" class="form-control">
      @foreach ($companies as $company)
          <option value="{{ $company->id }}">{{ $company->name }}</option>
      @endforeach
    </select>
    </div>

    <button class="btn btn-info" type="submit"><i class="fas fa-plus"></i> Add New Cutomer</button>
  </form>

  <h2 class="text-info mt-4">List of Customers</h2>
  <hr>

  <div class="row mb-5">

    <div class="col-6">
      <h3>Active Customers</h3>
      @foreach ($activeCustomers as $activeCustomer)
        <ul class="card pt-2 px-4">
          <li style="list-style: none">
            <h4>Name: {{ $activeCustomer->name }}</h4>
            <p>Address: {{ $activeCustomer->address }}</p>
            <p>Email: {{ $activeCustomer->email }}</p>
          </li>
        </ul>
      @endforeach
      {{-- <div class="my-3">
        {{ $activeCustomer->links() }}
      </div> --}}
    </div>

    <div class="col-6">
      <h3>Inctive Customers</h3>
      @foreach ($inactiveCustomers as $inactiveCustomer)
        <ul class="card pt-2 px-4">
          <li style="list-style: none">
            <h4>Name: {{ $inactiveCustomer->name }}</h4>
            <p>Address: {{ $inactiveCustomer->address }}</p>
            <p>Email: {{ $inactiveCustomer->email }}</p>
          </li>
        </ul>
      @endforeach
      {{-- <div class="my-3">
        {{ $activeCustomer->links() }}
      </div> --}}
    </div>

  </div>
  
  
@endsection
