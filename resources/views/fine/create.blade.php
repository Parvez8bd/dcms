<x-app-layout>
    <x-slot name="title">Fine</x-slot>

    <div class="container">
        <!-- container menu -->
        @include('fine.menu')
        <!-- container menu end -->

        <div class="border-0 card">
            <div class="p-0 mb-3 border-0 card-header d-flex">
                <!-- page title -->
                <div class="mt-3">
                    <h4 class="main-title">New Fine Withdraw</h4>
                    <p><small>Can withdraw all kind to fine from here.</small></p>
                </div>

                <!-- header icon -->
                <a href="{{ route('fine.index') }}" title="Go back" class="mt-3 mb-2 pe-0 ms-auto print-none top-icon-button">
                    <i class="bi bi-arrow-left"></i>
                </a>
            </div>

            <div class="p-0 pt-3 card-body">
                <form action="{{ route('fine.store') }}" method="POST">
                    @csrf

                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="investment-date" class="mt-1 form-label required">Withdraw date</label>
                        </div>

                        <div class="col-md-2">
                            <input type="date" name="date" value="{{ old('investment_date', date('Y-m-d')) }}" class="form-control" id="investment-date" required autofocus>

                            <!-- error -->
                            @error('investment_date')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    

                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="fine_amount" class="mt-1 form-label ">Total fine</label>
                        </div>

                        <div class="col-md-3">
                            <div class="input-group">
                                <input readonly type="number" name="fine_amount" value="{{ $totalFine }}" step="any" min="0" class="form-control" id="fine_amount" placeholder="0.00" aria-describedby="amount-addon" >
                                <span class="input-group-text" id="amount-addon">BDT</span>
                            </div>
                           

                            <!-- error -->
                            @error('contact_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                       
                    </div>

                    {{-- <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="investment_id" class="mt-1 form-label required">Withdraw</label>
                        </div>

                        <div class="col-md-4">
                            <input type="text" class="form-control" required>

                            <!-- error -->
                            @error('contact_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                       
                    </div> --}}

                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="investment-amount" class="mt-1 form-label required">Withdraw Amount</label>
                        </div>

                        <div class="col-md-3">
                            <div class="input-group">
                                <input {{ $totalFine <= 0 ? 'disabled':'' }} type="number" name="withdraw_amount" value="{{ old('withdraw_amount') }}" step="any" min="0" class="form-control" id="investment-amount" placeholder="0.00" aria-describedby="amount-addon" required>
                                <span class="input-group-text" id="amount-addon">BDT</span>
                            </div>

                            <!-- error -->
                            @error('withdraw_amount')
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
    
</x-app-layout>