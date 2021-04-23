@extends('layouts.main')

@section('title', 'SMK WIKRAMA 1 GARUT')

@section('content')
<div class="container">
                @csrf
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
                                            <table class="table table-bordered" id="example" width="100%" cellspacing="0">
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
                                                        {{-- <td> --}}
                                                        @if($dt->status=='diterima')
                                                            <td bgcolor="#33cc66">
                                                                <b> Lolos</b>
                                                            </td>
                                                        @elseif($dt->status =='ditolak')
                                                        <td bgcolor="#cb343a">
                                                            <b> Tidak Lolos </b>
                                                        </td>
                                                        @elseif ($dt->status == 'perbaiki')
                                                        <td bgcolor="#757a8a">
                                                            <b> Dalam Perbaikan </b>
                                                        </td>
                                                        @else
                                                        <td>
                                                            Belum ditanggapi
                                                        </td>
                                                        @endif
                                                        {{-- </td> --}}
                                                        <td>
                                                            <div class="btn-group">
                                                                {{-- <a href="/admin/detail/{{ $dt->id }}" class="btn btn-secondary btn-sm">Detail</a> --}}
                                                                {{-- @if ($dt->status=='belum')
                                                                <a href="/admin/terima/{{$dt->id}}" class="btn btn-primary btn-sm" onclick="return confirm('Apakah anda yakin ingin menerima siswa ini?')">Terima</a>
                                                                <a href="/admin/tolak/{{$dt->id}}" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menolak siswa ini?')">Tolak</a>                            
                                                                
                                                                @endif --}}
                                                                    {{-- @if (sizeof($data) >= 1) --}}
                                                                        <a href="{{ route('admin.show',$dt->id)}}" class="btn btn-secondary btn-sm">Detail</a>
                                                                        
                                                                    {{-- @endif --}}
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

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
@endsection