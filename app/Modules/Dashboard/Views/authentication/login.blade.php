<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Corvestor</title>
    <link href="/public/dashboard/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/public/dashboard/assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="/public/dashboard/assets/css/app.min.css" rel="stylesheet" type="text/css">
</head>

<body class="authentication-bg">
    <div class="account-pages mt-5 mb-2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-pattern">
                        <div class="card-body p-4">
                            @if(isset($errors))
                            @foreach($errors->all() as $error)
                            <p style="color:red">{{ $error }}</p>
                            @endforeach
                            @endif
                            <form method="post">
                                @csrf
                                <div class="form-group mb-3">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email" placeholder="email" />
                                </div>
                                <div class="form-group mb-3">
                                    <label>password</label>
                                    <input type="text" class="form-control" name="password" placeholder="passsword" />
                                </div>
                                <button class="btn btn-primary btn-block" type="submit" name="button">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>