@extends('layouts.admin_layout')

@section('name', 'Редактировать вопрос')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <form action="{{ route('questions.update', $question['id']) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ $question['title'] }}</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" id="title" name="title" class="form-control" value="{{ $question['question'] }}">
                            </div>
                            <div class="form-group">
                                <span>{{ $question['answer'] }}</span>
                            </div>

                            <div class="form-group">
                                <label for="answers">Variants:</label>
                                <input type="text" id="answer1" name="variants[0]" class="form-control" value="{{ $question['variants'][0] }}">
                                <input type="text" id="answer2" name="variants[1]" class="form-control" value="{{ $question['variants'][1] }}">
                                <input type="text" id="answer3" name="variants[2]" class="form-control" value="{{ $question['variants'][2] }}">
                                <input type="text" id="answer4" name="variants[3]" class="form-control" value="{{ $question['variants'][3] }}">
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
<script>hljs.initHighlightingOnLoad();</script>
@endsection