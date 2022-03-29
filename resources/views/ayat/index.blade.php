@extends('layouts.index')

@section('content')

<div class="content">
  <div class="container-fluid">
    
    <div class="row">
      <div class="col">

        <div class="card">
          <div class="card-header">
            <div class="card-title">List Ayat</div>

            <div class="card-tools">
                  <a href="{{ route('ayat.create') }}" class="btn btn-sm btn-tool">
                    Tambah
                    <i class="fas fa-paper-plane"> </i>
                  </a>
                  <a href="#" class="btn btn-sm btn-tool">
                    <i class="fas fa-bars"></i>
                  </a>
                </div>

          </div>

          <div class="card-body">

               <div class="table-responsive">
                <table class="table">
                  <thead>
                    @foreach($data as $row)
                    <tr>
                      <td>
                      <p class="text-success text-xl">
                        {{-- <i class="ion ion-ios-refresh-empty"></i> --}}
                        {{ $row->ayat }}
                       
                        <form class="form-inline"  action="{{ route('ayat.destroy', $row->id) }}" method ="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="delete" class="btn btn-sm btn-tool">
                        
                        <a href="{{ route('ayat.edit', $row->id) }}" class="btn btn-sm btn-tool">
                        <i class="fas fa-pen fa-sm"></i>
                        </a>
                        
                      </form>  
                    
                      </p>


                      



                    </td>
                      <td>
                        
                    <p class="d-flex flex-column text-right">
                      <span class="font-weight-bold">
                        <i class="ion ion-android-arrow-up text-success"></i> 12
                      </span>
                      <span class="text-muted">{{ $row->arti }}</span>
                    </p>
                  </td>
                  
                
                    </tr>
                    @endforeach
                  </thead>
                </table>
               </div>

               {{ $data->links() }}

          </div>
        </div>
        <!-- akhir card -->
      </div>
      <!-- akhir col -->

    </div>
    <!-- akhir row -->

  </div>
</div>



@endsection