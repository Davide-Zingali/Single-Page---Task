<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\User;
use App\Task;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'auth.basic']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    // home task
    public function index()
    {
        $user = Auth::user();

        $tasks = $user -> tasks;

        return view('home', compact('user', 'tasks'));
    }

    // dettagli task
    public function show($id)
    {
        $task = Task::findOrFail($id);

        return view('page.show', compact('task'));
    }

    // crazione task
    public function create() {
        return view('page.create');
    }

    public function store(Request $request) {

        // validation
        $request -> validate([
            "titolo" => 'required|min:3|max:50',
            "info" => 'required|min:3|max:400',
            "note" => 'max:600'
        ]);

        $newTask = Task::make($request -> all());

        $user = Auth::user($request -> get('user_id'));

        $newTask -> user() -> associate($user);
        $newTask -> save();

        return redirect() -> route('home');
    }

    // edit task
    public function edit($id) {
        
        $task = Task::findOrFail($id);

        return view('page.edit', compact('task'));
    }

    public function update(Request $request, $id) {

        // validation
        $request -> validate([
            "titolo" => 'required|min:3|max:50',
            "info" => 'required|min:3|max:400',
            "note" => 'max:600'
        ]);

        $newTask = Task::findOrFail($id);

        $newDati = $request -> all();

        $newTask -> update($newDati);

        return redirect() -> route('show', $newTask -> id);
    }
}
