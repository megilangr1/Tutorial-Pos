@extends('backend.layouts.master')

@section('content')
<div class="col-12">
  <div class="card card-primary card-outline">
    <div class="card-header">
      <h4 class="card-title">
        Dashboard
      </h4>
      {{-- <div class="card-tools">
        <a href="#" class="btn btn-success btn-xs">Example Button 1</a>
        <button class="btn btn-danger btn-xs">Example Button 2</button>
        <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal-lg">Example Modal 1</button>
        <button class="btn btn-secondary btn-xs" id="btn-modal" >Example Modal with JS</button>
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
        <div class="btn-group">
          <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
            <i class="fas fa-wrench"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-right" role="menu">
            <a href="#" class="dropdown-item">Action</a>
            <a href="#" class="dropdown-item">Another action</a>
            <a href="#" class="dropdown-item">Something else here</a>
            <a class="dropdown-divider"></a>
            <a href="#" class="dropdown-item">Separated link</a>
          </div>
        </div>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
          <i class="fas fa-times"></i>
        </button>
      </div> --}}
    </div>
  </div>
</div>
<div class="modal fade" id="modal-lg">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Large Modal</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
  $(document).ready(function() {
    $('#btn-modal').on('click', function() {
      $('#modal-lg').modal('show');
    });
  });
</script>
@endsection