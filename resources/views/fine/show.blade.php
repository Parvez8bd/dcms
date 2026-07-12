<x-app-layout>
    <x-slot name="title">Installment</x-slot>

    <div class="container">
        <!-- container menu -->
        @include('installment.menu')
        <!-- container menu end -->

        <!-- print header -->
        @include('layouts.partials.print-head')
        <!-- print header end -->

        <div class="container">
            <div class="border-0 card">
                <div class="mt-4 mb-3 p-0 border-0 card-header d-flex">
                    <!-- page title -->
                    <div class="mt-3 print-none">
                        <h4 class="main-title">installment details</h4>
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
                
                <div class="p-0 card-body print-none">
                    <div class="row">
                        <div class="col-sm-4">
                            <dl class="row">
                                <dt class="col-sm-5" >Customer:</dt>
                                <dd class="col-sm-7 fst-italic font-weight-bold "><strong>{{ $installment->sale->contact->owner_name?? ''}}</strong></dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-5" >Contact:</dt>
                                <dd class="col-sm-7 fst-italic text-muted">{{ $installment->sale->contact->communications->where('contact_number_type','Phone')->first()->contact }}</dd>
                            </dl>
                            {{-- <dl class="row">
                                <dt class="col-sm-5">Nominee:</dt>
                                <dd class="col-sm-7 fst-italic text-muted">{{ $installment->nominee->owner_name }}</dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-5" >Project:</dt>
                                <dd class="col-sm-7 fst-italic text-muted">{{ $installment->project->title }}</dd>
                            </dl> --}}
                            {{-- <dl class="row">
                                <dt class="col-sm-5" >installment policy:</dt>
                                <dd class="col-sm-7 fst-italic text-muted">{{ $installment->investment_policy }}</dd>
                            </dl> --}}
                            
                            <dl class="row">
                                <dt class="col-sm-5" >Description:</dt>
                                <dd class="col-sm-7 fst-italic text-muted">{{ $installment->note }}</dd>
                            </dl>
                        </div>
                        <div class="col-sm-4 ">
                            <dl class="row ">
                                <dt class="col-sm-5 " >Installment no:</dt>
                                <dd class="col-sm-7 fst-italic text-muted">{{ $installment->serial}} </dd>
                            </dl>
                            
                            <dl class="row">
                                <dt class="col-sm-5" >Installment date:</dt>
                                <dd class="col-sm-7 fst-italic text-muted">{{ $installment->updated_at->format("j M, Y")}}</dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-5" >Amount:</dt>
                                <dd class="col-sm-7 fst-italic text-muted">BDT {{ $installment->amount}} </dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-5" >Fine:</dt>
                                <dd class="col-sm-7 fst-italic text-muted">BDT {{ $installment->fine}} </dd>
                            </dl>
                            {{-- <dl class="row">
                                <dt class="col-sm-5" >Withdraw policy:</dt>
                                <dd class="col-sm-7 fst-italic text-muted">{{ $installment->withdraw_policy}} Month</dd>
                            </dl> --}}
                        </div>
                    </div>
                </div>
                <div class="p-0 card-body ">
                    <div class="row gy-4 print-show">
                        <div class="row mb-5 mt-2">
                            <div class="col-12 text-center print-show">
                                <h4 class="slip main-title">Installment Slip</h4>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-6">
                                <div class="row ">
                                    <div class="col-5">
                                        <div class="label">Customer:</div>
                                    </div>
                                    <div class="col-7">
                                        <div class="answer">{{ $installment->sale->contact->owner_name?? ''}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row ">
                                    <div class="col-5">
                                        <div class="label">Installment no:</div>
                                    </div>
                                    <div class="col-7">
                                        <div class="answer">{{ $installment->serial}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row ">
                            <div class="col-6">
                                <div class="row ">
                                    <div class="col-5">
                                        <div class="label">Contact:</div>
                                    </div>
                                    <div class="col-7">
                                        <div class="answer">{{ $installment->sale->contact->communications->where('contact_number_type','Phone')->first()->contact }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row ">
                                    <div class="col-5">
                                        <div class="label">Installment date:</div>
                                    </div>
                                    <div class="col-7">
                                        <div class="answer">{{ $installment->updated_at->format("j M, Y")}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row ">
                            <div class="col-6">
                                <div class="row ">
                                    <div class="col-5">
                                        <div class="label">Amount (BDT):</div>
                                    </div>
                                    <div class="col-7">
                                        <div class="answer">{{ $installment->amount}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row ">
                                    <div class="col-5">
                                        <div class="label">Fine (BDT):</div>
                                    </div>
                                    <div class="col-7">
                                        <div class="answer">{{ $installment->fine}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><br>
                   
                    <!-- data table end -->
                    <div class="d-flex mt-5 justify-content-between pt-5 ">
                        <p class="border-top px-2 ms-5 print-show">Customer's signature</p>
                        <p class="border-top px-2 me-5 print-show">Receiver's signature</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="container">
            <div class="mb-5 border-0 card">
                <div class="p-0 mb-3 border-0 card-header d-flex">
                    <!-- page title -->
                    <div class="mt-3 print-none">
                        <h4 class="main-title">payment details</h4>
                        <p><small>All the details below.</small></p>
                    </div>
                    

                    <!-- header icon -->
                    <a href="{{ route('payment.index') }}" title="Go back"
                    class="mt-3 mb-2 pe-0 ms-auto print-none top-icon-button">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                    <!-- Print -->
                    <a href="#" class="mt-3 mb-2 btn top-icon-button print-none " title="Print" onclick="window.print()">
                        <i class="bi bi-printer"></i>
                    </a>
                </div>

                
            </div>
        </div> --}}
    </div>
    @push('style')
    <style>
        .slip{
            border: 1px dotted black !important;
            border-radius: 30px;
            padding: 8px;
            top: 10px;
        }
        .phone{
            position: absolute;

        }
        .date{
            position: relative;
        }

    </style>
    @endpush
    </div>
</x-app-layout>