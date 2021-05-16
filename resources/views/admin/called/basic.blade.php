@if ($viewType == 'editSlider')

	<form method="POST" id="updateForm"  enctype="multipart/form-data" onsubmit="return update_validation()">
		@method('PUT')
		@csrf
		<input type="hidden" name="id" value="{{ $data->id }}">
		<span class="updateFormError"></span>
		<div class="form-group row">
			<div class="col-md-6">
				<label class="col-form-label">Title</label>
				<input type="text" required name="title" value="{{ $data->title }}" class="form-control-sm form-control">
			</div>
			<div class="col-md-3">
				<label class="col-form-label">Display Order </label>
				<input type="text"  name="displayOrder" value="{{ $data->displayOrder }}"  class="form-control-sm form-control">
			</div>
			 <div class="col-md-3">
				<label class="col-form-label">Display</label>
				<select name="display" class="form-control form-control-sm">
					<option 
					@if ($data->display == 'yes')
						{{ 'selected' }}
					@endif value="yes">Yes</option>
					<option 
					@if ($data->display == 'no')
						{{ 'selected' }}
					@endif  value="no">No</option>
				</select>
			 </div>
	
		</div>


					     
		<div class="form-group row">
		    <div class="col-md-4">
				<label class="col-form-label">Image</label>
		      	<input type="file" id="image2"  name="files"  class="form-control-sm input-sm form-control">
			</div>			             
		</div>
		<span class="preview-area2">
			<img src="{{ asset('images/thumb').'/'.$data->image }}">
		</span>
		
		<div class="form-group row">
		    <div class="col-md-12">
				<button type="submit" class="float-right btn btn-primary btn-sm ">Save Data</button>
			</div>
		</div>  
	</form>
	<script type="text/javascript">
	  var inputLocalFont = document.getElementById("image2");
	inputLocalFont.addEventListener("change",previewImages,false);
	function previewImages(){
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
	
@endif
@if ($viewType == 'editCareer')
	
	<form method="POST" id="updateForm"  enctype="multipart/form-data" onsubmit="return update_validation()">
		@method('PUT')
		@csrf
		<input type="hidden" name="id" value="{{ $data->id }}">
		<span class="updateFormError"></span>
		<div class="form-group row">
			<div class="col-md-6">
				<label class="col-form-label">Title</label>
				<input type="text" required name="title" value="{{ $data->title }}" class="form-control-sm form-control">
			</div>
			<div class="col-md-2">
				<label class="col-form-label">Type</label>
				<input type="text" name="type" value="{{ $data->type }}"  class="form-control-sm form-control">
			</div>
			<div class="col-md-2">
				<label class="col-form-label">Display</label>
				<select name="display" class="form-control form-control-sm">
					<option 
					@if ($data->display == 'yes')
						{{ 'selected' }}
					@endif value="yes">Yes</option>
					<option 
					@if ($data->display == 'no')
						{{ 'selected' }}
					@endif  value="no">No</option>
				</select>
			 </div>
 			<div class="col-md-2">
				<label class="col-form-label">Experience</label>
				<input type="text"  name="exp" value="{{ $data->exp }}"  class="form-control-sm form-control">
			</div>
			
		</div>
		<div class="form-group row">
			<div class="col-md-12">
				<input type="hidden" name="details" class="sn2replace">
				<div class="sn2">@php
					echo $data->details;
				@endphp</div>
				
			</div>
		</div>

		
		
		<div class="form-group row">
		    <div class="col-md-12">
				<button type="submit" class="float-right btn btn-primary btn-sm ">Save Data</button>
			</div>
		</div>  
	</form>

	<script>
	 		$('.sn2').summernote();
	</script>
@endif

@if ($viewType == 'editProject')
	
	<form method="POST" id="updateForm"  enctype="multipart/form-data" onsubmit="return update_validation()">
		@method('PUT')
		@csrf
		<input type="hidden" name="id" value="{{ $data->id }}">
		<span class="updateFormError"></span>
		<div class="form-group row">
			<div class="col-md-6">
				<label class="col-form-label">Name</label>
				<input type="text" required name="name" value="{{ $data->name }}" class="form-control-sm form-control">
			</div>
			<div class="col-md-2">
				<label class="col-form-label">Type</label>
				<select name="type" class="form-control form-control-sm">
					<option 
					@if ($data->type == 'Current')
						{{ 'selected' }}
					@endif value="Current">Current</option>
					<option 
					@if ($data->type == 'Completed')
						{{ 'selected' }}
					@endif  value="Completed">Completed</option>
				</select>
			 </div>
			<div class="col-md-2">
				<label class="col-form-label">Display</label>
				<select name="display" class="form-control form-control-sm">
					<option 
					@if ($data->display == 'yes')
						{{ 'selected' }}
					@endif value="yes">Yes</option>
					<option 
					@if ($data->display == 'no')
						{{ 'selected' }}
					@endif  value="no">No</option>
				</select>
			 </div>
 			<div class="col-md-2">
				<label class="col-form-label">City</label>
				<input type="text"  name="city" value="{{ $data->city }}"  class="form-control-sm form-control">
			</div>
			
			
			
			
		</div>
		<div class="form-group row">
			<div class="col-md-12">
				<input type="hidden" name="details" class="sn2replace">
				<div class="sn2">@php
					echo $data->details;
				@endphp</div>
				
			</div>
		</div>

					     
		<div class="form-group row">
		    <div class="col-md-4">
				<label class="col-form-label">Image</label>
		      	<input type="file" id="image2"  name="files"  class="form-control-sm input-sm form-control">
		      	<span class="preview-area2">
					<img src="{{ asset('images/thumb').'/'.$data->image }}">
				</span>
			</div>	
             
		</div>
		
		
		<div class="form-group row">
		    <div class="col-md-12">
				<button type="submit" class="float-right btn btn-primary btn-sm ">Save Data</button>
			</div>
		</div>  
	</form>
	<script type="text/javascript">
	  var inputLocalFont = document.getElementById("image2");
	inputLocalFont.addEventListener("change",previewImages,false);
	function previewImages(){
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
	<script>

	 		$('.sn2').summernote();
	</script>
@endif

@if ($viewType == 'editProduct')
	
	<form method="POST" id="updateForm"  enctype="multipart/form-data" onsubmit="return update_validation()">
		@method('PUT')
		@csrf
		<input type="hidden" name="id" value="{{ $data->id }}">
		<span class="updateFormError"></span>
		<div class="form-group row">
			<div class="col-md-6">
				<label class="col-form-label">Name</label>
				<input type="text" required name="name" value="{{ $data->name }}" class="form-control-sm form-control">
			</div>
			<div class="col-md-3">
				<label class="col-form-label">Price</label>
				<input type="text" name="price" value="{{ $data->price }}"  class="form-control-sm form-control">
			</div>
			<div class="col-md-3">
				<label class="col-form-label">Display</label>
				<select name="display" class="form-control form-control-sm">
					<option 
					@if ($data->display == 'yes')
						{{ 'selected' }}
					@endif value="yes">Yes</option>
					<option 
					@if ($data->display == 'no')
						{{ 'selected' }}
					@endif  value="no">No</option>
				</select>
			 </div>
 			<div class="col-md-4">
				<label class="col-form-label">Title</label>
				<input type="text"  name="title" value="{{ $data->title }}"  class="form-control-sm form-control">
			</div>
			<div class="col-md-4">
				<label class="col-form-label">Keywords</label>
				<input type="text"  name="keyword"  value="{{ $data->keyword }}" class="form-control-sm form-control">
			</div>
			<div class="col-md-4">
				<label class="col-form-label">Description</label>
				<input type="text" value="{{ $data->description }}"  name="description"  class="form-control-sm form-control">
			</div>
			
			
			
		</div>
		<div class="form-group row">
			<div class="col-md-12">
				<input type="hidden" name="details" class="sn2replace">
				<div class="sn2">@php
					echo $data->details;
				@endphp</div>
				
			</div>
		</div>

					     
		<div class="form-group row">
		    <div class="col-md-4">
				<label class="col-form-label">Image</label>
		      	<input type="file" id="image2"  name="files"  class="form-control-sm input-sm form-control">
		      	<span class="preview-area2">
					<img src="{{ asset('images/thumb').'/'.$data->image }}">
				</span>
			</div>	
			 <div class="col-md-4">
				<label class="col-form-label">Booklit</label>
		      	<input type="file"   name="files2"  class="form-control-sm input-sm form-control">
			</div>		
			<div class="col-md-4">
				<label class="col-form-label">Select Category</label>
				<select name="cat_id" class="form-control form-control">
					{{ Helper::getOptions('categories','cat_id','cat_name',$data->cat_id) }}
				</select>
			</div>	             
		</div>
		
		
		<div class="form-group row">
		    <div class="col-md-12">
				<button type="submit" class="float-right btn btn-primary btn-sm ">Save Data</button>
			</div>
		</div>  
	</form>
	<script type="text/javascript">
	  var inputLocalFont = document.getElementById("image2");
	inputLocalFont.addEventListener("change",previewImages,false);
	function previewImages(){
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
	<script>

	 		$('.sn2').summernote();
	</script>
@endif
@if ($viewType == 'editBlog')

	<form method="POST" id="updateForm"  enctype="multipart/form-data" onsubmit="return update_validation()">
		@method('PUT')
		@csrf
		<input type="hidden" name="id" value="{{ $data->id }}">
		<span class="updateFormError"></span>
		<div class="form-group row">
			<div class="col-md-6">
				<label class="col-form-label">Title</label>
				<input type="text" required name="title" value="{{ $data->title }}" class="form-control-sm form-control">
			</div>
			<div class="col-md-3">
				<label class="col-form-label">Published by</label>
				<input type="text"  name="user" value="{{ $data->user }}"  class="form-control-sm form-control">
			</div>
			 <div class="col-md-3">
				<label class="col-form-label">Display</label>
				<select name="display" class="form-control form-control-sm">
					<option 
					@if ($data->display == 'yes')
						{{ 'selected' }}
					@endif value="yes">Yes</option>
					<option 
					@if ($data->display == 'no')
						{{ 'selected' }}
					@endif  value="no">No</option>
				</select>
			 </div>
			<div class="col-md-12">
				<label class="col-form-label">Description</label>
				<input type="text"  name="description" value="{{ $data->description }}"  class="form-control-sm form-control">
			</div>
		</div>
		<div class="form-group row">
			<div class="col-md-12">
				<input type="hidden" name="details" class="sn2replace">
				<div class="sn2">@php
					echo $data->details;
				@endphp</div>
				
			</div>
		</div>

					     
		<div class="form-group row">
		    <div class="col-md-4">
				<label class="col-form-label">Image</label>
		      	<input type="file" id="image2"  name="files"  class="form-control-sm input-sm form-control">
			</div>			             
		</div>
		<span class="preview-area2">
			<img src="{{ asset('images/thumb').'/'.$data->image }}">
		</span>
		
		<div class="form-group row">
		    <div class="col-md-12">
				<button type="submit" class="float-right btn btn-primary btn-sm ">Save Data</button>
			</div>
		</div>  
	</form>
	<script type="text/javascript">
	  var inputLocalFont = document.getElementById("image2");
	inputLocalFont.addEventListener("change",previewImages,false);
	function previewImages(){
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
	<script>

	 		$('.sn2').summernote();
	</script>
@endif

@if ($viewType == 'editMenu')
	<form method="POST" id="updateForm"  enctype="multipart/form-data" onsubmit="return update_validation()">
		@method('PUT')
		@csrf
		<input type="hidden" name="menu_id" value="{{ $data->menu_id }}">
		<span class="updateFormError"></span>
			
		<div class="form-group row">
			<div class="col-md-4">
				<label class="col-form-label">Mneu Name</label>
				<input type="text" value="{{ $data->name }}" required name="name"  class="form-control-sm form-control">
			</div>
			<div class="col-md-4">
				<label class="col-form-label">Slug</label>
				<input type="text" required name="slug" value="{{ $data->slug }}"  class="form-control-sm form-control">
			</div>
			<div class="col-md-4">
				<label class="col-form-label">Parent Menu</label>
				<select class="form-control form-control-sm" name="parent_id">
					<option selected value="0">No parent</option>
					{{ Helper::getMenuOptions($data->parent_id) }}
				</select>
			</div>
			<div class="col-md-4">
				<label class="col-form-label">Page Title</label>
				<input type="text" value="{{ $data->title }}" name="title"  class="form-control-sm form-control">
			</div>
			<div class="col-md-4">
				<label class="col-form-label">Meta Keywords</label>
				<input type="text"  value="{{ $data->keywords }}" name="keywords"  class="form-control-sm form-control">
			</div>
			<div class="col-md-4">
				<label class="col-form-label">Heading</label>
				<input type="text" value="{{ $data->heading }}"  name="heading"  class="form-control-sm form-control">
			</div>
			<div class="col-md-8">
				<label class="col-form-label">Description</label>
				<input type="text" value="{{ $data->description }}"  name="description"  class="form-control-sm form-control">
			</div>
			<div class="col-md-2">
				<label class="col-form-label">Display</label>
				<select name="display" class="form-control form-control-sm">
					<option 
					@if ($data->display == 'yes')
						{{ 'selected' }}
					@endif value="yes">Yes</option>
					<option 
					@if ($data->display == 'no')
						{{ 'selected' }}
					@endif  value="no">No</option>
				</select>
			</div>
			<div class="col-md-2">
				<label class="col-form-label">Display Order</label>
				<input type="number" value="{{ $data->displayOrder }}" name="displayOrder"  class="form-control-sm form-control">
			</div>
		</div>

		<div class="form-group row">
			<div class="col-md-12">
				<input type="hidden" name="details" class="sn2replace">
				<div class="sn2">@php
					echo $data->details;
				@endphp</div>
				
			</div>
		</div>

					     
		<div class="form-group row">
		    <div class="col-md-4">
				<label class="col-form-label">Image</label>
		      	<input type="file" id="image2"  name="files"  class="form-control-sm input-sm form-control">
			</div>
			<div class="col-md-6">
				<label class="col-form-label">Position</label>
				<br>
				<div class="form-check form-check-inline">
					<label class="form-check-label">
					<input class="form-check-input" type="checkbox" 
					@if (in_array('navigation',explode(',', $data->position)))
						{{ ' checked ' }}
					@endif  name='position[]' value="navigation">Navigation
					</label>
				</div>
				<div class="form-check form-check-inline">
					<label class="form-check-label">
					<input class="form-check-input" type="checkbox" 
					@if (in_array('footer',explode(',', $data->position)))
						{{ ' checked ' }}
					@endif name='position[]' value="footer">Footer
					</label>
				</div>
				<div class="form-check form-check-inline">
					<label class="form-check-label">
					<input class="form-check-input" type="checkbox"
					@if (in_array('footer2',explode(',', $data->position)))
						{{ ' checked ' }}
					@endif name='position[]' value="footer2">Other Links (Footer)
					</label>
				</div>
			</div>		             
		</div>
		<span class="preview-area2">
			<img src="{{ asset('images/thumb').'/'.$data->image }}">
		</span>
		
		<div class="form-group row">
		    <div class="col-md-12">
				<button type="submit" class="float-right btn btn-primary btn-sm ">Save Data</button>
			</div>
		</div>  
	</form>
	<script type="text/javascript">
	  var inputLocalFont = document.getElementById("image2");
	inputLocalFont.addEventListener("change",previewImages,false);
	function previewImages(){
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
	<script>
		$('.sn2').summernote();
	</script>
@endif

@if ($viewType == 'editCategory')

	<form method="POST" id="updateForm"  enctype="multipart/form-data" onsubmit="return update_validation()">
		@method('PUT')
		@csrf
		<input type="hidden" name="cat_id" value="{{ $data->cat_id }}">
		<span class="updateFormError"></span>
		<div class="form-group row">
			<div class="col-md-6">
				<label class="col-form-label">Name</label>
				<input type="text" required name="cat_name" value="{{ $data->cat_name }}" class="form-control-sm form-control">
			</div>
			<div class="col-md-6">
				<label class="col-form-label">Parent Category</label>
				<select class="form-control form-control-sm" name="parent_id">
					<option selected value="0">No parent</option>
					{{ Helper::getOptions('categories','cat_id','cat_name',$data->parent_id) }}
				</select>
			</div>
			<div class="col-md-12">
				<label class="col-form-label">Description</label>
				<input type="text"  name="cat_desc" value="{{ $data->cat_desc }}"  class="form-control-sm form-control">
			</div>
		</div>
		<div class="form-group row">
			<div class="col-md-12">
				<input type="hidden" name="cat_details" class="sn2replace">
				<div class="sn2">@php
					echo $data->cat_details;
				@endphp</div>
				
			</div>
		</div>

					     
		<div class="form-group row">
		    <div class="col-md-4">
				<label class="col-form-label">Image</label>
		      	<input type="file" id="image2"  name="files"  class="form-control-sm input-sm form-control">
			</div>			             
		</div>
		<span class="preview-area2">
			<img src="{{ asset('images/thumb').'/'.$data->cat_image }}">
		</span>
		
		<div class="form-group row">
		    <div class="col-md-12">
				<button type="submit" class="float-right btn btn-primary btn-sm ">Save Data</button>
			</div>
		</div>  
	</form>
	<script type="text/javascript">
	  var inputLocalFont = document.getElementById("image2");
	inputLocalFont.addEventListener("change",previewImages,false);
	function previewImages(){
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
	<script>

	 		$('.sn2').summernote();
	</script>
@endif

@if ($viewType == 'editCmsUser')

	<form method="POST" id="updateForm"  enctype="multipart/form-data" onsubmit="return update_validation()">
		@method('PUT')
		@csrf
		<input type="hidden" name="id" value="{{ $data->id }}">
		<span class="updateFormError"></span>
		<div class="form-group row">
			<div class="col-md-4">
				<label class="col-form-label">Name</label>
				<input type="text" required name="name" value="{{ $data->name }}"  class="form-control-sm form-control">
			</div>
			<div class="col-md-4">
				<label class="col-form-label">Email</label>
				<input type="email"  name="email" value="{{ $data->email }}"  class="form-control-sm form-control">
			</div>
			<div class="col-md-4">
				<label class="col-form-label">New Password</label>
				<input type="password"  name="password"   class="form-control-sm form-control">
			</div>
		</div>
					     
		<div class="form-group row">
		    <div class="col-md-4">
				<label class="col-form-label">Image</label>
		      	<input type="file" id="image2"  name="files"  class="form-control-sm input-sm form-control">
			</div>			             
		</div>
		<span class="preview-area2">
			<img src="{{ asset('images/thumb').'/'.$data->image }}">
		</span>
		
		<div class="form-group row">
		    <div class="col-md-12">
				<button type="submit" class="float-right btn btn-primary btn-sm ">Save Data</button>
			</div>
		</div>  
	</form>
	<script type="text/javascript">
	  var inputLocalFont = document.getElementById("image2");
	inputLocalFont.addEventListener("change",previewImages,false);
	function previewImages(){
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

@endif