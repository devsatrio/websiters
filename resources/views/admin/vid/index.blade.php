@extends('layoutadmin.app')
@section('title','VidTube')
@section('content')
<div class="row">
    <div class="col-lg-12 col-12">
        <div class="card">
            <div class="card-header">
                <p class="card-title">Data VidTube</p>
                <div class="card-tools">
                    {{-- Cari  --}}
                    <form class="form-inline btn btn-tool">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-default" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <button data-target="#add" data-toggle="modal" class="btn btn-sm btn-outline-primary">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>judul</th>
                                <th>url</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->judul}}</td>
                                <td>{{$item->url}} <a href="{{$item->url}}"
                                        class="float-right btn btn-primary btn-sm"><i class="fa fa-link"></i></a></td>
                                <td>
                                    <button data-target="#edit{{$item->id}}" data-toggle="modal"
                                        class="btn btn-sm btn-outline-success mr-2"><i class="fa fa-edit"></i></button>
                                    <a href="{{route('vid.delete',['id'=>$item->id,'token'=>csrf_token()])}}"
                                        onclick="return confirm('Apakah anda ingin menghapus data ini?')"
                                        class="btn btn-sm btn-outline-danger mr-2"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            {{-- modal update --}}
                            <div class="modal fade" id="edit{{$item->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <p class="modal-title">Add Data</p>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('vid.update')}}" method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="">Deskripsi Video</label>
                                                    <input type="hidden" name="id" value="{{$item->id}}">
                                                    <input type="text" value="{{$item->judul}}" class="form-control"
                                                        placeholder="Masukan Deskripsi" name="judul">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Url Video</label>
                                                    <input type="text" value="{{$item->url}}" class="form-control"
                                                        placeholder="Masukan Url" name="url">
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit"
                                                        class="btn btn-primary float-right">Simpan</button>
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
{{-- Modal Add --}}
<div class="modal fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title">Add Data</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('vid.add')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Deskripsi Video</label>
                        <input type="text" class="form-control" placeholder="Masukan Deskripsi" name="judul">
                    </div>
                    <div class="form-group">
                        <label for="">Url Video</label>
                        <input type="text" class="form-control" placeholder="Masukan Url" name="url">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary float-right">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection