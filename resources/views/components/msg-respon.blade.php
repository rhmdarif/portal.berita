@if (session('error'))
    <div class="alert alert-danger">
       <strong>Gagal!</strong> {{ session('error') }}
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
       <strong>Berhasil!</strong> {{ session('success') }}
    </div>
@endif
