<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="icon" href="<?=base_url("assets/img")?>/survei.png" type="image/x-icon">
    <title>REPORT AP/1 BORONGAN</title>
    <?php
    $session = $this->session->userdata('login');

    $id_jadwal  = $this->input->get('id_jadwal');
    $id_jadwal  = $this->input->get('id_jadwal');

    $general_manager   = $this->model_reports->general_manager($session['id_bu']);
    $sql = "select a.*,b.nm_pegawai as pengemudi1, c.nm_pegawai as pengemudi2 
    from ms_jadwal_borongan a 
    left join hris.ref_pegawai b on a.driver1=b.id_pegawai
    left join hris.ref_pegawai c on a.driver2=c.id_pegawai
    where id_jadwal=".$id_jadwal;
    $ms_jadwal = $this->db->query($sql)->row_array();
    ?>
    <script>
        // window.print();
        // setTimeout(window.close,0);
    </script>
</head>
<body>
    <table style="border-collapse:collapse;" width="100%" align="center" border="0">
        <tr>
            <td width="22%" align="center" style="font-size:12px;">
            </td>
            <td width="50%" align="center" style="font-size:12px;"></td>
            <td width="20%" align="center" style="font-size:18px;">
                <img src="<?=base_url('assets/img/logos.png');?>" alt="Perum DAMRI" height="20" width="100">
            </td>
        </tr>
    </table><br/>
    <table style="border-collapse:collapse;" width="100%" border="0">
      <tr>
        <td width="70%" style="font-size:12px;">
            <b>PERUSAHAAN UMUM "DAMRI"</b><br/>
            <b>PERUM DAMRI</b><br/>
            <b>KANTOR CABANG <?=strtoupper($cabang_nama);?></b><br/>
            <b>ALAMAT : ...........................</b><br/>
            <b>TELP : ............. FAX : .........</b><br/>
        </td>
        <td width="30%" style="font-size:12px;">
            <b>AP / 1 UNTUK ANGKUTAN BORONGAN</b><br/>
            <b>NO :           /   </b><br/>
        </td>
    </tr>
</table>
<table style="border-collapse:collapse;" width="100%" border="0">
 <tr>
    <td width="1%" style="font-size:12px;"></td>
    <td colspan="2" width="50%" align="center" style="font-size:12px;">
        <u><b>SURAT PERINTAH DINAS ANGKUTAN </b></u>
    </td>
</tr>
</table>
<table style="border-collapse:collapse;" width="100%" border="0">
    <tr><br><br>
        <td width="1%" style="font-size:12px;">1. </td>
        <td width="30%" style="font-size:12px;">Nama Pengemudi / Pembantu Pengemudi</td>
        <td style="font-size:12px;border-bottom:1px dotted black">: <?=$ms_jadwal['pengemudi1']." / ".$ms_jadwal['pengemudi2'];?></td>
    </tr>
    <tr>
        <td width="1%" style="font-size:12px;">2. </td>
        <td width="30%" style="font-size:12px;">Nomor Polisi / Body Bus</td>
        <td style="font-size:12px;border-bottom:1px dotted black">: <?=$ms_jadwal['armada'];?></td>
    </tr>
    <tr>
        <td width="1%" style="font-size:12px;">3. </td>
        <td width="30%" style="font-size:12px;">P e m a k a i</td>
        <td style="font-size:12px;border-bottom:1px dotted black">: <?=$ms_jadwal['nama'];?></td>
    </tr>
    <tr>
        <td width="1%" style="font-size:12px;">4. </td>
        <td width="30%" style="font-size:12px;">T u j u a n</td>
        <td style="font-size:12px;border-bottom:1px dotted black">: <?=$ms_jadwal['asal']." - ".$ms_jadwal['tujuan'];?></td>
    </tr>
    <tr>
        <td width="1%" style="font-size:12px;">5. </td>
        <td width="30%" style="font-size:12px;">Kendaraan Siap di</td>
        <td style="font-size:12px;border-bottom:1px dotted black">: <?=$ms_jadwal['lokasi_pemb'];?></td>
    </tr>
    <tr>
        <td width="1%" style="font-size:12px;"></td>
        <td width="30%" style="font-size:12px;"></td>
        <td style="font-size:12px;border-bottom:1px dotted black">: </td>
    </tr>
    <tr>
        <td width="1%" style="font-size:12px;">6. </td>
        <td width="30%" style="font-size:12px;">Nomor SPSAB</td>
        <td style="font-size:12px;border-bottom:1px dotted black">: <?=$ms_jadwal['kd_surat'];?></td>
    </tr>
    <tr>
        <td width="1%" style="font-size:12px;">7. </td>
        <td width="30%" style="font-size:12px;">Berangkat Tanggal</td>
        <td style="font-size:12px;border-bottom:1px dotted black">: <?=$ms_jadwal['tanggal'];?></td></td>
    </tr>
    <tr>
        <td width="1%" style="font-size:12px;">8. </td>
        <td width="30%" style="font-size:12px;">Kembali Tanggal</td>
        <td style="font-size:12px;border-bottom:1px dotted black">: <?php 
            $count_hari = '+'.intval($ms_jadwal['durasi_sewa']-1).' days';
            echo date('Y-m-d', strtotime($count_hari, strtotime($ms_jadwal['tanggal'])));;?></td></td>
        </tr>
    </table>


    <table width="100%" align="center" cellspacing="0" style="font-size:12px">
        <tr><br><br>
            <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td align="center" valign="top"><br><b>Tanda Tangan Pemakai</b><br><br><br><br></td>
            <td align="center" valign="top"><?=$cabang_kota." ,".tgl_indo($ms_jadwal['tanggal']);?> <br><b>General Manager</b><br><br><br><br></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td align="center"><u><b><?=$ms_jadwal['nama'];?></b></u><br></td>
            <td align="center"><u><b><?=$general_manager["nm_pegawai"];?></b></u><br>NIK. <?=$general_manager["nik_pegawai"];?></td>
        </tr>
    </table>

</body>
</html>
