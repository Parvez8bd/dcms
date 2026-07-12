<div class="print-none">
    <ul class="mt-2 nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'diposit-withdraw.index') ? 'active' : '' }}" href="{{ route('diposit-withdraw.index') }}">All Records</a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'diposit-withdraw.create') ? 'active' : '' }}" href="{{ route('diposit-withdraw.create') }}">New Entry</a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'diposit-withdraw.trash') ? 'active' : '' }}" href="{{ route('diposit-withdraw.trash') }}">Recycle Bin</a>
        </li> 
    </ul>
</div>
