<x-app-layout>
    <x-slot name="title">Withdraw</x-slot>

    <div class="container">
        <!-- container menu -->
        @include('CooperativeSociety.withdraw.menu')

        <!-- container menu end -->

        <!-- print header -->
        @include('layouts.partials.print-head')
        <!-- print header end -->

        <div class="container">
            <div class="border-0 card">
                <div class="mt-4 mb-3 p-0 border-0 card-header d-flex">
                    <!-- page title -->
                    <div class="mt-3">
                        <h4 class="main-title">Withdraw details</h4>
                        <p><small>All the details below.</small></p>
                    </div>

                    <!-- header icon -->
                    {{-- <a href="{{ route('diposit-withdraw.index') }}" title="Go back"
                    class="mt-3 mb-2 pe-0 ms-auto print-none top-icon-button">
                        <i class="bi bi-arrow-left"></i>
                    </a> --}}
                    <!-- header icon -->
                    <a href="javascript:window.open('','_self').close();" title="Go back"
                    class="mt-3 mb-2 pe-0 ms-auto print-none top-icon-button">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                    <!-- Print -->
                    <a href="#" class="btn top-icon-button print-none mt-3 mb-2 pe-0 " title="Print" onclick="window.print()">
                        <i class="bi bi-printer"></i>
                    </a>

                </div>
        
                <div class="p-0 card-body">
                    <div class="row">
                        <dd class="fs-3 mb-3"><strong>{{ $dipositWithdraw->account->account_number }}</strong></dd>
                        <div class="col-lg-4">
                            <dl>
                                <dt class="text-muted">Owner name</dt>
                                <dd class="fs-5 mb-3">{{ $dipositWithdraw->account->contact->owner_name?? '' }}</dd>
                                
                                <dt class="text-muted">Total diposit</dt>
                                <dd class="fs-5 mb-3"><strong>{{ number_format($dipositWithdraw->amount, 2) }}</strong></dd>
        
                                <dt class="text-muted">Description</dt>
                                <dd><p>{{ $dipositWithdraw->note }}</p></dd>
                            </dl>
                        </div>
                        <div class="col-lg-4">
                            <dl>
                                <dt class="text-muted">Withdraw date</dt>
                                <dd class="fs-5 mb-3"><strong>{{$dipositWithdraw->withdraw_date->format("j F, Y") }}</strong></dd>
        
                                <dt class="text-muted">Withdraw amount</dt>
                                <dd class="fs-5 mb-3"><strong>{{ number_format($dipositWithdraw->amount + $dipositWithdraw->profit, 2) }}</strong></dd>
        
                                <dt class="text-muted">Profit amount</dt>
                                <dd class="fs-5 mb-3"><strong>{{ number_format( $dipositWithdraw->profit, 2) }}</strong></dd>
        
                                
                            </dl>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>