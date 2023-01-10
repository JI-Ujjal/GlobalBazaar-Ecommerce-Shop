<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ url('backend/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ url('backend/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ url('backend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ url('backend/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ url('backend/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ url('backend/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ url('backend/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ url('backend/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ url('backend/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ url('backend/assets/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.4.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>


  <form action="{{route('login.post')}}" method="post">
    @csrf

    <section class="vh-100" style="background-color: #508bfc;">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-2-strong" style="border-radius: 1rem;">
              <div class="card-body p-5 text-center">

                <h3 class="mb-5">Sign in</h3>

                <div class="form-outline mb-4">
                  <input type="email" name="email" id="typeEmailX-2" class="form-control form-control-lg" />
                  <label class="form-label" for="typeEmailX-2">Email</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" name="password" id="typePasswordX-2" class="form-control form-control-lg" />
                  <label class="form-label" for="typePasswordX-2">Password</label>
                </div>


                <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


  </form>


  <!-- Pills content -->
  <script src="{{ url('backend/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ url('backend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ url('backend/assets/vendor/chart.js/chart.min.js') }}"></script>
  <script src="{{ url('backend/assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ url('backend/assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ url('backend/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ url('backend/assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ url('backend/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ url('backend/assets/js/main.js') }}"></script>

</body>

</html>