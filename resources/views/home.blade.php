@extends('layouts.main')

@section('content')
<div class="container">
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Silahkan isi data dokumen anda <a href="{{route('user.create')}}">disini</a></p>
                </div>
            </div>
        </div>
    </div> --}}
    @if (sizeof($document) >= 1)
        <div class="card mt-4">
            <div class="card-body text-center">
                <span>
                    @if(Auth::user()->status == 'diterima')
                        Selamat Anda Diterima di 
                        <br>
                        SMK WIKRAMA 1 GARUT !
                    @elseif (Auth::user()->status == 'ditolak')
                        Maaf Anda Belum Diterima di SMK WIKRAMA 1 GARUT !
                    @elseif (Auth::user()->status == 'perbaiki')
                        Mohon Perbaiki Document Yang Telah Anda Kirim !
                    @else
                        Belum Ditanggapi
                    @endif
                </span>
            </div>
        </div>
    @else
    

    <div>
        <h6 class="mt-4 ml-4 font-weight-bold   ">SILAHKAN ISI DOCUMENT DIBAWAH INI !</h6>
            <div class="card-body">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <form method="post" action="{{route('user.store')}}" enctype = "multipart/form-data">
                        @csrf

                        <div class="form-group" hidden>
                            <input type="text" class="form-control invisible @error('nisn') is-invalid @enderror " name="nisn" id="nisn" value="{{ Auth::user()->nisn }}" placeholder="Masukan Nis">
                            @error('nisn')
                                <div id="validationCustom03" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleFormControlFile1"><strong>KARTU KELUARGA</strong></label>
                                    <input type="file" class="form-control-file @error('kk') is-invalid @enderror" id="kk" name="kk" value="{{old('kk')}}">
                                    @error('kk')
                                        <div id="validationCustom03" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card mt-2">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleFormControlFile1"><strong>AKTE KELAHIRAN</strong></label>
                                    <input type="file" class="form-control-file @error('akte') is-invalid @enderror" id="akte" name="akte" value="{{old('akte')}}">
                                    @error('akte')
                                        <div id="validationCustom03" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card mt-2">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleFormControlFile1"><strong>SKHUN</strong></label>
                                    <input type="file" class="form-control-file @error('skhun') is-invalid @enderror" id="skhun" name="skhun" value="{{old('skhun')}}">
                                    @error('skhun')
                                        <div id="validationCustom03" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card mt-2">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleFormControlFile1"><strong>IJAZAH</strong></label>
                                    <input type="file" class="form-control-file @error('ijazah') is-invalid @enderror" id="ijazah" name="ijazah" value="{{old('ijazah')}}">
                                    @error('ijazah')
                                        <div id="validationCustom03" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-2">Kirim</button>
                    </form>
                </table>
            </div>

    </div>
    @endif

</div>
@endsection
