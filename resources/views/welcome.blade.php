@extends('layouts.app')

@section('content')
  <a class="btn btn-primary" href="{{ route('checkout.index') }}" role="button">All Checkouts</a>
  <a class="btn btn-primary" href="{{ route('checkout.create') }}" role="button">Create Checkouts</a>
@endsection
