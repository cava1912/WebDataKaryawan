<?php
require_once("../connect/config.php");
require_once("../dompdf/autoload.inc.php");
use Dompdf\Dompdf;
extract($_POST);

if(isset($pdf)){
    $sql = "select * from karyawan order by id desc";
    $query = mysqli_query($mysqli, $sql);
    $html = '';
    $html .= '
    <h2 align="center">Data Karyawan</h2>
    <table style ="width:100%; border-collapse:collapse;">
        <tr>
            <th style = "border:1px solid #ddd; paddding:8px; text-align:left;">No</th>
            <th style = "border:1px solid #ddd; paddding:8px; text-align:left;">Nama</th>
            <th style = "border:1px solid #ddd; paddding:8px; text-align:left;">Jabatan</th>
            <th style = "border:1px solid #ddd; paddding:8px; text-align:left;">Alamat</th>
            <th style = "border:1px solid #ddd; paddding:8px; text-align:left;">Status</th>
        </tr>
    ';
    if(mysqli_num_rows($query) > 0){
        $count = 1;
        foreach($query as $data){
            $html .='
            <tr>
                <td style="border:1px solid #ddd; padding:8px; text-align:left;">'.$count.'</td>
                <td style="border:1px solid #ddd; padding:8px; text-align:left;">'.$data["nama"].'</td>
                <td style="border:1px solid #ddd; padding:8px; text-align:left;">'.$data["jabatan"].'</td>
                <td style="border:1px solid #ddd; padding:8px; text-align:left;">'.$data["alamat"].'</td>
                <td style="border:1px solid #ddd; padding:8px; text-align:left;">'.$data["statuss"].'</td>
            </tr>
            ';
            $count++;
        }
    }else{
        $html .= '
        <td colspan="5" style="border:1px solid #ddd; padding:8px; text-align:left;">No Data</td>
        ';
    }
    $html .= '</table>';
    $dompdf = new DOMPDF();
    $dompdf->loadHtml($html);
    $dompdf->setPaper("A4", "portrait");
    $dompdf->render();
    $dompdf->stream("data_karyawan.pdf");
}
?>