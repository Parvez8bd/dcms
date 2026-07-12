<x-app-layout>
    <x-slot name="title">Fine </x-slot>

    <div class="container">
        <!-- container menu -->
        @include('fine.menu')
        <!-- container menu end -->

        <!-- print header -->
        @include('layouts.partials.print-head')
        <!-- print header end -->

        <!-- card start -->
        <div class="border-0 card">
            <!-- card head -->
            <div class="p-0 mt-4 mb-3 border-0 card-header d-md-flex align-items-center d-block">
                <!-- page title -->
                <div>
                    <h4 class="main-title">fines</h4>
                    <p><small>About {{ $fines->total() }} results found.</small></p>
                </div>

                <!-- Print -->
                <a href="#" class="btn top-icon-button print-none ms-auto" title="Print" onclick="window.print()">
                    <i class="bi bi-printer"></i>
                </a>

                <!-- refresh -->
                <a href="{{ route('fine.index') }}" class="btn top-icon-button print-none" title="Refresh">
                    <i class="bi bi-arrow-clockwise"></i>
                </a>

                <!-- search -->
                <a href="#sales-search"
                   class="btn top-icon-button print-none" title="Search" data-bs-toggle="collapse" role="button" aria-expanded="false">
                    <i class="bi bi-search"></i>
                </a>

                <!-- add -->
                <a href="{{ route('fine.create') }}" class="btn top-icon-button print-none" title="New sale">
                    <i class="bi bi-plus-circle"></i>
                </a>
            </div>
            <!-- card head end -->

            <!-- content body -->
            <div class="p-0 card-body">
                <!-- search area -->
                <div class="collapse print-none {{ request()->search ? 'show' : '' }}" id="sales-search">
                    <div class="px-0 border-0 card card-body rounded-0">
                        <!-- search form -->
                        <form action="{{ route('fine.index') }}" method="GET">
                            <input type="hidden" name="search" value="1">

                            <div class="row gy-1 gx-3">
                                
                                <div class=" col-sm-6 col-lg-3">
                                    <label for="investment_date_from" class="form-label">Date (From)</label>
                                    <input type="date" name="date_from" value="{{ request()->date_from ? request()->date_from : '' }}" class="form-control" id="investment_date_from" autofocus>
                                </div> 

                                <div class=" col-sm-6 col-lg-3">
                                    <label for="investment_date_to" class="form-label">Date (To)</label>
                                    <input type="date" name="date_to" value="{{ request()->date_to ? request()->date_to : '' }}" class="form-control" id="investment_date_to">
                                </div>
                                

                                <!-- button -->
                                <div class="col-12 col-sm-6 col-lg-2">
                                    <label class="form-label">&nbsp;</label>
                                    <button type="submit" class="btn btn-block w-100 custom-btn btn-success">
                                        <i class="bi bi-search"></i>
                                        <span class="p-1">Search</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- search area end -->

                <!-- data table -->
                <div class="mb-3 table-responsive">
                    <table class="table custom-table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                {{-- <th scope="col">Project</th> --}}
                                <th scope="col">Date</th>
                                <th scope="col" class="text-end">Total Fine Amount</th>
                                <th scope="col" class="text-end">Withdraw Amount</th>
                                <th scope="col" class="text-end">Balance</th>
                                <th scope="col" class="print-none text-end">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($fines as $key => $fine)
                            @php
                               $balance= $fine->fine_amount -$fine->withdraw_amount;
                            @endphp
                                <tr>
                                    <th scope="row">{{ $fines->firstItem() + $key }}.</th>
                                    <td>{{ $fine->date->format("j M, Y") }}</td>
                                    <td class="text-end">{{  number_format($fine->fine_amount, 2)}}</td>
                                    <td class="text-end">{{  number_format($fine->withdraw_amount, 2)}}</td>
                                    <td class="text-end">{{  number_format($balance, 2)}}</td>
                                    <td class="print-none text-end">
                                       
                                        {{-- <a  href="{{ route('fine.show', $fine->id) }}" class="btn table-small-button" title="View" target="_blank">
                                            <i class="bi bi-eye"></i> 
                                        </a> --}}
                                    
                                        <a  href="{{ route('fine.edit', $fine->id) }}" class="btn table-small-button text-success" title="Update"><i class="bi bi-pencil-square"></i>
                                        </a>
                                    
                                        
                                        {{-- <span data-bs-toggle="tooltip" title="Trash">
                                            <a href="#" class="btn table-small-button text-danger" onclick="if(confirm('Are you sure want to delete?')) { document.getElementById('sale-delete-{{ $fine->id }}').submit() } return false ">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </span>  --}}

                                        <form action="{{ route('sale.destroy', $fine->id) }}" method="post" class="d-none" id="sale-delete-{{ $fine->id }}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                               
                                    </td>
                                </tr>
                                
                            @empty
                                <tr>
                                    <th colspan="6">List is empty.</th>
                                </tr>
                            @endforelse
                        </tbody>
                        

                        @if ($fines != null)
                        <tfoot>
                            <tr>
                                <th colspan="3" class="text-end">Total</th>
                                {{-- <th class="text-end">{{ number_format($fine_amount, 2) }}</th> --}}
                                <th class="text-end">{{ number_format($fines->sum('withdraw_amount'), 2) }}</th>
                                {{-- <th class="text-danger text-center">{{ number_format($totalFine, 2) }}(Balance)</th> --}}
                                <th colspan="5">&nbsp;</th>
                            </tr>
                        </tfoot>
                        @endif
                    </table>
                </div>
                <!-- data table end -->

                <!-- paginate -->
                <div class="mb-5 card-footer print-none">
                    <nav aria-label="Page navigation example" class="d-flex justify-content-end">
                        {{ optional($fines)->links() }}
                    </nav>
                </div>
                <!-- pagination end -->

            </div>
            <!-- content body end -->
        </div>
        <!-- card end -->
    </div>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    
    @push('script')
        <script>
            $('.select2').select2();
        </script>
    @endpush

    @push('style')
        <style>
                .select2-container .select2-selection--single{
            height:34px !important;
            }
            .select2-container--default .select2-selection--single{
                    border: 1px solid #ccc !important; 
                border-radius: 0px !important; 
            }
        </style>
    @endpush
</x-app-layout>