@extends('layoutadmin.app')
@section('title','Slider Image')
@section('content')
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
<div class="row">
    <div class="col-lg-12 col-12">
        {{-- alert --}}
        @if (Session::get('msg'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <p>{{Session::get('msg')}}</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
    </div>
    <div class="col-lg-12 col-12">
        <div class="card">
            <div class="card-header">
                <p class="card-title">Upload Foto Slider</p>
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
                <p class="card-title">Data Slider</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>deskripsi</th>
                                <th>Link</th>
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
                                <td><img src="{{asset('slider/'.$item->nama)}}" width="200" height="200"
                                        class="img-thumbnail"></td>
                                <td>
                                    @if($item->deskripsi)
                                    {!! $item->deskripsi !!}
                                    @else
                                    -
                                    @endif
                                </td>
                                <td>
                                    @if($item->link)
                                    {{$item->link}}
                                    @else
                                    -
                                    @endif
                                </td>
                                <td>
                                    <button data-toggle="modal" data-target="#ed{{$item->id}}"
                                        class="btn btn-primary btn-sm mr-2"><i class="fa fa-plus"></i></button>
                                    @if($item->aktif=='y')
                                    <a href="{{route('slider.hide',['id'=>$item->id,'ak'=>'n'])}}"
                                        onclick="return confirm('Apakah kamu ingin menyembunyikan data ini?')"
                                        class="btn btn-warning btn-sm mr-2"><i class="fa fa-eye-slash"></i></a>
                                    @else
                                    <a href="{{route('slider.hide',['id'=>$item->id,'ak'=>'y'])}}"
                                        onclick="return confirm('Apakah kamu ingin menamplikan data ini?')"
                                        class="btn btn-success btn-sm mr-2"><i class="fa fa-eye"></i></a>
                                    @endif
                                    <a href="{{route('slider.hapus',['id'=>$item->id,'nama'=>$item->nama])}}"
                                        onclick="return confirm('Apakah kamu ingin menghapus data ini?')"
                                        class="btn btn-danger btn-sm mr-2"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            {{-- modal --}}
                            <div class="modal fade" id="ed{{$item->id}}">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <p class="modal-title">add deskripsi dan link</p>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('slider.desk')}}" method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="hidden" name="id" value="{{$item->id}}">
                                                    <label for="">Tambah Deskripsi (max 200 huruf)</label>
                                                    <textarea name="desk"
                                                        class="deskrip">{{$item->deskripsi}}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Tambah link</label>
                                                    <input type="text" name="link" value="{{$item->link}}"
                                                        class="form-control" placeholder="Isikan Link">
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" name="cek" @if($item->selected=='y') checked @endif class="form-check-input" id="">
                                                    <label for="" class="form-check-label">Tandai Slider Pertama</label>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary float-right">
                                                        Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
<script src="{{asset('tinymce/tinymce.js')}}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    Dropzone.autoDiscover = false;
    var foto_upload= new Dropzone(".dropzone",{
    url: "{{route('slider.add')}}",
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
            url:"{{url('image/slider-del')}}"+'/'+token,
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
    // tiny mce
    tinymce.init({
        selector:'textarea.deskrip',  
        max_chars: 200,
        toolbar:'| fontselect fontsizeselect formatselect', 
        content_style: ".mce-content-body {font-size:12px;font-family:Arial,sans-serif;}",     
    });
</script>
@endsection