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
                    <!-- <h3 class="card-title">Different Height</h3> -->
                  </div>
                  <form action="{{route('ayat.update' , $ayat->id)}}" method="post">
                    @method('put')
                    @csrf

                   <div class="card-body">
                    
                      <input class="form-control form-control-lg" type="text" placeholder="Nama Ayat" name="ayat" value="{{$ayat->ayat}}">
                      <br>
                      <input class="form-control" type="text" placeholder="Arti Ayat" name="arti" value="{{$ayat->arti}}">
                      <br>

                      <div class="form-group">
                        <!-- <label >Halaman</label> -->
                        <input class="form-control" type="number" name="urutan" placeholder="Surat Ke" value="{{$ayat->halaman}}" >
                      </div>

                      <div class="form-group">
                        <!-- <label >Halaman</label> -->
                        <input class="form-control" type="number" name="halaman" placeholder="Halaman" value="{{$ayat->halaman}}">
                      </div>

                      <div class="form-group">
                        <!-- <label >Juz</label> -->
                        <input class="form-control" type="number" name="juz" placeholder="Juz" value="{{$ayat->juz}}">
                      </div>

                      <div class="form-group">
                        <select name="surat" class="form-control" id="">
                          @foreach($surat as $row)
                            <option value="{{$row->id}}" <?php

                              if($ayat->surat_id == $row->id){echo 'selected';}
                              
                             ?> >{{$row->nama_surat}}</option>
                          @endforeach
                        </select>
                      </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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