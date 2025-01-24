@extends('admin.layouts.app')
@section('title', 'Form edit payment')

@section('content')
<form action="{{route('admin.payment.updateStatus', $payment->idPayment)}}" method="POST">
  @csrf
  @method('PUT') <!-- This specifies that the form should use the PUT method -->
  <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit applicant</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
                <label for="applicantName">Applicant Name</label>
                <input type="text" id="applicantName" class="form-control" value="{{ $payment->applicantName }}" disabled>
              </div>

              <div class="form-group">
                <label for="visaType">Visa Type</label>
                <input type="text" id="visaType" class="form-control" value="{{ $payment->VisaType }}" disabled>
              </div>

              <div class="form-group">
                <label for="amount">Amount</label>
                <input type="text" id="amount" class="form-control" value="{{ $payment->amount }}" disabled>
              </div>

              <div class="form-group">
                <label for="paymentDate">Payment Date</label>
                <input type="text" id="paymentDate" class="form-control" value="{{ $payment->paymentDate }}" disabled>
              </div>
                <div class="form-group">
                  <label for="paymentStatus">Payment Status</label>
                  <input type="text" class="form-control" id="paymentStatus" name="paymentStatus" value="{{ old('paymentStatus', isset($payment) ? $payment->paymentStatus : '') }}" required>
                </div>
              </div>

                <label for="paymentStatus">Status Pembayaran:</label>
                  <select name="paymentStatus" id="paymentStatus" required>
                      <option value="1" {{ $payment->paymentStatus == 1 ? 'selected' : '' }}>Pending</option>
                      <option value="0" {{ $payment->paymentStatus == 0 ? 'selected' : '' }}>Tidak Berhasil</option>
                  </select>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
        </div>
      </div>
    </div>
</form>
@endsection