<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="index.php?ctrl=security&action=ajouterRegister" method="post">

     <div>
        <label for="usrname">Username</label>
        <input type="text" name="username" id="username">
    </div>
     <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
    </div>
     <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
    </div>
     <div>
        <label for="password2">Password again</label>
        <input type="password" name="password2" id="password2">
    </div>

    <div>
        <!-- <label for="agree">
            <input type="checkbox" name='agree' id="agree" value ="yes"> i agree with the 
            <a href="#" title="term of services">term of services</a>
        </label> -->

        <button type="submit" name ="submit">Register</button>


    </div>







</form>
    
</body>
</html>