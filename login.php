<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body{
            background-image: url("resturant.jpg");

        }

    </style>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>login form</h2>
    <form class="form-horizontal" action="login1.php"  method="get">
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">User name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="email" placeholder="Enter username" name="username" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Password:</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                    <label><input type="checkbox" name="remember"> Remember me</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default" onclick="myFunction(form.username.value)">Submit</button>
            </div>
        </div>
    </form>
</div>
<script>
    function myFunction() {
        var str =document.getElementById('email').value;
        var patt1 = /([A-Z][a-z])/;
        var result = patt1.test(str);


    }
</script>
</body>
</html>