<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" 
    crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"> -->
</head>
<body>

    <div class="bg-dark py-3">
        <div class="container">
            <div class="h4 text-white"> CRUD Operations </div>
        </div>
    </div>

    <div class="container py-3">
        <div class="d-flex justify-content-between">
            <div class="h4"><span><b> Edit Contacts </b></span></div>
            <div> 
                <a class="btn btn-primary" href="{{ route('index') }}"> Back </a>
            </div>
        </div><br>

        <form actions="{{ route('update', $contact->id)}}" method="post"
            style="background:lightblue; height:600px; widht:350px;">

            @csrf
            @method('put')
            <div class="container" >
                <h1 class="text-center" style="background:lightblue;"> Registration </h1> 
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter Your Name" 
                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $contact->name) }}" />
                    @error('name')
                        <p class="invalid-feedback">{{ $message }} </p>
                    @enderror
                </div><br>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" id="email"placeholder="Enter Your Email" 
                    class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $contact->email) }}" />
                    @error('email')
                        <p class="invalid-feedback">{{ $message }} </p>
                    @enderror
                </div><br>

                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter Your Password"
                    class="form-control @error('password') is-invalid @enderror" value="{{ old('password', $contact->password) }}" />
                    @error('password')
                        <p class="invalid-feedback">{{ $message }} </p>
                    @enderror
                </div><br>

                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" id="description" class="form-control" cols="100" rows="4" 
                    placeholder="Enter Description" > {{ old('description', $contact->description) }} </textarea>
                    <!-- <input type="description" name="password" id="password" class="form-control" placeholder="Enter Your Password"/> -->
                </div><br>

                <button class="btn btn-primary">submit</button>
                
            </div>
        </form>

    </div>
</body>
</html>

