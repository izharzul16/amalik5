<html>
<head>
			<script>

    function changeBodyBg(color){
        document.body.style.background = color;
    }
    
</script>
	</head>
	<body >
		<img src="kalkulator izhar.jpg" width="1300" height="300"  align="center">

		<button type="button" onclick="changeBodyBg('blue');">Blue</button>
        <button type="button" onclick="changeBodyBg('yellow');">Yellow</button>
        <button type="button" onclick="changeBodyBg('orange');">Orange</button>
        <button type="button" onclick="changeBodyBg('salmon');">Salmon Khan</button>
        <button type="button" onclick="changeBodyBg('lightblue');">Light Blue</button>
<?php
include 'config.php'
?>
<center>

<form method="post">
	<table width="280px" border="0">
	<tr>
		<td align="center">Username</td>
	</tr>
	<tr>
		<td align="center"><input type="text" name="username" placeholder="Nama Pengguna"</td>
	</tr>
	<tr>
		<td align="center">Password</td>
	</tr>
	<tr>
		<td align="center"><input type="password" name="password" placeholder="Kata Laluan"</td>
	</tr>
	<tr>
		<td align="center"><button type="submit" name="submit">Login</button></td>
	</tr>
	</table>
</form>

<a href="sign_up.php"target="top"value="sign up">Sign Up</a><br>
</br>
</br>
</br>


</center>

<?php
if(isset($_POST['submit'])){

	$username=$_POST['username'];
	$password=$_POST['password'];
	
if($username!=NULL && $password!=NULL){
$query="SELECT * FROM admin WHERE username='$username' and password='$password'";
	$result=mysqli_query($conn,$query);
	
if(mysqli_num_rows($result)>0){
	//if 2
	while($row=mysqli_fetch_assoc($result)){
		$username=$row['username'];
		$password=$row['password'];
		$user_level=$row['user_level'];
		$id=$row['id'];
		}
	if($user_level==0){//if 3
	$_SESSION['username']=$username;
	$_SESSION['password']=$password;
	$_SESSION['id']=$id;
	$_SESSION['user_level']=$user_level;
	
?>
<meta http-equiv="refresh" content="0">
<?php
	}//if 3
	}//if 2
	else{
	echo("Wrong username or password");
	}
}
else{
	echo "Please Enter username and password!";
	}	
}
?>	


</body>

</html>
