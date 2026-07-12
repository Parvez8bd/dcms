<x-app-layout>
    <x-slot name="title">Contact </x-slot>

    <div class="container">
        <!-- container menu -->
        @include('contact.menu')
        <!-- container menu end -->

        <!-- print header -->
        @include('layouts.partials.print-head')
        <!-- print header end -->

        <div class="container">
            <div class="mb-5 border-0 card">
                <div class="p-0 border-0 card-header d-flex mb-3">
                    <!-- page title -->
                    <div class="mt-3">
                        <h4 class="main-title">Contact details</h4>
                        <p><small>All the details below.</small></p>
                    </div>

                    <!-- header icon -->
                    <a href="javascript:window.open('','_self').close();" title="Go back" class="mt-3 mb-2 pe-0 ms-auto print-none top-icon-button">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                    <!-- Print -->
                    <a href="#" class="btn top-icon-button print-none mt-3 mb-2 pe-0 " title="Print" onclick="window.print()">
                        <i class="bi bi-printer"></i>
                    </a>
                </div>
        
                <div class="p-0 card-body">
                    <div class="row">
                        <div class="col-md-4">
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
                            </fieldset>
                        </div>

                        <div class="col-md-4">
                            <fieldset>
                                {{-- <legend class="text-muted">Nominee </legend> --}}

                            @if ($contact->communications)
                                <legend class="text-muted">Communication(s) : </legend>
                                <dl class="mb-3 row">
                                    @foreach ($contact->communications  as $communication)
                                    <dt class="col-sm-4">{{ $communication->contact_number_type }} :  </dt>
                                    <dd class="col-sm-8 fst-italic text-muted">
                                        
                                            <span class="d-block">
                                                {{ $communication->contact }}
                                                {{ $communication->is_primary ? '(Primary)' : '' }}
                                            </span>
                                        @endforeach
                                    </dd>
                                </dl>
                            @endif

                            @if ($contact->addresses)
                                @foreach ($contact->addresses as $address)
                                    <dl class="mb-3 row">
                                        <dt class="col-sm-4">
                                            {{ ucfirst(str_replace('_', ' ', $address->contact_address_type)) }} : 
                                        </dt>
                                        <dd class="col-sm-8 fst-italic text-muted">
                                            <span class="d-block">Street: {{ $address->address }}</span>
                                            {{-- <span class="d-block">Postal code: {{ $address->postal_code ?? 'N/A' }}</span> --}}
                                            <span class="d-block">Union: {{ $address->union->name_en ?? 'N/A' }}</span>
                                            <span class="d-block">Upazila: {{ $address->upazila->name_en ?? ''}}</span>
                                            <span class="d-block">District: {{ $address->district->name_en ?? ''}}</span>
                                            <span class="d-block">Division: {{ $address->division->name_en ?? ''}}</span>
                                        </dd>
                                    </dl>
                                @endforeach
                            @endif
                            </fieldset>
                        </div>
                        <div class="col-md-4">
                            <legend class="text-muted">Media : </legend>
                            <fieldset>
                                @if ($contact->media)
                                    @foreach ($contact->media as $media)
                                        <img src="{{ asset('storage/' . $media->path) }}" class="img-fluid" alt="Avatar" width="250">
                                    @endforeach
                                @endif
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>