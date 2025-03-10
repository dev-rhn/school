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
              src="images/logo_UIN.jpg"
              class="img-fluid"
              style="width: 350px"
            />
          </div>
        </div>

        <!-------------------- ------ Right Box ---------------------------->

        <div class="col-md-6 right-box">
          <div class="row align-items-center">
            <div class="header-text mb-4">
              <h2>Website FERR</h2>
              <p>UIN Syarif Hidayatullah Jakarta</p>
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="input-group mb-3">
                    <input id="name" type="text" class="form-control form-control-lg bg-light fs-6 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input id="nim" type="text" class="form-control form-control-lg bg-light fs-6 @error('nim') is-invalid @enderror" name="nim" value="{{ old('nim') }}" required autocomplete="nim" autofocus placeholder="NIM">

                    @error('nim')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input id="email" type="email" class="form-control form-control-lg bg-light fs-6 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input id="password" type="password" class="form-control form-control-lg bg-light fs-6 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input id="password-confirm" type="password" class="form-control form-control-lg bg-light fs-6" name="password_confirmation" required autocomplete="new-password" placeholder="Re-Password">
                </div>

                <div class="input-group mb-3">
                    <button type="submit" class="btn btn-lg btn-info text-white w-100 fs-6 kotak-login">
                        {{ __('Register') }}
                    </button>
                </div>

                <!-- Button Log In-->
                <div class="input-group mb-3">
                <a class="btn btn-lg btn-primary text-white w-100 fs-6 kotak-login" href="{{ route('login') }}">
                    Back to Login
                </a>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
