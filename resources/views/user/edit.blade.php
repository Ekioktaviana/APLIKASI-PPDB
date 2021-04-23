@extends('layouts.main')
@section('title', 'SMK WIKRAMA 1 GARUT')

@section('content')
            <div>
                <div class="container">
                <h6 class="mt-4 ml-4 font-weight-bold text-primary">SILAHKAN ISI DOCUMENT DIBAWAH INI !</h6>

                    <div class="card-body">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <form method="post" action="{{route('document.update', $id->id)}}" enctype = "multipart/form-data">
                                @csrf
                                @method('PATCH')

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
                                            <img src="{{ Storage::url($id->kk) }}" width="80" height="80">
                                            <label for="exampleFormControlFile1"><strong>KARTU KELUARGA</strong></label>
                                            <input type="file" class="form-control-file @error('kk') is-invalid @enderror" id="kk" name="kk" value="{{$id->kk}}">
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
                                            <img src="{{ Storage::url($id->akte) }}" width="80" height="80">
                                            <label for="exampleFormControlFile1"><strong>AKTE KELAHIRAN</strong></label>
                                            <input type="file" class="form-control-file @error('akte') is-invalid @enderror" id="akte" name="akte" value="{{$id->akte}}">
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
                                            <img src="{{ Storage::url($id->skhun) }}" width="80" height="80">
                                            <label for="exampleFormControlFile1"><strong>SKHUN</strong></label>
                                            <input type="file" class="form-control-file @error('skhun') is-invalid @enderror" id="skhun" name="skhun" value="{{$id->skhun}}">
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
                                            <img src="{{ Storage::url($id->ijazah) }}" width="80" height="80">
                                            <label for="exampleFormControlFile1"><strong>IJAZAH</strong></label>
                                            <input type="file" class="form-control-file @error('ijazah') is-invalid @enderror" id="ijazah" name="ijazah" value="{{$id->ijazah}}">
                                            @error('ijazah')
                                                <div id="validationCustom03" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4">

                                    <button type="submit" class="btn btn-success btn-sm">Kirim</button>
                                    <a href="{{ route('user.document') }}" class="btn btn-sm btn-primary">Kembali</a>
                                </div>
                            </form>
                        </table>
                    </div>
                </div>

            </div>

@endsection