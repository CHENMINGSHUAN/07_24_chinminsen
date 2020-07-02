<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .con {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        #register {
            margin-bottom: 10px;

        }

        input {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>



    <div class="con">
        <h1>Start to write your Guide Book</h1>
        <p>Create an account.</p>

        <form action="register.create.php" method="POST">
            <label for="name">Username</label><br>
            <input type="name" name="username" /><br>
            <label for="name">Name</label><br>
            <input type="name" name="name" /><br>
            <label for="email">Your Email</label><br>
            <input type="email" name="email" /><br>
            <label for="password">Password</label><br>
            <input type="password" name="password" /><br>
            <label for="password">Confirm Password</label><br>
            <input type="password" name="assertpassword" />
            <div id="register">
                <input type="submit" name="submit" value="register">
            </div>

        </form>

    </div>

</body>

</html>