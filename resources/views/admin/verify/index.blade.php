@extends('admin.layout')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-wrapper">
        <div class="content-header px-3">
            <div class="container-fluid">
                <div class="row mb-2 mx-1">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ __('Verify Account') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">{{ __('Home') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                {{ __('Verify Account') }}
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

                                <div class="card table-responsive">
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-uppercase">#</th>
                                                <th class="">NAME</th>
                                                <th class="">IMAGE</th>
                                                <th class="">TYPE</th>
                                                <th class="">ACTIONS</th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                            @forelse ($verify as $key => $data)
                        <tr>
                            <td scope="row">{{ $key + 1 }}</td>
                            
                            <!-- Show username and full name -->
                            <td>
                                <b>{{ $data->account->username ?? 'N/A' }}</b><br>
                                {{ $data->account->first_name ?? '' }} {{ $data->account->last_name ?? '' }}<br>
                                {{ $data->account->email ?? '' }}<br>
                                {{ $data->account->phone_number ?? '' }}
                            </td>

                            <!-- Image -->
                            <td>
                                <div>
                                    <img src="{{ asset('storage/uploads/verify_pictures/' . $data->picture_name) }}" alt="Verification Picture" style="width: 500px; height: 300px;">
                                </div>
                            </td>

                            <td>
                                {{ $data->account->user_type}}
                            </td>
                            <!-- Action buttons -->
                            <td>
                                <div class="d-flex">
                                    <!-- Approve Button -->
                                    <form method="POST" action="{{ route('admin.verify.approveverify', $data->id) }}" class="mr-1">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm" title="Confirm">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </form>

                                    <!-- Decline Button -->
                                    <form method="POST" action="{{ route('admin.verify.declineverify', $data->id) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm show_confirm" data-toggle="tooltip" title="Cancel">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5">No data found.</td></tr>
                    @endforelse


                                                            </tbody>
                                                            @if (isset($_GET['page']))
                                                                <div hidden>
                                                                    {{ $page = $_GET['page'] }}
                                                                </div>
                                                            @else
                                                                <div hidden>
                                                                    {{ $page = 1 }}
                                                                </div>
                                                            @endif
                                                        
                                                            
                                                        </table>
                                                    </div>
                                                    <div class="justify-content-center">
                                                        <ul class="pagination pagination-sm">
                                                            {{-- {!! $verify ->links() !!} --}}
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                        </div>

                        </div>
                        </div>
                        </div>
                        </section>
                        </div>
                    @endsection

                    @section('scripts')
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
                        <script>
                            // Confirmation dialog for delete action
                            document.querySelectorAll('.show_confirm').forEach(button => {
                                button.addEventListener('click', function(event) {
                                    event.preventDefault();
                                    const form = this.closest("form");
                                    swal({
                                        title: "Are you sure you want to delete this record?",
                                        text: "If you delete this, it will be gone forever.",
                                        icon: "warning",
                                        buttons: true,
                                        dangerMode: true,
                                    }).then(willDelete => {
                                        if (willDelete) form.submit();
                                    });
                                });
                            });

                            // Reset form and redirect to clear filters
                            function resetForm() {
                                window.location.href = "{{ route('admin.verify.index') }}";
                            }
                        </script>
                        <script>
    document.querySelectorAll('.show_confirm').forEach(form => {
        form.addEventListener('submit', function (e) {
            if (!confirm('Are you sure you want to delete this verification?')) {
                e.preventDefault();
            }
        });
    });
</script>

                    @endsection
