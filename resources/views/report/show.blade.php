<x-app-layout>
    <x-slot name="title">Report</x-slot>

    <div class="container">
        <!-- container menu -->
        @include('report.menu')
        <!-- container menu end -->

        <!-- print header -->
        @include('layouts.partials.print-head')
        <!-- print header end -->

        <div class="container">
            <div class="mb-5 border-0 card">
                <div class="p-0 mb-3 border-0 card-header d-flex ">
                    <!-- page title -->
                    <div class="mt-3 print-none">
                        <h4 class="main-title">Report details</h4>
                        <p><small>All the details below.</small></p>
                    </div>

                    @if (Route::currentRouteName() == 'report.show')
                       <!-- header icon -->
                    <a href="{{ route('report.index') }}" title="Go back"
                    class="mt-3 mb-2 pe-0 ms-auto print-none top-icon-button">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                    @else
                        <!-- header icon -->
                    <a href="{{ route('lab-report.create') }}" title="Go back"
                    class="mt-3 mb-2 pe-0 ms-auto print-none top-icon-button">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                    @endif

                    <!-- Print -->
                    <a href="#" class="mt-3 mb-2 btn top-icon-button print-none " title="Print" onclick="window.print()">
                        <i class="bi bi-printer"></i>
                    </a>
                </div>

                <div class="p-0 card-body ">
                    <div class="mt-2  d-flex justify-content-between border-bottom">
                        <div class="text-start">
                            <h6 class="mb-2"><b>Patient name: </b><span class="fst-italic text-muted">{{ $report->invoice->patient->name }}</span></h6>
                            <h6 class="mb-2"><b>Address: </b><span class="fst-italic text-muted">{{ $report->invoice->patient->address }}</span></h6>
                            <h6 class="mb-2"><b>Refferr Doctor: </b><span class="fst-italic text-muted">{{ $report->invoice->patient->patient_refferr->doctor->owner_name ?? '' }}</span></h6>
                        </div>
                        <div class="">
                            {{-- <h6 class="mb-2">--</h6> --}}
                            <h6 class="mb-2"><b>Phone: </b><span class="fst-italic text-muted">{{ $report->invoice->patient->phone }} </span></h6>
                            <h6 class="mb-2"><b>Age: </b><span class="fst-italic text-muted">{{ $report->invoice->patient->age_year > 0? $report->invoice->patient->age_year. ' Years': ''}}  {{ $report->invoice->patient->age_month > 0? $report->invoice->patient->age_month. ' Months': ''}}  {{ $report->invoice->patient->age_day > 0? $report->invoice->patient->age_day. ' Days': ''}}</span></h6>
                            <h6 class="mb-2"><b>Gender: </b><span class="fst-italic text-muted">{{$report->invoice->patient->gender}}</span></h6>
                        </div>
                        <div class="text-end">
                            {{-- <h6 class="mb-2">Invoice no: <span class="fst-italic text-muted">{{$report->invoice->invoice_no}}</span></h6> --}}
                            <h6 class="mb-2 print-show" >
                                @php
                                    echo DNS1D::getBarcodeSVG($report->invoice->invoice_no, 'C39',1,33); 
                                // echo  '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG('4', 'C39+',3,33,array(1,1,1), true) . '" alt="barcode"   />';
                                @endphp
                                </h6>
                                <h6 class="mb-2 print-none"><b>Invoice no: </b><span class="fst-italic text-muted">{{ $report->invoice->invoice_no ?? ''}}</span></h6>
                            <h6 class="mb-2"><b>Bill Date: </b><span class="fst-italic text-muted">{{$report->created_at->format('d/m/Y g:i A')}}</span></h6>
                            <h6 class="mb-2"><b>Report Date: </b><span class="fst-italic text-muted">{{$report->updated_at->format('d/m/Y g:i A')}}</span></h6>
                            
                            
                                
                            
                        </div>
                    </div>

                    <div class="row mt-1">
                        <div class="col-12 mb-5 text-center print-show">
                            <h4 class="slip main-title">{{ $report?->test?->title }} Report</h4>
                        </div>
                        
                    </div>
                    <div >
                        {!! $report->report !!}
                    </div>

                    <!-- data table end -->
                    <div class="d-flex mt-5 justify-content-between pt-5 ">
                        <p class="border-top px-2 ms-5 print-show">Reporting Doctor</p>
                        {{-- <p class="border-top px-2 me-5 print-show">Receiver's signature</p> --}}
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

    @push('script')
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
    <script>
        $('textarea').ckeditor();
        // $('.textarea').ckeditor(); // if class is prefered.
    </script>

    @endpush
</x-app-layout>
