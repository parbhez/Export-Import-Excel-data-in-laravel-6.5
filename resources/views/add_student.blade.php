<!DOCTYPE html>
<html>
<head>
	<title>Persoanl information</title>
	<link rel="stylesheet" type="text/css" href="{{URL::to('css/bootstrap.min.css')}}">
</head>
<body>
	<div class="container mt-4 col-md-8">
		<div class="row">
			<div class="cart">
				<div class="cart-header p-4 text-white bg-info">
					<h3>Student Profile</h3>
					<a class="btn btn-outline-secondary" href="{{URL::to('/all-student')}}">All Student</a>
				</div>
					<div class="cart-body">
						<p class="alert-success">
							<?php 
								$message = Session::get('message');
								if ($message) {
									echo $message;
									Session::put('message',null);
								}
							 ?>
						</p> 
						<form action="{{URL::to('/save-student')}}" method="post" enctype="multipart/form-data">
						@csrf
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" name="name" id="name" class="form-control">
							</div>
							<div class="form-group">
								<label for="roll">Roll</label>
								<input type="number" name="roll" id="roll" class="form-control">
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" name="email" id="email" class="form-control">
							</div>

							<div class="form-group">
								<label for="contact">contact</label>
								<input type="contact" name="contact" id="contact" class="form-control">
							</div>

							

							<!-- <div class="form-group">
								<label for="password">Password</label>
								<input type="password" name="password" id="password" class="form-control">
							</div> -->
							<!-- <div class="form-group">
								<label for="image">Image</label>
								<input type="file" name="image" id="image" class="form-control">
							</div> -->
							<div class="form-group">
								<button type="submit" class="btn btn-outline-info">Submit</button>
							</div>
						</form>
					</div>
			</div>
		</div>
	</div>
</body>
</html>