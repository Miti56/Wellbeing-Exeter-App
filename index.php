<html>
<head>
    <link rel="shortcut icon" href="https://cdn.iconscout.com/icon/premium/png-256-thumb/agenda-1765355-1501923.png">
    <title> Login page </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="stylelogin.css">
</head>
<body>
<div style="text-align: center;">
    <div class="header">
        <h2>Welcome to your Exeter App</h2>
    </div>


    <form action="authenticate.php" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="imgcontainer">
            <img src="https://media.wired.com/photos/5ae0d5ae3f3b183561144216/master/pass/google-tasks.jpg" alt="logo" class="logo">
        </div>

        <div class="container">
            <label for="email"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="email" id = "email" required>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" id="password" required>


            <a type="submit" name="login" value="LOGIN">
                <button>Login</button>
            </a>
        </div>
        <br/>
        <a href="registration.php">
            <button2>New User?</button2>
        </a>



    </form>
    <label class="theme-switch" for="checkbox" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="checkbox" id="checkbox" />
    </label>
    <em>Enable Dark Mode!</em>

    <script>
        //script to save data to storage and cahnge theme
        const toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');

        function switchTheme(e) {
            if (e.target.checked) {
                document.documentElement.setAttribute('data-theme', 'dark');
                localStorage.setItem('theme', 'dark'); //add this
            }
            else {
                document.documentElement.setAttribute('data-theme', 'light');
                localStorage.setItem('theme', 'light'); //add this
            }
        }
        // script to help the navbar open by changing the width of main and the navbar
        toggleSwitch.addEventListener('change', switchTheme, false);

        const currentTheme = localStorage.getItem('theme') ? localStorage.getItem('theme') : null;

        if (currentTheme) {
            document.documentElement.setAttribute('data-theme', currentTheme);

            if (currentTheme === 'dark') {
                toggleSwitch.checked = true;
            }
        }

    </script>
</div>
</body>
</html>



