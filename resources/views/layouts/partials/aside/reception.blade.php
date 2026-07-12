@php
    $currentRouteName = Route::currentRouteName();
    [$currentRoute, $routeName] = explode('.', $currentRouteName);
@endphp

<ul class="accordion" id="asideAccordion">
    <!-- Basic -->
    <li class="ps-3 py-1 fw-bold">Basic</li>

    <li class="accordion-item">
        <a href="{{ route('dashboard.index') }}" class="single-nav-link {{ ($currentRoute == 'dashboard' ) ? 'active' : '' }}">
            <i class="bi bi-speedometer2"></i>
            <span>Dashboard</span>
        </a>
    </li>

    {{-- investment --}}
    <li class="accordion-item">
        <a href="#" class="accordion-button {{ ($currentRoute == 'patient' ) ? '' : 'collapsed' }}" data-bs-toggle="collapse" data-bs-target="#patient" aria-expanded="{{ ($currentRoute == 'patient' ) ? 'true' : 'false' }}" aria-controls="patient">
            <i class="bi bi-person-lines-fill"></i>
            <span>Patient </span>
        </a>

        <ul id="patient" class="accordion-collapse collapse {{ ($currentRoute == 'patient') ? 'show' : '' }}" aria-labelledby="headingpatient" data-bs-parent="#asideAccordion">
            <li><a href="{{ route('patient.index') }}" class="nav-link {{ ($currentRouteName == 'patient.index') ? 'active' : '' }}">All Records</a></li>
            <li><a href="{{ route('patient.create') }}" class="nav-link {{ ($currentRouteName == 'patient.create') ? 'active' : '' }}">New Entry</a></li>
        </ul>
    </li>
    {{-- investment end --}}

    {{-- withdraw --}}
    <li class="accordion-item">
        <a href="#" class="accordion-button {{ ($currentRoute == 'due-collection' ) ? '' : 'collapsed' }}" data-bs-toggle="collapse" data-bs-target="#due-collection" aria-expanded="{{ ($currentRoute == 'due-collection' ) ? 'true' : 'false' }}" aria-controls="due-collection">
            <i class="bi bi-wallet"></i>
            <span>Collection</span>
        </a>

        <ul id="due-collection" class="accordion-collapse collapse {{ ($currentRoute == 'due-collection') ? 'show' : '' }}" aria-labelledby="headingdue-collection" data-bs-parent="#asideAccordion">
            <li><a href="{{ route('due-collection.index') }}" class="nav-link {{ ($currentRouteName == 'due-collection.index') ? 'active' : '' }}">All Collection</a></li>
            <li><a href="{{ route('due-collection.create') }}" class="nav-link {{ ($currentRouteName == 'due-collection.create') ? 'active' : '' }}">Due Collection</a></li>
        </ul>
    </li>
    {{-- due-collection end --}}

    {{-- withdraw --}}
    {{-- <li class="accordion-item">
        <a href="#" class="accordion-button {{ ($currentRoute == 'report' ) ? '' : 'collapsed' }}" data-bs-toggle="collapse" data-bs-target="#report" aria-expanded="{{ ($currentRoute == 'report' ) ? 'true' : 'false' }}" aria-controls="report">
            <i class="bi bi-activity"></i>
            <span>Report</span>
        </a>

        <ul id="report" class="accordion-collapse collapse {{ ($currentRoute == 'report') ? 'show' : '' }}" aria-labelledby="headingreport" data-bs-parent="#asideAccordion">
            <li><a href="{{ route('report.index') }}" class="nav-link {{ ($currentRouteName == 'report.index') ? 'active' : '' }}">All Report</a></li>
            <li><a href="{{ route('report.create') }}" class="nav-link {{ ($currentRouteName == 'report.create') ? 'active' : '' }}">New Report</a></li>
        </ul>
    </li> --}}
    <li class="accordion-item">
        <a href="{{ route('report.index') }}" class="single-nav-link {{ ($currentRoute == 'report' ) ? 'active' : '' }}">
            <i class="bi bi-activity"></i>
            <span>Report</span>
        </a>
    </li>
    {{-- withdraw end --}}

    {{-- <!-- profit -->
    <li class="accordion-item">
        <a href="#" class="accordion-button {{ ($currentRoute == 'profit-distribution' ) ? '' : 'collapsed' }}" data-bs-toggle="collapse" data-bs-target="#profit-distribution" aria-expanded="{{ ($currentRoute == 'profit-distribution' ) ? 'true' : 'false' }}" aria-controls="profit-distribution">
            <i class="bi bi-person-bounding-box"></i>
            <span>Doctor</span>
        </a>

        <ul id="profit-distribution" class="accordion-collapse collapse {{ ($currentRoute == 'profit-distribution') ? 'show' : '' }}" aria-labelledby="headingprofit-distribution" data-bs-parent="#asideAccordion">
            <li><a href="#" class="nav-link {{ ($currentRouteName == 'profit-distribution.index') ? 'active' : '' }}">All Distribution</a></li>
            <li><a href="#" class="nav-link {{ ($currentRouteName == 'profit-distribution.create') ? 'active' : '' }}">New Distribution</a></li>
        </ul>
    </li>
    <!-- profit end --> --}}

    

    {{-- contact --}}
    <li class="accordion-item">
        <a href="#" class="accordion-button {{ ($currentRoute == 'contact' ) ? '' : 'collapsed' }}" data-bs-toggle="collapse" data-bs-target="#contact" aria-expanded="{{ ($currentRoute == 'contact' ) ? 'true' : 'false' }}" aria-controls="contact">
            <i class="bi bi-people"></i>
            <span>Contact</span>
        </a>

        <ul id="contact" class="accordion-collapse collapse {{ ($currentRoute == 'contact') ? 'show' : '' }}" aria-labelledby="headingContact" data-bs-parent="#asideAccordion">
            <li><a href="{{ route('contact.index') }}" class="nav-link {{ ($currentRouteName == 'contact.index') ? 'active' : '' }}">All Records</a></li>
            <li><a href="{{ route('contact.create') }}" class="nav-link {{ ($currentRouteName == 'contact.create') ? 'active' : '' }}">New Entry</a></li>
        </ul>
    </li>
    {{-- contact end --}}

    {{-- <li class="accordion-item">
        <a href="#" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#media" aria-expanded="false" aria-controls="media">
            <i class="bi bi-film"></i>
            <span>Media</span>
        </a>

        <ul id="media" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#asideAccordion">
            <li><a href="#" class="nav-link">Upload</a></li>
            <li><a href="#" class="nav-link">Gallery</a></li>
            <li><a href="#" class="nav-link">Album</a></li>
        </ul>
    </li> --}}

    {{-- <li class="accordion-item">
        <a href="#" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#report" aria-expanded="false" aria-controls="report">
            <i class="bi bi-graph-up"></i>
            <span>Report</span>
        </a>

        <ul id="report" class="accordion-collapse collapse" aria-labelledby="headingReport" data-bs-parent="#asideAccordion">
            <li><a href="#" class="nav-link">Ledger</a></li>
            <li><a href="#" class="nav-link">Trial Balance</a></li>
            <li><a href="#" class="nav-link">Balance Sheet</a></li>
            <li><a href="#" class="nav-link">Income Statement</a></li>
            <li><a href="#" class="nav-link">Cash flow Sheet</a></li>
            <li><a href="#" class="nav-link">OE Sheet</a></li>
        </ul>
    </li> --}}
    <!-- Basic end -->

   
{{-- 
    <!-- Settings -->
    <li class="ps-3 py-1 mt-2 fw-bold">Settings</li>

    <!-- Group -->
    <li class="accordion-item">
        <a href="#" class="accordion-button {{ ($currentRoute == 'test-group' ) ? '' : 'collapsed' }}" data-bs-toggle="collapse" data-bs-target="#test-group" aria-expanded="{{ ($currentRoute == 'test-group' ) ? 'true' : 'false' }}" aria-controls="test-group">
            <i class="bi bi-collection"></i>
            <span>Test Group</span>
        </a>

        <ul id="test-group" class="accordion-collapse collapse {{ ($currentRoute == 'test-group') ? 'show' : '' }}" aria-labelledby="headingtest-group" data-bs-parent="#asideAccordion">
            <li><a href="{{ route('test-group.index') }}" class="nav-link {{ ($currentRouteName == 'test-group.index') ? 'active' : '' }}">All Records</a></li>
            <li><a href="{{ route('test-group.create') }}" class="nav-link {{ ($currentRouteName == 'test-group.create') ? 'active' : '' }}">New Entry</a></li>
        </ul>
    </li>
    <!-- Group end -->

    <!-- Test -->
    <li class="accordion-item">
        <a href="#" class="accordion-button {{ ($currentRoute == 'test' ) ? '' : 'collapsed' }}" data-bs-toggle="collapse" data-bs-target="#test" aria-expanded="{{ ($currentRoute == 'test' ) ? 'true' : 'false' }}" aria-controls="test">
            <i class="bi bi-droplet-half"></i>
            <span>Test</span>
        </a>

        <ul id="test" class="accordion-collapse collapse {{ ($currentRoute == 'test') ? 'show' : '' }}" aria-labelledby="headingtest" data-bs-parent="#asideAccordion">
            <li><a href="{{ route('test.index') }}" class="nav-link {{ ($currentRouteName == 'test.index') ? 'active' : '' }}">All Records</a></li>
            <li><a href="{{ route('test.create') }}" class="nav-link {{ ($currentRouteName == 'test.create') ? 'active' : '' }}">New Entry</a></li>
        </ul>
    </li>
    <!-- Test end --> --}}


    {{--<li class="accordion-item">
        <a href="#" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#account" aria-expanded="false" aria-controls="account">
            <i class="bi bi-folder-plus"></i>
            <span>Ledger account</span>
        </a>

        <ul id="account" class="accordion-collapse collapse" aria-labelledby="headingAccount" data-bs-parent="#asideAccordion">
            <li><a href="" class="nav-link">All Records</a></li>
            <li><a href="" class="nav-link">New Entry</a></li>
        </ul>
    </li>

    <li class="accordion-item">
        <a href="#" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#journal" aria-expanded="false" aria-controls="journal">
            <i class="bi bi-card-list"></i>
            <span>Journal</span>
        </a>

        <ul id="journal" class="accordion-collapse collapse" aria-labelledby="headingJournal" data-bs-parent="#asideAccordion">
            <li><a href="" class="nav-link">All Records</a></li>
            <li><a href="" class="nav-link">New Entry</a></li>
        </ul>
    </li>

    <li class="accordion-item">
        <a href="#" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#cash" aria-expanded="false" aria-controls="cash">
            <i class="bi bi-cash"></i>
            <span>Cash</span>
        </a>

        <ul id="cash" class="accordion-collapse collapse" data-bs-parent="#asideAccordion">
            <li><a href="" class="nav-link">All Cash</a></li>
            <li><a href="" class="nav-link">New Cash</a></li>
        </ul>
    </li>

    <li class="accordion-item">
        <a href="#" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#bank" aria-expanded="false" aria-controls="banking">
            <i class="bi bi-credit-card"></i>
            <span>Bank</span>
        </a>

        <ul id="bank" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#asideAccordion">
            <li><a href="" class="nav-link">All Bank</a></li>
            <li><a href="" class="nav-link">New Bank</a></li>
        </ul>
    </li>

    <li class="accordion-item">
        <a href="#" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#bank-account" aria-expanded="false" aria-controls="banking">
            <i class="bi bi-credit-card"></i>
            <span>Bank Account</span>
        </a>

        <ul id="bank-account" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#asideAccordion">
            <li><a href="" class="nav-link">All Bank Account</a></li>
            <li><a href="" class="nav-link">New Bank Account</a></li>
        </ul>
    </li> --}}
    <!-- Settings end -->
</ul>