<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Responsive Admin Dashboard Template">
        <meta name="keywords" content="admin,dashboard">
        <meta name="author" content="stacks">
        <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        
        <!-- Title -->
        <title>@yield('title')</title>

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700,800&display=swap" rel="stylesheet">
        <link href="{{ asset('../../assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('../../assets/plugins/font-awesome/css/all.min.css') }}" rel="stylesheet">
        <link href="{{ asset('../../assets/plugins/perfectscroll/perfect-scrollbar.css') }}" rel="stylesheet">
        <link href="{{ asset('../../assets/plugins/DataTables/datatables.min.css') }}" rel="stylesheet">   

      
        <!-- Select2 -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css" integrity="sha512-CbQfNVBSMAYmnzP3IC+mZZmYMP2HUnVkV4+PwuhpiMUmITtSpS7Prr3fNncV1RBOnWxzz4pYQ5EAGG4ck46Oig==" crossorigin="anonymous" referrerpolicy="no-referrer" rel="stylesheet" />

        <!-- Theme Styles -->
        <link href="{{ asset('../../assets/css/main.min.css') }}" rel="stylesheet">
        <link href="{{ asset('../../assets/css/custom.css') }}" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class='loader'>
            <div class='spinner-grow text-primary' role='status'>
              <span class='sr-only'>Loading...</span>
            </div>
        </div>

        <div class="page-container">
            <div class="page-header">
                <nav class="navbar navbar-expand-lg d-flex justify-content-between">
                  <div class="" id="navbarNav">
                    <ul class="navbar-nav" id="leftNav">
                      <li class="nav-item">
                        <a class="nav-link" id="sidebar-toggle" href="#"><i data-feather="arrow-left"></i></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Settings</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Help</a>
                      </li>
                    </ul>
                    </div>
                    <div class="logo">
                      <a class="navbar-brand" href="index.html"></a>
                    </div>
                    <div class="" id="headerNav">
                      <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                          <a class="nav-link search-dropdown" href="#" id="searchDropDown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i data-feather="search"></i></a>
                          <div class="dropdown-menu dropdown-menu-end dropdown-lg search-drop-menu" aria-labelledby="searchDropDown">
                            <form>
                              <input class="form-control" type="text" placeholder="Type something.." aria-label="Search">
                            </form>
                            <h6 class="dropdown-header">Recent Searches</h6>
                            <a class="dropdown-item" href="#">charts</a>
                            <a class="dropdown-item" href="#">new orders</a>
                            <a class="dropdown-item" href="#">file manager</a>
                            <a class="dropdown-item" href="#">new users</a>
                          </div>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link notifications-dropdown" href="#" id="notificationsDropDown" role="button" data-bs-toggle="dropdown" aria-expanded="false">3</a>
                          <div class="dropdown-menu dropdown-menu-end notif-drop-menu" aria-labelledby="notificationsDropDown">
                            <h6 class="dropdown-header">Notifications</h6>
                            <a href="#">
                              <div class="header-notif">
                                <div class="notif-image">
                                  <span class="notification-badge bg-info text-white">
                                    <i class="fas fa-bullhorn"></i>
                                  </span>
                                </div>
                                <div class="notif-text">
                                  <p class="bold-notif-text">faucibus dolor in commodo lectus mattis</p>
                                  <small>19:00</small>
                                </div>
                              </div>
                            </a>
                            <a href="#">
                              <div class="header-notif">
                                <div class="notif-image">
                                  <span class="notification-badge bg-primary text-white">
                                    <i class="fas fa-bolt"></i>
                                  </span>
                                </div>
                                <div class="notif-text">
                                  <p class="bold-notif-text">faucibus dolor in commodo lectus mattis</p>
                                  <small>18:00</small>
                                </div>
                              </div>
                            </a>
                            <a href="#">
                              <div class="header-notif">
                                <div class="notif-image">
                                  <span class="notification-badge bg-success text-white">
                                    <i class="fas fa-at"></i>
                                  </span>
                                </div>
                                <div class="notif-text">
                                  <p>faucibus dolor in commodo lectus mattis</p>
                                  <small>yesterday</small>
                                </div>
                              </div>
                            </a>
                            <a href="#">
                              <div class="header-notif">
                                <div class="notif-image">
                                  <span class="notification-badge">
                                    <img src="../../assets/images/avatars/profile-image.png" alt="">
                                  </span>
                                </div>
                                <div class="notif-text">
                                  <p>faucibus dolor in commodo lectus mattis</p>
                                  <small>yesterday</small>
                                </div>
                              </div>
                            </a>
                            <a href="#">
                              <div class="header-notif">
                                <div class="notif-image">
                                  <span class="notification-badge">
                                    <img src="../../assets/images/avatars/profile-image.png" alt="">
                                  </span>
                                </div>
                                <div class="notif-text">
                                  <p>faucibus dolor in commodo lectus mattis</p>
                                  <small>yesterday</small>
                                </div>
                              </div>
                            </a>
                          </div>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link profile-dropdown" href="#" id="profileDropDown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img src="../../assets/images/avatars/profile-image.png" alt=""></a>
                          <div class="dropdown-menu dropdown-menu-end profile-drop-menu" aria-labelledby="profileDropDown">
                            <a class="dropdown-item" href="#"><i data-feather="user"></i>Profile</a>
                            <a class="dropdown-item" href="#"><i data-feather="inbox"></i>Messages</a>
                            <a class="dropdown-item" href="#"><i data-feather="edit"></i>Activities<span class="badge rounded-pill bg-success">12</span></a>
                            <a class="dropdown-item" href="#"><i data-feather="check-circle"></i>Tasks</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><i data-feather="settings"></i>Settings</a>
                            <a class="dropdown-item" href="#"><i data-feather="unlock"></i>Lock</a>
                            <a class="dropdown-item" href="#"><i data-feather="log-out"></i>Logout</a>
                          </div>
                        </li>
                      </ul>
                  </div>
                </nav>
            </div>
            <div class="page-sidebar">
                <ul class="list-unstyled accordion-menu">
                  <li class="sidebar-title">
                    Main
                  </li>
                  <li>
                    <a href="index.html"><i data-feather="home"></i>Dashboard</a>
                  </li>
                  <li class="sidebar-title">
                    Apps
                  </li>
                  <li>
                    <a href="{{ route('rak.index') }}"><i data-feather="archive"></i>Rak</a>
                  </li>
                  <li>
                    <a href="{{ route('satuan.index') }}"><i data-feather="divide-square"></i>Satuan Barang</a>
                  </li>
                  <li>
                    <a href="{{ route('kategori.index') }}"><i data-feather="grid"></i>Kategori</a>
                  </li><li>
                    <a href="{{ route('barang.index') }}"><i data-feather="gift"></i>Barang</a>
                  </li>
                  <li class="sidebar-title">
                    Stok Barang
                  </li>
                  <li>
                    <a href="index.html"><i data-feather="package"></i>Stok Barang<i class="fas fa-chevron-right dropdown-icon"></i></a>
                    <ul class="">
                      <li><a href="{{ route('stokmasuk.index') }}"><i class="far fa-circle"></i>Stok Masuk</a></li>
                      <li><a href="{{ route('stokkeluar.index') }}"><i class="far fa-circle"></i>Stok Keluar</a></li>
                    </ul>
                  </li>
                  <li class="sidebar-title">
                    Konfirmasi
                  </li>
                  <li>
                    <a href="index.html"><i data-feather="check-square"></i>Konfirmasi Pimpinan<i class="fas fa-chevron-right dropdown-icon"></i></a>
                    <ul class="">
                      <li><a href="{{ route('stokmasuk.indexkonfirmasi') }}"><i class="far fa-circle"></i>Stok Masuk</a></li>
                      <li><a href="{{ route('stokkeluar.indexkonfirmasi') }}"><i class="far fa-circle"></i>Stok Keluar</a></li>
                    </ul>
                  </li>
                  <li class="sidebar-title">
                    Laporan
                  </li>
                  <li>
                    <a href="index.html"><i data-feather="check-square"></i>Laporan Stok Barang<i class="fas fa-chevron-right dropdown-icon"></i></a>
                    <ul class="">
                      <li><a href="{{ route('stokmasuk.indexlaporan') }}"><i class="far fa-circle"></i>Stok Masuk</a></li>
                      <li><a href="{{ route('stokkeluar.indexlaporan') }}"><i class="far fa-circle"></i>Stok Keluar</a></li>
                    </ul>
                  </li>
                </ul>
            </div>
        </div>
        
        @yield('content')

        <!-- Javascripts -->
        <script src="{{ asset('../../assets/plugins/jquery/jquery-3.4.1.min.js') }}"></script>
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <script src="{{ asset('../../assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="https://unpkg.com/feather-icons"></script>
        <script src="{{ asset('../../assets/plugins/perfectscroll/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('../../assets/plugins/DataTables/datatables.min.js') }}"></script>
        <script src="{{ asset('../../assets/js/main.min.js') }}"></script>
        <script src="{{ asset('../../assets/js/pages/datatables.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script type="text/javascript">
          $(document).ready(function() {
              $('.js-example-basic-single').select2({
                  theme: "bootstrap" // need to override the changed default
              });
          });
        </script>
    </body>
</html>