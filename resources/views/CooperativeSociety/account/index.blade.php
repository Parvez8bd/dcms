<x-app-layout>
    <x-slot name="title">Account</x-slot>

    <div class="container">
        <!-- container menu -->
        @include('CooperativeSociety.account.menu')

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
                    <h4 class="main-title">Accounts</h4>
                    <p><small>About {{ $accounts->total() }} results found.</small></p>
                </div>

                <!-- Print -->
                <a href="#" class="btn top-icon-button print-none ms-auto" title="Print" onclick="window.print()">
                    <i class="bi bi-printer"></i>
                </a>

                <!-- refresh -->
                <a href="{{ route('account.index') }}" class="btn top-icon-button print-none" title="Refresh">
                    <i class="bi bi-arrow-clockwise"></i>
                </a>

                <!-- search -->
                <a href="#account-search"
                   class="btn top-icon-button print-none" title="Search" data-bs-toggle="collapse" role="button" aria-expanded="false">
                    <i class="bi bi-search"></i>
                </a>

                <!-- add -->
                <a href="{{ route('account.create') }}" class="btn top-icon-button print-none" title="Create new account">
                    <i class="bi bi-plus-circle"></i>
                </a>
            </div>
            <!-- card head end -->

            <!-- content body -->
            <div class="p-0 card-body">
                <!-- search area -->
                <div class="collapse print-none {{ request()->search ? 'show' : '' }}" id="account-search">
                    <div class="px-0 border-0 card card-body rounded-0">
                        <!-- search form -->
                        <form action="{{ route('account.index') }}" method="GET">
                            <input type="hidden" name="search" value="1">

                            <div class="row gy-1 gx-3">
                                <div class="col-12 col-sm-6 col-lg-3">
                                    <label for="owner_name" class="form-label">Account holder</label>
                                    <input type="text" name="owner_name" value="{{ request()->owner_name }}" class="form-control" id="owner_name" placeholder="Characters only" autofocus>
                                </div>
                                <div class="col-12 col-sm-6 col-lg-3">
                                    <label for="account_number" class="form-label">Account number</label>
                                    <input type="text" name="account_number" value="{{ request()->account_number }}" class="form-control" id="account_number" placeholder="XXXX XXX XX" >
                                </div>
                                <div class="col-12 col-sm-6 col-lg-3">
                                    <label for="account_type" class="form-label">Account Type</label>
                                    
                                    <select name="category_id" id="account_type" class="form-control" >
                                        <option value="" selected disabled>---</option>
                                        @foreach ($category as $item)
                                        <option value="{{$item->id}}" {{ request()->category_id == $item->id? 'selected':'' }}>{{$item->title}}</option>
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
                                <th scope="col">Status </th>
                                <th scope="col" class="print-none text-end">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($accounts as $key => $account)
                                <tr>
                                    <th scope="row">{{ $accounts->firstItem() + $key }}.</th>
                                    <td>{{ $account->contact->owner_name?? '' ?? ''}}</td>
                                    <td>{{ $account->account_number }}</td>
                                    <td>{{ $account->category->title }}</td>
                                    <td>{{ $account->sub_category->title }}</td>
                                    <td class=" {{ $account->is_active == 0?'text-danger':'' }} }}">{{ $account->is_active == 1?'Active':'Inactive' }}</td>
                                    <td class="print-none text-end">
                                        <a href="{{ route('account.show', $account->id) }}" class="btn table-small-button" title="View" target="_blank"><i class="bi bi-eye"></i>
                                        </a>

                                        <a href="{{ route('account.edit', $account->id) }}" class="btn table-small-button text-success" title="Update"><i class="bi bi-pencil-square"></i>
                                        </a>

                                        <span data-bs-toggle="tooltip" title="Trash">
                                            <a href="#" class="btn table-small-button text-danger" onclick="if(confirm('Are you sure want to delete?')) { document.getElementById('category-delete-{{ $account->id }}').submit() } return false ">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </span>

                                        <form action="{{ route('account.destroy', $account->id) }}" method="post" class="d-none" id="category-delete-{{ $account->id }}">
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
                        {{ optional($accounts)->links() }}
                    </nav>
                </div>
                <!-- pagination end -->

            </div>
            <!-- content body end -->
        </div>
        <!-- card end -->
    </div>
</x-app-layout>