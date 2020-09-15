@extends('admin.layout')

@section('header')
	<div class="container-fluid">
		<div class="row mb-2">
		  <div class="col-sm-6">
		    <h1 class="m-0 text-dark">Editar Publicaci&oacute;n</h1>
		  </div><!-- /.col -->
		  <div class="col-sm-6">
		    <ol class="breadcrumb float-sm-right">
		      <li class="breadcrumb-item"><a href="{{ route('admin.home')}}">Inicio</a></li>
		      <li class="breadcrumb-item"><a href="{{ route('admin.posts.index')}}">Posts</a></li>
		      <li class="breadcrumb-item active">{{$post->title}}</li>
		    </ol>
		  </div><!-- /.col -->
		</div><!-- /.row -->
	</div>
@stop

@section('content')

@if ($post->photos->count())
<div class="row">
	<div class="col-md-12">
	<div class="card card-primary">
		<div class="card-header">
			
		  </div>
		<div class="card-body">
			<div class="row">
			@foreach($post->photos as $photo)
			<div class="col-lg-2 col-md-3 col-sm-12">
		<form method="POST" action="{{route('admin.photos.destroy', $photo)}}">
			{{ method_field('DELETE')}} {{ csrf_field() }}
				<button class="btn btn-danger" style="position:absolute">
					<i class="fa fa-times"></i>
				</button>
				<img src="{{ url($photo->path)}}" class="img-responsive">
		</form>
	</div>
	@endforeach
			</div>
		</div>
	</div>
	</div>
</div>
@endif
<form method="POST" action="{{ route('admin.posts.update', $post) }}" role="form">
					{{ csrf_field()}} {{method_field('PUT')}}
<div class="row">
	<div class="col-md-8">
		<div class="card card-primary">
			<div class="card-header">
			  <h3 class="card-title"><strong>Publicación</strong> - {{$post->title}}</h3>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				
					<div class="form-group">
						<label>Titulo</label>
						<input type="text" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" value="{{ old('title', $post->title) }}" placeholder="Titulo">
						{!! $errors->first('title', '<span class="help-block text-danger">:message</span>') !!}
					</div>
					<div class="form-group">
						<label class="control-label {{ $errors->has('body') ? 'text-danger' : '' }}">Contenido de la publicación</label>
						<textarea name="body" class="textarea form-control" placeholder="Ingresa el contenido completo de la publicación">{{ old('body', $post->body) }}</textarea>
						{!! $errors->first('body', '<span class="help-block text-danger">:message</span>') !!}
					</div>

					<div class="form-group">
						<label class="control-label {{ $errors->has('iframe') ? 'text-danger' : '' }}">Contenido embebido (iframe)</label>
						<textarea name="iframe" class="textarea form-control" placeholder="Ingresa contenido embebido (iframe) de audio o video">{{ old('iframe', $post->iframe) }}</textarea>
						{!! $errors->first('iframe', '<span class="help-block text-danger">:message</span>') !!}
					</div>
					
	               {{--  <div class="form-group">
	                	<button type="submit" class="btn btn-primary btn-block">
	                		<i class="fa fa-save"></i> Guardar Publicaci&oacute;n
	                	</button>
	                </div> --}}
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card card-primary">
			<div class="card-header">
			  <h3 class="card-title">Información adicional</h3>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<div class="form-group">
	                  <label>Fecha de publicaci&oacute;n</label>

	                  <div class="input-group">
		                    <div class="input-group-prepend">
		                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
		                    </div>
		                    <input type="text" id="published_at" name="published_at" class="form-control" data-inputmask-alias="datetime" 	data-inputmask-inputformat="dd/mm/yyyy" 
		                     value="{{ old('published_at', $post->published_at ? $post->published_at->format('m/d/Y') : null) }}" data-mask="" im-insert="false">
		                  </div>
	                </div>
					<div class="form-group">
						<label>Categoria</label>
						<select name="category_id" class="select2 form-control {{ $errors->has('category_id') ? 'is-invalid' : '' }}">
							<option value="">Selecciona una categoria</option>
							@foreach($categorias as $categoria)
							<option value="{{ $categoria->id}}" {{ old('category_id', $post->category ? $post->category->id : null) == $categoria->id ? 'selected' : ''}}>{{ $categoria->name}}</option>
							@endforeach
						</select>
						{!! $errors->first('category_id', '<span class="help-block text-danger">:message</span>') !!}
					</div>
					<div class="form-group">
						<label>Etiquetas</label>
						<select name="tags[]" class="select2 form-control {{ $errors->has('tags') ? 'is-invalid' : '' }}" multiple="multiple"
							data-placeholder="Seleccionar Etiquetas">
							<option value="">Selecciona una categoria</option>
							@foreach($tags as $tag)
								<option {{ collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected' : '' }} value="{{ $tag->id}}">{{ $tag->name}}</option>
							@endforeach
						</select>
						{!! $errors->first('tags', '<span class="help-block text-danger">:message</span>') !!}
					</div>
					<div class="form-group">
						<label>Extracto de la publicación</label>
						<textarea name="excerpt" class="form-control" placeholder="Ingresa un extracto de la publicación">{{ old('excerpt', $post->excerpt) }}</textarea>
						{!! $errors->first('excerpt', '<span class="help-block text-danger">:message</span>') !!}
					</div>
	                <div class="form-group">
						<div class="dropzone"></div>
					</div>
	                <div class="form-group">
	                	<button type="submit" class="btn btn-primary btn-block">
	                		<i class="fa fa-save"></i> Guardar Publicaci&oacute;n
	                	</button>
	                </div>
				
			</div>
		</div>
	</div>
</div>
</form>

@stop

@push('styles')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css">
  	<link rel="stylesheet" href="/AdminLTE/plugins/summernote/summernote-bs4.css">
	<link rel="stylesheet" href="/AdminLTE/plugins/daterangepicker/daterangepicker.css">
	<!-- Select2 -->
  	<link rel="stylesheet" href="/AdminLTE/plugins/select2/css/select2.min.css">
  	<link rel="stylesheet" href="/AdminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  	<link href="/ckeditor/plugins/codesnippet/lib/highlight/styles/github.css" rel="stylesheet">
@endpush

@push('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
	<script src="/AdminLTE/plugins/daterangepicker/daterangepicker.js"></script>
	<script src="/AdminLTE/plugins/select2/js/select2.full.min.js"></script>
	<script src="/AdminLTE/plugins/summernote/summernote-bs4.min.js"></script>
    <script src="/ckeditor/ckeditor.js"></script>

	<script>
 		$('#published_at').daterangepicker({
    		singleDatePicker: true,
    		showDropdowns: true,
		});
		$('.select2').select2({
			tags: true
		});
	    // Summernote
	    //$('.textarea').summernote();
	   CKEDITOR.replace( 'body' );
	   var myDropzone = new Dropzone('.dropzone', {
	   	url: '/admin/posts/{{ $post->url }}/photos',
	   	acceptedFiles: 'image/*',
	   	paramName: 'photo',
	   	maxFileSize: 2,
	   	dictDefaultMessage: 'Arrastra las fotos aquí para subirlas',
	   	headers: {
	   		'X-CSRF-TOKEN': '{{ csrf_token() }}'
	   	}
	   });

	   CKEDITOR.config.height = 315;
	   myDropzone.on('error', function (file, res){
	   	$('.dz-error-message:last > span').text(res.errors.photo[0]);
	   });
	   Dropzone.autoDiscover = 0;
	</script>
	
@endpush