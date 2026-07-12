<x-app-layout>
    <x-slot name="title">member </x-slot>

    <div class="container">
        <!-- container menu -->
        @include('CooperativeSociety.member.menu')

        <!-- container menu end -->

         <!-- table -->
         <div class="border-0 card">
            <div class="p-0 mt-4 mb-3 border-0 card-header d-md-flex align-items-center d-block">
                <!-- page title -->
                <div>
                    <h4 class="main-title">Trash records</h4>
                    <p><small>About {{ $records->total() }} results found.</small></p>
                </div>

                <!-- refresh -->
                <a href="{{ route('member.trash') }}" data-bs-toggle="tooltip" data-bs-placement="bottom" class="btn top-icon-button ms-auto print-none" title="Refresh">
                    <i class="bi bi-arrow-clockwise"></i>
                </a>

                <!-- add -->
                <a href="{{ route('member.create') }}" class="btn top-icon-button print-none" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Create new member">
                    <i class="bi bi-plus-circle"></i>
                </a>
            </div>

            <!-- content body -->
            <div class="p-0 card-body">
                <!-- data table -->
                <div class="mb-3 d-block">
                    <form action="{{ route('member.trash') }}" method="POST">
                        @csrf

                        <div class="table-responsive">
                            <table class="table custom-table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col" class="p-0">
                                            <label for="check-all" class="p-2 d-block">
                                                <input type="checkbox" class="me-2" id="check-all">
                                                <span>SL </span>
                                            </label>
                                        </th>
                                        <th scope="col">Owner</th>
                                        <th scope="col">Organigation </th>
                                        <th scope="col">Communication </th>
                                        <th scope="col">Type </th>
                                        <th scope="col" class="print-none text-end">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($records as $key => $member)
                                        <tr>
                                            <th scope="row" class="p-0">
                                                <label class="p-2 d-block">
                                                    <input type="checkbox" name="records[]" value="{{ $member->id }}" class="me-2">
                                                    {{ $records->firstItem() + $key }}.
                                                </label>
                                            </th>
                                            <td>{{ $member->owner_name }}</td>
                                            <td>{{ $member->organigation_name }}</td>
                                            <td>{{ $member->contact_type }}</td>
                                            <td>{{ $member->contact_type }}</td>
                                            <td class="print-none text-end">
                                                <a href="{{ route('member.restore', $member->id) }}" class="btn btn-success table-small-button " title="Restore">
                                                    <i class="bi bi-bootstrap-reboot"></i>
                                                </a>

                                                <a href="{{ route('member.permanentDelete', $member->id) }}" onclick="return confirm('Are you sure, want to delete this data permanently?')" title="Permanent delete" class="btn table-small-button text-danger">
                                                    <i class="bi bi-x-square-fill"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6">Trash is empty.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- submit button -->
                        <div class="mt-4">
                            <button class="btn btn-success btn-sm" name="restore" value="1" onclick="return confirm('Do you want to restore all selected record(s)?')" {{ ($records->total() > 0) ? '' : 'disabled'}}>Restore all</button>

                            <button class="btn btn-danger btn-sm" name="delete" value="1" onclick="return confirm('The selected record(s) will be delete permanently!')" {{ ($records->total() > 0) ? '' : 'disabled'}}>Permanently delete</button>
                        </div>
                        <!-- submit button end -->
                    </form>
                </div>
                <!-- data table end -->

                <!-- paginate -->
                <div class="mb-5 card-footer">
                    <nav aria-label="Page navigation example" class="d-flex justify-content-end">
                        {{ $records->links() }}
                    </nav>
                </div>
                <!-- pagination end -->

            </div>
            <!-- content body end -->
        </div>
        <!-- main content end-->
    </div>
    
    @push('script')
    <!-- checked all program script -->
    <script>
        // select master & child checkboxes
        let masterCheckbox = document.getElementById("check-all"),
            childCheckbox = document.querySelectorAll('[name="records[]"]');

        // add 'change' event into master checkbox
        masterCheckbox.addEventListener("change", function() {
            // add/remove attribute into child checkbox conditionally
            for (var i = 0; i < childCheckbox.length; i++) {
                if(this.checked) {
                    childCheckbox[i].checked = true; // add attribute
                } else {
                    childCheckbox[i].checked = false; // add attribute
                }
            }
        });
    </script>
    <!-- checked all program script end -->
@endpush
</x-app-layout>
