<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends ApirestController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($isbn, Request $request)
    {



        $url = 'https://openlibrary.org/api/books?bibkeys=ISBN:' . $isbn . '&amp;jscmd=data&amp;format=json&#39';
        $data = json_decode(file_get_contents($url), true);

        if (!$data) {
            return $this->errorResponse("ISBN no fue encontrado", 400);
        }
        $param = "ISBN:" . $isbn;
        $request['id'] = $isbn;
        $request['title'] = $data[$param]['title'];
        $request['cover'] = isset($data[$param]['cover']) ? $data[$param]['cover']['large'] : 'Na';


            $book = Book::create($request->all());
            $book = Book::find($isbn);
        


            $authors = isset($data[$param]['authors']) ? $data[$param]['authors'] : [];
            foreach ($authors as $key => $value) {
                $author = Author::create(['name' => $value['name'], 'book_id' => $book->id]);

            }






            return (['message' =>'Libro guardado exitosamente', 'code'=> 201]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(book $book)
    {
        return $this->showOne($book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($isbn)
    {
        $Book = Book::where('id', $isbn)->first();
        if($Book != null){
            $Book->delete();
            return (['message' =>'Borrado Correctamente', 'code'=> 201]);

        }
        return (['message' =>'ISBN incorrecto','code'=> 404]);

    }
}
