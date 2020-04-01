<?php
session_start();
$username=$_SESSION['username'];

include "config.php";
include "menu.php";

date_default_timezone_set("Asia/Kuala_Lumpur");
$masa=date("d/m/Y H.i.s");
?>
<br><br><br>
<center>
<form method="post">
<table border="5" style="max-width:50%;">
<tr>
<th><input type="number" name="no1" placeholder="Nombor Pertama" style="width:90%;height:40px;"></th>
</tr>
<tr>
<th><input type="number" name="no2" placeholder="Nombor Kedua" style="width:90%;height:40px;"></th>
</tr>
<tr>
<th><select name="operasi" style="width:90%;height:40px;">
<option value="error">Sila pilih operasi</option>
<option>Tambah</option>
<option>Tolak</option>
<option>Darab</option>
<option>Bahagi</option>
</select>
</th>
</tr>
</table><br>
<input type="submit"name="kira" value="KIRA">
</form>
</center>

<?php
if(isset($_POST['kira'])){
	$no1=$_POST['no1'];
	$no2=$_POST['no2'];
	$operasi=$_POST['operasi'];
	
	if($operasi=="error"){
		echo "<script language='javascript'>alert('Sila Pilih Operasi Yang Betul')</script>";
	}
	else{
		if($operasi=="Tambah"){
		$hasil=$no1+$no2;
		}elseif($operasi=="Tolak"){
		$hasil=$no1-$no2;
		}elseif($operasi=="Darab"){
			$hasil=$no1*$no2;
         }elseif($operasi=="Bahagi"){
			$hasil=$no1/$no2;
			}
			$query="INSERT INTO hasil SET oleh='$username',no1='$no1',no2='$no2',operasi='$operasi',hasil='$hasil',masa='$masa'";
			$result=mysqli_query($conn,$query);
			
			echo "<script language='javascript'>alert('Hasil $no1 $operasi $no2 ialah $hasil')</script>";
			header("Refresh:1; url=index.php",true,303);
	}
}
?>