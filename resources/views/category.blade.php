@extends('layout')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">Category  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCategoryModal">Add Category</button></div>
				<div class="card-body">
					<table class="table" id="categoryTable">
						<thead>
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>Description</th>
								<th>status</th>
								<th colspan="2">Action</th>
							</tr>
							
						</thead>
						<tbody>
							@foreach ($categories as $category)
								<tr id="cid{{$category->id}}">
									<td>{{$category->id}}</td>
									<td>{{$category->name}}</td>
									<td>{{$category->description}}</td>
									<td>{{$category->status}}</td>
									<td colspan="2">
										<a href="#" class="btn btn-primary  editbtn">Edit</a>
										<button class="btn btn-danger deletebtn">Delete</button>
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

<!-- for add Category modal -->
<div class="modal fade" id="addCategoryModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="categoryCrudModal"></h4>
        </div>
        <form id="addCategory" name="categoryForm" class="form-horizontal" method="POST">
        	@csrf
          <div class="modal-body">
              <input type="hidden" name="user_id" id="user_id">
              <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" name="name" placeholder="Enter Name" value="">
                </div>
              </div>
              <div class="form-group">
              <label class="col-sm-2 control-label">Description</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" name="description" value="">
                </div>
              </div>
              <div class="form-group">
              	<label for="status" class="input-group-text">Status</label>
              	<div class="form-group">
              		<input type="radio" id="active" name="status" value="1">
					<label for="status">Active</label><br>
					<input type="radio" id="deactive" name="status" value="0">
					<label for="status">Deactive</label><br>
				</div>
			   </div>
			  </div>
			  <input type="text" class="form-control" aria-label="Text input with radio button">
			</div>
          </div>
         <button type="submit" class="btn btn-primary" id="btn-save" value="create"> Submit </button>
        </form>
    </div>
  </div>
</div>

<!-- for edit Category modal -->
<div class="modal fade" id="editCategoryModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="CategoryCrudModal"></h4>
        </div>

        <div class="modal-body">
	      	<form id="editCategory" name="categoryForm" class="form-horizontal">
	        	@csrf
	        	@method('PUT')
	          <input type="hidden" name="id" id="id">
	          <div class="form-group">
	            <label for="name" class="col-sm-2 control-label">Name</label>
	            <div class="col-sm-12">
	                <input type="text" class="form-control" id="name" name="name">
	            </div>
	          </div>
	          <div class="form-group">
	          <label class="col-sm-2 control-label">Description</label>
	            <div class="col-sm-12">
	                <input type="text" class="form-control" id="description" name="description">
	            </div>
	          </div>
	          <div class="form-group">
              	<label for="status" class="input-group-text">Status</label>
              	<div class="form-group">
              		<input type="radio" id="active" name="status" value="1">
					<label for="status">Active</label><br>
					<input type="radio" id="deactive" name="status" value="0">
					<label for="status">Deactive</label><br>
				</div>
	          </div>
	         <button type="submit" class="btn btn-primary" id="btn-save"> Save Changes </button>
	        </form>
        </div>
    </div>
  </div>
</div>
<!-- End of edit category modal -->

<!-- for delete Category modal -->
<div class="modal fade" id="deleteCategoryModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="CategoryCrudModal"></h4>
        </div>

        <div class="modal-body">
	      	<form id="deleteCategory" name="categoryForm" class="form-horizontal">
	        	@csrf
	        	@method('DELETE')
	          <input type="hidden" name="id" id="delete_id">
	         	<p>Are you sure!! you want to delete this data?</p> 
	         <button type="submit" class="btn btn-primary" id="btn-save">Delete</button>
	         <button type="button" class="btn btn-secondary" data-dismiss="modal"> Cancel </button>
	        </form>
        </div>
    </div>
  </div>
</div>
<!-- End of delete category modal -->


<!-- Ajax for addCategory -->
<script>
	$('#addCategory').submit(function(e){
		e.preventDefault();
		var name = $("input[name=name]").val();
		var description = $("input[name=description]").val();
		var status = $("input[name=status]").val();
		var _token = $("input[name=_token]").val();

		//Ajax Method
		$.ajax({
			url:"{{route('category.add')}}",
			type:"POST",
			data:{
				name:name,
				description:description,
				status:status,
				_token:_token
			},
			success:function(response){
				console.log(response);
				$('#categoryTable tbody').append('<tr><td>'+name+'<tr><td>'+description+'<tr><td>'+status);
				alert("Category Saved");
			  $('#addCategory').trigger("reset");
              $('#addCategoryModal').modal('hide');
			},


		});
	})
</script>

<!-- AJAX for editCategory -->
<script>
	$(document).ready(function(){
		$('.editbtn').on('click', function(){
			$('#editCategoryModal').modal('show');

			$tr = $(this).closest('tr');

			var data = $tr.children("td").map(function() {
				return $(this).text();
			}).get();

			console.log(data);

			$('#id').val(data[0]);
			$('#name').val(data[1]);
			$('#description').val(data[2]);
			$('#status').val(data[3]);
		});

		$('#editCategory').on('submit', function(e){
			e.preventDefault();

			var id = $('#id').val();

			$.ajax({
				type: "PUT",
				url: "/category/"+id,
				data: $('#editCategory').serialize(),
				success: function(response) {
					$('#editCategoryModal').modal('hide');
					alert("Category Updated");
					window.location.reload();
				},
				error: function(error) {
					console.log(error);
				}
			});
		});
	});
</script>

<script>
	$('.deletebtn').on('click', function() {
		$('#deleteCategoryModal').modal('show');

		$tr = $(this).closest('tr');

		var data = $tr.children("td").map(function() {
			return $(this).text();
		}).get();

		console.log(data);

		$('#delete_id').val(data[0]);
	});

	//AJAX for Delete data
	$('#deleteCategory').on('submit', function(e){
		e.preventDefault();

		var id = $('#delete_id').val();
		$.ajaxSetup({
		  headers: {
		    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		  }
		});
		$.ajax({
			type: "DELETE",
			url: "/category/"+id,
			data: $('deleteCategory').serialize(),
			success: function(response) {
				console.log(response);
				$('#deleteCategoryModal').modal('hide');
				alert("Data Deleted");
				location.reload();
			},
			error: function(error) {
				console.log(error);
			}
		});
	});

</script> 

@endsection