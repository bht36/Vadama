@extends('vadama.layouts.header')

@section('content')
<div class="content-wrapper">
    <div class="content-header px-3">
        <div class="container-fluid">
            <div class="row mb-2 mx-1">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Lease Properties') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="">{{ __('Home') }}</a>
                        </li>
                        <li class="breadcrumb-item">
                            {{ __('Lease Properties') }}
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
                            <button class="btn btn-rounded btn-md mr-3 collapse-button"
                                    type="button"
                                    data-toggle="collapse"
                                    data-target="#collapseExample"
                                    aria-expanded="false"
                                    aria-controls="collapseExample"
                                    style="background-color: #79090f; border-color: #79090f; color: #fff;">
                                <i class="fa fa-filter" aria-hidden="true" title="Advanced Search"></i>
                            </button>

                                <a href="{{ route('leaseproperty') }}" class="btn" style="background-color: #79090f; border-color: #79090f; color: #fff;">
                                    + Add Property
                                </a>
                            </div>

                            <div class="collapse" id="collapseExample">
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
                            </div>

                                                        <div class="card table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase">#</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Location</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($properties as $key => $property)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>
                                                    <strong>{{ $property->title }}</strong><br>
                                                    <small>{{ $property->description }}</small>
                                                </td>
                                                <td>
                                                    @if($property->images->count())
                                                        @foreach($property->images as $image)
                                                            <img src="{{ asset('storage/uploads/properties/images/' . $image->image_path) }}" alt="Property Image" width="80" style="margin: 4px;">
                                                        @endforeach
                                                    @else
                                                        No Images
                                                    @endif
                                                </td>
                                                <td>{{ $property->location }}</td>
                                                <td>{{ $property->created_at->format('d M Y') }}</td>
                                                <td>
                                                <div class="d-flex">
                                                            <a href="{{ route('property_edit', $property->id) }}"
                                                                class="btn btn-primary btn-sm mr-1" type="submit"><i
                                                                    class="fas fa-edit" title='Edit'></i>
                                                            </a>
                                                            <form method="POST" action="{{ route('property_destroy', $property->id) }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" class="btn btn-danger btn-sm show_confirm" data-toggle="tooltip" title="Delete">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">{{ __('No data available') }}</td>
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