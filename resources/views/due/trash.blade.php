<x-app-layout>
    <x-slot name="title">Sale </x-slot>

    <div class="container">
        <!-- container menu -->
        @include('sale.menu')
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
                <a href="{{ route('sale.trash') }}" data-bs-toggle="tooltip" data-bs-placement="bottom" class="btn top-icon-button ms-auto print-none" title="Refresh">
                    <i class="bi bi-arrow-clockwise"></i>
                </a>

                <!-- add -->
                <a href="{{ route('sale.create') }}" class="btn top-icon-button print-none" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Create new project">
                    <i class="bi bi-plus-circle"></i>
                </a>
            </div>

            <!-- content body -->
            <div class="p-0 card-body">
                <!-- data table -->
                <div class="mb-3 d-block">
                    <form action="{{ route('sale.trash') }}" method="POST">
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
                                        <th scope="col">Customer</th>
                                        <th scope="col">Product name</th>
                                        <th scope="col" class="text-end">sale price</th>
                                        <th scope="col" class="text-end">Installment quantity</th>
                                        <th scope="col" class="print-none text-end">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($records as $key => $sale)
                                    @php
                                        $purchese_price = $sale->purchese_price;
                                        $down_payment = $sale->down_payment;
                                        $net_price = $purchese_price - $down_payment;
                                        $sale_profit = $net_price *($sale->sale_profit/100);
                                        $sale_price =  $net_price + $sale_profit;
                                        $sum_sale_price = + $sale_price;
                                    @endphp
                                        <tr>
                                            <th scope="row" class="p-0">
                                                <label class="p-2 d-block">
                                                    <input type="checkbox" name="records[]" value="{{ $sale->id }}" class="me-2">
                                                    {{ $records->firstItem() + $key }}.
                                                </label>
                                            </th>
                                            {{-- <td>{{ $sale->project->title }}</td> --}}
                                            <td>{{ $sale->contact->owner_name?? '' }}</td>
                                            <td>{{ $sale->product_name }}</td>
                                            <td class="text-end">{{ number_format($sale_price, 2) }}</td>
                                            <td class="text-end">{{ $sale->installment_quantity}}</td>
                                            {{-- <td>{{ $sale->investment_policy }}</td> --}}
                                            {{-- <td>{{ $sale->withdraw_policy }} Months</td> --}}
                                            <td class="print-none text-end">
                                                <a href="{{ route('sale.restore', $sale->id) }}" class="btn table-small-button text-success" title="Restore">
                                                    <i class="bi bi-bootstrap-reboot"></i>
                                                </a>

                                                <a href="{{ route('sale.permanentDelete', $sale->id) }}" onclick="return confirm('Are you sure, want to delete this data permanently?')" title="Permanent delete" class="btn table-small-button text-danger">
                                                    <i class="bi bi-x-square-fill"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9">Trash is empty.</td>
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
