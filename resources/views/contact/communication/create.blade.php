<x-app-layout>
    <x-slot name="title">Contact communication </x-slot>

    <div class="container">
        <!-- container menu -->
        @include('contact.menu')
        <!-- container menu end -->

        <div class="border-0 card">
            <div class="p-0 mt-4 mb-3 border-0 card-header d-flex">
                <!-- page title -->
                <div>
                    <h4 class="main-title">Communication</h4>
                    <p><small>Can add or update contact <strong>Phone/Mobile number</strong>, <strong>Email address</strong> multiple times.</small></p>
                </div>

                <!-- header icon -->
                <a href="{{ route('contact.index') }}" title="Go back" class="mt-3 mb-2 pe-0 ms-auto print-none top-icon-button">
                    <i class="bi bi-arrow-left"></i>
                </a>
            </div>

            <div class="p-0 pt-3 card-body">
                <form action="{{ route('communication.store') }}" method="POST">
                    @csrf
                    
                    {{-- hidden fileds --}}
                    <input type="hidden" name="contact_id" value="{{ request('id') }}">
                
                    <div class="mb-3 row">
                        <div class="col-2">
                            <label for="contact-media" class="mt-1 form-label required">Media </label>
                            <small class="d-block text-muted">Mobile/Email</small>
                        </div>

                        <div class="col-3">
                            <input type="text" name="contact" class="form-control" id="contact-media" placeholder="Number or, Text" required>

                            <!-- error -->
                            @error('contact')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-2">
                            <select name="contact_number_type" class="form-control" required>
                                <option value="" selected disabled>Select one</option>
                                @foreach (config('utilities.communications') as $media)
                                    <option value="{{ $media }}" {{ (old('contact_number_type') == $media) ? 'selected' : '' }}>{{ $media }}</option>
                                @endforeach
                            </select>

                            <!-- error -->
                            @error('contact_number_type')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-10 offset-md-2">
                            <label for="contact-isPrimary" class="form-label">
                                <input type="checkbox" name="is_primary" value="1" id="contact-isPrimary">
                                <span style="cursor: pointer;">&nbsp; Yes, The above communicationable content is primary.</span>
                            </label>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-2">
                            <label class="mt-1 form-label">&nbsp;</label>
                        </div>

                        <div class="col-10">
                            <button type="submit" name="submit" value="save" class="btn btn-success">
                                <i class="bi bi-plus-square"></i>
                                <span class="p-1">Save</span>
                            </button>

                            <button type="submit" name="submit" value="save_and_next" class="btn btn-primary">
                                <i class="bi bi-plus-square"></i>
                                <span class="p-1">Save & Add Address</span>
                            </button>

                            <a href="{{ route('address.create', ['id' => request('id')]) }}" class="btn btn-warning">
                                <i class="bi bi-skip-end"></i>
                                <span class="p-1">Skip</span>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
