<?php
    session_start();
    if (!isset($_SESSION["email"]) && !isset($_SESSION["password"])) {
        // echo "<script>alert('Please Login')</script>";
        // echo "<script>window.location.href = 'login.php'</script>";
    }

    include('dbconnect.php');

    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $name = $_POST["name"];
        $icno = $_POST["icno"];
        $phoneno = $_POST["phoneno"];
        $address = $_POST["address"];
        $email = $_POST["email"];
         $sqlupdate = "UPDATE `tbl_user` SET `user_ic` = '$icno', `user_email` = '$email', `user_name` = '$name', 
        `user_phone` = '$phoneno', `user_address` = '$address' WHERE `user_id` = $id";
        try{
            $conn->query($sqlupdate);
            if (file_exists($_FILES["fileToUpload"]["tmp_name"]) || is_uploaded_file($_FILES["fileToUpload"]["tmp_name"])) 
            {
                uploadImage($id);
            }
            echo "<script>alert('user Updated')</script>";
            echo "<script>window.location.href = 'homepage.php'</script>";
        }catch (PDOException $e) {
            echo "<script>alert('Failed!!')</script>";
            echo "<script>window.location.href = 'edituser.php?id=$id'</script>";
        }
    }

    if (!isset($_GET['id'])) {
        // echo "<script>alert('Page load error')</script>";
        // echo "<script>window.location.href = 'homepage.php'</script>";
    }

    $id = $_GET['user_id'];
    $sqlload = "SELECT * FROM `tbl_user` WHERE `user_id` = '$id'";
    $stmt = $conn->prepare($sqlload);
    $stmt->execute();
    $number_of_result = $stmt->rowCount();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $rows = $stmt->fetchAll();
    
    if ($number_of_result == 0){
        echo "<script>alert('Page load error')</script>";
        // echo "<script>window.location.href = 'homepage.php'</script>";
    }
    foreach ($rows as $user) {
        $usersId = $user['user_id'];
        $usersIc = $user['user_ic'];
        $usersEmail = $user['user_email'];
        $usersName = $user['user_name'];
        $usersPhone = $user['user_phone'];
        $usersAddress = $user['user_address'];
        $usersDateReg = date_format(date_create($user['user_date_reg']),"d/m/Y H:i a");
    }

function uploadImage($id)
{
    $target_dir = "assets/";
    $target_file = $target_dir . $id . ".png";
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
}
?>
<!doctype html>
<html lang="en">
    <head>
        <title> Profile </title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="nav" style="background-color: #0d6efd;">
            <!-- navbar content -->
        </nav>
    </header>
    <main>
        <section class="clinic-section" id="profile">
            <div class="container">
                <h2 class="text-center">Clinic Profile</h2>
                <div class="row">
                    <div class="col-md-4">
                        <img src="<?php echo $profile_image; ?>" alt="Profile Image" class="img-fluid img-profile rounded-circle mx-auto mb-2">
                    </div>
                    <div class="col-md-8">
                        <h4>Name: <?php echo $name; ?></h4>
                        <p>Email: <?php echo $email; ?></p>
                        <p>IC Number: <?php echo $icno; ?></p>
                        <p>Phone Number: <?php echo $phoneno; ?></p>
                        <p>Address: <?php echo $address; ?></p>
                        <a href="editprofile.php" class="btn btn-primary">Edit Profile</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
        </header>

        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
