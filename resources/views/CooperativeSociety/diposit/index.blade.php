<x-app-layout>
    <x-slot name="title">Diposit</x-slot>

    <div class="container">
        <!-- container menu -->
        @include('CooperativeSociety.diposit.menu')
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
                    <h4 class="main-title">diposits</h4>
                    <p><small>About {{ $diposits->total() }} results found.</small></p>
                </div>

                <!-- Print -->
                <a href="#" class="btn top-icon-button print-none ms-auto" title="Print" onclick="window.print()">
                    <i class="bi bi-printer"></i>
                </a>

                <!-- refresh -->
                <a href="{{ route('diposit.index') }}" class="btn top-icon-button print-none" title="Refresh">
                    <i class="bi bi-arrow-clockwise"></i>
                </a>

                <!-- search -->
                <a href="#diposit-search"
                   class="btn top-icon-button print-none" title="Search" data-bs-toggle="collapse" role="button" aria-expanded="false">
                    <i class="bi bi-search"></i>
                </a>

                <!-- add -->
                <a href="{{ route('diposit.create') }}" class="btn top-icon-button print-none" title="Create new diposit">
                    <i class="bi bi-plus-circle"></i>
                </a>
            </div>
            <!-- card head end -->

            <!-- content body -->
            <div class="p-0 card-body">
                <!-- search area -->
                <div class="collapse print-none {{ request()->search ? 'show' : '' }}" id="diposit-search">
                    <div class="px-0 border-0 card card-body rounded-0">
                        <!-- search form -->
                        <form action="{{ route('diposit.index') }}" method="GET">
                            <input type="hidden" name="search" value="1">

                            <div class="row gy-1 gx-3">
                                <div class="col-12 col-sm-6 col-lg-3">
                                    <label for="account_holder" class="form-label">Account holder</label>
                                    <input type="text" name="account_holder" value="{{ request()->account_holder }}" class="form-control" id="account_holder" placeholder="Characters only" autofocus>
                                </div>
                                <div class="col-12 col-sm-6 col-lg-3">
                                    <label for="account_number" class="form-label">Account number</label>
                                    <input type="text" name="account_number" value="{{ request()->account_number }}" class="form-control" id="account_number" placeholder="XXXX XXX XX">
                                </div>
                                <div class="col-12 col-sm-6 col-lg-3">
                                    <label for="diposit_type" class="form-label">Diposit type</label>
                                    <select name="sub_category_id" class="form-control" id="sub_category_id" >
                                        <option value="" selected disabled>---</option>
                                        @foreach ($subcategory as $record)
                                            <option value="{{ $record->id }}" {{ (request()->sub_category_id == $record->id) ? 'selected' : '' }}>{{ $record->title }}</option>
                                        @endforeach
                                    </select>
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
                                <th scope="col">Account Holder</th>
                                <th scope="col">Account number </th>
                                <th scope="col">Account Type </th>
                                <th scope="col">Deposite Type </th>
                                <th scope="col">Amount</th>
                                <th scope="col" class="print-none text-end">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($diposits as $key => $diposit)
                                <tr>
                                    <th scope="row">{{ $diposits->firstItem() + $key }}.</th>
                                    <td>{{ $diposit->account->contact->owner_name?? '' ?? '' }}</td>
                                    <td>{{ $diposit->account->account_number }}</td>
                                    <td>{{ $diposit->account->category->title }}</td>
                                    <td>{{ $diposit->sub_category->title }}</td>
                                    <td>{{ $diposit->amount }}</td>
                                    <td class="print-none text-end">
                                        <a href="{{ route('diposit.show', $diposit->id) }}" class="btn table-small-button" title="View" target="_blank"><i class="bi bi-eye"></i>
                                        </a>

                                        {{-- <a href="{{ route('diposit.edit', $diposit->id) }}" class="btn table-small-button text-success" title="Update"><i class="bi bi-pencil-square"></i>
                                        </a> --}}

                                        <span data-bs-toggle="tooltip" title="Trash">
                                            <a href="#" class="btn table-small-button text-danger" onclick="if(confirm('Are you sure want to delete?')) { document.getElementById('category-delete-{{ $diposit->id }}').submit() } return false ">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </span>

                                        <form action="{{ route('diposit.destroy', $diposit->id) }}" method="post" class="d-none" id="category-delete-{{ $diposit->id }}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <th colspan="7">List is empty.</th>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- data table end -->

                <!-- paginate -->
                <div class="mb-5 card-footer print-none">
                    <nav aria-label="Page navigation example" class="d-flex justify-content-end">
                        {{ optional($diposits)->links() }}
                    </nav>
                </div>
                <!-- pagination end -->

            </div>
            <!-- content body end -->
        </div>
        <!-- card end -->
    </div>
</x-app-layout>