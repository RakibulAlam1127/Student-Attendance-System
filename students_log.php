<?php
/**
 * Created by PhpStorm.
 * User: Rakib
 * Date: 3/9/2018
 * Time: 3:43 AM
 */
$errors = [];
$password = $email = '';
if (isset($_POST['login'])) {
    if (empty($_POST['email'])) {
        $errors[] = 'Email Field Must be Required';
    } else {
        $email = $_POST['email'];
    }
    if (empty($_POST['password'])) {
        $errors[] = 'Password Field Must be Required';
    } else {
        $password = $_POST['password'];
    }
    if (empty($errors)) {
        $connection = mysqli_connect('localhost', 'root', '', 'sas');
        if ($connection == false) {
            echo mysqli_connect_errno();
            exit();
        } else {
               $sql = "select id,email,password from student_register where email = '$email'";
               $stmt = mysqli_query($connection,$sql);
               if ($stmt == false){
                   echo mysqli_error($connection);
                   exit();
               }else{
                   $result = mysqli_num_rows($stmt);
                   if ($result === 0){
                       $errors[] = 'Email Not Found';
                   }else{
                       $data = mysqli_fetch_assoc($stmt);
                       var_dump($data['password']);
                       die();
                       $password = password_verify($password,$data['password']);
                       if ($password == true){
                           header('Location:view.php');
                       }else{
                           $errors[] = 'Password is Wrong';
                       }
//
                   }
               }
        }
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
    <title>Student Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        .container{
            margin-left: 220px;
            margin-top: 100px;
        }
    </style>
</head>
<body>
<div class="container col-md-8">
       <?php
           if (isset($errors)){
               foreach ($errors as $error){
                   ?>
                     <div class="alert alert-danger"><?php echo $error ; ?> </div>
                   <?php
               }

           }
       ?>
    <div class="panel panel-info">
        <div class="panel-heading">
            <h1 style="text-align: center">Student Log In Form</h1>
        </div>
        <div class="panel-body">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form-group">
                    <label for="email">Student E-mail</label>
                    <input type="email" name="email" class="form-control" placeholder="E-mail Address" autofocus>

                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="password" autofocus>

                </div>
                <div class="form-group">
                    <input type="submit" name="login" class="btn btn-primary" value="Log In">
                    <a style="text-decoration: none"class="pull-right" href="students_reg.php">Have No Account?Please Registration</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
