@extends('layouts.index')

@section('content')

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        
        <div class="row">

            <div class="col-md-6">
              <!-- Form Element sizes -->
              <div class="card card-success">
                  <div class="card-header">
                    <h3 class="card-title">Tambah User</h3>
                  </div>
                  <form action="{{route('user.store')}}" method="post">
                    @csrf

                   <div class="card-body">

                       <div class="form-group">
                         <input class="form-control" type="text" placeholder="Name" name="name">                                         
                       </div>

                      <div class="form-group">
                        <!-- <label >Halaman</label> -->
                        <input class="form-control" type="text" name="phone" placeholder="Phone" >
                      </div>


                      <div class="form-group">
                        <!-- <label >Halaman</label> -->
                        <input class="form-control" type="email" name="email" placeholder="Alamat Email" >
                      </div>

                      <div class="form-group">
                        <!-- <label >Halaman</label> -->
                        <input class="form-control" type="password" name="password" placeholder="Password" >
                      </div>


                      <div class="form-group">
                        <!-- <label >Halaman</label> -->
                        <input class="form-control" type="password" name="password_confirmation" placeholder="Password Confirm" >
                      </div>


                      <div class="form-group">
                       
                        <select class="form-control" name="rule">
                            <option value="">Privilage</option>
                            <option value="user">User</option>
                            <option value="super">Super Admin</option>
                        </select>

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

                    </div>
                    <!-- /.card-body -->


                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </form>
                </div>
                <!-- /.card -->
            </div>
            <!-- col-md -->



        

        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->

@endsection