<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.5">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        .form-signin {
            max-width: 330px;
            padding: 15px;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
</head>

<body>
    <br><br><br>
    <main class="form-signin w-100 m-auto">
        <form class="text-center">
            <a href="/ogs/">
                <img class="mb-2" src="../assets/school_logo.jpg" alt="" width="75" height="75">
            </a>
            <h6>AMECI</h6>
            <h1 class="h3 mb-2 fw-normal">Create Account</h1>


            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="Firstname">
                <label for="floatingInput">Firstname</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="Lastname">
                <label for="floatingInput">Lastname</label>
            </div>
            <div class="form-floating">
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                </select>
                <label for="floatingSelect">Gender</label>
            </div>
            <div class="form-floating">
                <input type="date" class="form-control" id="floatingInput" placeholder="Date of Birth">
                <label for="floatingInput">Date of Birth</label>
            </div>
            <br>
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="LRN">
                <label for="floatingInput">LRN</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="Username">
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
            <div class="checkbox mt-3">
                <label>
                    Already have account?<a href="login-view.php"> Sign In</a>
                </label>
            </div>
            <!--
                <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
            -->
        </form>
    </main>
    <br>
</body>

</html>