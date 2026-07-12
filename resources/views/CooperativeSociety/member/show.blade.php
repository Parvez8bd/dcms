<x-app-layout>
    <x-slot name="title">Member </x-slot>

    <div class="container">
        <!-- container menu -->
        @include('CooperativeSociety.member.menu')

        <!-- container menu end -->

        <div class="container">
            <div class="mb-5 border-0 card">
                <div class="p-0 border-0 card-header d-flex mb-3">
                    <!-- page title -->
                    <div class="mt-3">
                        <h4 class="main-title">Member details</h4>
                        <p><small>All the details below.</small></p>
                    </div>

                    <!-- header icon -->
                    <a href="javascript:window.open('','_self').close();" title="Go back" class="mt-3 mb-2 pe-0 ms-auto print-none top-icon-button">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                </div>
        
                <div class="p-0 card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <fieldset>
                                <legend class="text-muted">Personal </legend>

                                <dl class="mb-1 row">
                                    <dt class="col-sm-6 fw-normal">Contact person: </dt>
                                    <dd class="col-sm-6 text-muted">
                                        <p>
                                            <span class="fw-bold">{{ $contact->owner_name?? '' }}</span>
                                            <span>({{ $contact->gender }})</span>
                                        </p>

                                        <small>
                                            {{ ($contact->date_of_birth != null) ? date('d F, Y', strtotime($contact->date_of_birth)) . ' | ' : '' }}
                                            {{ $contact->contact_type }}
                                        </small>
                                    </dd>
                                </dl>

                                <dl class="mb-1 row">
                                    <dt class="col-sm-6 fw-normal">Organigation name: </dt>
                                    <dd class="col-sm-6 text-muted">
                                        <p class="fw-bold">{{ $contact->organigation_name ?? 'Personal' }}</p>
                                        <small>{{ $contact->created_at->format('d F, Y') }}</small>
                                    </dd>
                                </dl>

                                <dl class="mb-1 row">
                                    <dt class="col-sm-6 fw-normal">Parents: </dt>
                                    <dd class="col-sm-6 text-muted">
                                        <p class="mb-2">
                                            <small>Father</small>
                                            <span class="d-block fw-bold">{{ $contact->fathers_name ?? 'N/a' }}</span>
                                        </p>

                                        <p>
                                            <small>Mother</small>
                                            <span class="d-block fw-bold">{{ $contact->mothers_name ?? 'N/a' }}</span>
                                        </p>
                                    </dd>
                                </dl>

                                <dl class="mb-1 row">
                                    <dt class="col-sm-6 fw-normal">NID: </dt>
                                    <dd class="col-sm-6 text-muted">
                                        {{ $contact->nid ?? 'N/a' }}
                                    </dd>
                                </dl>

                                <dl class="mb-1 row">
                                    <dt class="col-sm-6 fw-normal">Email address: </dt>
                                    <dd class="col-sm-6 text-muted">
                                        {{ $contact->email_address ?? 'N/a' }}
                                    </dd>
                                </dl>


                                @if ($contact->media)
                                    @foreach ($contact->media as $media)
                                        <img src="{{ asset('storage/' . $media->path) }}" class="img-fluid" alt="Avatar" width="250">
                                    @endforeach
                                @endif
                            </fieldset>
                        </div>

                        {{-- <div class="col-md-6">
                            <fieldset>
                                <legend class="text-muted">Nominee </legend>

                            </fieldset>
                        </div> --}}
                    </div>

                    {{-- <dl class="mb-3 row">
                        <dt class="col-sm-3">Mobile number(s) : </dt>
                        <dd class="col-sm-9 fst-italic text-muted">
                            @foreach ($contact->phones as $phone)
                                <span class="d-block">
                                    {{ $phone->mobile_number }}
                                    {{ $phone->is_primary ? '(Primary)' : '' }}
                                </span>
                            @endforeach
                        </dd>
                    </dl> --}}

                    {{-- @foreach ($contact->addresses as $address)
                    <dl class="mb-3 row">
                        <dt class="col-sm-3">
                            {{ ucfirst(str_replace('_', ' ', $address->address_type)) }} : 
                        </dt>
                        <dd class="col-sm-9 fst-italic text-muted">
                            <span class="d-block">Street: {{ $address->street }}</span>
                            <span class="d-block">Postal code: {{ $address->postal_code ?? 'N/A' }}</span>
                            <span class="d-block">Union: {{ $address->union ?? 'N/A' }}</span>
                            <span class="d-block">Upazila: {{ $address->upazila }}</span>
                            <span class="d-block">District: {{ $address->district }}</span>
                            <span class="d-block">Division: {{ $address->division }}</span>
                        </dd>
                    </dl>
                    @endforeach --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>