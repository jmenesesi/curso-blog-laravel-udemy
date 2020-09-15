<!-- Modal -->
<div class="modal fade" id="newPostModal" tabindex="-1" role="dialog" aria-labelledby="newPostModalLabel" aria-hidden="true">
	<form method="POST" action="{{ route('admin.posts.store', '#create') }}" role="form">
					{{ csrf_field()}}
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newPostModalLabel">Agrega el titulo a tu nueva publicación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       	<div class="form-group">
			<label>Titulo</label>
			<input type="text" id="post-title" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" value="{{ old('title') }}" placeholder="Titulo" minlength="3" required>
			{!! $errors->first('title', '<span class="help-block text-danger">:message</span>') !!}
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button class="btn btn-primary">Crear publicación</button>
      </div>
    </div>
  </div>
</form>
</div>

@push('scripts')
  <script>
    if(window.location.hash === '#create') {
      $('#newPostModal').modal('show');
    }

    $('#newPostModal').on('hide.bs.modal', function () {
      window.location.hash = '';
    });

    $('#newPostModal').on('shown.bs.modal', function () {
      $('#post-title').focus();
      window.location.hash = '#create';
    });
  </script>
@endpush