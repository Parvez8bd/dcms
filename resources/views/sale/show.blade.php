<x-app-layout>
    <x-slot name="title">Sale</x-slot>

    <div class="container">
        <!-- container menu -->
        @include('sale.menu')
        <!-- container menu end -->

        <!-- print header -->
        @include('layouts.partials.print-head')
        <!-- print header end -->

        <div class="container">
            <div class="border-0 card">
                <div class="mt-4 mb-3 p-0 border-0 card-header d-flex">
                    <!-- page title -->
                    <div class="mt-3 print-none">
                        <h4 class="main-title">Sale details</h4>
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
                @php
                    $purchese_price = $sale->purchese_price;
                    $down_payment = $sale->down_payment;
                    $sale_profit = $purchese_price *($sale->sale_profit/100);
                    $sale_price =  $purchese_price + $sale_profit;
                    $installment_quantity = $sale->installment_quantity;
                    $net_amount= $sale_price - $down_payment;
                    $per_installment = $net_amount/$installment_quantity ;
                    
                @endphp
                
                <div class="p-0 card-body print-none">
                    <div class="row">
                        <div class="col-sm-4">
                            <dl class="row">
                                <dt class="col-sm-5" >Customer:</dt>
                                <dd class="col-sm-7 fst-italic font-weight-bold "><strong>{{ $sale->contact->owner_name?? ''}}</strong></dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-5" >Contact:</dt>
                                <dd class="col-sm-7 fst-italic text-muted">{{ $sale->contact->communications->where('contact_number_type','Mobile')->first()->contact??'' }} {{ $sale->contact->communications->where('contact_number_type','Phone')->first()->contact??'' }}</dd>
                            </dl>
                            @if ($sale->witness->pluck('name')->first() !=Null)
                            <dl  class="row">
                                <dt class="">Witnes:</dt>
                                @foreach ($sale->witness as $witness)
                                <dd class="ms-5 fst-italic ">Name: <span class="text-muted">{{ $witness->name }}</span></dd>
                                <dd class="ms-5 fst-italic ">Phone: <span class="text-muted">{{ $witness->phone }}</dd>
                                <dd class="ms-5 fst-italic ">NID: <span class="text-muted">{{ $witness->nid }}</dd>
                                @endforeach
                                
                            </dl>
                            @endif
                            {{--<dl class="row">
                                <dt class="col-sm-5" >Project:</dt>
                                <dd class="col-sm-7 fst-italic text-muted">{{ $sale->project->title }}</dd>
                            </dl> --}}
                            {{-- <dl class="row">
                                <dt class="col-sm-5" >installment policy:</dt>
                                <dd class="col-sm-7 fst-italic text-muted">{{ $sale->investment_policy }}</dd>
                            </dl> --}}
                            
                            <dl class="row">
                                <dt class="col-sm-5" >Description:</dt>
                                <dd class="col-sm-7 fst-italic text-muted">{{ $sale->note }}</dd>
                            </dl>
                        </div>
                        <div class="col-sm-4 ">
                            <dl class="row ">
                                <dt class="col-sm-5 " >Product:</dt>
                                <dd class="col-sm-7 fst-italic text-muted">{{ $sale->product_name}} </dd>
                            </dl>
                            
                            <dl class="row">
                                <dt class="col-sm-5" >Voucher no.:</dt>
                                {{-- <dd class="col-sm-7 fst-italic text-muted">{{ $sale->updated_at->format("j M, Y")}}</dd> --}}
                                <dd class="col-sm-7 fst-italic text-muted">{{ $sale->voucher}}</dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-5" >Purchese Date:</dt>
                                <dd class="col-sm-7 fst-italic text-muted">BDT {{ $sale->date->format("j M, Y")}} </dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-5" >Purchese Price:</dt>
                                <dd class="col-sm-7 fst-italic text-muted">BDT {{ $sale->purchese_price}} </dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-5" >Down Payment:</dt>
                                <dd class="col-sm-7 fst-italic text-muted">BDT {{ $sale->down_payment}} </dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-5" >Sale Profit:</dt>
                                {{-- <dd class="col-sm-7 fst-italic text-muted">{{ $sale->updated_at->format("j M, Y")}}</dd> --}}
                                <dd class="col-sm-7 fst-italic text-muted">{{ $sale->sale_profit}} % | BDT {{ $sale_profit }}</dd>
                            </dl>
                            {{-- <dl class="row">
                                <dt class="col-sm-5" >Withdraw policy:</dt>
                                <dd class="col-sm-7 fst-italic text-muted">{{ $sale->withdraw_policy}} Month</dd>
                            </dl> --}}
                        </div>
                        <div class="col-sm-4 ">
                            <dl class="row ">
                                <dt class="col-sm-5 " >Sale Price:</dt>
                                <dd class="col-sm-7 fst-italic text-muted">BDT {{ $sale_price}} </dd>
                            </dl>
                            
                            
                            <dl class="row">
                                <dt class="col-sm-5" >Installment:</dt>
                                <dd class="col-sm-7 fst-italic text-muted"> {{ $sale->installment_quantity}} ({{ config('utilities.installmentType') [$sale->installment_type] }})</dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-5" >Per Installment </dt>
                                <dd class="col-sm-7 fst-italic text-muted">BDT {{ $per_installment  }} </dd>
                            </dl>
                            <dl class="row">
                                <dt class="" >Installment Date:</dt>
                                @foreach ($sale->installments as $installment)
                                <dt class="col-sm-5" ></dt>
                                <dd class="col-sm-7 fst-italic text-muted">{{ $installment->date->format("j M, Y")}}</dd>
                                @endforeach
                                
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="p-0 card-body ">
                    <div class="row gy-4 print-show">
                        <div class="row mb-5 mt-2">
                            <div class="col-12 text-center print-show">
                                <h4 class="slip main-title">Sales receipt</h4>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-6">
                                <div class="row ">
                                    <div class="col-5">
                                        <div class="label">Customer:</div>
                                    </div>
                                    <div class="col-7">
                                        <div class="answer">{{ $sale->contact->owner_name?? ''}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row ">
                                    <div class="col-5">
                                        <div class="label">Purchese Date:</div>
                                    </div>
                                    <div class="col-7">
                                        <div class="answer">{{ $sale->date->format("j M, Y")}}</div>
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
                                        <div class="answer">{{  $sale->contact->communications->where('contact_number_type', 'Mobile')->first()->contact ?? $sale->contact->communications->where('contact_number_type', 'Phone')->first()->contact }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row ">
                                    <div class="col-5">
                                        <div class="label">Product:</div>
                                    </div>
                                    <div class="col-7">
                                        <div class="answer">{{ $sale->product_name}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row ">
                            <div class="col-6">
                                <div class="row ">
                                    <div class="col-5">
                                        <div class="label">Purchese Price:</div>
                                    </div>
                                    <div class="col-7">
                                        <div class="answer">BDT {{ $sale->purchese_price}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row ">
                                    <div class="col-5">
                                        <div class="label">Down Payment:</div>
                                    </div>
                                    <div class="col-7">
                                        <div class="answer">BDT {{ $sale->down_payment}}</div>
                                    </div>
                                </div>
                            </div>
                        </div><br>
                        <div class="row ">
                            <div class="col-6">
                                <div class="row ">
                                    <div class="col-5">
                                        <div class="label">Sale Profit:</div>
                                    </div>
                                    <div class="col-7">
                                        <div class="answer">{{ $sale->sale_profit}} %</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row ">
                                    <div class="col-5">
                                        <div class="label">Sale Price:</div>
                                    </div>
                                    <div class="col-7">
                                        <div class="answer">BDT {{ $sale_price}}</div>
                                    </div>
                                </div>
                            </div>
                        </div><br>
                        <div class="row ">
                            <div class="col-6">
                                <div class="row ">
                                    <div class="col-5">
                                        <div class="label">Installment:</div>
                                    </div>
                                    <div class="col-7">
                                        <div class="answer">{{ $sale->installment_quantity}} ({{ config('utilities.installmentType') [$sale->installment_type] }})</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row ">
                                    <div class="col-5">
                                        <div class="label">Per Installment:</div>
                                    </div>
                                    <div class="col-7">
                                        <div class="answer">BDT {{ $per_installment  }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><br>
                    
                    @if ($sale->witness->pluck('name')->first() !=Null)
                    <div class="row gy-4 print-show">
                        <div class="mb-3 ">
                            <h5>Witnes:</h5>
                            <table class="table  ">
                                <thead>
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">phone</th>
                                        <th scope="col">NID</th>
                                    </tr>
                                </thead>
        
                                <tbody>
                                    @foreach($sale->witness as   $witness)
                                        <tr>
                                            <th scope="row">{{ $loop->index + 1}}.</th>
                                            <td>{{ $witness->name}}</td>
                                            <td>{{ $witness->phone}}</td>
                                            <td>{{ $witness->nid}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endif
                    
                    <div class="row my-4 print-show">
                        <div class="mb-3 ">
                            <h5>Installment:</h5>
                            <table class="table  ">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Amount (BDT)</th>
                                    </tr>
                                </thead>
        
                                <tbody>
                                    @foreach($sale->installments as   $installment)
                                        <tr>
                                            <th scope="row">Installment {{ $loop->index + 1}}.</th>
                                            <td>{{ $installment->date}}</td>
                                            <td>{{ $installment->amount}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row my-4 print-show">
                        <p><strong>Note:</strong> Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint in quam saepe repudiandae aliquid maiores, vero inventore autem nulla hic nobis labore quod eos optio obcaecati beatae ea eius dolorum.</p>
                    </div>
                   
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