<?php
/**
 * Created by PhpStorm.
 * User: Rakib
 * Date: 3/9/2018
 * Time: 3:43 AM
 */
$id = $name = $email = $password = $dept = '';
$errors = [];
if (isset($_POST['register'])){

    if (empty($_POST['id'])){
        $errors['id'] = 'Id Field is Required';
    }else{
        $id = $_POST['id'];
    }
    if (empty($_POST['name'])){
        $errors['name'] = 'Name Field is Required';
    }else{
        $name = $_POST['name'];
    }
    if (empty($_POST['email'])){
        $errors['email'] = 'Email Field is Required';
    }else{
        $email = $_POST['email'];
        if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $errors['email'] = 'Please Enter the Valid Email';
        }
    }
    if (empty($_POST['password'])){
        $errors['password'] = 'Password  Field  is Required';
    }else{
        $password = $_POST['password'];
        if (strlen($password) < 5){
            $errors['password'] = 'Password Must be At least 6 Character';
        }else{
            $password = password_hash($password,PASSWORD_BCRYPT);
        }
    }
    if (empty($_POST['dept'])){
        $errors['dept'] = 'Please Select Your Department';
    }else{
        $dept = $_POST['dept'];
    }
    if (empty($errors)){
        //Our database Connection code will be gose here.
        $connection = mysqli_connect('localhost','root','','sas');
        if ($connection == false){
            echo mysqli_connect_errno();
            exit();
    }else{
            $sql = "insert into teacher_register(id,name,email,password,dept)values('$id','$name','$email','$password','$dept')";

            $stmt = mysqli_query($connection,$sql);
//            var_dump($sql);
//            die();
            if ($stmt == false){
                echo mysqli_error($connection);
                exit();
            }else{
                $success = 'Your Registration is Successfully';
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
            margin-top: 70px;
        }
    </style>
</head>
<body>
<div class="container col-md-8">
    <?php
    if (isset($success)){
        ?>
        <div class="alert alert-success"><?php echo $success; ?></div>
        <?php
    }
    ?>
    <div class="panel panel-info">
        <div class="panel-heading">
            <h1 style="text-align: center">Teacher Registration Form</h1>
        </div>
        <div class="panel-body">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form-group">
                    <label for="id">Teacher Id</label>
                    <input type="text" name="id" class="form-control" placeholder="Id Number" autofocus>
                    <?php
                    if (isset($errors['id'])){
                        ?>
                        <div class="alert alert-danger"><?php echo $errors['id']; ?></div>
                        <?php
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label for="name">Teacher Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Name" autofocus>
                    <?php
                    if (isset($errors['name'])){
                        ?>
                        <div class="alert alert-danger"><?php echo $errors['name']; ?></div>
                        <?php
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label for="email">Teacher E-mail</label>
                    <input type="email" name="email" class="form-control" placeholder="E-mail Address" autofocus>
                    <?php
                    if (isset($errors['email'])){
                        ?>
                        <div class="alert alert-danger"><?php echo $errors['email']; ?></div>
                        <?php
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="password" autofocus>
                    <?php
                    if (isset($errors['password'])){
                        ?>
                        <div class="alert alert-danger"><?php echo $errors['password']; ?></div>
                        <?php
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label for="dept">Department</label>
                    <select name="dept" class="form-control">
                        <option value="CSE">Computer Science And Engineering</option>
                        <option value="EEE">Electronic And Electrical Engineering</option>
                        <option value="SWE">Software Engineering</option>
                        <option value="TXE">Textile Engineering</option>
                    </select>
                    <?php
                    if (isset($errors['dept'])){
                        ?>
                        <div class="alert alert-danger"><?php echo $errors['dept']; ?></div>
                        <?php
                    }
                    ?>
                </div>
                <div class="form-group">
                    <input type="submit" name="register" class="btn btn-primary" value="Registration">
                    <a style="text-decoration: none"class="pull-right" href="teachers_log.php">Already Registration,Please log in</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
