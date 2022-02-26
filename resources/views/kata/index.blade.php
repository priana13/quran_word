@extends('layouts.index')

@section('content')

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        
        <div class="row">

          <div class="col-lg-12">

            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Daftar Kosa Kata Tersedia</h3>
                <div class="card-tools">
                  <a href="{{ route('kata.create') }}" class="btn btn-sm btn-tool">
                    Tambah
                    <i class="fas fa-paper-plane"> </i>
                  </a>
                  <a href="#" class="btn btn-sm btn-tool">
                    <i class="fas fa-bars"></i>
                  </a>
                </div>
              </div>
              <div class="card-body">
                @foreach($data as $row)
                  <div class="d-flex lign-items-center border-bottom mb-3">
                    <p class="text-success text-xl">
                      {{-- <i class="ion ion-ios-refresh-empty"></i> --}}
                      {{ $row->kata }}
                        
                      <a href="{{ route('kata.edit', $row->id) }}" class="btn btn-sm btn-tool">
                       <i class="fas fa-pen fa-sm"></i>
                      </a>
                      <br>
                    </p>

                   
                    <!-- <div class="d-flex justify-content-between align-items-center border-bottom mb-3"> -->

                    <form  action="{{ route('kata.destroy', $row->id) }}" method ="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="delete" class="btn btn-sm btn-tool">
                        <!-- <i class="fas fa-trash fa-sm"></i> -->
                        </input>
                    </form>                     


                   

                    <p class="d-flex flex-column text-right">
                      <span class="font-weight-bold">
                        <i class="ion ion-android-arrow-up text-success"></i> 12
                      </span>
                      <span class="text-muted">{{ $row->arti }}</span>
                    </p>
                  </div>
                @endforeach

                {{-- <!-- /.d-flex -->
                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                  <p class="text-warning text-xl">
                    <i class="ion ion-ios-cart-outline"></i>
                  </p>
                  <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                      <i class="ion ion-android-arrow-up text-warning"></i> 0.8%
                    </span>
                    <span class="text-muted">SALES RATE</span>
                  </p>
                </div>
                <!-- /.d-flex -->
                <div class="d-flex justify-content-between align-items-center mb-0">
                  <p class="text-danger text-xl">
                    <i class="ion ion-ios-people-outline"></i>
                  </p>
                  <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                      <i class="ion ion-android-arrow-down text-danger"></i> 1%
                    </span>
                    <span class="text-muted">REGISTRATION RATE</span>
                  </p>
                </div> --}}
                <!-- /.d-flex -->
              </div>
            </div>

          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->

@endsection