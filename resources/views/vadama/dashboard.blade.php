@extends('vadama.layouts.header')

@section('content')
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4"> 
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2" style="padding-bottom: 104px;">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Include Navigation Items -->
                @include('vadama.nav-items-user')
            </ul>
        </nav>
    </div>
</aside>
@endsection
