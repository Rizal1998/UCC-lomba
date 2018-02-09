@extends('layouts.app')

@section('css')

@endsection

@section('content')

<form action="/lomba/{{$lomba->id}}/edit" method="post">
    {{csrf_field()}}
    <div class="form-group">
        <label for="nama">Nama</label>
        <input name="nama" type="text" class="form-control" id="nama" placeholder="Masukkan Nama Lomba" value="{{$lomba->nama}}" required>
    </div>

    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <input name="deskripsi" type="text" class="form-control" id="deskripsi" placeholder="Masukkan Deskripsi Lomba" value="{{$lomba->deskripsi}}" required>
    </div>

    <div class="form-group">
        <label for="poster">Url Poster</label>
        <input name="poster" type="text" class="form-control" id="deskripsi" placeholder="Masukkan Url Poster Lomba" value="{{$lomba->poster}}" required>
    </div>

    <div class="form-group">
        <label for="tanggal">Tanggal Penutupan Lomba</label>
        <input name="tanggal" type="date" class="form-control" id="tanggal" placeholder="Masukkan Tanggal Penutupan Lomba" value="{{$lomba->tanggal_tutup}}" required>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection

@section('js')

@endsection