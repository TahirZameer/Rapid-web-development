<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operations</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" 
    crossorigin="anonymous"> -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/bootstrap.min.js') }}">
</head>
<body>

    <div class="bg-dark py-3">
        <div class="container">
            <div class="h4 text-white"> CRUD Operations </div>
        </div>
    </div>

    <div class="container py-3">
        <div class="d-flex justify-content-between">
            <div class="h4"><span><b> Contacts </b></span></div>
            <div> 
                <a href="{{ route('create') }}" class="btn btn-primary" > Create Contact </a>
            </div>
        </div><br>

        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }};
            </div>
        @endif


        <div class="card border-0 shadow-lg">
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <!-- <th>Password</th> -->
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>

                    @if($contacts->isNotEmpty())
                    @foreach($contacts as $contact)
                    <tr>
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <!-- <td>{{ $contact->password }}</td> -->
                        <td>{{ $contact->description }}</td>
                        <td>
                            <a href="{{ route('edit', $contact->id) }}" class="btn btn-primary btn-sm"> Edit </a>

                            <a href="#" onclick="deleteContact( {{ $contact->id }} )" 
                            class="btn btn-danger btn-sm">Delete</a>
                        
                        </td>
                    </tr>
                    @endforeach

                    @else
                    <tr>
                        <td colspan="6">Record Not Found</td>
                    </tr>
                    @endif
                </table>
            </div>
        </div>

        <div class="mt-3">
            {{ $contacts->links() }}
        </div>
    </div>
</body>
</html>

