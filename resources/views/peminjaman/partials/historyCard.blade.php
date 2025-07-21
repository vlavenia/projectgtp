<table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
    <thead class="text-center">
        <tr>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Merk</th>
            <th>BPKB</th>
            <th>Polisi</th>
            <th>Waktu Pengembalian</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody class="text-center">
        @forelse ($asset_pengembalian as $asset)
            <tr>
                <td>{{ $asset->kode_barang }}</td>
                <td>{{ $asset->nama_barang }}</td>
                <td>{{ $asset->merk }}</td>
                <td>{{ $asset->bpkb }}</td>
                <td>{{ $asset->polisi }}</td>
                <td>{{ $asset->tgl_pengembalian }}</td>
                            <td>
                    @if ($asset->status == 'request')
                        <span class="bg-warning px-2 rounded text-white">Menunggu</span>
                    @elseif($asset->status == 'approve')
                        <span class="bg-success px-2 rounded text-white">Distujui</span>
                    @elseif($asset->status == 'approve_return')
                        <span class="bg-primary px-2 rounded text-white">Dikembalikan</span>
                    @elseif($asset->status == 'reject')
                        <span class="bg-danger px-2 rounded text-white">Ditolak</span>
                    @endif
                </td>
                <td>
                    <div class="d-flex justify-content-center">
                        <i class="btn far fa-eye" data-toggle="modal"
                            data-target="#detailModal-{{ $asset->id }}"></i>
                        @if ($asset->status == 'request')
                            <form action="{{ route('assets.destroy.peminjaman', $asset->peminjaman_id) }}"
                                method="POST" onsubmit="return confirm('ga jadi pinjam?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn fas fa-trash-alt"></button>
                            </form>
                        @elseif ($asset->status == 'approve')
                            <form action="{{ route('ReturnPeminjaman', $asset->peminjaman_id) }}" method="POST"
                                onsubmit="return confirm('Kembalikan Aset?')">
                                @csrf
                                <button class="btn fas fa-check-circle "></button>
                            </form>
                        @endif


                    </div>
                </td>
            </tr>

            <!-- Modal Detail -->
            <div class="modal fade" id="detailModal-{{ $asset->id }}" tabindex="-1" role="dialog"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Detail Pengajuan Barang <strong>{{ $asset->nama_barang }}</strong></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row mb-4">
                                <div class="col-12 text-center">
                                    <img src="{{ $asset->img_url }}" alt="Gambar Barang" class="img-fluid rounded"
                                        style="max-height: 200px;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><strong>Kode Barang:</strong>
                                            {{ $asset->kode_barang }}</li>
                                        <li class="list-group-item"><strong>Nama Barang:</strong>
                                            {{ $asset->nama_barang }}</li>
                                        <li class="list-group-item"><strong>No Register:</strong>
                                            {{ $asset->no_register }}</li>
                                        <li class="list-group-item"><strong>Merk:</strong>
                                            {{ $asset->merk }}</li>
                                        <li class="list-group-item"><strong>Bahan:</strong>
                                            {{ $asset->bahan }}</li>
                                        <li class="list-group-item"><strong>Tahun Pembelian:</strong>
                                            {{ $asset->thn_pmbelian }}</li>
                                        <li class="list-group-item"><strong>Pabrik:</strong>
                                            {{ $asset->pabrik }}</li>
                                        <li class="list-group-item"><strong>Rangka:</strong>
                                            {{ $asset->rangka }}</li>
                                    </ul>
                                </div>


                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><strong>Mesin:</strong>
                                            {{ $asset->mesin }}</li>
                                        <li class="list-group-item"><strong>Polisi:</strong>
                                            {{ $asset->polisi }}</li>
                                        <li class="list-group-item"><strong>BPKB:</strong>
                                            {{ $asset->bpkb }}</li>
                                        <li class="list-group-item"><strong>Asal:</strong>
                                            {{ $asset->asal->asal_asset ?? 'belum ada data asal' }}</li>
                                        <li class="list-group-item"><strong>Harga:</strong>
                                            {{ $asset->harga }}</li>
                                        <li class="list-group-item"><strong>Deskripsi Barang:</strong>
                                            {{ $asset->deskripsi_brg }}</li>
                                        <li class="list-group-item"><strong>Keterangan:</strong>
                                            {{ $asset->keterangan }}</li>
                                        <li class="list-group-item"><strong>OPD:</strong>
                                            {{ $asset->opd }}</li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Modal Detail -->
        @empty
            <tr>
                <td colspan="14">Saat ini tidak ada peminjaman yang diajukan</td>
            </tr>
        @endforelse
    </tbody>
</table>
<div class="mt-3">
    {{ $asset_pengembalian->links() }}
</div>
