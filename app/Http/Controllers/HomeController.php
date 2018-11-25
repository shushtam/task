<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterRequest;
use App\User;
use Carbon\Carbon;

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
     * @param FilterRequest $request
     * @return \Illuminate\Http\Response
     */
    public function index(FilterRequest $request)
    {
        $users = new User();
        if (isset($request->name) && isset($request->name_comparison)) {
            if ((bool)$request->name_comparison) {
                $users = $users->where('name', $request->name);
            } else {
                $users = $users->where('name', 'like', '%' . $request->name . '%');
            }
        }
        if (isset($request->email) && isset($request->email_comparison)) {
            if ((bool)$request->email_comparison) {
                $users = $users->where('email', $request->email);
            } else {
                $users = $users->where('email', 'like', '%' . $request->email . '%');
            }
        }
        if (isset($request->age) && isset($request->age_comparison)) {
            $users = $users->where('age', $request->age_comparison, $request->age);
        }
        if (isset($request->created_at) && isset($request->created_at_comparison)) {
            $users = $users->whereDate('created_at', $request->created_at_comparison, Carbon::parse($request->created_at)->toDateString());
        }
        $users = $users->paginate(50)->appends(request()->query());
        return view('home')->with(['users' => $users, 'data' => $request->all(), 'allowed_comparisons' => User::$allowed_comparisons]);
    }
}
