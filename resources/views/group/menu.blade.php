<div class="print-none">
    <ul class="mt-2 nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'test-group.index') ? 'active' : '' }}" href="{{ route('test-group.index') }}">All Records</a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'test-group.create') ? 'active' : '' }}" href="{{ route('test-group.create') }}">New Entry</a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'test-group.trash') ? 'active' : '' }}" href="{{ route('test-group.trash') }}">Recycle Bin</a>
        </li>
    </ul>
</div>
