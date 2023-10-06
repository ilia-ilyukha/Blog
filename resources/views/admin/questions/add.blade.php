@extends('layouts.admin_layout')

@section('title', 'Add question')

@section('name', 'Add questions')

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <form action="{{ route('questions.store') }}" method="POST">
                    @csrf
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add question</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Status -->
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select id="status" class="form-control custom-select" name="status">
                                    <option disabled="">Select one</option>
                                    <option value="1">Enabled </option>
                                    <option value="2">Disabled</option>
                                </select>
                            </div>

                            <!-- Title -->
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" id="title" class="form-control" name="title">
                            </div>

                            <!-- Question -->
                            <div class="form-group">
                                <label for="inputQuestion">Question</label>
                                <textarea id="inputQuestion" class="form-control" rows="2" name="question"></textarea>
                            </div>

                            <!-- Answer -->
                            <div class="form-group">
                                <label for="inputAnswer">Answer</label>
                                <textarea id="inputAnswer" class="form-control" rows="2" name="answer"></textarea>
                            </div>
                            
                             <!-- Tag -->
                            <div class="form-group">
                                <label for="tag">Tag</label>
                                <input type="text" id="tag" class="form-control" name="tag">
                            </div>

                            <a href="{{ route('questions.index') }}" class="btn btn-secondary">Cancel</a>
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