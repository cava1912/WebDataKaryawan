<?php
require_once("connect/config.php");
extract($_POST);

if(isset($csv)){
    $output = fopen("php://output", "w");
    fputcsv($output, array("Nama", "Jabatan", "Alamat", "Status"));
    $sql = "select * from karyawan";
    $query =mysqli_query($mysqli, $sql);
    while($data = mysqli_fetch_assoc($query)){
        fputcsv($output, $data);
    }
    header("Content-Type: text/csv; charset-utf-8");
    header("Content-Disposition: attachment; filename=data_karyawan.csv");
    fclose($output);
}
?>