<?php
include "../conn.php";

$date=date('d-m-Y-g-i-s');
$file="backup@".$date.".sql";

$command = "mysqldump -u root db_perpus > backup/$file";

$backup=exec($command);




    header("Content-Disposition: attachment; filename=$file");
 

    header("Content-length: $file ");
 

    header("Content-type:$file ");
 

   $fp  = fopen("backup/".$file, 'r');
   $content = fread($fp, filesize('backup/'.$file));
   fclose($fp);
 

   echo $content;

if ($backup) {
echo "<script>alert('Berhasil Backup Database.Nama File = $file');</script>";
} else {
echo "<script>alert('Gagal Backup !');</script>";
}  


exit;



?>