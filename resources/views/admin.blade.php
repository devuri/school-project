<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Admin page</title>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/admin.css') }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
// <div class="card-body">
//                     @if (session('status'))
//                         <div class="alert alert-success" role="alert">
//                             {{ session('status') }}
//                         </div>
//                     @endif
//                    You are logged in!
//                 </div>

$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});
</script>
</head>
<body>
<div class="container-xl">

	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Manage <b>Students</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Students</span></a>
						<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
					</div>
				</div>
			</div>

			<table class="table table-striped table-hover" id="datatable">
				<thead>
					<tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
						<th>ID</th>
						<th>Fist Name</th>
						<th>Last Name</th>
						<th>Username</th>
						<th>Gender</th>
						<th>Email</th>
						<th>Address</th>
						<th>Phone</th>
						<th>Subject</th>
						<th>Mark1</th>
						<th>Mark2</th>
						<th>Mark3</th>
						<th>Mark4</th>
						<th>Average</th>
						<th>Status</th>
						<th>Actions</th>
                        
					</tr>
					@foreach ($users as $item)
				</thead>
				<tbody>
					<tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
						<td>{{$item['id']}}</td>
						<td>{{$item['firstname']}}</td>
						<td>{{$item['lastname']}}</td>
						<td>{{$item['username']}}</td>
						<td>{{$item['gender']}}</td>
						<td>{{$item['email']}}</td>
						<td>{{$item['address']}}</td>
						<td>{{$item['telephone']}}</td>
						<td>{{$item['subject']}}</td>
						<td>{{$item['mark1']}}</td>
						<td>{{$item['mark2']}}</td>
						<td>{{$item['mark3']}}</td>
						<td>{{$item['mark4']}}</td>
						<td>{{$item['average']}}</td>
                        <td><span class="status text-success">&bull;</span> {{$item['status']}}</td>					
						<td>
							<?php $test = $item->id;?>
							<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a onclick="deletes({{$test}})" href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
					</tr>
					@endforeach
					
				</tbody>
			</table>
			<div class="clearfix">
				<div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
				<ul class="pagination">
					<li class="page-item disabled"><a href="#">Previous</a></li>
					<li class="page-item"><a href="#" class="page-link">1</a></li>
					<li class="page-item"><a href="#" class="page-link">2</a></li>
					<li class="page-item active"><a href="#" class="page-link">3</a></li>
					<li class="page-item"><a href="#" class="page-link">4</a></li>
					<li class="page-item"><a href="#" class="page-link">5</a></li>
					<li class="page-item"><a href="#" class="page-link">Next</a></li>
				</ul>
			</div>
		</div>
	</div>        
</div>
<!-- Edit Modal HTML -->

<div id="addEmployeeModal" class="modal" style= "display: none">
@if(count($errors)>0)
	<div class="alert alert-danger">
		<ul>
			@foreach($errors->all as $error)
			<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>
	@endif
	@if(\Session::has('success'))
		<div class="alert alert-success">
			<p>{{\Session::get('success')}}</p>
		</div>
	@endif
	<div class="modal-dialog" id="editmodal">
		<div class="modal-content">
			<form action="" method="POST" >
				@csrf
				
				<div class="modal-header">						
					<h4 class="modal-title">Add Student</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>First Name</label>
						<input type="text" id="fname" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Last Name</label>
						<input type="text" id="lname" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Username</label>
						<input type="text" id="username" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Gender</label>
						<input type="text" id="gender"class="form-control" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" id="email"class="form-control" required>
					</div>
					<div class="form-group">
						<label>Address</label>
						<textarea class="form-control" id="address" required></textarea>
					</div>
					<div class="form-group">
						<label>Phone</label>
						<input type="text" id="phone" class="form-control" required>
					</div>	
					<div class="form-group">
						<label>Subject</label>
						<input type="text" id="subj" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Mark 1</label>
						<input type="text" id="mark2" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Mark 2</label>
						<input type="text" id="mark2" class="form-control" required>
					</div>	
					<div class="form-group">
						<label>Mark 3</label>
						<input type="text" id="mark3" class="form-control" required>
					</div>	
					<div class="form-group">
						<label>Mark 4</label>
						<input type="text" id="mark4" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Average</label>
						<input type="text" id="avg" class="form-control" required>
					</div>	
					<div class="form-group">
						<label>Status</label>
						<input type="text" id="status" class="form-control" required>
					</div>						
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="/admin" method="POST" id="editform"> 
				@csrf
				{{ method_field('PUT') }}
				<div class="modal-header">						
					<h4 class="modal-title">Edit Student</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
					<label>First Name</label>
						<input type="text" id="fname" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Last Name</label>
						<input type="text" id="lname" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Username</label>
						<input type="text" id="username" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Gender</label>
						<input type="text" id="gender"class="form-control" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" id="email"class="form-control" required>
					</div>
					<div class="form-group">
						<label>Address</label>
						<textarea class="form-control" id="address" required></textarea>
					</div>
					<div class="form-group">
						<label>Phone</label>
						<input type="text" id="phone" class="form-control" required>
					</div>	
					<div class="form-group">
						<label>Subject</label>
						<input type="text" id="subj" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Mark 1</label>
						<input type="text" id="mark1" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Mark 2</label>
						<input type="text" id="mark2" class="form-control" required>
					</div>	
					<div class="form-group">
						<label>Mark 3</label>
						<input type="text" id="mark3" class="form-control" required>
					</div>	
					<div class="form-group">
						<label>Mark 4</label>
						<input type="text" id="mark4" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Average</label>
						<input type="text" id="avg" class="form-control" required>
					</div>	
					<div class="form-group">
						<label>Status</label>
						<input type="text" id="status" class="form-control" required>
					</div>			
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-info" value="Save">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="delete" method="post">
				@csrf
				<div class="modal-header">						
					<h4 class="modal-title">Delete Student</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>Are you sure you want to delete this Record?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
					<input hidden type="text" name="id" id="test" value="">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-danger" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script>
	function deletes(clr){
		document.getElementById('test').value = clr;
		console.log(clr);
	}
</script>
<script type="text/javascript">
$(document).ready(function(){
	var table= $('#datatable').DataTable();

	//start edit record
	table.on('click','.edit',function(){
	$tr = $(this).closest('tr');
	if($($tr).hasClass('child')){
		$tr =$tr.prev('.parent');
	}
	var data = table.row($tr).data();
	console.log(data);
	$('#fame').val(data[1]);
	$('#lname').val(data[2]);
	$('#userame').val(data[3]);
	$('#gender').val(data[4]);
	$('#email').val(data[5]);
	$('#address').val(data[6]);
	$('#phone').val(data[7]);
	$('#subj').val(data[8]);
	$('#mark1').val(data[9]);
	$('#mark2').val(data[10]);
	$('#mark3').val(data[11]);
	$('#mark4').val(data[12]);
	$('#avg').val(data[13]);
	$('#status').val(data[14]);

	$('#editform').attr('action','/admin/'+data[0]);
	$('#editModal').modal('show');
})
</script>

</body>
</html>