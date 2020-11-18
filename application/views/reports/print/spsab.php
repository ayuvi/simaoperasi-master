<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="icon" href="<?=base_url("assets/img")?>/survei.png" type="image/x-icon">
    <title>REPORT SPSAB</title>
    <?php
    $session = $this->session->userdata('login');

    $id_jadwal  = $this->input->get('id_jadwal');
    $general_manager   = $this->model_reports->general_manager($session['id_bu']);
    $sql = "select * from ms_jadwal_borongan where id_jadwal=".$id_jadwal;
    $ms_jadwal = $this->db->query($sql)->row_array();
    ?>
    <script>
        window.print();
        setTimeout(window.close,0);
    </script>
</head>
<body>
    <table style="border-collapse:collapse;" width="100%" align="center" border="0">
        <tr>
            <td width="22%" align="center" style="font-size:12px;">
            </td>
            <td width="50%" align="center" style="font-size:12px;">
                <b>PERUSAHAAN UMUM DAMRI</b><br><b>(PERUM DAMRI)</b><br />
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
            <td width="50%" align="center" style="font-size:12px;">
                <b>SURAT PERMINTAAN SEWA ANGKUTAN BORONGAN (SP-SAB)</b><br />
                NOMOR : <?=$ms_jadwal['kd_surat'];?><br />
            </td>
        </tr>
    </table><br/>
    <table style="border-collapse:collapse;" border="0" width="100%">
        <tr>
            <td style="font-size:11px;text-align: justify;">Bersama ini dengan hormat :</td>
        </tr>
        <tr><td></td></tr>
        <tr>
            <td width="22%" style="font-size:11px;text-align: justify;">Nama</td>
            <td width="1%">:</td>
            <td style="font-size:11px;text-align: justify;border-bottom:1px dotted black"><?php echo strtoupper($ms_jadwal['nama']);?></td>
        </tr>
        <tr>
            <td width="22%" style="font-size:11px;text-align: justify;">Kontak Person(HP)</td>
            <td width="1%">:</td>
            <td style="font-size:11px;text-align: justify;border-bottom:1px dotted black"><?=$ms_jadwal['kontak_person'];?></td>
        </tr>
        <tr>
            <td width="22%" style="font-size:11px;text-align: justify;">Alamat</td>
            <td width="1%">:</td>
            <td style="font-size:11px;text-align: justify;border-bottom:1px dotted black"><?=$ms_jadwal['alamat'];?></td>
        </tr>
        <tr>
            <td width="22%" style="font-size:11px;text-align: justify;">No. KTP/ SIM</td>
            <td width="1%">:</td>
            <td style="font-size:11px;text-align: justify;border-bottom:1px dotted black"><?=$ms_jadwal['no_ktp'];?></td>
        </tr>
    </table>
    <table style="border-collapse:collapse;" border="0" width="100%">
        <tr><br>
            <td style="font-size:11px;text-align: justify;">Mengajukan permintaan sewa kendaraan kepada : Perum DAMRI <?=$cabang_nama;?> Untuk melaksanakan angkutan sebagai berikut :</td>
        </tr>
        <tr><td></td></tr>
    </table>
    <table style="border-collapse:collapse;" border="0" width="100%">
        <br><tr>
            <td width="3%" style="font-size:11px;text-align: left;">1. </td>
            <td width="30%" style="font-size:11px;text-align: justify;">Jenis Kendaraan yang diperlukan</td>
            <td width="1%">:</td>
            <td style="font-size:11px;text-align: justify;border-bottom:1px dotted black"><?=$ms_jadwal['armada'];?></td>
        </tr>
        <tr>
            <td width="3%" style="font-size:11px;text-align: left;">2. </td>
            <td width="30%" style="font-size:11px;text-align: justify;">Banyaknya penumpang /  barang yang harus diangkut</td>
            <td width="1%">:</td>
            <td style="font-size:11px;text-align: justify;border-bottom:1px dotted black"><?=intval($ms_jadwal['jum_penumpang']*$ms_jadwal['target']);?> Orang</td>
        </tr>
        <tr>
            <td width="3%" style="font-size:11px;text-align: left;">3. </td>
            <td width="30%" style="font-size:11px;text-align: justify;">Untuk keperluan</td>
            <td width="1%">:</td>
            <td style="font-size:11px;text-align: justify;border-bottom:1px dotted black"><?=$ms_jadwal['keperluan'];?></td>
        </tr>
        <tr>
            <td width="3%" style="font-size:11px;text-align: left;">4. </td>
            <td width="30%" style="font-size:11px;text-align: justify;">Tempat tujuan</td>
            <td width="1%">:</td>
            <td style="font-size:11px;text-align: justify;border-bottom:1px dotted black"><?=$ms_jadwal['tujuan'];?></td>
        </tr>
        <tr>
            <td width="3%" style="font-size:11px;text-align: left;">5. </td>
            <td width="30%" style="font-size:11px;text-align: justify;">Panjang Kilometer tempuh</td>
            <td width="1%">:</td>
            <td style="font-size:11px;text-align: justify;border-bottom:1px dotted black"><?=$ms_jadwal['km_tempuh']*$ms_jadwal['target'];?>&nbsp;&nbsp;KM</td>
        </tr>
        <tr>
            <td width="3%" style="font-size:11px;text-align: left;">6. </td>
            <td width="30%" style="font-size:11px;text-align: justify;">Lama Pemakaian</td>
            <td width="1%">:</td>
            <td style="font-size:11px;text-align: justify;border-bottom:1px dotted black"><?=intval($ms_jadwal['durasi_sewa']);?></td>
        </tr>
        <tr>
            <td width="3%" style="font-size:11px;text-align: left;">7. </td>
            <td width="30%" style="font-size:11px;text-align: justify;">Tarip yang disetujui</td>
            <td width="1%">:</td>
            <td style="font-size:11px;text-align: justify;border-bottom:1px dotted black"><?=number_format($ms_jadwal['upp'],2,',','.');?></td>
        </tr>
        <tr>
            <td width="3%" style="font-size:11px;text-align: left;">8. </td>
            <td width="30%" style="font-size:11px;text-align: justify;">Kendaraan harus tersedia</td>
            <td width="1%">:</td>
            <td style="font-size:11px;text-align: justify;"></td>
        </tr>
        <tr>
            <td width="3%" style="font-size:11px;text-align: left;"></td>
            <td width="30%" style="font-size:11px;text-align: justify;">a. Dijalan / Lokasi</td>
            <td width="1%">:</td>
            <td style="font-size:11px;text-align: justify;border-bottom:1px dotted black"><?=$ms_jadwal['lokasi_pemb'];?></td>
        </tr>
        <tr>
            <td width="3%" style="font-size:11px;text-align: left;"></td>
            <td width="30%" style="font-size:11px;text-align: justify;">b. Hari / Tanggal</td>
            <td width="1%">:</td>
            <td style="font-size:11px;text-align: justify;border-bottom:1px dotted black"><?=tgl_indo($ms_jadwal['tanggal']);?></td>
        </tr>
        <tr>
            <td width="3%" style="font-size:11px;text-align: left;"></td>
            <td width="30%" style="font-size:11px;text-align: justify;">c. Jam</td>
            <td width="1%">:</td>
            <td style="font-size:11px;text-align: justify;border-bottom:1px dotted black"><?=$ms_jadwal['jam_pemb'];?></td>
        </tr>
        <tr>
            <td width="3%" style="font-size:11px;text-align: left;">9. </td>
            <td width="30%" style="font-size:11px;text-align: justify;">Uang Sewa</td>
            <td width="1%">:</td>
            <td style="font-size:11px;text-align: justify;"></td>
        </tr>
    </table>
    <table style="border-collapse:collapse;" border="0" width="100%">
        <!-- <tr>
            <td width="3%" style="font-size:11px;text-align: left;"></td>
            <td width="65%" style="font-size:11px;text-align: justify;">a. Perkendaraan Per-hari/ Per-jam (termasuk PPH 2 %)</td>
            <td style="font-size:11px;text-align: justify;">: Rp. <?=number_format($ms_jadwal['upp'],2,',','.');?></td>
        </tr> -->
       <!--  <tr>
            <td width="3%" style="font-size:11px;text-align: left;"></td>
            <td width="65%" style="font-size:11px;text-align: justify;border-bottom:1px solid black">b. PPH 2% dari jumlah uang sewa</td>
            <td style="font-size:11px;text-align: justify;border-bottom:1px solid black">: Rp. <?=number_format($persen_upp = ($ms_jadwal['upp']*0.02),2,',','.');?></td>
        </tr> -->
       <!--  <tr>
            <td width="3%" style="font-size:11px;text-align: left;"></td>
            <td width="65%" style="font-size:11px;text-align: justify;"><b>Jumlah yang harus dibayar oleh penyewa</b></td>
            <td style="font-size:11px;text-align: justify;">: <b>Rp. <?=number_format($total_jum=($ms_jadwal['upp']-$persen_upp),2,',','.');?></b></td>
        </tr> -->
         <tr>
            <td width="3%" style="font-size:11px;text-align: left;"></td>
            <td width="65%" style="font-size:11px;text-align: justify;"><b>Jumlah yang harus dibayar oleh penyewa</b></td>
            <td style="font-size:11px;text-align: justify;">: <b>Rp. <?=number_format($total_jum=($ms_jadwal['upp']),2,',','.');?></b></td>
        </tr>
        <tr>
            <td width="3%" style="font-size:11px;text-align: left;"></td>
            <td colspan="2" style="font-size:11px;text-align: justify;"><b>Terbilang  : <i>(<?=terbilang($total_jum);?> rupiah)</i></b></td>
        </tr>
    </table>
    <table style="border-collapse:collapse;" border="0" width="100%">
        <tr><br>
            <td width="3%" style="font-size:11px;text-align: left;">10. </td>
            <td colspan="2" style="font-size:11px;text-align: justify;">a. Untuk tiap permintaan sewa kendaraan harus disertai pembayaran sebesar 25% dari uang sewa seperti tersebut pada butir 9</td>
        </tr>
        <tr>
            <td width="3%" style="font-size:11px;text-align: left;"></td>
            <td colspan="2" style="font-size:11px;text-align: justify;">b. Pelunasan sisa uang sewa sebesar 75% dilaksanakan 1 (satu) hari sebelum pemberangkatan.</td>
        </tr>
        <tr>
            <td width="3%" style="font-size:11px;text-align: left;"></td>
            <td colspan="2" style="font-size:11px;text-align: justify;">c. Kelebihan pemakaian akan diperhitungkan setelah selesainya kendaraan dipergunakan dengan kelebihan tarip per jam atau harian yang sudah disetujui.</td>
        </tr>
        <tr>
            <td width="3%" style="font-size:11px;text-align: left;">11. </td>
            <td colspan="2" style="font-size:11px;text-align: justify;">Pembatalan permintaan sewa angkutan oleh penyewa, satu hari sebelum pemberangkatan dikenakan biaya administrasi 25% dari uang sewa yang tercantum dalam butir 9</td>
        </tr>
        <tr>
            <td width="3%" style="font-size:11px;text-align: left;">12. </td>
            <td colspan="2" style="font-size:11px;text-align: justify;">Biaya tol, parkir ataupun biaya penyeberangan kendaraan, berikut penumpang menjadi tanggung jawab pihak penyewa</td>
        </tr>
        <tr>
            <td width="3%" style="font-size:11px;text-align: left;">13. </td>
            <td colspan="2" style="font-size:11px;text-align: justify;">Uang sewa kendaraan yang telah disetujui oleh Perum DAMRI sesuai butir 9 pada tempat, tanggal dan jam sesuai dengan butir 8 harus dibayar oleh penyewa penuh, sekalipun kendaraan tersebut tidak dipergunakan penuh menurut waktu yang ditentukan sesuai dengan butir 7 atau tidak digunakan sama sekali oleh pihak penyewa karena satu dan lain hal yang bukan atas permintaan Perum DAMRI dan / atau bukan atas kesalahan dipihak Perum DAMRI.</td>
        </tr>
        <tr>
            <td width="3%" style="font-size:11px;text-align: left;">14. </td>
            <td colspan="2" style="font-size:11px;text-align: justify;">Keterangan lain-lain : ................</td>
        </tr>
    </table>
    <table width="100%" align="center" cellspacing="0" style="font-size:11px">
        <tr><br><br>
            <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td align="center" valign="top"><br>Menyetujui <br>General Manager<br><br><br><br></td>
            <td align="center" valign="top"><?=$cabang_kota." ,".tgl_indo($ms_jadwal['tanggal']);?> <br>Kami Yang Mengajukan Permintaan<br>Sewa Angkutan Borongan<br><br><br><br></td>
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
            <td align="center"><u><b><?=$general_manager["nm_pegawai"];?></b></u><br>NIK. <?=$general_manager["nik_pegawai"];?></td>
            <td align="center"><u><b><?=$ms_jadwal['nama'];?></b></u></td>
        </tr>
    </table>


    <table style="border-collapse:collapse;" border="0" width="100%" style="font-size: 10px">
        <tr><br><br>
            <td colspan="3" style="font-size:11px;text-align: justify;">1.  Setiap satu SP-SAB (AK/16) untuk satu kendaraan.</td>
        </tr>
        <tr>
            <td colspan="3" style="font-size:11px;text-align: justify;">2.  Lembar pertama Putih (asli) untuk lampiran AP/2 (LMB/LMT) kendaraan yang mengangkut.</td>
        </tr>
        <tr>
           <td colspan="3" style="font-size:11px;text-align: justify;">3.  Lembar kedua Kuning untuk penyewa.</td>
       </tr>
       <tr>
           <td colspan="3" style="font-size:11px;text-align: justify;">4.  Lembar ketiga Biru untuk arsip di seksi/ bagian TU Keuangan.</td>
       </tr>
   </table>
</body>
</html>
