<x-app-layout>
    <x-slot name="title">Test </x-slot>

    <div class="container">
        <!-- container menu -->
        @include('test.menu')
        <!-- container menu end -->

        <div class="border-0 card">
            <div class="p-0 mt-4 mb-3 border-0 card-header d-flex">
                <!-- page title -->
                <div>
                    <h4 class="main-title">Create new Test</h4>
                    <p><small>Can create <strong>Test </strong> from here.</small></p>
                </div>

                <!-- header icon -->
                <a href="{{ route('test-group.index') }}" title="Go back" class="mt-3 mb-2 pe-0 ms-auto print-none top-icon-button">
                    <i class="bi bi-arrow-left"></i>
                </a>
            </div>

            <div class="p-0 pt-3 card-body">
                <form action="{{ route('test.update',$test->id) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="project-title" class="mt-1 form-label required">Test name</label>
                        </div>

                        <div class="col-md-5">
                            <input type="text" name="title" value="{{ old('title', $test->title ) }}" class="form-control" id="project-title" placeholder="Characters only" required>

                            <!-- error -->
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="project-title" class="mt-1 form-label required">Group name</label>
                        </div>

                        <div class="col-md-3">
                            <select name="test_group_id" class="form-control" id="" required>
                                <option value="" selected disabled>---</option>
                                @foreach ($testGroups as $testGroup)
                                <option value="{{ $testGroup->id }}" {{old('test_group_id',$test->test_group_id)==$testGroup->id? 'selected': ''}} >{{$testGroup->title}}</option>
                                @endforeach
                            </select>

                            <!-- error -->
                            @error('test_group_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="budget" class="mt-1 form-label required">Price</label>
                        </div>

                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="number" name="price" value="{{ old('price',$test->price) }}" step="any" min="0" class="form-control" id="budget" placeholder="0.00" aria-describedby="budget-addon" required>
                                <span class="input-group-text" id="budget-addon">Tk</span>
                            </div>

                            <!-- error -->
                            @error('price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="budget" class="mt-1 form-label">Report time</label>
                        </div>

                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="number" name="report_time" value="{{ old('report_time',$test->report_time) }}" step="any" min="0" class="form-control" id="budget" placeholder="xx:xx:xx" aria-describedby="budget-addon">
                                <span class="input-group-text" id="budget-addon">hour</span>
                            </div>

                            <!-- error -->
                            @error('price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <!--Room no-->
                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="room" class="mt-1 form-label">Room no.</label>
                        </div>

                        <div class="col-md-2">
                            <div class="input-group">
                                <input type="number" name="room" value="{{ old('room',$test->room) }}" step="any" min="0" class="form-control" id="room" placeholder="" aria-describedby="budget-addon">
                                {{-- <span class="input-group-text" id="budget-addon">hour</span> --}}
                            </div>

                            <!-- error -->
                            @error('room')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <!--Room no end-->
                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="budget" class="mt-1 form-label">Discount</label>
                        </div>

                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="number" name="discount" value="{{ old('discount',$test->discount) }}" step="any" min="0" class="form-control" id="budget" placeholder="0.00" aria-describedby="budget-addon">
                                <select name="discount_type" class="form-control" id="budget-addon">
                                    <option value="percent">Percent (%)</option>
                                    <option value="flat">Flat</option>
                                </select>
                                {{-- <span class="input-group-text" >hour</span> --}}
                            </div>

                            <!-- error -->
                            @error('discount')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="budget" class="mt-1 form-label">Commission</label>
                        </div>

                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="number" name="commission" value="{{ old('commission',$test->commission) }}" step="any" min="0" class="form-control" id="budget" placeholder="0.00" aria-describedby="budget-addon">
                                <select name="commission_type" class="form-control" id="budget-addon">
                                    <option value="percent">Percent (%)</option>
                                    <option value="flat">Flat</option>
                                </select>
                                {{-- <span class="input-group-text" >hour</span> --}}
                            </div>

                            <!-- error -->
                            @error('commission')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="description" class="mt-1 form-label">Description</label>
                        </div>

                        <div class="col-md-6">
                            <textarea name="description" class="form-control" id="description" rows="3" placeholder="Optional">{{ old('description',$test->description) }}</textarea>
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
