@extends('admin.layouts.app')
@section('title', 'Form edit payment')

@section('content')
<form action="{{route('admin.payment.create.update', $payment->idPayment)}}" method="post">
  @csrf
    @if (isset($payment))
        @method('PUT')
    @endif
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit applicant</h6>
          </div>
          <div class="card-body">
                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="text" class="form-control" id="amount" name="amount" value="{{ old('amount', isset($payment) ? $payment->amount : '') }}" required>
                </div>
                <div class="form-group">
                    <label for="paymentStatus">Payment Status</label>
                    <input type="text" class="form-control" id="paymentStatus" name="paymentStatus" value="{{ old('paymentStatus', isset($payment) ? $payment->paymentStatus : '') }}" required>
                </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
        </div>
      </div>
    </div>
</form>
@endsection