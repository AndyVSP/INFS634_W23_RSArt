<?php 
require 'Database/db_login.php'; 
date_default_timezone_set('America/Toronto'); //setting default timezone
$date = new DateTime(); //Creating a variable for DateTime
$TimeDate = $date->format('Y-m-d H:i:s');

if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['email']) && !empty($_POST['fname']) && !empty($_POST['fname']) && !empty($_POST['subject']) && !empty($_POST['message'])){
       $email = $_POST['email'];
       $fname = $_POST['fname'];
       $lname = $_POST['lname'];
       $subject = $_POST['subject'];
       $message = $_POST['message'];

       $check_id = "SELECT * FROM client WHERE id = :id";
       
       $stmt = $conn->prepare($check_id);
       $stmt->bindParam(':id', $email);
       $stmt->execute();
       $results= $stmt->fetchAll();

    if (count($results) > 0) {
        $client_id = $results[0]['id'];

    } else {
        $sql_client = "INSERT INTO `client` (`id`, `Name`, `Last_Name`) VALUES (:id, :Name, :Last_Name)";

        $stmt_2 = $conn->prepare($sql_client);
        $stmt_2->bindParam(':id', $email);
        $stmt_2->bindParam(':Name', $fname);
        $stmt_2->bindParam(':Last_Name', $lname);
        $stmt_2->execute();

        $client_id = $email;
        }

    $id = NULL;

    $sql_message = "INSERT INTO `message`(`id`, `Date_Time`, `Subject`, `Text_Content`, `CLIENT_id`) VALUES (:id, :Date_Time, :Subject, :Text_Content, :CLIENT_id)";
   
    $stmt_3 = $conn->prepare($sql_message);
    $stmt_3->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt_3->bindParam(':Subject', $subject);
    $stmt_3->bindParam(':Date_Time', $TimeDate);
    $stmt_3->bindParam(':Text_Content', $message);
    $stmt_3->bindParam(':CLIENT_id', $client_id);
    
    if( ($stmt_3->execute())) {  //executing query to update the database 
        header('Location: success.php');
        exit;
    } else {
        header('Location: failure.php');
        exit; 
        }
} 

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Contact Me</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Caveat+Brush&family=Lustria&family=Montserrat&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link href="Assets/css/myStyle.css" type="text/css" rel="stylesheet">
        <link rel="icon" type="image/x-icon" href="Assets\img\LogoBlackTransparent.png">
    </head>
    <body>
        <?php include('header.php'); ?>
        <div class = "container-fluid d-flex"> 
            <form id = "contactMe_form" action=# method="POST">
                <div class = "container-fluid"> 
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Jean" name= "fname" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Last Name:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Grey" name = "lname" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email address:</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name ="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Subject:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Commission" name = "subject" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Message:</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name = "message" required></textarea>
                    </div>
                    <div class="container-fluid text-end">
                        <button id = "contactSubmitButton" type="submit" class="btn btn-primary ms-auto">Submit</button>
                    </div>
                </div>
            </form>
        </div>
        
        <?php include('footer.php'); ?>

        <script src="https://code.jquery.com/jquery.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>