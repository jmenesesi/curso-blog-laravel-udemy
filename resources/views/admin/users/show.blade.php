@extends('admin.layout')

@section('content')

 <div class="row">
 	<div class="col-md-3">
 		<div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="/AdminLTE/img/user4-128x128.jpg" alt="$user->name profile picture">
                </div>

                <h5 class="profile-username text-center">{{ $user->name}}</h5>

                <p class="text-muted text-center">{{ $user->getRoleNames()->implode(', ') }}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{ $user->email}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Publicaciones</b> <a class="float-right">{{ $user->posts->count()}}</a>
                  </li>
                  <!--<li class="list-group-item">
                    <b>Friends</b> <a class="float-right">13,287</a>
                  </li>-->
                </ul>

                <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary btn-block"><b>Editar</b></a>
              </div>
              <!-- /.card-body -->
            </div>
 	</div>
 	<div class="col-md-3">
 		<div class="card card-primary card-outline">
 			<div class="card-header">
 				<h5 class="box-title">
 					Publicaciones
 				</h5>
 			</div>
 			<div class="card-body">
 				@forelse( $user->posts as $post)
 					<a href="{{ route('post.show', $post) }}" target="_blank">
 						<strong>{{ $post->title}}</strong>
 					</a>
 					<br>
 					<small class="text-muted">Publicado el {{ $post->published_at->format('d/m/Y') }}</small>
 					<p class="text-muted">{{ $post->excerpt }}</p>
 					@unless($loop->last)
 						<hr>
 					@endunless

 					@empty
 					<small class="text-muted">
 						No tiene publicaciones
 					</small>
 				@endforelse
 			</div>
 		</div>
 	</div>
 	<div class="col-md-3">
 		<div class="card card-primary card-outline">
 			<div class="card-header">
 				<h5 class="box-title">
 					Roles del usuario
 				</h5>
 			</div>
 			<div class="card-body">
 				@forelse( $user->roles as $rol)
 					<strong>{{ $rol->name}}</strong>
 					@if($rol->permissions->count())
 					<small class="text-muted">Permisos: {{ $rol->permissions->pluck('name')->implode(', ') }}</small>
 					@endif
 					@unless($loop->last)
 						<hr>
 					@endunless

 					@empty
 					<small class="text-muted">
 						No tiene roles asociados
 					</small>
 				@endforelse
 			</div>
 		</div>
 	</div>
 	<div class="col-md-3">
 		<div class="card card-primary card-outline">
 			<div class="card-header">
 				<h5 class="box-title">
 					Permisos adicionales
 				</h5>
 			</div>
 			<div class="card-body">
 				@forelse( $user->permissions as $permission)
 					<strong>{{ $permission->name}}</strong>
 					@unless($loop->last)
 						<hr>
 					@endunless

 					@empty
 					<small class="text-muted">
 						No tiene permisos adicionales
 					</small>
 				@endforelse
 			</div>
 		</div>
 		
 	</div>
 </div>
@endsection