@extends('layouts.admin_layout')

@section('title', 'Posts')

@section('name', 'Posts')

@section('content')

<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <!-- <div class="row">


        </div> -->
        <!-- /.row -->
        <!-- Main row -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Статьи блога</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-header">
                            <form action="{{ route('posts.index')  }}">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Search posts</label>
                                    <input
                                        placeholder="ex: My favorite post"
                                        value="{{ request()->get('query', '')  }}"
                                        type="text"
                                        name="query"
                                        class="form-control"
                                        id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text">
                                        Search post by title, annotation, text.
                                        {{--                                           <b>total found</b>: {{ $user_count }}--}}
                                    </div>
                                    <button type="submit" class="btn btn-block btn-outline-primary">Find</button>
                                </div>
                            </form>
                        </div>
                <div class="card-body p-0">
                    <div class="flex">
                        <a href="{{ route('posts.create') }}">
                            <button type="button" class="btn btn-block btn-outline-primary">Create</button>
                        </a>
                    </div>
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 1%">
                                    №
                                </th>
                                <th style="width: 20%">
                                    Article Name
                                </th>
                                <th style="width: 30%">
                                    Author
                                </th>
                                <th>
                                    Annotation
                                </th>
                                <th style="width: 8%" class="text-center">
                                    Status
                                </th>
                                <th style="width: 20%">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <td>
                                    <a href="{{ route('posts.edit', $post) }}"> {{ $post->id }} </a>
                                </td>
                                <td>
                                    <a href="{{ route('posts.edit', $post) }}">
                                        {{ $post->title }}
                                    </a>
                                    <br />
                                    <small>
                                        {{ $post->created_at }}
                                    </small>
                                </td>
                                <td>
                                    {{ $post->user->name }}
                                </td>
                                <td class="project_progress">
                                    {{ $post->annotation }}
                                </td>
                                <td class="project-state">
                                    <span class="badge badge-success">
                                        {{ $post->published }}
                                    </span>
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-primary btn-sm" href="#">
                                        <i class="fas fa-folder">
                                        </i>
                                        View
                                    </a>
                                    <a class="btn btn-info btn-sm" href="{{ route('posts.edit', $post) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </button>
                                    </form>
                                    <!-- <a class="btn btn-danger btn-sm" href="#">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a> -->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $posts->links('vendor.pagination.custom') }}
                <!-- <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                            <ul class="pagination">
                                <li class="paginate_button page-item previous disabled" id="example2_previous"><a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                <li class="paginate_button page-item active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                <li class="paginate_button page-item next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                            </ul>
                        </div>
                    </div>
                </div> -->
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>

@endsection


@push('links')
<link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }} ">
<style>
    .flex {
        display: flex;
        justify-content: end;
        margin: 13px 25px;
    }

    .btn-block {
        width: auto !important;
    }
</style>
@endpush