@extends('admin.layout.app')
@section('content')

	<!-- BEGIN .app-main -->
	<div class="app-main">
		<div class="main-content">

			<div class="row gutters" id="app">
				

							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
								<div class="card">
									<div class="card-header">applications </div>
									<div class="card-body">
										 @if ($message = Session::get('success'))
									        <div class="alert alert-success">{{ $message }}</div>
									    @endif

										<table id="10dataTable" class="table table-striped table-bordered">
											<thead class="spThead">
												<tr>
													<th>Name</th>
													<th>Phone</th>
													<th>Email</th>
													<th>Exp</th>
													<th>Qualification</th>
													<th>Job</th>
													
													<th>File</th>
													<th></th>
												</tr>
											</thead>
											<tbody class="spTbody">
											
											<?php foreach ($data as $row): ?>
								
											  <tr id="row{{ $row->id }} ">
												
												<td> {{ $row->name }} </td>
												<td> {{ $row->phone }} </td>
												<td> {{ $row->email }} </td>
												<td> {{ $row->exp }} </td>
												<td> {{ $row->qualification }} </td>
												<td> {{ $row->job }} </td>
												
												
												<th >@if ($row->file != NULL)
													<a href="{{ url('admin/applications/file/'.$row->id) }}">Download File</a>
												@endif</th>	
												<td style="padding: 2px;text-align: center;" width="15%">
													
													 <button class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="top" onclick="deleteRecord({{ $row->id }})" title="" data-original-title="Delete Record"><span class="icon-times" ></span>
														</button>
													
													<form style="display: none;" id="{{ 'formno'.$row->id }}" action="{{ route('applications.destroy',$row->id) }}" method="POST">
														@method('DELETE')
				                                        @csrf
				                                    </form>
															
												</td>
											</tr>
											<?php endforeach ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
					</div>
		</div>
	</div>
<script type="text/javascript">
		function deleteRecord(id) {
		if(confirm('Record will be deleted?')){
			$("#formno"+id).submit();
		}
	}
</script>
@endsection

