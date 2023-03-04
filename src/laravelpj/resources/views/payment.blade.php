@extends('layouts.parent')

@section('title')
決済
@endsection

@push('css')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@endpush

@section('content')
<form action="{{ route('payment.form') }}" method="POST" class="text-center mt-5">
  {{ csrf_field() }}
  <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="{{ env('STRIPE_KEY') }}"
    data-amount="{{$amount}}" data-name="Stripe Demo" data-label="決済をする" data-description="これはStripeのデモです。"
    data-image="https://stripe.com/img/documentation/checkout/marketplace.png" data-locale="auto" data-currency="JPY">
  </script>
</form>
@endsection