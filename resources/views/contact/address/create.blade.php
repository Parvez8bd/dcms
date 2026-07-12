<x-app-layout>
    <x-slot name="title">Contact address </x-slot>

    <div class="container">
        <!-- container menu -->
        @include('contact.menu')
        <!-- container menu end -->

        <div class="border-0 card">
            <div class="p-0 mt-4 mb-3 border-0 card-header d-flex">
                <!-- page title -->
                <div>
                    <h4 class="main-title">Address</h4>
                    <p><small>Can add or update contact address multiple times.</small></p>
                </div>

                <!-- header icon -->
                <a href="{{ route('contact.index') }}" title="Go back" class="mt-3 mb-2 pe-0 ms-auto print-none top-icon-button">
                    <i class="bi bi-arrow-left"></i>
                </a>
            </div>

            <div class="p-0 pt-3 card-body">
                <form action="{{ route('address.store') }}" method="POST">
                    @csrf

                    {{-- hidden fileds --}}
                    <input type="hidden" name="contact_id" value="{{ request('id') }}">

                    {{-- type --}}
                    <div class="mb-3 row">
                        <div class="col-2">
                            <label for="address-type" class="mt-1 form-label required">Address Type</label>
                        </div>

                        <div class="col-3">
                            <select name="contact_address_type" class="form-control" id="address-more">
                                <option value="" selected disabled>-- </option>
                                @foreach (config('utilities.addresses') as $address)
                                    <option value="{{ $address }}">{{ $address }}</option>
                                @endforeach
                            </select>

                            <!-- error -->
                            @error('contact_address_type')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    {{-- type end --}}

                    {{-- react componet --}} 
                    <div data-divisions="{{ json_encode($divisions) }}" data-errors="{{ $errors ?? [] }}" id="address"></div>

                    {{-- address confirmation --}}
                    <div class="mb-5 row">
                        <div class="col-6 offset-md-2">
                            <label for="contact-address-confirmation">
                                <input type="checkbox" name="contact_address_confirmation" id="contact-address-confirmation">
                                <span style="cursor: pointer;">&nbsp; Present & Permanent address is same.</span>
                            </label>
                        </div>
                    </div>
                    {{-- address confirmation end --}}

                    <div class="mb-3 row">
                        <div class="col-2">
                            <label class="mt-1 form-label">&nbsp;</label>
                        </div>

                        <div class="col-10">
                            <button type="submit" name="submit" value="save_and_exit" class="btn btn-success">
                                <i class="bi bi-plus-square"></i>
                                <span class="p-1">Save</span>
                            </button>

                            <button type="submit" name="submit" value="save_and_next" class="btn btn-primary">
                                <i class="bi bi-plus-square"></i>
                                <span class="p-1">Save & Add Photo</span>
                            </button>

                            <a href="{{ route('media.create', ['id' => request('id')]) }}" class="btn btn-warning">
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
