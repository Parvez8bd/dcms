<x-app-layout>
    <x-slot name="title">Project </x-slot>

    <div class="container">
        <!-- container menu -->
        @include('project.menu')
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
                    <h4 class="main-title">Projects</h4>
                    <p><small>About {{ $projects->total() }} results found.</small></p>
                </div>

                <!-- Print -->
                <a href="#" class="btn top-icon-button print-none ms-auto" title="Print" onclick="window.print()">
                    <i class="bi bi-printer"></i>
                </a>

                <!-- refresh -->
                <a href="{{ route('project.index') }}" class="btn top-icon-button print-none" title="Refresh">
                    <i class="bi bi-arrow-clockwise"></i>
                </a>

                <!-- search -->
                <a href="#project-search"
                   class="btn top-icon-button print-none" title="Search" data-bs-toggle="collapse" role="button" aria-expanded="false">
                    <i class="bi bi-search"></i>
                </a>

                <!-- add -->
                <a href="{{ route('project.create') }}" class="btn top-icon-button print-none" title="Create new project">
                    <i class="bi bi-plus-circle"></i>
                </a>
            </div>
            <!-- card head end -->

            <!-- content body -->
            <div class="p-0 card-body">
                <!-- search area -->
                <div class="collapse print-none {{ request()->search ? 'show' : '' }}" id="project-search">
                    <div class="px-0 border-0 card card-body rounded-0">
                        <!-- search form -->
                        <form action="{{ route('project.index') }}" method="GET">
                            <input type="hidden" name="search" value="1">

                            <div class="row gy-1 gx-3">
                                <div class="col-12 col-sm-6 col-lg-3">
                                    <label for="project-title" class="form-label">Project Title</label>
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
                                <th scope="col">Title</th>
                                <th scope="col" class="text-end">Budget </th>
                                <th scope="col" class="print-none text-end">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($projects as $key => $project)
                                <tr>
                                    <th scope="row">{{ $projects->firstItem() + $key }}.</th>
                                    <td>{{ $project->title }}</td>
                                    <td class="text-end">{{ number_format($project->budget, 2) }}</td>
                                    <td class="print-none text-end">
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Action</button>

                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('project.show', $project->id) }}" target="_blank">
                                                        <i class="bi bi-eye"></i> 
                                                        Details
                                                    </a>
                                                </li>

                                                <li>
                                                    <a class="dropdown-item" href="{{ route('project.edit', $project->id) }}" target="_blank">
                                                        <i class="bi bi-pencil"></i> 
                                                        Update
                                                    </a>
                                                </li>

                                                <li>
                                                    <a class="dropdown-item" href="#" onclick="if(confirm('Are you sure want to delete?')) { document.getElementById('project-delete-{{ $project->id }}').submit() } return false">
                                                        <i class="bi bi-trash"></i>
                                                        Delete
                                                    </a>

                                                    <form action="{{ route('project.destroy', $project->id) }}" method="POST" class="d-none" id="project-delete-{{ $project->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <th colspan="4">List is empty.</th>
                                </tr>
                            @endforelse
                        </tbody>

                        @if ($projects != null)
                        <tfoot>
                            <tr>
                                <th colspan="2" class="text-end">Total</th>
                                <th class="text-end">{{ number_format($projects->sum('budget'), 2) }}</th>
                                <th>&nbsp;</th>
                            </tr>
                        </tfoot>
                        @endif
                    </table>
                </div>
                <!-- data table end -->

                <!-- paginate -->
                <div class="mb-5 card-footer print-none">
                    <nav aria-label="Page navigation example" class="d-flex justify-content-end">
                        {{ optional($projects)->links() }}
                    </nav>
                </div>
                <!-- pagination end -->

            </div>
            <!-- content body end -->
        </div>
        <!-- card end -->
    </div>
</x-app-layout>