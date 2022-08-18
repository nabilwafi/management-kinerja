@extends('peserta/layouts/body')

@section('content')
<div class="container-xl">
  <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
      <div class="inner">
          <div class="app-card-body p-3 p-lg-4">
              <h3 class="mb-3">Welcome, developer!</h3>
              <div class="row gx-5 gy-3">
                  <div class="col-12 col-lg-9">

                      <div>Portal is a free Bootstrap 5 admin dashboard template. The design is simple,
                          clean and modular so it's a great base for building any modern web app.</div>
                  </div>
                  <!--//col-->
                  <div class="col-12 col-lg-3">
                      <a class="btn app-btn-primary"
                          href="https://themes.3rdwavemedia.com/bootstrap-templates/admin-dashboard/portal-free-bootstrap-admin-dashboard-template-for-developers/"><svg
                              width="1em" height="1em" viewBox="0 0 16 16"
                              class="bi bi-file-earmark-arrow-down me-2" fill="currentColor"
                              xmlns="http://www.w3.org/2000/svg">
                              <path
                                  d="M4 0h5.5v1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h1V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z" />
                              <path d="M9.5 3V0L14 4.5h-3A1.5 1.5 0 0 1 9.5 3z" />
                              <path fill-rule="evenodd"
                                  d="M8 6a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 10.293V6.5A.5.5 0 0 1 8 6z" />
                          </svg>Free Download</a>
                  </div>
                  <!--//col-->
              </div>
              <!--//row-->
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <!--//app-card-body-->

      </div>
      <!--//inner-->
  </div>
</div>
@endsection()

@section('head')
    <title>Peserta Dashboard</title>
@endsection
