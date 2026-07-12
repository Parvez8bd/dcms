<div class="print-none">
    <ul class="mt-2 nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'project.index') ? 'active' : '' }}" href="{{ route('project.index') }}">All Records</a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'project.create') ? 'active' : '' }}" href="{{ route('project.create') }}">New Entry</a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'project.trash') ? 'active' : '' }}" href="{{ route('project.trash') }}">Recycle Bin</a>
        </li>
    </ul>
</div>
