<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-5 mt-5">
                <div class="card">
                    @if (session('status'))
                        <div class="alert alert-danger">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-header">
                        <h3>Login</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="useremail" class="form-label">Email</label>
                            <input type="text" name="email" class="form-control" id="useremail" />
                        </div>
                        <div class="mb-3">
                            <label for="useremail" class="form-label">Password </label>
                            <input type="text" name="password" class="form-control" id="userpassword" />
                        </div>
                        <button id="loginButton" class="btn btn-primary">Login</button>
                        <a href="/" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $("#loginButton").on("click",function(){
                const email = $("#useremail").val();
                const password = $("#userpassword").val();
                $.ajax({
                    url : '/api/login',
                    type : "POST",
                    contentType : 'application/json',
                    data : JSON.stringify({
                      email : email,
                      password : password,  
                    }),
                    success : function(response){
                        localStorage.setItem('api_token',response.token);
                        window.location.href = '/allposts';
                    },
                    error:function(xhr,status,error){
                        alert('Error:'+xhr.responseText);
                    }
                });
            });
        });
    </script>
</body>
</html>