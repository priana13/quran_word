@extends('layouts.index')

@section('content')

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        
        <div class="row">

            <div class="col">
              <!-- Form Element sizes -->
              <div class="card card-success">
                  <div class="card-header">
                    <!-- <h3 class="card-title">Different Height</h3> -->
                  </div>
                  <form action="{{route('surat.store')}}" method="post">
                    @csrf

                   <div class="card-body">

                    <div class="row">
                      <input class="form-control form-control-lg col-md-3" type="number" placeholder="No" name="urutan_surat">

                      <input class="form-control form-control-lg col-md-9" type="text" placeholder="Nama Surat" name="nama_surat">

                    </div>


                     
                      <br>
                      <input class="form-control" type="text" placeholder="Arti" name="arti">
                      <br>

                      <div class="form-group">
                        <!-- <label >Halaman</label> -->
                        <textarea class="form-control" rows="5" cols="10" name="deskripsi" placeholder="Deskripsi Surat"></textarea>
                      </div>

                      <div class="form-group">
                        <!-- <label >Halaman</label> -->
                        <input class="form-control" type="number" name="jumlah_ayat" placeholder="Jumlah Ayat" >
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