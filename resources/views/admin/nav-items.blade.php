<li class="nav-item <?= @$child_nav == 'dashboard' ? 'active bg-gray' : '' ?>">
    <a href="{{ route('admin.dashboard') }}" class="nav-link">
        <i class="far fa-regular fa-image nav-icon"></i>
        <p>{{ __('Dashboard') }}</p>
    </a>
    </li>

<li class="nav-item  <?= @$parent_nav == 'item' ? 'active menu-open' : '' ?>">
    <a href="#" class="nav-link ">

        <i class="far fa-file-alt nav-icon"></i>
        <p>{{ __('Item') }}</p>
        <i class="right fas fa-angle-left"></i>
    </a>
    <ul class="nav nav-treeview pl-3">
        <li class="nav-item <?= @$child_nav == 'hoodie' ? 'active bg-gray' : '' ?>">
            <a href="{{ route('admin.hoodie.index') }}" class="nav-link">
                <i class="far fa-file-alt nav-icon"></i>
                <p>{{ __('Hello') }}</p>
            </a>
        </li>
        <li class="nav-item <?= @$child_nav == 'banner' ? 'active bg-gray' : '' ?>">
             <a href="{{ route('admin.banner.index') }}" class="nav-link"> 
                <i class="far fa-file-alt nav-icon"></i>
                <p>{{ __('Banner') }}</p>
            </a>
        </li>
        <li class="nav-item <?= @$child_nav == 'suspended_participant_list' ? 'active bg-gray' : '' ?>">
            <a href="" class="nav-link">


                <i class="far fa-file-alt nav-icon"></i>
                <p>{{ __('Suspended') }}</p>
            </a>
        </li>
        <li class="nav-item <?= @$child_nav == 'deleted_articipant_list' ? 'active bg-gray' : '' ?>">
            {{-- <a href="{{ route('Deleted.index') }}" class="nav-link"> --}}
            <a href="" class="nav-link">


                <i class="far fa-file-alt nav-icon"></i>
                <p>{{ __('Deleted') }}</p>
            </a>
        </li>
        <!-- <li class="nav-item <?= @$child_nav == 'bulk_list' ? 'active bg-gray' : '' ?>">
            <a href="" class="nav-link">
                {{-- <a href="{{ route('Bulk.index') }}" class="nav-link"> --}}
                <i class="far fa-file-alt nav-icon"></i>
                <p>{{ __('Bulk list') }}</p>
            </a>
        </li> -->
    </ul>
</li>