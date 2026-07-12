@php
    $currentRouteName = Route::currentRouteName();
    [$currentRoute, $routeName] = explode('.', $currentRouteName);
@endphp

<ul class="accordion" id="asideAccordion">
    <!-- Basic -->
    <li class="ps-3 py-1 fw-bold">Basic</li>

    <li class="accordion-item">
        <a href="{{ route('lab.index') }}" class="single-nav-link {{ ($currentRoute == 'lab' ) ? 'active' : '' }}">
            <i class="bi bi-speedometer2"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <!-- Sample Collections -->
    <li class="accordion-item">
        <a href="#" class="accordion-button {{ ($currentRoute == 'sample-collection' ) ? '' : 'collapsed' }}" data-bs-toggle="collapse" data-bs-target="#sample-collection" aria-expanded="{{ ($currentRoute == 'sample-collection' ) ? 'true' : 'false' }}" aria-controls="sample-collection">
            <i class="bi bi-eyedropper"></i>
            <span>Sample Collections</span>
        </a>

        <ul id="sample-collection" class="accordion-collapse collapse {{ ($currentRoute == 'sample-collection') ? 'show' : '' }}" aria-labelledby="headingtest" data-bs-parent="#asideAccordion">
            <li><a href="{{ route('sample-collection.index') }}" class="nav-link {{ ($currentRouteName == 'sample-collection.index') ? 'active' : '' }}">All Collection</a></li>
            <li><a href="{{ route('sample-collection.create') }}" class="nav-link {{ ($currentRouteName == 'sample-collection.create') ? 'active' : '' }}">New Collection</a></li>
        </ul>
    </li>
    <!-- Sample Collections end -->
    <li class="accordion-item">
        <a href="{{ route('lab-report.create') }}" class="single-nav-link {{ ($currentRoute == 'lab-report' ) ? 'active' : '' }}">
            <i class="bi bi-activity"></i>
            <span>Report</span>
        </a>
    </li>
    

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
    <!-- Test end -->
    

    {{-- investment --}}
    {{-- <li class="accordion-item">
        <a href="#" class="accordion-button {{ ($currentRoute == 'investment' ) ? '' : 'collapsed' }}" data-bs-toggle="collapse" data-bs-target="#investment" aria-expanded="{{ ($currentRoute == 'investment' ) ? 'true' : 'false' }}" aria-controls="investment">
            <i class="bi bi-cash-coin"></i>
            <span>Investment </span>
        </a>

        <ul id="investment" class="accordion-collapse collapse {{ ($currentRoute == 'investment') ? 'show' : '' }}" aria-labelledby="headingInvestment" data-bs-parent="#asideAccordion">
            <li><a href="{{ route('investment.index') }}" class="nav-link {{ ($currentRouteName == 'investment.index') ? 'active' : '' }}">All Investment</a></li>
            <li><a href="{{ route('investment.create') }}" class="nav-link {{ ($currentRouteName == 'investment.create') ? 'active' : '' }}">New Investment</a></li>
        </ul>
    </li> --}}
    {{-- investment end --}}

    {{-- withdraw --}}
    {{-- <li class="accordion-item">
        <a href="#" class="accordion-button {{ ($currentRoute == 'withdraw' ) ? '' : 'collapsed' }}" data-bs-toggle="collapse" data-bs-target="#withdraw" aria-expanded="{{ ($currentRoute == 'withdraw' ) ? 'true' : 'false' }}" aria-controls="withdraw">
            <i class="bi bi-wallet"></i>
            <span>Withdraw </span>
        </a>

        <ul id="withdraw" class="accordion-collapse collapse {{ ($currentRoute == 'withdraw') ? 'show' : '' }}" aria-labelledby="headingWithdraw" data-bs-parent="#asideAccordion">
            <li><a href="{{ route('withdraw.index') }}" class="nav-link {{ ($currentRouteName == 'withdraw.index') ? 'active' : '' }}">All Withdraw</a></li>
            <li><a href="{{ route('withdraw.create') }}" class="nav-link {{ ($currentRouteName == 'withdraw.create') ? 'active' : '' }}">New Withdraw</a></li>
        </ul>
    </li> --}}
    {{-- withdraw end --}}

    <!-- profit -->
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
    {{-- <li class="ps-3 py-1 mt-2 fw-bold">Credit Sale/Lone</li> --}}

    {{-- Sale --}}
    {{-- <li class="accordion-item">
        <a href="#" class="accordion-button {{ ($currentRoute == 'lab-report' ) ? '' : 'collapsed' }}" data-bs-toggle="collapse" data-bs-target="#lab-report" aria-expanded="{{ ($currentRoute == 'lab-report' ) ? 'true' : 'false' }}" aria-controls="lab-report">
            <i class="bi bi-activity"></i>
            <span>Report</span>
        </a>

        <ul id="lab-report" class="accordion-collapse collapse {{ ($currentRoute == 'lab-report') ? 'show' : '' }}" aria-labelledby="headingContact" data-bs-parent="#asideAccordion">
            <li><a href="{{ route('lab-report.index') }}" class="nav-link {{ ($currentRouteName == 'lab-report.index') ? 'active' : '' }}">All Records</a></li>
            <li><a href="{{ route('lab-report.create') }}" class="nav-link {{ ($currentRouteName == 'lab-report.create') ? 'active' : '' }}">New Entry</a></li>
        </ul>
    </li> --}}
    {{-- Sale end --}}

    {{-- Instalment --}}
   <!-- <li class="accordion-item">
        <a href="#" class="accordion-button {{ ($currentRoute == 'installment' ) ? '' : 'collapsed' }}" data-bs-toggle="collapse" data-bs-target="#installment" aria-expanded="{{ ($currentRoute == 'installment' ) ? 'true' : 'false' }}" aria-controls="installment">
            <i class="bi bi-currency-exchange"></i>
            <span>Instalment</span>
        </a>

        <ul id="installment" class="accordion-collapse collapse {{ ($currentRoute == 'installment') ? 'show' : '' }}" aria-labelledby="headingContact" data-bs-parent="#asideAccordion">
            <li><a href="{{ route('installment.index') }}" class="nav-link {{ ($currentRouteName == 'installment.index') ? 'active' : '' }}">All Records</a></li>
            <li><a href="{{ route('installment.create') }}" class="nav-link {{ ($currentRouteName == 'installment.create') ? 'active' : '' }}">New Entry</a></li>
        </ul>
    </li>
    {{-- Instalment end --}}

    {{-- Fine --}}
    <li class="accordion-item">
        <a href="#" class="accordion-button {{ ($currentRoute == 'fine' ) ? '' : 'collapsed' }}" data-bs-toggle="collapse" data-bs-target="#fine" aria-expanded="{{ ($currentRoute == 'fine' ) ? 'true' : 'false' }}" aria-controls="fine">
            <i class="bi bi-coin"></i>
            <span>Fine Withraw</span>
        </a>

        <ul id="fine" class="accordion-collapse collapse {{ ($currentRoute == 'fine') ? 'show' : '' }}" aria-labelledby="headingContact" data-bs-parent="#asideAccordion">
            <li><a href="{{ route('fine.index') }}" class="nav-link {{ ($currentRouteName == 'fine.index') ? 'active' : '' }}">All Records</a></li>
            <li><a href="{{ route('fine.create') }}" class="nav-link {{ ($currentRouteName == 'fine.create') ? 'active' : '' }}">New Entry</a></li>
        </ul>
    </li>
    {{-- Fine end --}}

    {{-- contact --}}
    <li class="accordion-item">
        <a href="#" class="accordion-button {{ ($currentRoute == 'sale-lone-contact' ) ? '' : 'collapsed' }}" data-bs-toggle="collapse" data-bs-target="#sale-lone-contact" aria-expanded="{{ ($currentRoute == 'sale-lone-contact' ) ? 'true' : 'false' }}" aria-controls="sale-lone-contact">
            <i class="bi bi-people"></i>
            <span>Contact</span>
        </a>

        <ul id="sale-lone-contact" class="accordion-collapse collapse {{ ($currentRoute == 'sale-lone-contact') ? 'show' : '' }}" aria-labelledby="headingsale-lone-contact" data-bs-parent="#asideAccordion">
            <li><a href="{{ route('sale-lone-contact.index') }}" class="nav-link {{ ($currentRouteName == 'sale-lone-contact.index') ? 'active' : '' }}">All Records</a></li>
            <li><a href="{{ route('sale-lone-contact.create') }}" class="nav-link {{ ($currentRouteName == 'sale-lone-contact.create') ? 'active' : '' }}">New Entry</a></li>
        </ul>
    </li>
    {{-- contact end --}}
-->

    <!-- Settings -->
    {{-- <li class="ps-3 py-1 mt-2 fw-bold">Diposit</li> --}}

    {{-- project --}}
    {{-- <li class="accordion-item">
        <a href="#" class="accordion-button {{ ($currentRoute == 'diposit' ) ? '' : 'collapsed' }}" data-bs-toggle="collapse" data-bs-target="#diposit" aria-expanded="{{ ($currentRoute == 'diposit' ) ? 'true' : 'false' }}" aria-controls="diposit">
            <i class="bi bi-collection"></i>
            <span>Diposit</span>
        </a>

        <ul id="diposit" class="accordion-collapse collapse {{ ($currentRoute == 'diposit') ? 'show' : '' }}" aria-labelledby="headingdiposit" data-bs-parent="#asideAccordion">
            <li><a href="{{ route('diposit.index') }}" class="nav-link {{ ($currentRouteName == 'diposit.index') ? 'active' : '' }}">All Records</a></li>
            <li><a href="{{ route('diposit.create') }}" class="nav-link {{ ($currentRouteName == 'diposit.create') ? 'active' : '' }}">New Entry</a></li>
        </ul>
    </li> --}}
    {{-- project end --}}

    {{-- <li class="accordion-item">
        <a href="#" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#element" aria-expanded="false" aria-controls="element">
            <i class="bi bi-columns-gap"></i>
            <span>Element</span>
        </a>

        <ul id="element" class="accordion-collapse collapse" aria-labelledby="headingElement" data-bs-parent="#asideAccordion">
            <li><a href="" class="nav-link">All Records</a></li>
            <li><a href="" class="nav-link">New Entry</a></li>
        </ul>
    </li>

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