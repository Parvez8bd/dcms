<x-app-layout>
    <x-slot name="title">Sale </x-slot>

    <div class="container">
        <!-- container menu -->
        @include('sale.menu')
        <!-- container menu end -->

        <div class="border-0 card">
            <div class="p-0 mt-4 mb-3 border-0 card-header d-flex">
                <!-- page title -->
                <div>
                    <h4 class="main-title">New Sale</h4>
                    <p><small>Can add <strong>Sale</strong>  amount from here.</small></p>
                </div>

                <!-- header icon -->
                <a href="{{ route('sale.index') }}" title="Go back" class="mt-3 mb-2 pe-0 ms-auto print-none top-icon-button">
                    <i class="bi bi-arrow-left"></i>
                </a>
            </div>

            <div class="p-0 pt-3 card-body">
                <form action="{{ route('sale.store') }}" method="POST">
                    @csrf

                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="investment-date" class="mt-1 form-label required">Sale date</label>
                        </div>

                        <div class="col-md-4">
                            <input type="datetime-local" name="date" value="{{ old('investment_date', date("Y-m-d\TH:i")) }}" class="form-control" id="investment-date" required autofocus>
                            

                            <!-- error -->
                            @error('date')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="project-id" class="mt-1 form-label required">Product name </label>
                        </div>

                        <div class="col-md-3">
                            <input type="text" name="product_name" class="form-control" placeholder="Ex: Samsung Galaxy A30" required>
                            <small class="text-muted">Only text </small>

                            <!-- error -->
                            @error('product_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="voucher" class="form-control" placeholder="XXXX XXX XX X" required>
                            <small class="text-muted">Voucher no. (Optional) </small>


                            <!-- error -->
                            @error('voucher')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="purchese_price" class="mt-1 form-label required">Purchese Price</label>
                        </div>

                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="number" name="purchese_price" value="{{ old('purchese_price') }}" step="any" min="0" class="form-control" onchange="saleProfit()" id="purchese_price" placeholder="0.00" aria-describedby="amount-addon" required>
                                <span class="input-group-text" id="amount-addon">BDT</span>
                            </div>

                            <!-- error -->
                            @error('purchese_price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="sale_profit" class="mt-1 form-label required">Sale Profit (%)</label>
                        </div>

                        <div class="col-md-2">
                            <div class="input-group">
                                <input type="number" name="sale_profit" value="{{ old('interest') }}" step="any" min="1" max="100" class="form-control" onchange="saleProfit()" id="sale_profit" placeholder="0.00" aria-describedby="interest-addon" required>
                                <span class="input-group-text" id="interest-addon">%  </span>
                            </div>

                            <!-- error -->
                            @error('interest')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                                <span class="input-group-text" id="interest-addon">Sale Amount</span>
                                <input readonly type="number"  value="" class="form-control" id="sale_amount" placeholder="0.00" aria-describedby="interest-addon">
                                
                            </div>

                            <!-- error -->
                            @error('interest')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="down_payment" class="mt-1 form-label">Down Payment</label>
                        </div>

                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="number" name="down_payment" value="{{ old('down_payment') }}" step="any" min="0" class="form-control" onchange="InstallmentQuantity()" id="down_payment" placeholder="0.00" aria-describedby="amount-addon">
                                <span class="input-group-text" id="amount-addon">BDT</span>
                            </div>

                            <!-- error -->
                            @error('initial_payment')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        
                    </div>

                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="installment_type" class="mt-1 form-label required">Installment Type </label>
                        </div>

                        <div class="col-md-2">
                            <div class="input-group">
                                <select name="installment_type" class="form-control" id="installment_type" aria-describedby="withdraw-addon" required>
                                    <option value="" selected disabled>-- </option>
                                    @foreach ($installmentType as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- error -->
                            @error('installment_type')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="installment_quantity" class="mt-1 form-label required">Installment Quantity</label>
                        </div>

                        <div class="col-md-2">
                            <div class="input-group">
                                <input type="number" name="installment_quantity" value="{{ old('installment_quantity', 1) }}" step="any" min="1" max="100" class="form-control" id="installment_quantity" onchange="InstallmentQuantity()" placeholder="0.00" aria-describedby="interest-addon" required>
                            </div>

                            <!-- error -->
                            @error('interest')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                                <span class="input-group-text" id="interest-addon">Per Installment</span>
                                <input readonly type="number" name="installment_amount" value="" class="form-control" id="per_installment" placeholder="0.00" aria-describedby="interest-addon">
                                
                            </div>

                            <!-- error -->
                            @error('interest')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        
                    </div>
                    



                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="contact-id" class="mt-1 form-label required">Customer</label>
                        </div>

                        <div class="col-md-4">
                            <select name="contact_id" class="form-control select2" id="contact-id" required>
                                <option value="" selected disabled>--- Select Customer --- </option>
                                @foreach ($contacts as $contact)
                                    <option value="{{ $contact->id }}">{{ $contact->owner_name?? '' }} ({{ $contact->communications->where('contact_number_type', 'Mobile')->first()->contact ?? 'No Number' }})</option>
                                @endforeach
                            </select>

                            <!-- error -->
                            @error('contact_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- <div class="col-md-3">
                            
                            <select name="nominee_id" class="form-control" id="contact-id" required>
                                <option value="" selected disabled>--- Select Nominee --- </option>
                                @foreach ($contacts as $contact)
                                    <option value="{{ $contact->id }}">{{ $contact->owner_name?? '' }} ({{ $contact->organigation_name }})</option>
                                @endforeach
                            </select>

                            <!-- error -->
                            @error('contact_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div> --}}
                    </div>

                    <!--Witnes-1-->
                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="investment-policy" class="mt-1 form-label"><strong>1st-Witnes</strong></label>
                        </div>

                        <div class="col-md-3">
                            <input type="text" name="witnes_1_name" class="form-control" placeholder="Full Name">
                            <!-- error -->
                            @error('investment_policy')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <input type="number" name="witnes_1_phone" class="form-control" placeholder="Phone Number">
                            <!-- error -->
                            @error('investment_policy')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <input type="number" name="witnes_1_nid" class="form-control" placeholder="NID Number">
                            <!-- error -->
                            @error('investment_policy')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div> 

                    <!-- Witnes-2 -->
                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="investment-policy" class="mt-1 form-label"><strong>2nd-Witnes</strong></label>
                        </div>

                        <div class="col-md-3">
                            <input type="text" name="witnes_2_name" class="form-control" placeholder="Full Name">
                            <!-- error -->
                            @error('investment_policy')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <input type="number" name="witnes_2_phone" class="form-control" placeholder="Phone Number">
                            <!-- error -->
                            @error('investment_policy')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <input type="number" name="witnes_2_nid" class="form-control" placeholder="NID Number">
                            <!-- error -->
                            @error('investment_policy')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div> 

                    {{-- <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="withdraw-policy" class="mt-1 form-label required">Withdraw policy</label>
                        </div>

                        <div class="col-md-3">
                            <div class="input-group">
                                <select name="withdraw_policy" class="form-control select2" id="withdraw-policy" aria-describedby="withdraw-addon" required>
                                    <option value="" selected disabled>-- </option>
                                    @foreach ($withdrawPolicies as $policy)
                                        <option value="{{ $policy }}">{{ $policy }}</option>
                                    @endforeach
                                </select>

                                <span class="input-group-text" id="withdraw-addon">Months</span>
                            </div>

                            <!-- error -->
                            @error('withdraw_policy')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div> --}}

                    <div class="mb-4 row">
                        <div class="col-md-2">
                            <label for="note" class="mt-1 form-label">Note</label>
                        </div>

                        <div class="col-md-8">
                            <textarea name="note" class="form-control" id="note" rows="3" placeholder="Optional">{{ old('note') }}</textarea>
                        </div>
                    </div>

                    <div class="mb-2 row">
                        <div class="col-md-2">
                            <label class="mt-1 form-label">&nbsp;</label>
                        </div>

                        <div class="col-md-10">
                            <button type="reset" class="btn btn-warning me-2">
                                <i class="bi bi-dash-square"></i>
                                <span class="p-1">Reset</span>
                            </button>

                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-plus-square"></i>
                                <span class="p-1">Save</span>
                            </button>
                        </div>
                    </div>
                </form>
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
        <script>
            function saleProfit(){
                var purchese_price = Number(document.getElementById("purchese_price").value);
                
                var sale_profit = document.getElementById("sale_profit").value;
                var sale_profit_value = (( purchese_price * sale_profit)/100);
                document.getElementById("sale_amount").value = purchese_price + sale_profit_value;
            }

            function InstallmentQuantity() {
           var sale_amount = document.getElementById("sale_amount").value;
            var down_payment = document.getElementById("down_payment").value;
            var sub_total = (sale_amount - down_payment);
           var installment_quantity = document.getElementById("installment_quantity").value;
           document.getElementById("per_installment").value = sub_total / installment_quantity;
        }

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
