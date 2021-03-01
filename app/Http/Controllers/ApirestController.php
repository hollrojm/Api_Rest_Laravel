<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

class ApirestController extends Controller
{

    //json error
    protected function errorResponse($message, $code){
    return response()->json(['error' => $message , 'code' => $code] ,$code);
    }

    protected function showAllBooks(Collection $collection){

         if( $collection->isEmpty() ){
            return (['message' =>'No se encuentran libros en la base de datos']);
        }

        $resource = $collection->first()->resource;
        $resourceCollection = $collection->first()->resourceCollection;
        $collection = $this->transfCollection($collection, $resource, $resourceCollection);

        $collection = $this->paginate($collection);

        return (['message' =>'Colección encontrada']);
    }
    private function transfCollection(Collection $collection, $resource, $resourceCollection){
        $transform = $resource::collection($collection);
        return new $resourceCollection($transform);
    }



}
