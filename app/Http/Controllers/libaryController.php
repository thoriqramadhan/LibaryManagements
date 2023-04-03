<?php

namespace App\Http\Controllers;

use App\Http\Requests\libaryRequest;
use App\Models\Libary;
use Illuminate\Http\Request;

class libaryController extends Controller
{
    public function __construct(){
        // $this->middleware('auth');
        // $this->middleware('verified');
    }
    public function index(Request $request) {
        if ($request -> search) {
            $books = Libary::where('books', 'LIKE', "%$request->search%")
            ->get();
            return $books;
        }
        $books = Libary::paginate(4);
        return view('libarys.index', [
            'data' => $books
        ]);
        
    }
    public function show($id) {
        $books = Libary::find($id);
        return $books;
    }

    public function create(){
        return view('libarys.create');
    }

    public function store(libaryRequest $request){
        Libary::create([
            'books' => $request->books,
            'user' => $request->user
        ]);
        // return 'Success';
        return redirect('/list');
    }

    public function edit($id){
        $books = Libary::find($id);
        return view('libarys.edit', compact('books'));
    }
    
    public function update(libaryRequest $request, $id){
        $books = Libary::find($id);
        $books->update([
            'buku' => $request->books,
            'user' => $request->user
        ]);
        return redirect('/list');
    }

    public function delete($id) {
        $books = Libary::find($id)
        ->delete();
        return redirect('/list');
    }
}
