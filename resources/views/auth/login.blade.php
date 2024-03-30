<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}" />
</head>
<body>
    <section class="vh-100">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6 text-black text-center justify-content-center">

            <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

            <form style="width: 23rem;" action="{{ url('login/proses_login') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <h4 class="fw-normal mb-3 pb-2" style="letter-spacing: 1px;"><i class="bi bi-bag text-danger"></i> SIMS Web App</h4>
                <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Masuk atau buat akun untuk memulai</h3>

                <div class="form-outline mb-4">
                    <input type="email" id="form2Example18" class="form-control form-control-sm" name="email" placeholder="Masukkan Email Anda" />
                </div>

                <div class="form-outline mb-4">
                    <input type="password" id="form2Example28" class="form-control form-control-sm" name="password" placeholder="Masukkan Password Anda" />
                </div>

                <div class="pt-1 mb-4">
                <button class="btn btn-danger btn-sm btn-block" type="submit">Masuk</button>
                </div>
            </form>

            </div>

        </div>
        <div class="col-sm-6 px-0 d-none d-sm-block">
            <img src="{{asset('assets/image/Frame98699.png')}}"
            alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
        </div>
        </div>
    </div>
    </section>
</body>
</html>