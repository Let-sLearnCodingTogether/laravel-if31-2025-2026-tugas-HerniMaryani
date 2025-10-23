<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Exception;
use Illuminate\Support\Facades\Response;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $book = Book::all();

            return response()->json([
                'message' => 'List Book',
                'data' => $book
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'data' => null
            ], 500);
        }
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        try {
            $validatedData = $request->safe()->all();

            $book = Book::create($validatedData);
            return response()->json([
                'message' => 'Book berhasil dibuat',
                'data' => $book
            ], 201);
            
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan',
                'data' => $e->getMessage(),
            ], 500);
    }
}

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        try {
            return Response::json([
                'message' => "Detail Book",
                'data' => $book
            ], 200);
        }catch (Exception $e) {
            return Response::json([
                'message' => $e->getMessage(),
                'data' => null
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        try {
            
            $validated = $request->safe()->all();

            if($book->update($validated)){
                return Response::json([
                    'message' => "Book updated",
                    'data' => $book
                ], 200);
            }

           
            return Response::json([
                'message' => "Book not updated",
                'data' => null
            ], 200);
        } catch (\Exception $e) {
            
            return Response::json([
                'message' => $e->getMessage(),
                'data' => null
            ], 500);
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        try {
            if($book->delete()){
                return Response::json([
                    'message' => "Book deleted",
                    'data' => null
                ], 200);
            }

            return Response::json([
                'message' => "Book not deleted",
                'data' => null
            ], 500);

        } catch (\Exception $e) {
            return Response::json([
                'message' => $e->getMessage(),
                'data' => null
            ], 500);
        }
    }
}
