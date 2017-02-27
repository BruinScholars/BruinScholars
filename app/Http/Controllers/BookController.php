<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

require_once ('SocietyWrapper.php');
require_once ('BookWrapper.php');


class BookController extends Controller
{
    public function listAllBooks(Request $request) {
        // Current user would be the one making comments
        $bookss = \BookWrapper::getAllBooks();
        $books = array();
        foreach ($bookss as $book) {
            $society_id = $book->society_id;
            $society_name =\SocietyWrapper::getSocietyName($society_id);
            $booka = array('book_name'=>($book->book_name), 'society_name'=>($society_name), 'society_id'=>($society_id),
            'book_id'=>($book->id));
            array_push($books, $booka);
        }
    	return view('listAllBooks', ['books' => $books]);
    }
}