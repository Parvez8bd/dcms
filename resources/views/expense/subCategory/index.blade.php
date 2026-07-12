<x-app-layout>
    <x-slot name="title">Expense Subcategory </x-slot>

    <div class="container">
        <!-- container menu -->
        @include('expense.subCategory.menu')
        <!-- container menu end -->

        <!-- print header -->
        @include('layouts.partials.print-head')
        <!-- print header end -->

        <!-- card start -->
        <div class="border-0 card">
            <!-- card head -->
            <div class="p-0 mb-3 border-0 card-header d-md-flex align-items-center d-block">
                <!-- page title -->
                <div class="mt-3 mb-2">
                    <h4 class="main-title">Expenses Subcategory</h4>
                    <p><small>About Expenses Subcategory <strong>{{ $records->total() }}</strong> results found.</small></p>

                </div>

                <!-- Print -->
                <a href="#" class="btn top-icon-button print-none ms-auto" title="Print" onclick="window.print()">
                    <i class="bi bi-printer"></i>
                </a>

                <!-- refresh -->
                <a href="{{ route('expense-subcategory.index') }}" class="btn top-icon-button print-none" title="Refresh">
                    <i class="bi bi-arrow-clockwise"></i>
                </a>

                <!-- search -->
                <a href="#expense-subcategory-search"
                   class="btn top-icon-button print-none" title="Search" data-bs-toggle="collapse" role="button" aria-expanded="false">
                    <i class="bi bi-search"></i>
                </a>

                <!-- add -->
                <a href="{{ route('expense-subcategory.create') }}" class="btn top-icon-button print-none" title="Create new course">
                    <i class="bi bi-plus-circle"></i>
                </a>
            </div>
            <!-- card head end -->

            <!-- content body -->
            <div class="p-0 card-body">
                <!-- search area -->
                <div class="collapse {{ request()->search ? 'show' : '' }}" id="expense-subcategory-search">
                    <div class="px-0 border-0 card card-body rounded-0">
                        <!-- search form -->
                        <form action="{{ route('expense-subcategory.index') }}" method="GET">
                            <input type="hidden" name="search" value="1">

                            <div class="row gy-1 gx-3">
                                <div class="col-12 col-sm-6 col-lg-3">
                                    <label for="expense-subcategory-name" class="form-label">Expenses Subcategory </label>
                                    <input type="text" name="name" value="{{ request()->name }}" class="form-control" id="expense-subcategory-name" placeholder="Characters only">
                                </div>

                                <!-- button -->
                                <div class="col-12 col-sm-6 col-lg-2">
                                    <label class="form-label">&nbsp;</label>
                                    <button type="submit" class="btn btn-block w-100 custom-btn btn-success">
                                        <i class="bi bi-search"></i>
                                        <span class="p-1">Search </span>
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
                                <th scope="col">Sl</th>
                                <th scope="col">Subcategory</th>
                                <th scope="col">Category</th>
                                <th scope="col" class="text-end">Opening balance </th>
                                <th scope="col" class="print-none text-end">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($records as $record)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}.</th>
                                    <td>{{ $record->name }}</td>
                                    <td>{{ $record->expensesCategory->name}}</td>
                                    <td class="text-end">{{ $record->opening_balance }}</td>
                                    <td class="print-none text-end">
                                        <a href="{{ route('expense-subcategory.show', $record->id) }}" class="btn table-small-button" title="View"><i class="bi bi-eye"></i></a>
                                        <a href="{{ route('expense-subcategory.edit', $record->id) }}" class="btn table-small-button text-success" title="Update"><i class="bi bi-pencil-square"></i></a>

                                        <span data-bs-toggle="tooltip" title="Trash">
                                            <a href="#" class="btn table-small-button text-danger @if ($record->expenses_count) disabled @endif " onclick="if(confirm('Are you sure want to delete?')) { document.getElementById('category-delete-{{ $record->id }}').submit() } return false ">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </span>

                                        <form action="{{ route('expense-subcategory.destroy', $record->id) }}" method="post" class="d-none" id="category-delete-{{ $record->id }}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <th colspan="7">Subcategory  list is empty .</th>
                                </tr>
                            @endforelse
                        </tbody>

                        <tfoot>
                            <tr>
                                <th class="text-end" colspan="3">Total  </th>
                                <th class="text-end">{{ number_format ($records->sum('opening_balance'),2) }} </th>
                                <th colspan="2">&nbsp;</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- data table end -->

                <!-- paginate -->
                <div class="mb-5 card-footer print-none">
                    <nav aria-label="Page navigation example" class="d-flex justify-content-end">
                        {{ optional($records)->links() }}
                    </nav>
                </div>
                <!-- pagination end -->

            </div>
            <!-- content body end -->
        </div>
        <!-- card end -->
    </div>
</x-app-layout>
