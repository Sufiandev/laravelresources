@extends('admin.layout.app')
@section('content')
<script type="text/javascript">
	var updateUrl = "{{ route('settings.update','1') }}";
</script>
	<!-- BEGIN .app-main -->
	<div class="app-main">
		<div class="main-content">

			<div class="row gutters">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
					<div class="card">
						<div class="card-header">Settings</div>
							<div class="card-body">
							<span class="updateFormError" style="display: none;"></span>
							<form method="POST" id="updateForm"  enctype="multipart/form-data" onsubmit="return update_validation()">
							
								@csrf
								@method('PUT')
					           <div class="form-group row">
						            <div class="col-md-4">
						              <label class="col-form-label">Site Name</label>
						              <input type="text" value="{{ $settings->siteName }}" required name="siteName"  class="form-control-sm form-control">
						            </div> 
						            <div class="col-md-4">
						              <label class="col-form-label">Phone</label>
						              <input type="text"  name="phone" value="{{ $settings->phone }}" class="form-control-sm form-control">
						            </div> 
						            <div class="col-md-4">
						              <label class="col-form-label">Email</label>
						              <input type="text"  name="email" value="{{ $settings->email }}" class="form-control-sm form-control">
						            </div> 
						            <div class="col-md-6">
						              <label class="col-form-label">Address</label>
						              <textarea class="form-control form-control-sm" name="address">{{ $settings->address }}</textarea>
						            </div> 
						            <div class="col-md-6">
						              <label class="col-form-label">Footer About us</label>
						              <textarea class="form-control form-control-sm" name="about">{{ $settings->about }}</textarea>
						            </div> 
						            <div class="col-md-3">
						              <label class="col-form-label">Facebook Link</label>
						              <input type="text"  name="facebook" value="{{ $settings->facebook }}" class="form-control-sm form-control">
						            </div>
						            <div class="col-md-3">
						              <label class="col-form-label">Twitter</label>
						              <input type="text"  name="twitter" value="{{ $settings->twitter }}" class="form-control-sm form-control">
						            </div>
						            <div class="col-md-3">
						              <label class="col-form-label">Youtube</label>
						              <input type="text"  name="youtube"  value="{{ $settings->youtube }}" class="form-control-sm form-control">
						            </div>
						            <div class="col-md-3">
						              <label class="col-form-label">Google Plus</label>
						              <input type="text"  name="googleplus" value="{{ $settings->googleplus }}" class="form-control-sm form-control">
						            </div>
						            
						            <div class="col-md-3">
						              <label class="col-form-label">Linkedin</label>
						              <input type="text"  name="linkedin" value="{{ $settings->linkedin }}"  class="form-control-sm form-control">
						            </div>
						            <div class="col-md-9">
						              <label class="col-form-label">Map</label>
						              <textarea class="form-control" name="map">{{ $settings->map }}</textarea>
						            </div>
					        	</div>
					     		
					     	
					           <div class="form-group row">
					            <div class="col-md-4">
								<label class="col-form-label">Logo</label>
					              <input type="file" id="image"  name="files"  class="form-control-sm input-sm form-control">
					              <span class="preview-area">
					           		@if ($settings->logo)
					           			<img src="{{ asset('images/thumb/'.$settings->logo) }}">
					           		@endif
					           	</span>
					            </div>
					             <div class="col-md-4">
								<label class="col-form-label">Favicon</label>
					              <input type="file" id="image2"  name="files2"  class="form-control-sm input-sm form-control">
					              <span class="preview-area2">
					           		@if ($settings->favicon)
					           			<img src="{{ asset('images/thumb/'.$settings->favicon) }}">
					           		@endif
					           	</span>
					            </div>
					         	
					           </div>
					           	
					          
					         
						 		<div class="form-group row">
						            <div class="col-md-12">
						     
						                 <button type="submit" class="float-right btn btn-primary btn-sm ">Save Data</button>
						            </div>
						          </div>  
					        </form>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<script type="text/javascript">



	function update_validation() 
	{   
		$(".updateFormError").show();
		$(".updateFormError").html("<strong>Loading....</strong>");
    	$(".sn2replace").val($('.sn2').summernote('code'));
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
	      	$(".updateFormError").html('');
	      	$.each(res.errors,function(key,value){
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
<script type="text/javascript">
  var inputLocalFont = document.getElementById("image2");
	inputLocalFont.addEventListener("change",previewImages2,false);
	function previewImages2(){
	    var fileList = this.files;
	    var anyWindow = window.URL || window.webkitURL;
	$('.preview-area2').html('');
	        for(var i = 0; i < fileList.length; i++){
	          var objectUrl = anyWindow.createObjectURL(fileList[i]);
	          $('.preview-area2').append('<span class="span2"><img class="img-thumbnail" src="' + objectUrl + '" alt="" style="width:111px;height:100px"></span>');
	          window.URL.revokeObjectURL(fileList[i]);
	        }
	    }
</script>

@endsection

