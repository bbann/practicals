<?php include('server2.php'); ?>

<?php
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $record = mysqli_query($db, "SELECT * FROM saint_mary WHERE item=$item");

    if (count($records) == 1) {
        $n = mysqli_fetch_array($record);
        $fname = $n['fname'];
        $lname = $n['lname'];
        $item = $n['item'];
    }
}
?>
<!--some aspect of the code from boostrapmade templates-->
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>DormitoryItemManager</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css" media="screen" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style-portfolio.css">
    <link rel="stylesheet" href="css/picto-foundry-food.css" />
    <link rel="stylesheet" href="css/jquery-ui.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link rel="icon" href="favicon-1.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

    <?php if (isset($_SESSION['message'])) : ?>
        <div class="msg">
            <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
        </div>
    <?php endif ?>

    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="row">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Dormitory</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav main-nav  clear navbar-right ">
                        <li><a class="navactive color_animation" href="index.php">HOME</a></li>
                        <li><a class="color_animation" href="selectdorm.php">MAIN DASHBOARD</a></li>
                        <li><a class="color_animation" href="signup.php">SIGN UP</a></li>
                        <li><a class="color_animation" href="#contact">CONTACT</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>
        </div><!-- /.container-fluid -->
    </nav>

    <br>
    <?php $results = mysqli_query($db, "SELECT * FROM Saint_Mary"); ?>

    <table>
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Item Name</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>

        <?php while ($row = mysqli_fetch_array($results)) { ?>
            <tr>
                <td><?php echo $row['fname']; ?></td>
                <td><?php echo $row['lname']; ?></td>
                <td><?php echo $row['item']; ?></td>
                <td>
                    <a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn">Edit</a>
                </td>
                <td>
                    <a href="server2.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>

    <form method="post" action="server2.php">
        <div class="input-group">
            <label>First Name</label>
            <input type="text" name="fname" value="">
        </div>
        <div class="input-group">
            <label>Last Name</label>
            <input type="text" name="lname" value="">
        </div>
        <div class="input-group">
            <label>Item Name</label>
            <input type="text" name="item" value="">
        </div>
        <div class="input-group">
            <button class="btn" type="submit" name="save">Save</button>
        </div>
    </form>
</body>

</html>