@extends('vadama.layouts.header')

@section('content')
<div class="content-wrapper">
    <div class="col-sm-8 mt-6">
        <h1 class="m-0">{{ __('Request Property') }}</h1>
    </div>

    <section class="content px-3">
        <div class="container-fluid">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-end mb-3">
                                <!-- Your filter buttons if any -->
                            </div>

                            <div class="card table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase">#</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Price</th>
                                            <th>Type</th>
                                            <th>Owner</th>
                                            <th>Payment</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($approvedRequests as $key => $property)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                {{ $property->property->title ?? 'N/A' }}<br>
                                                Check-In: {{ $property->check_in ?? 'N/A' }}<br>
                                                Check-Out: {{ $property->check_out ?? 'N/A' }}<br>
                                                Months: {{ $property->duration ?? 'N/A' }}<br>
                                            </td>
                                            <td>
                                                @if($property->property && $property->property->images->count())
                                                    <img src="{{ asset('storage/uploads/properties/images/' . $property->property->images->first()->image_path) }}" 
                                                        alt="Property Image" width="400">
                                                @else
                                                    No Images
                                                @endif
                                            </td>
                                            <td>{{ $property->total_price ?? 'N/A' }}</td>
                                            <td>{{ strtoupper($property->property->type ?? 'N/A') }}</td>
                                            <td>{{ $property->created_at->format('d M Y') }}</td>
                                            <td>{{ $property->payment ?? 'N/A' }}</td>
                                            <td>
                                                @if($property->payment == 'Paid' && $property->review_status == 'not_done')
                                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#reviewModal{{ $property->id }}">
                                                        Time to review your experience
                                                    </button>
                                                @elseif($property->payment == 'Paid' && $property->review_status == 'done')
                                                    <span class="badge bg-success">Complete</span>
                                                @else
                                                    <form action="https://rc-epay.esewa.com.np/api/epay/main/v2/form" method="POST">
                                                    <input type="hidden" name="amount" value="{{ $property->total_price }}">
                                                    <input type="hidden" name="tax_amount" value="0">
                                                    <input type="hidden" name="total_amount" value="{{ $property->total_price }}">
                                                    <input type="hidden" name="transaction_uuid" value="{{ $property->uuid }}">
                                                    <input type="hidden" name="product_code" value="EPAYTEST">
                                                    <input type="hidden" name="product_service_charge" value="0">
                                                    <input type="hidden" name="product_delivery_charge" value="0">
                                                    <input type="hidden" name="success_url" value="{{ route('payment-success', ['request_id' => $property->id]) }}">
                                                    <input type="hidden" name="failure_url" value="{{ route('payment-fail') }}">
                                                    <input type="hidden" name="signed_field_names" value="{{ $property->signed_field_names }}">
                                                    <input type="hidden" name="signature" value="{{ $property->signature }}">
                                                    <button type="submit" class="btn btn-success btn-sm">Pay with eSewa</button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>

                                        <!-- Review Modal -->
                                        <div class="modal fade" id="reviewModal{{ $property->id }}" tabindex="-1" aria-labelledby="reviewModalLabel{{ $property->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <form action="{{ route('review.submit', $property->id) }}" method="POST">
                                                    @csrf
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="reviewModalLabel{{ $property->id }}">Review Your Experience</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <ul>
                                                                <li>Please remember, you can only rate the property once.</li>
                                                                <li>Submit the form at the end of the date you applied.</li>
                                                            </ul>
                                                            <div class="mb-3">
                                                                <label class="form-label">Rating:</label><br>
                                                                <div class="star-rating">
                                                                    @for ($i = 5; $i >= 1; $i--)
                                                                        <input type="radio" name="rating" value="{{ $i }}" id="star{{ $i }}-{{ $property->id }}">
                                                                        <label for="star{{ $i }}-{{ $property->id }}">★</label>
                                                                    @endfor
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="mb-3">
                                                                <label for="description" class="form-label">Description:</label>
                                                                <textarea name="description" class="form-control" rows="3" required></textarea>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="problem" class="form-label">Any Problems?</label>
                                                                <textarea name="problem" class="form-control" rows="2"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success">Submit Review</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        @empty
                                        <tr>
                                            <td colspan="7" class="text-center">{{ __('No approved requests available') }}</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal Star Rating CSS -->
<style>
  .star-rating {
      display: flex;
      flex-direction: row-reverse;
      justify-content: flex-end;
  }
  .star-rating input[type="radio"] {
      display: none;
  }
  .star-rating label {
      font-size: 24px;
      color: #ddd;
      cursor: pointer;
      padding: 0 3px;
  }
  .star-rating input[type="radio"]:checked ~ label {
      color: gold;
  }
  .star-rating label:hover,
  .star-rating label:hover ~ label {
      color: gold;
  }
</style>

<!-- Bootstrap + Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

@if(session('success'))
<script>
    swal("Success!", "{{ session('success') }}", "success");
</script>
@endif

@if(session('error'))
<script>
    swal("Error!", "{{ session('error') }}", "error");
</script>
@endif
@endsection
