

<?php
session_start();
include("connect.php");

if (isset($_POST['login'])) {

    $username = trim($_POST['username']);
    $pwd = trim($_POST['password']);

    if ($username == "" || $pwd == "") {
        echo "<script>alert('Please fill all fields');</script>";
    } else {

        $stmt = $con->prepare("SELECT * FROM student WHERE EMAIL = ?");
        if (!$stmt) {
            die("Prepare failed: " . $con->error);
        }

        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {

            $user = $result->fetch_assoc();

            if ($pwd === $user['PASSWORD']) {

                $_SESSION['user_id'] = $user['ID'];
                $_SESSION['user_email'] = $user['EMAIL'];
                $_SESSION['user_name'] = $user['name'];

                echo "<script>alert('Login Successful');</script>";
                echo "<script>window.location.href='display.php';</script>";
                exit();
            } else {
                echo "<script>alert('Incorrect password');</script>";
            }
        } else {
            echo "<script>alert('Incorrect password!! Check email and Password');</script>";
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
    <title>Login Form</title>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url("https://hdp-au-prod-app-yarra-shaperanges-files.s3.ap-southeast-2.amazonaws.com/9016/5691/6254/AdobeStock_372647828.jpeg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #fff;
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .title {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            color: black; 
        }

        .card {
            width: 300px;
            background-color: #1e213a;
            padding: 20px;
            border-radius: 10px;
            border-top: 4px solid #19d4ca;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        input {
            padding: 10px;
            border: none;
            background-color: transparent;
            border-bottom: 1px solid #ccc;
            color: #fff;
            transition: box-shadow 0.3s;
        }

        input:focus {
            box-shadow: 0 0 10px #19d4ca;
        }

        .buttons {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
        }

        .notvalid {
            color: red;
        }

        .valid {
            color: green;
        }

        .login-button,
        .register-link {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, box-shadow 0.3s, color 0.3s;
            text-decoration: none;
            text-align: center;
            display: inline-block;
        }

       
        .login-button {
            color: #ccc;
            background-color: transparent;
            border: 1px solid #ccc;
        }

        .login-button:hover {
            background-color: #19d4ca;
            color: #fff;
            box-shadow: none;
        }

        .register-link {
            color: #ccc;
            background-color: transparent;
            border: 1px solid #ccc;
        }

        .register-link:hover {
            background-color: #19d4ca;
            color: #fff;
            box-shadow: none;
        }

        .forgetpassword {
            margin-left: auto;
        }

        .password-card {
            width: 300px;
            background-color: #1e213a;
            padding: 20px;
            border-radius: 10px;
            border-top: 4px solid #19d4ca;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            margin-top: 20px;
            text-align: center;
        }

        .password-card h3 {
            color: #19d4ca;
            font-size: 18px;
            text-align: center;
            margin-bottom: 10px;
        }

        .password-card ul {
            text-align: left;
            padding-left: 20px;
        }

        @media (max-width: 480px) {
            .card, .password-card {
                width: 100%;
                max-width: 300px;
            }
        }   
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">E-Governance</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                    <li class="nav-item">
                        <a class="btn btn-outline-success" href="home.php">HOME</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="title">High Security Login</h1>
        <div class="card">
            <form action="#" method="POST">
                <input type="text" name="username" class="textfiled" placeholder="Username">
                <input id="pass" type="password" name="password" class="textfiled" placeholder="Password">
                <div class="buttons">
                    <a href="Registration.php" class="register-link">Register</a>
                    
                    <input type="submit" name="login" value="Login" class="login-button">
                </div>
                <div class="forgetpassword">
                    <a href="#" class="link" onclick="message()">Forgot Password?</a>
                </div>
            </form>
        </div>
       <script>
        function message()
        {
            alert("Remind yourself");
        }
    
       </script>
</body>
</html>
