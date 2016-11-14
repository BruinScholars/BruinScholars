@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-success">
                    <div class="panel-heading">List of all Discussions</div>

                @if(Auth::check())
                    <!-- Table -->
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Category</th>
                            </tr>
                            <tr>
                                <td>These are discussions for {{$society->name}}</td>
                            </tr>
                            @foreach($all_dis as $dis)
                                <tr>
                                    <td>{{$dis->id}}</td>
                                    <td>
                                        @if($dis->quarter==0) winter
                                        @elseif($dis->quarter==1) spring
                                        @elseif($dis->quarter==2) summer
                                        @elseif($dis->quarter==3) fall
                                        @endif
                                    </td>
                                    <td>{{$dis->year}}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td>Posts for @if($discussion->quarter==0) winter
                                    @elseif($discussion->quarter==1) spring
                                    @elseif($discussion->quarter==2) summer
                                    @elseif($discussion->quarter==3) fall
                                    @endif
                                    {{$discussion->year}}
                                </td>
                            </tr>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->post_id}}</td><td>{{$post->title}}</td><td>{{$post->content}}</td>
                                </tr>
                            @endforeach
                        </table>
                    @endif


                </div>
                @if(Auth::guest())
                    <a href="{{ url('/login') }}" class="btn btn-info"> You need to login to see the list 😜😜 >></a>
                @endif
            </div>
        </div>
    </div>
@endsection
