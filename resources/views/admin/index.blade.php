@extends('layouts.main')
@section('title', 'SMK WIKRAMA 1 GARUT')

@section('content')
<div class="container">

                <div class="row">
                        <div class="col-md-12 mt-3">
                            <div class="container-fluid">

                                <!-- DataTales Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Dokumen Peserta</h6>
                                    </div>
                                    @if (session('status'))
                                        <div class="alert alert-success">
                                            {{session('status')}}
                                        </div>
                                    @endif
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>NISN</th>
                                                        <th>Nama</th>
                                                        <th>Status</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($data as $dt)
                                                    <tr class="text-center">
                                                        <td>{{$dt->nisn}}</td>
                                                        <td>{{$dt->name}}</td>
                                                        <td>
                                                        @if($dt->status=='diterima')
                                                            Lolos
                                                        @elseif($dt->status =='ditolak')
                                                            Tidak Lolos
                                                        @else
                                                            Belum ditanggapi
                                                        @endif
                                                        </td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <a href="#" class="btn btn-warning">Detail</a>
                                                                <a href="/admin/terima/{{$dt->id}}" class="btn btn-primary" onclick="return confirm('Apakah anda yakin ingin menerima siswa ini?')">Terima</a>
                                                                <a href="/admin/tolak/{{$dt->id}}" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menolak siswa ini?')">Tolak</a>                            
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.container-fluid -->
                        </div>
                </div>
               

</div>
@endsection