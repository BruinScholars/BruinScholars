@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-success">
                    <div class="panel-heading" style="background-color: #F5F5DC;">Owner(s) of book</div>

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
                            
                            <li style="float: left;"><a href="{{ url('/listAllBooks') }}"
                                            style="display: inline-block;
                                                 color: black;
                                                 text-align: center;
                                                 padding: 14px 16px;
                                                 text-decoration: none;
                                                 ">List All Books</a>
                			</li>
                        </ul>
                    <!-- Table -->
                        <table class="table">
                            <tr>
                                <th> Owner's Name</th>
                                <th> Owner's Email Address</th>
                                <th> Owner's University Year</th>
                            </tr>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user['user_name']}}</td>
                                    <td>{{$user['user_email']}}</td>
                                    <td>{{$user['user_year']}}</td>

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
