@extends('layout.v_template')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Edit Karyawan') }}</h1>

<!-- Main Content goes here -->
<form action="/karyawan/update/{{ $karyawan->id }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="content">
    <div class="row"> 
    <div class="col-sm-6">
        <div class="form-group">
            <label>NIP</label>
            <input name="nip" class="form-control" value="{{ $karyawan->nip }}">
            <div class="text-danger">
                @error('nip')
                {{ $message }}
                @enderror
            </div>
            
            <div class="form-group">
            <label>Nama</label>
            <input name='nama' class="form-control" value="{{ $karyawan->nama }}">
            <div class="text-danger">
                @error('nama')
                {{ $message }}
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label>Jabatan</label>
            <input name='jabatan' class="form-control" value="{{ $karyawan->jabatan }}">
            <div class="text-danger">
                @error('jabatan')
                {{ $message }}
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label>Pangkat</label>
            <input name='pangkat' class="form-control" value="{{ $karyawan->pangkat }}">
            <div class="text-danger">
                @error('pangkat')
                {{ $message }}
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label>Divisi</label> 
            <div> </div>
            <select name='divisi' class="form-control" aria-label="Default select example" value="{{ $karyawan->divisi }}">
            <option selected >{{ $karyawan->divisi }}</option>
            <option value="HKT">HKT</option>
            <option value="SIK">SIK</option>
            <option value="ICT">ICT</option>
            </select>
            <div class="text-danger">
                @error('divisi')
                {{ $message }}
                @enderror
            </div>
        </div>
        
        <div class="form-group">
            <button class="btn btn-primary btn-sm">Simpan</button>
            
        </div>
    </div>

    </div>
</div>

</form>

<!-- End of Main Content -->

@endsection