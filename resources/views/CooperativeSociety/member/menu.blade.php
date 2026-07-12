<div class="print-none">
    <ul class="mt-2 nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'member.index') ? 'active' : '' }}" href="{{ route('member.index') }}">All Records</a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'member.create') ? 'active' : '' }}" href="{{ route('member.create') }}">New Entry</a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'member.trash') ? 'active' : '' }}" href="{{ route('member.trash') }}">Recycle Bin</a>
        </li>
    </ul>
</div>
