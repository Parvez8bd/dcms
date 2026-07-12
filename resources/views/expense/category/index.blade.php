<x-app-layout>
    <x-slot name="title">Expense Category </x-slot>

    <div class="container">
        <!-- container menu -->
        @include('expense.category.menu')
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
                    <h4 class="main-title">Expenses Category</h4>
                    <p><small>About {{ $records->total() }} results found.</small></p>
                </div>

                <!-- Print -->
                <a href="#" class="btn top-icon-button print-none ms-auto" title="Print" onclick="window.print()">
                    <i class="bi bi-printer"></i>
                </a>

                <!-- refresh -->
                <a href="{{ route('expense-category.index') }}" class="btn top-icon-button print-none" title="Refresh">
                    <i class="bi bi-arrow-clockwise"></i>
                </a>

                <!-- search -->
                <a href="#expense-category-search"
                   class="btn top-icon-button print-none" title="Search" data-bs-toggle="collapse" role="button" aria-expanded="false">
                    <i class="bi bi-search"></i>
                </a>

                <!-- add -->
                <a href="{{ route('expense-category.create') }}" class="btn top-icon-button print-none" title="Create new course">
                    <i class="bi bi-plus-circle"></i>
                </a>
            </div>
            <!-- card head end -->

            <!-- content body -->
            <div class="p-0 card-body">
                <!-- search area -->
                <div class="collapse {{ request()->search ? 'show' : '' }}" id="expense-category-search">
                    <div class="px-0 border-0 card card-body rounded-0">
                        <!-- search form -->
                        <form action="{{ route('expense-category.index') }}" method="GET">
                            <input type="hidden" name="search" value="1">

                            <div class="row gy-1 gx-3">
                                <div class="col-12 col-sm-6 col-lg-3">
                                    <label for="expense-category-name" class="form-label">{{__('contents.Expenses')}} {{__('contents.category')}}</label>
                                    <input type="text" name="name" value="{{ request()->name }}" class="form-control" id="expense-category-name" placeholder="Characters only">
                                </div>

                                <!-- button -->
                                <div class="col-12 col-sm-6 col-lg-2">
                                    <label class="form-label">&nbsp;</label>
                                    <button type="submit" class="btn btn-block w-100 custom-btn btn-success">
                                        <i class="bi bi-search"></i>
                                        <span class="p-1">{{__('contents.seatch')}}</span>
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
                                <th scope="col">Category Name</th>
                                <th scope="col">Description</th>
                                <th scope="col" class="print-none text-end">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($records as $record)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}.</th>
                                    <td>{{ $record->name }}</td>
                                    <td>{{ $record->description }}</td>
                                    <td class="print-none text-end">
                                        {{-- <a href="{{ route('expense-category.show', $record->id) }}" class="btn table-small-button" title="View"><i class="bi bi-eye"></i></a> --}}
                                        <a href="{{ route('expense-category.edit', $record->id) }}" class="btn table-small-button text-success" title="Update"><i class="bi bi-pencil-square"></i></a>

                                        <span data-bs-toggle="tooltip" title="Trash">
                                            <a href="#" class="btn table-small-button text-danger @if($record->expense_subcategories_count) disabled @endif" onclick="if(confirm('Are you sure want to delete?')) { document.getElementById('category-delete-{{ $record->id }}').submit() } return false ">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </span>

                                        <form action="{{ route('expense-category.destroy', $record->id) }}" method="post" class="d-none" id="category-delete-{{ $record->id }}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <th colspan="4">{{__('contents.category')}} {{__('contents.list_is_empty')}} .</th>
                                </tr>
                            @endforelse
                        </tbody>
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
