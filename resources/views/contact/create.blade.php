<x-app-layout>
    <x-slot name="title">Contact </x-slot>

    <div class="container">
        <!-- container menu -->
        @include('contact.menu')
        <!-- container menu end -->

        <div class="border-0 card">
            <div class="p-0 mt-4 mb-3 border-0 card-header d-flex">
                <!-- page title -->
                <div>
                    <h4 class="main-title">Create new</h4>
                    <p><small>Create form can bring (something new) into existence.</small></p>
                </div>

                <!-- header icon -->
                <a href="{{ route('contact.index') }}" title="Go back" class="mt-3 mb-2 pe-0 ms-auto print-none top-icon-button">
                    <i class="bi bi-arrow-left"></i>
                </a>
            </div>

            <div class="p-0 pt-3 card-body">
                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf

                    <div class="mb-3 row">
                        <div class="col-2">
                            <label for="owner-name" class="mt-1 form-label required">Owner name</label>
                        </div>

                        <div class="col-6">
                            <input type="text" name="owner_name" value="{{ old('owner_name') }}" class="form-control" id="owner-name" placeholder="Characters only" required>

                            <!-- error -->
                            @error('owner_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-2">
                            <label for="organigation-name" class="mt-1 form-label">Organigation name</label>
                        </div>

                        <div class="col-4">
                            <input type="text" name="organigation_name" value="{{ old('organigation_name') }}" class="form-control" id="organigation-name" placeholder="Characters only">

                            <!-- error -->
                            @error('organigation_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-2">
                            <label for="fathers-name" class="mt-1 form-label">Parents</label>
                        </div>

                        <div class="col-3">
                            <input type="text" name="fathers_name" value="{{ old('fathers_name') }}" class="form-control mb-1" id="fathers-name" placeholder="Father's name">

                            <!-- error -->
                            @error('fathers_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                            <input type="text" name="mothers_name" value="{{ old('mothers_name') }}" class="form-control" id="mothers-name" placeholder="Mother's name">

                            <!-- error -->
                            @error('mothers_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-2">
                            <label for="gender" class="mt-1 form-label required">Gender</label>
                        </div>

                        <div class="col-2">
                            <select name="gender" class="form-control" id="gender" required>
                                <option value="" selected disabled>-- </option>
                                @foreach (config('utilities.gender') as $gender)
                                    <option value="{{ $gender }}" {{ (old('gender') == $gender) ? 'selected' : '' }}>{{ $gender }}</option>
                                @endforeach
                            </select>

                            <!-- error -->
                            @error('gender')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-2">
                            <label for="dob" class="mt-1 form-label" title="Date of birth">DOB</label>
                        </div>

                        <div class="col-3">
                            <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" class="form-control" id="dob">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-2">
                            <label for="blood-group" class="mt-1 form-label">Blood group</label>
                        </div>

                        <div class="col-2">
                            <select name="blood_group" class="form-control" id="blood-group">
                                <option value="" selected disabled>-- </option>
                                @foreach (config('utilities.blood_groups') as $group)
                                    <option value="{{ $group }}" {{ (old('blood_group') == $group) ? 'selected' : '' }}>{{ $group }}</option>
                                @endforeach
                            </select>

                            <!-- error -->
                            @error('gender')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-2">
                            <label for="religion" class="mt-1 form-label">Religion</label>
                        </div>

                        <div class="col-3">
                            <select name="religion" class="form-control" id="religion">
                                <option value="" selected disabled>-- </option>
                                @foreach (config('utilities.religions') as $religion)
                                    <option value="{{ $religion }}" {{ (old('religion') == $religion) ? 'selected' : '' }}>{{ $religion }}</option>
                                @endforeach
                            </select>

                            <!-- error -->
                            @error('religion')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-2">
                            <label for="nid" class="mt-1 form-label">NID</label>
                        </div>

                        <div class="col-3">
                            <input type="text" name="nid" value="{{ old('nid') }}" class="form-control" id="nid" placeholder="XXXXXXXXXXXXX">

                            <!-- error -->
                            @error('nid')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-2">
                            <label for="nationality" class="mt-1 form-label">Nationality</label>
                        </div>

                        <div class="col-3">
                            <select name="country_id" class="form-control" id="nationality">
                                <option value="" selected disabled>-- </option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}" {{ (old('country_id') == $country->id) ? 'selected' : '' }}>
                                        {{ $country->nationality }} ({{ $country->en_short_name }})
                                    </option>
                                @endforeach
                            </select>

                            <!-- error -->
                            @error('country_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-2">
                            <label for="contact-type" class="mt-1 form-label required">Type</label>
                        </div>

                        <div class="col-3">
                            <select name="contact_type" class="form-control" id="contact-type" required>
                                <option value="" selected disabled>-- </option>
                                @foreach (config('utilities.contact') as $contactType)
                                    <option value="{{ $contactType }}" {{ (old('contact_type') == $contactType) ? 'selected' : '' }}>{{ $contactType }}</option>
                                @endforeach
                            </select>

                            <!-- error -->
                            @error('contact_type')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-2">
                            <label class="mt-1 form-label">&nbsp;</label>
                        </div>

                        <div class="col-10">
                            <button type="reset" class="btn btn-warning me-2">
                                <i class="bi bi-dash-square"></i>
                                <span class="p-1">Reset</span>
                            </button>

                            <button type="submit" name="submit" value="save_and_exit" class="btn btn-success">
                                <i class="bi bi-plus-square"></i>
                                <span class="p-1">Save & Exit</span>
                            </button>

                            <button type="submit" name="submit" value="save_and_next" class="btn btn-primary">
                                <i class="bi bi-plus-square"></i>
                                <span class="p-1">Add Phone</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
