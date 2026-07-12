<x-app-layout>
    <x-slot name="title">Withdraw </x-slot>

    <div class="container">
        <!-- container menu -->
        @include('withdraw.menu')
        <!-- container menu end -->

        <div class="border-0 card">
            <div class="p-0 mt-4 mb-3 border-0 card-header d-flex">
                <!-- page title -->
                <div>
                    <h4 class="main-title">Create withdraw</h4>
                    <p><small>Can  <strong>withdraw</strong> amount from here.</small></p>
                </div>

                <!-- header icon -->
                <a href="{{ route('withdraw.index') }}" title="Go back" class="mt-3 mb-2 pe-0 ms-auto print-none top-icon-button">
                    <i class="bi bi-arrow-left"></i>
                </a>
            </div>

            <div class="p-0 pt-3 card-body">
                <form action="{{ route('withdraw.store') }}" method="POST">
                    @csrf

                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="investment-date" class="mt-1 form-label required">Withdraw date</label>
                        </div>

                        <div class="col-md-2">
                            <input type="date" name="withdraw_date" value="{{ old('investment_date', date('Y-m-d')) }}" class="form-control" id="investment-date" required>

                            <!-- error -->
                            @error('investment_date')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    

                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="contact-id" class="mt-1 form-label required">Investor name</label>
                        </div>

                        <div class="col-md-4">
                            <select name="contact_id" class="form-control select2" id="contact-id" required>
                                <option value="" selected disabled>--- Select Investor name --- </option>
                                @foreach ($contacts as $contact)
                                    <option value="{{ $contact->id }}" {{ (old('contact_id') == $contact->id) ? 'selected' : ''}}>{{ $contact->owner_name?? '' }} ({{ $contact->organigation_name }})</option>
                                @endforeach
                            </select>

                            <!-- error -->
                            @error('contact_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                       
                    </div>

                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="investment-amount" class="mt-1 form-label required">Amount</label>
                        </div>

                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="number" name="amount" value="{{ old('amount') }}" step="any" min="0" class="form-control" id="investment-amount" placeholder="0.00" aria-describedby="amount-addon" required>
                                <span class="input-group-text" id="amount-addon">BDT</span>
                            </div>

                            <!-- error -->
                            @error('amount')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
              

                        <div class="col-md-3">
                            <div class="input-group">
                                <span class="input-group-text" id="amount-addon">Current Cash</span>
                                <input readonly type="number"  value="{{ $cash }}" step="any" min="0" class="form-control" id="investment-amount" placeholder="0.00" aria-describedby="amount-addon" required>
                            </div>

                            <!-- error -->
                            @error('withdraw_type')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-5 row">
                        <div class="col-md-2">
                            <label for="note" class="mt-1 form-label">Note</label>
                        </div>

                        <div class="col-md-6">
                            <textarea name="note" class="form-control" id="note" rows="3" placeholder="Optional">{{ old('note') }}</textarea>
                        </div>
                    </div>

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
