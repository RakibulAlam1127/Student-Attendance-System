<?php
/**
 * Created by PhpStorm.
 * User: Rakib
 * Date: 3/9/2018
 * Time: 3:43 AM
 */
$email = $password = '';
$errors = [];
if (isset($_POST['login'])){
    if (empty($_POST['email'])){
        $errors[] = 'Email Field Must be Required';
    }else{
        $email = $_POST['email'];
    }
    if (empty($_POST['password'])){
        $errors[] = 'Password Field Must be Required';
    }else{
        $password = $_POST['password'];
    }
    if (empty($errors)) {
        //Our database connection will be gose here.
        $connection = mysqli_connect('localhost', 'root', '', 'sas');
        if ($connection == false) {
            echo mysqli_connect_errno();
            exit();
        }else{
            $sql = "select id,email,password from teacher_register where email = '$email'";
            $stmt = mysqli_query($connection,$sql);
//            var_dump($stmt);
//            die();
            if ($stmt == false){
                echo mysqli_error($connection);
                exit();
            }else{
                $result = mysqli_num_rows($stmt);
                if ($result === 0){
                    $errors[] = 'Email Address is Not Found';
                }else{
                    $data = mysqli_fetch_assoc($stmt);
                    $password = password_verify($password,$data['password']);
                    if ($password ==  true){
                        header('Location:attendence.php');
                    }else{
                        $errors[] = 'Password is Wrong';
                    }
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
                 <div class="alert alert-danger"> <?php echo $error; ?> </div>
                 <?php
             }
         }
      ?>
    <div class="panel panel-info">
        <div class="panel-heading">
            <h1 style="text-align: center">Teacher Registration Form</h1>
        </div>
        <div class="panel-body">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" METHOD="post">
                <div class="form-group">
                    <label for="email">Teacher E-mail</label>
                    <input type="email" name="email" class="form-control" placeholder="E-mail Address" autofocus>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="password" autofocus>
                </div>

                <div class="form-group">
                    <input type="submit" name="login" class="btn btn-primary" value="Log In">
                    <a style="text-decoration: none"class="pull-right" href="teachers_reg.php">Have No Account?Please Registration</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>

