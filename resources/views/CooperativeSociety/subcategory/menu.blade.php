<div class="print-none">
    <ul class="mt-2 nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'sub-category.index') ? 'active' : '' }}" href="{{ route('sub-category.index') }}">All Records</a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'sub-category.create') ? 'active' : '' }}" href="{{ route('sub-category.create') }}">New Entry</a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'sub-category.trash') ? 'active' : '' }}" href="{{ route('sub-category.trash') }}">Recycle Bin</a>
        </li>
    </ul>
</div>
