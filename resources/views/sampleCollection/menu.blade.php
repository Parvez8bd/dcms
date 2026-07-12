<div class="print-none">
    <ul class="mt-2 nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'sample-collection.index') ? 'active' : '' }}" href="{{ route('sample-collection.index') }}">All Records</a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'sample-collection.create') ? 'active' : '' }}" href="{{ route('sample-collection.create') }}">New Entry</a>
        </li>

        {{-- <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'sample-collection.trash') ? 'active' : '' }}" href="{{ route('sale.trash') }}">Recycle Bin</a>
        </li> --}}
    </ul>
</div>
