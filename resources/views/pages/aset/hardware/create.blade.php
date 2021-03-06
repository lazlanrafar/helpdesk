<!-- Modal -->
<div class="modal fade" id="formCreate" tabindex="-1" role="dialog" aria-labelledby="formCreateLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{ route('hardware.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="formCreateLabel">
                        Tambah Aset - Hardware
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <label for="lokasi">Lokasi</label>
                            <select class="form-control" id="lokasi" name="idlok" required>
                                <option value="" selected>-- pilih lokasi --</option>
                                @foreach ($list_lokasi as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->nama_lokasi }},
                                        {{ $item->unit }},
                                        {{ $item->sublokasi }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="brand">Brand</label>
                            <select class="form-control" id="brand" name="idbrand" required>
                                <option value="" selected>-- pilih brand --</option>
                                @foreach ($list_brand as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->nama_brand }}
                                        {{ $item->tipe_brand }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="jenis-hardware">Jenis Hardware</label>
                            <select class="form-control" id="jenis-hardware" name="jenis_hardware" required>
                                <option value="" selected>-- pilih jenis --</option>
                                @foreach ($list_jenis as $jenis)
                                    <option value="{{ $jenis }}">
                                        {{ $jenis }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="koneksi">koneksi</label>
                            <input type="text" class="form-control" id="koneksi" placeholder="Enter koneksi"
                                name="koneksi" required />
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="ipaddress">IP Address</label>
                            <input type="text" class="form-control" id="ipaddress" placeholder="Enter ipaddress"
                                name="ipaddress" />
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="computer_name">Computer Name</label>
                            <input type="text" class="form-control" id="computer_name"
                                placeholder="Enter Computer Name" name="computer_name" />
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="sharing">Sharing</label>
                            <select name="sharing" id="sharing" class="form-control">
                                <option value="Ya">Ya</option>
                                <option value="Tidak">Tidak</option>
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="tgl_inventaris">Tanggal Inventaris</label>
                            <input type="date" class="form-control" id="tgl_inventaris"
                                placeholder="Enter Tanggal Inventaris" name="tgl_inventaris" required />
                        </div>
                        <div class="form-group col-12">
                            <label for="keterangan">Keterangan</label>
                            <textarea type="text" class="form-control" id="keterangan" placeholder="Enter keterangan" name="keterangan" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-warning">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
