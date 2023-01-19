<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;
use App\Models\User;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

use App\Events\SendMessage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function chat(){
        return view('chat');
    }

    public function messages(){
        return Message::with('user')->get();
    }

    public function messageStore(Request $request){
        $user = Auth::user();

        $messages = $user->messages()->create([
            'message' => $request->message
        ]);

        broadcast(new SendMessage($user, $messages))->toOthers();

        return 'message sent';
    }

    public function user_list(Request $request){
        // $users = User::get();
        // $perpage = 5;
        // $currentpage = request("page") ?? 1;

        // $pagination = new LengthAwarePaginator(
        //     $users->slice($currentpage, $perpage),
        //     $users->count(),
        //     $perpage,
        //     $currentpage,
        //     [
        //         'path' => request()->url(),
        //         'query' => request()->query(),
        //     ]
        // );

        $users = User::paginate(2);
 
        $users->setPath(request()->url());
       
         // dd($users);


        return view('user.index', compact('users'));
    }
}
