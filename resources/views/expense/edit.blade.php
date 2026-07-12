<x-app-layout>
    <x-slot name="title">Expense </x-slot>

    <div class="container">
        <!-- container menu -->
        @include('expense.menu')
        <!-- container menu end -->

        <div class="border-0 card">
            <div class="p-0 mb-3 border-0 card-header d-flex">
                <!-- page title -->
                <div class="mt-3">
                    <h4 class="main-title">Expense Update </h4>
                    <p><small>Can<strong>Expense </strong> Update from here .</small></p>
                </div>

                <!-- header icon -->
                <a href="{{ route('expense.index') }}" title="Go back" class="mt-3 mb-2 pe-0 ms-auto print-none top-icon-button">
                    <i class="bi bi-arrow-left"></i>
                </a>
            </div>

            <div class="p-0 pt-3 card-body">
                <form action="{{ route('expense.update', $record->id)}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <!-- type text -->
                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="date" class="mt-1 form-label required">Date </label>
                        </div>

                        <div class="col-md-4">
                            <input type="date" name="date" value="{{ $record->date }}" class="form-control" id="date">

                            <!-- error -->
                            @error('date')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- component --}}
                     <div
                        data-categories="{{ $categories }}"
                        data-errors="{{ $errors ?? [] }}"
                        data-records="{{ $record ?? [] }}"
                        id="add-category-and-subcatigories"></div>

                    <div class="mb-3 row">
                            <div class="col-md-2">
                                <label for="amount" class="mt-1 form-label required">Amount </label>
                            </div>

                            <div class="col-md-3">
                                <div class="input-group">
                                    <input type="number" name="amount" value="{{ $record->amount }}" step="any" min="0" class="form-control"
                                        id="amount" placeholder="0.00" aria-describedby="amount-addon" required>
                                </div>

                                <!-- error -->
                            @error('amount')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                            </div>
                    </div>

                        <div class="mb-3 row">
                            <div class="col-md-2">
                                <label for="amount" class="mt-1 form-label">Deduct </label>
                            </div>

                            <div class="col-md-3">
                                <div class="input-group">
                                    <input type="number" name="deduct" value="{{ $record->deduct }}" step="any" min="0" class="form-control"
                                        id="deduct" placeholder="0.00" aria-describedby="deduct-addon">
                                </div>

                                <!-- error -->
                            @error('deduct')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-md-2">
                                <label for="note" class="mt-1 form-label">Description </label>
                            </div>

                            <div class="col-md-6">
                                <textarea name="description" class="form-control" id="description" rows="3"
                                    placeholder="Optional">{{ $record->description }}</textarea>

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
                                <span class="p-1">Update </span>
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
