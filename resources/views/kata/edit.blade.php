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
                  <form action="{{route('kata.update', $kata->id)}}" method="post">
                    @method('put')
                    @csrf

                   <div class="card-body">
                    
                      <input class="form-control form-control-lg" type="text" placeholder="Kata" value="{{$kata->kata}}" name="kata">
                      <br>
                      <input class="form-control" type="text" placeholder="Arti" value="{{$kata->arti}}" name="arti">
                      <br>

                      <div class="form-group">
                        <label for="exampleSelectBorder">Surat</label>
                        <select class="custom-select form-control-border" id="surat" name="suarat">
                          <option>Al-Fatihah</option>
                          <option>Al-Baqoroh</option>
                          <option>Al-Imron</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleSelectBorder">Ayat</label>
                        <select class="custom-select form-control-border" id="ayat" name="ayat">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                        </select>
                      </div>

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