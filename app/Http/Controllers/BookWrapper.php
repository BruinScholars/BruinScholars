<?php

    use App\Book;
	use App\UserBook;
	use App\User;
	
    class BookWrapper {
		
		static public function insertBookToSociety ($society_id, $book_name)
		{
			$book = new Book();
            $book->book_name = $book_name;
			$book->society_id = $society_id;
			$book->save();
            return $book;
		}
		
		static public function insertBookToUser ($user_id, $book_id)
		{
			DB::table('UserBook')->insert(
                    ['user_id' => $user_id, 'book_id' => $book_id]
                );
		}
		
		static public function removeBookFromUser ($user_id, $book_id)
		{
			$query = DB::table('UserBook')
                ->where('user_id', $user_id)
                ->where('book_id', $book_id)
                ->get();
            
            if($query)
            {
                DB::table('UserBook')
                    ->where('user_id', $user_id)
                    ->where('book_id', $book_id)
                    ->delete();
            }
		}
		
        static public function getBooksOfUser ($user_id)
        {
        	$user_books = App\UserBook::where('user_id', $user_id)->get();
            return $user_books;
        }
    
    	static public function getBooksUserDontHave ($user_id)
        {
            $all = self::getAllBooks();
            $books_owned = self::getBooksOfUser($user_id);
            $book_ids_owned = array();
            foreach ($books_owned as $book)
            {
                array_push($book_ids_owned, $book->book_id);
            }
            // get index of societies user not in
            $index = array();
            $initial = 0;
            foreach ($all as $book)
            {
                if(in_array($book->id, $book_ids_owned))
                {
                    //unset($society, $all);
                    array_push($index, $initial);
                }
                $initial++;
            }
            //remove socities a user is in from $all
            foreach ($index as $i)
            {
                unset($all[$i]);
            }
            // get a new array
            $result = array();
            foreach($all as $key => $value)
            {
                array_push($result, $value);
            }
            return $result;
        }

    
    	static public function getBookTitleFromID ($book_id)
    	{
			$book = DB::table('Book')->where('id', $book_id)->first();
            $name = $book->book_name;
            return $name;
    	}
        
        static public function getOwnersOfABook ($book_id)
        {
        	$books_user = App\UserBook::where('book_id', $book_id)->get();
            return $books_user;
        }
        
        static public function getBooksFromIds($book_ids) {
            $books = array();
            foreach ($book_ids as $book_id) {
                //$id = $society_id->society_id;
                //$name = self::getSocietyName($id);
                //$societies[$id] = $name;
                //throw new ErrorException($name);
                $book = DB::table('Book')->where('id', $book_id->book_id)->first();
                array_push($books, $book);
            }
            return $books;
        }
        
        static public function getUsersFromIds($user_ids) {
            $users = array();
            foreach ($user_ids as $user_id) {
                //$id = $society_id->society_id;
                //$name = self::getSocietyName($id);
                //$societies[$id] = $name;
                //throw new ErrorException($name);
                $user = DB::table('users')->where('id', $user_id->user_id)->first();
                array_push($users, $user);
            }
            return $users;
        }

		static public function getAllBooks() {
			$books = DB::table('Book')->orderBy('society_id','asc')->orderBy('book_name','asc')->get();
			//$books = App\Book::all();
            return $books;
		}
		
		static public function getAllUsers() {
			$books = DB::table('users')->orderBy('name','asc')->get();
			//$books = App\Book::all();
            return $books;
		}
		
    }