@extends('vadama.layouts.header')

@section('content')
<div class="content-wrapper">
    <div class="content-header px-3 mt-4 ">
        <div class="container-fluid">
            <div class="row mb-2 mx-1">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Request Property') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="">{{ __('Home') }}</a>
                        </li>
                        <li class="breadcrumb-item">
                            {{ __('Request Property') }}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content px-3 ">
        <div class="container-fluid">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                            <div class="d-flex justify-content-end mb-3">
                

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
        <a href="{{ route('reviewform', $property->id) }}" class="btn btn-primary btn-sm">
            Time to review your experience
        </a>
    @elseif($property->payment == 'Paid' && $property->rentalRequest->review_status == 'done')
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
@empty

    <tr>
        <td colspan="7" class="text-center">{{ __('No approved requests available') }}</td>
    </tr>
    @endforelse
    </tbody>

                                </table>
                            </div>
                            @if(session('success'))
    <script>alert("{{ session('success') }}");</script>
@endif

@if(session('error'))
    <script>alert("{{ session('error') }}");</script>
@endif

                            <div class="justify-content-center">
                                <ul class="pagination pagination-sm">
                                    {{-- {!! $properties->links() !!} --}}
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    function resetForm() {
        document.getElementById('filterForm').reset();
    }

    $('.show_confirm').click(function(event) {
        var form =  $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: `Are you sure you want to delete this record?`,
            text: "If you delete this, it will be gone forever.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            form.submit();
          }
        });
    });
</script>
@endsection