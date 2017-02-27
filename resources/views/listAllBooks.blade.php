@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-success">
                    <div class="panel-heading" style="background-color: #F5F5DC;">List of all books</div>

                @if(Auth::check())
                        <ul style=" list-style-type: none;
                                    margin: 0;
                                    padding: 0;
                                    overflow: hidden;
                                    background-color: 	#F8F8F8;
                            ">

                            <li style="float: left;"><a href="{{ url('/addBook') }}"
                                                        style="display: inline-block;
                                                             color: black;
                                                             text-align: center;
                                                             padding: 14px 16px;
                                                             text-decoration: none;
                                                             ">Add a Book</a>
                            </li>
                        </ul>
                    <!-- Table -->
                        <table class="table">
                            <tr>
                                <th>Book Title</th>
                                <th>Society</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($books as $book)
                                <tr>
                                    <td>{{$book['book_name']}}</td>
                                    <td>{{$book['society_name']}}</td>
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
