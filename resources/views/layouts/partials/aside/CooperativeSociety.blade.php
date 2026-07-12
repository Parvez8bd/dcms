@php
    $currentRouteName = Route::currentRouteName();
    [$currentRoute] = explode('.', $currentRouteName);
@endphp

<ul class="accordion" id="asideAccordion">
    <!-- Basic -->
    <li class="ps-3 py-1 fw-bold">Basic</li>

    <li class="accordion-item">
        <a href="{{ route('Cooperative-society') }}" class="single-nav-link {{ ($currentRoute == 'Cooperative-society' ) ? 'active' : '' }}">
            <i class="bi bi-speedometer2"></i>
            <span>Dashboard</span>
        </a>
    </li>

    {{-- Monthly Diposit --}}
    <li class="accordion-item">
        <a href="#" class="accordion-button {{ ($currentRoute == 'diposit' ) ? '' : 'collapsed' }}" data-bs-toggle="collapse" data-bs-target="#diposit" aria-expanded="{{ ($currentRoute == 'diposit' ) ? 'true' : 'false' }}" aria-controls="diposit">
            <i class="bi bi-wallet2"></i>
            <span>Diposit </span>
        </a>

        <ul id="diposit" class="accordion-collapse collapse {{ ($currentRoute == 'diposit') ? 'show' : '' }}" aria-labelledby="headingInvestment" data-bs-parent="#asideAccordion">
            <li><a href="{{ route('diposit.index') }}" class="nav-link {{ ($currentRouteName == 'diposit.index') ? 'active' : '' }}">All Diposit</a></li>
            <li><a href="{{ route('diposit.create') }}" class="nav-link {{ ($currentRouteName == 'diposit.create') ? 'active' : '' }}">New Diposit</a></li>
        </ul>
    </li>
    {{-- Monthly Diposit end --}}

    {{-- Fixed Diposit --}}
    {{-- <li class="accordion-item">
        <a href="#" class="accordion-button {{ ($currentRoute == 'investment' ) ? '' : 'collapsed' }}" data-bs-toggle="collapse" data-bs-target="#investment" aria-expanded="{{ ($currentRoute == 'investment' ) ? 'true' : 'false' }}" aria-controls="investment">
            <i class="bi bi-cash-coin"></i>
            <span>Fixed Diposit </span>
        </a>

        <ul id="investment" class="accordion-collapse collapse {{ ($currentRoute == 'investment') ? 'show' : '' }}" aria-labelledby="headingInvestment" data-bs-parent="#asideAccordion">
            <li><a href="{{ route('investment.index') }}" class="nav-link {{ ($currentRouteName == 'investment.index') ? 'active' : '' }}">All Diposit</a></li>
            <li><a href="{{ route('investment.create') }}" class="nav-link {{ ($currentRouteName == 'investment.create') ? 'active' : '' }}">New Diposit</a></li>
        </ul>
    </li> --}}
    {{-- Fixed Diposit end --}}

    {{-- withdraw --}}
    <li class="accordion-item">
        <a href="#" class="accordion-button {{ ($currentRoute == 'diposit-withdraw' ) ? '' : 'collapsed' }}" data-bs-toggle="collapse" data-bs-target="#withdraw" aria-expanded="{{ ($currentRoute == 'diposit-withdraw' ) ? 'true' : 'false' }}" aria-controls="withdraw">
            <i class="bi bi-wallet"></i>
            <span>Withdraw </span>
        </a>

        <ul id="withdraw" class="accordion-collapse collapse {{ ($currentRoute == 'diposit-withdraw') ? 'show' : '' }}" aria-labelledby="headingWithdraw" data-bs-parent="#asideAccordion">
            <li><a href="{{ route('diposit-withdraw.index') }}" class="nav-link {{ ($currentRouteName == 'diposit-withdraw.index') ? 'active' : '' }}">All Withdraw</a></li>
            <li><a href="{{ route('diposit-withdraw.create') }}" class="nav-link {{ ($currentRouteName == 'diposit-withdraw.create') ? 'active' : '' }}">New Withdraw</a></li>
        </ul>
    </li>
    {{-- withdraw end --}}

    {{-- Account --}}
    <li class="accordion-item">
        <a href="#" class="accordion-button {{ ($currentRoute == 'account' ) ? '' : 'collapsed' }}" data-bs-toggle="collapse" data-bs-target="#account" aria-expanded="{{ ($currentRoute == 'account' ) ? 'true' : 'false' }}" aria-controls="account">
            <i class="bi bi-person-lines-fill"></i>
            <span>Account </span>
        </a>

        <ul id="account" class="accordion-collapse collapse {{ ($currentRoute == 'account') ? 'show' : '' }}" aria-labelledby="headingInvestment" data-bs-parent="#asideAccordion">
            <li><a href="{{ route('account.index') }}" class="nav-link {{ ($currentRouteName == 'account.index') ? 'active' : '' }}">All Account</a></li>
            <li><a href="{{ route('account.create') }}" class="nav-link {{ ($currentRouteName == 'account.create') ? 'active' : '' }}">New Account</a></li>
        </ul>
    </li>
    {{-- Account end --}}

    {{-- profit --}}
    {{-- <li class="accordion-item">
        <a href="#" class="accordion-button {{ ($currentRoute == 'profit-distribution' ) ? '' : 'collapsed' }}" data-bs-toggle="collapse" data-bs-target="#profit-distribution" aria-expanded="{{ ($currentRoute == 'profit-distribution' ) ? 'true' : 'false' }}" aria-controls="profit-distribution">
            <i class="bi bi-graph-up-arrow"></i>
            <span>Profit Distribution</span>
        </a>

        <ul id="profit-distribution" class="accordion-collapse collapse {{ ($currentRoute == 'profit-distribution') ? 'show' : '' }}" aria-labelledby="headingprofit-distribution" data-bs-parent="#asideAccordion">
            <li><a href="{{ route('profit-distribution.index') }}" class="nav-link {{ ($currentRouteName == 'profit-distribution.index') ? 'active' : '' }}">All Distribution</a></li>
            <li><a href="{{ route('profit-distribution.create') }}" class="nav-link {{ ($currentRouteName == 'profit-distribution.create') ? 'active' : '' }}">New Distribution</a></li>
        </ul>
    </li> --}}
    {{-- profit end --}}

    {{-- Member --}}
    <li class="accordion-item">
        <a href="#" class="accordion-button {{ ($currentRoute == 'diposit-contact' ) ? '' : 'collapsed' }}" data-bs-toggle="collapse" data-bs-target="#diposit-contact" aria-expanded="{{ ($currentRoute == 'diposit-contact' ) ? 'true' : 'false' }}" aria-controls="diposit-contact">
            <i class="bi bi-people"></i>
            <span>Contact</span>
        </a>

        <ul id="diposit-contact" class="accordion-collapse collapse {{ ($currentRoute == 'diposit-contact') ? 'show' : '' }}" aria-labelledby="headingdiposit-contact" data-bs-parent="#asideAccordion">
            <li><a href="{{ route('diposit-contact.index') }}" class="nav-link {{ ($currentRouteName == 'diposit-contact.index') ? 'active' : '' }}">All Records</a></li>
            <li><a href="{{ route('diposit-contact.create') }}" class="nav-link {{ ($currentRouteName == 'diposit-contact.create') ? 'active' : '' }}">New Entry</a></li>
        </ul>
    </li>
    {{-- Member end --}}

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

    <!-- Settings -->
    <li class="ps-3 py-1 mt-2 fw-bold">Settings</li>

    {{-- category --}}
    <li class="accordion-item">
        <a href="#" class="accordion-button {{ ($currentRoute == 'category' ) ? '' : 'collapsed' }}" data-bs-toggle="collapse" data-bs-target="#category" aria-expanded="{{ ($currentRoute == 'category' ) ? 'true' : 'false' }}" aria-controls="category">
            <i class="bi bi-collection"></i>
            <span>Caregory</span>
        </a>

        <ul id="category" class="accordion-collapse collapse {{ ($currentRoute == 'category') ? 'show' : '' }}" aria-labelledby="headingProject" data-bs-parent="#asideAccordion">
            <li><a href="{{ route('category.index') }}" class="nav-link {{ ($currentRouteName == 'category.index') ? 'active' : '' }}">All Records</a></li>
            <li><a href="{{ route('category.create') }}" class="nav-link {{ ($currentRouteName == 'category.create') ? 'active' : '' }}">New Entry</a></li>
        </ul>
    </li>
    {{-- category end --}}

    {{-- sub-category --}}
    <li class="accordion-item">
        <a href="#" class="accordion-button {{ ($currentRoute == 'sub-category' ) ? '' : 'collapsed' }}" data-bs-toggle="collapse" data-bs-target="#sub-category" aria-expanded="{{ ($currentRoute == 'sub-category' ) ? 'true' : 'false' }}" aria-controls="sub-category">
            <i class="bi bi-collection"></i>
            <span>Sub Caregory</span>
        </a>

        <ul id="sub-category" class="accordion-collapse collapse {{ ($currentRoute == 'sub-category') ? 'show' : '' }}" aria-labelledby="headingProject" data-bs-parent="#asideAccordion">
            <li><a href="{{ route('sub-category.index') }}" class="nav-link {{ ($currentRouteName == 'sub-category.index') ? 'active' : '' }}">All Records</a></li>
            <li><a href="{{ route('sub-category.create') }}" class="nav-link {{ ($currentRouteName == 'sub-category.create') ? 'active' : '' }}">New Entry</a></li>
        </ul>
    </li>
    {{-- sub-category end --}}

     
{{--
    <li class="accordion-item">
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