<link rel="icon" type="image/x-icon" href="<?=base_url('assets/img/survei.png');?>">
<?php
$session = $this->session->userdata('login');

$id_setoran  = $this->input->get('id_setoran');
$tgl_setoran = $this->input->get('tgl_setoran');
$armada      = $this->input->get('armada');
$nama_segment = $this->model_reports_ak13->segmen($id_setoran,$armada);
$jurusan      = $this->model_reports_ak13->jurusan($id_setoran,$armada);
$driver1      = $this->model_reports_ak13->driver1($id_setoran,$armada);
$driver2      = $this->model_reports_ak13->driver2($id_setoran,$armada);
$sum_km_trayek   = $this->model_reports_ak13->sum_km_trayek($id_setoran);
$asuransi_trayek = $this->model_reports_ak13->asuransi_trayek($id_setoran);

$general_manager   = $this->model_reports->general_manager($cabang);
;?>
<title>REPORT AK/13</title>
<table style="border-collapse:collapse;" width="100%" align="center" border="0">
    <tr>
        <td width="22%" align="center" style="font-size:12px;">
            <b>SEGMEN : <?=$nama_segment;?></b><br />
        </td>
        <td width="50%" align="center" style="font-size:12px;">
            <b>PERUSAHAAN UMUM DAMRI (PERUM DAMRI)</b><br />
            <b>KANTOR CABANG : <?=strtoupper($cabang_nama);?></b><br />
        </td>
        <td width="20%" align="center" style="font-size:18px;">
            <img src="<?=base_url('assets/img/logos.png');?>" alt="Perum DAMRI" height="20" width="100">
        </td>
    </tr>
</table><br/>
<table style="border-collapse:collapse;" width="100%" align="center" border="0">
    <tr>
        <td width="1%" align="center" style="font-size:12px;"></td>
        <td width="50%" align="center" style="font-size:14px;">
            <b>DAFTAR PENJUALAN KARCIS (DPK) AK/13</b><br />
            NOMOR : ...........................<br />
        </td>
    </tr>
</table><br/>
<table style="border-collapse:collapse;" border="1" width="100%">
    <thead>
        <tr>
            <td colspan="5" style="font-size:10px;text-align:left;border-right:none;">Bus Code &emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;: <?=$armada;?></td>
            <td rowspan="2" colspan="4" style="font-size:10px;text-align:center;">AP/3 Dari UPT No.</td>
            <td colspan="6" style="font-size:10px;text-align:center;">Penjualan Karcis Di Perjalanan Oleh Awak Bus</td>
        </tr>
        <tr>
            <td colspan="5" style="font-size:10px;text-align:left;border-right:none;">Jurusan &emsp;&emsp;&emsp;&emsp;&emsp;&nbsp; : <?=$jurusan;?></td>
            <td style="font-size:10px;text-align:center;">No. Awal</td>
            <td style="font-size:10px;text-align:center;">No. Akhir</td>
            <td colspan="2" style="font-size:10px;text-align:center;">Jml. Lembar</td>
            <td colspan="2" style="font-size:10px;text-align:center;">Jml. Rp</td>
        </tr>

        <tr>
            <td colspan="5" style="font-size:10px;text-align:left;border-right:none;">KM Tempuh &emsp;&emsp;&emsp;&nbsp; : <?=number_format($sum_km_trayek,0,",",".");?> km</td>
            <td colspan="4" style="font-size:10px;text-align:center;"></td>
            <td style="font-size:10px;text-align:center;"></td>
            <td style="font-size:10px;text-align:center;"></td>
            <td colspan="2" style="font-size:10px;text-align:center;"></td>
            <td colspan="2" style="font-size:10px;text-align:center;"></td>
        </tr>
        <tr>
            <td colspan="5" style="font-size:10px;text-align:left;border-right:none;">Tanggal &emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;: <?=tgl_indo($tgl_setoran)?></td>
            <td colspan="4"style="font-size:10px;text-align:center;"></td>
            <td style="font-size:10px;text-align:center;"></td>
            <td style="font-size:10px;text-align:center;"></td>
            <td colspan="2" style="font-size:10px;text-align:center;"></td>
            <td colspan="2" style="font-size:10px;text-align:center;"></td>
        </tr>
        <tr>
            <td colspan="5" style="font-size:10px;text-align:left;border-right:none;">Driver 1 &emsp;&emsp;&emsp;&emsp;&emsp; : <?=$driver1?></td>
            <td colspan="4"style="font-size:10px;text-align:center;"></td>
            <td style="font-size:10px;text-align:center;"></td>
            <td style="font-size:10px;text-align:center;"></td>
            <td colspan="2" style="font-size:10px;text-align:center;"></td>
            <td colspan="2" style="font-size:10px;text-align:center;"></td>
        </tr>
        <tr>
            <td colspan="5" style="font-size:10px;text-align:left;border-right:none;">Driver 2 &emsp;&emsp;&emsp;&emsp;&emsp; : <?=$driver2;?></td>
            <td colspan="4"style="font-size:10px;text-align:center;"></td>
            <td style="font-size:10px;text-align:center;"></td>
            <td style="font-size:10px;text-align:center;"></td>
            <td colspan="2" style="font-size:10px;text-align:center;"></td>
            <td colspan="2" style="font-size:10px;text-align:center;"></td>
        </tr>

        <tr>
            <td rowspan="2" style="font-size:10px;text-align:center;">NO</td>
            <td colspan="4" style="font-size:10px;text-align:center;">Jurusan</td>
            <td colspan="6" style="font-size:10px;text-align:center;">Karcis di Jual Oleh</td>
            <td colspan="3" style="font-size:10px;text-align:center;">UPP</td>
            <td rowspan="2" style="font-size:10px;text-align:center;">Jumlah Pnp Km 4x11</td>
        </tr>
        <tr>
            <td style="font-size:10px;text-align:center;">Dari</td>
            <td style="font-size:10px;text-align:center;">Ke</td>
            <td style="font-size:10px;text-align:center;">Km</td>
            <td style="font-size:10px;text-align:center;">Rit</td>
            <td style="font-size:10px;text-align:center;">DAMRI Apps</td>
            <td style="font-size:10px;text-align:center;">OTA</td>
            <td style="font-size:10px;text-align:center;">Agen</td>
            <td style="font-size:10px;text-align:center;">Loket</td>
            <td style="font-size:10px;text-align:center;width: 2px;">Awak Bus</td>
            <td style="font-size:10px;text-align:center;">Jumlah Karcis</td>
            <td style="font-size:10px;text-align:center;">Pnp</td>
            <td style="font-size:10px;text-align:center;">Bgs</td>
            <td style="font-size:10px;text-align:center;">Jumlah</td>
        </tr>
        <tr>
            <td style="font-size:10px;text-align:center;background-color:#d5d5e3;"><i>1</i></td>
            <td style="font-size:10px;text-align:center;background-color:#d5d5e3;"><i>2</i></td>
            <td style="font-size:10px;text-align:center;background-color:#d5d5e3;"><i>3</i></td>
            <td style="font-size:10px;text-align:center;background-color:#d5d5e3;"><i>4</i></td>
            <td style="font-size:10px;text-align:center;background-color:#d5d5e3;"><i>5</i></td>
            <td style="font-size:10px;text-align:center;background-color:#d5d5e3;"><i>6</i></td>
            <td style="font-size:10px;text-align:center;background-color:#d5d5e3;"><i>7</i></td>
            <td style="font-size:10px;text-align:center;background-color:#d5d5e3;"><i>8</i></td>
            <td style="font-size:10px;text-align:center;background-color:#d5d5e3;"><i>9</i></td>
            <td style="font-size:10px;text-align:center;background-color:#d5d5e3;"><i>10</i></td>
            <td style="font-size:10px;text-align:center;background-color:#d5d5e3;"><i>11</i></td>
            <td style="font-size:10px;text-align:center;background-color:#d5d5e3;"><i>12</i></td>
            <td style="font-size:10px;text-align:center;background-color:#d5d5e3;"><i>13</i></td>
            <td style="font-size:10px;text-align:center;background-color:#d5d5e3;"><i>14</i></td>
            <td style="font-size:10px;text-align:center;background-color:#d5d5e3;"><i>15</i></td>
        </tr>
        <?php
        $nomor = $total_km = $total_rit = $total_karcis = $total_upp_pnp = $total_upp_bagasi = $total_pendapatan = 0;
        $max_rit=array(0);
        $data_setoran_detail_pnp =$this->model_reports_ak13->data_setoran_detail_pnp($id_setoran);
        foreach ($data_setoran_detail_pnp as $row) { ?>
            <tr>
                <td style="font-size:10px;text-align:center;"><?=($nomor+=1);?></td>
                <td style="font-size:10px;text-align:center;"><?=$row->nm_point_awal;?></td>
                <td style="font-size:10px;text-align:center;"><?=$row->nm_point_akhir;?></td>
                <td style="font-size:10px;text-align:center;"><?=intval($row->km_trayek);?></td>
                <td style="font-size:10px;text-align:center;"><?=$row->rit;?></td>
                <td style="font-size:10px;text-align:center;"><?=$row->damri_apps;?></td>
                <td style="font-size:10px;text-align:center;"><?=$row->ota;?></td>
                <td style="font-size:10px;text-align:center;"><?=$row->agen;?></td>
                <td style="font-size:10px;text-align:center;"><?=$row->loket;?></td>
                <td style="font-size:10px;text-align:center;"><?=$row->awak_bus;?></td>
                <td style="font-size:10px;text-align:center;"><?=$row->jumlah;?></td>
                <td style="font-size:10px;text-align:right;"><?=number_format(($row->jumlah*$row->harga),0,",",".");?></td>
                <td style="font-size:10px;text-align:right;"><?=number_format($row->bagasi_pnp,0,",",".");?></td>
                <td style="font-size:10px;text-align:right;"><?=number_format($row->total,0,",",".");?></td>
                <td style="font-size:10px;text-align:center;"><?=number_format($row->km_trayek*$row->jumlah,0,",",".");?></td>
            </tr>
            <?php 
            $data_setoran_detail_pnp_pertelaan =$this->model_reports_ak13->data_setoran_detail_pnp_pertelaan($row->id_setoran_pnp);
            foreach ($data_setoran_detail_pnp_pertelaan as $row_p) { 
                extract($row_p);
                ?>
                <tr>
                    <td style="font-size:10px;text-align:center;"></td>
                    <td style="font-size:10px;text-align:center;"></td>
                    <td style="font-size:10px;text-align:center;"><i><?=$kd_trayek;?></i></td>
                    <td style="font-size:10px;text-align:center;"></td>
                    <td style="font-size:10px;text-align:center;"></td>
                    <td style="font-size:10px;text-align:center;"></td>
                    <td style="font-size:10px;text-align:center;"></td>
                    <td style="font-size:10px;text-align:center;"></td>
                    <td style="font-size:10px;text-align:center;"></td>
                    <td style="font-size:10px;text-align:center;"></td>
                    <td style="font-size:10px;text-align:center;"></td>
                    <td style="font-size:10px;text-align:center;"></td>
                    <td style="font-size:10px;text-align:center;"></td>
                    <td style="font-size:10px;text-align:center;"></td>
                    <td style="font-size:10px;text-align:center;"></td>
                </tr>
            <?php } ?>


            <?php
            $total_km           +=$row->km_trayek;
            array_push($max_rit, $row->rit);
            $total_karcis       +=$row->jumlah;
            $total_upp_pnp      +=($row->jumlah*$row->harga);
            $total_upp_bagasi   +=$row->bagasi_pnp;
            $total_pendapatan   +=($row->total);
        }
        ;?>
        <tr>
            <td colspan="3" style="font-size:10px;text-align:center;"></td>
            <td style="font-size:10px;text-align:center;"></td>
            <td style="font-size:10px;text-align:center;"></td>
            <td style="font-size:10px;text-align:center;"></td>
            <td style="font-size:10px;text-align:center;"></td>
            <td style="font-size:10px;text-align:center;"></td>
            <td style="font-size:10px;text-align:center;"></td>
            <td style="font-size:10px;text-align:center;"></td>
            <td style="font-size:10px;text-align:center;height:13px"></td>
            <td style="font-size:10px;text-align:center;"></td>
            <td style="font-size:10px;text-align:center;"></td>
            <td style="font-size:10px;text-align:center;"></td>
            <td style="font-size:10px;text-align:center;"></td>
        </tr>
        <tr>
            <td colspan="3" style="font-size:10px;text-align:center;"><b>Total Pendapatan Semua Rit</b></td>
            <td style="font-size:10px;text-align:center;"><b><?=number_format($sum_km_trayek,0,",",".");?></b></td></td>
            <td style="font-size:10px;text-align:center;"><b><?=number_format(max($max_rit),0,",",".");?></b></td></td>
            <td style="font-size:10px;text-align:center;"></td>
            <td style="font-size:10px;text-align:center;"></td>
            <td style="font-size:10px;text-align:center;"></td>
            <td style="font-size:10px;text-align:center;"></td>
            <td style="font-size:10px;text-align:center;"></td>
            <td style="font-size:10px;text-align:center;"><b><?=number_format($total_karcis,0,",",".");?></b></td></td>
            <td style="font-size:10px;text-align:center;"></td>
            <td style="font-size:10px;text-align:center;"></td>
            <td style="font-size:10px;text-align:right;"><b>Rp. <?=number_format($total_pendapatan,0,",",".");?></b></td></td>
            <td style="font-size:10px;text-align:center;"></td>
        </tr>
        <tr>
            <td style="font-size:10px;text-align:center;">1</td>
            <td colspan="5" style="font-size:10px;text-align:left;border-right-style:none;">Total Pendapatan Penumpang</td>
            <td colspan="9" style="font-size:10px;text-align:left;border-left-style:none;">: Rp. <?=number_format($total_upp_pnp,0,",",".");?></td>
        </tr>
        <tr>
            <td style="font-size:10px;text-align:center;">2</td>
            <td colspan="5" style="font-size:10px;text-align:left;border-right-style:none;">Total Pendapatan Bagasi</td>
            <td colspan="9" style="font-size:10px;text-align:left;border-left-style:none;">: Rp. <?=number_format($total_upp_bagasi,0,",",".");?></td>
        </tr>




        <?php
        $total_pend = 0; $no_pend=2;
        $query_setoran_detail_pendapatan = $this->model_reports_ak13->get_setoran_detail_pendapatan($id_setoran);
        foreach($query_setoran_detail_pendapatan->result_array() as $row){
            $keterangan     = $row["keterangan"];
            $total          = $row["total"];
            ?>
            <tr>
                <td style="font-size:10px;text-align:center;"><?=$no_pend+=1;?></td>
                <td colspan="5" style="font-size:10px;text-align:left;border-right-style:none;">Pend. <?=$row["keterangan"];?></td>
                <td colspan="9" style="font-size:10px;text-align:left;border-left-style:none;">: Rp. <?=number_format($row["total"],2,',','.')?></td>
            </tr>
            <?php $total_pend += $row["total"]; 
        }
        $total_pendapatan = $total_pendapatan+$total_pend?>


        <tr>
            <td style="font-size:10px;text-align:center;"></td>
            <td colspan="12" style="font-size:10px;text-align:left;border-right-style:none;"><b>Jumlah UPP Penumpang dan Bagasi</b></td>
            <td colspan="2" style="font-size:10px;text-align:left;border-left-style:none;">: Rp. <?=number_format($total_pendapatan,0,",",".");?></td>
        </tr>
        <tr>
            <td style="font-size:10px;text-align:center;">1</td>
            <td colspan="5" style="font-size:10px;text-align:left;border-right-style:none;">Titipan Asuransi Jasa Raharja (@Rp. <?=number_format($asuransi_trayek,0,",",".");?> * Jumlah Karcis)</td>
            <td colspan="9" style="font-size:10px;text-align:left;border-left-style:none;">: Rp. <?=number_format($ass_jasa_raharja = ($asuransi_trayek*$total_karcis),0,",",".");?></td>
        </tr>
        <?php
        $nomor_beban_1 = 1;
        $total_beban_1 = $jml_biaya_titipan = $jml_pnp_dan_upp_bus = $jml_upp_kurang_komisi = 0;
        $data_setoran_detail_beban_1 = $this->model_reports_ak13->get_setoran_detail_beban_1($id_setoran);
        foreach ($data_setoran_detail_beban_1 as $row) {
            $nomor_beban_1 = $nomor_beban_1+1; ?>
            <tr>
                <td style="font-size:10px;text-align:center;"><?=$nomor_beban_1;?></td>
                <td colspan="5" style="font-size:10px;text-align:left;border-right-style:none;"><?=$row->nm_komponen;?></td>
                <td colspan="9" style="font-size:10px;text-align:left;border-left-style:none;">: Rp. <?=number_format($row->total,0,",",".");?></td>
            </tr>
            <?php
            $total_beban_1+=$row->total;
        }
        $jml_biaya_titipan=($asuransi_trayek*$total_karcis)+$total_beban_1;
        $jml_pnp_dan_upp_bus=$total_pendapatan-$jml_biaya_titipan;

        $komisi_agen = $this->model_reports_ak13->sum_komisi_agen($id_setoran);
        $jml_upp_kurang_komisi=$jml_pnp_dan_upp_bus-$komisi_agen;
        ;?>
        <tr>
            <td style="font-size:10px;text-align:center;"></td>
            <td colspan="12" style="font-size:10px;text-align:left;border-right-style:none;"><b>Jumlah Biaya Titipan</b></td>
            <td colspan="2" style="font-size:10px;text-align:left;border-left-style:none;">: Rp. <?=number_format($jml_biaya_titipan,0,",",".");?></td>
        </tr>
        <tr>
            <td style="font-size:10px;text-align:center;"></td>
            <td colspan="9" style="font-size:10px;text-align:left;"><b>Jumlah Penumpang dan UPP Km Bus</b></td>
            <td colspan="1" style="font-size:10px;text-align:center;border-left-style:none;"><?=$total_karcis;?></td>
            <td colspan="2" style="font-size:10px;text-align:center;border-right-style:none;"></td>
            <td colspan="2" style="font-size:10px;text-align:left;border-left-style:none;">: Rp. <?=number_format($jml_pnp_dan_upp_bus,0,",",".");?></td>
        </tr>
        <tr>
            <td style="font-size:10px;text-align:center;"></td>
            <td colspan="14" style="font-size:10px;text-align:left;"><b>Biaya Operasi</b></td>
        </tr>
        <tr>
            <td style="font-size:10px;text-align:center;">1</td>
            <td colspan="5" style="font-size:10px;text-align:left;border-right-style:none;">Komisi yang diterima Agen (10%)</td>
            <td colspan="9" style="font-size:10px;text-align:left;border-left-style:none;">: Rp. <?=number_format($komisi_agen,0,",",".");?></td>
        </tr>
        <tr>
            <td style="font-size:10px;text-align:center;">2</td>
            <td colspan="5" style="font-size:10px;text-align:left;border-right-style:none;">Komisi Transit</td>
            <td colspan="9" style="font-size:10px;text-align:left;border-left-style:none;">: - </td>
        </tr>
        <tr>
            <td style="font-size:10px;text-align:center;">3</td>
            <td colspan="5" style="font-size:10px;text-align:left;border-right-style:none;">Discount/Potongan Harga</td>
            <td colspan="9" style="font-size:10px;text-align:left;border-left-style:none;">: - </td>
        </tr>
        <tr>
            <td style="font-size:10px;text-align:center;"></td>
            <td colspan="12" style="font-size:10px;text-align:left;border-right-style:none;"><b>Jumlah Komisi</b></td>
            <td colspan="2" style="font-size:10px;text-align:left;border-left-style:none;">: Rp. <?=number_format($komisi_agen,0,",",".");?></td>
        </tr>
        <tr>
            <td style="font-size:10px;text-align:center;"></td>
            <td colspan="12" style="font-size:10px;text-align:left;border-right-style:none;"><b>Jumlah UPP Setelah dikurangi Komisi</b></td>
            <td colspan="2" style="font-size:10px;text-align:left;border-left-style:none;">: Rp. <?=number_format($jml_upp_kurang_komisi,0,",",".");?></td>
        </tr>
        <?php
        $nomor_beban = $total_beban_2 = $udj_pengemudi = $jml_biaya_langsung = $surplus_minus_operasi = 0;
        $data_setoran_detail_beban_2 = $this->model_reports_ak13->get_setoran_detail_beban_2($id_setoran);
        foreach ($data_setoran_detail_beban_2 as $row_beban) {
            $nomor_beban = $nomor_beban+1; ?>
            <tr>
                <td style="font-size:10px;text-align:center;"><?=$nomor_beban;?></td>
                <td colspan="5" style="font-size:10px;text-align:left;border-right-style:none;"><?=$row_beban->nm_komponen;?></td>
                <td colspan="9" style="font-size:10px;text-align:left;border-left-style:none;">: Rp. <?=number_format($row_beban->total,0,",",".");?></td>
            </tr>
            <?php $total_beban_2+=$row_beban->total;
        }

        $udj_bagasi    = 0;
        $udj_pengemudi = ($this->model_reports_ak13->udj_pengemudi($id_setoran,$asuransi_trayek)*0.07);
        
        $jml_biaya_langsung = $udj_bagasi+$udj_pengemudi+$total_beban_2;
        $surplus_minus_operasi = $jml_upp_kurang_komisi-$jml_biaya_langsung;
        ;?>
        <tr>
            <td style="font-size:10px;text-align:center;"><?=($nomor_beban+1);?></td>
            <td colspan="5" style="font-size:10px;text-align:left;border-right-style:none;">UDJ Bagasi</td>
            <td colspan="9" style="font-size:10px;text-align:left;border-left-style:none;">: Rp. <?=number_format($udj_bagasi,0,",",".");?> </td>
        </tr>
        <tr>
            <td style="font-size:10px;text-align:center;"><?=($nomor_beban+2);?></td>
            <td colspan="5" style="font-size:10px;text-align:left;border-right-style:none;">UDJ Pengemudi 7% Setelah dikurangi biaya titipan</td>
            <td colspan="9" style="font-size:10px;text-align:left;border-left-style:none;">: Rp. <?=number_format($udj_pengemudi,0,",",".");?> </td>
        </tr>
        <tr>
            <td style="font-size:10px;text-align:center;"></td>
            <td colspan="12" style="font-size:10px;text-align:left;border-right-style:none;"><b>Jumlah Biaya Langsung</b></td>
            <td colspan="2" style="font-size:10px;text-align:left;border-left-style:none;">: Rp. <?=number_format($jml_biaya_langsung,0,",",".");?></td>
        </tr>
        <tr>
            <td style="font-size:10px;text-align:center;"></td>
            <td colspan="12" style="font-size:10px;text-align:left;border-right-style:none;"><b>Surplus/Minus Operasi</b></td>
            <td colspan="2" style="font-size:10px;text-align:left;border-left-style:none;">: Rp. <?=number_format($surplus_minus_operasi,0,",",".");?></td>
        </tr>
        <tr>
            <td style="font-size:10px;text-align:center;height: 13px"></td>
            <td colspan="12" style="font-size:10px;text-align:left;border-right-style:none;"><b></b></td>
            <td colspan="2" style="font-size:10px;text-align:left;border-left-style:none;"></td>
        </tr>
        <tr>
            <td style="font-size:10px;text-align:center;"></td>
            <td colspan="6" style="font-size:10px;text-align:left;border-right-style:none;"><b>Penerimaan Kembali Titipan</b></td>
            <td colspan="6" style="font-size:10px;text-align:left;border-left-style:none;border-right-style:none;"><b>1. Asuransi Jasa Raharja</b></td>
            <td colspan="2" style="font-size:10px;text-align:left;border-left-style:none;">: Rp. <?=number_format($ass_jasa_raharja,0,",",".");?></td>
        </tr>
        <?php
        $nomor_beban_3 = 1;
        $total_beban_3 = $penerimaan_kembali_pph = $penerimaan_kembali_jumlah = $setoran_final =0;
        $data_setoran_detail_beban_3 = $this->model_reports_ak13->get_setoran_detail_beban_3($id_setoran);
        foreach ($data_setoran_detail_beban_3 as $row) {
            $nomor_beban_3 = $nomor_beban_3+1;?>
            <tr>
                <td style="font-size:10px;text-align:center;"></td>
                <td colspan="6" style="font-size:10px;text-align:left;border-right-style:none;"><b></b></td>
                <td colspan="6" style="font-size:10px;text-align:left;border-left-style:none;border-right-style:none;"><b><?=$nomor_beban_3.". ".$row->nm_komponen;?></b></td>
                <td colspan="2" style="font-size:10px;text-align:left;border-left-style:none;">: Rp. <?=number_format($row->total,0,",",".");?></td>
            </tr>
            <?php $total_beban_3+=$row->total;
        }
        $penerimaan_kembali_pph     = $komisi_agen*0.02;
        $penerimaan_kembali_jumlah  = $ass_jasa_raharja+$penerimaan_kembali_pph+$total_beban_3;
        $setoran_final              = $surplus_minus_operasi+$penerimaan_kembali_jumlah;
        ;?>
        <tr>
            <td style="font-size:10px;text-align:center;"></td>
            <td colspan="6" style="font-size:10px;text-align:left;border-right-style:none;"><b></b></td>
            <td colspan="6" style="font-size:10px;text-align:left;border-left-style:none;border-right-style:none;"><b><?=$nomor_beban_3+=1?>. PPH Agen(2%)</b></td>
            <td colspan="2" style="font-size:10px;text-align:left;border-left-style:none;">: Rp. <?=number_format($penerimaan_kembali_pph,0,",",".");?></td>
        </tr>
        <tr>
        <td style="font-size:10px;text-align:center;"></td>
        <td colspan="6" style="font-size:10px;text-align:left;border-right-style:none;"><b></b></td>
        <td colspan="6" style="font-size:10px;text-align:left;border-left-style:none;border-right-style:none;"><b>Jumlah Biaya Titipan.....</b></td>
        <td colspan="2" style="font-size:10px;text-align:left;border-left-style:none;">: Rp. <?=number_format($penerimaan_kembali_jumlah,0,",",".");?></td>
    </tr>
     <tr>
            <td style="font-size:10px;text-align:center;height: 13px"></td>
            <td colspan="12" style="font-size:10px;text-align:left;border-right-style:none;"></td>
            <td colspan="2" style="font-size:10px;text-align:left;border-left-style:none;"></td>
        </tr>
    <tr>
            <td style="font-size:10px;text-align:center;"></td>
            <td colspan="12" style="font-size:10px;text-align:left;border-right-style:none;"><b>Surplus/Minus Operasi dan Jumlah Biaya Titipan</b></td>
            <td colspan="2" style="font-size:10px;text-align:left;border-left-style:none;">: Rp. <?=number_format($surplus_minus_operasi+$penerimaan_kembali_jumlah,0,",",".");?></td>
        </tr>

        <tr>
            <td style="font-size:10px;text-align:center;"></td>
            <td colspan="6" style="font-size:10px;text-align:left;border-right-style:none;"><b></b></td>
            <td colspan="6" style="font-size:10px;text-align:left;border-left-style:none;border-right-style:none;"><b>Pendapatan (Apps, OTA)</b></td>
            <td colspan="2" style="font-size:10px;text-align:left;border-left-style:none;">: Rp. <?php
            $sum_aps_ota_loket = $this->model_reports_ak13->sum_aps_ota_loket($id_setoran);
            echo number_format($sum_aps_ota_loket,0,',','.')?>
        </td>
    </tr>
    

    <td style="font-size:10px;text-align:center;"></td>
    <td colspan="14" style="font-size:10px;text-align:left;border-right-style:none;height:15px"></td>
</tr>

<td style="font-size:10px;text-align:center;"></td>
<td colspan="12" style="font-size:10px;text-align:left;border-right-style:none;"><b>Jumlah Yang Di Setorkan Oleh Awak Bus</b></td>
<td colspan="2" style="font-size:10px;text-align:left;border-left-style:none;">: <b>Rp. <?=number_format($setoran_final-$sum_aps_ota_loket,0,",",".");?></b></td>
</tr>
</thead>
<tbody>
    <tr>
        <td style="font-size:10px;text-align:center;"></td>
        <td colspan="14" style="font-size:10px;text-align:left;"><b></b></td>
    </tr>
</tbody>
</table>

<br /><table style="border-collapse:collapse;" width="100%" align="center" border="0">
    <tr>
        <td width="33%" align="left" style="font-size:10px;">
            <b>Sumber Data Dari :</b><br />
            <b>AP/1, AP/2, AP/3, dan AK/16</b><br />
            <b>Dibuat Rangkap 3 (tiga) :</b>
            <b>1. Lembar kesatu untuk Kantor Cabang</b>
            <b>2. Lembar kedua untuk Rekonsiliasi di Kantor Pusat</b>
            <b>3. Lembar ketiga untuk Arsip sesi Usaha</b>
        </td>
        <td width="33%" align="center" style="font-size:11px;">
            <b>MENGETAHUI :</b>
            <b></br>GENERAL MANAGER</b><br /><br /><br />
            <b></br><u><?=strtoupper($general_manager['nm_pegawai']);?></u></b>
        </td>
        <td width="33%" align="center" style="font-size:11px;">
            <b><?=strtoupper($cabang_kota)." , ".strtoupper(tgl_indo(date('Y-m-d')));?></b><br />
            <b>PEMBUAT DAFTAR</b><br /><br />
            <b><br /><u><?=strtoupper($session['nm_user']);?></u></b>
        </td>
    </tr>
</table><br/>