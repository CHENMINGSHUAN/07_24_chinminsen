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

        input {
            margin-bottom: 10px;
        }

        #login {
            margin-top: 15px;
        }

        .a a {
            text-decoration: none;
            border: dimgray 1px solid;
            padding: 15px;
            cursor: pointer;
            border-radius: 0.25rem;

            color: black;
            font-size: 22px;
            margin-top: 15px;
        }

        .a {
            margin-top: 15px;
        }

        .a:hover {
            opacity: 0.8;
        }

        .fukuoka {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-size: 24px;

        }

        li {
            list-style: none;
        }

        .select ul li {
            display: inline-block;
            font-size: 22px;
            border-left: lightslategrey, 1px, solid;
            padding-right: 30px;
        }

        .select a {
            text-decoration: none;
        }

        .select a:hover {
            opacity: 0.6;
        }

        header {
            justify-content: flex-end;
            display: flex;

        }

        .trigger {
            border: dimgray 1px solid;

            border-radius: 0.25rem;
            cursor: pointer;
            margin-right: 10px;
            font-size: 14px;
        }

        .dropbtn {


            padding: 8px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            border-radius: 0.25rem;
            cursor: pointer;
        }

        /* #divId {
            visibility: hidden;
        } */

        .dropdown {
            position: relative;
            display: inline-block;

        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            /* box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2); */
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: black;
            color: linen;
        }
    </style>
</head>

<body>
    <header>
        <div class="member">

            <div class="dropdown" id="divId">
                <button class="dropbtn" id="dropbtn" style="display: none;"> Member Area</button>
                <div class="dropdown-content">
                    <a href="#">Profile</a>
                    <a href="member_read.php">Settings</a>
                    <form action="logout_create.php" method="post">
                        <a href="../07_24_chinminsen/logout_create.php">Log out</a>
                    </form>
                </div>
            </div>


    </header>

    <div class="fukuoka">
        <h1>FUKUOKA Guide Book</h1>

        <div class="select">
            <ul>
                <li><a href="">Fukuoka</a> </li>
                <li><a href="">News</a> </li>
                <li><a href="">Local</a></li>
                <li><a href="">Information</a></li>
                <li><a href="">The Guide Book</a></li>
            </ul>
        </div>
        </header>
        <ul>

            <li><img src="../07_24_chinminsen/img/20191011_164711.jpg" id="img1" width="650px" height="420px"></li>
            </li>
            <!-- <li> <img src="../07_24_chinminsen/img/20200312_150721.jpg" id="img2" style="display: none;" alt="" width="650px" height="420px">
            </li> -->
        </ul>

        <div class="a">
            <a href="#" style="display: none;" id="a">Start to Write Your Giude Book.</a>
        </div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script>
        <script>
            // $("#img1").attr("../07_24_chinminsen/img/20191011_164711.jpg");
            $("#dropbtn").fadeIn(3000);
            $("#a").fadeIn(3000);
        </script>

</body>

</html>