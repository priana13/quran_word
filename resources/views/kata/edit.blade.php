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
                  <form action="{{route('kata.update', $kata->id)}}" method="post">
                    @method('put')
                    @csrf

                   <div class="card-body">
                    
                      <input class="form-control form-control-lg" type="text" placeholder="Kata" value="{{$kata->kata}}" name="kata">
                      <br>
                      <input class="form-control" type="text" placeholder="Arti" value="{{$kata->arti}}" name="arti">
                      <br>


                      <div class="form-group">
                        <label for="exampleSelectBorder">Type</label>
                        <select class="custom-select form-control-border" id="type" name="type">
                          <option value="">Category / Type</option>
                          <option value="isim" <?php ($kata->type == 'isim')? 'selected' : '';?> >Isim</option>
                          <option value="fiil" <?php ($kata->type == 'fiil')? 'selected' : '';?> >Fi'il</option>
                          <option value="huruf" <?php ($kata->type == 'huruf')? 'selected' : '';?> >Huruf</option>
                        </select>
                      </div>

                      <h3>Surat:</h3>

                      <table class="table">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Surat</th>
                            <th>Ayat</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i = 1; ?>

                          @foreach($kata->kata_ayat as $row)
                          
                          <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $row->ayat->surat->nama_surat }}</td>
                            <td>{{ $row->ayat->urutan }}</td>
                            <td>
                              <button class="btn btn-sm btn-primary">
                                edit
                              </button>
                              <button class="btn btn-sm btn-danger">
                                delete
                              </button>
                            </td>
                          </tr>

                          <?php $i++; ?>
                          @endforeach

                        </tbody>
                      </table>
                        
                      <br>
                      <br>
                      <h3>Tambahkan:</h3>

                      <div class="form-group">
                        <label for="exampleSelectBorder">Surat</label>
                        <select class="custom-select form-control-border" id="surat" name="surat">
                          <option value="">Pilih Surat</option>

                          @foreach($surat as $row)
                            <option value="{{ $row['id'] }}"
                            >{{ $row['nama_surat'] }}</option>
                          @endforeach
                          
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleSelectBorder">Ayat</label>
                        <select class="custom-select form-control-border" id="ayat" name="ayat">
                          
                          <option>Pilih Ayat</option>
                          
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