<x-app-layout>
    <x-slot name="title">Installment </x-slot>

    <div class="container">
        <!-- container menu -->
        @include('installment.menu')
        <!-- container menu end -->

        <div class="border-0 card">
            <div class="p-0 mt-4 mb-3 border-0 card-header d-flex">
                <!-- page title -->
                <div>
                    <h4 class="main-title">Edit Installment</h4>
                    <p><small>Can Edit <strong>Installment</strong>  amount from here.</small></p>
                </div>

                <!-- header icon -->
                <a href="{{ route('installment.index') }}" title="Go back" class="mt-3 mb-2 pe-0 ms-auto print-none top-icon-button">
                    <i class="bi bi-arrow-left"></i>
                </a>
            </div>

            <div class="p-0 pt-3 card-body">
                <form action="{{ route('installment.store') }}" method="POST">
                    @csrf

                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="contact-id" class="mt-1 form-label required">Installment</label>
                        </div>
                       

                        <div class="col-md-6">
                            {{-- <select name="installment_id" class="form-control" id="contact-id" required> --}}
                                {{-- <option value="" selected disabled>check installment --- </option> --}}
                                @foreach ($installments as $installment)
                                    {{-- <option class="pt-2" value="{{ $installment->id }}" {{ $installment->status == 'due' ? '' : 'disabled' }}>{{ $installment->date->format("j M, Y, g:i a") }} --- ( {{ $installment->amount }} BDT )</option> --}}
                                    
                                    <div class="form-check">
                                        <input name="installment_id[{{ $loop->index }}]" class="form-check-input" type="checkbox" value="{{ $installment->id }}" id="{{ $installment->id }}"  {{ $installment->status == 'due' ? '' : 'checked' }} >

                                        <label class="form-check-label d-flex my-3" for="{{ $installment->id }}">
                                            <div class="w-50">{{ $installment->date->format("j M, Y, g:i a") }} --- ( {{ $installment->amount }} BDT )</div>
                                            <div class="input-group w-50">

                                                <input   type="number" name="fine[{{ $loop->index }}]" value="{{ old('fine',$installment->fine) }}" step="any" min="0" class="form-control" id="fine" placeholder="0.00" aria-describedby="amount-addon">
                                                <span class="input-group-text" id="amount-addon" title="fine will be added if the installment is paid after the due date &
                                                fine will be determined according to the company policy.">Fine (BDT)</span>

                                            </div>
                                            <!-- error -->
                                            @error('fine')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </label>
                                      </div>
                                @endforeach
                            {{-- </select> --}}
                            
                            

                            <!-- error -->
                            @error('contact_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        
                    </div>

                    {{-- <!--Witnes-1-->
                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="fine" class="mt-1 form-label">Fine</label>
                        </div>

                        <div class="col-md-3" >
                            <div class="input-group">
                                <input type="number" name="fine" value="{{ old('purchese_price') }}" step="any" min="0" class="form-control" id="fine" placeholder="0.00" aria-describedby="amount-addon">
                                <span class="input-group-text" id="amount-addon">BDT</span>
                            </div>
                            <!-- error -->
                            @error('fine')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            
                             <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top"  title="fine will be added if the installment is paid after the due date &
                             fine will be determined according to the company policy.">
                                <i class="bi bi-question-circle"></i>
                              </button> 
                              <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-html="true" title="<em>Tooltip</em> <u>with</u> <b>HTML</b>">
                                Tooltip with HTML
                              </button>
                            
                        </div>
                        
                    </div>  --}}


                    <div class="mb-3 row">
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
                                <span class="p-1">Update</span>
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
                var purchese_price = document.getElementById("purchese_price").value;
                var down_payment = document.getElementById("down_payment").value;
                var sub_total = (purchese_price - down_payment);
                var sale_profit = document.getElementById("sale_profit").value;
                var sale_profit_value = (( sub_total * sale_profit)/100);
                document.getElementById("sale_amount").value = sub_total + sale_profit_value;
            }

            function InstallmentQuantity() {
           var sale_amount = document.getElementById("sale_amount").value;
            
           var installment_quantity = document.getElementById("installment_quantity").value;
           
           document.getElementById("per_installment").value = sale_amount / installment_quantity;
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
@push('script')
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
@endpush

