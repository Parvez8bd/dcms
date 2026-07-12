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
                    <h4 class="main-title">Update profit distribution</h4>
                    <p><small>Can Update all kind to profit distribution from here.</small></p>
                </div>

                <!-- header icon -->
                <a href="{{ route('profit-distribution.index') }}" title="Go back" class="mt-3 mb-2 pe-0 ms-auto print-none top-icon-button">
                    <i class="bi bi-arrow-left"></i>
                </a>
            </div>

            <div class="p-0 pt-3 card-body">
                <form action="{{ route('profit-distribution.update', $profitDistribution->id) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="investment-date" class="mt-1 form-label required">Distribution date</label>
                        </div>

                        <div class="col-md-2">
                            <input type="date" name="distribution_date" value="{{ old('investment_date', $profitDistribution->distribution_date) }}" class="form-control" id="investment-date" required>

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
                                    <option value="{{ $contact->id }}" {{ ($profitDistribution->contact_id == $contact->id) ? 'selected' : ''}}>{{ $contact->owner_name?? '' }} ({{ $contact->organigation_name }})</option>
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
                                <input type="number" name="amount" value="{{ old('amount', $profitDistribution->amount) }}" step="any" min="0" class="form-control" id="investment-amount" placeholder="0.00" aria-describedby="amount-addon" required>
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
                            <textarea name="note" class="form-control" id="note" rows="3" placeholder="Optional">{{ old('note',$profitDistribution->note) }}</textarea>
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
                                <span class="p-1">Update</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>