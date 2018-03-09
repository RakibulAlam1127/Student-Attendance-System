<?php
/**
 * Created by PhpStorm.
 * User: Rakib
 * Date: 3/9/2018
 * Time: 2:42 AM
 */
$id = $name = $dept = '';
$errors = [];
if (isset($_POST['submit'])){
  if (empty($_POST['id'])){
      $errors['id'] = 'Student Id Field Must Be Required';
  }else{
      $id = $_POST['id'];
  }
  if (empty($_POST['name'])){
      $errors['name'] = 'Student Name Field Must Be Required';
  }else{
      $name = $_POST['name'];
  }
  if (empty($_POST['dept'])){
      $errors['name'] = 'Student Department Field Must Be Required';
  }else{
      $dept = $_POST['dept'];
  }

  if (empty($errors)){
      //Our database Connection code will be gose here.
      var_dump($id,$name,$dept);
  }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Student</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body>
     <div class="container">
          <div class="well">
             <h1 style="text-align: center">Add Student For Attendance</h1>
          </div>
         <?php
           if (isset($errors)){
               foreach ($errors as $error){
                   ?>
                       <p style="color: #ff0000;">*</p>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                   <?php

               }
               ?>

         <?php
           }
         ?>
         <div class="panel panel-info">
             <div class="panel-heading"></div>
         <div class="panel-body">
             <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
               <div class="form-group">
                   <label for="id">Student ID</label>
                   <input type="text" name="id" class="form-control" placeholder="Student Id" autofocus>
               </div>
                 <div class="form-group">
                     <label for="name">Student Name</label>
                     <input type="text" name="name" class="form-control" placeholder="Student Name" autofocus>
                 </div>
                 <div class="form-group">
                     <label for="name">Student Department</label>
                     <select name="dept" class="form-control">
                         <option value="CSE">Computer Science And Engineering</option>
                         <option value="EEE">Electronic And Electrical Engineering</option>
                         <option value="SWE">Software Engineering</option>
                         <option value="TXE">Textile Engineering</option>
                     </select>
                 </div>
                 <div class="form-group">

                     <input type="submit" name="submit" class="center-block btn btn-success" value="Add Student">
                 </div>

             </form>
         </div>
         </div>
     </div>
</body>
</html>
