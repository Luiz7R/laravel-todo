<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/tdstls.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>    
</head>
<style>
</style>
<body> 
    <!--div class="container">
        <div class="row"-->
            <div class="container-login-100">
                 <div class="wrap-login">
                      <form method="POST" action="{{ route('login') }}" class="loginTodo" style="display: block;">
                            @csrf
                            @method('POST')
                            <span class="loginTitle"> Login </span>
                            <div class="wrap-input">
                                <label for="exampleFormControlInput1" style="color: white;">Email Address</label> 
                                <input type="email" class="inpt-tdauth" id="exampleFormControlInput1" name="email" placeholder="Email ">
                            </div>
                            <div class="wrap-input">
                                <label for="examplePass" style="color: white;">Password</label> 
                                <input type="password" class="inpt-tdauth" id="examplePass" name="password" placeholder="Password ">
                            </div>  
                            <div class="form-group wrap-btn" style="margin-top: 10px;">
                                <button type="submit" class="btn btn-sm btn-success lgn-frm-btn">Login</button>
                            </div>
                            <div class="text-center t-p-136">
                                 <a href="/register" class="txt-2">Criar Sua Conta</a>    
                            </div>                                                       
                      </form>
                 </div>
            </div>
            {{-- <form method="POST" action="{{ route('login') }}">
                @csrf   
                <div class="col-md-4" style="margin-left: 30%; margin-top: 15%;">
                    <div class="form-group">
                    <label for="exampleFormControlInput1" style="color: white;">Email Address</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="name@example.com">
                    </div>
                    <div class="form-group">
                        <label for="examplePass" style="color: white;">Password</label>
                        <input type="password" class="form-control" id="examplePass" name="password" placeholder="">
                    </div>  
                    <div class="form-group" style="margin-top: 10px;">
                        <button type="submit" class="btn btn-sm btn-success">Login</button>
                    </div>                    
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif                     
                </div>
            </form>
            <div class="col-md-4" style="margin-left: 29.4%; margin-top: 5px;">
                <a href="/register" class="btn btn-sm btn-primary">Register</a>
            </div>    --}}
        <!--/div>       
    </div-->
</body>
</html>