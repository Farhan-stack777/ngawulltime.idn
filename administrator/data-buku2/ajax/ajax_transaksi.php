<?php 
require_once '../koneksi.php';

if($_GET['action'] == "table_data")
{
    $sql    = "SELECT * FROM tb_buku";
    $order  = " ORDER BY Id DESC ";
    $query          = $mysqli->query($sql);
    $totalData      = $query->num_rows;
    $totalFiltered  = $totalData; 

    $limit  = $_POST['length'];
    $start  = $_POST['start'];

    if(empty($_POST['search']['value']))
    {   
        $query  = $mysqli->query($sql.$order." LIMIT $limit OFFSET $start");
    }
    else {

        $search = $_POST['search']['value']; 
        $where  = " WHERE judul_buku  LIKE '%$search%' OR penulis_buku LIKE '%$search%' ORDER BY Id DESC ";

        $totalFiltered  = $mysqli->query($sql.$where)->num_rows;
        $query          = $mysqli->query($sql.$where." LIMIT $limit OFFSET $start");
    }

    $data = array();
    if(!empty($query))
    {
        $no = $start + 1;
        while ($r = $query->fetch_array())
        {
            // $definisi = $r['field']; susunannya
            $nestedData['no']           = $no;
            $nestedData['Id']           = $r['Id'];
            $nestedData['cover']        = $r['cover'];
            // $nestedData['tanggal']   = date('d M Y', strtotime($r['tgl']));
            $nestedData['judul_buku']   = $r['judul_buku'];
            $nestedData['penulis_buku'] = $r['penulis_buku'];
            // $nestedData['nominal']   = 'Rp '.number_format($r['nominal'],0,",",".");
            $nestedData['isbn']         = $r['isbn'];
            $nestedData['sinopsis']     = $r['sinopsis'];
            $nestedData['link']         = $r['link'];
            $data[] = $nestedData;
            $no++;
        }
    }

    $json_data = array(
        "draw"            => intval($_POST['draw']),  
        "recordsTotal"    => intval($totalData),  
        "recordsFiltered" => intval($totalFiltered), 
        "data"            => $data   
    );
        
    echo json_encode($json_data); 
}