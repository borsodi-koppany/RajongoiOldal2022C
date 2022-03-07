<?php

include 'config.php';

error_reporting(0); //for not showing any error

if (isset($_POST['submit'])) { //Check press or not Post Comment Button
    $name = $_POST['name']; // Get Name from form
    $email = $_POST['email']; // Get Email from form
    $comment = $_POST['comment']; // Get Comment from form

    $sql = "INSERT INTO comments (name, email, comment)
            VALUES ('$name', '$email', '$comment')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('Comment added succesfully.')</script>";
    } else {
        echo "<script>alert('Comment does not add.')</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="visszajelzések/visszajelzesek.css">
    <title>Visszajelzések</title>
</head>

<body>
    <div id="cont">
        <!--navigáció-->
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark sticky-top">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a href="index.html" class="nav-link">Eminem</a></li>
                    <li class="nav-item"><a href="elete.html" class="nav-link">Élete</a></li>
                    <li class="nav-item"><a href="munkassaga.html" class="nav-link">Munkássága</a></li>
                    <li class="nav-item"><a href="nevjegy.html" class="nav-link">Kapcsolat</a></li>
                    <li><a class="navbar-brand" href="">Visszajelzések</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="wrapper">
        <form action="" method="POST" class="form">
            <div class="row">
                <div class="input-group">
                    <div class="name"><label for="name">Name</label></div>
                    <input type="text" name="name" id="name" placeholder="Enter your Name" required>
                </div>
                <div class="input-group">
                    <div class="email"><label for="email">Email</label></div>
                    <input type="text" name="email" id="email" placeholder="Enter your Email" required>
                </div>
            </div>
            <div class="input-group textarea">
                <div class="comment"><label for="comment">Comment</label></div>
                <textarea id="comment" name="comment" placeholder="Enter your Comment" required></textarea>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Post Comment</button>
            </div>
        </form>
        <div class="prev-comments">
            <?php

            $sql = "SELECT * FROM comments";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)){
                
            ?>
            <div class="single-item">
                <h4><?php echo $row['name']; ?></h4>
                <a href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a>
                <p><?php echo $row['comment']; ?></p>
            </div>
            <?php
                }
            }


            ?>
            
        </div>
    </div>
        

 
    <script src="javascript/jquery-3.3.1.min.js"></script>
    <script src="bootstrap/bootstrap.bundle.min.js"></script>


</body>

</html>