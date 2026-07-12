<x-app-layout>
    <x-slot name="title">Withdraw </x-slot>

    <div class="container">
        <!-- container menu -->
        @include('CooperativeSociety.withdraw.menu')
        <!-- container menu end -->

        <div class="border-0 card">
            <div class="p-0 mt-4 mb-3 border-0 card-header d-flex">
                <!-- page title -->
                <div>
                    <h4 class="main-title">Create withdraw</h4>
                    <p><small>Can withdraw <strong>deposit</strong> amount from here.</small></p>
                </div>

                <!-- header icon -->
                <a href="{{ route('diposit-withdraw.index') }}" title="Go back" class="mt-3 mb-2 pe-0 ms-auto print-none top-icon-button">
                    <i class="bi bi-arrow-left"></i>
                </a>
            </div>

            <div class="p-0 pt-3 card-body">
                <form action="{{ route('diposit-withdraw.create') }}" method="get">
                   

                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="investment_id" class="mt-1 form-label required">Account</label>
                        </div>

                        <div class="col-md-5">
                            <select name="account_id" class="form-control select2 text-danger" id="investment_id" required>
                                <option value="" selected disabled>--- Select Account --- </option>
                                @foreach ($accounts as $account)
                                    <option value="{{ $account->id }}" {{ (request('account_id') == $account->id) ? 'selected' : ''}} {{ $account->is_active ==0? 'disabled' :'' }}>AC No: {{ $account->account_number }}--- AC H: {{ $account->contact->owner_name?? '' }}</option>
                                @endforeach
                            </select>

                            <!-- error -->
                            @error('contact_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-success">Search</button>
                        </div>
                       
                    </div>
                </form>


                @if ($data)
                <div class="row my-4">
                    <div class="col-md-6 ">
                        <form action="{{ route('diposit-withdraw.store') }}" method="POST">
                            @csrf
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label for="investment-date" class="mt-1 form-label required">Withdraw date</label>
                                </div>

                                <div class="col-md-6">
                                    <input hidden type="number" name="account_id" value="{{ $data->id }}">
                                    <input hidden type="number" name="amount" value="{{ $data->diposit->sum('amount') }}">
                                    <input type="date" name="withdraw_date" value="{{ old('investment_date', date('Y-m-d')) }}" class="form-control" id="investment-date" required>

                                    <!-- error -->
                                    @error('investment_date')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label for="investment-amount" class="mt-1 form-label required">Total diposit</label>
                                </div>

                                <div class="col-md-5">
                                    <div class="input-group">
                                        <input readonly type="number" name="profit" value="{{ $data->diposit->sum('amount') }}" step="any" min="0" class="form-control" id="investment-amount" placeholder="0.00" aria-describedby="amount-addon" required>
                                        <span class="input-group-text" id="amount-addon">TK</span>
                                    </div>

                                    <!-- error -->
                                    @error('amount')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label for="profit" class="mt-1 form-label required">Profit</label>
                                </div>

                                <div class="col-md-5">
                                    <div class="input-group">
                                        <input type="number" name="profit" value="{{ old('amount') }}" onchange="withdraw()" step="any" min="0" class="form-control" id="profit" placeholder="0.00" aria-describedby="amount-addon" required>
                                        <span class="input-group-text" id="amount-addon">TK</span>
                                    </div>

                                    <!-- error -->
                                    @error('amount')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label for="withdrawAmount" class="mt-1 form-label required">Withdraw amount</label>
                                </div>

                                <div class="col-md-5">
                                    <div class="input-group">
                                        <input readonly type="number" name="profit" value="{{ old('amount') }}" step="any" min="0" class="form-control" id="withdrawAmount" placeholder="0.00" aria-describedby="amount-addon" required>
                                        <span class="input-group-text" id="amount-addon">TK</span>
                                    </div>

                                    <!-- error -->
                                    @error('amount')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class="mb-3 row">
                                <div class="col-md-2">
                                    <label for="withdraw_type" class="mt-1 form-label required">Withdraw Type</label>
                                </div>

                                <div class="col-md-3">
                                    <select name="withdraw_type" class="form-control select2" id="withdraw_type" required>
                                        <option value="" selected disabled>--- Select Withdraw Type --- </option>
                                        <option value="Fully" {{ (old('withdraw_type') == "Full") ? 'selected' : ''}}>Fully</option>
                                        <option value="Some" {{ (old('withdraw_type') == "Partial") ? 'selected' : ''}}>Partial</option>
                                        
                                    </select>

                                    <!-- error -->
                                    @error('withdraw_type')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div> --}}

                            <div class="mb-5 row">
                                <div class="col-md-4">
                                    <label for="note" class="mt-1 form-label">Note</label>
                                </div>

                                <div class="col-md-8">
                                    <textarea name="note" class="form-control" id="note" rows="3" placeholder="Optional">{{ old('note') }}</textarea>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="mt-1 form-label">&nbsp;</label>
                                </div>

                                <div class="col-md-8">
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
                    @php
                       $interest_amount= ($data->diposit->sum('amount')*$data->interest)/100;
                    @endphp
                    <div class="col-md-3">
                        <div class="card" style="width: 22rem;">
                            <div class="card-body">
                                
                                <h5 class="card-title">{{ $data->account_number }}</h5>
                                <p class="card-text mb-2"><strong>Account holder: </strong>  {{ $data->contact->owner_name?? '' }}</p>
                                <p class="card-text mb-2"><strong>Account type: </strong>  {{ $data->category->title }}/{{  $data->sub_category->title }}</p>
                                <p class="card-text mb-2"><strong>Duration: </strong>  {{ $data->duration}} Manth</p>
                                {{-- <p class="card-text mb-2"><strong>opening date: </strong>  {{ $data->opening_date->format("j M, Y") }}</p> --}}
                                <p class="card-text mb-2"><strong>opening date: </strong>  {{ $data->opening_date}}</p>
                                <p class="card-text mb-2"><strong>expiry date: </strong>  {{ $data->expiry_date}}</p>
                                <p class="card-text mb-2"><strong>Diposit amount: </strong> BDT {{ $data->amount}}</p>
                                <p class="card-text mb-2"><strong>Total diposit: </strong> BDT {{ $data->diposit->sum('amount') }}</p>
                                <p class="card-text mb-2"><strong>Interest: </strong> {{ $data->interest }}% (Probability: {{ $interest_amount }} TK) </p>
                            </div>
                        </div>
                    </div>
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

            function withdraw() {
            var x = Number(document.getElementById("investment-amount").value);
            var y = Number(document.getElementById("profit").value);
            document.getElementById("withdrawAmount").value = x+y;
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
