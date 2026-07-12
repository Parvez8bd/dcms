<x-app-layout>
    <x-slot name="title">Investment</x-slot>

    <div class="container">
        <!-- container menu -->
        @include('investment.menu')
        <!-- container menu end -->

        <!-- print header -->
        @include('layouts.partials.print-head')
        <!-- print header end -->

        <div class="container">
            <div class="border-0 card">
                <div class="mt-4 mb-3 p-0 border-0 card-header d-flex">
                    <!-- page title -->
                    <div class="mt-3">
                        <h4 class="main-title">Investment details</h4>
                        <p><small>All the details below.</small></p>
                    </div>

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
                        <div class="col-sm-4">
                            <dl class="row">
                                <dt class="col-sm-5" >Investor:</dt>
                                <dd class="col-sm-7 fst-italic font-weight-bold "><strong>{{ $investment->contact->owner_name??''}}</strong></dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-5" >Organigation:</dt>
                                <dd class="col-sm-7 fst-italic text-muted">{{ $investment->contact->organigation_name??'' }}</dd>
                            </dl>
                            {{-- <dl class="row">
                                <dt class="col-sm-5">Nominee:</dt>
                                <dd class="col-sm-7 fst-italic text-muted">{{ $investment->nominee->owner_name }}</dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-5" >Project:</dt>
                                <dd class="col-sm-7 fst-italic text-muted">{{ $investment->project->title }}</dd>
                            </dl> --}}
                            {{-- <dl class="row">
                                <dt class="col-sm-5" >Investment policy:</dt>
                                <dd class="col-sm-7 fst-italic text-muted">{{ $investment->investment_policy }}</dd>
                            </dl> --}}
                            
                            <dl class="row">
                                <dt class="col-sm-5" >Description:</dt>
                                <dd class="col-sm-7 fst-italic text-muted">{{ $investment->note }}</dd>
                            </dl>
                        </div>
                        <div class="col-sm-4">
                            <dl class="row">
                                <dt class="col-sm-5" >Amount:</dt>
                                <dd class="col-sm-7 fst-italic text-muted">{{ $investment->amount}} BDT</dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-5" >Investment date:</dt>
                                <dd class="col-sm-7 fst-italic text-muted">{{ $investment->investment_date}}</dd>
                            </dl>
                            {{-- <dl class="row">
                                <dt class="col-sm-5" >Interest:</dt>
                                <dd class="col-sm-7 fst-italic text-muted">{{ $investment->interest}} %</dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-5" >duration:</dt>
                                <dd class="col-sm-7 fst-italic text-muted">{{ $investment->duration}} Month</dd>
                            </dl> --}}
                            {{-- <dl class="row">
                                <dt class="col-sm-5" >Withdraw policy:</dt>
                                <dd class="col-sm-7 fst-italic text-muted">{{ $investment->withdraw_policy}} Month</dd>
                            </dl> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>