@extends('layouts.app')

@section('content')


@auth			
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Post</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('store') }}">
                        {{ csrf_field() }}
						<input id="" type="hidden" name="user_id" value="{{ Auth::user()->id }}" required>
                        <div class="form-group">
                            <label for="title" class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="contents" class="col-md-4 control-label">content</label>

                            <div class="col-md-6">
                                <input id="contents" type="text" class="form-control" name="contents" value="{{ old('contents') }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
			
			<div class="panel panel-default">
                <div class="panel-heading">List Of Post</div>

                <div class="panel-body">
					@if (!empty($posts))
						<ul class="list-inline" style='border-bottom: 1px #909090 solid;'>
							<li class="list-inline-item" style='width:100px;border-right: 1px #909090 solid;'><strong>Title</strong></li>
							<li class="list-inline-item" style="width: 300px; border-right: 1px #909090 solid;"><strong>Contents</strong></li>
							<li class="list-inline-item" style="padding-left:20px;"><strong>Action</strong></li>	
						</ul>
						@foreach($posts as $post)
						<ul class="list-inline">
							<li class="list-inline-item" style='width:100px;border-right: 1px #909090 solid;'>{{ $post->title }}</li>
							<li class="list-inline-item" style="width: 300px; border-right: 1px #909090 solid;">{{ $post->contents }}</li>
							<li class="list-inline-item" style="padding-left:20px;">
								@if (in_array(1, \Auth::user()->permissions) || \Auth::user()->id == $post->user_id)
									<button type="button" class="btn btn-success">Edit</button>
								@endif
							</li>	
						</ul>
						@endforeach
					@endif
				</div>
			</div>
        </div>
    </div>
</div>
@endif
@endsection