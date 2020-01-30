@extends('layoutadmin.app')
@section('title','Karyawan')
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
            <strong>Whoops!</strong> Ada Error Untuk Produk.<br><br>
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
                <p class="card-title">Data Karyawan</p>
                <div class="card-tools">
                    <button data-target="#addk" data-toggle="modal" class="btn btn-outline-pimary"><i
                            class="fa fa-plus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Telp</th>
                            <th>Tgl Masuk</th>
                            <th>Tgl Kontrak</th>
                            <th>Tgl Kontrak Habis</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{$item->nip}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->telp}}</td>
                            <td>{{$item->tgl_masuk}}</td>
                            <td>{{$item->tgl_kotrak}}</td>
                            <td>{{$item->tgl_kotrak_habis}}</td>
                            <td>
                                <button class="btn btn-xs btn-outline-success mr-2" data-target="#ed{{$item->id}}"
                                    data-toggle="modal"><i class="fa fa-edit"></i></button>
                                {{-- <button class="btn btn-xs btn-outline-info mr-2" data-target="#ev{{$item->id}}"
                                data-toggle="modal"><i class="fa fa-eye"></i></button> --}}
                                <a href="{{route('del.karyawan',['id'=>$item->id,'token'=>csrf_token()])}}" onclick="return confirm('Apakah Anda ingin Menghapus Data ini?')" class="btn btn-xs btn-outline-danger mr-2"><i class="fa fa-trash"></i></a>
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
                                        <form action="{{route('update.karyawan')}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="">Isikan NIP</label>
                                                <input type="hidden" name="id" value="{{$item->id}}">
                                                <input type="text" name="nip" class="form-control"
                                                    value="{{$item->nip}}" placeholder="Isikan NIP">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Isikan Nama</label>
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
                                            <div class="row">
                                                <div class="col-lg-4 col-12">
                                                    <div class="form-group">
                                                        <label for=""> Kecamatan</label>
                                                        <input type="text" name="kec" class="form-control"
                                                            value="{{$item->kecamatan}}" placeholder="Isikan Kecamatan">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-12">
                                                    <div class="form-group">
                                                        <label for=""> Kota/Kab</label>
                                                        <input type="text" name="kota" class="form-control"
                                                            value="{{$item->kot_kab}}" placeholder="Isikan Kota/Kabupaten">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-12">
                                                    <div class="form-group">
                                                        <label for=""> Provinsi</label>
                                                        <input type="text" name="provinsi" class="form-control"
                                                            value="{{$item->provinsi}}" placeholder="Isikan Provinsi">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-12">
                                                    <div class="form-group">
                                                        <label for=""> username</label>
                                                        <input type="text" name="username" class="form-control"
                                                            value="{{$item->username}}" placeholder="Isikan username">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-12">
                                                    <div class="form-group">
                                                        <label for=""> Password</label>
                                                        <input type="text" name="password" class="form-control"
                                                            value="{{old('password')}}" placeholder="Isikan password">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-12">
                                                    <div class="form-group">
                                                        <label for="">Status Karyawan</label>
                                                        <select name="st" class="form-control" id="">
                                                            @if ($item->status=='baru')
                                                            <option value="{{$item->status}}">Baru</option>                                                            
                                                            @else
                                                            <option value="{{$item->status}}">Lama</option>
                                                            @endif
                                                            <option value="baru">Baru</option>
                                                            <option value="lama">Lama</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-12">
                                                    <div class="form-group">
                                                        <label for="">Tanggal Masuk</label>
                                                        <input type="text" name="masuk" placeholder="Tanggal"
                                                            value="{{$item->tgl_masuk}}" readonly class="form-control dat">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-12">
                                                    <div class="form-group">
                                                        <label for="">Tanggal Kontrak</label>
                                                        <input type="text" name="kontrak" placeholder="Tanggal"
                                                            value="{{$item->tgl_kotrak}}" readonly
                                                            class="form-control dat">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-12">
                                                    <div class="form-group">
                                                        <label for="">Akhir Kontrak</label>
                                                        <input type="text" name="akhir" placeholder="Tanggal"
                                                            value="{{$item->tgl_kotrak_habis}}" readonly class="form-control dat">
                                                    </div>
                                                </div>
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
{{-- Modal ADd Karyawan --}}
<div class="modal" id="addk">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title">Add Karyawan</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('add.karyawan')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Isikan NIP</label>
                        <input type="text" name="nip" required class="form-control" value="{{old('nip')}}"
                            placeholder="Isikan NIP">
                    </div>
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
                    <div class="row">
                        <div class="col-lg-4 col-12">
                            <div class="form-group">
                                <label for=""> Kecamatan</label>
                                <input type="text" name="kec" required class="form-control" value="{{old('kec')}}"
                                    placeholder="Isikan Kecamatan">
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="form-group">
                                <label for=""> Kota/Kab</label>
                                <input type="text" name="kota" class="form-control" value="{{old('kota')}}"
                                    placeholder="Isikan Kota/Kabupaten">
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="form-group">
                                <label for=""> Provinsi</label>
                                <input type="text" name="provinsi" required class="form-control" value="{{old('provinsi')}}"
                                    placeholder="Isikan Provinsi">
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="form-group">
                                <label for=""> username</label>
                                <input type="text" name="username" required class="form-control" value="{{old('username')}}"
                                    placeholder="Isikan username">
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="form-group">
                                <label for=""> Password</label>
                                <input type="text" name="password" required class="form-control" value="{{old('password')}}"
                                    placeholder="Isikan password">
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="form-group">
                                <label for="">Status Karyawan</label>
                                <select name="st" class="form-control" id="">
                                    <option value="baru">Baru</option>
                                    <option value="lama">Lama</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="form-group">
                                <label for="">Tanggal Masuk</label>
                                <input type="text" name="masuk" required placeholder="Tanggal" value="{{old('masuk')}}" readonly
                                    class="form-control dat">
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="form-group">
                                <label for="">Tanggal Kontrak</label>
                                <input type="text" name="kontrak" required placeholder="Tanggal" value="{{old('kontrak')}}"
                                    readonly class="form-control dat">
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="form-group">
                                <label for="">Akhir Kontrak</label>
                                <input type="text" name="akhir" required placeholder="Tanggal" value="{{old('akhir')}}" readonly
                                    class="form-control dat">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class=" btn btn-primary float-right">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $('.dat').datepicker({
            format: 'yyyy-mm-dd',
        });
</script>
@endsection