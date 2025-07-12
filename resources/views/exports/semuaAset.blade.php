<!-- <table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Kode</th>
    </tr>
    </thead>
    <tbody>
    @foreach($assets as $aset)
        <tr>
            <td style="border: 1px solid black;">{{ $aset->nama_barang }}</td>
            <td style="border: 1px solid black;">{{ $aset->kode_barang }}</td>
        </tr>
    @endforeach
    </tbody>
</table> -->


<table border="1" cellspacing="0" cellpadding="4">
    <!-- Header metadata -->
    <tr><td colspan="21" align="center"><strong>KARTU INVENTARIS BARANG (KIB) ATB - ASET TIDAK BERWUJUD - TAHUN ANGGARAN 2024</strong></td></tr>
    <tr><td colspan="3"><strong>OPD</strong></td><td colspan="18">123.1.1. - BALAI LAYANAN PERPUSTAKAAN (INDUK)</td></tr>
    <tr><td colspan="3"><strong>KABUPATEN</strong></td><td colspan="18">DAERAH ISTIMEWA YOGYAKARTA</td></tr>
    <tr><td colspan="3"><strong>PROVINSI</strong></td><td colspan="18">D.I. YOGYAKARTA</td></tr>
    <tr><td colspan="3"><strong>KLASIFIKASI</strong></td><td colspan="18">{{ $information['klasifikasi'] }}</td></tr>
    <tr><td colspan="3"><strong>TRIWULAN</strong></td><td colspan="18">TRIWULAN IV</td></tr>
    <tr><td colspan="3"><strong>NO KODE LOKASI</strong></td><td colspan="18">12.000.12.04.120101.00000.00000000</td></tr>

    <!-- Header tabel -->
    <tr>
        <th style="border: 1px solid black;" rowspan="2"><strong>No</strong></th>
        <th style="border: 1px solid black;" rowspan="2"><strong>Jenis Barang /<br>Nama Barang</strong></th>
        <th style="border: 1px solid black;" colspan="2"><strong>Nomor</strong></th>
        <th style="border: 1px solid black;" colspan="2"><strong>Buku Perpustakaan</strong></th>
        <th style="border: 1px solid black;" colspan="3"><strong>Barang Bercorak Kesenian / Kebudayaan</strong></th>
        <th style="border: 1px solid black;" colspan="2"><strong>Hewan Ternak dan Tumbuhan</strong></th>
        <th style="border: 1px solid black;" rowspan="2"><strong>Tahun Cetak / Pembelian</strong></th>
        <th style="border: 1px solid black;" rowspan="2"><strong>Asal Usul</strong></th>
        <th style="border: 1px solid black;" rowspan="2"><strong>Harga (Rp)</strong></th>
        <th style="border: 1px solid black;" rowspan="2"><strong>Deskripsi Barang</strong></th>
        <th style="border: 1px solid black;" rowspan="2"><strong>Kondisi (B,KB,RR,B)</strong></th>
        <th style="border: 1px solid black;" rowspan="2"><strong>Ket</strong></th>
        <th style="border: 1px solid black;" rowspan="2"><strong>Unit Kerja</strong></th>
        <th style="border: 1px solid black;" rowspan="2"><strong>NIBAR</strong></th>
    </tr>
    <tr>
        <th style="border: 1px solid black;"><strong>Kode Barang</strong></th>
        <th style="border: 1px solid black;"><strong>Register</strong></th>
        <th style="border: 1px solid black;"><strong>Judul / Pencipta</strong></th>
        <th style="border: 1px solid black;"><strong>Spesifikasi</strong></th>
        <th style="border: 1px solid black;"><strong>Asal Daerah</strong></th>
        <th style="border: 1px solid black;"><strong>Pencipta</strong></th>
        <th style="border: 1px solid black;"><strong>Bahan</strong></th>
        <th style="border: 1px solid black;"><strong>Jenis</strong></th>
        <th style="border: 1px solid black;"><strong>Ukuran</strong></th>
    </tr>

    <!-- Baris kategori (gunakan strong agar bold di Excel) -->
    @php $total_harga = 0
    @endphp
    @foreach ($assets as $asset)
    @php $total_harga += $asset->harga
    @endphp
    @php
        $kode_pecahan = explode('.', $asset->kode_barang);
    @endphp
    

    <!-- Baris data utama -->
    <tr>
        <td style="border: 1px solid black;">{{ $loop->iteration }}</td>  <!-- Angka -->
        <td style="border: 1px solid black;">{{ $asset->nama_barang }}}}</td> <!-- Nama barang -->
        <td style="border: 1px solid black;">{{ $asset->kode_barang }}</td> <!-- Kode barang -->
        <td style="border: 1px solid black;"> {{ $asset->no_register }} </td> <!-- No Register -->
        <td style="border: 1px solid black;"> {{ $asset->merk }} </td> <!-- Judul/Pencipta -->
        <td style="border: 1px solid black;"> {{ $asset->objek_nama }} </td> <!-- Spesifikasi -->
        <td style="border: 1px solid black;"> {{ $asset->asal_nama }} </td> <!-- Asal Daerah -->
        <td style="border: 1px solid black;"> {{ $asset->merk }} </td> <!-- Pencipta -->
        <td style="border: 1px solid black;"> {{ $asset->bahan }} </td> <!-- Bahan -->
        <td style="border: 1px solid black;"> {{ $asset->jenis_nama }} </td> <!-- Jenis -->
        <td style="border: 1px solid black;"> - </td> <!-- Ukuran -->
        <td style="border: 1px solid black;"> {{ $asset->thn_pembelian }} </td> <!-- Tahun Cet -->
        <td style="border: 1px solid black;"> {{ $asset->unit_nama }} </td> <!-- Asal usul -->
        <td style="border: 1px solid black;"> {{ $asset->harga }} </td> <!-- Harga -->
        <td style="border: 1px solid black;"> {{ $asset->deskripsi_brg }} </td> <!-- Deskripsi barang -->
        <td style="border: 1px solid black;"> - </td> <!-- Kondisi (B,KB,RR,B) -->
        <td style="border: 1px solid black;"> {{ $asset->keterangan }} </td> <!-- Ket -->
        <td style="border: 1px solid black;"> {{ $asset->opd }} </td> <!-- Unit Kerja -->
        <td style="border: 1px solid black;"> - </td> <!-- NIBAR -->
    </tr>
    @endforeach

    <!-- Total -->
    <tr>
        <td style="border: 1px solid black;" colspan="13" align="center"><strong>Total</strong></td>
        <td style="border: 1px solid black;"><strong> 
            @php echo($total_harga) 
            @endphp
        </strong></td>
        <td style="border: 1px solid black;" colspan="5"></td>
    </tr>
</table>

