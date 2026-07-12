<x-app-layout>
    <x-slot name="title">Project</x-slot>

    <div class="container">
        <!-- container menu -->
        @include('project.menu')
        <!-- container menu end -->

        <div class="container">
            <div class="border-0 card">
                <div class="mt-4 mb-3 p-0 border-0 card-header d-flex">
                    <!-- page title -->
                    <div class="mt-3">
                        <h4 class="main-title">Project details</h4>
                        <p><small>All the details below.</small></p>
                    </div>

                    <!-- header icon -->
                    <a href="javascript:window.open('','_self').close();" title="Go back"
                    class="mt-3 mb-2 pe-0 ms-auto print-none top-icon-button">
                        <i class="bi bi-arrow-left"></i>
                    </a>

                </div>
        
                <div class="p-0 card-body">
                    <dl>
                        <dt class="text-muted">Project</dt>
                        <dd class="fs-3 mb-3"><strong>{{ $project->title }}</strong></dd>

                        <dt class="text-muted">Create date</dt>
                        <dd class="fs-5 mb-3">
                            @if ($project->created_at != null )
                            {{ $project->created_at->format('d F, Y') }}
                            @endif
                        </dd>

                        <dt class="text-muted">Budget</dt>
                        <dd class="fs-5 mb-3"><strong>{{ number_format($project->budget, 2) }}</strong></dd>

                        <dt class="text-muted">Description</dt>
                        <dd><p>{{ $project->description }}</p></dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>