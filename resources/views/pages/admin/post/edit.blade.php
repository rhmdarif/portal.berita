<x-admin-layout>

            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    <a href="{{ route('admin.post.index') }}">
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

                        <form method="post" action="{{ route('admin.post.update', $post->id) }}"  enctype="multipart/form-data">
                            @method('PUT')
                            <div class="box box-info">
                                <div class="box-header">
                                    <h3 class="box-title">Create Post</h3>
                                </div>
                                <div class="box-body">
                                    <x-msg-respon></x-msg-respon>
                                    @csrf
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" id="title" class="form-control" name="title" value="{{ $post->title ?? "" }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <select name="category" id="category" class="form-control">
                                            @foreach ($categories as $category)
                                                @if ($category->id == $post->category_id)
                                                    <option value="{{ $category->id }}" selected>{{ $category->name ?? "" }}</option>
                                                @else
                                                    <option value="{{ $category->id }}">{{ $category->name ?? "" }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="artikel">Artikel</label>
                                        <textarea id="artikel" name="artikel" rows="10" cols="80">
                                            {!! $post->content !!}
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="tags">Tag</label>
                                        <input type="text" id="tags" class="form-control" name="tags" value="{{ $post->tags ?? "" }}">
                                    </div>
                                    <div class="alert alert-info">
                                        <strong>Info:</strong> Pisahkan tag dengan koma (,)
                                    </div>

                                    <div class="form-group">
                                        <label for="thumbnail">Thumbnail</label>
                                        <input id="thumbnail" name="thumbnail" type="file" accept="image/*">
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input id="image" name="image" type="file" accept="image/*">
                                    </div>

                                    <div class="alert alert-info">
                                        <strong>Info:</strong> Thumbnail dan Images silahkan di kosongkan apabila tidak ingin merubahnya.
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
            <x-slot name="js">
                <!-- CK Editor -->
                <script src="/assets/admin/bower_components/ckeditor/ckeditor.js"></script>
                <script>
                    CKEDITOR.replace('artikel')
                </script>
            </x-slot>
</x-admin-layout>
