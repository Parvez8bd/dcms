<x-app-layout>
    <x-slot name="title">Project</x-slot>

    <div class="container">
        <!-- container menu -->
        @include('project.menu')
        <!-- container menu end -->

        <div class="card border-0">
            <div class="card-header p-0 border-0 d-flex mb-3">
                <!-- page title -->
                <div class="mt-3">
                    <h4 class="main-title">Update form</h4>
                    <p><small>Can change all the data from form bellow.</small></p>
                </div>

                <!-- header icon -->
                <a href="{{ route('project.index') }}" title="Go back" class="mt-3 mb-2 pe-0 ms-auto print-none top-icon-button">
                    <i class="bi bi-arrow-left"></i>
                </a>
            </div>

            <div class="card-body p-0 pt-3">
                <form action="{{ route('project.update', $project->id) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="project-title" class="mt-1 form-label required">Project title</label>
                        </div>

                        <div class="col-md-6">
                            <input type="text" name="title" value="{{ old('title', $project->title) }}" class="form-control" id="project-title" placeholder="Characters only">

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
                                <input type="number" name="budget" value="{{ old('budget', $project->budget) }}" step="any" min="0" class="form-control" id="budget" placeholder="00" aria-describedby="budget-addon">
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

                        <div class="col-md-8">
                            <textarea name="description" class="form-control" id="description" rows="5" placeholder="Optional">{{ old('description', $project->description) }}</textarea>
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

                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-plus-square"></i>
                                <span class="p-1">Update changes</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>