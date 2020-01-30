@extends('layoutadmin.app')
@section('title','Setting Web')
@section('content')
<div class="row">
    <div class="col-lg-12 col-12">
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
        <div class="card">
            <div class="card-header">
                <p class="card-title">Setting Web</p>
            </div>
            <div class="card-body">
                @foreach ($data as $item)
                <form action="{{route('setting.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <button type="submit" class="btn btn-primary float-right mr-2">Simpan</button>
                        </div>
                        <br>
                        <br>
                        <div class="col-lg-12 col-12">
                            <div class="row">
                                <div class="col-lg-4 col-12">
                                    <p style="background:cadetblue;padding:10px;color:white"><b>Umum</b></p>
                                    <hr>
                                    <div class="col-lg-12 col-12">
                                        <div class="row">
                                            <div class="col-lg-8 col-8">
                                                <div class="form-group">
                                                    <label for="">Icon</label>
                                                    <input type="file" name="ico" id="ico" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-4">
                                                <img src="{{asset('logo/'.$item->ico)}}" id="imgv1" width="100"
                                                    height="100" class="img-thumbnail">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-12">
                                        <div class="row">
                                            <div class="col-lg-8 col-8">
                                                <div class="form-group">
                                                    <label for="">Logo</label>
                                                    <input type="file" name="logo" id="logo" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-4">
                                                <img src="{{asset('logo/'.$item->logo)}}" id="imgv2" width="100"
                                                    height="100" class="img-thumbnail">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="hidden" name="id" value="{{$item->id}}">
                                            <label for="">Nama Web</label>
                                            <input type="text" required name="nama" value="{{$item->web}}"
                                                class="form-control" placeholder="Isikan Nama Web">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="">Telp 1</label>
                                            <input type="text" required name="telp1" value="{{$item->telp1}}"
                                                class="form-control" placeholder="Isikan Nomer Telp 1">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="">Telp 2</label>
                                            <input type="text" required name="telp2" value="{{$item->telp2}}"
                                                class="form-control" placeholder="Isikan Nomer Telp 2">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="">Alamat</label>
                                            <input type="text" required name="alamat" value="{{$item->alamat}}"
                                                class="form-control" placeholder="Isikan Alamat">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="">Kota/Kabupaten</label>
                                            <input type="text" required name="kokab" value="{{$item->kokab}}"
                                                class="form-control" placeholder="Isikan Kota/Kabupaten">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="">Provinsi</label>
                                            <input type="text" required name="prov" value="{{$item->provinsi}}"
                                                class="form-control" placeholder="Isikan Provinsi">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <p style="background:cadetblue;padding:10px;color:white"><b>Social Media</b></p>
                                    <hr>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="text" required name="email" value="{{$item->email}}"
                                                class="form-control" placeholder="Isikan Email">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="">Youtube</label>
                                            <input type="text" required name="yt" value="{{$item->yt}}"
                                                class="form-control" placeholder="Isikan Youtube">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="">Facebook</label>
                                            <input type="text" required name="fb" value="{{$item->fb}}"
                                                class="form-control" placeholder="Isikan Facebook">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="">Instagram</label>
                                            <input type="text" required name="ig" value="{{$item->ig}}"
                                                class="form-control" placeholder="Isikan Instagram">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="">Twitter</label>
                                            <input type="text" required name="tw" value="{{$item->twitter}}"
                                                class="form-control" placeholder="Isikan Twitter">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <p style="background:cadetblue;padding:10px;color:white"><b>Informasi</b></p>
                                    <hr>
                                    <div class="col-lg-12 col-12">
                                        <div class="form-group">
                                            <label for="">Map</label>
                                            <input type="text" required name="map" value="{{$item->map}}"
                                                class="form-control" placeholder="isikan Map">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Motto</label>
                                            <input type="text" required name="motto" value="{{$item->motto}}" class="is"
                                                placeholder="isikan Motto">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Keterangan</label>
                                            <input type="text" required name="ket" value="{{$item->keterangan}}"
                                                class="is" placeholder="isikan Keterangan">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Informasi</label>
                                            <input type="text" required name="info" value="{{$item->informasi}}"
                                                class="is" placeholder="isikan Informasi">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{asset('tinymce/tinymce.js')}}"></script>
<script>
    tinymce.init({
        selector:'input.is',
        toolbar:'| fontselect fontsizeselect formatselect',    
    });
    function simage1(input){
            if(input.files && input.files[0]){
                var reader=new FileReader();
                reader.onload=function(e){
                    $('#imgv1').attr('src',e.target.result);                   
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    function simage2(input){
            if(input.files && input.files[0]){
                var reader=new FileReader();
                reader.onload=function(e){
                    $('#imgv2').attr('src',e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $('#ico').change(function(){
            simage1(this);
        });
        $('#logo').change(function(){
            simage2(this);
        });
        $('.toastrDefaultSuccess').click(function() {
            toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
</script>
@endsection