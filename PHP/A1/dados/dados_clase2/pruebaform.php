<?php 

//
//$formularioEnviado = isset($_GET('name')), $_GET('email');
$formularioEnviado = isset($_GET['enviar']);
?>
<html>
<body>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="email"><br>
<input type="submit">
<input type="hidden" name="enviar" value="1">
</form>

<?php
if($formularioEnviado==1) {
?>
    Welcome <?php echo $_POST["name"]; ?><br>
    Your email address is: <?php echo $_POST["email"]; ?>
<?php
}
?>
</body>
</html>