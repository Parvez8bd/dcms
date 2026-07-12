<x-app-layout>
    <x-slot name="title">Patient </x-slot>

    <div class="container">
        <!-- container menu -->
        @include('patient.menu')
        <!-- container menu end -->

        <div class="border-0 card">
            <div class="p-0 mt-4 mb-3 border-0 card-header d-flex">
                <!-- page title -->
                <div>
                    <h4 class="main-title">New patient</h4>
                    <p><small>Can add <strong>patient</strong> and <strong>Test</strong> from here.</small></p>
                </div>

                <!-- header icon -->
                <a href="{{ route('patient.index') }}" title="Go back"
                    class="mt-3 mb-2 pe-0 ms-auto print-none top-icon-button">
                    <i class="bi bi-arrow-left"></i>
                </a>
            </div>

            <div class="p-0 pt-3 card-body">
                <form action="{{ route('patient.store') }}" method="POST">
                    @csrf
                    <h5 class=" mb-3">Patient info.</h5>
                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="patient_phone" class="mt-1 form-label required">Phone</label>
                        </div>

                        <div class="col-md-3">
                            <input type="number" name="phone" value="{{ old('phone') }}" class="form-control"
                                id="patient_phone" required placeholder="017XX XXX XXX" autofocus>

                            <!-- error -->
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-1"></div>

                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="patient-date" class="mt-1 form-label required">Patient Name</label>
                        </div>

                        <div class="col-md-4">
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                id="patient-date" required>

                            <!-- error -->
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-1">
                            <label for="patient_age" class="mt-1 form-label required">Age</label>
                        </div>
                        <div class="col-md-5">
                            <div class="input-group">
                                <input type="number" name="age_year" value="{{ old('age_year') }}" step="any"
                                    min="0" class="form-control" id="patient_age" placeholder="0"
                                    aria-describedby="amount-addon">
                                <label readonly class="form-control" for="gender" placeholder="Gendrer"
                                    aria-describedby="amount-addon">
                                    Years
                                </label>
                                <input type="number" name="age_month" value="{{ old('age_month') }}" step="any"
                                    min="0" class="form-control" id="patient_age" placeholder="0"
                                    aria-describedby="amount-addon">
                                <label readonly class="form-control" for="gender" placeholder="Gendrer"
                                    aria-describedby="amount-addon">
                                    Months
                                </label>
                                <input type="number" name="age_day" value="{{ old('age_day') }}" step="any"
                                    min="0" class="form-control" id="patient_age" placeholder="0"
                                    aria-describedby="amount-addon">
                                <label readonly class="form-control" for="gender" placeholder="Gendrer"
                                    aria-describedby="amount-addon">
                                    Days
                                </label>
                                {{-- <select name="age_type" class="form-control" id="patient_age">
                                    <option value="" selected disabled>---</option>
                                    @foreach (config('utilities.age') as $age)
                                        <option value="{{ $age }}" {{ (old('age') == $age) ? 'selected' : '' }}>{{ $age }}</option>
                                    @endforeach
                                </select> --}}

                            </div>

                            <!-- error -->
                            @error('patient_age')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>
                    <div class="mb-3 row">

                        <div class="col-md-2">
                            <label for="address-" class="mt-1 form-label">Address</label>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <textarea name="address" class="form-control" id="address-" placeholder="Ex: Payari, Phulpur, Mymensingh."
                                    rows="2"></textarea>
                                {{ old('address') }}

                                </textarea>
                            </div>

                            <!-- error -->
                            @error('address')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-1">

                            <label for="inlineRadio1" class="mt-1 form-label required">Gender</label>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio1"
                                    value="Male">
                                <label class="form-check-label" for="inlineRadio1">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2"
                                    value="Female">
                                <label class="form-check-label" for="inlineRadio2">Female</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio3"
                                    value="Others">
                                <label class="form-check-label" for="inlineRadio3">Others</label>
                            </div>
                            {{-- <select name="gender" class="form-control" id="gender">
                                <option value="" selected disabled>---</option>
                                @foreach (config('utilities.gender') as $gender)
                                    <option value="{{ $gender }}" {{ (old('gender') == $gender) ? 'selected' : '' }}>{{ $gender }}</option>
                                @endforeach
                            </select> --}}
                            <!-- error -->
                            @error('gender')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="refer_doctor" class="mt-1 form-label required">Refer Doctor</label>
                        </div>

                        <div class="col-md-4">
                            <select type="text" name="referr_doctor" value="{{ old('referr_doctor') }}"
                                class="form-control" id="refer_doctor">
                                <option value="" selected disabled>---</option>
                                @foreach ($doctors as $contact)
                                    <option value="{{ $contact->id }}"
                                        {{ old('referr_doctor') == $contact->id ? 'selected' : '' }}>
                                        {{ $contact->owner_name ?? '' }}
                                        {{ $contact->organigation_name ? '(' . $contact->organigation_name . ')' : '' }}
                                    </option>
                                @endforeach
                            </select>

                            <!-- error -->
                            @error('referr_doctor')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- <div class="col-md-1"></div> --}}
                        <div class="col-md-1">
                            <label for="refer_by" class="mt-1 form-label ">Refer By</label>
                        </div>
                        <div class="col-md-5">
                            <select name="referr_by" class="form-control select2" id="refer_by">
                                <option value="" selected disabled>---</option>
                                @foreach ($contacts as $contact)
                                    <option value="{{ $contact->id }}"
                                        {{ old('referr_by') == $contact->id ? 'selected' : '' }}>
                                        {{ $contact->owner_name ?? '' }}[{{ $contact->communications->first()->contact ?? '' }}]
                                        {{ $contact->organigation_name ? '(' . $contact->organigation_name . ')' : '' }}
                                        --{{ $contact->contact_type ?? '' }}</option>
                                @endforeach
                            </select>

                            <!-- error -->
                            @error('referr_by')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>


                    <h5 class=" mb-3">Test info.</h5>



                    {{-- React Component --}}
                    <div id="patient-test" data-testgroups="{{ json_encode($testgroups) ?? [] }}"
                        data-tests="{{ json_encode($tests) ?? [] }}"> </div>



                    <div class="mb-5 ms-5 row">
                        <div class="col-md-9">
                            <label class="mt-1 form-label">&nbsp;</label>
                        </div>

                        <div class="col-md-3">
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
                <br>

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
            .select2-container .select2-selection--single {
                height: 34px !important;
            }

            .select2-container--default .select2-selection--single {
                border: 1px solid #ccc !important;
                border-radius: 0px !important;
            }
        </style>
    @endpush
</x-app-layout>
