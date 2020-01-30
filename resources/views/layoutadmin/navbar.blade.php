<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <span class="brand-text font-weight-light">RS Abu Bakar</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
      </div>
      <div class="info">
        <p>
          <a href="#" class="d-block">{{Auth::user()->nama}}</a>
        </p>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->               
         <li class="nav-item">
           <a href="{{route('admin.dashboard')}}" class="nav-link active">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Beranda
            </p>
          </a>
        </li>           
        @if($trx->view=='y')
        <!-- <li class="nav-item has-treeview">
              <a href="" class="nav-link">
                  <i class="fa fa-map-signs nav-icon"></i>
                  <p>Menu Transaksi 
                    <i class="fas fa-angle-left right"></i>
                  </p>
              </a>
              <ul class="nav-item nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('trx')}}" class="nav-link">
                        <i class="fa fa-cart-plus nav-icon"></i>
                        <p>Trx Produk</p>
                    </a>
                  </li>                 
                  <li class="nav-item">
                    <a href="{{route('trx.piutang')}}" class="nav-link">
                        <i class="fa fa-check-square nav-icon"></i>
                        <p>Piutang & Lunas</p>
                    </a>
                  </li>                  
                  <li class="nav-item">
                    <a href="{{route('trx.pengeluaran')}}" class="nav-link">
                        <i class="fa fa-upload nav-icon"></i>
                        <p>Pengeluaran</p>
                    </a>
                  </li>                  
              </ul>
          </li> -->
          @endif
          @if ($bl->r=='y')
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-rainbow"></i>
                <p>
                  Artikel 
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                  @if ($bl->c)
                  <li class="nav-item">
                      <a href="{{route('artikel.add')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Tulis Baru</p>
                      </a>
                    </li>
                  @endif 
                <li class="nav-item">
                  <a href="{{route('kategori')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Kategori</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('artikel')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Artikel</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('galeri')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Buat Galeri</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('slider')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Slider Image</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('vid')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Youtube Video</p>
                  </a>
                </li>
              </ul>
            </li>
          @endif
          @if ($dt->view=='y')
          <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-address-book"></i>
              <p>
                Master Data
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                      <a href="{{route('pakan')}}" class="nav-link">
                          <i class="fa fa-list nav-icon"></i>
                          <p>Katalog Pakan</p>
                      </a>
                  </li>
              <li class="nav-item">
                <a href="{{route('katalog')}}" class="nav-link">
                  <i class="fa fa-dolly nav-icon"></i>
                  <p>Katalog Produk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('karyawan')}}" class="nav-link">
                  <i class="fa fa-diagnoses nav-icon"></i>
                  <p>Data Karyawan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('customer')}}" class="nav-link">
                  <i class="fa fa-users nav-icon"></i>
                  <p>Data Customer</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                      <a href="" class="nav-link">
                          <i class="fa fa-truck-loading nav-icon"></i>
                          <p>Data Agen</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="" class="nav-link">
                          <i class="fa fa-user nav-icon"></i>
                          <p>Data Customer</p>
                      </a>
                  </li>                                
                  --}}
            </ul>
          </li> -->
          @endif
          @if ($lap->view=='y')
          <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-envelope-open-text"></i>
              <p>
                Laporan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('laporan.track')}}" class="nav-link">
                  <i class="fa fa-route nav-icon"></i>
                  <p>Laporan Track</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-donate nav-icon"></i>
                  <p>Laporan Trx</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-box nav-icon"></i>
                  <p>Laporan Stok</p>
                </a>
              </li>
            </ul>
          </li> -->
          @endif
          @if ($drl->view=='y')
          <li class="nav-item">
            <a href="{{route('role')}}" class="nav-link">
              <i class="fas fa-hashtag nav-icon"></i>
              <p>Manajemen User</p>
            </a>
          </li>
          @endif
      @if ($st->view=='y')
      <li class="nav-item">
        <a href="{{route('setting')}}" class="nav-link">
          <i class="fas fa-passport nav-icon"></i>
          <p>Setting Web</p>
        </a>
      </li>
      @endif
        <li class="nav-item">
          <a href="{{route('akun.setting')}}" class="nav-link">
            <i class="fas fa-cog nav-icon"></i>
            <p>Setting Akun</p>
          </a>
        </li>      
        <li class="nav-item">
          <a href="{{route('admin.logout')}}" class="nav-link">
            <p>Logout
              <i class="fas fa-power-off nav-icon right"></i>
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>