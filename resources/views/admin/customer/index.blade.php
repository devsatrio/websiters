@extends('layoutadmin.app')
@section('title','Customer')
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
        <div class="alert alert-danger alert-dismissible fade show">
            <strong>Whoops!</strong> Ada Error Untuk Customer.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
    </div>
    <div class="col-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <p class="card-title">Data Customer</p>
                <div class="card-tools">
                    {{-- Cari  --}}
                    <form action="{{route('cari.customer')}}" method="POST" class="form-inline btn btn-tool">
                        @csrf
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" name="cari" type="search" placeholder="Search"
                                aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-default" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <button data-target="#addk" data-toggle="modal" class="btn btn-outline-pimary"><i
                            class="fa fa-plus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Telp</th>                         
                            <th>Alamat</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no=1;
                        @endphp
                        @foreach ($data as $item)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->telp}}</td>
                            <td>{{$item->alamat}}</td>
                            <td>
                                <button class="btn btn-xs btn-outline-success mr-2" data-target="#ed{{$item->id}}"
                                    data-toggle="modal"><i class="fa fa-edit"></i></button>
                                {{-- <button class="btn btn-xs btn-outline-info mr-2" data-target="#ev{{$item->id}}"
                                data-toggle="modal"><i class="fa fa-eye"></i></button> --}}
                                <a href="{{route('del.customer',['id'=>$item->id,'token'=>csrf_token()])}}" onclick="return confirm('Apakah Anda ingin Menghapus Data ini?')" class="btn btn-xs btn-outline-danger mr-2"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        {{-- Modal Edit --}}
                        <div class="modal fade" id="ed{{$item->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <p class="modal-title">Edit Data</p>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('update.customer')}}" method="post">
                                            @csrf                                           
                                            <div class="form-group">
                                                <label for="">Isikan Nama</label>
                                                <input type="hidden" name="id" value="{{$item->id}}">
                                                <input type="text" name="nama" class="form-control"
                                                    value="{{$item->nama}}" placeholder="Isikan Nama">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Isikan alamat</label>
                                                <input type="text" name="alamat" class="form-control"
                                                    value="{{$item->alamat}}" placeholder="Isikan Nama">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Isikan Telepon</label>
                                                <input type="number" name="telp" class="form-control"
                                                    value="{{$item->telp}}" placeholder="Isikan Telepon">
                                            </div>                                            
                                            <div class="form-group">
                                                <button type="submit"
                                                    class=" btn btn-primary float-right">Simpan</button>
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
{{-- moadl add --}}
<div class="modal fade" id="addk">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title">Tambah Data</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('add.customer')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Isikan Nama</label>
                        <input type="text" name="nama" required class="form-control" value="{{old('nama')}}"
                            placeholder="Isikan Nama">
                    </div>
                    <div class="form-group">
                        <label for="">Isikan alamat</label>
                        <input type="text" name="alamat" required class="form-control" value="{{old('alamat')}}"
                            placeholder="Isikan Nama">
                    </div>
                    <div class="form-group">
                        <label for="">Isikan Telepon</label>
                        <input type="number" name="telp" required class="form-control" value="{{old('telp')}}"
                            placeholder="Isikan Telepon">
                    </div>
                    <div class="form-group">
                        <button type="submit"
                            class=" btn btn-primary float-right">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection