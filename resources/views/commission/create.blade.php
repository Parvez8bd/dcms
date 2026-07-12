<x-app-layout>
    <x-slot name="title">Installment </x-slot>

    <div class="container">
        <!-- container menu -->
        @include('commission.menu')
        <!-- container menu end -->

        <div class="border-0 card">
            <div class="p-0 mt-4 mb-3 border-0 card-header d-flex">
                <!-- page title -->
                <div>
                    <h4 class="main-title">Commission Distribution</h4>
                    <p><small>Can Distribution All <strong>Commission</strong> amount from here.</small></p>
                </div>

                <!-- header icon -->
                <a href="{{ route('commission.index') }}" title="Go back" class="mt-3 mb-2 pe-0 ms-auto print-none top-icon-button">
                    <i class="bi bi-arrow-left"></i>
                </a>
            </div>

            <div class="p-0 pt-3 card-body">
                <form action="{{ route('commission.create') }}" method="GET">
                  
                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="contact-id" class="mt-1 form-label required">Refferr person</label>
                        </div>

                        <div class="col-md-6">
                            {{-- <input type="text" name="commission_no" class="form-control" value="{{ request()->commission_no }}" placeholder="Ex: INV000002" id="contact-id" autofocus required> --}}
                            <select name="refferr_by_id" class="form-control select2" id="contact-id" required>
                                <option value="" selected disabled>--- Select Refferr --- </option>
                                @foreach ($contacts as $contact)
                                    <option value="{{ $contact->id }}" {{ $contact->id == request()->refferr_by_id ? 'selected' : '' }} >{{ $contact->owner_name?? '' }} ({{ $contact->communications->where('contact_number_type', 'Mobile')->first()->contact ?? 'No Number' }})</option>
                                @endforeach
                            </select>
                            <small class="text-warning">Input commission no and Search</small>

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

                @if ($commissions !=Null)
                <div class="p-0 card-body ">

                    

                    <div class="mb-2 d-flex justify-content-between">
                        <div class="text-start">
                            <h6 class="mb-2">Refferr name: <span class="fst-italic text-muted">{{ $commissions->first()->contact->owner_name??''}}</span></h6>
                            
                            <h6 class="mb-2">Organigation: <span class="fst-italic text-muted">{{ $commissions->first()->contact->organigation_name??''}}</span></h6>
                        </div>
                        <div class="">
                        </div>
                        <div class="text-end">
                            
                        </div>
                    </div>
                    <hr>
                    {{-- @php
                    $discount= 0;
                    $subtotal =$commissions->subtotal;
                    
                    if ($commission->discount_type == 'Percentage') {
                        $discount = $commission->discount;
                        $discount_amount =($subtotal * $discount)/100;
                    }else {
                        $discount_amount = $commission->discount;
                    }
                    
                    
                    $paid = $commission->paid;
                    // $previous_balance = $patient->student->previous_balance;
                    // $subtotal =$subtotal + $previous_balance;
                    $total = $subtotal-$discount_amount;
                    $due = $total - $paid;

                    
                    @endphp --}}

                    <div class="mb-3 table-responsive">
                        {{-- <div class="text-end"><small class="fst-italic">Payment Date: {{$patient->created_at->format('d F, Y')}}</small>
                        </div> --}}
                        <form action="{{ route('commission.store') }}" method="POST">
                            @csrf
                            <input hidden name="contact_id" value="{{  $commissions->first()->contact->id ??'' }}" type="text">
                            <div class="row mt-2">
                                <div class="text-end col-lg-10" colspan="3">Date</div>
                                <div  class="text-end col-lg-2">
                                    <input name="distribution_date" value="{{ old('distribution_date', date('Y-m-d')) }}"  type="date" class="text-end py-1 form-control"  required>
                                </div>
                            </div>
                            <table class="table custom-table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Test</th>
                                        <th scope="col">Test date</th>
                                        <th scope="col" class="text-end">Commission (BDT)</th>
                                    </tr>
                                </thead>
        @php
            $commission_total=0;
        @endphp
                            
                                <tbody>
                                    @forelse($commissions->where('status', 'due' ) as $commission_detail)
                                    @php
                                       $test_c = $commission_detail->test->commission;
                                       $test_p = $commission_detail->test->price;
                                        $commission_amount= ($test_p* $test_c)/100;
                                        $commission_total+=$commission_amount;
                                    @endphp
                                    <input hidden type="text" name="commission_ids[]" value="{{ $commission_detail->id }}">
                                        <tr>
                                            <td scope="row">{{ $loop->iteration }}.</td>
                                            <td>{{ $commission_detail->test->title}}</td>
                                            <td>{{ $commission_detail->created_at->format('d M, Y')}}</td>
                                            <td class="text-end">{{ number_format($commission_amount,2) }}</td>
                                        </tr>
                                
                                    @empty
                                        <tr>
                                            <th colspan="4">There is no commission today.</th>
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
        
                                
                                    <tr>
                                        <th class="text-end" colspan="3">Total =</th>
                                        <th class="text-end">{{ number_format($commission_total,2) ?? ''}} </th>
                                        <input hidden name="commission" value="{{ number_format($commission_total,2) ?? ''}}" class="text-end">
                                    </tr>
                                   {{-- <tfoot> <tr>
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
                                    </tr> --}}
                                    <tr>
                                        <th class="text-end " colspan="3">Paid</th>
                                        <td class="text-end" >
                                            {{-- <input hidden name="commission_id" value="{{ $commission->id }}"> --}}
                                            {{-- <input hidden name="patient_id" value="{{ $commission->patient->id }}"> --}}
                                            <input name="paid" class="text-end py-1" placeholder="0.00" required>
                                            
                                        </td><br>
                                        {{-- <th class="text-end" colspan=""><input type="submit" class="btn btn-success"></th> --}}
                                            
                                    
                                    </tr>
                                    
                                    <tr>
                                        <th class="text-end" colspan="4"><button type="submit" class="btn btn-success">Submit</button></th>
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
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    
    @push('script')
        <script>
            $('.select2').select2();
        </script>
    @endpush

    @push('style')
        <style>
                .select2-container .select2-selection--single{
            height:34px !important;
            }
            .select2-container--default .select2-selection--single{
                    border: 1px solid #ccc !important; 
                border-radius: 0px !important; 
            }
            
            
           
        </style>
    @endpush
   
</x-app-layout>


