<div class="print-none">
    <ul class="mt-2 nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'due-collection.index') ? 'active' : '' }}" href="{{ route('due-collection.index') }}">All Records</a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'due-collection.create') ? 'active' : '' }}" href="{{ route('due-collection.create') }}">New Entry</a>
        </li>

        {{-- <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'due-collection.trash') ? 'active' : '' }}" href="{{ route('sale.trash') }}">Recycle Bin</a>
        </li> --}}
    </ul>
</div>
