<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Day la trang login</title>

</head>
<body>
<form method="post">
    @csrf
    <p>Site login</p>
    <input type="text" name="email" placeholder="email"  /><br/>
    <input type="text" name="password" placeholder="passsword"/><br/>
    <button type="submit" name="button">Submit</button>
</form>
</body>
</html>