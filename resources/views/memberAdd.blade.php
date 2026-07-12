<x-app-layout>
    <x-slot name="title">Add New Member</x-slot>

    <div class="container mt-2">
        <div class="card mb-5 border-0">
            <div class="card-header p-0 border-0 d-flex">
                <!-- page title -->
                <div class="mt-3">
                    <h4 class="main-title">Add New Member</h4>
                    <p><small>All fields with '*' are required.</small></p>
                </div>

                <!-- header icon -->
                <a href="{{ route('dashboard') }}" title="Go back" data-bs-toggle="tooltip"
                    class="pe-0 ms-auto print-none top-icon-button mb-2 mt-3">
                    <i class="bi bi-arrow-left"></i>
                </a>
            </div>
            
            <div class="card-body p-0 pt-3">
                <form action="" method="POST">
                    @csrf

                    <div class="row gy-3 mt-3">

                        <!-- Full Name -->
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="full-name" class="form-label required mt-1">Full Name</label>
                                </div>
                                <div class="col-md-6">
                                    <input id="full-name" class="form-control" type="text" name="full_name" required>
                                </div>
                            </div>
                        </div>

                        <!-- Father's Name -->
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="father-name" class="form-label required mt-1">Father's Name</label>
                                </div>
                                <div class="col-md-6">
                                    <input id="father-name" class="form-control" type="text" name="father_name" required>
                                </div>
                            </div>
                        </div> 

                        <!-- Mother's Name -->
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="mother-name" class="form-label required mt-1">Mother's Name</label>
                                </div>
                                <div class="col-md-6">
                                    <input id="mother-name" class="form-control" type="text" name="mother_name" required>
                                </div>
                            </div>
                        </div>

                        <!-- Mother's Name -->
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="mother-name" class="form-label required mt-1">Mother's Name</label>
                                </div>
                                <div class="col-md-6">
                                    <input id="mother-name" class="form-control" type="text" name="mother_name" required>
                                </div>
                            </div>
                        </div>

                        <!-- Button -->
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-2">&nbsp;</div>
                                <div class="col-md-7">
                                    <button type="submit" class="btn btn-success custom-btn"> 
                                        <i class="bi bi-save2"></i> 
                                        Save Data 
                                    </button>
                                    <button type="reset" class="btn btn-light custom-btn me-3"> 
                                        <i class="bi bi-dash-square"></i> 
                                        Reset
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>