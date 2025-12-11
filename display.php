<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html>
<head>
  <!-- Add Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      margin: 0;
      padding: 0;
      background-image: url('https://wallpapers.com/images/hd/white-solid-background-k03v99q4obz7fu6p.jpg'); /* Replace with your image path */
      background-size: cover;
      background-position: cover;
      background-repeat: no-repeat;
      color: white;
    }
    .navbar-dark .navbar-nav .nav-link {
      color: rgba(23, 102, 181, 0.8);
    }
    .navbar-dark .navbar-nav .nav-link:hover {
      color: #fff;
    }
    .table-container {
      margin: 10px auto;
      width: 80%;
      background-color: rgba(255, 255, 255, 0.9);
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }
    .table th, .table td {
      color: black;
    }
  </style>
</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="home.php">E-Governance System</a>

    <div>
      <button class="btn btn-primary">
        <a href="Registration.php" style="color: white; text-decoration: none;">ADD USER</a>
      </button>

      <button class="btn btn-danger ms-2">
        <a href="logout.php" style="color: white; text-decoration: none;">LOGOUT</a>
      </button>
    </div>
  </div>
</nav>


<div class="table-container">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">NAME</th>
        <th scope="col">FATHER'S NAME</th>
        <th scope="col">DOB</th>
        <th scope="col">MOBILE_NO</th>
        <th scope="col">BLOOD_GRP</th>
        <th scope="col">EMAIL</th>
        <th scope="col">PASSWORD</th>
        <th scope="col">OPERATIONS</th>
      </tr>
    </thead>
    <tbody>

<?php
$sql = "SELECT * FROM `student`"; 
$result = mysqli_query($con, $sql);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['ID'];
        $name = $row['NAME'];
        $Father = $row['FATHER'];
        $DOB = $row['DOB'];
        $MOBILE_NO = $row['MOBILE_NO'];
        $BLOOD_GRP = $row['BLOOD_GRP'];
        $EMAIL = $row['EMAIL'];
        $password = $row['PASSWORD'];

        echo '<tr>
                <th scope="row">' . $id . '</th>
                <td>' . $name . '</td>
                <td>' . $Father. '</td>
                <td>' . $DOB . '</td>
                <td>' . $MOBILE_NO . '</td>
                <td>' . $BLOOD_GRP . '</td>
                <td>' . $EMAIL . '</td>
                <td>' . $password. '</td>
                <td>
                  <button class="btn btn-primary btn-sm"><a href="update.php? updateid='.$id.'" class="text-light">Update</a></button>
                  <button class="btn btn-primary btn-sm"><a href="delete.php? deleteid='.$id.'" class="text-light">Delete</a></button>
                  
                </td>
              </tr>';
    }
} else {
    echo "<tr><td colspan='9'>No records found</td></tr>";
}
?>

    </tbody>
  </table>
</div>

<!-- Add Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
