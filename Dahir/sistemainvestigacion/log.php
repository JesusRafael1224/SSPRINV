<!DOCTYPE html>
<html lang="en">
    <style>
        table{
            border: 2px solid #353A46;
            background-color: #9ACD32;
        }

        input[type=text], input[type=password]
        {
            width: 100%;
            padding: 6px 20px;
            border: 2px solid rgb(14, 12, 12);
            box-sizing: border-box;

        }
        img{
           width: 100px;
           height: 100px; 
        }
        label{
            font-size: 14px;
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif;
        }
        input[type=submit]
        {
            background-color: #008080;
            color: rgb(22, 20, 20);
            padding: 8px 10px;
            margin: 8px 0px;
            border: solid;
            cursor: pointer;
            width: 40%;
        }


    </style>
  
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<center>
<body bgcolor="90EE90">
    <form method="POST" action="login.php">
        <table>
            <tr><td colspan="2"><label>LOGIN</label></td></tr>
            <tr><td align="center" style="background-color: #9ACD32; padding-bottom: 5px; padding-top: 5px;" rowspan="5"><img src="TEST.jpg"/></td><td><label>USUARIO</label></td></tr>
            <tr><td><input type="text" name="txtusuario"/></td></tr>
            <tr><td><label>PASSWORD</label></td></tr>
            <tr><td><input type="password" name="txtpassword"/></td></tr>
            <tr><td><input type="submit" value="Ingresar"/></td></tr>
        </table>
    </form>
</body>
</center>
</html>