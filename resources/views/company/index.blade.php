@extends('layouts.app')
@section('title', 'Admin | Company')
@section('content')
<div class="content-wrapper" style="min-height: 77px;">
	<div class="content-header">

	      <div class="container-fluid">

	        <div class="row mb-2">

	          <div class="col-sm-6">

	            <h1 class="m-0">Add / View Company</h1>

	          </div><!-- /.col -->

	          <div class="col-sm-6">

	            <ol class="breadcrumb float-sm-right">

	              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>

	              <li class="breadcrumb-item active">Company</li>

	            </ol>

	          </div><!-- /.col -->

	        </div><!-- /.row -->
			        <div class="text-right">
					<a href="{{ route('company.create') }}" title="add company" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add New</a>
				</div>
	      </div><!-- /.container-fluid -->
	      
	    </div>
		<section class="content">
			@if ($message = Session::get('success'))
				<div class="alert alert-success my-2">
				  <p>{{ $message }}</p>
				</div>
				@endif 
				@if ($message = Session::get('error'))
				<div class="alert alert-danger my-2">
				  <p>{{ $message }}</p>
				</div>
				@endif
			<table class="table table-bordered data-table" id="dataTable">
		        <thead>
		            <tr>
		                <th>No</th>
		                <th>Name</th>
		                <th>Email</th>
		                <th>Logo</th>
		                <th width="100px">Action</th>
		            </tr>
		        </thead>
		        <tbody>
		        </tbody>
		    </table>
		</section>
</div>
@endsection

@section('script')
<script type="text/javascript">
  $(function () {
      
    var table = $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('company.index') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'logo', name: 'logo'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
      
  });
</script>
@endsection 