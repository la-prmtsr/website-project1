<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    extract($_POST);
    $file = fopen("contact-result.txt", "a");

    fwrite($file, "Name: " . htmlspecialchars($name) . "\n");
    fwrite($file, "Surname: " . htmlspecialchars($surname) . "\n");
    fwrite($file, "Email: " . htmlspecialchars($email) . "\n");
    fwrite($file, "Message: " . htmlspecialchars($message) . "\n");
    
    // Add a line break or empty line
    fwrite($file, "\n"); // For newline character

    fclose($file);

    // Redirect to a new page to display the contents of contact-result.txt
    header("Location: contact-result.txt");
    exit;
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
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />    
    
    <!-- Style CSS -->
    <link rel="stylesheet" href="./css/style.css">
   
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
                <a class="nav-link"  href="index.html">Home</a>
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
                <a class="nav-link active" aria-current="page" href="contact.php">Contact</a>
              </li>
              
            </ul>
            <a href="login.php" class="btn btn-brand ms-lg-3">LOG IN</a>  <!--margin start on large devices-->
          </div>
        </div>
      </nav>
    <!-- Navbar Section Exit -->

    <!-- Contact Page Start-->
    <section id="contact-page" class="section-padding bottom-space">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <h1 class="text-black display-5 fw-semibold">Contact</h1>
                        <div class="line"></div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <!-- <div class="col-lg-8 bg"> -->
                <div class="col-lg-8 bg-dark" style="padding: 3rem; border-radius: 1rem;">

                    <form action="contact.php" method="post" id="contact-form" class="row g-3 ">  <!-- g = gather space for the form -->
                        <div class="form-group col-lg-6">
                        <label for="name">Name:</label>
                          <input type="text" id="name" name="name" class="form-control" placeholder="Enter your first name"  >
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="surname">Surname:</label>
                            <input type="text" id="surname" name="surname" class="form-control" placeholder="Enter your last name"  >
                          </div>
                        <div class="form-group col-lg-12">
                        <label for="email">Email:</label>
                          <input type="email" id="email" name="email" class="form-control" placeholder="Enter a valid email address" >
                        </div>
                        <div class="form-group col-lg-12">
                        <label for="message">Message:</label>
                          <textarea id="message" name="message" rows="5"  class="form-control" placeholder="Enter your message" ></textarea>
                        </div>
                        <div class="form-group col-lg-4 d-grid"> <!--d-grid(display grid) makes the bottom cover all space along the form--> 
                          <button type="button" id="clear-btn" class="btn btn-light">Clear</button>
                        </div>
                        <div class="form-group col-lg-4 d-grid">
                            <button type="submit" id="submit-btn-js" class="btn btn-brand">Send by js</button>
                        </div>
                        <div class="form-group col-lg-4 d-grid">
                            <button type="button" id="submit-btn-vue" class="btn btn-brand">Send by Vue.js</button>
                        </div>
                    </form>
                </div>  
            </div>
            </div>
        </div>
    </section>
    <!-- Contact Page End-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>

    <!-- Vanilla JavaScript Form Validation -->
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.getElementById("contact-form");
        const clearBtn = document.getElementById("clear-btn");

        form.addEventListener("submit", function(event) {
            if (event.submitter.id !== "submit-btn-js") {
                return; // Skip validation for non-JS submit buttons
            }

            const name = document.getElementById("name").value.trim();
            const surname = document.getElementById("surname").value.trim();
            const email = document.getElementById("email").value.trim();
            const message = document.getElementById("message").value.trim();
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (name === "" || surname === "" || email === "" || message === "") {
                alert("Please fill in all fields.");
                event.preventDefault();
                return;
            }

            if (!emailRegex.test(email)) {
                alert("Please enter a valid email address.");
                event.preventDefault();
                return;
            }
        });

        clearBtn.addEventListener("click", function() {
            document.getElementById("name").value = "";
            document.getElementById("surname").value = "";
            document.getElementById("email").value = "";
            document.getElementById("message").value = "";
        });
    });
    </script>

    <!-- Vue.js Form Validation -->
    <script>
    new Vue({
        el: '#contact-form',
        data: {
            name: '',
            surname: '',
            email: '',
            message: '',
            emailRegex: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
        },
        methods: {
            validateForm() {
                if (this.name === '' || this.surname === '' || this.email === '' || this.message === '') {
                    alert("Please fill in all fields.");
                    return false;
                }
                if (!this.emailRegex.test(this.email)) {
                    alert("Please enter a valid email address.");
                    return false;
                }
                return true;
            },
            submitVueForm(event) {
                if (!this.validateForm()) {
                    event.preventDefault();
                }
            }
        }
    });

    document.getElementById('submit-btn-vue').addEventListener('click', function(event) {
        const vueInstance = document.getElementById('contact-form').__vue__;
        vueInstance.submitVueForm(event);
    });
    </script>

</body>

</html>
