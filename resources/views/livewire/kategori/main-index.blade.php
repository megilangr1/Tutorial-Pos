<div>
  <div class="card card-outline card-secondary">
    <div class="card-header">
      <h4 class="card-title">
        <span class="fa fa-table align-middle"></span> &ensp; Data Kategori 
      </h4>
      <div class="card-tools">
        <button class="btn btn-success btn-xs px-2">
          <span class="fa fa-plus"></span> &ensp; Tambah Data
        </button>
      </div>
    </div>
    <div class="card-body py-2 px-3 text-sm">
      <div class="row">
        <div class="col-md-5">
          <div class="form-group">
            <label for="nama">Nama Kategori : </label>
            <input type="text" wire:model="state.nama" name="nama" id="nama" class="form-control form-control-sm {{ $errors->has('name') ? 'is-invalid':'' }}" placeholder="Masukan Nama Kategori...">
            <div class="invalid-feedback">
              {{ $errors->first('name') }}
            </div>
          </div>
        </div>
        <div class="col-md-7">
          <div class="form-group">
            <label for="keterangan">Keterangan : </label>
            <textarea wire:model="state.keterangan" name="keterangan" id="keterangan" cols="1" rows="1" class="form-control form-control-sm {{ $errors->has('keterangan') ? 'is-invalid':'' }}" placeholder="Masukan Keterangan..."></textarea>
            <div class="invalid-feedback">
              {{ $errors->first('keterangan') }}
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <button wire:click="saveData" class="btn btn-success btn-xs btn-block">
            <span class="fa fa-check"></span> &ensp; Tambah Data
          </button>
        </div>
      </div>
    </div>
    <div class="card-body text-sm p-0">
      <h6 class="pl-3 py-1 m-0" style="background-color: #83f6ff;">Data Kategori</h6>
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nama</th>
              <th>Keterangan</th>
              <th>#</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($kategoriData as $item)
              <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->keterangan }}</td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-xs btn-warning">
                      <span class="fa fa-edit"></span>
                    </button>
                    <button class="btn btn-xs btn-danger">
                      <span class="fa fa-trash"></span>
                    </button>
                  </div>
                </td>
              </tr>
            @empty
                
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
