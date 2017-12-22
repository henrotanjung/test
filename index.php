
<!--<html>
  <head>
    <title>Textfield Dinamis – irnanto.com</title>
    <script>
        counter=0;
        function action(){
            counterNext=counter+1;
            document.getElementById("input"+counter).innerHTML = "<p>Masukkan Data <input name='data[]' type='text' /></p> <div id=\"input"+counterNext+"\"></div>";// perhatikan tanda petiknya, sama seperti pemrograman java yang lainnya
            counter++;
        }
        
        count=0;
        function act_remove(){
            counterNext=count+1;
            document.getElementById("input"+count).innerHTML = "<p>Masukkan Data <input name='data[]' type='text' /></p> <div id=\"input"+counterNext+"\"></div>";// perhatikan tanda petiknya, sama seperti pemrograman java yang lainnya
            count++;
        }
        
        $(document).ready(function(){
            $("button").click(function(){
                $("p").remove(".test");
            });
        });
    </script>
  </head>
  <body>
    <h1>Form Dinamis</h1>
    <form action="proses_dinamis.php" method="post">
        <p>Masukkan Data <input name="data[]" type="text" /></p>
        <div id="input0"></div>
        <p><a href="javascript:action();">Tambah</a></p>
        
    </form>
  </body>
</html>-->


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Form Dinamis</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script>
   function tambahHobi() {
     var idf = document.getElementById("idf").value;
     var stre;
     stre="<p id='srow" + idf + "'><input type='text' size='40' name='rincian_hobi[]' placeholder='Masukkan Hobi' /> <a href='#' style=\"color:#3399FD;\" onclick='hapusElemen(\"#srow" + idf + "\"); return false;'>Hapus</a></p>";
     $("#divHobi").append(stre);
     idf = (idf-1) + 2;
     document.getElementById("idf").value = idf;
   }
   function hapusElemen(idf) {
     $(idf).remove();
   }
</script>
</head>
<body>
<div id="container">
<h2>Contoh Form Dinamis</h2>
<form method="post" action="proses.php">
   <input id="idf" value="1" type="hidden" />
   <p> Nama : <input name="nama" type="text" id="nama" size="40"> </p>
   <button type="button" onclick="tambahHobi(); return false;">Tambah Rincian Hobi</button>
   <div id="divHobi"></div>
   <button type="submit">Simpan</button>
  </form>
</div>
</body>
</html>







<?php
	/*===============================================================================
		Membuat Form Input Dinamis dengan PHP
		By: BliKomKom
		Website: http://www.komang.my.id
		Source code ini bisa anda gunakan dan modifikasi sesuai kebutuhan
	===============================================================================*/
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Metode Biseksi</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
<script language="javascript">
	function tambahHobi() {
    		var idf = document.getElementById("idf").value;
			var stre;
			stre="<p id='srow" + idf + "'><input type='text' size='40' name='rincian_hoby[]' placeholder='Masukkan Hobi' /> <input type='text' size='30' name='jenis_hoby[]' placeholder='Utama/Sambilan' /> <a href='#' style=\"color:#3399FD;\" onclick='hapusElemen(\"#srow" + idf + "\"); return false;'>Hapus</a></p>";
    		$("#divHobi").append(stre);	
    		idf = (idf-1) + 2;
    		document.getElementById("idf").value = idf;
		}
	function hapusElemen(idf) {
    		$(idf).remove();
		}
</script>
</head>
<body>
<div id="container">
<h2>Input Data Karyawan</h2>
<form method="post" action="proses.php">
	<input id="idf" value="1" type="hidden" />
	<p>  Nama : <input name="nama_karyawan" type="text" id="nama" size="40"> </p>
    <p>  Umur : <input name="umur_karyawan" type="text" id="nama" size="8"> </p>
	<button type="button"  onclick="tambahHobi(); return false;">Tambah Rincian Hobi</button>
 	<div id="divHobi"></div>
 	<button type="submit">Simpan</button>
</form>
</div>
</body>
</html>



<?php
		mysql_connect("localhost","root","");
		mysql_select_db("tutorial");
		$nama_karyawan=$_POST['nama_karyawan'];
		$umur_karyawan=$_POST['umur_karyawan'];
		function proses_hoby($id_karyawan)
			{
				if(isset($_POST["rincian_hoby"]))
					{
						$hoby=$_POST["rincian_hoby"];
						reset($hoby);
						while (list($key, $value) = each($hoby)) 
							{
								$rincian_hoby	=$_POST["rincian_hoby"][$key];
								$jenis_hoby		=$_POST["jenis_hoby"][$key];
								$sql_hoby	="INSERT INTO tbl_hoby(rincian_hoby,jenis_hoby,id_karyawan)
											  VALUES('$rincian_hoby','$jenis_hoby','$id_karyawan')";  
								$hasil_hoby	=mysql_query($sql_hoby);	
							}
						}		
			}
		
		$sql="INSERT INTO tbl_karyawan(nama_karyawan,umur_karyawan)
     	  			  VALUES('$nama_karyawan','$umur_karyawan')";		
		$hasil=mysql_query($sql);
		$id_karyawan=mysql_insert_id();	
		if($hasil)
			{ 
				proses_hoby($id_karyawan);
				echo "Data berhasil diinput";
			}
		else
			{
				echo "Data Gagal diinput";	
			}	
		
?>