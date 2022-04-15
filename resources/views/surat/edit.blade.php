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
                  <form action="{{route('surat.update',$surat->id)}}" method="post">
                    @csrf
                    @method('put')

                   <div class="card-body">

                    <div class="row">
                      <div class="form-group col-md-3">
                        <input class="form-control form-control-lg" type="number" placeholder="No" name="urutan_surat" value="{{$surat->urutan_surat}}">
                      </div>
                      

                      <div class="form-group col-md-5">
                       <input class="form-control form-control-lg" type="text" placeholder="Nama Surat" name="nama_surat" value="{{$surat->nama_surat}}">
                       </div> 
                      

                      <div class="form-group col-md-4">
                        <input class="form-control form-control-lg" type="text" placeholder="Nama Surat Latin" name="nama_surat_latin" value="{{$surat->nama_surat_latin}}">
                       </div>   
                    </div>
                    
                      
                      <br>
                      <input class="form-control" type="text" placeholder="Arti" name="arti" value="{{$surat->arti}}">
                      <br>

                      <div class="form-group">
                        <!-- <label >Halaman</label> -->
                        <textarea class="form-control" rows="5" cols="10" name="deskripsi" placeholder="Deskripsi Surat">{{$surat->deskripsi}}</textarea>
                      </div>

                      <div class="form-group">
                        <!-- <label >Halaman</label> -->
                        <input class="form-control" type="number" name="jumlah_ayat" placeholder="Jumlah Ayat" value="{{$surat->jumlah_ayat}}">
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