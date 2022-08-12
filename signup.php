<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account : Realtime CVs</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome/css/all.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/jquery.min.js"></script>
</head>
<body class="login">
    <div class="logobx">
        <img src="assets/images/logo.svg" alt="Realtime CVs">
    </div>
    <div class="container12 loginflex">
            <div class="loginbx">
                
                <div class="logform">
                    <h3 class="aligncenter">Create an account</h3>
                    <form action="#" class="contactForm">
                        <label for="username">Email:</label><br />
                        <input type="email" name="unername" id="username" required><br />
                        <label for="password">Password:</label><br />
                        <input type="password" name="passx" id="passx" required><i class="fa-solid fa-eye" id="togglePassword"></i><br />
                        <label for="password">Re-type Password:</label><br />
                        <input type="password" name="repassx" id="repassx" required><i class="fa-solid fa-eye" id="togglePassword1"></i><br />
                        <button class="submit" name="loginx">Create Account</button>
                    </form>
                </div>
            </div>
    </div>
</body>
<script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#passx");

        const togglePassword1 = document.querySelector("#togglePassword1");
        const password1 = document.querySelector("#repassx");

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);

            // toggle the icon
            this.classList.toggle("fa-eye-slash");
        });

        togglePassword1.addEventListener("click", function () {
            // toggle the type attribute
            const type = password1.getAttribute("type") === "password" ? "text" : "password";
            password1.setAttribute("type", type);

            // toggle the icon
            this.classList.toggle("fa-eye-slash");
        });
      
    </script>
</html>