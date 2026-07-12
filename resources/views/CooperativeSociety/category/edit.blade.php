<x-app-layout>
    <x-slot name="title">Category </x-slot>

    <div class="container">
        <!-- container menu -->
        @include('CooperativeSociety.category.menu')
        <!-- container menu end -->

        <div class="border-0 card">
            <div class="p-0 mt-4 mb-3 border-0 card-header d-flex">
                <!-- page title -->
                <div>
                    <h4 class="main-title">Update category</h4>
                    <p><small>Can Update <strong>category</strong> from here.</small></p>
                </div>

                <!-- header icon -->
                <a href="{{ route('category.index') }}" title="Go back" class="mt-3 mb-2 pe-0 ms-auto print-none top-icon-button">
                    <i class="bi bi-arrow-left"></i>
                </a>
            </div>

            <div class="p-0 pt-3 card-body">
                <form action="{{ route('category.update',$record->id) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="project-title" class="mt-1 form-label required">Category title</label>
                        </div>

                        <div class="col-md-6">
                            <input type="text" name="title" value="{{ old('title', $record->title) }}" class="form-control" id="project-title" placeholder="Characters only" required>

                            <!-- error -->
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="description" class="mt-1 form-label">Description</label>
                        </div>

                        <div class="col-md-6">
                            <textarea name="description" class="form-control" id="description" rows="3" placeholder="Optional">{{ old('description', $record->description) }}</textarea>
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
                                <span class="p-1">Update</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
