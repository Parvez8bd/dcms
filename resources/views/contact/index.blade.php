<x-app-layout>
    <x-slot name="title">Contact </x-slot>

    <div class="container">
        <!-- container menu -->
        @include('contact.menu')
        <!-- container menu end -->

        <!-- print header -->
        @include('layouts.partials.print-head')
        <!-- print header end -->

        <!-- card start -->
        <div class="border-0 card">
            <!-- card head -->
            <div class="p-0 mt-4 mb-3 border-0 card-header d-md-flex align-items-center d-block">
                <!-- page title -->
                <div>
                    <h4 class="main-title">Contacts</h4>
                    <p><small>About {{ $contacts->total() }} results found.</small></p>
                </div>

                <!-- Print -->
                <a href="#" class="btn top-icon-button print-none ms-auto" title="Print" onclick="window.print()">
                    <i class="bi bi-printer"></i>
                </a>

                <!-- refresh -->
                <a href="{{ route('contact.index') }}" class="btn top-icon-button print-none" title="Refresh">
                    <i class="bi bi-arrow-clockwise"></i>
                </a>

                <!-- search -->
                <a href="#contact-search"
                   class="btn top-icon-button print-none" title="Search" data-bs-toggle="collapse" role="button" aria-expanded="false">
                    <i class="bi bi-search"></i>
                </a>

                <!-- add -->
                <a href="{{ route('contact.create') }}" class="btn top-icon-button print-none" title="Create new contact">
                    <i class="bi bi-plus-circle"></i>
                </a>
            </div>
            <!-- card head end -->

            <!-- content body -->
            <div class="p-0 card-body">
                <!-- search area -->
                <div class="collapse print-none {{ request()->search ? 'show' : '' }}" id="contact-search">
                    <div class="px-0 border-0 card card-body rounded-0">
                        <!-- search form -->
                        <form action="{{ route('contact.index') }}" method="GET">
                            <input type="hidden" name="search" value="1">

                            <div class="row gy-1 gx-3">
                                <div class="col-12 col-sm-6 col-lg-3">
                                    <label for="contact-name" class="form-label">Contact name</label>
                                    <input type="text" name="owner_name" value="{{ request()->owner_name }}" class="form-control" id="contact-name" placeholder="Characters only" autofocus>
                                </div>

                                <!-- button -->
                                <div class="col-12 col-sm-6 col-lg-2">
                                    <label class="form-label">&nbsp;</label>
                                    <button type="submit" class="btn btn-block w-100 custom-btn btn-success">
                                        <i class="bi bi-search"></i>
                                        <span class="p-1">Search</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- search area end -->

                <!-- data table -->
                <div class="mb-3 table-responsive">
                    <table class="table custom-table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Owner</th>
                                <th scope="col">Organigation </th>
                                <th scope="col">Communication </th>
                                <th scope="col">Type </th>
                                <th scope="col" class="print-none text-end">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($contacts as $key => $contact)
                                <tr>
                                    <th scope="row">{{ $contacts->firstItem() + $key }}.</th>
                                    <td>{{ $contact->owner_name?? '' }}</td>
                                    <td>{{ $contact->organigation_name }}</td>
                                    <td>{{ $contact->contact_type }}</td>
                                    <td>{{ $contact->contact_type }}</td>
                                        {{-- <a href="{{ route('contact.show', $contact->id) }}" target="_blank" class="btn table-small-button" title="View"><i class="bi bi-eye"></i></a>
                                        <a href="{{ route('contact.edit', $contact->id) }}" target="_blank" class="btn table-small-button" title="Update"><i class="bi bi-pencil"></i></a>

                                        <span data-bs-toggle="tooltip" title="Trash">
                                            <a href="#" class="btn table-small-button" onclick="if(confirm('Are you sure want to delete?')) { document.getElementById('contact-delete-{{ $contact->id }}').submit() } return false">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </span>

                                        <form action="{{ route('contact.destroy', $contact->id) }}" method="post" class="d-none" id="contact-delete-{{ $contact->id }}">
                                            @csrf
                                            @method('DELETE')
                                        </form> --}}

                                        {{-- <div class="dropdown">
                                            <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Action</button>

                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('contact.show', $contact->id) }}" target="_blank">
                                                        <i class="bi bi-eye"></i> 
                                                        Details
                                                    </a>
                                                </li>

                                                <li>
                                                    <a class="dropdown-item" href="{{ route('contact.edit', $contact->id) }}" target="_blank">
                                                        <i class="bi bi-pencil"></i> 
                                                        Update
                                                    </a>
                                                </li>

                                                <li>
                                                    <a class="dropdown-item" href="#" onclick="if(confirm('Are you sure want to delete?')) { document.getElementById('contact-delete-{{ $contact->id }}').submit() } return false">
                                                        <i class="bi bi-trash"></i>
                                                        Delete
                                                    </a>

                                                    <form action="{{ route('contact.destroy', $contact->id) }}" method="post" class="d-none" id="contact-delete-{{ $contact->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td> --}}
                                    <td class="print-none text-end">
                                       
                                        <a  href="{{ route('contact.show', $contact->id) }}" class="btn table-small-button" title="View" target="_blank">
                                            <i class="bi bi-eye"></i> 
                                        </a>
                                    
                                        <a  href="{{ route('contact.edit', $contact->id) }}" class="btn table-small-button text-success" title="Update"><i class="bi bi-pencil-square"></i>
                                        </a>
                                    
                                        
                                        <span data-bs-toggle="tooltip" title="Trash">
                                            <a href="#" class="btn table-small-button text-danger" onclick="if(confirm('Are you sure want to delete?')) { document.getElementById('investment-delete-{{ $contact->id }}').submit() } return false ">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </span>

                                        <form action="{{ route('contact.destroy', $contact->id) }}" method="post" class="d-none" id="investment-delete-{{ $contact->id }}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                               
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <th colspan="6">List is empty.</th>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- data table end -->

                <!-- paginate -->
                <div class="mb-5 card-footer print-none">
                    <nav aria-label="Page navigation example" class="d-flex justify-content-end">
                        {{ optional($contacts)->links() }}
                    </nav>
                </div>
                <!-- pagination end -->

            </div>
            <!-- content body end -->
        </div>
        <!-- card end -->
    </div>
</x-app-layout>