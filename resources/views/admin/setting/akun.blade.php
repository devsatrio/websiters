@extends('layoutadmin.app')
@section('title','Setting Akun')
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
                <p class="card-title">Update Akun</p>
            </div>
            <div class="card-body">
                @foreach ($data as $item)
                <form action="{{route('akun.update')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="col-lg-12 col-12">
                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <input type="hidden" name="id" value="{{$item->id}}">
                                    <input type="text" value="{{$item->nama}}" name="nama" class="form-control"
                                        placeholder="Isikan Nama">
                                </div>
                                <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" value="{{$item->username}}" name="username" class="form-control"
                                        placeholder="Isikan Username">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="col-lg-12 col-12">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" value="{{$item->email}}" name="email" class="form-control"
                                        placeholder="Isikan Email">
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" name="password" class="form-control"
                                        placeholder="Isikan Nama">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary float-right"> Simpan</button>
                    </div>
                </form>
                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection