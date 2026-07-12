<x-app-layout>
    <x-slot name="title">Dashboard</x-slot>

	<div class="container">
        <div class="text-center mt-3 mb-3">
            <h3 class="">Welcom to Lab</h3>
        </div>
		<div>
		   <h3 class="text-muted mb-2"> Report <i class="bi bi-activity"></i></h3>
	   </div>

	   <div class="mb-4 gy-3 row">
		   <div class="col-xl-3 col-md-6">
			   <div class="shadow card total-color">
				   <div class="card-body">
					   {{-- <a href="{{route('student.index')}}" target="_blank"> --}}
						   <div class="row align-items-center">
							   <div class="col">
								   <h6 class="mb-3 text-white">Total Report</h6>
									   <h3 class="mb-0 text-white">{{ number_format($total_report) }}</h3>
							   </div>
							   <div class="col-auto text-white fs-3">
								   <i class="bi bi-cash-stack"></i>
							   </div>
						   </div>
							   <p class="mt-2 text-white">&nbsp;</p>
					   </a>
				   </div>
			   </div>
		   </div>

		   <div class="col-xl-3 col-md-6">
			   <div class="shadow card danger">
				   <div class="card-body">
					   {{-- <a href="{{route('student.index')}}" target="_blank"> --}}
						   <div class="row align-items-center">
							   <div class="col">
								   <h6 class="mb-3 text-white">Today Report</h6>
									   <h3 class="mb-0 text-white">{{ number_format($today_report) }}</h3>
							   </div>
							   <div class="col-auto text-white fs-3">
								   <i class="bi bi-wallet2"></i>
							   </div>
						   </div>
							   <p class="mt-2 text-white">Total Report</p>
					   </a>
				   </div>
			   </div>
		   </div>

		   <div class="col-xl-3 col-md-6">
			   <div class="shadow card payment-card">
				   <div class="card-body">
					   {{-- <a href="{{route('student.index')}}" target="_blank"> --}}
						   <div class="row align-items-center">
							   <div class="col">
								   <h6 class="mb-3 text-white">Last Month</h6>
									   <h3 class="mb-0 text-white">{{ number_format($lastMonth_report) }}</h3>
							   </div>
							   <div class="col-auto text-white fs-3">
								   <i class="bi bi-credit-card-2-front"></i>
							   </div>
						   </div>
							   <p class="mt-2 text-white">Total Report</p>
					   </a>
				   </div>
			   </div>
		   </div>


		   <!-- <div class="col-xl-3 col-md-6">
			   <div class="shadow card expance-color">
				   <div class="card-body">
					   {{-- <a href="{{route('payment.index')}}" target="_blank"> --}}
						   <div class="row align-items-center">
							   <div class="col">
								   <h6 class="mb-3 text-white">Today Amount </h6>
									   <h3 class="mb-0 text-white">{{ number_format($daily_payment,2) }}</h3>
							   </div>
							   <div class="col-auto text-white fs-3">
								   <i class="bi bi-credit-card-2-back"></i>
							   </div>
						   </div>
							   <p class="mt-2 text-white">Total Report</p>
					   </a>
				   </div>
			   </div>
		   </div> -->
	  
	   </div>
  	</div>

	<!--Patient-->
    <div class="container">
        
         <div>
            <h3 class="text-muted mb-2"> Patient <i class="bi bi-wallet"></i></h3>
        </div>

        <div class="mb-4 gy-3 row">
            <div class="col-xl-3 col-md-6">
				<div class="shadow card total-color">
					<div class="card-body">
						{{-- <a href="{{route('student.index')}}" target="_blank"> --}}
							<div class="row align-items-center">
								<div class="col">
									<h6 class="mb-3 text-white">Total Patient</h6>
										<h3 class="mb-0 text-white">{{ number_format($total_patient) }}</h3>
								</div>
								<div class="col-auto text-white fs-3">
									<i class="bi bi-cash-stack"></i>
								</div>
							</div>
								<p class="mt-2 text-white">&nbsp;</p>
						</a>
					</div>
				</div>
			</div>

            <div class="col-xl-3 col-md-6">
				<div class="shadow card payment-card">
					<div class="card-body">
						{{-- <a href="{{route('student.index')}}" target="_blank"> --}}
							<div class="row align-items-center">
								<div class="col">
									<h6 class="mb-3 text-white">Today Patient</h6>
										<h3 class="mb-0 text-white">{{ number_format($daily_patient) }}</h3>
								</div>
								<div class="col-auto text-white fs-3">
									<i class="bi bi-wallet2"></i>
								</div>
							</div>
								<p class="mt-2 text-white">Total Patient</p>
						</a>
					</div>
				</div>
			</div>

            <div class="col-xl-3 col-md-6">
				<div class="shadow card danger">
					<div class="card-body">
						{{-- <a href="{{route('student.index')}}" target="_blank"> --}}
							<div class="row align-items-center">
								<div class="col">
									<h6 class="mb-3 text-white">Last Month</h6>
										<h3 class="mb-0 text-white">{{ number_format($lastMonth_patient) }}</h3>
								</div>
								<div class="col-auto text-white fs-3">
									<i class="bi bi-credit-card-2-front"></i>
								</div>
							</div>
								<p class="mt-2 text-white">Total Patient</p>
						</a>
					</div>
				</div>
			</div>

<!--
            <div class="col-xl-3 col-md-6">
				<div class="shadow card expance-color">
					<div class="card-body">
						{{-- <a href="{{route('payment.index')}}" target="_blank"> --}}
							<div class="row align-items-center">
								<div class="col">
									<h6 class="mb-3 text-white">Total Contact </h6>
										{{-- <h3 class="mb-0 text-white">{{ number_format($daily_payment,2) }}</h3> --}}
								</div>
								<div class="col-auto text-white fs-3">
									<i class="bi bi-credit-card-2-back"></i>
								</div>
							</div>
								<p class="mt-2 text-white">Total Contact</p>
						</a>
					</div>
				</div>
			</div>
        -->
        </div>
    </div>
    

	<!-- <div class="container">
        <div>
            <h4 class="text-muted mb-2">Contact <i class="bi bi-people"></i></h4>
        </div>
        <div class="mb-4 gy-3 row">
           <div class="col-xl-3 col-md-6">
				<div class="shadow card total-color">
					<div class="card-body">
						{{-- <a href="{{route('expense.index')}}" target="_blank"> --}}
							<div class="row align-items-center">
								<div class="col">
									<h6 class="mb-3 text-white">Total Contact</h6>
										<h3 class="mb-0 text-white">{{ number_format($total_contact)}}</h3>
								</div>
								<div class="col-auto text-white fs-3 ">
									<i class="bi bi-person-bounding-box"></i>
								</div>
							</div>
								<p class="mt-2 text-white">&nbsp;</p>
						</a>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-md-6">
				<div class="shadow card expance-color">
					<div class="card-body">
						{{-- <a href="{{route('expense.index')}}?search=1&form_date={{date('Y-m-d')}}&to_date={{date('Y-m-d')}}" target="_blank"> --}}
							<div class="row align-items-center">
								<div class="col">
									<h6 class="mb-3 text-white"> Doctor</h6>
										<h3 class="mb-0 text-white">{{ number_format($total_doctor)}}</h3>
								</div>
								<div class="col-auto text-white fs-3">
									<i class="bi bi-person-square"></i>
								</div>
							</div>
								<p class="mt-2 text-white">Total Contact</p>
						</a>
					</div>
				</div>
			</div>

            <div class="col-xl-3 col-md-6">
				<div class="shadow card student-card ">
					<div class="card-body">
						{{-- <a href="{{route('expense-subcategory.index')}}" target="_blank"> --}}
							<div class="row align-items-center">
								<div class="col">
									<h6 class="mb-3 text-white">Employee</h6>
										<h3 class="mb-0 text-white">{{ number_format($total_employee)}}</h3>
								</div>
								<div class="col-auto text-white fs-3">
									<i class="bi bi-person-lines-fill"></i>
								</div>
							</div>
								<p class="mt-2 text-white">Total Distribution</p>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div> -->

     <div class="container">
<!--        
        <div>
            <h4 class="text-muted mb-2">Contact <i class="bi bi-people-fill"></i></h4>
        </div>
        <div class="mb-4 gy-3 row">
			<div class="col-xl-3 col-md-6">
				<div class="shadow card total-color">
					<div class="card-body">
						{{-- <a href="{{route('student.index')}}?student_type=private_program" target="_blank"> --}}
							<div class="row align-items-center">
								<div class="col">
									<h6 class="mb-3 text-white">Total Contact</h6>
									{{-- <h3 class="mb-0 text-white">{{ number_format($total_contact)}}</h3> --}}

								</div>
								<div class="col-auto text-white fs-3">
									<i class="bi bi-people-fill"></i>
								</div>
							</div>
								<p class="mt-2 text-white">People</p>
						</a>
					</div>
				</div>
			</div>

            <div class="col-xl-3 col-md-6">
				<div class="shadow card student-card3 card-hover">
					<div class="card-body">
						{{-- <a href="{{route('student.index')}}?student_type=admission_1st_time" target="_blank"> --}}
							<div class="row align-items-center">
								<div class="col">
									<h6 class="mb-3 text-white">Total Owner</h6>
										{{-- <h3 class="mb-0 text-white">{{ $nazera }}</h3> --}}
								</div>
								<div class="col-auto text-white fs-3">
									<i class="bi bi-person-bounding-box"></i>
								</div>
							</div>
							<p class="mt-2 text-white">&nbsp;</p>
						</a>
					</div>
				</div>
			</div>

            <div class="col-xl-3 col-md-6">
				<div class="shadow card student-card  card-hover">
					<div class="card-body">
						{{-- <a href="{{route('student.index')}}?student_type=admission_2nd_time" target="_blank"> --}}
							<div class="row align-items-center">
								<div class="col">
									<h6 class="mb-3 text-white">Total Employee</h6>
										{{-- <h3 class="mb-0 text-white">{{ $hifz }}</h3> --}}
								</div>
								<div class="col-auto text-white fs-3">
									<i class="bi bi-person-lines-fill"></i>
								</div>
							</div>
							<p class="mt-2 text-white">&nbsp;</p>
						</a>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-md-6">
				<div class="shadow card payment-card">
					<div class="card-body">
						{{-- <a href="{{ route('student.index')}}" target="_blank"> --}}
							<div class="row align-items-center">
								<div class="col">
									<h6 class="mb-3 text-white">Total Provider</h6>
										{{-- <h3 class="mb-0 text-white">{{ $kitab }}</h3> --}}
								</div>
								<div class="col-auto text-white fs-3 ">
									<i class="bi bi-people-fill"></i>
								</div>
							</div>
							<p class="mt-2 text-white">&nbsp;</p>
						</a>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-md-6">
				<div class="shadow card student-card3">
					<div class="card-body">
						{{-- <a href="{{ route('student.index')}}" target="_blank"> --}}
							<div class="row align-items-center">
								<div class="col">
									<h6 class="mb-3 text-white">Total Consumer</h6>
										{{-- <h3 class="mb-0 text-white">{{ $kitab }}</h3> --}}
								</div>
								<div class="col-auto text-white fs-3 ">
									<i class="bi bi-people-fill"></i>
								</div>
							</div>
							<p class="mt-2 text-white">&nbsp;</p>
						</a>
					</div>
				</div>
			</div>

            <div class="col-xl-3 col-md-6">
				<div class="shadow card student-card  card-hover">
					<div class="card-body">
						{{-- <a href="{{route('student.index')}}?student_type=admission_2nd_time" target="_blank"> --}}
							<div class="row align-items-center">
								<div class="col">
									<h6 class="mb-3 text-white">Total Brocker</h6>
										{{-- <h3 class="mb-0 text-white">{{ $hifz }}</h3> --}}
								</div>
								<div class="col-auto text-white fs-3">
									<i class="bi bi-person-lines-fill"></i>
								</div>
							</div>
							<p class="mt-2 text-white">&nbsp;</p>
						</a>
					</div>
				</div>
			</div>

            <div class="col-xl-3 col-md-6">
				<div class="shadow card payment-card card-hover">
					<div class="card-body">
						{{-- <a href="{{route('student.index')}}?student_type=admission_2nd_time" target="_blank"> --}}
							<div class="row align-items-center">
								<div class="col">
									<h6 class="mb-3 text-white">Total General Contact</h6>
										{{-- <h3 class="mb-0 text-white">{{ $hifz }}</h3> --}}
								</div>
								<div class="col-auto text-white fs-3">
									<i class="bi bi-person-lines-fill"></i>
								</div>
							</div>
							<p class="mt-2 text-white">&nbsp;</p>
						</a>
					</div>
				</div>
			</div> -->
		</div>
	</div> 

   
    @push('style')
		<style>
			/* .card-hover{
				border: 1px solid white;
			}

			.card-hover :hover{
				background-color: #40A932 !important;
				transition: 0.5s;
			} */
			.card-body a{
				text-decoration: none !important;
			}

			.total-color{
				background-color: #0FB382 !important;
				/* background-image: linear-gradient(to right, #137edb , #014886); */
				/* transition: total 5s; */
			}
			/* .total-color:hover{
				background-image: linear-gradient(to right,  #014886, #137edb);
			} */
			.payment-card{
				background-color: #7D4AB3 !important;

				/* background-image: linear-gradient(to right, #2ab318 , #237718); */

			}
			.student-card{
				background-color: #EB588F !important;
				/* background-color: #542f0d !important; */
				/* background-image: linear-gradient(to right, #af6016 , #542f0d); */

			}
			.student-card2{
				background-color: #7D4AB3 !important;
				/* background-color: rgb(28, 28, 133) !important; */
				/* background-image: linear-gradient(to right, #1fc0bb , #0e716d); */

			}
			.student-card3{
				background-color: #C28D2D !important;
				/* background-image: linear-gradient(to right, #1f8cb1 , #08536c); */

			}
			.expance-color{
				background-color: #C28D2D !important;

				/* background-image: linear-gradient(to right, #5bc0de , #0e8db4); */

			}
			.danger{
				background-color: #EB588F !important;

				/* background-image: linear-gradient(to right, #d9534f , #ad1510); */

			}
		</style>

	@endpush

</x-app-layout>

