<x-admin-layout>

            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    <a href="{{ route('admin.user.index') }}">
                        <i class="fa fa-arrow-left"></i>
                        Kembali
                    </a>
                </h1>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-12">

                        <!-- quick email widget -->

                        <form method="post" action="{{ route('admin.user.update', $user->id) }}"  enctype="multipart/form-data">
                            @method('PUT')
                            <div class="box box-info">
                                <div class="box-header">
                                    <h3 class="box-title">Update User</h3>
                                </div>
                                <div class="box-body">
                                    <x-msg-respon></x-msg-respon>
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" id="email" class="form-control" name="email" value="{{ $user->email ?? "" }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" id="name" class="form-control" name="name" value="{{ $user->name ?? "" }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="text" id="password" class="form-control" name="password" value="">
                                    </div>
                                </div>
                                <div class="box-footer clearfix">
                                    <button type="submit" class="pull-right btn btn-default">Ubah</button>
                                </div>
                            </div>
                        </form>

                    </section>
                    <!-- /.Left col -->
                </div>
                <!-- /.row (main row) -->

            </section>
            <!-- /.content -->
</x-admin-layout>
