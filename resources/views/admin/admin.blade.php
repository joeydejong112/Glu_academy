@extends('website/layout')
@section('css')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

@endsection
@section('content')
<div id="container-fluid">
    <div class="container">
        <header>
            <div class="row">
                <div class="col-md-12">
                    <h3>Aanmeldingen</h2><a style="float:right;" href="{{ url('/logout_admin') }}"> logout </a>
                </div>
            </div>
        </header>
        <main>
            <br>
            <table id="aanmeldingen" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Naam</th>
                        <th>Klas</th>
                        <th>opgegeven training</th>
                        <th>Mentor consent</th>
                        <th>Acties</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $users )

                        <tr>

                            <td>{{ $users->id }}</td>
                            <td>{{ $users->name }}</td>
                            <td>{{ $users->klas }}</td>
                            <td> {{ $users->training }}</td>
                            <td>{{ $users->ophoogte }}</td>
                            <td class="text-center">
                                <button class="btn btn-warning" data-toggle="modal"
                                    data-target="#update{{ $users->id }}">Edit</button>
                                <button class="btn btn-danger" data-toggle="modal"
                                    data-target="#delete{{ $users->id }}">Delete</button>
                            </td>
                        </tr>


                        {{-- Modal update users edit --}}

                        <div class="modal fade" id="update{{ $users->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="update{{ $users->id }}label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="update{{ $users->id }}label">Edit</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="adminupdate" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name" class="col-form-label label_for">Naam:</label><br>
                                                <input type="text" name="naam" class="form-control"
                                                    value="{{ $users->name }}" id="recipient-name">
                                                <input type="hidden" name="id" class="form-control"
                                                    value="{{ $users->id }}" id="recipient-name">
                                            </div>

                                            <div class="form-group">
                                                <label for="name" class="col-form-label label_for">email:</label><br>
                                                <input type="text" name="email" class="form-control"
                                                    value="{{ $users->email }}" id="recipient-name">
                                            </div>

                                            <div class="form-group">
                                                <label for="name" class="col-form-label label_for">klas:</label><br>
                                                <input type="text" name="klas" class="form-control"
                                                    value="{{ $users->klas }}" id="recipient-name">
                                            </div>

                                            <div class="form-group">
                                                <label for="name" class="col-form-label label_for">status:</label><br>
                                                <select name="status">
                                                    <option value="nogniet">Nog niet ingeschreven</option>
                                                    <option value="ingeschreven">ingeschreven</option>

                                                </select>
                                            </div>


                                            <div class="form-group">
                                                <label for="name" class="col-form-label label_for">ophoogte:</label><br>
                                                <textarea name="ophoogte"
                                                    class="form-control">{{ $users->ophoogte }}</textarea>

                                            </div>


                                            <div class="form-group">
                                                <label for="name" class="col-form-label label_for">training:</label><br>
                                                <textarea name="training"
                                                    class="form-control">{{ $users->training }}</textarea>

                                            </div>

                                            <div class="form-group">
                                                <label for="name"
                                                    class="col-form-label label_for">bijzonderheden:</label><br>
                                                <textarea name="bijzonderheden"
                                                    class="form-control">{{ $users->bijzonderheden }}</textarea>

                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Sluit</button>
                                        <button type="submit" class="btn btn-primary">Wijzig</button>
                                    </div>
                                    </form>
                                </div>

                            </div>
                        </div>

    </div>
    {{-- end Modal update users edit --}}
    {{-- Modal delete user --}}
    <div class="modal fade" id="delete{{ $users->id }}" tabindex="-1" role="dialog"
        aria-labelledby="delete{{ $users->id }}Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete{{ $users->id }}Label">Weet je het zeker?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><b>Je gaat deze student verwijderen:</b></p>
                    <p>ID: {{ $users->id }}</p>
                    <p>Naam: {{ $users->name }}</p>
                    <p>Email: {{ $users->email }}</p>

                    <p>Klas: {{ $users->klas }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluit</button>
                    <a type="button" href="admin/delete/{{ $users->id }}" class="btn btn-danger"
                        style="color:white;">Delete</a>
                </div>
            </div>
        </div>
    </div>
    {{-- End modal delete user --}}
    @endforeach
    </tbody>
    </table>
</div>
<div class="container mt-5">
    <h3>Trainingen</h3>
    <button class="btn btn-success mb-2" data-toggle="modal" data-target="#add">Voeg trainingen toe</button>
    <table id="trainingen" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th width="60">id</th>
                <th>Naam training</th>
                <th width="240">Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vraag1 as $vraag1 )
                <tr>
                    <td>{{ $vraag1->id }}</td>
                    <td>{{ $vraag1->vraag }}</td>
                    <td class="text-center">
                        <button class="btn btn-warning" data-toggle="modal"
                            data-target="#edit{{ $vraag1->id }}">Edit</button>
                        <button class="btn btn-danger" data-toggle="modal"
                            data-target="#delete{{ $vraag1->id }}">Delete</button>
                    </td>
                </tr>
                {{-- Modal edit vraag1 --}}
                <div class="modal fade" id="edit{{ $vraag1->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="edit{{ $vraag1->id }}label" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="edit{{ $vraag1->id }}label">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="vraagedit" method="POST">
                                    @csrf

                                    <div class="form-group">
                                        <label for="name" class="col-form-label label_for">ID:</label><br>
                                        <input type="text" name="id" value="{{ $vraag1->id }}" class="form-control"
                                            readonly>

                                    </div>

                                    <div class="form-group">
                                        <label for="name" class="col-form-label label_for">Trainingen:</label><br>
                                        <input type="text" value="{{ $vraag1->vraag }}" name="training"
                                            class="form-control">

                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluit</button>
                                <button type="submit" class="btn btn-primary">Wijzig</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                {{-- end modal edit vraag1 --}}
                {{-- Modal delete vraag1 --}}
                <div class="modal fade" id="delete{{ $vraag1->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="delete{{ $vraag1->id }}label" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="delete{{ $vraag1->id }}label">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="vraagdelete" method="POST">
                                    @csrf
                                    Je gaat deze vraag verwijderen<br>


                                    <div class="form-group">
                                        <label for="name" class="col-form-label label_for">ID:</label><br>
                                        <input type="text" name="id" value="{{ $vraag1->id }}" class="form-control"
                                            readonly>

                                    </div>

                                    <div class="form-group">
                                        <label for="name" class="col-form-label label_for">Trainingen:</label><br>
                                        <input type="text" value="{{ $vraag1->vraag }}" name="training"
                                            class="form-control" readonly>

                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluit</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                {{-- end modal delete vraag1 --}}
            @endforeach
            {{-- Modal add training --}}
            <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="addlabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addlabel">Toevoegen</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="vraagadd" method="POST">
                                @csrf
                                Je gaat een training toevoegen<br>



                                <div class="form-group">
                                    <label for="name" class="col-form-label label_for">Trainingen:</label><br>
                                    <input type="text" value="" name="training" class="form-control">

                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluit</button>
                            <button type="submit" class="btn btn-primary">Voeg toe</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>


            {{-- end modal add training --}}



        </tbody>
    </table>
</div>
</main>
<footer></footer>
</div>
</div>



@endsection
