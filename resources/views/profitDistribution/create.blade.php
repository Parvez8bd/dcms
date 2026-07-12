<x-app-layout>
    <x-slot name="title">Profit-distribution</x-slot>

    <div class="container">
        <!-- container menu -->
        @include('profitDistribution.menu')
        <!-- container menu end -->

        <div class="border-0 card">
            <div class="p-0 mb-3 border-0 card-header d-flex">
                <!-- page title -->
                <div class="mt-3">
                    <h4 class="main-title">New profit distribution</h4>
                    <p><small>Can paid all kind to profit distribution from here.</small></p>
                </div>

                <!-- header icon -->
                <a href="{{ route('profit-distribution.index') }}" title="Go back" class="mt-3 mb-2 pe-0 ms-auto print-none top-icon-button">
                    <i class="bi bi-arrow-left"></i>
                </a>
            </div>

            <div class="p-0 pt-3 card-body">
                <form action="{{ route('profit-distribution.store') }}" method="POST">
                    @csrf

                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="investment-date" class="mt-1 form-label required">Distribution date</label>
                        </div>

                        <div class="col-md-2">
                            <input type="date" name="distribution_date" value="{{ old('investment_date', date('Y-m-d')) }}" class="form-control" id="investment-date" required>

                            <!-- error -->
                            @error('investment_date')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    

                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="contact-id" class="mt-1 form-label required">Investor</label>
                        </div>

                        <div class="col-md-3">
                            <select name="contact_id" class="form-control select2" id="contact-id" required>
                                <option value="" selected disabled>--- Select Investor --- </option>
                                @foreach ($contacts as $contact)
                                    <option value="{{ $contact->id }}">{{ $contact->owner_name?? ''??'' }} ({{ $contact->organigation_name ??''}})</option>
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
                            <label for="investment_id" class="mt-1 form-label required">Investment</label>
                        </div>

                        <div class="col-md-4">
                            <select name="investment_id" class="form-control select2" id="investment_id" required>
                                <option value="" selected disabled>--- Select investment --- </option>
                                @foreach ($investments as $investment)
                                    <option value="{{ $investment->id }}" {{ (old('investment_id') == $investment->id) ? 'selected' : ''}}>{{ $investment->amount }} BDT ({{ $investment->contact->owner_name??'' }}) -- {{ $investment->investment_date }}</option>
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
                    </div>

                    {{-- <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="investment-duration" class="mt-1 form-label required">Duration </label>
                        </div>

                        <div class="col-md-2">
                            <div class="input-group">
                                <select name="duration" class="form-control" id="withdraw-policy" aria-describedby="withdraw-addon" required>
                                    <option value="" selected disabled>-- </option>
                                    @foreach ($duration as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- error -->
                            @error('duration')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="investment-interest" class="mt-1 form-label required">Interest (%)</label>
                        </div>

                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="number" name="interest" value="{{ old('interest', 1) }}" step="any" min="1" max="100" class="form-control" id="investment-interest" placeholder="0%" aria-describedby="interest-addon" required>
                                <span class="input-group-text" id="interest-addon">%  (Possibility)</span>
                            </div>

                            <!-- error -->
                            @error('interest')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div> --}}

                    {{-- <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="investment-policy" class="mt-1 form-label required">Investment policy</label>
                        </div>

                        <div class="col-md-3">
                            <select name="investment_policy" class="form-control" id="investment-policy" required>
                                <option value="" selected disabled>-- </option>
                                @foreach ($investmentPolicies as $policy)
                                    <option value="{{ $policy }}">{{ $policy }}</option>
                                @endforeach
                            </select>

                            <!-- error -->
                            @error('investment_policy')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div> --}}

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