<div class="print-none">
    <ul class="mt-2 nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'patient.index') ? 'active' : '' }}" href="{{ route('patient.index') }}">All Records</a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'patient.create') ? 'active' : '' }}" href="{{ route('patient.create') }}">New Entry</a>
        </li>

        {{-- <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'investment.trash') ? 'active' : '' }}" href="{{ route('investment.trash') }}">Recycle Bin</a>
        </li> --}}
    </ul>
</div>
