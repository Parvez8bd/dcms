<x-app-layout>
    <x-slot name="title">Sample Collection</x-slot>

    <div class="container">
        <!-- container menu -->
        @include('sampleCollection.menu')
        <!-- container menu end -->

        <!-- print header -->
        {{-- @include('layouts.partials.print-head') --}}
        <!-- print header end -->

        <div class="container">
            <div class="border-0 card">
                <div class="mt-4 mb-3 p-0 border-0 card-header d-flex">
                    <!-- page title -->
                    <div class="mt-3 print-none">
                        <h4 class="main-title">Sample Collection Barcode</h4>
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
                
            </div>
            <div class="row">
                @foreach ($reports as $report)
                @php
                    echo DNS1D::getBarcodeSVG($report->invoice->invoice_no, 'C39',1,33); 
                @endphp
                <br>
                <br>
                @endforeach
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