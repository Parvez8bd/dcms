<x-app-layout>
    <x-slot name="title">Investment </x-slot>

    <div class="container">
        <!-- container menu -->
        @include('investment.menu')
        <!-- container menu end -->

        <div class="border-0 card">
            <div class="p-0 mt-4 mb-3 border-0 card-header d-flex">
                <!-- page title -->
                <div>
                    <h4 class="main-title">New investment</h4>
                    <p><small>Can add <strong>deposit</strong> or, <strong>invest</strong> amount from here.</small></p>
                </div>

                <!-- header icon -->
                <a href="{{ route('investment.index') }}" title="Go back" class="mt-3 mb-2 pe-0 ms-auto print-none top-icon-button">
                    <i class="bi bi-arrow-left"></i>
                </a>
            </div>

            <div class="p-0 pt-3 card-body">
                <form action="{{ route('investment.update', $investment->id) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="investment-date" class="mt-1 form-label required">Investment date</label>
                        </div>

                        <div class="col-md-2">
                            <input type="date" name="investment_date" value="{{ old('investment_date', $investment->investment_date->format('Y-m-d')) }}" class="form-control" id="investment-date" required>

                            <!-- error -->
                            @error('investment_date')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="project-id" class="mt-1 form-label required">Project </label>
                        </div>

                        <div class="col-md-3">
                            <select name="project_id" class="form-control" id="project-id" required>
                                <option value="" selected disabled>-- </option>
                                @foreach ($projects as $project)
                                    <option value="{{ $project->id }}" {{ ($project->id == $investment->project_id) ? 'selected' : ''}}>{{ $project->title }} ({{ number_format($project->budget, 2) }})</option>
                                @endforeach
                            </select>

                            <!-- error -->
                            @error('project_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div> --}}

                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="contact-id" class="mt-1 form-label required">Investor </label>
                        </div>

                        <div class="col-md-3">
                            <select name="contact_id" class="form-control" id="contact-id" required>
                                <option value="" selected disabled>--- Select Investor --- </option>
                                @foreach ($contacts as $contact)
                                    <option value="{{ $contact->id }}" {{ ($contact->id == $investment->contact_id) ? 'selected' : ''}}>{{ $contact->owner_name?? '' }} ({{ $contact->organigation_name }})</option>
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
                                    <option value="{{ $contact->id }}" {{ ($contact->id == $investment->nominee_id) ? 'selected' : ''}}>{{ $contact->owner_name?? '' }} ({{ $contact->organigation_name }})</option>
                                @endforeach
                            </select>

                            <!-- error -->
                            @error('contact_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div> --}}
                    </div>

                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="investment-amount" class="mt-1 form-label required">Amount</label>
                        </div>

                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="number" name="amount" value="{{ old('amount', $investment->amount) }}" step="any" min="0" class="form-control" id="investment-amount" placeholder="0.00" aria-describedby="amount-addon" required>
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
                                        <option value="{{ $key }}" {{($key == $investment->duration ) ? 'selected':''}}>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- error -->
                            @error('duration')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div> --}}

                    {{-- <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="investment-interest" class="mt-1 form-label required">Interest (%)</label>
                        </div>

                        <div class="col-md-2">
                            <div class="input-group">
                                <input type="number" name="interest" value="{{ old('interest', $investment->interest) }}" step="any" min="1" max="100" class="form-control" id="investment-interest" placeholder="0%" aria-describedby="interest-addon" required>
                                <span class="input-group-text" id="interest-addon">%</span>
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
                                    <option value="{{ $policy }}" {{($policy == $investment->investment_policy ) ? 'selected':''}}>{{ $policy }}</option>
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
                                <select name="withdraw_policy" class="form-control" id="withdraw-policy" aria-describedby="withdraw-addon" required>
                                    <option value="" selected disabled>-- </option>
                                    @foreach ($withdrawPolicies as $policy)
                                        <option value="{{ $policy }}" {{($policy == $investment->withdraw_policy ) ? 'selected':''}}>{{ $policy }}</option>
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
                            <textarea name="note" class="form-control" id="note" rows="3" placeholder="Optional">{{ old('note', $investment->note) }}</textarea>
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
