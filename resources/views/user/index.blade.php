@extends('layouts.index')

@section('content')

<div class="content">
  <div class="container-fluid">
    
    <div class="row">
      <div class="col">

        <div class="card">
          <div class="card-header">
            <div class="card-title">List Users</div>

            <div class="card-tools">
                  <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">
                    Tambah
                    <i class="fas fa-plus"> </i>
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
                  </thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Privilage</th>
                    <th>Action</th>
                  </tr>

                  <tbody>
                    @foreach($users as $row)
                      <tr>
                        <td>
                          <i class="ion ion-person"></i>
                          {{ $row->name }}
                        </td>
                        <td>                        
                          <p class="">
                            <span class="">
                              <i class="ion ion-email text-success"></i> {{ $row->email }}
                            </span>
                            <!-- <span class="text-muted">{{ $row->rule }}</span> -->
                          </p>
                        </td>

                        <td>
                          {{ $row->rule }}
                        </td>

                        <td>
                          <form class="form-inline"  action="{{ route('user.destroy', $row->id) }}" method ="post">
                            @csrf
                            @method('delete')
                            <a type="submit"                           
                            value="delete" class="btn btn-sm btn-tool">
                            <!-- <i class="fas fa-trash fa-sm"></i> -->                       

                            <a href="{{ route('user.edit', $row->id) }}" class="btn btn-sm btn-tool">
                            <i class="fas fa-pen fa-sm"></i>
                            </a>
                        </form> 

                        </td>


                      </tr>
                    @endforeach
                  </tbody>
                </table>
               </div>
             
          </div>
        </div>
        <!-- akhir card -->
        
      </div>
      <!-- akhir col -->

    </div>
    <!-- akhir row -->
    {{-- {{ $users->links() }} --}}
  </div>
</div>



@endsection