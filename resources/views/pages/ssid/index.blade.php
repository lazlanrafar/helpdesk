@extends('layouts.app') @section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>SSID</h1>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @include('includes.error-card')
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a type="button" class="btn btn-warning" data-toggle="modal" data-target="#formCreate"><i
                                    class="fa fa-plus"></i> Tambah</a>
                            @include('pages.ssid.create')
                            <table id="defaultTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Password</th>
                                        <th>Jenis</th>
                                        <th>Keterangan</th>
                                        <th>Lokasi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($items as $item)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $item->nama_ssid }}</td>
                                            <td>{{ $item->pwd_ssid }}</td>
                                            <td>{{ $item->jenis_ssid }}</td>
                                            <td>{{ $item->keterangan }}</td>
                                            <td>
                                                {{ $item->lokasi->nama_lokasi ?? '' }},
                                                {{ $item->lokasi->unit ?? '' }},
                                                {{ $item->lokasi->sublokasi ?? '' }}
                                            </td>
                                            <td>
                                                <a type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#dialogDelete{{ $item->id }}">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                                <div class="modal fade" id="dialogDelete{{ $item->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="dialogDelete{{ $item->id }}Label"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Konfirmasi Delete
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">
                                                                    Close
                                                                </button>
                                                                <form action="{{ route('ssid.destroy', $item->id) }}"
                                                                    method="POST" class="d-inline">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="submit" class="btn btn-primary">
                                                                        Konfirmasi
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a type="button" class="btn btn-warning" data-toggle="modal"
                                                    data-target="#formUpdate{{ $item->id }}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                        @include('pages.ssid.update')
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
