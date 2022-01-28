@extends('layouts.index')

@section('content')

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        
        <div class="row">
        <form>
            <div class="mb-3">
                <label for="kata" class="form-label">Kata</label>
                <input type="text" class="form-control" id="kata" aria-describedby="kata">
            </div>
            <div class="mb-3">
                <label for="arti" class="form-label">Arti</label>
                <input type="arti" class="form-control" id="arti">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>

        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->

@endsection