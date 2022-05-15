@extends('layouts.layout')

@section('content')
@if(Session::has('success'))
<script>
	alertify.message('{{Session::get('success')}}');
</script>

@endif
<div class="pre-loader">
	<div class="pre-loader-box">
		<div class="loader-logo"><img src="/admin/vendors/images/logoblack.png" width="270px" alt=""></div>
		<div class='loader-progress' id="progress_div">
			<div class='bar' id='bar1'></div>
		</div>
		<div class='percent' id='percent1'>0%</div>
		<div class="loading-text">
			Xin chờ...
		</div>
	</div>
</div>
<div class="alert card-box alert-dismissible fade show" role="alert">
	<div class=" pd-20 height-100-p mb-30">

		<div class="row align-items-center">
			<div class="col-md-2">
				<img src="/upload/user/{{ Auth::user()->user_img }}" width="150px" alt="">
			</div>
			<div class="col-md-10">
				<h4 class="font-20 weight-500 mb-10 text-capitalize">
					Người quản trị <div class="weight-600 font-30 "> {{ Auth::user()->name }}</div>
				</h4>

			</div>
		</div>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>

</div>
<div class="row">
	<div class="col-xl-3 mb-30">
		<div class="card-box height-100-p widget-style1">
			<div class="d-flex flex-wrap align-items-center">
				<div class="progress-data">
					<div id="chart"></div>
				</div>
				<div class="widget-data">
					<div class="h4 mb-0">2020</div>
					<div class="weight-600 font-14">Contact</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 mb-30">
		<div class="card-box height-100-p widget-style1">
			<div class="d-flex flex-wrap align-items-center">
				<div class="progress-data">
					<div id="chart2"></div>
				</div>
				<div class="widget-data">
					<div class="h4 mb-0">400</div>
					<div class="weight-600 font-14">Deals</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 mb-30">
		<div class="card-box height-100-p widget-style1">
			<div class="d-flex flex-wrap align-items-center">
				<div class="progress-data">
					<div id="chart3"></div>
				</div>
				<div class="widget-data">
					<div class="h4 mb-0">350</div>
					<div class="weight-600 font-14">Campaign</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 mb-30">
		<div class="card-box height-100-p widget-style1">
			<div class="d-flex flex-wrap align-items-center">
				<div class="progress-data">
					<div id="chart4"></div>
				</div>
				<div class="widget-data">
					<div class="h4 mb-0">$6060</div>
					<div class="weight-600 font-14">Worth</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xl-8 mb-30">
		<div class="card-box height-100-p pd-20">
			<h2 class="h4 mb-20">Activity</h2>
			<div id="chart5"></div>
		</div>
	</div>
	<div class="col-xl-4 mb-30">
		<div class="card-box height-100-p pd-20">
			<h2 class="h4 mb-20">Lead Target</h2>
			<div id="chart6"></div>
		</div>
	</div>
</div>


@endsection