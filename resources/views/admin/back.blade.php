<section class="sign-in">
    <div class="container">              
        <h2>Admin panel</h2><br><a style="float:right;" href="{{ url('/logout_admin') }}"> logout </a>
        <h2>Vragen</h2>
        <h2>Vraag 1</h2>
        <h2>Add<h2>
          <form action="vraagadd" method="POST">
            @csrf
          <input type="text" value="" name="id">              
          <input type="text" value="" name="vraag_vraag">
          <input type="hidden" value="vraag1" name="table">
          <input type="submit" value="add">
        </form>
        @foreach ($vraag1 as $vraag1 )
   


      <form action="vraagedit" method="POST">
          @csrf
        <input type="text" value="{{ $vraag1->id }}" name="id">              
        <input type="text" value="{{ $vraag1->vraag }}" name="vraag_vraag">
        <input type="hidden" value="vraag1" name="table">
        <input type="submit" value="edit">
        <a data-toggle="modal" data-target="#delete{{ $vraag1->id }}">delete</a>
      </form>
      {{-- vraag delete --}}
      <form action="vraagdelete" method="POST">
        @csrf
      <div class="modal fade" id="delete{{ $vraag1->id }}" tabindex="-1" role="dialog" aria-labelledby="delete{{ $vraag1->id }}label" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="delete{{ $vraag1->id }}label">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Je gaat deze vraag verwijderen<br>
              <input type="hidden" value="vraag1" name="table">

          <input type="hidden" value="{{ $vraag1->id }}" name="id">
              Id:{{ $vraag1->id }}<br>
             Vraag: {{ $vraag1->vraag }}


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
      </form>
        @endforeach
    

        <div class="signin-content">
          <h2>Users</h2>
           <table width='80%' border=0>

            <tr bgcolor='#CCCCCC'>
                <td>username</td>
                <td>Email</td>
                <td>studentnummer</td>
                <td>klas</td>
                <td>Status</td>
                <td>Update</td>
            </tr>
            @foreach ($users as $users )
                    <tr>
                    <td>{{ $users->name }}</td>
                    <td>{{ $users->email }}</td>
                    <td>{{ $users->studentnummer }}</td>
                    <td>{{ $users->klas }}</td>
                    <td>{{ $users->status }}</td>
                    <td><a data-toggle="modal" data-target="#delete{{ $users->id }}">delete<a>
                        <a data-toggle="modal" data-target="#update{{ $users->id }}" >edit</a></td>
                </tr>

                <div class="modal fade" id="delete{{ $users->id }}" tabindex="-1" role="dialog" aria-labelledby="delete{{ $users->id }}Label" aria-hidden="true">
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
                            <p>ID: {{$users->id}}</p>
                            <p>Naam: {{$users->name}}</p>
                            <p>Email: {{$users->email}}</p>
    
                            <p>Klas: {{$users->klas}}</p>                            </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <a type="button" href="admin/delete/{{ $users->id }}"class="btn btn-danger" style="color:white;">Delete</a>
                        </div>
                      </div>
                    </div>
                  </div>





                <div class="modal fade" id="update{{ $users->id }}" tabindex="-1" role="dialog" aria-labelledby="update{{ $users->id }}label" aria-hidden="true">
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
                                <input type="text" name="naam" class="form-control" value="{{ $users->name }}" id="recipient-name">
                                <input type="hidden" name="id" class="form-control" value="{{ $users->id }}" id="recipient-name">
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-form-label label_for">email:</label><br>
                                <input type="text" name="email" class="form-control" value="{{ $users->email }}" id="recipient-name">
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-form-label label_for">klas:</label><br>
                                <input type="text" name="klas" class="form-control" value="{{ $users->klas }}" id="recipient-name">
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-form-label label_for">status:</label><br>
                                <select name="status" >
                                    <option value="nogniet">Nog niet ingeschreven</option>
                                    <option value="ingeschreven">ingeschreven</option>

                                </select>
                            </div>
                            

                            <div class="form-group">
                                <label for="name" class="col-form-label label_for">ophoogte:</label><br>
                                <textarea name="ophoogte" class="form-control">{{ $users->ophoogte }}</textarea>

                            </div>


                            <div class="form-group">
                                <label for="name" class="col-form-label label_for">training:</label><br>
                                <textarea name="training" class="form-control">{{ $users->training }}</textarea>

                            </div>

                            <div class="form-group">
                                <label for="name" class="col-form-label label_for">bijzonderheden:</label><br>
                                <textarea name="bijzonderheden" class="form-control">{{ $users->bijzonderheden }}</textarea>

                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                       </form>
                    </div>
                  
                    </div>
                  </div>
        @endforeach
        </div>

    </div>           

</section>