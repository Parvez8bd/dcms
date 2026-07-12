<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>

    <style>
        .card{
            margin-top: 100px;

        }
        .row{
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>
    <div class="mb-5 border-0 card">
        <div class="pb-2 print-show border-bottom">
            <div class="row">
                <div class="col-9">
                    <h1>Life Care Diagnostic Center</h1>
                    <h6>5B Green House, 27/2 Ram Babu Road, Mymensingh, Bangladesh</h6>
                    <p><strong>Phone: </strong> +880 1755 532898 , +880 1755 532897</p>
                    <p><strong>Email: </strong> info@almakgroup.com</p>
                    <p><strong>Website: </strong>www.almakgroup.com</p>
                </div>
        
                <div class="date">
                    <p class="">{{ date('d F Y') }}</p>
                </div>
            </div>
        </div>
        

        <div class="p-0 card-body ">
            <div class="mt-2  d-flex justify-content-between border-bottom">
                <div class="text-start">
                    <h6 class="mb-2">Patient name: <span class="fst-italic text-muted">{{ $report->invoice->patient->name }}</span></h6>
                    <h6 class="mb-2">Address: <span class="fst-italic text-muted">{{ $report->invoice->patient->address }}</span></h6>
                    <h6 class="mb-2">Refferr Doctor: <span class="fst-italic text-muted">{{ $report->invoice->patient->patient_refferr->doctor->owner_name }}</span></h6>
                </div>
                <div class="">
                    {{-- <h6 class="mb-2">--</h6> --}}
                    <h6 class="mb-2">Phone: <span class="fst-italic text-muted">{{ $report->invoice->patient->phone }} </span></h6>
                    <h6 class="mb-2">Age: <span class="fst-italic text-muted">{{ $report->invoice->patient->age }} {{ $report->invoice->patient->age_type }}</span></h6>
                    <h6 class="mb-2">Gender: <span class="fst-italic text-muted">{{$report->invoice->patient->gender}}</span></h6>
                </div>
                <div class="text-end">
                    <h6 class="mb-2">Invoice no: <span class="fst-italic text-muted">{{$report->invoice->invoice_no}}</span></h6>
                    <h6 class="mb-2">Bill Date: <span class="fst-italic text-muted">{{$report->created_at->format('d/m/Y g:i A')}}</span></h6>
                    <h6 class="mb-2">Report Date: <span class="fst-italic text-muted">{{$report->updated_at->format('d/m/Y g:i A')}}</span></h6>
                    
                </div>
            </div>
            
            <div class="row mt-1">
                <div class="col-12 mb-5 text-center print-show">
                    <h4 class="slip main-title">{{ $report->test->title }} Report</h4>
                </div>
            </div>
            <div >
               <p> {!! $report->report !!}</p>
            </div>
            
            <!-- data table end -->
            <div class="d-flex mt-5 justify-content-between pt-5 ">
                <p class="border-top px-2 ms-5 print-show">Reporting Doctor</p>
                {{-- <p class="border-top px-2 me-5 print-show">Receiver's signature</p> --}}
            </div>
        </div>
    </div>
</body>
</html>