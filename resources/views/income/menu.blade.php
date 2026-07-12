<div class="print-none">
    <ul class="mt-2 nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'income.index') ? 'active' : '' }}" href="{{ route('income.index') }}">All Records</a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'income.create') ? 'active' : '' }}" href="{{ route('income.create') }}">New Entry</a>
        </li>

        {{-- <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'income.trash') ? 'active' : '' }}" href="{{ route('income.trash') }}">Recycle Bin</a>
        </li> --}}
    </ul>
</div>
