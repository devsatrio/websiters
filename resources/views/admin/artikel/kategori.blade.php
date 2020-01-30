@extends('layoutadmin.app')
@section('title','Kategori Artikel')
@section('content')
    <div class="row">
        <div class="col-lg-6 col-6">
            <div class="card">
                <div class="card-header">
                    <p class="card-title">Kategori</p>
                    <div class="card-tools">
                        <button data-target="#addkategori" data-toggle="modal" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kat as $k)
                                    <tr>
                                        <td>{{$k->id}}</td>
                                        <td>{{$k->kategori}}</td>
                                        <td>
                                            <button data-target="#kt{{$k->id}}" data-toggle="modal" class="btn btn-xs btn-outline-success mr-2"><i class="fa fa-edit"></i></button>
                                            <a href="{{route('kategori.delete',['id'=>$k->id,'token'=>csrf_token()])}}" class="btn btn-xs btn-outline-danger mr-2"><i class="fa fa-trash"></i></a>    
                                        </td>
                                    </tr>
                                    {{-- modal --}}
                                    <div class="modal fade" id="kt{{$k->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <p class="modal-title">Edit Data</p>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('kategori.update')}}" method="post">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="">Kategori</label>
                                                            <input type="hidden" name="id" value="{{$k->id}}">
                                                            <input type="text" name="kategori" value="{{$k->kategori}}" class="form-control" placeholder="Isikan Kategori">
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-primary float-right">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- ----- --}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    {{-- Modal Add Kategori --}}
    <div class="modal fade" id="addkategori">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title">Tambah Data</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('kategori.add')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Kategori</label>
                            <input type="text" name="kategori" class="form-control" placeholder="Isikan Kategori">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary float-right">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- ------------------ --}}
        <div class="col-lg-6 col-6">
            <div class="card">
                <div class="card-header">
                    <p class="card-title">Sub Kategori</p>
                     <div class="card-tools">
                        <button data-target="#addsubkategori" data-toggle="modal" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th>sub kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sk as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->kategori}}</td>
                                        <td>{{$item->subkategori}}</td>
                                        <td>
                                            <button data-target="#sk{{$item->id}}" data-toggle="modal" class="btn btn-xs btn-outline-success mr-2"><i class="fa fa-edit"></i></button>
                                            <a href="{{route('subkategori.delete',['id'=>$item->id,'token'=>csrf_token()])}}" onclick="return confirm('Apakah Kamu Ingin Menghapus data Ini?')" class="btn btn-xs btn-outline-danger mr-2"><i class="fa fa-trash"></i></a>    
                                        </td>
                                    </tr>
                                    {{-- Modal Update --}}
                                    <div class="modal fade" id="sk{{$item->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <p class="modal-title">Update Data</p>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('subkategori.update')}}" method="post">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="">Sub Kategori</label>
                                                            <input type="hidden" name="id" value="{{$item->id}}">
                                                            <input type="text" value="{{$item->subkategori}}" name="subkategori" class="form-control" placeholder="Isikan Sub Kategori">
                                                        </div>
                                                        <div class="form-group">
                                                            @php
                                                                $kate=DB::table('kategoris')->get();
                                                            @endphp
                                                            <select name="kat" class="form-control" id="">
                                                                <option value="{{$item->idk}}">{{$item->kategori}}</option>
                                                                @foreach ($kate as $it)
                                                                    <option value="{{$it->id}}">{{$it->kategori}}</option>
                                                                @endforeach                                
                                                            </select>
                                                        </div>                                                
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-primary float-right">Simpan</button>
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
    {{-- Modal Add sub Kategori --}}
    <div class="modal fade" id="addsubkategori">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <p class="modal-title">Tambah Data</p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('subkategori.add')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Sub Kategori</label>
                                <input type="text" name="subkategori" class="form-control" placeholder="Isikan Sub Kategori">
                            </div>
                            <div class="form-group">
                                <select name="kat" class="form-control" id="">
                                    <option selected disabled>Pilih Kategori</option>
                                    @foreach ($kat as $item)
                                        <option value="{{$item->id}}">{{$item->kategori}}</option>
                                    @endforeach                                
                                </select>
                            </div>                                                
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary float-right">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- ------------------ --}}
@endsection