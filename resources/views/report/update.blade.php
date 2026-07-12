<x-app-layout>
    <x-slot name="title">Report </x-slot>

    <div class="container">
        <!-- container menu -->
        @include('report.menu')
        <!-- container menu end -->

        <div class="border-0 card">
            <div class="p-0 mt-4 mb-3 border-0 card-header d-flex">
                <!-- page title -->
                <div>
                    <h4 class="main-title">Report Edit</h4>
                    <p><small>Can update <strong>Report </strong> from here.</small></p>
                </div>

                <!-- header icon -->
                @if (Route::currentRouteName() == 'report.show')
                       <!-- header icon -->
                    <a href="{{ route('report.index') }}" title="Go back"
                    class="mt-3 mb-2 pe-0 ms-auto print-none top-icon-button">
                        <i class="bi bi-arrow-left"></i>
                    </a> 
                    @else
                        <!-- header icon -->
                    <a href="{{ route('lab-report.create') }}" title="Go back"
                    class="mt-3 mb-2 pe-0 ms-auto print-none top-icon-button">
                        <i class="bi bi-arrow-left"></i>
                    </a> 
                    @endif
            </div>

            <div class="p-0 pt-3 card-body">
                <form action="{{ route('report.update',$report->id) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="title" class="mt-1 form-label ">Report Information</label>
                        </div>

                        <div class="col-md-3">
                            <span type="text" name="title"  class="form-control" id="title" placeholder="Ex: INV054352f" required autofocus>Invoice no : {{ $report->invoice->invoice_no }}</span>
                            <input hidden type="text" name="id"  class="form-control" value="{{   $report->id }}"></input>
                        </div>
                        <div class="col-md-3">
                            <span type="text" class="form-control" id="title" placeholder="Ex: INV054352f" required autofocus>Test Group : {{ $report->test->test_group->title }}</span>
                        </div>
                        <div class="col-md-3">
                            <span type="text" class="form-control" id="title" placeholder="Ex: INV054352f" required autofocus>Test Name : {{ $report->test->title }}</span>
                        </div>
                    </div>
                    


                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <label for="editor" class="mt-1 form-label required" >Report </label>
                        </div>

                        <div class="col-md-9">
                            <textarea name="report"  class="form-control" id="editor" rows="3" placeholder="Optional">{{ old('report',$report->report) }}</textarea>
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
    @push('script')
    <script src="{{ asset('ckeditor5/ckeditor.js') }}"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
        </script>
        
    @endpush
    @push('style')
    <style>
        toolbar: {
    items: [ 'bold', 'italic', '|', 'undo', 'redo', '-', 'numberedList', 'bulletedList' ],
    shouldNotGroupWhenFull: true
}

    </style>
        
    @endpush
</x-app-layout>
