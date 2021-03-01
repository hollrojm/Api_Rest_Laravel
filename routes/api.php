<?php
use App\Http\Controllers\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\BookResource;
use App\Http\Resources\BookCollection;
use App\Models\Book;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::post('books/create/{isbn}', [BookController::class, 'create']);
Route::post('books/delete/{isbn}', [BookController::class, 'destroy']);
Route::get('/books', function () {
    return new BookCollection(Book::paginate(3));
});
Route::get('books/{isbn}', function ($id) {
    return new BookResource(Book::findOrFail($id));
});
