<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Package | Dashboard</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{asset('assets/tempad/plugins/fontawesome-free/css/all.min.css')}}" />

        <link rel="stylesheet" href="{{asset('assets/tempad/dist/css/adminlte.min.css')}}" />
        @vite('resources/css/app.css')
        <script nonce="24b1c56c-ca8d-418e-8098-7723180c6061">
            (function(w,d){!function(bg,bh,bi,bj){bg[bi]=bg[bi]||{};bg[bi].executed=[];bg.zaraz={deferred:[],listeners:[]};bg.zaraz.q=[];bg.zaraz._f=function(bk){return async function(){var bl=Array.prototype.slice.call(arguments);bg.zaraz.q.push({m:bk,a:bl}')}};for(const bm of["track","set","debug"])bg.zaraz[bm]=bg.zaraz._f(bm);bg.zaraz.init=()=>{var bn=bh.getElementsByTagName(bj)[0],bo=bh.createElement(bj),bp=bh.getElementsByTagName("title")[0];bp&&(bg[bi].t=bh.getElementsByTagName("title")[0].text);bg[bi].x=Math.random();bg[bi].w=bg.screen.width;bg[bi].h=bg.screen.height;bg[bi].j=bg.innerHeight;bg[bi].e=bg.innerWidth;bg[bi].l=bg.location.href;bg[bi].r=bh.referrer;bg[bi].k=bg.screen.colorDepth;bg[bi].n=bh.characterSet;bg[bi].o=(new Date).getTimezoneOffset();if(bg.dataLayer)for(const bt of Object.entries(Object.entries(dataLayer).reduce(((bu,bv)=>({...bu[1],...bv[1]})),{})))zaraz.set(bt[0],bt[1],{scope:"page"});bg[bi].q=[];for(;bg.zaraz.q.length;){const bw=bg.zaraz.q.shift();bg[bi].q.push(bw)}bo.defer=!0;for(const bx of[localStorage,sessionStorage])Object.keys(bx||{}).filter((bz=>bz.startsWith("_zaraz_"))).forEach((by=>{try{bg[bi]["z_"+by.slice(7)]=JSON.parse(bx.getItem(by))}catch{bg[bi]["z_"+by.slice(7)]=bx.getItem(by')}}));bo.referrerPolicy="origin";bo.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(bg[bi])));bn.parentNode.insertBefore(bo,bn)};["complete","interactive"].includes(bh.readyState)?zaraz.init():bg.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document);
        </script>
        <style>
            .floating-button {
                position: fixed;
                bottom: 20px; /* Atur jarak dari bawah */
                right: 20px; /* Atur jarak dari kanan */
                z-index: 1000; /* Atur urutan lapisan di atas elemen lain */
            }

            .floating-button a {
                display: inline-block; /* Membuat tautan menjadi elemen blok dengan lebar dan tinggi sesuai kontennya */
                background: url('{{ asset("assets/images/notification-bell.jpg") }}');
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
                color: #25D366;
                text-decoration: none; /* Menghapus gaya bawaan tautan */
                padding: 30px 30px;
                border-radius: 50px;
                cursor: pointer;
                box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.5);
            }
        </style>
    </head>
    <body class="hold-transition sidebar-mini sidebar-collapse">
        <div class="wrapper">
            @include('headeradmin')

            <div class="content-wrapper">
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Senja Printing</h1>
                            </div>
                            <!-- <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="#">Layout</a>
                                    </li>
                                    <li class="breadcrumb-item active">
                                        Collapsed Sidebar
                                    </li>
                                </ol>
                            </div> -->
                        </div>
                    </div>
                </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- modal -->
                    <!-- <form class="d-flex ms-auto m-3" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-secondary mx-1" type="submit">Search</button>
                        
                    </form> -->
                    
                </div>


                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead class="text-center">
                                        <tr>
                                            <th>No</th>
                                            <th>Id Produk</th>
                                            <th>Nama Pemesan</th>
                                            <th>Asal Pemesan</th>
                                            <th>Nama Produk</th>
                                            <th>Jumlah Pesanan</th>
                                            <th>Bahan</th>
                                            <th>Ukuran</th>
                                            <th>Warna</th>
                                            <th>Desain</th>
                                            <th>Jenis Sablon</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table-body">
                                        
                                        @foreach ($data as $produk)
                                        @csrf
                                            <tr>
                                                <td></td>
                                                <td>{{$produk -> id}}</td>
                                                <td>{{$produk -> namaPemesan}}</td>
                                                <td>{{$produk -> asalPemesan}}</td>
                                                <td>{{$produk -> namaProduk}}</td>
                                                <td>{{$produk -> jmlPesanan}}</td>
                                                <td>{{$produk -> bahan}}</td>
                                                <td>{{$produk -> ukuran}}</td>
                                                <td>{{$produk -> warna}}</td>
                                                <td><img src="{{asset('storage/assets/images/'. $produk->desain)}}" class="w-50" style="display: block; margin: 0 auto;"></td>
                                                <td>{{$produk -> jeniSablon}}</td>
                                                <td>{{$produk -> status}}</td>
                                                <td>
                                                    @if($produk->status === 'Terpenuhi' || $produk->status === 'Sedang Dikemas' || $produk->status === 'Menunggu Kurir')
                                                        <div class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                                                                Status Pengerjaan
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <form action="{{ url('edit')}}" method="POST" id="formDikemas_{{ $produk->id }}">
                                                                        @csrf
                                                                        <input type="hidden" name="status" value="Sedang Dikemas">
                                                                        <input type="hidden" name="idProduk" value="{{$produk->id}}">
                                                                        <a class="dropdown-item text-warning" href="#" onclick="submitForm('formDikemas_{{ $produk->id }}')">Sedang Dikemas</a>
                                                                    </form>
                                                                </li>
                                                                <li>
                                                                    <form action="{{ url('edit')}}" method="POST" id="formMenunggu_{{ $produk->id }}">
                                                                        @csrf
                                                                        <input type="hidden" name="status" value="Menunggu Kurir">
                                                                        <input type="hidden" name="idProduk" value="{{$produk->id}}">
                                                                        <a class="dropdown-item text-warning" href="#" onclick="submitForm('formMenunggu_{{ $produk->id }}')">Menunggu Kurir</a>
                                                                    </form>
                                                                </li>
                                                                <!-- <li>
                                                                    <form action="{{ url('edit')}}" method="POST" id="formSelesai_{{ $produk->id }}">
                                                                        @csrf
                                                                        <input type="hidden" name="status" value="Selesai">
                                                                        <input type="hidden" name="idProduk" value="{{$produk->id}}">
                                                                        <a class="dropdown-item text-success" href="#" onclick="submitForm('formSelesai_{{ $produk->id }}')">Selesai</a>
                                                                    </form>
                                                                </li> -->
                                                            </ul>
                                                        </div>
                                                    @endif
                                                </td>
                                                <!-- <td>
                                                    <form action="{{ url('edit')}}" method="GET">
                                                        @csrf
                                                        <button type="submit" name="btnSubmit" value="{{$produk->id}}" class="btn btn-secondary btn-sm">
                                                            Submit
                                                        </button>
                                                    </form>
                                                </td> -->
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="floating-button">
                    <button type="button" class="btn btn-primary dropdown-toggle far fa-bell" data-bs-toggle="dropdown"> </button>
                    <ul class="dropdown-menu">
                        <li><span class="dropdown-item-text" href="#">
                            @foreach($notifications as $notification)
                                <div>
                                    {{ $notification->data['message'] }} <br>
                                </div>
                            @endforeach  
                            @if($notifications->isEmpty())
                                <div>Tidak ada notifikasi.</div>
                            @endif
                        </span></li>
                    </ul>
                </div>
            </section>
            <!-- /.content -->
        <!-- </div>
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Title</h3>
                                        <div class="card-tools">
                                            <button
                                                type="button"
                                                class="btn btn-tool"
                                                data-card-widget="collapse"
                                                title="Collapse"
                                            >
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button
                                                type="button"
                                                class="btn btn-tool"
                                                data-card-widget="remove"
                                                title="Remove"
                                            >
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        Start creating your amazing application!
                                    </div>

                                    <div class="card-footer">Footer</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div> -->

            <footer class="main-footer">
                <div class="float-right d-none d-sm-block">
                    <b>Version</b> 0.1.0
                </div>
                <strong
                    >Copyright &copy; 2014-2021
                    <a href="https://adminlte.io">Senja Printing</a>.</strong
                >
                All rights reserved.
            </footer>

            <aside class="control-sidebar control-sidebar-dark"></aside>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', (event) => {
                const tableBody = document.getElementById('table-body');
                const rows = tableBody.getElementsByTagName('tr');

                for (let i = 0; i < rows.length; i++) {
                    rows[i].cells[0].innerText = i + 1;
                }
            });
        </script>

        <script>
            function submitForm(formId) {
                document.getElementById(formId).submit();
            }
        </script>

        <script src="{{asset('assets/tempad/plugins/jquery/jquery.min.js')}}"></script>

        <script src="{{asset('assets/tempad/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

        <script src="{{asset('assets/tempad/dist/js/adminlte.min.js')}}"></script>

        @vite('resources/js/app.js')

        <!-- <script src="{{asset('assets/tempad/dist/js/demo.js')}}"></script> -->
    </body>
</html>
