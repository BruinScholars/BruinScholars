@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-success">
                    <div class="panel-heading" style="font-weight: bold;
                    background-color: white; ">
                        <a href="{{ url(action('DiscussionController@show', ['discussion_id'=>$discussion->id, 'society_id'=>$society->id]))}}">Back to Discussion Page</a>
                    </div>

                @if(Auth::check())
                    <!-- Table -->
                        <table class="table">
                            <tr>
                                <th>Author</th>
                            </tr>

                            <tr>
                                <td>{{$post->user_name}}</td>
                            </tr>

                            <tr>
                                <th>Posted at</th>
                            </tr>

                            <tr>
                                <td>{{$post->created_at}}</td>
                            </tr>

                            <tr>
                                <th>Last Replied at</th>
                            </tr>

                            <tr>
                                <td>{{$post->updated_at}}</td>
                            </tr>

                            @if($post->has_link==1)
                            <tr>
                                <td>
                                    <a href="{{url($file_url)}}">Download the attached file</a>
                                </td>
                            </tr>
                            @endif

                        </table>
                    @endif
                </div>
                @if(Auth::guest())
                    <a href="{{ url('/login') }}" class="btn btn-info"> You need to login to see the list 😜😜 >></a>
                @endif
            </div>

            <div class="col-md-8">
                <div class="panel panel-success">
                    <div class="panel-heading" style="background-color: white; font-weight: bold;">{{$post->title}}</div>

                    @if(Auth::check())
                        <p style="text-align: justify; margin: 10px">
                            @php
                                $content = $post->content;
                                echo nl2br($content);
                            @endphp
                        </p>
                    @endif


                </div>
                @if(Auth::guest())
                    <a href="{{ url('/login') }}" class="btn btn-info"> You need to login to see the list 😜😜 >></a>
                @endif
            </div>

            <div class="col-md-8">
                <div class="panel panel-success">
                    <div class="panel-heading">Replies</div>

                @if(Auth::check())
                    <!-- Table -->
                        <table class="table">

                            <tr>
                                <th>Content</th>
                                <th>Author</th>
                                <th>Posted at</th>
                            </tr>

                            @foreach($comments as $comment)
                                <tr>
                                    <td>{{$comment->content}}</td>
                                    <td>{{$comment->commenter_name}}</td>
                                    <td>{{$comment->created_at}}</td>
                                </tr>
                            @endforeach
                        </table>
                    @endif


                </div>
                @if(Auth::guest())
                    <a href="{{ url('/login') }}" class="btn btn-info"> You need to login to see the list 😜😜 >></a>
                @endif
            </div>

            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading" style="font-weight: bold;">Reply</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/postComment') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">

                                <div class="col-md-12" >
                                    <textarea  id="content" type="text" class="form-control" name="content" value="{{ old('content') }}" required autofocus rows="5"> </textarea>

                                    @if ($errors->has('content'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <input type="hidden" name="discussion_id"  value="{{$discussion->id}}" />
                            <input type="hidden" name="society_id" value="{{$society->id}}" />
                            <input type="hidden" name="post_id" value="{{$post->post_id}}" />

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-0">
                                    <button type="submit" class="btn btn-primary">
                                        Post
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
