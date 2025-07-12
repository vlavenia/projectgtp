<table border="1" cellspacing="0" cellpadding="4">
    <!-- Header metadata -->
    <tr><td colspan="21" align="center"><strong>LAPORAN ACCOUNT USER - TAHUN ANGGARAN 2024</strong></td></tr>
    <tr><td colspan="3"><strong>OPD</strong></td><td colspan="18">123.1.1. - BALAI LAYANAN PERPUSTAKAAN (INDUK)</td></tr>
    <tr><td colspan="3"><strong>KABUPATEN</strong></td><td colspan="18">DAERAH ISTIMEWA YOGYAKARTA</td></tr>
    <tr><td colspan="3"><strong>PROVINSI</strong></td><td colspan="18">D.I. YOGYAKARTA</td></tr>
    <tr><td colspan="3"><strong>KLASIFIKASI</strong></td><td colspan="18">{{ $information['klasifikasi'] }}</td></tr>
    <tr><td colspan="3"><strong>TRIWULAN</strong></td><td colspan="18">TRIWULAN IV</td></tr>
    <tr><td colspan="3"><strong>NO KODE LOKASI</strong></td><td colspan="18">12.000.12.04.120101.00000.00000000</td></tr>

    <!-- Header tabel -->
    <tr>
        <th style="border: 1px solid black;" ><strong>No</strong></th>
        <th style="border: 1px solid black;" ><strong>Nama</strong></th>
        <th style="border: 1px solid black;" ><strong>Role</strong></th>
        <th style="border: 1px solid black;" ><strong>created_at</strong></th>
    </tr>

    <!-- Baris kategori (gunakan strong agar bold di Excel) -->
    <!-- Baris data utama -->
    @foreach($users as $user)
    <tr>
        <td style="border: 1px solid black;">{{ $loop->iteration }}</td>  <!-- Angka -->
        <td style="border: 1px solid black;">{{ $user->name }}</td> <!-- Nama barang -->
        <td style="border: 1px solid black;">{{ $user->role_name }}</td> <!-- Kode barang -->
        <td style="border: 1px solid black;"> {{ $user->created_at }} </td> <!-- No Register -->
      
    </tr>
    @endforeach

</table>

