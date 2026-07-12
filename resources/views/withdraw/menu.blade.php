<div class="print-none">
    <ul class="mt-2 nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'withdraw.index') ? 'active' : '' }}" href="{{ route('withdraw.index') }}">All Records</a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'withdraw.create') ? 'active' : '' }}" href="{{ route('withdraw.create') }}">New Entry</a>
        </li>

        {{-- <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'withdraw.trash') ? 'active' : '' }}" href="{{ route('withdraw.trash') }}">Recycle Bin</a>
        </li> --}}
    </ul>
</div>
