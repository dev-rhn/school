<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Website FERR</title>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="style/main.css" rel="stylesheet" />
  </head>
  <style>
    body {
    font-family: "Poppins", sans-serif;
    /* background: #2d92e0; */
    background: #fff;
  }
  </style>
  <body>
    <!----------------------- Main Container -------------------------->

    <div
      class="container d-flex justify-content-center align-items-center min-vh-100"
    >
      <!----------------------- Login Container -------------------------->

      <div class="row border rounded-5 p-3 bg-white shadow box-area">
        <!--------------------------- Left Box ----------------------------->

        <div
          class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box"
        >
          <div class="featured-image mb-4">
            <img
              src="images/logo_UIN_FERR.gif"
              class="img-fluid"
              style="width: 370px"
            />
          </div>
        </div>

        <!-------------------- ------ Right Box ---------------------------->

        <div class="col-md-6 right-box">
          <div class="row align-items-center">
            <div class="header-text mb-4">
              <img src="images/Website_FERR_1.gif" alt="" width="400px" height="155px">
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <!-- Email -->
            <div class="input-group mb-3">
              <input id="email" type="email" class="form-control form-control-lg bg-light fs-6 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

              @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <!-- Password -->
            <div class="input-group mb-5">
              <input id="password" type="password" class="form-control form-control-lg bg-light fs-6 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <!-- Button Log In-->
            <div class="input-group mb-3">
              <button type="submit" class="btn btn-lg btn-primary text-white w-100 fs-6 kotak-login">
                {{ __('Login') }}
            </button>
            </div>
            <div class="input-group mb-3">
              <a class="btn btn-lg btn-info text-white w-100 fs-6 kotak-login" href="{{ route('register') }}">
                {{ __('Register') }}
            </a>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
