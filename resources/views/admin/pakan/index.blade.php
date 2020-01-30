@extends('layoutadmin.app')
@section('title','Katalog Pakan')
@section('css')
<link rel="stylesheet" href="{{asset('upimage/css/style.css')}}">
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 col-12">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Ada Error Untuk Produk.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
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
                <p class="card-title">Data Kategori Produk</p>
                <div class="card-tools">
                    <button data-target="#mdkat" data-toggle="modal" class="btn btn-sm btn-outline-primary"><i
                            class="fa fa-plus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Kategori</th>
                                <th>Isi</th>
                                <th>Paketan</th>
                                <th>Jenis Berat</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kat as $k)
                            <tr>
                                <td>{{$k->id}}</td>
                                <td>{{$k->kategori}}</td>
                                <td>{{$k->isi}}</td>
                                <td>{{$k->paket}}</td>
                                <td>{{$k->jenis_berat}}</td>
                                <td>
                                    <button data-target="#kt{{$k->id}}" data-toggle="modal"
                                        class="btn btn-sm btn-success mr-2"><i class="fa fa-edit"></i></button>
                                    <a href="{{route('del.bkategori',['id'=>$k->id,'token'=>csrf_token()])}}"
                                        class="btn btn-danger btn-sm mr-2"
                                        onclick="return confirm('Apakah Anda Ingin Menghapus Data ini?')"><i
                                            class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <div class="modal fade" id="kt{{$k->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            Edit Data
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('update.bkategori')}}" method="post">
                                                @csrf
                                                <div class="form-group{{$errors->has('nama') ? 'has-error':''}}">
                                                    <label for="">Nama Kategori</label>
                                                    <input type="hidden" name="id" value="{{$k->id}}">
                                                    <input type="text" value="{{$k->kategori}}" name="nama"
                                                        class="form-control" placeholder="Isikan Nama Kategori">
                                                    <small class="text-danger">{{$errors->first('nama')}}</small>
                                                </div>
                                                <div class="form-group{{$errors->has('isi') ? 'has-error':''}}">
                                                    <label for="">Isi</label>
                                                    <input type="number" value="{{$k->isi}}" name="isi"
                                                        class="form-control" placeholder="Isikan Isi">
                                                    <small class="text-danger">{{$errors->first('isi')}}</small>
                                                </div>
                                                <div class="form-group{{$errors->has('pak') ? 'has-error':''}}">
                                                    <label for="">Pack</label>
                                                    <input type="text" value="{{$k->paket}}" name="pak"
                                                        class="form-control" placeholder="Isikan Pack">
                                                    <small class="text-danger">{{$errors->first('pak')}}</small>
                                                </div>
                                                <div class="form-group{{$errors->has('berat') ? 'has-error':''}}">
                                                    <label for="">Satuan Berat</label>
                                                    <input type="text" value="{{$k->jenis_berat}}" name="berat"
                                                        class="form-control" placeholder="Isikan Satuan Berat">
                                                    <small class="text-danger">{{$errors->first('berat')}}</small>
                                                </div>
                                                <div class="form-group">
                                                    <button class="btn btn-primary float-right">Simpan</button>
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
    {{-- modal add Kategori --}}
    <div class="modal fade" id="mdkat">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title">Add Kategori Barang</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('add.bkategori')}}" method="post">
                        @csrf
                        <div class="form-group{{$errors->has('nama') ? 'has-error':''}}">
                            <label for="">Nama Kategori</label>
                            <input type="text" name="nama" class="form-control" placeholder="Isikan Nama Kategori">
                            <small class="text-danger">{{$errors->first('nama')}}</small>
                        </div>
                        <div class="form-group{{$errors->has('isi') ? 'has-error':''}}">
                            <label for="">Isi</label>
                            <input type="number" name="isi" class="form-control" placeholder="Isikan Isi">
                            <small class="text-danger">{{$errors->first('isi')}}</small>
                        </div>
                        <div class="form-group{{$errors->has('pak') ? 'has-error':''}}">
                            <label for="">Pack</label>
                            <input type="text" name="pak" class="form-control" placeholder="Isikan Pack">
                            <small class="text-danger">{{$errors->first('pak')}}</small>
                        </div>
                        <div class="form-group{{$errors->has('berat') ? 'has-error':''}}">
                            <label for="">Satuan Berat</label>
                            <input type="text" name="berat" class="form-control" placeholder="Isikan Satuan Berat">
                            <small class="text-danger">{{$errors->first('berat')}}</small>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary float-right">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-12">
        <div class="card">
            <div class="card-header">
                <p class="card-title">Data Produk Pakan</p>
                <div class="card-tools">
                    {{-- Cari  --}}
                    <form class="form-inline btn btn-tool">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Cari Produk"
                                aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-default" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <button data-target="#mdadd" data-toggle="modal" class="btn btn-sm btn-outline-primary"><i
                            class="fa fa-plus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Produk</th>
                                <th>Harga Kg</th>
                                <th>Harga Ton</th>
                                <th>Stok</th>
                                <th>Stok Paket</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{$item->idb}}</td>
                                <td>{{$item->produk}}</td>
                                <td>{{number_format($item->harg_kg)}}</td>
                                <td>{{number_format($item->harg_ton)}}</td>
                                <td>{{$item->stok}}</td>
                                <td>
                                    @php
                                    $box=$item->stok/$item->isi;
                                    $sisa=$item->stok % $item->isi;
                                    @endphp
                                    {{floor($box).' '.$item->jenis_berat}}
                                    @if ($sisa!=0)
                                    , {{$sisa.' '.$item->paket}}
                                    @endif
                                </td>
                                <td>
                                    <button data-target="#stok{{$item->idb}}" data-toggle="modal"
                                        class="btn btn-info btn-xs mr-2"><i class="fa fa-plus-circle"></i></button>
                                    <button data-target="#mdup{{$item->idb}}" data-toggle="modal"
                                        class="btn btn-success btn-xs mr-2"><i class="fa fa-edit"></i></button>
                                    <a href="{{route('del.pakan',['id'=>$item->id,'token'=>csrf_token()])}}"
                                        class="btn btn-danger btn-xs mr-2"
                                        onclick="return confirm('Apakah Anda Ingin Menghapus Data ini?')"><i
                                            class="fa fa-trash"></i></a>
                                    <button data-target="#v{{$item->idb}}" data-toggle="modal"
                                        class="btn btn-primary btn-xs mr-2"><i class="fa fa-eye"></i></button>
                                </td>
                            </tr>
                            {{-- Modal Update Detail Barang --}}
                            <div class="modal fade" id="mdup{{$item->idb}}">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <p class="modal-title">Update Pakan</p>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('update.pakan')}}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="col-lg-12 col-12">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-12">
                                                            <div class="form-group">
                                                                <button type="submit"
                                                                    class="btn btn-success float-right">Update
                                                                    Produk</button>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-12">
                                                            <div class="form-group">
                                                                <label for="">Kategori Produk</label>
                                                                <input type="hidden" name="id" value="{{$item->idb}}">
                                                                <select class="form-control" name="kat" id="">
                                                                    <option value="{{$item->idk}}">{{$item->kategori}}
                                                                    </option>
                                                                    @foreach ($kat as $it)
                                                                    <option value="{{$it->id}}">{{$it->kategori}}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Stok</label>
                                                                <input type="number" value="{{$item->stok}}" required
                                                                    name="stok" class="form-control"
                                                                    placeholder="Isikan Stok Produk">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-12">
                                                            <div class="form-group">
                                                                <label for="">Kode Produk</label>
                                                                <input type="text" value="{{$item->kode}}" name="kode"
                                                                    class="form-control"
                                                                    placeholder="Isikan Kode Produk">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Nama Produk</label>
                                                                <input type="text" value="{{$item->produk}}"
                                                                    name="produk" class="form-control"
                                                                    placeholder="Isikan Nama Produk">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Harga Kg</label>
                                                                <input type="text"
                                                                    value="{{number_format($item->harg_kg)}}"
                                                                    name="hrgpcs" class="form-control nm"
                                                                    placeholder="Isikan Harga KG Produk">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Harga Ton</label>
                                                                <input type="text"
                                                                    value="{{number_format($item->harg_ton)}}"
                                                                    name="hrgpack" class="form-control nm"
                                                                    placeholder="Isikan Harga Ton Produk">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Diskon (%)</label>
                                                                <input type="number" value="{{$item->diskon}}"
                                                                    name="diskon" class="form-control"
                                                                    placeholder="Isikan Diskon Produk">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-12">
                                                            <div class="form-group">
                                                                <label for="">Deskripsi Produk</label>
                                                                <textarea name="deskripsi" class="isi" id="" cols="30"
                                                                    rows="10">{{$item->deskripsi}}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-12">
                                                            <div class="form-group">
                                                                <label for="">Keunggulan Produk</label>
                                                                <textarea name="unggul" class="isi" id="" cols="30"
                                                                    rows="10">{{$item->keunggulan}}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-12">
                                                            <div class="form-group">
                                                                <label for="">Penggunaan Produk</label>
                                                                <textarea name="kegunaan" class="isi" id="" cols="30"
                                                                    rows="10">{{$item->penggunaan}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Modal Stok --}}
                            <div class="modal fade" id="stok{{$item->idb}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <p class="modal-title">Tambah Atau Min Stok Barang</p>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('add.pakan.stok')}}" method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="">Tambah/Min Stok Dalam Satuan Kecil(Pcs/Kg)</label>
                                                    <input type="hidden" value="{{$item->idb}}" name="id">
                                                    <input type="number" required class="form-control" name="stok"
                                                        placeholder="Isikan Tambhan Stok">
                                                </div>
                                                <div class="form-group">
                                                    <select name="pil" id="" class="form-control">
                                                        <option value="1">Tambah</option>
                                                        <option value="0">Kurangi</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <button class="btn btn-primary float-right">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Modal View --}}
                            <div class="modal fade" id="v{{$item->idb}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <p class="modal-title">View Produk Image</p>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <form action="{{route('update.foto.pakan')}}" method="post"
                                                    enctype="multipart/form-data">
                                                    <div class="col-lg-12 col-12">
                                                        <label for="">Foto Lama</label>
                                                        @php
                                                        $data=DB::table('imgbarangs')->where('idb',$item->idb)->get();
                                                        $nop=1;
                                                        @endphp
                                                        <div class="row">
                                                            @foreach ($data as $im)
                                                            <div class="col-lg-4 col-12">
                                                                <img src="{{asset('produk_img/'.$im->nama)}}"
                                                                    width="150" height="150" class="img-thumbnail">
                                                                <input type="text" hidden="{{$im->nama}}" class="form-control"
                                                                    name="photosl{{$nop++}}">
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-12">
                                                        @csrf
                                                        <div class="form-group text-center">
                                                            <input type="hidden" name="idb" value="{{$item->idb}}">
                                                            <label for="">Upload Gambar Produk</label>
                                                            <div class="row text-center">
                                                                <div class="col-lg-4 col-4">
                                                                    <input type="file" class="form-control"
                                                                        name="photos1">
                                                                    <input type="hidden" value="" class="form-control"
                                                                        name="photosl1">
                                                                </div>
                                                                <div class="col-lg-4 col-4">

                                                                    <input type="file" class="form-control"
                                                                        name="photos2">
                                                                </div>
                                                                <div class="col-lg-4 col-4">
                                                                    <input type="file" class="form-control"
                                                                        name="photos3">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <button class="btn btn-primary float-right"
                                                                type="submit">Simpan</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
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
{{-- Modal add Barang --}}
<div class="modal fade" id="mdadd">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title">Add Barang</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('add.produk')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-lg-12 col-12">
                        <div class="row">
                            <div class="col-lg-12 col-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary float-right">Simpan Produk</button>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="">Upload Gambar Produk</label>
                                    <div class="row text-center">
                                        <div class="col-lg-4 col-4">
                                            <img src="{{asset('dist/img/images.png')}}" alt="" width="100" id="imgv">
                                            <input type="file" style="display: none;" id="imgtf" name="photos1">
                                            <br>
                                            <br>
                                            <button type="button" class="btn btn-sm btn-primary"
                                                onclick="document.getElementById('imgtf').click();"><i
                                                    class="fa fa-plus"></i> Gambar</button>
                                        </div>
                                        <div class="col-lg-4 col-4">
                                            <img src="{{asset('dist/img/images.png')}}" alt="" width="100" id="imgv1">
                                            <input type="file" style="display: none;" class="form-control" id="imgtf1"
                                                name="photos2">
                                            <br>
                                            <br>
                                            <button type="button" class="btn btn-sm btn-primary"
                                                onclick="document.getElementById('imgtf1').click();"><i
                                                    class="fa fa-plus"></i> Gambar</button>
                                        </div>
                                        <div class="col-lg-4 col-4">
                                            <img src="{{asset('dist/img/images.png')}}" alt="" width="100" id="imgv2">
                                            <input type="file" style="display: none;" class="form-control" id="imgtf2"
                                                name="photos3">
                                            <br>
                                            <br>
                                            <button type="button" class="btn btn-sm btn-primary"
                                                onclick="document.getElementById('imgtf2').click();"><i
                                                    class="fa fa-plus"></i> Gambar</button>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Kategori Produk</label>
                                    <select class="form-control" name="kat" id="">
                                        <option selected disabled>Pilih Kategori</option>
                                        @foreach ($kat as $it)
                                        <option value="{{$it->id}}">{{$it->kategori}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Stok</label>
                                    <input type="number" required name="stok" class="form-control"
                                        placeholder="Isikan Stok Produk">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="">Kode Produk</label>
                                    <input type="text" name="kode" class="form-control"
                                        placeholder="Isikan Kode Produk">
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Produk</label>
                                    <input type="text" name="produk" class="form-control"
                                        placeholder="Isikan Nama Produk">
                                </div>
                                <div class="form-group">
                                    <label for="">Harga KG</label>
                                    <input type="text" name="hrgpcs" class="form-control nm"
                                        placeholder="Isikan Harga KG Produk">
                                </div>
                                <div class="form-group">
                                    <label for="">Harga TON</label>
                                    <input type="text" name="hrgpack" class="form-control nm"
                                        placeholder="Isikan Harga Ton Produk">
                                </div>
                                <div class="form-group">
                                    <label for="">Diskon (%)</label>
                                    <input type="number" name="diskon" class="form-control"
                                        placeholder="Isikan Diskon Produk">
                                </div>
                            </div>
                            <div class="col-lg-12 col-12">
                                <div class="form-group">
                                    <label for="">Deskripsi Produk</label>
                                    <textarea name="deskripsi" class="isi" id="" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12 col-12">
                                <div class="form-group">
                                    <label for="">Keunggulan Produk</label>
                                    <textarea name="unggul" class="isi" id="" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12 col-12">
                                <div class="form-group">
                                    <label for="">Penggunaan Produk</label>
                                    <textarea name="kegunaan" class="isi" id="" cols="30" rows="10"></textarea>
                                </div>
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
<script src="{{asset('upimage/js/jquery_slim.js')}}"></script>
<script src="{{asset('upimage/js/app.js')}}"></script>
<script src="{{asset('tinymce/tinymce.js')}}"></script>
<script>
    tinymce.init({
        selector:'textarea.isi',
        height: 350,
        plugins: 'image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime lists wordcount textpattern noneditable help emoticons',
        toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist | forecolor backcolor casechange permanentpen formatpainter removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media pageembed template link anchor codesample | a11ycheck ltr rtl | showcomments addcomment',
        external_filemanager_path:"{{asset('/filemanager').'/'}}",
        filemanager_title        :"Upload File" , // bisa diganti terserah anda
        external_plugins         : { "filemanager" : "{{ asset('/filemanager/plugin.min.js') }}"} 
    });
    // format number
    function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }
     // check sisa saldo dan tranfer
     $('.nm').on('keyup',function(){
            var n = parseInt($(this).val().replace(/\D/g,''),10);
            $(this).val(n.toLocaleString());
     });
     function simage1(input){
            if(input.files && input.files[0]){
                var reader=new FileReader();
                reader.onload=function(e){
                    $('#imgv').attr('src',e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $('#imgtf').change(function(){
            simage1(this);
        });
     function simage2(input){
            if(input.files && input.files[0]){
                var reader=new FileReader();
                reader.onload=function(e){
                    $('#imgv1').attr('src',e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $('#imgtf1').change(function(){
            simage2(this);
        });    
     function simage3(input){
            if(input.files && input.files[0]){
                var reader=new FileReader();
                reader.onload=function(e){
                    $('#imgv2').attr('src',e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $('#imgtf2').change(function(){
            simage3(this);
        });    
        
</script>
@endsection