<div class="print-none">
    <ul class="mt-2 nav nav-tabs">
        @if (Route::currentRouteName() == 'report.index')
          <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'report.index') ? 'active' : '' }}" href="{{ route('report.index') }}">All Records</a>
        </li>  
        @else
        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'lab-report.create') ? 'active' : '' }}" href="{{ route('lab-report.create') }}">All Records</a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'report.singleCreate') ? 'active' : '' }}" >New Entry</a>
        </li>
        @endif
        
        

        {{-- <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'report.trash') ? 'active' : '' }}" href="{{ route('report.trash') }}">Recycle Bin</a>
        </li> --}}
    </ul>
</div>
