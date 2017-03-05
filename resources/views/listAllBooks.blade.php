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
                                <th> Society</th>
                            </tr>
                            @foreach($books as $book)
                                <tr>
                                    <td><form method="get" action="{{ url('/bookOwner') }}">
                                        <input type="hidden" name="book_id"  value="{{$book['book_id']}}" />
                                        <button type="submit" style=" display: flex;
  overflow: hidden;
  width:100px;
  cursor: pointer;
  user-select: none;
  transition: all 60ms ease-in-out;
  text-align: center;
  white-space: nowrap;
  text-decoration: none !important;
  text-transform: none;
  text-transform: capitalize;
  color: #fff;
  border: 0 none;
  border-radius: 4px;
  font-size: 14px;
  font-weight: 500;
  line-height: 1.3;
  -webkit-appearance: none;
  -moz-appearance:    none;
  appearance:         none;
  justify-content: center;
  align-items: center;
  flex: 0 0 160px;">{{$book['book_name']}}</td>
                                    <td> <form method="get" action="{{ url('/showDiscussions') }}">
                                        <input type="hidden" name="society_id"  value="{{$book['society_id']}}" />
                                        <button type="submit" style=" display: flex;
  overflow: hidden;
  width:100px;
  cursor: pointer;
  user-select: none;
  transition: all 60ms ease-in-out;
  text-align: center;
  white-space: nowrap;
  text-decoration: none !important;
  text-transform: none;
  text-transform: capitalize;
  color: #fff;
  border: 0 none;
  border-radius: 4px;
  font-size: 14px;
  font-weight: 500;
  line-height: 1.3;
  -webkit-appearance: none;
  -moz-appearance:    none;
  appearance:         none;
  justify-content: center;
  align-items: center;
  flex: 0 0 160px;">{{$book['society_name']}}</button>
                                    </form></td>
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
