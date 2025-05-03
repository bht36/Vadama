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
        </ul>
</li>
<li class="nav-item <?= @$child_nav == 'site_setting' ? 'active bg-gray' : '' ?>">
    <a href="{{ route('admin.site_setting.index') }}" class="nav-link">
        <i class="fas fa-cogs nav-icon"></i>
        <p>{{ __('Site Setting') }}</p>
    </a>
</li>
