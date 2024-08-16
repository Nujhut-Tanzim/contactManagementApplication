<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>View Contact</title>
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
            width:470px;
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
            <div class="col-3">
                <a href="{{ route('contacts.index') }}"><i class="material-icons">&#xe5c4;</i></a>
            </div>
            <div class="col-8">
                <h2>Contact Details</h2>
            </div>
            <div class="col"></div>
        </div>
        <form class="row" method="" action="">
            <div class="mb-3">
                <label for="name">Name</label>
                <input class="form-control"type="text" name="name" id="name" value="{{$user->name}}" readonly>
            </div>
            <div class="mb-3">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" id="email" value="{{$user->email}}" readonly>
            </div>
            <div class="mb-3">
                <label for="phone">Phone</label>
                <input class="form-control" type="text" name="phone" id="phone" value="{{$user->phone}}" readonly>
            </div>
            <div class="mb-3">
                <label for="address">Address</label>
                <input class="form-control" type="text" name="address" id="address" value="{{$user->address}}" readonly>
            </div>
            <div class="mb-3">
                <label for="created_at">Created_At</label>
                <input class="form-control" type="text" name="created_at" id="created_at" value="{{$user->created_at}}" readonly>
            </div>
            <div class="mb-3">
                <label for="updated_at">Updated_At</label>
                <input class="form-control" type="text" name="updated_at" id="updated_at" value="{{$user->updated_at}}"readonly>
            </div>
            
        </form>
        
    </div><br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>   
</body>
</html>