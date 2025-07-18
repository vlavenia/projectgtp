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


<table  cellspacing="0" cellpadding="4">
    <!-- Header metadata -->

    <tr>
        <td colspan="17" style="font-family: Arial; font-size: 8pt; text-align: center;"><strong>LAPORAN INVENTARIS PEMINJAMAN (KIB) B</strong></td>
      </tr>
      <tr>
        <td colspan="17"  style="font-family: Arial; font-size: 8pt;text-align: center;">
          <strong>PERALATAN DAN MESIN</strong>
        </td>
    </tr>
    <tr>
        <td colspan="17"  style="font-family: Arial; font-size: 8pt;text-align: center;">
            <strong>2025</strong>
        </td>
    </tr>

    <tr>
        <td  style=" height: 41.3px; ">
          <strong> </strong>
        </td>
      </tr>
    <tr><td colspan="3" style="font-family: Arial; font-size: 8pt;"><strong>OPD</strong></td><td colspan="18">  1.23.01.01.00.000 - BALAI LAYANAN PERPUSTAKAAN</td></tr>
    <tr><td colspan="3" style="font-family: Arial; font-size: 8pt;"><strong>KABUPATEN</strong></td><td colspan="18">DAERAH ISTIMEWA YOGYAKARTA</td></tr>
    <tr><td colspan="3" style="font-family: Arial; font-size: 8pt;" ><strong>PROVINSI</strong></td><td colspan="18">D.I. YOGYAKARTA</td></tr>
    <tr><td colspan="3" style="font-family: Arial; font-size: 8pt;"><strong>KLASIFIKASI</strong></td><td colspan="18">{{ $information['klasifikasi'] }}</td></tr>
    <tr>
        <td  style=" height: 8.3px; ">
          <strong> </strong>
        </td>
      </tr>

    {{-- <tr><td colspan="3" style="font-family: Arial; font-size: 8pt;"><strong>KLASIFIKASI</strong></td><td colspan="18">{{ $information['klasifikasi'] }}</td></tr>
    <tr><td colspan="3" style="font-family: Arial; font-size: 8pt;"><strong>TRIWULAN</strong></td><td colspan="18">TRIWULAN IV</td></tr>
    <tr><td colspan="3" style="font-family: Arial; font-size: 8pt;"><strong>NO KODE LOKASI</strong></td><td colspan="18">12.000.12.04.120101.00000.00000000</td></tr> --}}

    <!-- Header tabel -->
    <tr>
        <th style="border: 1px solid black; width: 30px; " rowspan="2"><strong>No</strong></th>
        <th style="border: 1px solid black; word-wrap: break-word; text-align: center; vertical-align: middle;" rowspan="2" colspan="2"><strong>Jenis Barang/ Nama Barang</strong></th>
        <th style="border: 1px solid black; text-align: center; vertical-align: middle; " rowspan="2" colspan="2"><strong>Kode_barang</strong></th>
        <th style="border: 1px solid black; text-align: center; vertical-align: middle; " rowspan="2" colspan="2"><strong>Register</strong></th>
        <th style="border: 1px solid black; width: 70px;" rowspan="2"><strong>Merk/Type</strong></th>
        <th style="border: 1px solid black;" rowspan="2"><strong>Bahan</strong></th>
        <th style="border: 1px solid black; word-wrap: break-word; width: 70px;" rowspan="2" ><strong>Tahun Pembelian</strong></th>
        <th style="border: 1px solid black; text-align: center;" colspan="5" ><strong>Nomor</strong></th>
        <th style="border: 1px solid black;" rowspan="2"><strong>Asal Usul</strong></th>
        <th style="border: 1px solid black;" rowspan="2"><strong>Harga (Rp)</strong></th>
        <th style="border: 1px solid black;" rowspan="2"><strong>Keterangan</strong></th>
        <th style="border: 1px solid black;" rowspan="2"><strong>OPD</strong></th>
    </tr>
    <tr>
        <th style="border: 1px solid black;"><strong>Pabrik</strong></th>
        <th style="border: 1px solid black;"><strong>Rangka</strong></th>
        <th style="border: 1px solid black;"><strong>Mesin</strong></th>
        <th style="border: 1px solid black;"><strong>Polisi</strong></th>
        <th style="border: 1px solid black;"><strong>BPKB</strong></th>
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
        <td style="border: 1px solid black;vertical-align: middle;">{{ $loop->iteration }}</td>  <!-- Angka -->
        <td style="border: 1px solid black;text-align: center;word-wrap: break-word; vertical-align: middle;" colspan="2">{{ $asset->nama_barang }}</td> <!-- Nama barang -->
        <td style="border: 1px solid black;text-align: center; word-wrap: break-word;vertical-align: middle;"colspan="2">{{ $asset->kode_barang }}</td> <!-- Kode barang -->
        <td style="border: 1px solid black;text-align: center;word-wrap: break-word; vertical-align: middle;"colspan="2"> {{ $asset->no_register }} </td> <!-- No Register -->
        <td style="border: 1px solid black;text-align: center;word-wrap: break-word; vertical-align: middle;"> {{ $asset->merk }} </td> <!-- Judul/Pencipta -->
        <td style="border: 1px solid black; text-align: center;word-wrap: break-word; vertical-align: middle;"> {{ $asset->bahan }} </td> <!-- Bahan -->
        <td style="border: 1px solid black; text-align: center;word-wrap: break-word; vertical-align: middle;"> {{ $asset->thn_pmbelian }} </td> <!-- Tahun Cet -->
        <td style="border: 1px solid black; text-align: center;word-wrap: break-word; vertical-align: middle;"> {{ $asset->pabrik }} </td> <!-- Spesifikasi -->
        <td style="border: 1px solid black; text-align: center;word-wrap: break-word; vertical-align: middle;"> {{ $asset->rangka }} </td> <!-- Asal Daerah -->
        <td style="border: 1px solid black; text-align: center;word-wrap: break-word; vertical-align: middle;"> {{ $asset->mesin }} </td> <!-- Pencipta -->
        <td style="border: 1px solid black; text-align: center;word-wrap: break-word; vertical-align: middle;"> {{ $asset->polisi }} </td> <!-- Jenis -->
        <td style="border: 1px solid black; text-align: center;word-wrap: break-word; vertical-align: middle; width: 3cm;"> {{ $asset->bpkb }} </td> <!-- Asal usul -->
        <td style="border: 1px solid black;  text-align: center; word-wrap: break-word;vertical-align: middle;"> {{ isset($asset->asal->asal_asset) ? $asset->asal->asal_asset : ''}} </td> <!-- Harga -->
        <td style="border: 1px solid black; width: 2cm;"> {{ $asset->harga }} </td> <!-- Deskripsi barang -->
        <td style="border: 1px solid black; width: 2cm;  word-wrap: break-word; text-align: center; vertical-align: middle;"> {{ $asset->keterangan }} </td> <!-- Ket -->
        <td style="border: 1px solid black;width: 3cm; word-wrap: break-word; text-align: center; vertical-align: middle;"> {{ $asset->opd }} </td> <!-- Unit Kerja -->
        {{-- <td style="border: 1px solid black;"> - </td> <!-- NIBAR --> --}}
    </tr>
    @endforeach

    {{-- <!-- Total -->
    <tr>
        <td style="border: 1px solid black;" colspan="13" align="center"><strong>Total</strong></td>
        <td style="border: 1px solid black;"><strong>
            @php echo($total_harga)
            @endphp
        </strong></td>
        <td style="border: 1px solid black;" colspan="5"></td>
    </tr> --}}
</table>

