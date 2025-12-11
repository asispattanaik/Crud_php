<?php
include 'connect.php';

$id = $_GET['updateid'];
$sql="Select *  from `student` where id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$name = $row['NAME'];
$Father = $row['FATHER'];
$DOB = $row['DOB'];
$MOBILE_NO = $row['MOBILE_NO'];
$BLOOD_GRP = $row['BLOOD_GRP'];
$EMAIL = $row['EMAIL'];
$password = $row['PASSWORD'];


if (isset($_POST['submit'])) {
    $name = $_POST['username'];
    $Father = $_POST['Father'];
    $DOB = $_POST['DOB'];
    $MOBILE_NO = $_POST['MOBILE_NO'];
    $BLOOD_GRP = $_POST['bloodgroup'];
    $EMAIL = $_POST['email'];
    $password = $_POST['Password'];

    // Correct syntax with backticks around table and column names
    $sql = "UPDATE `student` 
            SET 
                `name` = '$name', 
                `Father` = '$Father', 
                `DOB` = '$DOB', 
                `MOBILE_NO` = '$MOBILE_NO', 
                `BLOOD_GRP` = '$BLOOD_GRP', 
                `EMAIL` = '$EMAIL', 
                `PASSWORD` = '$password' 
            WHERE `id` = $id";

    $result = mysqli_query($con, $sql);

    if ($result) {
        header('location:display.php');
        //echo "Record updated successfully.";
    } else {
        die("Error: " . mysqli_error($con));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url("https://i.pinimg.com/originals/18/a4/94/18a4949fc9c8067172d3b96e302e7097.gif");
            background-size: cover;
            background-position: cover;
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
        color: black; /* Changed color to black */
    }
        .card {
            width: 100px;
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
            justify-content: flex-end;
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
        }

        .login-button {
            background-color: transparent;
            color: #19d4ca;
        }

        .login-button:hover {
            background-color: #19d4ca;
            color: #fff;
            box-shadow: none;
        }

        .register-link {
            color: #ccc;
            background-color: transparent;
        }

        .register-link:hover {
            background-color: #19d4ca;
            color: #fff;
            box-shadow: none;
        }

        @media (max-width: 480px) {
            .card {
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
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="btn btn-outline-primary me-2" href="display.php">View Data</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-success" href="home.php">HOME</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
    <div class="col-md-7 offset-md-2">
    <form method="post" action="#">
        <div class="col-md-8 offset-md-2">
            <h2>Student Registration Form</h2>
            <div class="form-group">
                <label for="username">Name:</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Enter Name" required value="<?php echo $name;?>">
            </div>

            <div class="form-group">
                <label for="Father_name">Father's Name:</label>
                <input type="text" class="form-control" name="Father" id="Father_name" placeholder="Enter Father's Name" value="<?php echo $Father;?>">
            </div>

            <div class="form-group">
                <label for="DOB">Date of Birth:</label>
                <input type="date" class="form-control" name="DOB" id="DOB" required value="<?php echo $DOB;?>">
            </div>

            <div class="form-group">
                <label for="Mobilenumber">Mobile Number:</label>
                <input type="text" class="form-control" name="MOBILE_NO" id="Mobilenumber" placeholder="Enter Mobile Number" required value="<?php echo $MOBILE_NO;?>">
            </div>

            <div class="form-group">
                <label for="bloodgroup">Blood Group:</label>
                <select id="bloodgroup" name="bloodgroup" class="form-control" required >
                    <option selected disabled>Choose your Blood Group...</option>
                    <option>A+</option>
                    <option>A-</option>
                    <option>B+</option>
                    <option>B-</option>
                    <option>AB+</option>
                    <option>AB-</option>
                    <option>O+</option>
                    <option>O-</option>
                </select>
            </div>

            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email Address" value="<?php echo $EMAIL;?>">
            </div>

            <div class="form-group">
                <label for="Password">Password:</label>
                <input type="Text" class="form-control" name="Password" id="Password" placeholder="Enter Password" value=<?php echo $password;?>>
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary mx-2" name="submit" style=margin:10px>Update</button>
                <a href="Login.php" class="btn btn-primary mx-2" style="margin:10px">Login</a>
            </div>
        </div>
    </form>
</div>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
   
    </script>
</body>
</html>
