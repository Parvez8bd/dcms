<x-app-layout>
    <x-slot name="title">Test </x-slot>

    <div class="container">
        <!-- container menu -->
        @include('test.menu')
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
                    <h4 class="main-title">Test </h4>
                    <p><small>About {{ $tests->total() }} results found.</small></p>
                </div>

                <!-- Print -->
                <a href="#" class="btn top-icon-button print-none ms-auto" title="Print" onclick="window.print()">
                    <i class="bi bi-printer"></i>
                </a>

                <!-- refresh -->
                <a href="{{ route('test.index') }}" class="btn top-icon-button print-none" title="Refresh">
                    <i class="bi bi-arrow-clockwise"></i>
                </a>

                <!-- search -->
                <a href="#category-search"
                   class="btn top-icon-button print-none" title="Search" data-bs-toggle="collapse" role="button" aria-expanded="false">
                    <i class="bi bi-search"></i>
                </a>

                <!-- add -->
                <a href="{{ route('test.create') }}" class="btn top-icon-button print-none" title="Create new category">
                    <i class="bi bi-plus-circle"></i>
                </a>
            </div>
            <!-- card head end -->

            <!-- content body -->
            <div class="p-0 card-body">
                <!-- search area -->
                <div class="collapse print-none {{ request()->search ? 'show' : '' }}" id="category-search">
                    <div class="px-0 border-0 card card-body rounded-0">
                        <!-- search form -->
                        <form action="{{ route('test.index') }}" method="GET">
                            <input type="hidden" name="search" value="1">

                            <div class="row gy-1 gx-3">
                                <div class="col-12 col-sm-6 col-lg-3">
                                    <label for="project-title" class="form-label">Test name</label>
                                    <input type="text" name="title" value="{{ request()->title }}" class="form-control" id="course-name" placeholder="Characters only" autofocus>
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
                                <th scope="col">name</th>
                                <th scope="col">Group</th>
                                <th scope="col">Report time (hour)</th>
                                <th scope="col">Room no.</th>
                                <th scope="col" class="text-end">Price (BDT)</th>
                                <th scope="col" class="text-end">Discount (BDT)</th>
                                <th scope="col" class="text-end">Commision (BDT)</th>
                                <th scope="col" class="print-none text-end">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($tests as $key => $record)
                                <tr>
                                    <th scope="row">{{ $tests->firstItem() + $key }}.</th>
                                    <td>{{ $record->title }}</td>
                                    <td>{{ $record?->test_group?->title }}</td>
                                    <td>{{ $record->report_time }}</td>
                                    <td>{{ $record->room }}</td>
                                    <td class="text-end">{{ $record->price}}</td>
                                    <td class="text-end">{{ $record->discount}} {{ $record->discount_type == 'percent' ? '%' : '' }}</td>
                                    <td class="text-end">{{ $record->commission}} {{ $record->commission_type == 'percent' ? '%' : '' }}</td>
                                    <td class="print-none text-end">
                                        {{-- <a href="{{ route('category.show', $record->id) }}" class="btn table-small-button" title="View"><i class="bi bi-eye"></i>
                                        </a> --}}

                                        <a href="{{ route('test.edit', $record->id) }}" class="btn table-small-button text-success" title="Update"><i class="bi bi-pencil-square"></i>
                                        </a>

                                        <span data-bs-toggle="tooltip" title="Trash">
                                            <a href="#" class="btn table-small-button text-danger" onclick="if(confirm('Are you sure want to delete?')) { document.getElementById('category-delete-{{ $record->id }}').submit() } return false ">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </span>

                                        <form action="{{ route('test.destroy', $record->id) }}" method="post" class="d-none" id="category-delete-{{ $record->id }}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <th colspan="9">List is empty.</th>
                                </tr>
                            @endforelse
                        </tbody>

                        {{-- @if ($tests != null)
                        <tfoot>
                            <tr>
                                <th colspan="2" class="text-end">Total</th>
                                <th class="text-end">{{ number_format($tests->sum('budget'), 2) }}</th>
                                <th>&nbsp;</th>
                            </tr>
                        </tfoot>
                        @endif --}}
                    </table>
                </div>
                <!-- data table end -->

                <!-- paginate -->
                <div class="mb-5 card-footer print-none">
                    <nav aria-label="Page navigation example" class="d-flex justify-content-end">
                        {{ optional($tests)->links() }}
                    </nav>
                </div>
                <!-- pagination end -->

            </div>
            <!-- content body end -->
        </div>
        <!-- card end -->
    </div>
</x-app-layout>