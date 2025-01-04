<!DOCTYPE html>
<html>
<head>
    <title>PHP OOP CRUD</title>
</head>
<body>
    <h1>PHP OOP CRUD Operations</h1>

  
    <form method="post" action="userController.php">
        <h3>Create User</h3>
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <button type="submit" name="create">Create</button>
    </form>

    
    <form method="get" action="userController.php">
        <button type="submit" name="readAll">Read All Users</button>
    </form>

    
    <form method="get" action="userController.php">
        <h3>Read User by ID</h3>
        <input type="number" name="id" placeholder="User ID" required>
        <button type="submit">Read</button>
    </form>

    
    <form method="post" action="userController.php">
        <h3>Update User</h3>
        <input type="number" name="id" placeholder="User ID" required>
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <button type="submit" name="update">Update</button>
    </form>

    
    <form method="post" action="userController.php">
        <h3>Delete User</h3>
        <input type="number" name="id" placeholder="User ID" required>
        <button type="submit" name="delete">Delete</button>
    </form>
</body>
</html>
