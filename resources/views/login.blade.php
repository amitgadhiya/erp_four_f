<!DOCTYPE html>

<html lang="en">

@include('includes.head')




<body>

  <div class="container-scroller">

    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">

      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">

        <div class="row w-100">

          <div class="col-lg-4 mx-auto">

            <div class="auto-form-wrapper">

                <form action="/dashboard" method="get">
@csrf
                    <div class="form-group" >

                        <h3 class="text-center">{{ config('app.name') }}</h3>

<!--<img src="images/full logo.png" style="margin-left: 35px;">-->

                </div>

                <div class="form-group">

                  <label class="label">Username</label>

                  <div class="input-group">

                      <input type="text" name="email" class="form-control" placeholder="Username">

                    <div class="input-group-append">

                      <span class="input-group-text">

                        <i class="mdi mdi-check-circle-outline"></i>

                      </span>

                    </div>

                  </div>

                </div>

                <div class="form-group">

                  <label class="label">Password</label>

                  <div class="input-group">

                      <input type="password" name="password" class="form-control" placeholder="*********">

                    <div class="input-group-append">

                      <span class="input-group-text">

                        <i class="mdi mdi-check-circle-outline"></i>

                      </span>

                    </div>

                  </div>

                </div>

                <div class="form-group">

                    <input type="submit" class="btn btn-primary submit-btn btn-block" value="Login" name="submit">

                </div>

                <div class="form-group d-flex justify-content-between">





                </div>

                <div class="form-group d-flex justify-content-between">


                    @if ($errors->any())
                    <div class='alert alert-danger'>
                    <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                    </div>
                    @endif
                    {{-- <a href="forgot_password.php" class="text-small forgot-password text-black">Forgot Password</a> --}}

                </div>





              </form>

            </div>



            <p class="footer-text text-center">copyright © {{ date('Y') }} . All rights reserved.</p>

          </div>

        </div>

      </div>

      <!-- content-wrapper ends -->

    </div>

    <!-- page-body-wrapper ends -->

  </div>
@include('includes.script')

</body>



</html>
