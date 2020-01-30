@extends('layoutadmin.app')
@section('title','Artikel')
@section('menu')
@endsection
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
    </div>
    <div class="col-lg-12 col-12">
        <div class="card">
            <div class="card-header">
                <p class="card-title">Data Artikel</p>
                <div class="card-tools">
                    <a href="{{route('artikel.add')}}" class="btn btn-sm btn-outline-primary">
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Tanggal</th>
                                <th>Kategori</th>
                                <th>Aktif</th>
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
                                <td>{{$item->judul}}</td>
                                <td>{{$item->tgl}}</td>
                                <td>{{$item->kategori.'>'.$item->subkategori}}</td>
                                <td>
                                    @if ($item->aktif=='y')
                                    <span class="badge badge-primary">Aktif</span>
                                    @else
                                    <span class="badge badge-danger">No Aktif</span>
                                    @endif
                                </td>
                                <td>
                                    <button data-target="#det{{$item->id}}" data-toggle="modal"
                                        class="btn btn-outline-primary btn-sm mr-2"><i class="fa fa-eye"></i></button>
                                    <button data-target="#edit{{$item->id}}" data-toggle="modal"
                                        class="btn btn-sm btn-outline-success mr-2"><i class="fa fa-edit"></i></button>
                                    <a href="{{route('artikel.delete',['id'=>$item->id,'token'=>csrf_token()])}}"
                                        onclick="return confirm('Apakah anda ingin menghapus data ini?')"
                                        class="btn btn-sm btn-outline-danger mr-2"><i class="fa fa-trash"></i></a>
                                    @if ($item->aktif=='y')
                                    <a href="{{route('artikel.lock',['id'=>$item->id,'a'=>'n'])}}"
                                        onclick="return confirm('Apakah anda ingin menyembunyikan data ini?')"
                                        class="btn btn-sm btn-outline-danger mr-2"><i class="fa fa-lock"></i></a>
                                    @else
                                    <a href="{{route('artikel.lock',['id'=>$item->id,'a'=>'y'])}}"
                                        onclick="return confirm('Apakah anda ingin menampilkan data ini?')"
                                        class="btn btn-sm btn-outline-success mr-2"><i class="fa fa-lock-open"></i></a>
                                    @endif
                                </td>
                            </tr>
                            {{-- Modal Lihat Detail --}}
                            <div class="modal fade" id="det{{$item->id}}">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <p>{{$item->judul}}</p>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <center><img src="{{asset('thumbs/sampul/'.$item->foto)}}" width="300"
                                                        height="200" class="thumbnail"></center>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Deskripsi</label>
                                                <textarea class="edit">
                                                        {{$item->deskripsi}}
                                                    </textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Isi</label>
                                                <textarea class="eisi">
                                                        {{$item->isi}}
                                                    </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- ------------------ --}}
                            {{-- Modal Update --}}
                            <div class="modal fade" id="edit{{$item->id}}">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <p>Update Data Artikel</p>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('artikel.update')}}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-12 col-12">
                                                        <div class="form-group">
                                                            <input type="hidden" name="id" value="{{$item->id}}">
                                                            <button type="submit"
                                                                class="btn btn-primary float-right">Update
                                                                Artikel</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-6">
                                                        <div
                                                            class="form-group{{$errors->has('judul') ? 'has-error':''}}">
                                                            <label for="">judul Artikel</label>
                                                            <input required value="{{$item->judul}}" name="judul"
                                                                type="text" class="form-control"
                                                                placeholder="Isikan judul">
                                                            <small
                                                                class="text-danger">{{$errors->first('judul')}}</small>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-6">
                                                        <div class="form-group">
                                                            <label for="">Tanggal</label>
                                                            <input name="tgl" value="{!! date('Y-m-d') !!}" type="text"
                                                                readonly class="form-control"
                                                                placeholder="Isikan judul">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-6">
                                                        <div
                                                            class="form-group{{$errors->has('subk') ? 'has-error':''}}">
                                                            <label for="">Kategori</label>
                                                            <select name="subk" class="form-control" name="" id="">
                                                                @php
                                                                $sub=DB::table('sub_kategoris')
                                                                ->join('kategoris','kategoris.id','=','sub_kategoris.idk')
                                                                ->select(DB::raw('kategoris.kategori,sub_kategoris.*'))
                                                                ->where('sub_kategoris.id',$item->idsk)
                                                                ->get();
                                                                @endphp
                                                                @foreach ($sub as $sbk)
                                                                <option value="{{$sbk->id}}">
                                                                    {{$sbk->kategori.'->'.$sbk->subkategori}}</option>
                                                                @endforeach
                                                                @foreach ($sk as $k)
                                                                <option value="{{$k->id}}">
                                                                    {{$k->kategori.'->'.$k->subkategori}}</option>
                                                                @endforeach
                                                            </select>
                                                            <small
                                                                class="text-danger">{{$errors->first('subk')}}</small>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-6">
                                                        <div class="form-group{{$errors->has('img') ? 'has-error':''}}">
                                                            <label for="">Gambar Sampul</label>
                                                            <input id="imgtf" type="file" name="img"
                                                                class="form-control" id="">
                                                        </div>
                                                        <small class="text-danger">{{$errors->first('img')}}</small>
                                                    </div>
                                                    <div class="col-lg-12 col-12">
                                                        <div class="form-group">
                                                            <center><img id="imgv"
                                                                    src="{{asset('thumbs/sampul/'.$item->foto)}}"
                                                                    class="img-thumbnail" width="300px" height="200px">
                                                            </center>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-12">
                                                        <div
                                                            class="form-group{{$errors->has('deskripsi') ? 'has-error':''}}">
                                                            <label for="">Deskripsi Singkat Artikel</label>
                                                            <textarea name="deskripsi"
                                                                class="deskrip">{{$item->deskripsi}}</textarea>
                                                            <small
                                                                class="text-danger">{{$errors->first('deskripsi')}}</small>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-12">
                                                        <div class="form-group{{$errors->has('isi') ? 'has-error':''}}">
                                                            <label for="">Isi Artikel Dibawah Ini </label><br>
                                                            <textarea name="isi" class="isi">{{$item->isi}}</textarea>
                                                            <small class="text-danger">{{$errors->first('isi')}}</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- ------------ --}}
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
<script src="{{asset('tinymce/tinymce.js')}}"></script>
<script>
    tinymce.init({
        selector:'textarea.edit',
        readonly:1,      
    });
    tinymce.init({
        selector:'textarea.eisi',
        readonly:1,      
        height:500,
    });
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