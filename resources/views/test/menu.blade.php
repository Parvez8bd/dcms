<div class="print-none">
    <ul class="mt-2 nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'test.index') ? 'active' : '' }}" href="{{ route('test.index') }}">All Records</a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'test.create') ? 'active' : '' }}" href="{{ route('test.create') }}">New Entry</a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'test.trash') ? 'active' : '' }}" href="{{ route('test.trash') }}">Recycle Bin</a>
        </li>
    </ul>
</div>
