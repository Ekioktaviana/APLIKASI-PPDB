@extends('layouts.main')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-6">
                <a href="{{ route('admin.document') }}" class="btn btn-sm btn-primary mb-6 mt-4">Kembali</a>
            </div>
            <div class="col-6 text-right">
                
                @if ($data->status == "diterima" OR $data->status == "ditolak")
                
                @else
                    <a href="/admin/terima/{{$data->id}}" class="btn btn-success btn-sm mb-6 mt-4" onclick="return confirm('Apakah anda yakin ingin menerima siswa ini?')">Terima</a>
                    <a href="/admin/perbaiki/{{$data->id}}" class="btn btn-secondary btn-sm mb-6 mt-4" onclick="return confirm('Apakah anda yakin ingin menerima siswa ini?')">Perbaiki</a>
                    <a href="/admin/tolak/{{$data->id}}" class="btn btn-danger btn-sm mb-6 mt-4" onclick="return confirm('Apakah anda yakin ingin menolak siswa ini?')">Tolak</a>                            
                @endif
            </div>
                                                                    
        </div>
        <div class="card mt-4">
            <div class="card-header text-center">
                DOKUMEN SISWA
            </div>

            <div class="container mt-4">
                <div class="row">

                    {{-- <div class="row"> --}}
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Kartu Keluarga :</label>
                                <br>
                                <img src="{{ Storage::url($document->kk) }}" alt=""  class="img-fluid">
                            </div>
                        </div>
                        
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">AKTA Kelahiran :</label>
                                <br>
                                <img src="{{ Storage::url($document->akte) }}" alt=""  class="img-fluid">
                            </div>
                        </div>
                        
                        <div class="col-6">
                            
                            <div class="form-group">
                                <label for="">SKHUN :</label>
                                <br>
                                <img src="{{ Storage::url($document->skhun) }}" alt=""  class="img-fluid">
                            </div>
                        </div>
                        
                        <div class="col-6">
                            
                            <div class="form-group">
                                <label for="">IJAZAH :</label>
                                <br>
                                <img src="{{ Storage::url($document->ijazah) }}" alt=""  class="img-fluid">
                            </div>
                        </div>
        {{-- </div> --}}
                </div>
            </div>
        </div>
</div>
@endsection