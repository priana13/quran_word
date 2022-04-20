@extends('layouts.index')

@section('content')

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        
        <div class="row">

            <div class="col-md-8">
              <!-- Form Element sizes -->
              <div class="card card-success">
                  <div class="card-header">
                    <!-- <h3 class="card-title">Different Height</h3> -->
                  </div>
                  <form action="{{route('kata.store')}}" method="post">
                    @csrf

                   <div class="card-body">
                    
                      <input class="form-control form-control-lg" type="text" placeholder="Kata" name="kata">
                      <br>
                      <input class="form-control" type="text" placeholder="Arti" name="arti">
                      <br>

                      <div class="form-group">
                        <label for="exampleSelectBorder">Type</label>
                        <select class="custom-select form-control-border" id="type" name="type">
                          <option value="">Category / Type</option>
                          <option value="isim">Isim</option>
                          <option value="Fiil">Fi'il</option>
                          <option value="huruf">Huruf</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleSelectBorder">Surat</label>
                        <select class="custom-select form-control-border" id="surat" name="surat">
                          <option value="">Pilih Surat</option>
                          
                          @foreach($surat as $row)
                            <option value="{{ $row['id'] }}">{{ $row['nama_surat'] }}</option>
                          @endforeach

                        </select>
                      </div>


                      <div class="form-group">
                        <label for="exampleSelectBorder">Ayat</label>
                        <select class="custom-select form-control-border" id="ayat" name="ayat">

                          <option value="1">1</option>
                                             

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

    @push('footer')

    <script> 

        $('#surat').change(function(){

          let id = $(this).val();
          let ayat = $('#ayat');

          $.ajax({
              url: '/ayat/'+ id +'/jumlah', 
              success : function(result){
                // console.log(result)
                ayat.empty();
                for(let i=1 ; i <= result ; i++){                
                  ayat.append('<option value="'+i+'"> '+i+' </option>');
                }
               
              }
              
          });

        });

    </script>

    @endpush

   

@endsection