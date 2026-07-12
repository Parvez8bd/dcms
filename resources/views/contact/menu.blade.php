<div class="print-none">
    <ul class="mt-2 nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'contact.index') ? 'active' : '' }}" href="{{ route('contact.index') }}">All Records</a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'contact.create') ? 'active' : '' }}" href="{{ route('contact.create') }}">New Entry</a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'contact.trash') ? 'active' : '' }}" href="{{ route('contact.trash') }}">Recycle Bin</a>
        </li>
    </ul>
</div>
