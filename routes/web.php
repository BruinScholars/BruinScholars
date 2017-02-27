<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/** Following routes are for authentication
 * /login for logging in
 * /lout for logging out
 * /register for register
*/
Auth::routes();

Route::get('lout', 'LogOutController@logOut');

// Route for the main page(welcome view)
Route::get('/', 'SocietyController@listUserSocieties');

// Route for the profile page
// TODO: change '/password' to 'profile'
Route::get('/password', 'ListController@showUserInfo');

// TODO: deprecate this route
Route::get('/home', 'HomeController@index');

// TODO: deprecate this route
Route::get('/got', [
  'middleware' => ['auth'],
  'uses' => function () {
   echo "You are allowed to view this page!";
}]);

/**
 * The following routes are related to join/ delete/ listing societies.
 */

Route::get('join', 'SocietyController@join');

Route::get('quit', 'SocietyController@quit');

Route::get('listSocieties', 'SocietyController@listAllSocieties');

// TODO: change to post later

Route::get('postCreation', 'PostController@postCreation');

Route::post('createPost', 'PostController@create');

Route::post('create', 'SocietyController@createSociety');

Route::get('delete', 'SocietyController@deleteSociety');

Route::get('listMembers', 'SocietyController@listSocietyMembers');

// Returns the view for the form of creating a society
Route::get('createSociety', function () {
    return view('societyCreation');
});

/**
 * The following routes are related to showing discussions of a society.
 */

Route::get('showDiscussions', 'DiscussionController@show');

Route::get('createDiscussion', 'DiscussionController@discussionCreation');

Route::post('createDis', 'DiscussionController@create');

/**
 * The following routes are for showing, creating and updating posts.
 */

Route::any('showPost', 'PostController@show');

/**
 * The following route is for posting a comment
 */

Route::post('postComment', 'CommentController@post');

/**
 * The following routes are for adding and searching books.   // TODO
 */

 Route::get('addBook', 'BookController@addBook');

 Route::get('listAllBooks', 'BookController@listAllBooks');
 
 Route::post('createBook', 'BookController@create');