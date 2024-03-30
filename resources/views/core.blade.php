<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SIMS Web App</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
</head>
<body>
  <div class="container-fluid">
      <div class="row flex-nowrap">
          <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-danger">
              <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                  <a href="/" class="d-flex align-items-center pt-2 pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                      <h5><span class="fs-5 d-none d-sm-inline"><i class="bi-bag"></i> SIMS Web App</span></h5>
                  </a>
                  <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                      <li class="nav-item">
                          <a href="{{url('/')}}" class="nav-link align-middle px-0 text-white">
                              <i class="fs-4 bi-box-seam"></i> <span class="ms-1 d-none d-sm-inline">Produk</span>
                          </a>
                      </li>
                      <li>
                          <a href="{{url('profil')}}" class="nav-link px-0 align-middle text-white">
                              <i class="fs-4 bi-person"></i> <span class="ms-1 d-none d-sm-inline">Profil</span></a>
                      </li>
                      <li>
                          <a href="{{url('logout')}}" class="nav-link px-0 align-middle text-white">
                              <i class="fs-4 bi-box-arrow-left"></i> <span class="ms-1 d-none d-sm-inline">Logout</span></a>
                      </li>
                  </ul>
                  <hr>
              </div>
          </div>
          <div class="col py-3">
            @yield('content')
              <!-- <h3>Left Sidebar with Submenus</h3>
              <p class="lead">
                  An example 2-level sidebar with collasible menu items. The menu functions like an "accordion" where only a single 
                  menu is be open at a time. While the sidebar itself is not toggle-able, it does responsively shrink in width on smaller screens.</p>
              <ul class="list-unstyled">
                  <li><h5>Responsive</h5> shrinks in width, hides text labels and collapses to icons only on mobile</li>
              </ul> -->
          </div>
      </div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>