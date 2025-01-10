@extends('admin.layout')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-wrapper">
        <div class="content-header px-3">
            <div class="container-fluid">
                <div class="row mb-2 mx-1">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ __('Hoodie') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">{{ __('Home') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                {{ __('Hoodie') }}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-header -->
        <section class="content px-3">
            <div class="container-fluid">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <!-- /.card -->
                                <div class="d-flex justify-content-end mb-3">
                                    <button class="btn btn-primary btn-rounded btn-md mr-3 collapse-button" type="button"
                                        data-toggle="collapse" data-target="#collapseExample" aria-expanded="false"
                                        aria-controls="collapseExample">
                                        <i class="fa fa-filter" aria-hidden="true" title="Advanced Search"></i>
                                    </button>
                                   
                                        <a href="{{ route('admin.hoodie.add') }}" class="btn btn-primary">+ Add</a>
                               
                                </div>

                                <div class="collapse" id="collapseExample">
                                    <div class="card card-body">
                                        <div class="card-header p-1 mb-1">
                                            <h4>Filter Options</h4>
                                        </div>
                                        <div class="card-body p-0">
                                            {{-- <form action="{{ route('admin.hoodie.index') }}" method="GET" --}}
                                             <form action="" method="GET"
                                                id="filterForm">
                                                <!-- Search, Date range filter, and buttons in one row -->
                                                <div class="row align-items-center">
                                                <div class="col-md-4 mb-3">
                                                        <div class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                                            Name
                                                        </div>
                                                        <div class="d-flex align-items-center position-relative my-1">
                                                            <input type="text" name="name" placeholder="Title" 
                                                                class="form-control form-control-solid w-250px"
                                                                id="titleSearchInput" 
                                                                style="background-color: rgb(245, 245, 245);" 
                                                                value="{{ request('name') }}">
                                                        </div>
                                                    </div>
                                                    <!-- Slug -->
                                                    <div class="col-md-4 mb-3">
                                                        <div class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                                            Slug
                                                        </div>
                                                        <div class="d-flex align-items-center position-relative my-1">
                                                            <input type="text" name="slug" placeholder="Slug" 
                                                                class="form-control form-control-solid w-250px"
                                                                id="slugSearchInput" 
                                                                style="background-color: rgb(245, 245, 245);" 
                                                                value="{{ request('slug') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Buttons -->
                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                        <div class="d-flex justify-content-end">
                                                                           <button type="button" class="btn btn-secondary mr-2" onclick="resetForm()">Reset</button>

                                                            <button type="submit" class="btn btn-primary"
                                                                id="apply_filter">Apply Filters</button>
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
                                                <th class="">TITLE</th>
                                                <th class="">SLUG</th>
                                                <th class="">IMAGE</th>
                                                <th class="">ACTIONS</th>
                                            </tr>

                                        </thead>

                                        @if (isset($_GET['page']))
                                            <div hidden>
                                                {{ $page = $_GET['page'] }}
                                            </div>
                                        @else
                                            <div hidden>
                                                {{ $page = 1 }}
                                            </div>
                                        @endif

                                        <tbody>
                                            @forelse ($hoodie as $key => $data)
                                                <tr>
                                                    <td scope="row">{{ $key + 1 }}</td>
                                                    <td><b>{{ $data->name }}</b></td>
                                                    <td><b>{{ $data->slug }}</b></td>
                                                    <td>
                                                        <div>
                                                            <img src="{{ asset('storage/uploads/hoodie/main_image/' . $data->main_image) }}" alt="Insignia" style="width: 300px; height: 150px;">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="{{ route('admin.hoodie.edit', $data->id) }}"
                                                                class="btn btn-primary btn-sm mr-1" type="submit"><i
                                                                    class="fas fa-edit" title='Edit'></i>
                                                            </a>
                                                            <form method="POST"
                                                                action="{{ route('admin.hoodie.delete', $data->id) }}">
                                                                @csrf
                                                                <input name="_method" type="hidden" value="DELETE">
                                                                <button type="submit" button
                                                                    class="btn btn-danger btn-sm show_confirm"
                                                                    data-toggle="tooltip" title='Delete'><i
                                                                        class="fas fa-trash"></i></button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="7" class="text-center">{{ __('No data available') }}
                                                    </td>
                                                </tr>
                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>
                                <div class="justify-content-center">
                                    <ul class="pagination pagination-sm">
                                        {{-- {!! $get_hoodie->links() !!} --}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
    </div>
    <!-- /.row -->
    </div>
    </div>

    </div>


    <!-- /.container-fluid -->
    </section>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
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

        function resetForm() {
    const form = document.getElementById("filterForm");
    form.reset(); // Reset all inputs

    // Clear manually set values
    form.querySelectorAll('input, select').forEach(element => {
        if (element.type === "text" || element.type === "select-one") {
            element.value = "";
        }
    });

    // Submit the form to clear the query parameters
    // form.action =
    //  "{
    // { route('
    // admin.hood
    // ie.index') }}"
    // ; 
    // Ensure the form redirects to the base URL without query params
    form.submit();
}
    </script>
@endsection
