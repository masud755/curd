@extends('layouts.app')
@section('content')
  @if (session()->has('message'))
    <div class="alert alert-primary" role="alert">
      {{ session()->get('message') }}
    </div>
  @endif
  <table class="table">
    <thead>
      <tr>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">UserName</th>
        <th scope="col">Email</th>
        <th scope="col">Address</th>
        <th scope="col">Address2</th>
        <th scope="col">Country</th>
        <th scope="col">State</th>
        <th scope="col">Zip</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{ $checkout->first_name }}</td>
        <td>{{ $checkout->last_name }}</td>
        <td>{{ $checkout->username }}</td>
        <td>{{ $checkout->email }}</td>
        <td>{{ $checkout->address }}</td>
        <td>{{ $checkout->address_2 }}</td>
        <td>{{ $checkout->country->name }}</td>
        <td>{{ $checkout->state->name }}</td>
        <td>{{ $checkout->zip }}</td>
        <td>
          <a class="btn btn-info btn-sm" href="{{ route('checkout.show', $checkout->id) }}">view</a>
          <a class="btn btn-success btn-sm" href="{{ route('checkout.edit', $checkout->id) }}">edit</a>
          <form method="post" action="{{ route('checkout.destroy', $checkout->id) }}">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
          </form>
        </td>
      </tr>

    </tbody>
  </table>
@endsection
