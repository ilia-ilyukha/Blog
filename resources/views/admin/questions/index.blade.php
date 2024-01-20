@extends('layouts.admin_layout')

@section('title', 'Add post')

@section('name', 'Add post')

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
                <div class="card-body p-0">
                    <div class="flex">
                        <a href="{{ route('questions.create') }}">
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
                                    Title
                                </th>
                                <th style="width: 30%">
                                    Status
                                </th>
                                <th>
                                    Tag
                                </th>
                                <th style="width: 20%">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($questions as $question)
                            <tr>
                                <td>
                                    <a href="{{ route('questions.edit', $question) }}"> {{ $question->id }} </a>
                                </td>
                                <td>
                                    <a href="{{ route('questions.edit', $question) }}">
                                        {{ $question->title }}
                                    </a>
                                </td>
                                <td>
                                    <!-- {{ $question->nickname }} -->
                                </td>
                                <td class="project_progress">
                                    {{ $question->status }}
                                </td>
                                <td class="project-state">
                                    <span class="badge badge-success">
                                        {{ $question->tag }}
                                    </span>
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-primary btn-sm" href="#">
                                        <i class="fas fa-folder">
                                        </i>
                                        View
                                    </a>
                                    <a class="btn btn-info btn-sm" href="{{ route('questions.edit', $question) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <form action="{{ route('questions.destroy', $question->id) }}" method="POST" style="display: inline-block">
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
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>

@endsection
