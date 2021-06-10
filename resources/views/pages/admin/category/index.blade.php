<x-admin-layout>

            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Category
                    <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Category</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-12">

                        <!-- quick email widget -->
                        <div class="box box-info">
                            <div class="box-header">

                                <h3 class="box-title">Create Category</h3>
                            </div>
                            <div class="box-body">
                                <form method="get">
                                    <div class="form-group">
                                        <label for="search">Search</label>
                                        <input type="text" class="form-control" name="search">
                                    </div>
                                    <button type="submit" class="btn btn-primary pull-right">Search</button>
                                </form>
                                <div style="margin-bottom: 60px;"></div>
                                <table class="table table-bordered mt-100">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama Category</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>{{ $category->id }}</td>
                                                <td>{{ $category->name ?? "" }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                                        <button type="button" onclick="remove({{ $category->id }})" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="pull-right">
                                    {!! $categories->links('vendor.pagination.bootstrap-4') !!}
                                </div>
                            </div>
                        </div>

                    </section>
                    <!-- /.Left col -->
                </div>
                <!-- /.row (main row) -->

            </section>
            <!-- /.content -->
    <x-slot name="js">
        <script>
            function remove(id) {
                Swal.fire({
                    title: 'Apakah kamu ingin menghapus ID '+id+' ?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: `Iya, Hapus`,
                    denyButtonText: `Batal`,
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route("admin.category.index") }}/'+id,
                            method: "DELETE",
                            data: {
                                _token: "{{ csrf_token() }}"
                            }
                        })
                        .done(function(result) {
                            if(result.status) {
                                Swal.fire('Success!', result.msg, 'success').then(() => {
                                    location.reload();
                                })
                            } else {
                                Swal.fire('Error!', result.msg, 'error')
                            }
                        })
                        .fail(() => {
                            Swal.fire('Error!', '', 'error')
                        })
                    } else if (result.isDenied) {
                        Swal.fire('Permintaan dibatalkan', '', 'info')
                    }
                })
            }
        </script>
    </x-slot>
</x-admin-layout>
