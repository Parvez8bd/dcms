<x-app-layout>
    <x-slot name="title">Withdraw</x-slot>

    <div class="container">
        <!-- container menu -->
        @include('CooperativeSociety.withdraw.menu')
        <!-- container menu end -->

        <!-- print header -->
        @include('layouts.partials.print-head')
        <!-- print header end -->

        <!-- card start -->
        <div class="border-0 card">
            <!-- card head -->
            <div class="p-0 mt-4 mb-3 border-0 card-header d-md-flex align-items-center d-block">
                <!-- page title -->
                <div>
                    <h4 class="main-title">Withdraw distribution</h4>
                    {{-- <p><small>About {{ $withdraws->total() }} results found.</small></p> --}}
                </div>

                <!-- Print -->
                <a href="#" class="btn top-icon-button print-none ms-auto" title="Print" onclick="window.print()">
                    <i class="bi bi-printer"></i>
                </a>

                <!-- refresh -->
                <a href="{{ route('diposit-withdraw.index') }}" class="btn top-icon-button print-none" title="Refresh">
                    <i class="bi bi-arrow-clockwise"></i>
                </a>

                <!-- search -->
                <a href="#investments-search"
                    class="btn top-icon-button print-none" title="Search" data-bs-toggle="collapse" role="button" aria-expanded="false">
                    <i class="bi bi-search"></i>
                </a>

                <!-- add -->
                <a href="{{ route('diposit-withdraw.create') }}" class="btn top-icon-button print-none" title="New investment">
                    <i class="bi bi-plus-circle"></i>
                </a>
            </div>
            <!-- card head end -->

            <!-- content body -->
            <div class="p-0 card-body">
                <!-- search area -->
                <div class="collapse print-none {{ request()->search ? 'show' : '' }}" id="investments-search">
                    <div class="px-0 border-0 card card-body rounded-0">
                        <!-- search form -->
                        <form action="{{ route('diposit-withdraw.index') }}" method="GET">
                            <input type="hidden" name="search" value="1">

                            <div class="row gy-1 gx-3">
                                <div class="col-12 col-sm-6 col-lg-3">
                                    <label for="investment_date_from" class="form-label">Distribution date (From)</label>
                                    <input type="date" name="investment_date_from" value="{{ request()->investment_date_from ? request()->investment_date_from : '' }}" class="form-control" id="investment_date_from" autofocus>
                                </div> 

                                <div class="col-12 col-sm-6 col-lg-3">
                                    <label for="investment_date_to" class="form-label">Distribution date (To)</label>
                                    <input type="date" name="investment_date_to" value="{{ request()->investment_date_to ? request()->investment_date_to : '' }}" class="form-control" id="investment_date_to">
                                </div>

                                <div class="col-12 col-sm-6 col-lg-3">
                                    <label for="project-title" class="form-label">Account holder</label>
                                    <input type="text" name="name" value="{{ request()->name }}" class="form-control" id="project-title" placeholder="Characters only">
                                </div>

                                <!-- button -->
                                <div class="col-12 col-sm-6 col-lg-2">
                                    <label class="form-label">&nbsp;</label>
                                    <button type="submit" class="btn btn-block w-100 custom-btn btn-success">
                                        <i class="bi bi-search"></i>
                                        <span class="p-1">Search</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- search area end -->

                <!-- data table -->
                <div class="mb-3 table-responsive">
                    <table class="table custom-table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Account</th>
                                <th scope="col">Account holder</th>
                                <th scope="col">Withdraw date</th>
                                <th scope="col" class="text-end">Withdraw amount (BDT)</th>
                                <th scope="col" class="text-end">Profit (BDT)</th>
                                {{-- <th scope="col">Status</th> --}}
                                {{-- <th scope="col">Duration</th>
                                <th scope="col">Interest</th>
                                <th scope="col">Investment policy</th> --}}
                                <th scope="col" class="print-none text-end">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($withdraws as $key => $withdraw)
                            
                                <tr>
                                    <th scope="row">{{ $withdraws->firstItem() + $key }}.</th>
                                    <td>{{ $withdraw->account->account_number}}</td>
                                    <td>{{ $withdraw->account->contact->owner_name?? '' ?? ''}}</td>
                                    <td>{{ $withdraw->withdraw_date->format("j F, Y") }}</td>
                                    <td class="text-end">{{ $withdraw->amount + $withdraw->profit}}</td>
                                    <td class="text-end">{{ $withdraw->profit}}</td>
                                    <td class="print-none text-end">

                                            <a href="{{ route('diposit-withdraw.show', $withdraw->id) }}" class="btn table-small-button" title="View" target="_blank"><i class="bi bi-eye"></i>
                                            </a>
    
                                                <a href="{{ route('diposit-withdraw.edit', $withdraw->id) }}" class="btn table-small-button text-success" title="Update"><i class="bi bi-pencil-square"></i>
                                            </a> 
    
                                            <span data-bs-toggle="tooltip" title="Trash">
                                                <a href="#" class="btn table-small-button text-danger" onclick="if(confirm('Are you sure want to delete?')) { document.getElementById('profit-distribution-delete-{{ $withdraw->id }}').submit() } return false ">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </span>
    

                                            <form action="{{ route('diposit-withdraw.destroy', $withdraw->id) }}" method="post" class="d-none" id="profit-distribution-delete-{{ $withdraw->id }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                                
                                            
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <th colspan="9">List is empty.</th>
                                </tr>
                            @endforelse
                        </tbody>

                        {{-- @if ($withdraws != null)
                        <tfoot>
                            <tr>
                                <th colspan="3" class="text-end">Total</th>
                                <th class="text-end">{{ number_format($withdraws->sum('amount'), 2) }}</th>
                                <th colspan="5">&nbsp;</th>
                            </tr>
                        </tfoot>
                        @endif --}}
                    </table>
                </div>
                <!-- data table end -->

                <!-- paginate -->
                <div class="mb-5 card-footer print-none">
                    <nav aria-label="Page navigation example" class="d-flex justify-content-end">
                        {{ optional($withdraws)->links() }}
                    </nav>
                </div>
                <!-- pagination end -->

            </div>
            <!-- content body end -->
        </div>
        <!-- card end -->
    </div>
</x-app-layout>
