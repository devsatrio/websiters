@extends('layoutadmin.app')
@section('title','Management User')
@section('content')
    <div class="row">
        <div class="col-lg-8 col-12">
            <div class="card">
                <div class="card-header">               
                    <h3 class="card-title">Data Admin</h3>                    
                    <div class="card-tools">
                        @if ($dus->c=='y')
                            <button data-target="#mdlusr" data-toggle="modal" class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-plus"></i>
                            </button>
                        @endif                        
                    </div>                                    
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Email</th>                            
                                    <th>Role</th>                            
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admin as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->nama}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->role}}</td>
                                        <td> 
                                            @if ($dus->u=='y')                                            
                                                <button data-target="#usr{{$item->id}}" data-toggle="modal" class="btn btn-xs btn-outline-success mr-2"><i class="fa fa-edit"></i></button>
                                            @else
                                               -
                                            @endif       
                                            @if ($dus->d=='y')
                                                <a href="{{route('user.delete',['id'=>$item->id,'token'=>csrf_token()])}}" class="btn btn-xs btn-outline-danger mr-2"><i class="fa fa-trash"></i></a>    
                                            @else
                                                -
                                            @endif                                            
                                        </td>
                                    </tr>
                                    {{-- Modal Update --}}
                                    <div class="modal fade" id="usr{{$item->id}}" aria-modal="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <p class="modal-title">Update Data</p>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">×</span>
                                                    </button>  
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('user.update')}}" method="post">
                                                        @csrf
                                                        <div class="form-group{{$errors->has('nama') ? 'has-error':''}}">
                                                            <label for="">Name</label>
                                                            <input type="hidden" name="id" value="{{$item->id}}">
                                                            <input type="text" name="nama" value="{{$item->nama}}" class="form-control" placeholder="Masukan Nama" required>
                                                            <small class="text-danger">{{$errors->first('nama')}}</small>
                                                        </div>
                                                        <div class="form-group{{$errors->has('email') ? 'has-error':''}}">
                                                            <label for="">Email</label>
                                                            <input type="email" name="email" value="{{$item->email}}" class="form-control" placeholder="Masukan Email" required>
                                                            <small class="text-danger">{{$errors->first('nama')}}</small>
                                                        </div>
                                                        <div class="form-group{{$errors->has('password') ? 'has-error':''}}">
                                                            <label for="">Password</label>
                                                            <input type="password" name="password" class="form-control" placeholder="Masukan Password">
                                                            <small class="text-danger">{{$errors->first('nama')}}</small>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Set Role</label>
                                                            <select class="form-control" name="role" id="">                                                                
                                                                <option value="{{$item->idr}}" selected>{{$item->role}}</option>
                                                                @foreach ($role as $rt)
                                                                    <option value="{{$rt->id}}">{{$rt->role}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-info float-right"> Update</button>
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
        {{-- Modal user Add --}}
            <div class="modal fade" id="mdlusr" aria-modal="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <p>Tambah Data Admin</p>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>                            
                        </div>
                        <div class="modal-body">
                            <form action="{{route('user.add')}}" method="post">
                                @csrf
                                <div class="form-group{{$errors->has('nama') ? 'has-error':''}}">
                                    <label for="">Name</label>
                                    <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required>
                                    <small class="text-danger">{{$errors->first('nama')}}</small>
                                </div>
                                <div class="form-group{{$errors->has('email') ? 'has-error':''}}">
                                    <label for="">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Masukan Email" required>
                                    <small class="text-danger">{{$errors->first('email')}}</small>
                                </div>
                                <div class="form-group{{$errors->has('password') ? 'has-error':''}}">
                                    <label for="">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Masukan Password" required>
                                    <small class="text-danger">{{$errors->first('password')}}</small>
                                </div>
                                <div class="form-group">
                                    <label for="">Set Role</label>
                                    <select class="form-control" name="role" id="">
                                        <option disabled selected>Pilih Role</option>
                                        @foreach ($role as $rt)
                                            <option value="{{$rt->id}}">{{$rt->role}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary float-right"> Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        {{-- -------------- --}}   
        <div class="col-lg-4 col-12">
            <div class="card">
                <div class="card-header">
                    <p class="card-title">Data Role</p>
                    <div class="card-tools">
                        @if ($drl->c=='y')
                            <button data-target="#addrole" data-toggle="modal" class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-plus"></i>
                            </button>  
                        @endif                        
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($role as $r)
                                    <tr>
                                        <td>{{$r->id}}</td>
                                        <td>{{$r->role}}</td>
                                        <td>
                                            @if ($drl->u=='y')
                                                <button data-target="#mdlrole{{$r->id}}" data-toggle="modal" class="btn btn-outline-primary btn-xs mr-2"><i class="fa fa-edit"></i></button>    
                                            @else
                                            -
                                            @endif
                                            @if ($drl->d=='y')
                                                <a href="{{route('role.delete',['id'=>$r->id,'token'=>csrf_token()])}}"  class="btn btn-outline-danger btn-xs mr-2"><i class="fa fa-trash"></i></a>    
                                            @else
                                            -
                                            @endif
                                        </td>
                                    </tr>
                                    <div class="modal" id="mdlrole{{$r->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <p>Update Data Role</p>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">×</span>
                                                </button>      
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('role.update')}}" method="post">
                                                @csrf
                                                <div class="form-group{{$errors->has('role') ? 'has-error':''}}">
                                                    <label for="">Nama Role</label>
                                                    <input type="hidden" name="id" value="{{$r->id}}">
                                                    <input type="text" name="role" value="{{$r->role}}" class="form-control" placeholder="Nama Role" required>
                                                    <small class="text-danger">{{$errors->first('role')}}</small>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-info float-right">Update</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Modal update --}}
                                <div class="modal" id="mdlrole{{$r->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <p>Update Data Role</p>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">×</span>
                                                    </button>      
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('role.update')}}" method="post">
                                                    @csrf
                                                    <div class="form-group{{$errors->has('role') ? 'has-error':''}}">
                                                        <label for="">Nama Role</label>
                                                        <input type="hidden" name="id" value="{{$r->id}}">
                                                        <input type="text" name="role" value="{{$r->role}}" class="form-control" placeholder="Nama Role" required>
                                                        <small class="text-danger">{{$errors->first('role')}}</small>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-info float-right">Update</button>
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
        {{-- Modal add Role --}}
        <div class="modal" id="addrole">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <p>Tambah Data Role</p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button> 
                    </div>
                    <div class="modal-body">
                        <form action="{{route('role.add')}}" method="post">
                            @csrf
                            <div class="form-group{{$errors->has('role') ? 'has-error':''}}">
                                <label for="">Nama Role</label>
                                <input type="text" name="role" class="form-control" placeholder="Nama Role" required>
                                <small class="text-danger">{{$errors->first('role')}}</small>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary float-right">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-12">
            <div class="card">
                <div class="card-header">
                    <p class="card-title">Data Modul</p>
                    <div class="card-tools">
                        <button data-target="#mdlmodule" data-toggle="modal"  class="btn btn-sm btn-outline-primary">
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
                                    <th>Menu</th>
                                    @foreach ($role as $item)
                                    <td>
                                        {{$item->role}}
                                    </td>
                                    @endforeach
                                </tr>                        
                            </thead>
                            <tbody>
                                @php
                                    $no=1;            
                                @endphp
                                @foreach ($menu as $item)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$item->menu}}</td>
                                        @php
                                            $mod=DB::table('moduls')
                                            ->select(DB::raw('menuses.*,moduls.*,mroles.*,mroles.id as idr, menuses.id as idm'))
                                            ->join('mroles','mroles.id','=','moduls.idrole')
                                            ->leftjoin('menuses','menuses.id','=','moduls.idmodul')
                                            ->where('idmodul',$item->id)
                                            ->get();
                                        @endphp
                                        @foreach ($mod as $md)
                                            <td>
                                                <form action="{{route('modul.update')}}" method="post">
                                                    @csrf
                                                    <div class="fomr-group">
                                                        <input type="hidden" name="idr" value="{{$md->idr}}">
                                                        <input type="hidden" name="idm" value="{{$md->idm}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="custom-control custom-checkbox">
                                                          <input class="form-check-input" type="checkbox" name="c1" id="" @if ($md->view=='y')
                                                              checked
                                                          @endif>
                                                          <label for="">View</label>
                                                        </div> 
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="form-check-input" type="checkbox" name="c2" id="" @if ($md->c=='y')
                                                            checked
                                                        @endif>
                                                            <label for="">Add</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="form-check-input" type="checkbox" name="c3" id="" @if ($md->u=='y')
                                                            checked
                                                        @endif>
                                                            <label for="">Update</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="form-check-input" type="checkbox" name="c4" id=""@if ($md->d=='y')
                                                            checked
                                                        @endif>
                                                            <label for="">Delete</label>
                                                        </div>
                                                    </div>
                                                    {{-- @if ($dmd->u=='y') --}}
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                                                        </div>
                                                    {{-- @endif --}}
                                                </form>
                                            </td>
                                        @endforeach                                                           
                                    </tr>
                                @endforeach                        
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>  
        {{-- Modal Add Modul --}}
        <div class="modal fade" id="mdlmodule">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <p class="modal-title">Tambah Module</p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button> 
                    </div>
                    <div class="modal-body">
                        <form action="{{route('modul.add')}}" method="post">
                            @csrf
                            <div class="form-group{{$errors->has('modul') ? 'has-error':''}}">
                                <label for="">Modul Baru</label>
                                <select class="form-control" name="modul">
                                    <option disabled selected>Pilih Menu</option>
                                @foreach ($menu as $item)
                                    <option value="{{$item->id}}">{{$item->menu}}</option>        
                                @endforeach
                                </select>                        
                                <small class="text-danger">{{$errors->first('modul')}}</small>
                            </div>
                            <div class="form-group">
                                <label for="">Roles</label>
                                <select name="role" id="" class="form-control{{$errors->has('role') ? 'has-error':''}}">
                                    <option selected disabled>pilih Role</option>
                                    @foreach ($role as $rl)
                                        <option value="{{$rl->id}}">{{$rl->role}}</option>
                                    @endforeach
                                </select>
                                <small class="text-danger">{{$errors->first('role')}}</small>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-3">
                                        <div class="custom-control custom-checkbox">
                                          <input name="v" class="custom-control-input" type="checkbox" id="c1" >
                                          <label for="c1" class="custom-control-label">View</label>
                                        </div> 
                                    </div>
                                    <div class="col-lg-3 col-3">
                                        <div class="custom-control custom-checkbox">
                                          <input name="c" class="custom-control-input" type="checkbox" id="c2" >
                                          <label for="c2" class="custom-control-label">Add</label>
                                        </div> 
                                    </div>
                                    <div class="col-lg-3 col-3">
                                        <div class="custom-control custom-checkbox">
                                          <input name="u" class="custom-control-input" type="checkbox" id="c3" >
                                          <label for="c3" class="custom-control-label">Update</label>
                                        </div> 
                                    </div>
                                    <div class="col-lg-3 col-3">
                                        <div class="custom-control custom-checkbox">
                                          <input name="d" class="custom-control-input" type="checkbox" id="c4" >
                                          <label for="c4" class="custom-control-label">Delete</label>
                                        </div> 
                                    </div>
                                </div>                                            
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-primary float-right"> Add modul</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection