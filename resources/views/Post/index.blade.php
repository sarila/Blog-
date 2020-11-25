@extends('layout')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">Posts  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#postModal">Add Post</button></div> <!-- Button trigger modal -->
				<div class="card-body">
					<table class="table" id="posttable">
						<thead>
							<tr>
								<th>ID</th>
								<th>Title</th>
								<th>Keywords</th>
								<th>Description</th>
								<th>Fullstory</th>
								<th>f_image</th>
								<th>status</th>
								<th colspan="2">Action</th>
							</tr>
							
						</thead>
						<tbody>
							@foreach ($posts as $post)
								<tr>
									<td>{{$post->id}}</td>
									<td>{{$post->title}}</td>
									<td>{{$post->keywords}}</td>
									<td>{{$post->description}}</td>
									<td>{{$post->fullstory}}</td>
									<td>{{$post->f_image}}</td>
									<td>{{$post->status}}</td>
									<td colspan="2">
										<button class="btn btn-primary">Edit</button>
										<button class="btn btn-danger mt-2">Delete</button>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Modal  for add post-->
<div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="addpost" method="POST">
        	@csrf
		  <div class="form-group">
		    <label for="title">Title</label>
		    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
		  </div>
		  <div class="form-group">
		    <label for="keywords">Keywords</label>
		    <input type="text" class="form-control" id="keywords" name="keywords" placeholder="Enter Keywords">
		  </div>
		  <div class="form-group">
		    <label for="description">Description</label>
		    <input type="text" class="form-control" id="description" name="description" placeholder="Enter Description">
		  </div>
		  <div class="form-group">
		    <label for="full story">Full Story</label>
		    <input type="text" class="form-control" id="fullstory" name="fullstory" placeholder="Enter Fullstory">
		  </div>
		  <div class="form-group">
		    <label for="feature image">Feature Image</label>
		    <input type="text" class="form-control" id="f_image" name="f_image" placeholder="Enter the image path">
		  </div>
		  <div class="form-group">
		    <label for="status">Status</label>
		    <input type="text" class="form-control" id="status" name="status" placeholder="Status 0/1">
		  </div>
		  <button type="submit" id="submit" class="btn btn-primary" value="create">Submit</button>
		</form>
      </div>
    </div>
  </div>
</div>


<!-- Modal  for edit post-->
<div class="modal fade" id="editPostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="addpost" method="POST">
        	@csrf
        	<input type="hidden" name="id" id="id">
		  <div class="form-group">
		    <label for="title">Title</label>
		    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
		  </div>
		  <div class="form-group">
		    <label for="keywords">Keywords</label>
		    <input type="text" class="form-control" id="keywords" name="keywords" placeholder="Enter Keywords">
		  </div>
		  <div class="form-group">
		    <label for="description">Description</label>
		    <input type="text" class="form-control" id="description" name="description" placeholder="Enter Description">
		  </div>
		  <div class="form-group">
		    <label for="full story">Full Story</label>
		    <input type="text" class="form-control" id="fullstory" name="fullstory" placeholder="Enter Fullstory">
		  </div>
		  <div class="form-group">
		    <label for="feature image">Feature Image</label>
		    <input type="text" class="form-control" id="f_image" name="f_image" placeholder="Enter the image path">
		  </div>
		  <div class="form-group">
		    <label for="status">Status</label>
		    <input type="text" class="form-control" id="status" name="status" placeholder="Status 0/1">
		  </div>
		  <button type="submit" id="submit" class="btn btn-primary" value="create">Submit</button>
		</form>
      </div>
    </div>
  </div>
</div>


<script>
	$('#addpost').submit(function(e){
		e.preventDefault();
		var title = $("input[name=title]").val();
		var keywords = $("input[name=keywords]").val();
		var description = $("input[name=description]").val();
		var fullstory = $("input[name=fullstory]").val();
		var f_image = $("input[name=f_image]").val();
		var status = $("input[name=status]").val();
		var _token = $("input[name=_token]").val();

		//Ajax Method
		$.ajax({
			url:"{{route('post.add')}}",
			type:"POST",
			data:{
				title:title,
				keywords:keywords,
				description:description,
				fullstory:fullstory,
				f_image:f_image,
				status:status,
				_token:_token
			},
			success:function(response){
				console.log(response);
				$('#posttable tbody').prepend('<tr><td>'+title+'<tr><td>'+keywords+'<tr><td>'+description+'<tr><td>'+fullstory+'<tr><td>'+f_image+'<tr><td>'+status);
			  $('#addpost').trigger("reset");
              $('#postModal').modal('hide');
			},


		});
	})
</script>

<!-- AJAX edit post -->

<script>
	function editPost(id)
	{
		$get('/post/'+id, function(post){
			$('#id').val(post.id);
			$('#title').val(post.title);
			
		})
	}
</script>
@endsection