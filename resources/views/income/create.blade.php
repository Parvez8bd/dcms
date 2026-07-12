<x-app-layout>
    <x-slot name="title">Income </x-slot>

    <div class="container">
        <!-- container menu -->
        @include('income.menu')
        <!-- container menu end -->

        <div class="border-0 card">
            <div class="p-0 mt-4 mb-3 border-0 card-header d-flex">
                <!-- page title -->
                <div>
                    <h4 class="main-title">New Income</h4>
                    <p><small>Can add <strong>Extra Income </strong>  amount from here.</small></p>
                </div>

                <!-- header icon -->
                <a href="{{ route('income.index') }}" title="Go back" class="mt-3 mb-2 pe-0 ms-auto print-none top-icon-button">
                    <i class="bi bi-arrow-left"></i>
                </a>
            </div>

            <div class="p-0 pt-3 card-body">
                <form action="{{ route('income.store') }}" method="POST">
                    @csrf

                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="Income-date" class="mt-1 form-label required">Income date</label>
                        </div>

                        <div class="col-md-2">
                            <input type="date" name="income_date" value="{{ old('income_date', date('Y-m-d')) }}" class="form-control" id="Income-date" required>

                            <!-- error -->
                            @error('income_date')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                   

                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="contact-id" class="mt-1 form-label required">Income Sourse</label>
                        </div>

                        <div class="col-md-4">
                            <input type="text" name="income_sourse" value="{{ old('income_sourse') }}"  class="form-control " placeholder="Like: Newspaper sale, Old furniture sale">
                           

                            <!-- error -->
                            @error('income_sourse')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                       
                    </div>

                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="Income-amount" class="mt-1 form-label required">Amount</label>
                        </div>

                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="number" name="amount" value="{{ old('amount') }}" step="any" min="0" class="form-control" id="Income-amount" placeholder="0.00" aria-describedby="amount-addon" required>
                                <span class="input-group-text" id="amount-addon">BDT</span>
                            </div>

                            <!-- error -->
                            @error('amount')
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
