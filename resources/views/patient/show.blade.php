{{-- for A5 page size --}}
<x-app-layout>
    <x-slot name="title">Patient</x-slot>

    <div class="container" style="font-family: 'Roboto', sans-serif;">
        <!-- container menu -->
        @include('patient.menu')
        <!-- container menu end -->

        <!-- print header -->
        {{-- @include('layouts.partials.print-head') --}}
        <div class=" pt-3 pb-2 mb-1 print-show">
            <table>
                <tr>
                    <td width="15%">
                        <img src="{{ asset('images/logos/citylabLogo.png') }}" alt="Hospital Letterhead" width="80">
                    </td>
                    <td class="text-center" width="85%">
                        <h3>সিটি ডায়াগনোস্টিক সেন্টার</h3>
                        <h2>CITY DIAGNOSTIC CENTER</h2>
                        <p style="font-size: 11px;">১৯৯/১, চরপাড়া (ময়মনসিংহ মেডিকেল কলেজ হাসপাতাল গেইটের বিপরীত পাশে),
                            ময়মনসিংহ।</p>
                    </td>
                </tr>
            </table>
        </div>
        <div class=" border-bottom print-show" style="font: 11px !important; ">
            <table>
                <tr>
                    <td width="33%">
                        <b style="text-transform: uppercase">Patient Copy</b>
                    </td>
                    <td class="text-center" width="33%">
                        সরকার অনুমোদিত -
                    </td>
                    <td width="34%">
                        @php
                            echo DNS1D::getBarcodeSVG($patient->invoice->invoice_no, 'C39', 1, 33);

                        @endphp
                    </td>
                </tr>
            </table>
        </div>
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
                    <a href="#" class="mt-3 mb-2 btn top-icon-button print-none " title="Print"
                        onclick="window.print()">
                        <i class="bi bi-printer"></i>
                    </a>
                </div>

                <div class="p-0 card-body main">

                    <div class="row mt-2  print-show">
                        <div class="col-12  text-center">
                            <h4 class="slip main-title">Bill Receipt</h4>

                        </div>

                    </div>

                    <div class="mb-2 printHeadd border-bottom ">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <b>Invoice no </b>
                                    </div>
                                    <div class="col-sm-8 fst-italic text-muted">
                                        : {{ $patient->invoice?->invoice_no }}
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-6  col-sm-6 text-end">
                                <div class="row">
                                    <div class="col-sm-7">
                                        <b>Date </b>
                                    </div>
                                    <div class="col-sm-5 fst-italic text-muted text-start">
                                        : {{ $patient->created_at->format('d F, Y') }}
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <b> Name </b>
                                    </div>
                                    <div class="col-sm-8 fst-italic text-muted">
                                        : {{ $patient->name }}
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-6  col-sm-6 text-end">
                                <div class="row">
                                    <div class="col-sm-7 ">
                                        <b>Time</b>
                                    </div>
                                    <div class="col-sm-5 fst-italic text-muted text-start">
                                        : {{ $patient->created_at->format('g:i A') }}
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <b>Phone </b>
                                    </div>
                                    <div class="col-sm-8 fst-italic text-muted">
                                        : {{ $patient->phone }}
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-6  col-sm-6 text-end">
                                <div class="row">
                                    <div class="col-sm-7 ">
                                        <b>Gender</b>
                                    </div>
                                    <div class="col-sm-5 fst-italic text-muted text-start">
                                        : {{ $patient->gender }}
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <b>Address </b>
                                    </div>
                                    <div class="col-sm-8 fst-italic text-muted">
                                        : {{ $patient->address }}
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-6  col-sm-6 text-end">
                                <div class="row">
                                    <div class="col-sm-7 ">
                                        <b>Age</b>
                                    </div>
                                    <div class="col-sm-5 fst-italic text-muted text-start">
                                        : {{ $patient->age_year > 0 ? $patient->age_year . ' Years' : '' }}
                                        {{ $patient->age_month > 0 ? $patient->age_month . ' Months' : '' }}
                                        {{ $patient->age_day > 0 ? $patient->age_day . ' Days' : '' }}
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">

                            <div class="col-sm-2">
                                <b>Ref. Doctor </b>
                            </div>
                            <div class="col-sm-10 fst-italic text-muted">
                                : {{ $patient->patient_refferr?->doctor->owner_name ?? '' }}
                            </div>


                        </div>


                    </div>

                    @php
                        $discount = 0;
                        $subtotal = $patient->invoice->subtotal ?? 0;

                        if ($patient->invoice->discount_type ?? '' == 'Percentage') {
                            $discount = $patient->invoice->discount ?? 0;
                            $discount_amount = ($subtotal * $discount) / 100;
                        } else {
                            $discount_amount = $patient->invoice->discount ?? 0;
                        }

                        $paid = $patient->invoice->paid ?? 0;

                        $total = $subtotal - $discount_amount;
                        $due = $total - $paid;

                    @endphp

                    <div class=" table-responsive">

                        <table class="table  table-light table-sm table-bordered custom-table">
                            <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Group</th>
                                    <th scope="col text-center" style="width: 50%; ">Test Item</th>
                                    <th scope="col" class="text-end">Amount (BDT)</th>
                                    <th scope="col" class="text-end">Room No.</th>
                                </tr>
                            </thead>


                            <tbody>
                                @if ($patient->invoice)
                                    @forelse($patient->invoice->invoice_details ?? '' as $invoice_detail)
                                        <tr>
                                            <td scope="row">{{ $loop->iteration }}.</td>
                                            <td>{{ $invoice_detail?->test?->test_group?->title }}</td>
                                            <td>{{ $invoice_detail?->test?->title }}</td>
                                            <td class="text-end">
                                                {{ number_format($invoice_detail?->test?->price) }}</td>
                                            <td>
                                                {{ $invoice_detail?->room ?? '' }}
                                            </td>

                                        </tr>
                                    @empty
                                        <tr>
                                            <th colspan="3">There is no payment .</th>
                                        </tr>
                                    @endforelse
                                @endif

                            </tbody>

                        </table>
                    </div>
                    <div class=" mt-3">
                        <table class="table  table-sm table-bordered ">
                            <tbody>
                                <tr>
                                    <td width="50%">
                                        <h1 class="text-center mt-3 paid">{{ $due >0 ? 'Due' : 'Paid' }}</h1>
                                    </td>
                                    <td width="50%">

                                        @if ($discount_amount > 0)
                                            <div class="row">
                                                <div class="col-sm-6 text-end" colspan="2">Subtotal =</div>
                                                <div class="col-sm-6 text-end">{{ number_format($subtotal) ?? '' }}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 text-end" colspan="2">Discount =</div>
                                                <div class="col-sm-6 text-end">{{ number_format($discount_amount) }}
                                                </div>
                                            </div>
                                        @endif
                                        <div class="row">
                                            <div class="col-sm-6 text-end" colspan="2">Total =</div>
                                            <div class="col-sm-6 text-end">{{ number_format($total) }} </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 text-end" colspan="2">Paid =</div>
                                            <div class="col-sm-6 text-end">{{ number_format($paid) }} </div>
                                        </div>
                                        @if ($due > 0)
                                            <div class="row">
                                                <div class="col-sm-6 text-end" colspan="2">Due =</div>
                                                <div class="col-sm-6 text-end">{{ number_format($due) }} </div>
                                            </div>
                                        @endif

                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    @php
                        $formatter = new \NumberFormatter('en', \NumberFormatter::SPELLOUT);
                    @endphp
                    <div class=" text-end">
                        In words:
                        <span class="fst-italic text-muted">
                            {{ ucwords($formatter->format($paid)) }} Taka Only
                        </span>
                    </div>
                    <div class="mt-3 text-center">
                        <span class="fst-italic text-muted">* এই কপি শুধুমাত্র রিপোর্ট গ্রহণের জন্য *</span>
                    </div>

                    @php
                        $longTestTime = $patient->invoice->invoice_details->max(
                            fn($detail) => $detail->test?->report_time ?? 0,
                        );
                        $longTestTime = $longTestTime > 0 ? $longTestTime : 3;
                        $reportDelivery = $patient->created_at->copy()->addHours($longTestTime)->format('d F, Y g:i A');
                    @endphp
                    @if ($longTestTime > 0)
                        <div>
                            <b>Report Delevery: </b><span class="fst-italic text-muted">{{ $reportDelivery }}</span>
                        </div>
                    @endif

                    <!-- Receiver Signature -->
                    <div class="print-signature print-show">
                        <p class="mb-0">{{ Auth::user()->name }}</p>
                        <p class="border-top d-inline-block px-3 mb-0">
                            Receiver's Signature
                        </p>
                    </div>

                    <!-- Bottom Footer -->
                    <div class="print-bottom-footer print-show">
                        <div class="d-flex justify-content-between">
                            <span>© {{ date('Y') }} City Diagnostic Center</span>
                            <span>Powered by: A4bnt IT</span>
                            <span>Print at: {{ now()->format('d F, Y g:i A') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('style')
        <style>
            .slip {
                border: 1px dotted black !important;
                border-radius: 30px;
                padding: 8px;
                top: 10px;
            }

            .phone {
                position: absolute;

            }

            .date {
                position: relative;
            }

            .printHead {
                border: .5px solid black !important;
                border-radius: 6px !important;
                margin-top: 5px;
                padding: 5px
            }

            .custom-table thead th {
                background-color: #d9d9d9 !important;
                color: #000 !important;
            }


            @media print {

                @page {
                    size: A5 portrait;
                    /* অথবা landscape */
                    margin: none;

                }

                .print-header {
                    width: 100%;
                    /* margin-bottom: 10px; */
                    /* border-bottom: 1px solid #000; */
                    /* padding-bottom: 5px; */
                }

                .print-header img {
                    width: 100%;
                    height: auto;
                    display: block;
                }

                .main,
                .main * {
                    font-size: 11px !important;
                    line-height: 1.2 !important;
                }

                /* Receiver Signature */
                .print-signature {
                    position: fixed;
                    right: 10mm;
                    bottom: 15mm;
                    text-align: center;
                    width: 180px;
                }

                /* Footer */
                .print-bottom-footer {
                    position: fixed;
                    left: 0;
                    right: 0;
                    bottom: 3mm;
                    padding: 0 3mm;
                    border-top: 1px solid #000;
                    font-size: 9px;
                }

                .custom-table thead th {
                    background-color: #d9d9d9 !important;
                    color: #000 !important;
                }

                .paid {

                    text-transform: uppercase;
                    text-weight: 800 !important;
                    font-size: 32px !important;
                }


            }
        </style>
    @endpush
</x-app-layout>


{{-- for A5 page size --}}
