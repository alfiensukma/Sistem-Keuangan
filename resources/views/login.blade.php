<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Sistem Keuangan IAC</title>
    <link rel="stylesheet" href="/fontawesome-free-5.15.3-web/css/all.css">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style1.css">
</head>
<body class="bg-dark">
    <div class="container">
        <div class="col-md-4">
            <div class="box">
                <form action="{{ route('login') }}" method="post">
                    <h1>LOGIN ADMIN</h1>
                    @csrf
                    <div class="card-body">
                        @if (count($errors)>0)
                            <div class="alert alert-danger alert-dismissible" role="alert" id="liveAlert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <small>
                                    <ul style="list-style:none">
                                        @foreach($errors->all() as $error)
                                        <li><span class="fas fa-exclamation-triangle"></span>
                                        {{$error}}</li>
                                        @endforeach
                                    </ul>
                                </small>
                            </div>
                        @endif
                        @if (Session::has('error'))
                            <div class="alert alert-danger alert-dismissible" role="alert" id="liveAlert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <small><span class="fas fa-exclamation-triangle"></span> {{ Session::get('error') }}</small>
                            </div>
                        @endif
                        @if (Session::has('fail'))
                            <div class="alert alert-danger alert-dismissible" role="alert" id="liveAlert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <small><span class="fas fa-exclamation-triangle"></span> {{ Session::get('fail') }}</small>
                            </div>
                        @endif
                        <div class="form-floating">
                            <input type="email" class="form-control form-control2" id="floatingInput" placeholder="email" name="email" autocomplete="off">
                            <label for="floatingInput">Email</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control form-control2" id="floatingInput" placeholder="password" name="password">
                            <label for="floatingInput">Password</label>
                        </div>
                    </div>

                    <div class="card-footer border-0">
                        <button type="submit">LOGIN</button>
                        <p class="text-center pt-4">Belum punya akun? <a href="{{ route('register') }}">Register</a> sekarang!</p>
                        <div class="text-center">
                            <span href="" title="Lupa Password" data-bs-toggle="modal" data-bs-target="#password">Lupa Password?</span>
                        </div>
                        <div class="text-center pt-2 mb-2">
                            <span href="" title="Help" data-bs-toggle="modal" data-bs-target="#help">Help?</span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal Verifikasi --}}
    <div class="modal fade" id="password" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Verifikasi Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="/password" enctype="multipart/form-data">
                    {{ csrf_field() }}   
                        <div class="form-group">
                            <div class="row">
                                <label class="col-4 col-form-label">Email</label>
                                <div class="col-sm-7">
                                    <input type="text" name="email" class="form-control" required="required" autocomplete="off">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-outline-primary">Kirim Link</button>
                </div>
            </form>
            </div>
        </div>
    </div>

    <!-- Modal Help-->
    <div class="modal fade" id="help" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="far fa-question-circle"></i> Bantuan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item border-0">
                            <h4 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    <p>Kembali secara tiba-tiba ke login</p>
                                </button>
                            </h4>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Itu merupakan fitur <strong>session expired</strong>, dimana halaman akan kembali ke login ketika user tidak melakukan aktifitas
                                    selama <strong>2 jam</strong>.
                                </div>
                            </div>
                            <h4 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <p>Error 419 | Page Expired</p>
                                </button>
                            </h4>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Silahkan untuk kembali ke halaman login dan <strong>refresh page</strong> terlebih dahulu sebelum mencoba login kembali.
                                </div>
                            </div>
                            <h4 class="accordion-header" id="heading3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                    <p>Lupa Password</p>
                                </button>
                            </h4>
                            <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>Pertama</strong>, klik <strong data-bs-toggle="modal" data-bs-target="#password" style="cursor: pointer">Lupa Password?</strong> lalu masukkan email Anda.<br>
                                    <strong>Kedua</strong>, cek email masuk pada email Anda di <strong>kotak masuk</strong> atau <strong>spam</strong>. Jika berada di spam,
                                    maka izinkan email dengan cara <strong>bukan spam</strong> agar link pada email dapat di akses.<br>
                                    <strong>Ketiga</strong>, masukkan password baru dan Konfirmasi password.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</body>
</html>
