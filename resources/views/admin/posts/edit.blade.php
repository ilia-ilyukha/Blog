@extends('layouts.admin_layout')

@section('name', 'Редактировать статью')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <form action="{{ route('posts.update', $post['id']) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">General</h3>

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
                                    <option value="0">Disabled</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" id="title" name="title" class="form-control" value="{{ $post['title'] }}">
                            </div>
                            <div class="form-group">
                                <label for="annotation">Annotation</label>
                                <textarea id="annotation" name="annotation" class="form-control" rows="2">{{ $post['annotation'] }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="body">Text</label>
                                <textarea id="body" name="body" class="form-control" rows="6">{{ $post['body'] }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="created_at">Created at:</label>
                                <input type="text" name="created_at" id="inputClientCompany" class="form-control" value="{{ $post['created_at'] }}">
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="text" id="image" class="form-control" name="image" value="{{ $post['image'] }}">
                            </div>

                            <div class="form-group">
                                <label for="author">Author</label>
                                <select class="custom-select rounded-0" id="exampleSelectRounded0" name="author">
                                    @foreach ($authors as $author)
                                    <option @if ($author->id === $post['user_id']) selected @endif value="{{ $author->id }}">{{ $author->name }}</option>
                                    @endforeach
                                </select>

                                <!-- <input type="text" id="inputClientCompany" class="form-control" value="{{ $author->nick }}"> -->
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

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  
  
<script>
// tinymce.init({selector:'#body'});
tinymce.init({
    selector: '#body',
    plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
    menubar: 'file edit view insert format tools table help',
    toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
    toolbar_sticky: true,
    autosave_ask_before_unload: true,
    autosave_interval: '30s',
    autosave_prefix: '{path}{query}-{id}-',
    autosave_restore_when_empty: false,
    autosave_retention: '2m',
    image_advtab: true,
    link_list: [
      { title: 'My page 1', value: 'https://www.codexworld.com' },
      { title: 'My page 2', value: 'http://www.codexqa.com' }
    ],
    image_list: [
      { title: 'My page 1', value: 'https://www.codexworld.com' },
      { title: 'My page 2', value: 'http://www.codexqa.com' }
    ],
    image_class_list: [
      { title: 'None', value: '' },
      { title: 'Some class', value: 'class-name' }
    ],
    importcss_append: true,
    file_picker_callback: (callback, value, meta) => {
      /* Provide file and text for the link dialog */
      if (meta.filetype === 'file') {
        callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
      }
  
      /* Provide image and alt text for the image dialog */
      if (meta.filetype === 'image') {
        callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
      }
  
      /* Provide alternative source and posted for the media dialog */
      if (meta.filetype === 'media') {
        callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
      }
    },
    templates: [
      { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
      { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
      { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
    ],
    template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
    template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
    height: 400,
    image_caption: true,
    quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
    noneditable_class: 'mceNonEditable',
    toolbar_mode: 'sliding',
    contextmenu: 'link image table',
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
});

</script>

@endsection

@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
@endpush