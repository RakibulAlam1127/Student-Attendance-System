<?php
/**
 * Created by PhpStorm.
 * User: Rakib
 * Date: 3/9/2018
 * Time: 1:11 AM
 */
$attendance = '';
$errors = [];
if (isset($_POST['submit'])){
    if (empty($_POST['attendance'])){
        $errors['attendance'] = 'Attendence Must Not Be Empty';
    }else {
        $attendance = $_POST['attendance'];
    }
    if (empty($errors)){
        //Our database code will be gose here.
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
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        .form-group{
            text-align: center;
        }
        .center{
            text-align: center;
            font-size: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="well">
        <h1 style="text-align: center">Upgrade Attendance</h1>
    </div>
    <?php
    if (isset($errors['attendance'])){
        ?>
        <div class="alert alert-danger"><?php echo $errors['attendance']; ?></div>
        <?php
    }
    ?>
    <div class="panel panel-info">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="panel-heading">
                <div class="center">

                    <?php echo 'Welcome !! Today is : '.date('d-M-Y'); ?> <br>

                </div>

                <a href="view.php" class="pull-left btn btn-primary">View</a>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <td>Student Id</td>
                        <td>Name</td>
                        <td>Department</td>
                        <td>Attendence</td>
                    </tr>
                    <tbody>
                    <tr>
                        <td>161-15-684</td>
                        <td>Md Rakibul Alam</td>
                        <td>CSE</td>
                        <td>
                            <input type="checkbox" name="attendance[]" value="present_684">
                        </td>
                    </tr>
                    <tr>
                        <td>161-15-685</td>
                        <td>Md Sagor Ali</td>
                        <td>CSE</td>
                        <td>
                            <input type="checkbox" name="attendance[]" value="present_685">
                        </td>
                    </tr>

                    <tr>
                        <td>161-15-686</td>
                        <td>Faruq Ahemd</td>
                        <td>CSE</td>
                        <td>
                            <input type="checkbox" name="attendance[]" value="present_686">
                        </td>
                    </tr>

                    <tr>
                        <td>161-15-687</td>
                        <td>Md Anik Khan</td>
                        <td>CSE</td>
                        <td>
                            <input type="checkbox" name="attendance[]" value="present_687">
                        </td>
                    </tr>

                    <tr>
                        <td>161-15-688</td>
                        <td>Md Sojib Ahmed</td>
                        <td>CSE</td>
                        <td>
                            <input type="checkbox" name="attendance[]" value="present_688">
                        </td>
                    </tr>

                    <tr>
                        <td>161-15-689</td>
                        <td>Md Rakibul Alam</td>
                        <td>CSE</td>
                        <td>
                            <input type="checkbox" name="attendance[]" value="present_689">
                        </td>
                    </tr>

                    <tr>
                        <td>161-15-690</td>
                        <td>Md Moyej Khan</td>
                        <td>CSE</td>
                        <td>
                            <input type="checkbox" name="attendance[]" value="present_690">
                        </td>
                    </tr>

                    <tr>
                        <td>161-15-694</td>
                        <td>Md Munna hossain</td>
                        <td>CSE</td>
                        <td>
                            <input type="checkbox" name="attendance[]" value="present_694">
                        </td>
                    </tr>
                    </tbody>
                    </thead>
                </table>
            </div>

            <div class="form-group">
                <input type="submit" name="submit" value="Upgrade" class="btn btn-success">
            </div>
        </form>
    </div>
</div>
</body>
</html>
