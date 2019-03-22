<!DOCTYPE html>
<html>
<head>
  <title>Student Profile</title>
  <link rel="stylesheet" type="text/css" href="{{URL::to('css/bootstrap.min.css')}}">
</head>
<style type="text/css">
  form input {
    margin: top;
    margin: 5px;
  }
</style>
<body>
  <div class="container col-md-8 mt-4">
    <div class="row">
      <div class="card">
        <div class="cart-header text-white p-4 bg-success">
          <h3>Student Profile</h3>
          <a class="btn btn-outline-secondary" href="{{URL::to('/add-student')}}">Add Student</a>
          <form action="{{URL::to('/import_data')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="import_file">
        <p style="color: red;">{{$errors->first('file')}}</p>
        <input type="submit" name="import" class="btn btn-success btn-sm">
      </form>
      <a href="{{URL::to('/downloadExcel/xls')}}"><button class="btn btn-success">Download Excel xls</button></a>
            <a href="{{URL::to('/downloadExcel/xlsx')}}"><button class="btn btn-success">Download Excel xlsx</button></a>
            <a href="{{URL::to('/downloadExcel/csv')}}"><button class="btn btn-success">Download CSV</button></a>
        </div>

        <!-- <div style="padding: 0px;" class="col-md-12">
      
    </div> -->
    
        <div class="card-body">
              <p class="alert-success">
                <?php 
                    $message = Session::get('message');
                    if ($message) {
                      echo $message;
                      Session::put('message',null);
                    }
                 ?>
              </p>
              <table class="table">
                <thead class="thead-white">
                  <tr>
                    <th scope="col">Student Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Roll</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact</th>
                    <!-- <th scope="col">Image</th> -->
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($all_student as $student)
                  <tr>
                    <td scope="row">{{ $student->student_id }}</td>
                    <td>{{$student->name}}</td>
                    <td>{{$student->roll}}</td>
                    <td>{{$student->email}}</td>
                    <td>{{$student->contact}}</td>
                    <td>
                      <a class="btn btn-success btn-sm" href="{{URL::to('/edit-student')}}/{{$student->student_id}}">Edit</a>
                      <a onclick="return confirm('Are You sure want to delete this data???')" class="btn btn-danger btn-sm" href="{{URL::to('/delete-student')}}/{{$student->student_id}}">Delete</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
      </div>
    </div>
  </div>
</body>
</html>