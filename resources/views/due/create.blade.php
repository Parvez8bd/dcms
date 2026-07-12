<x-app-layout>
    <x-slot name="title">Installment </x-slot>

    <div class="container">
        <!-- container menu -->
        @include('due.menu')
        <!-- container menu end -->

        <div class="border-0 card">
            <div class="p-0 mt-4 mb-3 border-0 card-header d-flex">
                <!-- page title -->
                <div>
                    <h4 class="main-title">Due Collection</h4>
                    <p><small>Can All <strong>Due Collection</strong> amount from here.</small></p>
                </div>

                <!-- header icon -->
                <a href="{{ route('due-collection.index') }}" title="Go back" class="mt-3 mb-2 pe-0 ms-auto print-none top-icon-button">
                    <i class="bi bi-arrow-left"></i>
                </a>
            </div>

            <div class="p-0 pt-3 card-body">
                <form action="{{ route('due-collection.create') }}" method="GET">
                  
                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="contact-id" class="mt-1 form-label required">Invoice no</label>
                        </div>

                        <div class="col-md-4">
                            <input type="text" name="invoice_no" class="form-control" value="{{ request()->invoice_no }}" placeholder="Ex: INV000002" id="contact-id" autofocus required>
                            {{-- <select name="contact_id" class="form-control select2" id="contact-id" required>
                                <option value="" selected disabled>--- Select Customer --- </option>
                                @foreach ($contacts as $contact)
                                    <option value="{{ $contact->id }}" {{ $contact->id ==request()->contact_id ? 'selected' : '' }} >{{ $contact->owner_name?? '' }} ({{ $contact->communications->where('contact_number_type', 'Mobile')->first()->contact ?? 'No Number' }})</option>
                                @endforeach
                            </select> --}}
                            <small class="text-warning">Input invoice no and Search</small>

                            <!-- error -->
                            @error('contact_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-search"></i>
                                <span class="p-1">Search</span>
                            </button>
                        </div>
                        
                    </div>
                </form>

                @if ($invoice)
                <div class="p-0 card-body ">

                    

                    <div class="mb-2 d-flex justify-content-between">
                        <div class="text-start">
                            <h6 class="mb-2">Patient name: <span class="fst-italic text-muted">{{ $invoice->patient->name }}</span></h6>
                            <h6 class="mb-2">Address: <span class="fst-italic text-muted">{{ $invoice->patient->address }}</span></h6>
                            <h6 class="mb-2">Refferr Doctor: <span class="fst-italic text-muted">{{ $invoice->patient->patient_refferr->doctor->owner_name }}</span></h6>
                        </div>
                        <div class="">
                            {{-- <h6 class="mb-2">--</h6> --}}
                            <h6 class="mb-2">Phone: <span class="fst-italic text-muted">{{ $invoice->patient->phone }} </span></h6>
                            <h6 class="mb-2">Age: <span class="fst-italic text-muted">{{ $invoice->patient->age }} {{ $invoice->patient->age_type }}</span></h6>
                            <h6 class="mb-2">Gender: <span class="fst-italic text-muted">{{$invoice->patient->gender}}</span></h6>
                        </div>
                        <div class="text-end">
                            <h6 class="mb-2">Invoice no: <span class="fst-italic text-muted">{{$invoice->invoice_no}}</span></h6>
                            <h6 class="mb-2">Date: <span class="fst-italic text-muted">{{$invoice->patient->created_at->format('d F, Y g:i A')}}</span></h6>
                            
                        </div>
                    </div>
                    <hr>
                    @php
                    $discount= 0;
                    $subtotal =$invoice->subtotal;
                    
                    if ($invoice->discount_type == 'Percentage') {
                        $discount = $invoice->discount;
                        $discount_amount =($subtotal * $discount)/100;
                    }else {
                        $discount_amount = $invoice->discount;
                    }
                    
                    
                    $paid = $invoice->paid;
                    // $previous_balance = $patient->student->previous_balance;
                    // $subtotal =$subtotal + $previous_balance;
                    $total = $subtotal-$discount_amount;
                    $due = $total - $paid;

                    
                    @endphp

                    <div class="mb-3 table-responsive">
                        {{-- <div class="text-end"><small class="fst-italic">Payment Date: {{$patient->created_at->format('d F, Y')}}</small>
                        </div> --}}
                        <form action="{{ route('due-collection.store') }}" method="POST">
                            @csrf
                            <table class="table custom-table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Payment Item</th>
                                        <th scope="col" class="text-end">Amount (BDT)</th>
                                    </tr>
                                </thead>
        
                            
                                <tbody>
                                    @forelse($invoice->invoice_details as $invoice_detail)
                                        <tr>
                                            <td scope="row">{{ $loop->iteration }}.</td>
                                            <td>{{ $invoice_detail->test->title}}</td>
                                            <td class="text-end">{{ number_format($invoice_detail->test->price) }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <th colspan="3">There is no payment receive today.</th>
                                        </tr>
                                    @endforelse
                                    {{-- @if ($patient->student->previous_balance)
                                    <tr>
                                        <td scope="row">#.</td>
                                        <td>Previes Balence</td>
                                        <td class="text-end">{{  $patient->student->previous_balance }}</td>
                                    </tr>
                                    @endif --}}
                                </tbody>
        
                                <tfoot>
                                    <tr>
                                        <th class="text-end" colspan="2">Subtotal =</th>
                                        <th class="text-end">{{ number_format($subtotal) ?? ''}} </th>
                                    </tr>
                                    <tr>
                                        <th class="text-end" colspan="2">Discount =</th>
                                        <th class="text-end">{{ number_format($discount_amount) }} </th>
                                    </tr>
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
                                    <tr>
                                        <th class="text-end " colspan="2">Paid</th>
                                        <td class="text-end" >
                                            <input hidden name="invoice_id" value="{{ $invoice->id }}">
                                            <input hidden name="patient_id" value="{{ $invoice->patient->id }}">
                                            <input name="paid" class="text-end py-1" placeholder="0.00" required>
                                        </td><br>
                                        {{-- <th class="text-end" colspan=""><input type="submit" class="btn btn-success"></th> --}}
                                            
                                    
                                    </tr>
                                    <tr>
                                        <th class="text-end" colspan="3"><button type="submit" class="btn btn-success">Submit</button></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </form>
                    </div><br><br>
                    
                </div>
                @endif
            </div>
        </div>
    </div>
   
</x-app-layout>


