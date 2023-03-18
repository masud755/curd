@extends('layouts.app')
@section('content')
  <div class="py-5 text-center">
    <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt=""
      width="72" height="72">
    <h2>Checkout form</h2>
    <a class="btn btn-primary" href="{{ route('checkout.index') }}" role="button">All Checkouts</a>
    @if (session()->has('message'))
      <div class="alert alert-primary" role="alert">
        {{ session()->get('message') }}
      </div>
    @endif

  </div>
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Billing address</h4>
      <form class="needs-validation" method="POST" action="{{ route('checkout.store') }}">
        @csrf
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">First name</label>
            <input type="text" class="form-control @error('first_name') is-invalid @enderror "name="first_name"
              id="firstName" placeholder="" value="{{ old('first_name', '') }}">
            @error('first_name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Last name</label>
            <input type="text" class="form-control @error('last_name') is-invalid @enderror " name="last_name"
              id="lastName" placeholder="" value="{{ old('last_name', '') }}">
            @error('last_name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>

        <div class="mb-3">
          <label for="username">Username</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">@</span>
            </div>
            <input type="text" class="form-control @error('username') is-invalid @enderror "name="username"
              id="username" placeholder="Username" value="{{ old('username', '') }}">
            @error('username')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>

        <div class="mb-3">
          <label for="email">Email <span class="text-muted">(Optional)</span></label>
          <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email"
            placeholder="you@example.com" value="{{ old('email', '') }}">
          @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="address">Address</label>
          <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address"
            placeholder="1234 Main St" value="{{ old('address', '') }}">
          @error('address')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
          <input type="text" class="form-control" name="address_2" id="address2" placeholder="Apartment or suite"
            value="{{ old('address_2', '') }}">
        </div>

        <div class="row">
          <div class="form-group col-md-5 mb-3">
            <label for="country">Country</label>
            <select class="form-control custom-select d-block w-100 @error('country_id') is-invalid @enderror"
              name="country_id" id="country">
              <option value="">Choose...</option>
              @foreach ($countries as $country)
                <option value="{{ $country->id }}" @if (old('country_id') == $country->id) selected @endif>
                  {{ $country->name }}</option>
              @endforeach
            </select>
            @error('country_id')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group col-md-4 mb-3">
            <label for="state">State</label>
            <select class="form-control d-block w-100 @error('state_id') is-invalid @enderror" id="state"
              name="state_id">
              <option value="">Choose...</option>
              @foreach ($states as $state)
                <option value="{{ $state->id }}" @if (old('state_id') == $state->id) selected @endif>
                  {{ $state->name }}</option>
              @endforeach
            </select>
            @error('state_id')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="col-md-3 mb-3">
            <label for="zip">Zip</label>
            <input type="text" name="zip" class="form-control @error('zip') is-invalid @enderror" id="zip"
              placeholder="1234" value="{{ old('zip', '') }}">
            @error('zip')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror

          </div>
        </div>
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
      </form>
    </div>
  </div>
@endsection
