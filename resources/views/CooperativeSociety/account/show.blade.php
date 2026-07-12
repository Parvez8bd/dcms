<x-app-layout>
    <x-slot name="title">Account</x-slot>

    <div class="container">
        <!-- container menu -->
        @include('CooperativeSociety.account.menu')
        <!-- container menu end -->

        <!-- print header -->
        @include('layouts.partials.print-head')
        <!-- print header end -->

        <div class="container">
            <div class="border-0 card">
                <div class="mt-4 mb-3 p-0 border-0 card-header d-flex">
                    <!-- page title -->
                    <div class="mt-3">
                        <h4 class="main-title">Account details</h4>
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
                                <dt class="col-sm-5" >Account holder:</dt>
                                <dd class="col-sm-7 fst-italic font-weight-bold {{($account->is_active == '1') ? 'text-success' : 'text-danger'}}"><strong>{{ $account->contact->owner_name?? '' ??''}}</strong></dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-5" >Organigation:</dt>
                                <dd class="col-sm-7 fst-italic text-muted">{{ $account->contact->organigation_name ?? ''}}</dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-5">Nomine:</dt>
                                <dd class="col-sm-7 fst-italic text-muted">{{ $account->nomine->owner_name ?? ''}}</dd>
                            </dl>
                            
                            <dl class="row">
                                <dt class="col-sm-5" >Account type:</dt>
                                <dd class="col-sm-7 fst-italic text-muted">{{ $account->category->title }}</dd>
                            </dl>
                            
                            <dl class="row">
                                <dt class="col-sm-5" >Description:</dt>
                                <dd class="col-sm-7 fst-italic text-muted">{{ $account->note }}</dd>
                            </dl>
                        </div>
                        <div class="col-sm-4">
                            <dl class="row">
                                <dt class="col-sm-5" >Amount:</dt>
                                <dd class="col-sm-7 fst-italic text-muted">{{ $account->amount}} BDT</dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-5" >Opening date:</dt>
                                <dd class="col-sm-7 fst-italic text-muted">{{ $account->opening_date}}</dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-5" >Interest:</dt>
                                <dd class="col-sm-7 fst-italic text-muted">{{ $account->interest}} %</dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-5" >Diposite type:</dt>
                                <dd class="col-sm-7 fst-italic text-muted">{{ $account->sub_category->title }}</dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-5" >duration:</dt>
                                <dd class="col-sm-7 fst-italic text-muted">{{ $account->duration}} Month</dd>
                            </dl>
                            {{-- <dl class="row">
                                <dt class="col-sm-5" >Withdraw policy:</dt>
                                <dd class="col-sm-7 fst-italic text-muted">{{ $account->withdraw_policy}} Month</dd>
                            </dl> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>