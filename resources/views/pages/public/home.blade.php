@extends('layouts.app')
@section('title','Auroblog')

@section('links')

@endsection

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			
		</div>
    </div>
    @foreach($posts as $post)
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h2>
                        {{ $post->title }}
                    </h2>
                    <p>
                        {{ $post->content }}
                    </p>
                    <p>
                        {{ $post->created_at }}
                    </p>
                </div>
            </div>
        </div>
    @endforeach
</div>
@stop

@section('scripts')

@stop
