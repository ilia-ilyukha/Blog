@extends('layouts.admin_layout')

@section('title', 'Users')

@section('name', 'Users')

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
                    <h3 class="card-title">Пользователи</h3>

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
                        <a href="{{ route('users.create') }}">
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
                                    User Name
                                </th>
                                <th style="width: 30%">
                                    Role
                                </th>
                                <th>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>
                                    <a href="{{ route('users.edit', $user) }}"> {{ $user->id }} </a>
                                </td>
                                <td>
                                    <a href="{{ route('users.edit', $user) }}">
                                        {{ $user->name }}
                                    </a>
                                </td>
                                <td class="project_progress role">
                                {{ $user->role }}
                                </td>
                                <td class="project_progress">
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $users->links('vendor.pagination.custom') }}
                
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