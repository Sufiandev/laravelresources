@extends('admin.layout.app')
@section('content')
<script type="text/javascript">
	var showUrl = "{{ route('cmsuser.show',':id') }}";
	var updateUrl = "{{ route('cmsuser.update','1') }}";
	var storeUrl = "{{ route('cmsuser.store') }} ";
</script>
	<!-- BEGIN .app-main -->
	<div class="app-main">
		<div class="main-content">

			<div class="row gutters" id="app">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" style="display: none;" id="addFormCard">
					<div class="card">
						<div class="card-header">CMS User <button class='btn btn-success btn-sm float-right' onclick="addNew()">Close</button></div>
							<div class="card-body">
							<div class="alert alert-info addFormError" style="display: none;"></div>
							<form method="POST" name="myForm" id="myForm"  enctype="multipart/form-data" onsubmit="return form_validation()">
								@csrf
					           <div class="form-group row">
					            <div class="col-md-4">
					              <label class="col-form-label">Name</label>
					              <input type="text" required name="name"  class="form-control-sm form-control">
					            </div>
					            <div class="col-md-4">
					               <label class="col-form-label">Email</label>
					              <input type="email"  name="email"  class="form-control-sm form-control">
					            </div>
					            <div class="col-md-4">
					               <label class="col-form-label">Password</label>
					              <input type="password" required name="password"  class="form-control-sm form-control">
					            </div>
					          </div>
					     

					           <div class="form-group row">
					            <div class="col-md-4">
								<label class="col-form-label">Image</label>
					              <input type="file" id="image"  name="files"  class="form-control-sm input-sm form-control">
					            </div>
					             
					           </div>
					           	 <span class="preview-area"></span>
					         
						 		<div class="form-group row">
						            <div class="col-md-12">
						     
						                 <button type="submit" class="float-right btn btn-primary btn-sm ">Save Data</button>
						            </div>
						          </div>  
					        </form>
							</div>
					</div>
				</div>
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" style="display: none;" id="editCard">
					<div class="card">
						<div class="card-header">Edit <button class='btn btn-primary btn-sm float-right' onclick="$('#editCard').hide()">Close</button></div>
							<div class="card-body" id="editCardBody">
								<div class="alert alert-info">Loading....</div>
							</div>
					</div>
				</div>

							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
								<div class="card">
									<div class="card-header">CMS User <button class='btn btn-primary btn-sm float-right' onclick="addNew()">Add</button></div>
									<div class="card-body">
										 @if ($message = Session::get('success'))
									        <div class="alert alert-success">{{ $message }}</div>
									    @endif

										<table id="10dataTable" class="table table-striped table-bordered">
											<thead class="spThead">
												<tr>
													<th width="1%">ID</th>
													<th>Name</th>
													<th>Email</th>
													<th >Image</th>
													<th></th>
												</tr>
											</thead>
											<tbody class="spTbody">
											
											<?php foreach ($data as $row): ?>
								
											  <tr id="row{{ $row->id }} ">
												<td> {{ $row->id }} </td>
												<td> {{ $row->name }} </td>
												<td> {{ $row->email }} </td>
												<th style="padding: 0"><img src="{{ asset('images/thumb/'.$row->image) }}" width="100"></th>	
												<td style="padding: 2px;text-align: center;" width="15%">
													<button data-toggle="tooltip" data-placement="top" title="" data-original-title="Update Record"  onclick="update({{$row->id}})" class="btn btn-outline-success btn-sm"><span class="icon-edit" ></span>
													</button>
													 <button class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="top" onclick="deleteRecord({{ $row->id }})" title="" data-original-title="Delete Record"><span class="icon-times" ></span>
														</button>
													
													<form style="display: none;" id="{{ 'formno'.$row->id }}" action="{{ route('cmsuser.destroy',$row->id) }}" method="POST">
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
	function update(id) {
		$("#editCard").fadeIn();
		$("#editCardBody").html("Loading....");
		url = showUrl.replace(':id', id);
		$.get(url,function(res){
			$("#editCardBody").html(res);
		});
	}
	function deleteRecord(id) {
		if(confirm('Record will be deleted?')){
			$("#formno"+id).submit();
		}
	}

	function addNew() {
		$("#addFormCard").fadeToggle();
	}
	function form_validation() 
	{   
		
		$(".addFormError").show();
		$(".addFormError").html("<strong>Loading....</strong>");
	    var form = new FormData($('#myForm')[0]);
	    $.ajax({
	      type: "POST",
	      url: storeUrl,
	      data: form,
	      cache: false,
	      contentType: false,
	      processData: false,
	      success: function(res)
	      {
	      	console.log(res);
	      	
	      	$(".addFormError").html('');
	      	$.each(res.errors,function(key,value){
	      		console.log(value);
	      		$(".addFormError").append('<p>'+value+'</p>');
	      	})
	      	if(res.success){
	      		$(".addFormError").append('<p>'+res.success+'</p');
	      		location.reload();
	      	}
	      	
	      }
	       
	    });
	      return false;
	}

	function update_validation() 
	{   
		$(".updateFormError").show();
		$(".updateFormError").html("<strong>Loading....</strong>");
	    var form = new FormData($('#updateForm')[0]);
	    $.ajax({
	      type: "POST",
	      url: updateUrl,
	      data: form,
	      cache: false,
	      contentType: false,
	      processData: false,
	      success: function(res)
	      {
	      	console.log(res);
	      	$(".updateFormError").html('');
	      	$.each(res.errors,function(key,value){
	      		console.log(value);
	      		$(".updateFormError").append('<p>'+value+'</p>');
	      	})
	      	if(res.success){
	      		$(".updateFormError").append('<p class="alert alert-info">'+res.success+'</p');
	      		location.reload();
	      	}
	      	
	      }
	       
	    });
	      return false;
	}  

</script>
<script type="text/javascript">
  var inputLocalFont = document.getElementById("image");
	inputLocalFont.addEventListener("change",previewImages,false);
	function previewImages(){
	    var fileList = this.files;
	    var anyWindow = window.URL || window.webkitURL;
	$('.preview-area').html('');
	        for(var i = 0; i < fileList.length; i++){
	          var objectUrl = anyWindow.createObjectURL(fileList[i]);
	          $('.preview-area').append('<span class="span2"><img class="img-thumbnail" src="' + objectUrl + '" alt="" style="width:111px;height:100px"></span>');
	          window.URL.revokeObjectURL(fileList[i]);
	        }
	    }
</script>

@endsection
