<x-app-layout>
    <x-slot name="title">Account</x-slot>

    <div class="container">
        <!-- container menu -->
        @include('CooperativeSociety.account.menu')

        <!-- container menu end -->

        <div class="border-0 card">
            <div class="p-0 mt-4 mb-3 border-0 card-header d-flex">
                <!-- page title -->
                <div>
                    <h4 class="main-title">Update Account</h4>
                    <p><small>Create form can bring (something new) into existence.</small></p>
                </div>

                <!-- header icon -->
                <a href="{{ route('account.index') }}" title="Go back" class="mt-3 mb-2 pe-0 ms-auto print-none top-icon-button">
                    <i class="bi bi-arrow-left"></i>
                </a>
            </div>

            <div class="p-0 pt-3 card-body">
                <form action="{{ route('account.update', $account->id) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="contact_id" class="mt-1 form-label required">Account Holder</label>
                        </div>

                        <div class="col-md-3">
                                       
                            <select name="contact_id" class="form-control select2" id="contact_id" required>
                                <option value="" selected disabled>---</option>
                                    @foreach ($contacts as $contact)
                                        @php
                                           $_contact = $contact->communications->where('contact_number_type','Mobile')->first()
                                        @endphp
                                       <option value="{{ $contact->id }}" {{ (old('contact_id', $account->contact_id) == $contact->id) ? 'selected' : '' }}>
                                        {{ $contact->owner_name?? '' }} ({{ $_contact['contact'] ?? '' }})
                                       </option> 
                                       
                                    @endforeach
                            </select>
                            {{-- <input  name="Mobile" type="text" value="{{ $_contact['contact'] ?? '' }}"> --}}
                            <!-- error -->
                            @error('contact_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="nomine_id" class="mt-1 form-label required">Nomine</label>
                        </div>

                        <div class="col-md-3">
                            <select name="nomine_id" class="form-control select2" id="nomine_id" required>
                                <option value="" selected disabled>---</option>
                                    @foreach ($contacts as $contact)
                                        @php
                                           $_contact = $contact->communications->where('contact_number_type','Mobile')->first()
                                        @endphp
                                       <option value="{{ $contact->id }}" {{ (old('nomine_id', $account->nomine_id) == $contact->id) ? 'selected' : '' }}>{{ $contact->owner_name?? '' }} 
                                        ({{ $_contact['contact'] ?? '' }})
                                       </option> 
                                    @endforeach
                            </select>
                            <!-- error -->
                            @error('nomine_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('member.create') }}" class="mt-2" target="_blank">Add Nomine</a>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="category_id" class="mt-1 form-label required">Account type</label>
                        </div>

                        <div class="col-md-4">
                            <select name="category_id" class="form-control" id="category_id" required>
                                <option value="" selected disabled>---</option>
                                @foreach ($category as $record)
                                    <option value="{{ $record->id }}" {{ (old('category_id', $account->category_id) == $record->id) ? 'selected' : '' }}>{{ $record->title }}</option>
                                @endforeach
                            </select> 

                            <!-- error -->
                            @error('category_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="sub_category_id" class="mt-1 form-label">Diposite type</label>
                        </div>

                        <div class="col-md-4">
                            <select name="sub_category_id" class="form-control" id="sub_category_id" >
                                <option value="" selected disabled>---</option>
                                @foreach ($subcategory as $record)
                                    <option value="{{ $record->id }}" {{ (old('sub_category_id', $account->sub_category_id) == $record->id) ? 'selected' : '' }}>{{ $record->title }}</option>
                                @endforeach
                            </select> 

                            <!-- error -->
                            @error('sub_category_id')
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
                                <input type="number" name="amount" value="{{ old('amount',$account->amount) }}" step="any" min="0" class="form-control" id="investment-amount" placeholder="0.00" aria-describedby="amount-addon" required>
                                <span class="input-group-text" id="amount-addon">BDT</span>
                            </div>

                            <!-- error -->
                            @error('amount')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="investment-duration" class="mt-1 form-label required">Opening date</label>
                        </div>

                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="date" name="opening_date" value="{{old('opening_date' , $account->opening_date)}}" class="form-control" required>
                            </div>

                            <!-- error -->
                            @error('duration')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="investment-duration" class="mt-1 form-label required">Duration </label>
                        </div>

                        <div class="col-md-2">
                            <div class="input-group">
                                <select name="duration" class="form-control" id="withdraw-policy" aria-describedby="withdraw-addon" required>
                                    <option value="" selected disabled>-- </option>
                                    @foreach ($duration as $key => $value)
                                        <option value="{{ $key }}" {{ (old('duration', $account->duration) == $key) ? 'selected' : '' }}>{{ $value }}</option>
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

                        <div class="col-md-2">
                            <div class="input-group">
                                <input type="number" name="interest" value="{{ old('interest', $account->interest) }}" step="any" min="1" max="100" class="form-control" id="investment-interest" placeholder="0%" aria-describedby="interest-addon" required>
                                <span class="input-group-text" id="interest-addon">%</span>
                            </div>

                            <!-- error -->
                            @error('interest')
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
                                <select name="withdraw_policy" class="form-control" id="withdraw-policy" aria-describedby="withdraw-addon" required>
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
                            <textarea name="note" class="form-control" id="note" rows="3" placeholder="Optional">{{ old('note' , $account->note) }}</textarea>
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

                            <button type="submit"  class="btn btn-primary">
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
