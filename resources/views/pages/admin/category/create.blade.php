<x-admin-layout>

            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    <a href="{{ route('admin.category.index') }}">
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

                        <form method="post" action="{{ route('admin.category.store') }}">
                            <div class="box box-info">
                                <div class="box-header">
                                    <h3 class="box-title">Create Category</h3>
                                </div>
                                <div class="box-body">
                                    <x-msg-respon></x-msg-respon>
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" placeholder="Nama Category">
                                    </div>
                                </div>
                                <div class="box-footer clearfix">
                                    <button type="submit" class="pull-right btn btn-default" id="sendEmail">Buat</button>
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
