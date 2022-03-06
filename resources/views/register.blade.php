<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrar</title>
    <link rel="stylesheet" href="{{ asset('css/tdstls.css') }}">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>    
</head>
<body> 
    <div class="container-login-100">
        <div class="wrap-login">
             <form method="POST" action="{{ route('register') }}" class="loginTodo" style="display: block;">
                   @csrf
                   @method('POST')
                   <span class="registerTitle"> Registrar </span>
                    <div class="wrap-input">
                        <label for="exampleFormControlInput1" style="color: white;">Nome</label> 
                        <input type="text" class="inpt-tdauth" id="exampleFormControlInput1" name="name" placeholder="Nome " required>
                    </div> 
                    <div class="form-check form-check-inline f-s">
                        <input class="form-check-input" type="checkbox" name="sex" id="inlineCheckbox1" value="Masculino">
                        <label class="form-check-label" for="inlineCheckbox1">Masculino</label>
                    </div>
                    <div class="form-check form-check-inline f-s">
                        <input class="form-check-input" type="checkbox" name="sex" id="inlineCheckbox2" value="Feminino">
                        <label class="form-check-label" for="inlineCheckbox2">Feminino</label>
                    </div>                                      
                    <div class="wrap-input">
                       <label for="exampleFormControlInput1" style="color: white;">Email</label> 
                       <input type="email" class="inpt-tdauth" id="exampleFormControlInput1" name="email" placeholder="Email " required>
                    </div>
                    <div class="wrap-input">
                       <label for="examplePass" style="color: white;">Senha</label> 
                       <input type="password" class="inpt-tdauth" id="examplePass" name="password" placeholder="Password " required>
                    </div>
                    <div class="wrap-input">
                        <label for="examplePass" style="color: white;">Repita a Senha</label> 
                        <input type="password" class="inpt-tdauth" id="examplePass" name="password" placeholder="Repita a Senha " required>
                    </div>                      
                    <div class="form-group wrap-btn" style="margin-top: 40px;">
                       <button type="submit" class="btn btn-sm btn-success lgn-frm-btn">Registrar</button>
                    </div> 
                    <div class="text-center t-p-136">
                        <a href="/login" class="txt-2">Já tem sua conta? Login</a>    
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
             </form>
        </div>
   </div> 
   <script>

       $(document).ready(function() {
            $("input:checkbox").on('click', function()  {
                var $box = $(this)

                if ( $box.is(":checked") )
                {
                     var group = "input:checkbox[name='" + $box.attr("name") + "']";

                     $(group).prop("checked", false);
                     $box.prop("checked", true);
                }
                else 
                {
                     $box.prop("checked", false);     
                }
            }) 
       })
   </script> 
</body>
</html>