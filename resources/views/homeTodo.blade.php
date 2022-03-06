<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Home</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="{{ asset('css/bootstrap-datepicker3.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-datepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tdstls.css') }}" rel="stylesheet">
    
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset("js/jquery-ui.js") }}"></script> 
    <script src="{{ asset("js/jquery.mask.min.js") }}"></script> 
    <script src="{{ asset("js/moment.js") }}"></script>       
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>    
    <script src="{{ asset("js/bootstrap-datepicker.min.js") }}"></script>
    <script src="{{ asset("js/bootstrap-datepicker.pt-BR.min.js") }}"></script>   
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body style="overflow-x: hidden;">
    @auth
    <div class="main-pg-td">
        
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
              <a class="navbar-brand">TODO</a>
              <div class="d-flex w-auto">
                    <p class="text-center text-white" style="padding-right: 5px; padding-top: 5px;">
                        {{ ucwords( Auth::user()->name ) }} 
                    </p>
                    <span class="" id="search-addon">
                        <a href="{{ route('logout') }}" class="btn btn-secondary btn-sm"
                           style="border-radius: 5px; margin-bottom: 2%;">
                            Sair
                        </a> 
                    </span>
              </div>
            </div>
        </nav>

        {{-- <p class="text-center">Bem Vindo  {{ ucwords( Auth::user()->name ) }} </p>
        <div class="lgot-us d-flex flex-row-reverse">
            <a href="{{ route('logout') }}" class="btn btn-secondary btn-sm" style="border-radius: 5px; margin-bottom: 2%;">Sair</a> 
        </div> --}}

        <div class="card">
            <div class="card-body">
                <button class="btn btn-success btn-sm" 
                    data-bs-toggle="modal" 
                    data-bs-target="#gridSystemModalTodo" 
                    style="margin-left: 20px; border-radius: 7px;">
                    Criar Lista
                </button>
            </div>
        </div> 

        <div class="modal fade" id="gridSystemModalTodo" aria-labelledby="gridModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Criar lista TODO</h5>
                        <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('todo') }}" id="todoPost">
                        @csrf
                        @method('POST') 
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="container">
                                        <div class="row">
                                            <div>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="inputGroup-sizing-sm">Name</span>
                                                    <input type="text" class="form-control" aria-label="Sizing example input" id="name" name="name" aria-describedby="inputGroup-sizing-sm">
                                                </div>
                                            </div>                                       
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" style="margin-bottom: 20px;">
                                    <div class="container">      
                                        <div class="input-group">
                                            <span class="input-group-text">Description</span>
                                            <textarea class="form-control" id="description" name="description" aria-label="With textarea"></textarea>
                                        </div>
                                    </div>                                  
                                </div>                            
                                <div class="col-md-8">
                                    <div class="container">
                                        <div class="row">
                                            <div>  
                                                <div class="input-group date" style="margin-bottom: 20px;">
                                                    <span class="input-group-text" id="inputGroup-sizing-sm">Deadline</span>
                                                    <input type="text" class="form-control" aria-label="Sizing example input" id="deadline" name="deadline" aria-describedby="inputGroup-sizing-sm">
                                                </div> 
                                            </div> 
                                            <div>  
                                                <div class="input-group date mb-3" style="margin-bottom: 20px;">
                                                    <span class="input-group-text" id="inputGroup-sizing-sm">Ended At</span>
                                                    <input type="text" class="form-control" aria-label="Sizing example input" id="ended_at" name="ended_at" aria-describedby="inputGroup-sizing-sm">
                                                </div> 
                                            </div>                                                                                
                                        </div>
                                    </div>
                                </div>                            
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button class="btn btn-primary" id="postTodo">Salvar Lista</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="gridSystemModalDelete" data-bs-backdrop="static" 
             data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="titleModalDeleteTodo">Delete Todo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> 
                    </div>
                    <div class="modal-body" style="">
                    Are you sure you want to delete the todo?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="btnDeleteTodo">Delete</button>
                </div>   
                </div>     
            </div>    
        </div> 

        <div class="modal" id="gridSystemModalUpdate"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
             <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                       <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>                           
                       </div>
                       <div class="modal-body">
                        <form class="row g-3 needs-validation" novalidate id="updateTodo">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="validationTooltip01" class="form-label">Title</label>
                                <input type="text" class="form-control" name="nameTodo" id="validationTooltip01" required>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Description:</label>
                                <textarea class="form-control" name="descriptionTodo" value="" required></textarea>
                            </div>
                            <div class="row">
                                <div class="col-sm-9">
                                     <div class="row">
                                        <div class="col-8 col-sm-6">
                                            <label for="message-text" class="col-form-label">Initial:</label>
                                            <input type="text" class="form-control" name="deadlineTodo" id="deadline_UP" required>
                                        </div>
                                        <div class="col-4 col-sm-6">
                                            <label for="message-text" class="col-form-label">DeadLine:</label>
                                            <input type="text" class="form-control" name="ended_atTodo" id="endedAt_UP" required>
                                        </div>                                              
                                     </div> 
                                </div> 
                            </div>    
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" id="btnUpdateTodo">Update</button>
                        </div>     
                        </form>                                                        
                  </div>     
            </div>            
        </div>

        @foreach ( $todos as $todo )  
        <div class="row" id="todoForm">
            <div class="col-sm-6 col-lg-3 cd-td">
            </div>
            <div class="col-sm-6 col-lg-6 cd-td">
                <div class="card" style="margin-bottom: 10px;">
                    <p class="p-td" align="right">
                        <button class="btn btn-default btn-sm updTodo" data-bs-toggle="modal" data-bs-target="#gridSystemModalUpdate" data-todo="{{ $todo['id'] }}">
                            <img class="editIm" src="{{ asset('css/edit-icon8.png') }}" alt="">
                        </button>                                                 
                        <button class="btn btn-default btn-sm delTodo" data-bs-toggle="modal" data-bs-target="#gridSystemModalDelete" data-todo="{{ $todo['id'] }}">
                                <img src="{{ asset('css/trash-fill.svg') }}" alt="">
                        </button> 
                    </p>
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#868e96">
                        </rect>
                        <text x="35%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text>
                    </svg> 
                    <div id="td-cd">                   
                    <div class="card-body">
                        <h5 class="card-title">{{ $todo->name }}</h5>
                        <p class="card-text">{{ $todo->description }}.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Initial: {{ \Carbon\Carbon::parse($todo->deadline)->format('d/m/Y') }} </li>
                    </ul>
                    <div class="card-body">
                        <span>Deadline: {{ \Carbon\Carbon::parse($todo->ended_at)->format('d/m/Y') }}</span>
                    </div> 
                    </div>                   
                </div>
            </div>            
            <div class="col-sm-6 col-lg-3 cd-td">
            </div>
        </div>
        @endforeach
    </div>
        
        <script> 

        (function() {
            'use strict';
            window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
                }, false);
            });
            }, false);
        })();

        
        $('#deadline').mask('00/00/0000');
        $('#ended_at').mask('00/00/0000');

        $('#deadline').datepicker({
            format: 'dd/mm/yyyy',
            language: 'pt-BR',
            autoclose: true
        });

        $('#ended_at').datepicker({
            format: 'dd/mm/yyyy',
            language: 'pt-BR',
            autoclose: true
        });

        $('#deadline_UP').mask('00/00/0000');
        $('#endedAt_UP').mask('00/00/0000');

        $('#deadline_UP').datepicker({
            format: 'dd/mm/yyyy',
            language: 'pt-BR',
            autoclose: true
        });

        $('#endedAt_UP').datepicker({
            format: 'dd/mm/yyyy',
            language: 'pt-BR',
            autoclose: true
        });

        $(document).ready(function(){
            $('#postTodo').click(function(){
                var url = $('#todoPost').attr('action');
                var data = $('#todoPost').serialize();

                var name = $("#nameTodo").val();
                var description = $("#descriptionTodo").val();
                var deadline = $("#deadlineTodo").val();
                var endedAt = $("#ended_atTodo").val();
                var validate = '';

                if ( name == '' )
                {
                    name.addClass('has-error');
                }
                else
                {
                    validate += '1';
                }
                if ( description == '' )
                {
                }
                else
                {
                     validate += '2';
                }
                if ( deadline == '' )
                {
                }
                else
                {
                     validate += '3';
                }
                if ( endedAt == '' )
                {
                }
                else
                {
                     validate += '4';
                }

                if ( validate === '1234' )
                {
                    $.ajax({
                        type: 'ajax',
                        method: 'post',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: url,
                        data: data,
                        async: false,
                        dataType: 'json',
                        success: function()
                        {
                            $('#gridSystemModalTodo').modal('hide');
                            location.reload();  
                        },
                        error: function()
                        {
                            console.error("request has failed, contact the support");
                        }
                    });                    
                }

            }) 
        }) 

        $('.updTodo').click(function(){

            var idTd = $(this).data("todo")
            var url = '{{ route('getTodo', ":id") }}'
            url = url.replace(':id', idTd)

            var urlUpd = '{{ route('updateTodo', ":id") }}'
            urlUpd = urlUpd.replace(':id', idTd)
            $("#updateTodo").attr('action', urlUpd)

            $.ajax({
                type: 'ajax',
                method: 'get',
                async: false,
                url: url,
                dataType: 'json',
                success: function(data)
                {
                    $('input[name=nameTodo]').val(data.name)
                    $('textarea[name=descriptionTodo]').val(data.description)
                    $('input[name=deadlineTodo]').val( moment(data.deadline).format('DD/MM/YYYY') )
                    $('input[name=ended_atTodo]').val( moment(data.ended_at).format('DD/MM/YYYY') )
                }
            })
        })

        $('#updateTodo').submit(function(e) {
            e.preventDefault()

            var formAction = $("#updateTodo").attr('action');
            var data = $('#updateTodo').serializeArray()

            var name = data[2].value
            var description = data[3].value
            var deadline = data[4].value
            var ended_at = data[5].value
            var validate = "";

            if ( name == "" )
            {
            }
            else
            {
                validate += "1"
            }

            if ( description == "" )
            {
            }
            else
            {
                validate += "2"
            }

            if ( deadline == "" )
            {           
            }
            else
            {
                validate += "3"
            }

            if ( ended_at == "" )
            {
            }
            else
            {
                validate += "4"
            }

            if ( validate == '1234' )
            {
                 $.ajax({
                     type: 'ajax',
                     method: 'PUT',
                     url: formAction,
                     data: data,
                     async: false,
                     dataType: 'json',
                     success:  function(response)
                     {
                        $('#gridSystemModalUpdate').modal('hide');
                        location.reload();
                     },
                     error: function(response)
                     {
                        console.error("Request has failed, contact the support team");
                     }
                 })
            }

        })

        $(document).on('click', '.delTodo', function() {

            var idTodo = $(this).data("todo")
            var url = '{{ route('deleteTodo', ":id") }}'
            url = url.replace(':id', idTodo)

            $('#btnDeleteTodo').unbind().click(function() {
                $.ajax
                ({
                    type: "DELETE",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    async:false,
                    url: url,
                    dataType: 'json',
                    success: function(response)
                    {
                        $('#gridSystemModalDelete').modal('hide');
                        location.reload();
                    },
                    error: function()
                    {
                        console.error("Request has failed, contact the support team");
                    }
                }) 

            });                
        })

        </script>
    @endauth
</body>
</html>