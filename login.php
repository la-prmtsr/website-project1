<?php
$mail = 'b231210575@sakarya.edu.tr';
$pass = 'b231210575';

$message = ''; // Initialize an empty message.

if(isset($_POST['email'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Control the validation of the email 
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $message = '<div class="message-box warning">Error, please enter a valid email address</div>';
    }
    else{
        if($email == $mail && $password == $pass){
            // If login is successful, set the message.
            echo '<script>alert("WELCOME, B231210575");</script>';
            echo '<script>window.location = "index.html";</script>'; // Redirect back to the home page
        }
        else{
            // If login fails, set the message.
            $message = '<div class="message-box error">Error, incorrect username or password</div>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WELCOME TO MY PAGE</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Iconbox link -->
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
    rel="stylesheet"
    />    
    
    <!-- Style CSS -->
    <link rel="stylesheet" href="./css/style.css">
   
    <!-- Styling Message Box for LOGIN  -->
    <style>
        .message-box {
            padding: 0.5rem;
            margin-bottom: 1rem;
            border-radius: 0.5rem;
            font-weight: bold;
            width: auto;
            text-align: center;
        }

        .error {
            color: red;
            background-color: #FFBABA;
            border: 1px solid #D8000C;
        }

        .warning {
            color: orangered;
            background-color: #FFF3CD; /* Adjusted background color */
            border: 1px solid #FFA500; /* Adjusted border color */
        }
    </style>

    <script>
        // JavaScript to show the message box when there is a message to display
        window.onload = function() {
            var messageBox = document.getElementById('message-box');
            if (messageBox.innerHTML.trim() !== '') {
                messageBox.style.display = 'block';
            }
        };
    </script>
</head>

<body>
    <!-- Navbar Section Start -->
    <nav class="navbar navbar-expand-lg bg-white sticky-top">
        <div class="container">
          <a class="navbar-brand fw-semibold" href="index.html">ola.</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link " href="index.html">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="about.html">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="myCountry.html">My Country</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="myCV.html">My CV</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="myInterests.html">My Interests</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
              </li>
              
            </ul>
            <a href="login.php" class="btn btn-brand ms-lg-3">LOG IN</a>  <!--margin start on large devices-->
          </div>
        </div>
      </nav>
    <!-- Navbar Section Exit -->


    <!-- Login Page Start-->

    <section id="login-page" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <h1 class="text-black display-5 fw-semibold">LOGIN</h1>
                        <div class="line"></div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6 bg-dark p-5 align-items-center" style="border-radius: 1rem;">

                    <!-- HTML code to display the message -->
                    <?php echo $message; ?>

                    <form action="" method="post" id="login-form" class="row g-3 ">  <!-- g = gather space for the form -->
                        <div class="form-group col-lg-12 ">
                          <label for="email">Email:</label><br>
                          <input type="text" id="email" name="email" class="form-control" placeholder="ex: b1812100001@sakarya.edu.tr" required>
                        </div>
                        <div class="form-group col-lg-12">
                            <!-- <label for="name">Surname:</label> -->
                            <label for="password">Password:</label><br>
                            <input type="text" id="password" name="password"  class="form-control" placeholder="ex: b1812100001"  required>                          </div>
                        <div class="form-group col-lg-12 d-grid">
                            <button type="submit" id="submit-btn" class="btn btn-brand mt-2">LOG IN</button>
                        </div>
                    </form>
                </div>  
            </div>
            </div>
            
    </section>
    <!-- Login Page End-->

    <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"> </script>

</body>

</html>