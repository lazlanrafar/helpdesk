@extends('layouts.app') @section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Laporan</h1>
                </div>
                <div class="col-sm-6">
                    <a href="/laporan/print-qrcode/{{ $from_date == '' ? '-' : $from_date }}/{{ $end_date == '' ? '-' : $end_date }}"
                        target="_BLANK" class="btn btn-primary float-sm-right">
                        <i class="fas fa-print"></i>
                        Print QRCode
                    </a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
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
                            <form action="/laporan" method="POST" class="mb-5">
                                @csrf
                                <div class="row align-items-end justify-content-center justify-content-md-start mb-md-3">
                                    <div class="col-12 col-md-4 col-lg-3">
                                        <div class="form-group mb-md-0">
                                            <label for="">Dari Tanggal</label>
                                            <input type="date" class="form-control" name="from_date" required
                                                id="dari_tanggal" value="{{ $from_date }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-3">
                                        <div class="form-group mb-md-0">
                                            <label for="">Sampai Tanggal</label>
                                            <input type="date" class="form-control" name="end_date" required
                                                id="sampai_tanggal" value="{{ $end_date }}">
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-2 col-lg-1 mb-3 mb-md-0">
                                        <button type="submit" class="btn btn-primary w-100">Filter</button>
                                    </div>
                                    <div class="col-6 col-md-2 col-lg-1 mb-3 mb-md-0">
                                        <a href="/laporan" class="btn btn-danger w-100">reset</a>
                                    </div>
                                </div>
                            </form>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Aset</th>
                                        <th>Nama Brand</th>
                                        <th>Jenis Brand</th>
                                        <th>Jenis Aset</th>
                                        <th>Tanggal Inventaris</th>
                                        <th>Lokasi</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($list_ap as $item)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $item->idap }}</td>
                                            <td>{{ $item->brand->nama_brand }}</td>
                                            <td>{{ $item->brand->tipe_brand }}</td>
                                            <td>Access Point</td>
                                            <td>{{ $item->tgl_inventaris }}</td>
                                            <td>
                                                {{ $item->lokasi->nama_lokasi }}, {{ $item->lokasi->unit }}, {{ $item->lokasi->sublokasi }}
                                            </td>
                                            <td>{{ $item->keterangan }}</td>
                                        </tr>
                                        <?php $i++; ?>
                                    @endforeach
                                    @foreach ($list_hardware as $item)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $item->idhardware }}</td>
                                            <td>{{ $item->brand->nama_brand }}</td>
                                            <td>{{ $item->brand->tipe_brand }}</td>
                                            <td>{{ $item->jenis_hardware }}</td>
                                            <td>{{ $item->tgl_inventaris }}</td>
                                            <td>
                                                {{ $item->lokasi->nama_lokasi }}, {{ $item->lokasi->unit }}, {{ $item->lokasi->sublokasi }}
                                            </td>
                                            <td>{{ $item->keterangan }}</td>
                                        </tr>
                                        <?php $i++; ?>
                                    @endforeach
                                    @foreach ($list_switch as $item)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $item->idswitch }}</td>
                                            <td>{{ $item->brand->nama_brand }}</td>
                                            <td>{{ $item->brand->tipe_brand }}</td>
                                            <td>Switch</td>
                                            <td>{{ $item->tgl_inventaris }}</td>
                                            <td>
                                                {{ $item->lokasi->nama_lokasi }}, {{ $item->lokasi->unit }}, {{ $item->lokasi->sublokasi }}
                                            </td>
                                            <td>{{ $item->keterangan }}</td>
                                        </tr>
                                        <?php $i++; ?>
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
