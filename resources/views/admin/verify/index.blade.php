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
                                                <th class="">FATHER NAME</th>
                                                <th class="">BIRTH DATE</th>
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
@endsection
