<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Update Contact Form</title>
    <style>
        html,body{
            display: flex;
            justify-content: center;
            align-items: center;
            color:black;
            height:100vh;
            margin:0;
            padding:0;
        }
        .container-md{
            align-items: center;
            background-color: lightgray;
            width:460px;
        }   
        i{
            padding-top: 10px;
        }     
        a{
            list-style-type: none;
            color:black;
        }
    </style>
</head>
<body>
    <div class="container-md">
        <div class="row mt-2">
            <div class="col-2">
                <a href="{{ route('contacts.index') }}"><i class="material-icons">&#xe5c4;</i></a>
            </div>
            <div class="col-9 mb-2">
                <h2>Update Contact Form</h2>
            </div>
            <div class="col"></div>
        </div>
        
        <form class="row" method="POST" action="{{route('contacts.update',$user->id)}}">
        @csrf
        @method('PUT')
            <div class="mb-3">
                <label for="name">Name</label>
                <input class="form-control"type="text" name="name" id="name" value="{{$user->name}}">
                <p class="mb-0"style="color:red">
                    @error('name')
                        {{$message}}
                    @enderror    
                </p>
            </div>
            <div class="mb-3">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" id="email" value="{{$user->email}}">
                <p class="mb-0"style="color:red">
                    @error('email')
                        {{$message}}
                    @enderror    
                </p>
            </div>
            <div class="mb-3">
                <label for="phone">Phone</label>
                <input class="form-control" type="text" name="phone" id="phone" value="{{$user->phone}}">
            </div>
            <div class="mb-3">
                <label for="address">Address</label>
                <input class="form-control" type="text" name="address" id="address" value="{{$user->address}}">
            </div>
            
            <div class="d-flex justify-content-center mb-3">
                <button type="submit" class="btn btn-primary mb-3">Update</button>
            </div>

        </form>
        
    </div><br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>   
</body>
</html>