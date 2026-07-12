<x-app-layout>
    <x-slot name="title">Upload media </x-slot>

    <div class="container">
        <!-- container menu -->
        @include('contact.menu')
        <!-- container menu end -->

        <div class="border-0 card">
            <div class="p-0 mb-3 border-0 card-header d-flex">
                <!-- page title -->
                <div class="mt-3">
                    <h4 class="main-title">Upload new media</h4>
                    <p><small>Can upload photo, signature or any media multiple times.</small></p>
                </div>

                <!-- header icon -->
                <a href="{{ route('contact.index') }}" title="Go back" class="mt-3 mb-2 pe-0 ms-auto print-none top-icon-button">
                    <i class="bi bi-arrow-left"></i>
                </a>
            </div>

            <div class="p-0 pt-3 card-body">
                <div class="row">
                    <div class="col-12">

                        <!-- payment -->
                        <form action="{{ route('media.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            {{-- hidden fileds --}}
                            <input type="hidden" name="contact_id" value="{{ request('id') }}">

                            <!-- media upload -->
                            <div class="mb-5 row">
                                <div class="col-2">
                                    <label for="contact-media" class="form-label required">Media </label>
                                </div>

                                <div class="col-6">
                                    <div class="media-upload">
                                        <input type="file" name="media" onchange="photoInput(event)">
                                        <img src="{{ asset(isset($media) ? 'storage/'. $media->path : 'images/upload-symbol.png') }}" width="300px" alt="Upload media">

                                        <small class="d-block">300x300 px, lessthen 300 kb.</small>
                                    </div>

                                    <!-- error -->
                                    @error('media')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <!-- media upload end -->

                            <!-- media type -->
                            <div class="mb-3 row">
                                <div class="col-2">
                                    <label for="contact-media" class="form-label required">Media Type</label>
                                </div>

                                <div class="col-3">
                                    <select name="contact_media_type" class="form-control" id="contact-media">
                                        <option value="" selected disabled>-- </option>
                                        @foreach (config('utilities.contact_media') as $media)
                                            <option value="{{ $media }}">{{ $media }}</option>
                                        @endforeach
                                    </select>

                                    <!-- error -->
                                    @error('contact_media_type')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <!-- media type end -->

                            <div class="mb-3 row">
                                <div class="col-2">
                                    <label class="mt-1 form-label">&nbsp;</label>
                                </div>

                                <div class="col-10">
                                    <button type="reset" class="btn btn-warning me-2">
                                        <i class="bi bi-dash-square"></i>
                                        <span class="p-1">Reset</span>
                                    </button>

                                    <button type="submit" class="btn btn-success">
                                        <i class="bi bi-plus-square"></i>
                                        <span class="p-1">Save</span>
                                    </button>
                                    <button type="submit" name="submit" value="finish" class="btn btn-primary">
                                        <i class="bi bi-plus-square"></i>
                                        <span class="p-1">Save & Finish</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <!-- payment end -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            // Image upload function
            function readURL(input, outputId) {
                console.log(input.files[0].type);

                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    if(input.files[0].type === 'image/jpeg' || input.files[0].type === 'image/jpg' || input.files[0].type === 'image/png') {
                        reader.onload = function (e) {
                            outputId.setAttribute('src', e.target.result);
                        }
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            function photoInput() {
                readURL(event.target, event.target.nextElementSibling);
            }
        </script>
    @endpush
</x-app-layout>
