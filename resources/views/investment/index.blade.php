<x-app-layout>
    <x-slot name="title">Investments </x-slot>

    <div class="container">
        <!-- container menu -->
        @include('investment.menu')
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
                    <h4 class="main-title">Investments</h4>
                    <p><small>About {{ $investments->total() }} results found.</small></p>
                </div>

                <!-- Print -->
                <a href="#" class="btn top-icon-button print-none ms-auto" title="Print" onclick="window.print()">
                    <i class="bi bi-printer"></i>
                </a>

                <!-- refresh -->
                <a href="{{ route('investment.index') }}" class="btn top-icon-button print-none" title="Refresh">
                    <i class="bi bi-arrow-clockwise"></i>
                </a>

                <!-- search -->
                <a href="#investments-search"
                   class="btn top-icon-button print-none" title="Search" data-bs-toggle="collapse" role="button" aria-expanded="false">
                    <i class="bi bi-search"></i>
                </a>

                <!-- add -->
                <a href="{{ route('investment.create') }}" class="btn top-icon-button print-none" title="New investment">
                    <i class="bi bi-plus-circle"></i>
                </a>
            </div>
            <!-- card head end -->

            <!-- content body -->
            <div class="p-0 card-body">
                <!-- search area -->
                <div class="collapse print-none {{ request()->search ? 'show' : '' }}" id="investments-search">
                    <div class="px-0 border-0 card card-body rounded-0">
                        <!-- search form -->
                        <form action="{{ route('investment.index') }}" method="GET">
                            <input type="hidden" name="search" value="1">

                            <div class="row gy-1 gx-3">
                                {{-- <div class="col-12 col-sm-6 col-lg-3">
                                    <label for="project-title" class="form-label">Project Title</label>
                                    <select name="project_id" class="form-control" id="sub_category_id" autofocus>
                                        <option value="" selected disabled>---</option>
                                        @foreach ($projects as $record)
                                            <option value="{{ $record->id }}" {{ (request()->project_id == $record->id) ? 'selected' : '' }}>{{ $record->title }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}
                                <div class="col-12 col-sm-6 col-lg-3">
                                    <label for="contact_id" class="form-label">Investor</label>
                                    <select name="contact_id" class="form-control" id="contact_id">
                                        <option value="" selected disabled>---</option>
                                            @foreach ($investors as $value)
                                               <option value="{{ $value->id }}" {{ (request()->contact_id == $value->id) ? 'selected' : '' }}>
                                                {{ $value->owner_name  }}
                                               </option> 
                                               
                                            @endforeach
                                    </select>
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
                                <th scope="col">Investor</th>
                                
                                <th scope="col">Invest Date</th>
                                <th scope="col" class="text-end">Amount</th>
                                {{-- <th scope="col">Investment policy</th> --}}
                                {{-- <th scope="col">Withdraw policy</th> --}}
                                <th scope="col" class="print-none text-end">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($investments as $key => $investment)
                                <tr>
                                    <th scope="row">{{ $investments->firstItem() + $key }}.</th>
                                    {{-- <td>{{ $investment->project->title }}</td> --}}
                                    <td>{{ $investment->contact->owner_name??'' }}</td>
                                    
                                    <td>{{ $investment->investment_date->format('d M, Y') }} </td>
                                    {{-- <td>{{ $investment->interest }}%</td> --}}
                                    <td class="text-end">{{ number_format($investment->amount, 2) }}</td>
                                    {{-- <td>{{ $investment->investment_policy }}</td> --}}
                                    {{-- <td>{{ $investment->withdraw_policy }} Months</td> --}}
                                    <td class="print-none text-end">
                                       
                                        <a  href="{{ route('investment.show', $investment->id) }}" class="btn table-small-button" title="View" target="_blank">
                                            <i class="bi bi-eye"></i> 
                                        </a>
                                    
                                        <a  href="{{ route('investment.edit', $investment->id) }}" class="btn table-small-button text-success" title="Update"><i class="bi bi-pencil-square"></i>
                                        </a>
                                    
                                        
                                        <span data-bs-toggle="tooltip" title="Trash">
                                            <a href="#" class="btn table-small-button text-danger" onclick="if(confirm('Are you sure want to delete?')) { document.getElementById('investment-delete-{{ $investment->id }}').submit() } return false ">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </span>

                                        <form action="{{ route('investment.destroy', $investment->id) }}" method="post" class="d-none" id="investment-delete-{{ $investment->id }}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                               
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <th colspan="8">List is empty.</th>
                                </tr>
                            @endforelse
                        </tbody>

                        @if ($investments != null)
                        <tfoot>
                            <tr>
                                <th colspan="3" class="text-end">Total</th>
                                <th class="text-end">{{ number_format($investments->sum('amount'), 2) }}</th>
                                <th colspan="4">&nbsp;</th>
                            </tr>
                        </tfoot>
                        @endif
                    </table>
                </div>
                <!-- data table end -->

                <!-- paginate -->
                <div class="mb-5 card-footer print-none">
                    <nav aria-label="Page navigation example" class="d-flex justify-content-end">
                        {{ optional($investments)->links() }}
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