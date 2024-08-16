<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>All Contacts</title>
    <style>
        html,body{
            display: flex;
            justify-content: center;
            align-items: center;
            height:100vh;
            color:black;
            margin:0;
            padding:0;
        }
        .container-md{
            align-items: center;
            background-color:lightgrey;
        }
        button, a{
            list-style-type: none;
            color:black;
        }
        input{
            background-color: lightgrey;
        }
        a{
            text-decoration: none;
        }
        .section-two {
            gap:170px;
        }

    </style>
    
</head>
<body>
    <div class="container-md">
        <div class="row align-items-center">
            <div class="col-auto">
                @if($flag == 'true')
                    <a href="{{ route('contacts.index') }}" class="text-decoration-none">
                        <i class="material-icons">&#xe5c4;</i>
                    </a>
                @endif
            </div>
            <div class="col text-center mb-3">
                <h1 class="mt-3 mb-1">Contact Management System</h1>
            </div>
        </div>

        <form class="row g-3 align-items-center justify-content-center mb-2"  method="GET" action="{{ route('contacts.index')}}">
            <div class="col-auto">
                <div class="input-group  mb-3 mt-4">
                    <input type="text" class="form-control" id="search" name="search" placeholder="Enter name or email .." value="{{ request('search') }}" style="width: 350px;background-color:whitesmoke">
                    <button type="submit" class="btn btn-outline-secondary"><i class="fa fa-search"></i></button>
                </div>
            </div>          
        </form>
        
        
        <div class="section-two d-flex align-items-center mb-2">
            <h2 class="mt-3 mb-3">{{$heading}}</h2> 
            <div class="mt-3">
                <a class="btn btn-dark mb-3" href="{{route('contacts.create')}}" style="margin-right:60px">Add Contact</a>
            </div>
            <div class="d-flex align-items-center mt-2">
                <label for="sort"><h6>Sort by : </h6></label>
                <form method="GET" action="{{ route('contacts.index') }}">
                    <input type="hidden" id="search" name="search" value="{{ request('search') }}">
                
                    <select name="sort" id="sort" onchange="this.form.submit()" style="background-color:whitesmoke">
                        <option value="" disabled selected></option>
                        <option value="name"  @if(request('sort') == 'name') selected @endif>name</option>
                        <option value="created_at" @if(request('sort') == 'created_at') selected @endif>date</option>
                    </select>
                </form>
            </div>
        </div>
        
        @if($users->isNotEmpty())
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created_at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($users as $user )
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{$user->created_at->format('Y-m-d') }}</td>
                                <td><button type="button" class="btn btn-secondary"><a href={{route('contacts.show',$user->id)}} style="color:white">View</a></button></td>
                                <td><button type="button" class="btn btn-light"><a href={{route('contacts.edit',$user->id)}}>Update</a></button></td>
                                <td>
                                    <form method="POST" action="{{route('contacts.delete',$user->id)}}">
                                        @CSRF
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-secondary">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                </tbody>
            </table>
        @else
            <div>
                <h4 style="text-align:center">No Contact found</h4>
            </div>
        @endif       
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>