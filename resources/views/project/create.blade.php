<x-app-layout>
    <x-slot name="title">Project </x-slot>

    <div class="container">
        <!-- container menu -->
        @include('project.menu')
        <!-- container menu end -->

        <div class="border-0 card">
            <div class="p-0 mt-4 mb-3 border-0 card-header d-flex">
                <!-- page title -->
                <div>
                    <h4 class="main-title">Create new project</h4>
                    <p><small>Can create <strong>project</strong> from here.</small></p>
                </div>

                <!-- header icon -->
                <a href="{{ route('project.index') }}" title="Go back" class="mt-3 mb-2 pe-0 ms-auto print-none top-icon-button">
                    <i class="bi bi-arrow-left"></i>
                </a>
            </div>

            <div class="p-0 pt-3 card-body">
                <form action="{{ route('project.store') }}" method="POST">
                    @csrf

                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="project-title" class="mt-1 form-label required">Project title</label>
                        </div>

                        <div class="col-md-6">
                            <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="project-title" placeholder="Characters only" required>

                            <!-- error -->
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="budget" class="mt-1 form-label">Budget</label>
                        </div>

                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="number" name="budget" value="{{ old('budget') }}" step="any" min="0" class="form-control" id="budget" placeholder="00" aria-describedby="budget-addon">
                                <span class="input-group-text" id="budget-addon">BDT</span>
                            </div>

                            <!-- error -->
                            @error('budget')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="description" class="mt-1 form-label">Description</label>
                        </div>

                        <div class="col-md-6">
                            <textarea name="description" class="form-control" id="description" rows="3" placeholder="Optional">{{ old('description') }}</textarea>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label class="mt-1 form-label">&nbsp;</label>
                        </div>

                        <div class="col-md-10">
                            <button type="reset" class="btn btn-warning me-2">
                                <i class="bi bi-dash-square"></i>
                                <span class="p-1">Reset</span>
                            </button>

                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-plus-square"></i>
                                <span class="p-1">Save</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
