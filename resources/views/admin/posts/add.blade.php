@extends('layouts.admin_layout')

@section('title', 'Add post')

@section('name', 'Add post')

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <form action="{{ route('posts.store') }}" method="POST">
                    @csrf
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add article</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="published">Status</label>
                                <select id="published" class="form-control custom-select" name="published">
                                    <option disabled="">Select one</option>
                                    <option value="1">Enabled </option>
                                    <option value="2">Disabled</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" id="title" class="form-control" name="title">
                            </div>
                            <div class="form-group">
                                <label for="inputAnnotation">Annotation</label>
                                <textarea id="inputAnnotation" class="form-control" rows="2" name="annotation"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="body">Text</label>
                                <textarea id="body" class="form-control" rows="6" name="body"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="text" id="image" class="form-control" name="image">
                            </div>

                            <div class="form-group">
                                <label for="user_id">Author</label>
                                <select class="custom-select rounded-0" id="exampleSelectRounded0" name="user_id">
                                    @foreach ($authors as $author)
                                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>
                            <input type="submit" value="Edit" class="btn btn-success float-right">

                        </div>
                        <!-- /.card-body -->
                    </div>


                    <!-- Equivalent to... -->
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                </form>

            </div>
        </div>
</section>
<script>
    CKEDITOR.replace('text');
  </script>

@endsection