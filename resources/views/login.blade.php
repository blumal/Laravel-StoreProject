<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card bg-dark text-white" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
      
                  <div class="mb-md-5 mt-md-4 pb-5">
      
                    <h2 class="fw-bold mb-2 text-uppercase">Store Project</h2>
                    <p class="text-white-50 mb-5">Please enter your adm-login and password!</p>
      
                    <div class="form-outline form-white mb-4">
                        <form action="{{url("/login")}}" method="post">
                            @csrf
                            <label class="form-label" for="typeEmailX">Email</label>
                            <input type="email" id="typeEmailX" class="form-control form-control-lg" name="email_us" placeholder="example@domain.net"/>

                            <label class="form-label" for="typePasswordX">Password</label>
                            <input type="password" id="typePasswordX" class="form-control form-control-lg" name="pass_us"/><br/>

                            <input type="submit" class="btn btn-outline-light btn-lg px-5" value="Login">
                        </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</body>
</html>