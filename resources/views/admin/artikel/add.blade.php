@extends('layoutadmin.app')
@section('title','Add Artikel')

@section('content')
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
         @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Ada Error Untuk Artikel.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
    <div class="col-lg-12 col-12">
        <div class="card">
            <div class="card-header">
                <p class="card-title">Tambah Artikel Baru</p>
            </div>
            <div class="card-body">
                <form action="{{route('artikel.submit')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            @if (Session::get('msg'))
                            <p class="alert"></p>
                            @endif
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary float-right">Simpan Artikel</button>
                            </div>
                        </div>
                        <div class="col-lg-6 col-6">
                            <div class="form-group{{$errors->has('judul') ? 'has-error':''}}">
                                <label for="">judul Artikel</label>
                                <input required name="judul" type="text" value="{{old('judul')}}" class="form-control"
                                    placeholder="Isikan judul">
                                <small class="text-danger">{{$errors->first('judul')}}</small>
                            </div>
                        </div>
                        <div class="col-lg-6 col-6">
                            <div class="form-group">
                                <label for="">Tanggal</label>
                                <input name="tgl" value="{!! date('Y-m-d h:i:s') !!}" value="{{old('tgl')}}" type="text" readonly
                                    class="form-control" placeholder="Isikan judul">
                            </div>
                        </div>
                        <div class="col-lg-6 col-6">
                            <div class="form-group{{$errors->has('subk') ? 'has-error':''}}">
                                <label for="">Kategori</label>
                                <select name="subk" class="form-control" name="" id="">
                                    <option disabled selected>Pilih Kategori</option>
                                    @foreach ($sk as $item)
                                    <option value="{{$item->id}}">{{$item->kategori.'->'.$item->subkategori}}</option>
                                    @endforeach
                                </select>
                                <small class="text-danger">{{$errors->first('subk')}}</small>
                            </div>
                        </div>
                        <div class="col-lg-6 col-6">
                            <div class="form-group{{$errors->has('img') ? 'has-error':''}}">
                                <label for="">Gambar Sampul</label>
                                <input required id="imgtf" type="file" name="img" class="form-control" id="">
                            </div>
                            <small class="text-danger">{{$errors->first('img')}}</small>
                        </div>
                        <div class="col-lg-12 col-12">
                            <div class="form-group">
                                <center><img id="imgv" src="{{asset('dist/img/images.png')}}" class="img-thumbnail"
                                        width="300px" height="200px"></center>
                            </div>
                        </div>
                        <div class="col-lg-12 col-12">
                            <div class="form-group{{$errors->has('deskripsi') ? 'has-error':''}}">
                                <label for="">Deskripsi Singkat Artikel</label>
                                <textarea name="deskripsi" class="deskrip">{{old('deskripsi')}}</textarea>
                                <small class="text-danger">{{$errors->first('deskripsi')}}</small>
                            </div>
                        </div>
                        <div class="col-lg-12 col-12">
                            <div class="form-group{{$errors->has('isi') ? 'has-error':''}}">
                                <label for="">Isi Artikel Dibawah Ini </label><br>
                                <textarea name="isi" class="isi">{{old('isi')}}</textarea>
                                <small class="text-danger">{{$errors->first('isi')}}</small>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{asset('tinymce/tinymce.js')}}"></script>
<script>
    tinymce.init({
        selector:'textarea.isi',
        height: 1000,
        plugins: 'image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime lists wordcount textpattern noneditable help emoticons',
        toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist | forecolor backcolor casechange permanentpen formatpainter removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media pageembed template link anchor codesample | a11ycheck ltr rtl | showcomments addcomment',
        external_filemanager_path:"{{asset('/filemanager').'/'}}",
        filemanager_title        :"Upload File" , // bisa diganti terserah anda
        external_plugins         : { "filemanager" : "{{ asset('/filemanager/plugin.min.js') }}"},
        relative_urls:false,

    });
    tinymce.init({
        selector:'textarea.deskrip',  
        toolbar:'| fontselect fontsizeselect formatselect', 
        content_style: ".mce-content-body {font-size:12px;font-family:Arial,sans-serif;}",     
    });
    function simage(input){
            if(input.files && input.files[0]){
                var reader=new FileReader();
                reader.onload=function(e){
                    $('#imgv').attr('src',e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $('#imgtf').change(function(){
            simage(this);
        });
        $('.toastrDefaultSuccess').click(function() {
            toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
</script>
@endsection