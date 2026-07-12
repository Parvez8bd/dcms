<div class="print-none">
    <ul class="mt-2 nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'category.index') ? 'active' : '' }}" href="{{ route('category.index') }}">All Records</a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'category.create') ? 'active' : '' }}" href="{{ route('category.create') }}">New Entry</a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'category.trash') ? 'active' : '' }}" href="{{ route('category.trash') }}">Recycle Bin</a>
        </li>
    </ul>
</div>
