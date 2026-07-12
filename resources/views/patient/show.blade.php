<x-app-layout>
    <x-slot name="title">Patient</x-slot>

    <div class="container">
        <!-- container menu -->
        @include('patient.menu')
        <!-- container menu end -->

        <!-- print header -->
        @include('layouts.partials.print-head')
        <!-- print header end -->

        <div class="container">
            <div class="mb-5 border-0 card">
                <div class="p-0 mb-3 border-0 card-header d-flex">
                    <!-- page title -->
                    <div class="mt-3 print-none">
                        <h4 class="main-title">Bill details</h4>
                        <p><small>All the details below.</small></p>
                    </div>


                    <!-- header icon -->
                    <a href="{{ route('report.index') }}" title="Go back"
                    class="mt-3 mb-2 pe-0 ms-auto print-none top-icon-button">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                    <!-- Print -->
                    <a href="#" class="mt-3 mb-2 btn top-icon-button print-none " title="Print" onclick="window.print()">
                        <i class="bi bi-printer"></i>
                    </a>
                </div>

                <div class="p-0 card-body ">

                    <div class="row mt-2">
                        <div class="col-12 mb-5 text-center print-show">
                            <h4 class="slip main-title">Bill Receipt</h4>
                        </div>
                    </div>

                    <div class="mb-2 d-flex justify-content-between">
                        <div class="text-start">
                            <h6 class="mb-2"><b>Patient name: </b><span class="fst-italic text-muted">{{ $patient->name }}</span></h6>
                            <h6 class="mb-2"><b>Address: </b><span class="fst-italic text-muted">{{ $patient->address }}</span></h6>
                            <h6 class="mb-2"><b>Refferr Doctor: </b><span class="fst-italic text-muted">{{ $patient->patient_refferr->doctor->owner_name ?? '' }}</span></h6>
                        </div>
                        <div class="">
                            {{-- <h6 class="mb-2">--</h6> --}}
                            <h6 class="mb-2"><b>Phone: </b><span class="fst-italic text-muted">{{ $patient->phone }} </span></h6>
                            <h6 class="mb-2"><b>Age: </b><span class="fst-italic text-muted">{{ $patient->age_year > 0? $patient->age_year. ' Years': ''}}  {{ $patient->age_month > 0? $patient->age_month. ' Months': ''}}  {{ $patient->age_day > 0? $patient->age_day. ' Days': ''}} </span></h6>
                            <h6 class="mb-2"><b>Gender: </b><span class="fst-italic text-muted">{{$patient->gender}}</span></h6>
                        </div>
                        <div class="text-end">
                            <h6 class="mb-2 print-show" ><b><b>Invoice: </br>
                            @php
                               echo DNS1D::getBarcodeSVG($patient->invoice->invoice_no, 'C39',1,33); 
                            // echo  '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG('4', 'C39+',3,33,array(1,1,1), true) . '" alt="barcode"   />';
                            @endphp
                            </h6>
                            <h6 class="mb-2 print-none"><b>Invoice no: </b><span class="fst-italic text-muted">{{ $patient->invoice->invoice_no ?? ''}}</span></h6>
                            <h6 class="mb-2"><b>Date: </b><span class="fst-italic text-muted">{{$patient->created_at->format('d F, Y g:i A')}}</span></h6>
                        </div>
                    </div>
                    <hr>
                    @php
                    $discount= 0;
                    $subtotal =$patient->invoice->subtotal?? 0;

                    if ($patient->invoice->discount_type?? '' == 'Percentage') {
                        $discount = $patient->invoice->discount ?? 0;
                        $discount_amount =($subtotal * $discount)/100;
                    }else {
                        $discount_amount = $patient->invoice->discount ?? 0;
                    }


                    $paid = $patient->invoice->paid ?? 0;
                    // $previous_balance = $patient->student->previous_balance;
                    // $subtotal =$subtotal + $previous_balance;
                    $total = $subtotal-$discount_amount;
                    $due = $total - $paid;


                    @endphp

                    <div class="mb-3 table-responsive">
                        {{-- <div class="text-end"><small class="fst-italic">Payment Date: {{$patient->created_at->format('d F, Y')}}</small>
                        </div> --}}
                        <table class="table custom-table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col text-center" style="width: 70%; " >Payment Item</th>
                                    <th scope="col" class="text-end">Amount (BDT)</th>
                                </tr>
                            </thead>


                            <tbody>
                                @if ($patient->invoice)
                                @forelse($patient->invoice->invoice_details ?? '' as $invoice_detail)
                                    <tr>
                                        <td scope="row">{{ $loop->iteration }}.</td>
                                        <td>{{ $invoice_detail->test->title}}</td>
                                        <td class="text-end">{{ number_format($invoice_detail->test->price) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <th colspan="3">There is no payment .</th>
                                    </tr>
                                @endforelse
                                @endif
                                {{-- @if ($patient->student->previous_balance)
                                <tr>
                                    <td scope="row">#.</td>
                                    <td>Previes Balence</td>
                                    <td class="text-end">{{  $patient->student->previous_balance }}</td>
                                </tr>
                                @endif --}}
                            </tbody>

                            <tfoot>
                                @if($discount_amount > 0)
                                <tr>
                                    <th class="text-end" colspan="2">Subtotal =</th>
                                    <th class="text-end">{{ number_format($subtotal) ?? ''}} </th>
                                </tr>
                                <tr>
                                    <th class="text-end" colspan="2">Discount =</th>
                                    <th class="text-end">{{ number_format($discount_amount) }} </th>
                                </tr>
                                @endif
                                <tr>
                                    <th class="text-end" colspan="2">Total =</th>
                                     <th class="text-end">{{ number_format($total) }} </th>
                                </tr>
                                <tr>
                                    <th class="text-end" colspan="2">Paid =</th>
                                    <th class="text-end">{{ number_format($paid) }} </th>
                                </tr>
                                <tr>
                                    <th class="text-end" colspan="2">Due =</th>
                                    <th class="text-end">{{ number_format($due) }} </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- data table end -->
                    <div class="d-flex mt-5 justify-content-between pt-5 ">
                        <p class="border-top px-2 ms-5 print-show">Customer's signature</p>
                        <p class="border-top px-2 me-5 print-show">Receiver's signature</p>
                    </div>
                </div>
            </div>
        </div>
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
</x-app-layout>
