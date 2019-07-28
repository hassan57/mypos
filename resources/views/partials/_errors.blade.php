

@if (session()->has('success'))
	<div style="padding: 5px auto" class="alert alert-success alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h3  style="margin: 0px;"  >{{session('success')}}</h3>
	</div>
@endif

@if (session()->has('error'))
	<div  style="padding: 5px auto" class="alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h3 style="margin: 0px;">{{session('error')}}</h3>
	</div>
@endif