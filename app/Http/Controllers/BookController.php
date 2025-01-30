<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class BookController extends Controller
{
    // LCRUD --> List = index, Create (Read, Update) = edit + update, Delete = destroy
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $books = Book::latest()->paginate(5);
        return view('books.index', compact('books'))
            ->with(['i' => (request()->input('page', 1) - 1) * 5, 'message' => 'Boeken zijn opgehaald.']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function edit(?Book $book): View
    {
        if ($book === null) {
            $book = new Book();
        }
        return view('book.edit', compact('book'));
    }

    /**
     * Create and Update the specified resource in storage.
     */
    public function update(Request $request, Book $book): RedirectResponse
    {
        // dd($request->all());
        try {
            $req = $request->validate([
                'title' => 'required',
                'description' => 'required',
                'ISBN' => 'required',
                'author' => 'required',
            ]);
            if ($book->id === null) {
                Book::create($req);
                $message = 'Boek is aangemaakt.';
            } else {
                $book->update($req);
                $message = 'Boek is aangepast.';
            }
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                $message = 'Er is een dublicaat gevonden voor ISBN.';
                return back()->with(['status' => 'error', 'message' => $message])
                    ->withErrors(['ISBN' => 'ISBN is al in gebruik'])
                    ->withInput();
            }
        } catch (\Exception $e) {
            $message = 'Er is iets fout gegaan.' . $e->getMessage();
            return back()->with(['status' => 'error', 'message' => $message])->withInput();
        }
        return redirect()->route('book.index')->with(['status' => 'book-updated', 'message' => $message]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book): RedirectResponse
    {
        $book->delete();
        return redirect()->route('book.index')
            ->with('success', 'Boek is verwijderd.');
    }
}
