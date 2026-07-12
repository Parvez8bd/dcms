<x-app-layout>
    <x-slot name="title">Expense subcategory </x-slot>

    <div class="container">
        <!-- container menu -->
        @include('expense.subCategory.menu')
        <!-- container menu end -->

        <div class="border-0 card">
            <div class="p-0 mb-3 border-0 card-header d-flex">
                <!-- page title -->
                <div class="mt-3">
                    <h4 class="main-title"> Subcategory Edit</h4>
                    <p><small>Can <strong>Subcategory </strong> update from here.</small></p>

                </div>

                <!-- header icon -->
                <a href="{{ route('expense-subcategory.index') }}" title="Go back" class="mt-3 mb-2 pe-0 ms-auto print-none top-icon-button">
                    <i class="bi bi-arrow-left"></i>
                </a>
            </div>

            <div class="p-0 pt-3 card-body">
                <form action="{{ route('expense-subcategory.update', $record->id) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <!-- type text -->
                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="category-id" class="mt-1 form-label required">Select category </label>
                        </div>

                        <div class="col-md-3">
                            <select name="expenses_category_id" class="form-control" id="category-id" required>
                                <option value="" selected disabled>--</option>

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ (old('expenses_category_id', $record->expenses_category_id) == $category->id) ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach

                            </select>

                                <!-- error -->
                            @error('category_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="subcategory-name" class="mt-1 form-label required">  Namen </label>

                        </div>

                        <div class="col-md-4">
                            <input type="text" name="name" value="{{ $record->name }}" class="form-control" id="subcategory-name" placeholder="Characters only">

                            <!-- error -->
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="opening-balance" class="mt-1 form-label required">Opening balance </label>
                        </div>

                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="number" name="opening_balance" value="{{ $record->opening_balance }}" step="any" min="0" class="form-control"
                                        id="opening-balance" placeholder="0.00" aria-describedby="opening-balance-addon" required>
                            </div>

                            <!-- error -->
                            @error('opening_balance')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror

                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-md-2">
                                <label for="description" class="mt-1 form-label">Description </label>
                        </div>

                        <div class="col-md-6">
                            <textarea name="description" class="form-control" id="description" rows="3"
                                placeholder="{{__('contents.optional')}}">{{ $record->description }}</textarea>

                                    <!-- error -->
                            @error('description')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror

                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label class="mt-1 form-label">&nbsp;</label>
                        </div>

                        <div class="col-md-10">
                            <button type="reset" class="btn btn-warning me-2">
                                <i class="bi bi-dash-square"></i>
                                <span class="p-1">Reset </span>
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

