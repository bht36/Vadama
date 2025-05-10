@extends('vadama.layouts.header')

@section('content')
<div class="content-wrapper">
    <div class="content-header px-3 mt-4">
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

    <section class="content px-3">
        <div class="container-fluid">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                            <div class="d-flex justify-content-end mb-3">
                            {{-- <button class="btn btn-rounded btn-md mr-3 collapse-button"
                                    type="button"
                                    data-toggle="collapse"
                                    data-target="#collapseExample"
                                    aria-expanded="false"
                                    aria-controls="collapseExample"
                                    style="background-color: #79090f; border-color: #79090f; color: #fff;">
                                <i class="fa fa-filter" aria-hidden="true" title="Advanced Search"></i>
                            </button> --}}
                            </div>

                            {{-- <div class="collapse" id="collapseExample">
                                <div class="card card-body">
                                    <div class="card-header p-1 mb-1">
                                        <h4>Filter Options</h4>
                                    </div>
                                    <div class="card-body p-0">
                                        <form action="{{ route('view_leaseproperty') }}" method="GET" id="filterForm">
                                            <div class="row align-items-center">
                                                <div class="col-md-4 mb-3">
                                                    <div class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                                        Title
                                                    </div>
                                                    <input type="text" name="title" placeholder="Property Title"
                                                           class="form-control form-control-solid w-250px"
                                                           value="{{ request('title') }}"
                                                           style="background-color: rgb(245, 245, 245);">
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <div class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                                        Location
                                                    </div>
                                                    <input type="text" name="location" placeholder="Location"
                                                           class="form-control form-control-solid w-250px"
                                                           value="{{ request('location') }}"
                                                           style="background-color: rgb(245, 245, 245);">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <div class="d-flex justify-content-end">
                                                        <button type="button" class="btn btn-secondary mr-2" onclick="resetForm()">Reset</button>
                                                        <button type="submit" class="btn btn-primary">Apply Filters</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> --}}

                                                        <div class="card table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase">#</th>
                                            <th>Title</th>
                                            <th>User Profile</th>
                                            <th>Image</th>
                                            <th>Type</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
    @forelse($requestsAsLandlord as $key => $property)
    <tr>
        <td>{{ $key + 1 }}</td>
        <td>
            {{ $property->property->title ?? 'N/A' }}<br>
            Tenant Name: 
            {{ 
                isset($property->tenant) ? $property->tenant->first_name . ' ' . $property->tenant->last_name : 'N/A'
            }}<br>
            Tenant Username: 
            {{ $property->tenant->username ?? 'N/A' }}<br>
            Total Price: {{ $property->total_price ?? 'N/A' }}<br>
            Check-In: {{ $property->check_in ?? 'N/A' }}<br>
            Check-Out: {{ $property->check_out ?? 'N/A' }}<br>
            Months: {{ $property->duration ?? 'N/A' }}<br>
            Guests: {{ $property->guests ?? 'N/A' }}<br>
        </td>
        <td>
            @if($property->tenant && $property->tenant->profile_picture)
                <img src="{{ asset('storage/uploads/profile_pictures/' . $property->tenant->profile_picture) }}"
                    alt="Tenant Image"
                    class="rounded-circle"
                    width="200" height="200">
            @else
                <img src="{{ asset('logo/User.png') }}"
                    alt="Default Image"
                    class="rounded-circle"
                    width="200" height="200">
            @endif
        </td>

        <td>
            @if($property->property && $property->property->images->count())
                <img src="{{ asset('storage/uploads/properties/images/' . $property->property->images->first()->image_path) }}" 
                    alt="Property Image" width="200">
            @else
                No Images
            @endif
        </td>
        <td>{{ strtoupper($property->property->type ?? 'N/A') }}</td>
        
        <td>
        <div class="d-flex">
                    <form method="POST" action="{{ route('requestapproved', $property->property->id) }}">
    @csrf
    <button type="submit" class="btn btn-light btn-sm" style="border-radius: 50%; width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;" data-toggle="tooltip" title="Approve">
        <i class="fas fa-check text-success" style="font-size: 16px;"></i>
    </button>
</form>

                  <form method="POST" action="{{ route('requestcancel', $property->property->id) }}" class="ml-2">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Reject" style="border-radius: 50%; width: 32px; height: 32px; padding: 0;">
                        <i class="fas fa-times" style="font-size: 18px; line-height: 32px;"></i>
                    </button>
                </form>
                </div>
        </td>
    </tr>
    @empty
        <tr>
            <td colspan="7" class="text-center">{{ __('No data available') }}</td>
        </tr>
    @endforelse
</tbody>

                                </table>
                            </div>
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