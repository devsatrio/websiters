@extends('layoutadmin.app')
@section('title','Galeri')
@section('css')
<link rel="stylesheet" href="{{asset('css/dropzone.css')}}">
<style>
    .dropzone {
        border: 2px dashed #0087F7;
        background: white;
        border-radius: 5px;
        min-height: 300px;
        padding: 90px 0;
        vertical-align: baseline;
    }
</style>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 col-12">
        <div class="card">
            <div class="card-header">
                <p class="card-title">Upload Foto Galeri</p>
            </div>
            <div class="card-body">
                <div class="dropzone">
                    <div class="dz-message">
                        <h3> Klik atau Drop gambar disini</h3>
                    </div>
                </div>
                <br>
                <button class="btn btn-primary float-right" onclick="location.reload()">Selesai Upload</button>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-12">
        <div class="card">
            <div class="card-header">
                <p class="card-title">Data Galeri</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>upload by</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no=1;
                            @endphp
                            @foreach ($data as $item)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>
                                    <img src="{{asset('galeri/'.$item->nama)}}" width="200" height="200"
                                        class="img-thumbnail">
                                </td>
                                <td>{{$item->adm}}</td>
                                <td>
                                    <a href="{{route('galeri.hapus',['id'=>$item->id,'nama'=>$item->nama])}}" onclick="return confirm('Apakah kamu ingin menghapus data ini?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{asset('js/dropzone.js')}}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    Dropzone.autoDiscover = false;
    var foto_upload= new Dropzone(".dropzone",{
    url: "{{route('galeri.add')}}",
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    maxFilesize: 2,
    method:"post",
    acceptedFiles:"image/*",
    paramName:"userfile",
    dictInvalidFileType:"Type file ini tidak dizinkan",
    addRemoveLinks:true,
    });
    foto_upload.on('sending',function(a,b,c){
        a.token=Math.random();
        c.append("token",a.token);
    });
    foto_upload.on('removedfile',function(a){
        var token=a.token;
        $.ajax({
            type:"GET",
            // data:{token:token},
            url:"{{url('image/galeri-remove')}}"+'/'+token,
            cache:false,            
            dataType:'json',
            success:function(){
                console.log("foto terhapus");
            },
            error:function(){
                console.log('Error');
            }
        });
    });
</script>
@endsection