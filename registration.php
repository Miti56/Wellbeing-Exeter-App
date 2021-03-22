<html>
<head>
    <title> Registration Form </title>
</head>
<body>
<div style="text-align: center;">
    <div class="header">
        <h2>Registration Form</h2>
    </div>

    <form action="server.php" method="post" >
        <div class="container">
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" id = "email" >

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" id="password" >

            <label for="fname"><b>First Name</b></label>
            <input type="text" placeholder="Enter First Name" name="fname" id = "fname" >

            <label for="lname"><b>Last Name</b></label>
            <input type="text" placeholder="Enter Last Name" name="lname" id = "lname" >

            <label for="typeuser"><b>Type of User</b></label>
            <input type="text" placeholder="Enter Type of User" name="typeuser" id = "typeuser" >

            <label for="CodeAdmin"><b>Admin Code</b></label>
            <input type="text" placeholder="Enter Admin Code" name="admincode" id = "admincode" >

            <a type="submit" name="login" value="LOGIN">
                <button>Register</button>


            </a>
            <a href="index.php">
                <button2>Go back</button2>
            </a>
        </div>
    </form>


</div>
</body>
</html>
