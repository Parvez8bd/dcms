@php
    $currentRouteName = Route::currentRouteName();
    [$currentRoute] = explode('.', $currentRouteName);
@endphp

<ul class="accordion" id="asideAccordion">
    <!-- Basic -->
    <li class="ps-3 py-1 fw-bold">Basic</li>

    <li class="accordion-item">
        <a href="{{ route('accounting') }}" class="single-nav-link {{ ($currentRoute == 'accounting' ) ? 'active' : '' }}">
            <i class="bi bi-speedometer2"></i>
            <span>Dashboard</span>
        </a>
    </li>

    

    <!-- investment -->
    <li class="accordion-item">
        <a href="#" class="accordion-button {{ ($currentRoute == 'investment' ) ? '' : 'collapsed' }}" data-bs-toggle="collapse" data-bs-target="#investment" aria-expanded="{{ ($currentRoute == 'investment' ) ? 'true' : 'false' }}" aria-controls="investment">
            <i class="bi bi-cash-coin"></i>
            <span>Investment </span>
        </a>

        <ul id="investment" class="accordion-collapse collapse {{ ($currentRoute == 'investment') ? 'show' : '' }}" aria-labelledby="headingInvestment" data-bs-parent="#asideAccordion">
            <li><a href="{{ route('investment.index') }}" class="nav-link {{ ($currentRouteName == 'investment.index') ? 'active' : '' }}">All Investment</a></li>
            <li><a href="{{ route('investment.create') }}" class="nav-link {{ ($currentRouteName == 'investment.create') ? 'active' : '' }}">New Investment</a></li>
        </ul>
    </li>
    <!-- investment end -->

    <!-- Withdraw -->
    <li class="accordion-item">
        <a href="#" class="accordion-button {{ ($currentRoute == 'withdraw' ) ? '' : 'collapsed' }}" data-bs-toggle="collapse" data-bs-target="#withdraw" aria-expanded="{{ ($currentRoute == 'withdraw' ) ? 'true' : 'false' }}" aria-controls="withdraw">
            <i class="bi bi-wallet"></i>
            <span>Withdraw </span>
        </a>

        <ul id="withdraw" class="accordion-collapse collapse {{ ($currentRoute == 'withdraw') ? 'show' : '' }}" aria-labelledby="headingwithdraw" data-bs-parent="#asideAccordion">
            <li><a href="{{ route('withdraw.index') }}" class="nav-link {{ ($currentRouteName == 'withdraw.index') ? 'active' : '' }}">All Withdraw</a></li>
            <li><a href="{{ route('withdraw.create') }}" class="nav-link {{ ($currentRouteName == 'withdraw.create') ? 'active' : '' }}">New Withdraw</a></li>
        </ul>
    </li>
    <!-- Withdraw end -->
    <!-- Commission -->
    <li class="accordion-item">
        <a href="#" class="accordion-button {{ ($currentRoute == 'commission' ) ? '' : 'collapsed' }}" data-bs-toggle="collapse" data-bs-target="#commission" aria-expanded="{{ ($currentRoute == 'commission' ) ? 'true' : 'false' }}" aria-controls="commission">
            <i class="bi bi-graph-up-arrow"></i>
            <span>Commission</span>
        </a>

        <ul id="commission" class="accordion-collapse collapse {{ ($currentRoute == 'commission') ? 'show' : '' }}" aria-labelledby="headingcommission" data-bs-parent="#asideAccordion">
            <li><a href="{{ route('commission.index') }}" class="nav-link {{ ($currentRouteName == 'commission.index') ? 'active' : '' }}">All Distribution</a></li>
            <li><a href="{{ route('commission.create') }}" class="nav-link {{ ($currentRouteName == 'commission.create') ? 'active' : '' }}">New Distribution</a></li>
        </ul>
    </li>
    <!-- Commission end -->

    <!--  Monthly income -->
    <li class="accordion-item">
        <a href="#" class="accordion-button {{ ($currentRoute == 'income' ) ? '' : 'collapsed' }}" data-bs-toggle="collapse" data-bs-target="#income" aria-expanded="{{ ($currentRoute == 'income' ) ? 'true' : 'false' }}" aria-controls="income">
            
            <i class="bi bi-coin"></i>
            <span>Others Income </span>
        </a>

        <ul id="income" class="accordion-collapse collapse {{ ($currentRoute == 'income') ? 'show' : '' }}" aria-labelledby="headingInvestment" data-bs-parent="#asideAccordion">
            <li><a href="{{ route('income.index') }}" class="nav-link {{ ($currentRouteName == 'income.index') ? 'active' : '' }}">All Income</a></li>
            <li><a href="{{ route('income.create') }}" class="nav-link {{ ($currentRouteName == 'income.create') ? 'active' : '' }}">New Income</a></li>
        </ul>
    </li>
    <!--  Monthly income end -->

    <li class="ps-3 py-1 mt-2 fw-bold">Expenses</li>

     <!-- Expenses nav -->
     <li class="accordion-item">
        <a href="#"
            class="accordion-button {{ ($currentRoute == 'expense' || $currentRoute == 'expense-category' || $currentRoute ==  'expense-subcategory') ? '' : 'collapsed' }}"
            data-bs-toggle="collapse"
            data-bs-target="#expense"
            aria-expanded="{{ ($currentRoute == 'expense' || $currentRoute == 'expense-category' || $currentRoute == 'expense-subcategory') ? 'true' : 'false' }}"
            aria-controls="expense">
            <i class="bi bi-wallet2"></i>
            <span>Expenses</span>
        </a>

        <ul id="expense"
            class="accordion-collapse collapse {{ ($currentRoute == 'expense') ? 'show' : '' }}"
            aria-labelledby="headingJournal"
            data-bs-parent="#asideAccordion">
            <li>
                <a href="{{ route('expense.index') }}" class="nav-link {{ ($currentRouteName == 'expense.index') ? 'active' : '' }}">
                    All Expenses
                </a>
            </li>

            <li>
                <a href="{{ route('expense.create') }}" class="nav-link {{ ($currentRouteName == 'expense.create') ? 'active' : '' }}">
                   New Expenses
                </a>
            </li>
            
        </ul>
    </li>
    <!-- Expenses nav end -->

    <!-- Category start -->
    <li class="accordion-item">
        <a href="#" class="accordion-button {{ ($currentRoute == 'expense-category' ) ? '' : 'collapsed' }}" data-bs-toggle="collapse" data-bs-target="#category" aria-expanded="{{ ($currentRoute == 'expense-category' ) ? 'true' : 'false' }}" aria-controls="category">
            <i class="bi bi-bookmark-plus"></i>
            <span>Category </span>
        </a>

        <ul id="category" class="accordion-collapse collapse {{ ($currentRoute == 'expense-category') ? 'show' : '' }}" aria-labelledby="headingInvestment" data-bs-parent="#asideAccordion">
            <li><a href="{{ route('expense-category.index') }}" class="nav-link {{ ($currentRouteName == 'expense-category.index') ? 'active' : '' }}">All Category</a></li>
            <li><a href="{{ route('expense-category.create') }}" class="nav-link {{ ($currentRouteName == 'expense-category.create') ? 'active' : '' }}">New Category</a></li>
        </ul>
    </li>
    <!-- Category end -->

    <!-- Category start -->
    <li class="accordion-item">
        <a href="#" class="accordion-button {{ ($currentRoute == 'expense-subcategory' ) ? '' : 'collapsed' }}" data-bs-toggle="collapse" data-bs-target="#subcategory" aria-expanded="{{ ($currentRoute == 'expense-subcategory' ) ? 'true' : 'false' }}" aria-controls="subcategory">
            <i class="bi bi-columns-gap"></i>
            <span>Sub Category </span>
        </a>

        <ul id="subcategory" class="accordion-collapse collapse {{ ($currentRoute == 'expense-subcategory') ? 'show' : '' }}" aria-labelledby="headingInvestment" data-bs-parent="#asideAccordion">
            <li><a href="{{ route('expense-subcategory.index') }}" class="nav-link {{ ($currentRouteName == 'expense-subcategory.index') ? 'active' : '' }}">All Subcategory</a></li>
            <li><a href="{{ route('expense-subcategory.create') }}" class="nav-link {{ ($currentRouteName == 'expense-subcategory.create') ? 'active' : '' }}">New Subcategory</a></li>
        </ul>
    </li>
    <!-- Category end -->

    
</ul>