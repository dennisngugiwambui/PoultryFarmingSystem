<?php

namespace App\Http\Controllers;

use App\Models\Chick;
use App\Models\Poultry;
use App\Models\Egg;
use App\Models\Feed;
use App\Models\Price;
use App\Models\Sales;
use App\Models\User;
use http\Env\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::id()) {
            $usertype = Auth::user()->usertype;

            if ($usertype === 'farmer') {
                $bidder = auth()->user();


                $chicken=Poultry::all();
                $Count = DB::table('poultries')->selectRaw('SUM(number) AS aggregate')->get()->first()->aggregate;
                $eggs = DB::table('eggs')->selectRaw('SUM(eggs_number) AS eggs')->get()->first()->eggs;
                $eggsRecord=Egg::all();
                $totalSales=Sales::sum('total');

                // Get the start and end date for the past week



                // Convert today's date to the format "d M Y"
                $todayFormatted = Carbon::today()->format('d M Y');

                // Find the eggs laid today based on the formatted date
                $todaysEggs = Egg::where('date', 'LIKE', $todayFormatted . '%')->sum('eggs_number');
                $distinctSalesTypes = Sales::select('salesType', \DB::raw('SUM(quantity) as totalQuantity'))
                    ->groupBy('salesType')
                    ->get();

                //$todaysEggs = Egg::whereDate('date', '=', Carbon::createFromFormat('d M Y', Carbon::today()->format('d M Y')))->sum('eggs_number');


                //return response()->json($chicken);

                return view('Admin.index', compact('chicken', 'Count', 'eggs', 'eggsRecord', 'todaysEggs', 'distinctSalesTypes', 'totalSales'));
            } else if ($usertype === 'users') {

                $chicken=Poultry::all();
                $Count = DB::table('poultries')->selectRaw('SUM(number) AS aggregate')->get()->first()->aggregate;
                $eggs = DB::table('eggs')->selectRaw('SUM(eggs_number) AS eggs')->get()->first()->eggs;
                $eggsRecord=Egg::all();
                $totalSales=Sales::sum('total');


                return view('Users.index', compact('chicken', 'eggs', 'eggsRecord', 'totalSales', 'Count'));
            }
        } else {
            return view('auth.login');
        }
    }

    public function RegisterPoultry()
    {
        if (Auth::id()) {
            $usertype = Auth::user()->usertype;

            if ($usertype === 'farmer') {
                $bidder = auth()->user();

                $Count=Poultry::sum('number');
                $eggs=Egg::sum('eggs_number');
                $chicks = Poultry::all();

                // Convert today's date to the format "d M Y"
                $todayFormatted = Carbon::today()->format('d M Y');
                $totalSales=Sales::sum('total');

                // Find the eggs laid today based on the formatted date
                $todaysEggs = Egg::where('date', 'LIKE', $todayFormatted . '%')->sum('eggs_number');


                return view('Admin.RegisterPoultry', compact('eggs', 'chicks', 'Count', 'todaysEggs', 'totalSales'));
            } else if ($usertype === 'users') {

                $bidder = auth()->user();

                $Count=Poultry::sum('number');
                $eggs=Egg::sum('eggs_number');
                $chicks = Poultry::all();

                // Convert today's date to the format "d M Y"
                $todayFormatted = Carbon::today()->format('d M Y');
                $totalSales=Sales::sum('total');

                // Find the eggs laid today based on the formatted date
                $todaysEggs = Egg::where('date', 'LIKE', $todayFormatted . '%')->sum('eggs_number');



                return view('Users.chickens', compact('eggs', 'chicks', 'Count', 'todaysEggs', 'totalSales'));
            }
        } else {

            return view('auth.login');
        }

    }

    public function eggs()
    {
        if (Auth::id()) {
            $usertype = Auth::user()->usertype;

            if ($usertype === 'farmer') {
                $Count = Poultry::sum('number');
                $eggs = Egg::sum('eggs_number');
                $eggsCount = Egg::all();
                // Convert today's date to the format "d M Y"
                $todayFormatted = Carbon::today()->format('d M Y');
                $totalSales = Sales::sum('total');

                // Find the eggs laid today based on the formatted date
                $todaysEggs = Egg::where('date', 'LIKE', $todayFormatted . '%')->sum('eggs_number');

                return view('Admin.eggs', compact('Count', 'eggs', 'eggsCount', 'todaysEggs', 'totalSales'));
            } else if ($usertype === 'users') {
                $Count = Poultry::sum('number');
                $eggs = Egg::sum('eggs_number');
                $eggsCount = Egg::all();
                // Convert today's date to the format "d M Y"
                $todayFormatted = Carbon::today()->format('d M Y');
                $totalSales = Sales::sum('total');

                // Find the eggs laid today based on the formatted date
                $todaysEggs = Egg::where('date', 'LIKE', $todayFormatted . '%')->sum('eggs_number');

                return view('Users.eggs', compact('Count', 'eggs', 'eggsCount', 'todaysEggs', 'totalSales'));
            }
        } else {

            return view('auth.login');
        }
    }

    public function eggsDetails(Request $request)
    {

        $Count=Poultry::sum('number');
        $eggs=Egg::sum('eggs_number');
        //$eggsCount = Egg::where('id', $request->id)->get();
        $eggsCount = Egg::find($request->id);
        // Convert today's date to the format "d M Y"
        $todayFormatted = Carbon::today()->format('d M Y');
        $totalSales=Sales::sum('total');

        // Find the eggs laid today based on the formatted date
        $todaysEggs = Egg::where('date', 'LIKE', $todayFormatted . '%')->sum('eggs_number');
        return view('Admin.eggsdetails', compact('Count', 'eggs', 'eggsCount', 'todaysEggs', 'totalSales'));

    }

    public function chickenDetails(Request $request)
    {

        $Count=Poultry::sum('number');
        $eggs=Egg::sum('eggs_number');
        //$eggsCount = Egg::where('id', $request->id)->get();
        $eggsCount = Poultry::find($request->id);
        // Convert today's date to the format "d M Y"
        $todayFormatted = Carbon::today()->format('d M Y');
        $totalSales=Sales::sum('total');

        // Find the eggs laid today based on the formatted date
        $todaysEggs = Egg::where('date', 'LIKE', $todayFormatted . '%')->sum('eggs_number');
        return view('Admin.chickendetails', compact('Count', 'eggs', 'eggsCount', 'todaysEggs', 'totalSales'));

    }

    public function sales()
    {

        $Count=Poultry::sum('number');
        $eggs=Egg::sum('eggs_number');
        //$eggsCount = Egg::where('id', $request->id)->get();
        $eggsCount = Poultry::all();
        $price=Price::all();
        $chicken=Egg::all();
        $sales = Sales::orderBy('created_at', 'desc')->get();
        // Convert today's date to the format "d M Y"
        $todayFormatted = Carbon::today()->format('d M Y');
        $totalSales=Sales::sum('total');

        // Find the eggs laid today based on the formatted date
        $todaysEggs = Egg::where('date', 'LIKE', $todayFormatted . '%')->sum('eggs_number');
        return view('Admin.sales', compact('Count', 'eggs', 'eggsCount', 'todaysEggs', 'price', 'sales', 'totalSales'));

    }

    public function prices()
    {

        $chicken=Poultry::all();
        $Count=Poultry::sum('number');
        $eggs=Egg::sum('eggs_number');
        $eggsRecord=Egg::all();
        $price=Price::all();
        $totalSales=Sales::sum('total');

        // Convert today's date to the format "d M Y"
        $todayFormatted = Carbon::today()->format('d M Y');

        // Find the eggs laid today based on the formatted date
        $todaysEggs = Egg::where('date', 'LIKE', $todayFormatted . '%')->sum('eggs_number');

        return view('Admin.newPrices', compact('chicken', 'Count', 'eggs', 'eggsRecord', 'todaysEggs', 'price', 'totalSales'));

    }

    public function newSales()
    {
        $chicken=Poultry::all();
        $Count=Poultry::sum('number');
        $eggs=Egg::sum('eggs_number');
        $eggsRecord=Egg::all();
        $price=Price::all();
        $totalSales=Sales::sum('total');

        // Convert today's date to the format "d M Y"
        $todayFormatted = Carbon::today()->format('d M Y');

        // Find the eggs laid today based on the formatted date
        $todaysEggs = Egg::where('date', 'LIKE', $todayFormatted . '%')->sum('eggs_number');
        return view('Admin.newSales', compact('chicken', 'Count', 'eggs', 'eggsRecord', 'todaysEggs', 'price', 'totalSales'));
    }


    public function news()
    {
        $chicken=Poultry::all();
        $Count=Poultry::sum('number');
        $eggs=Egg::sum('eggs_number');
        $eggsRecord=Egg::all();
        $price=Price::all();
        $totalSales=Sales::sum('total');
        $sales = Sales::orderBy('created_at', 'desc')->get();

        $chicks=Chick::all();

        // Convert today's date to the format "d M Y"
        $todayFormatted = Carbon::today()->format('d M Y');

        // Find the eggs laid today based on the formatted date
        $todaysEggs = Egg::where('date', 'LIKE', $todayFormatted . '%')->sum('eggs_number');
        return view('Admin.news', compact('chicken', 'Count', 'eggs', 'eggsRecord', 'todaysEggs', 'price', 'totalSales', 'sales', 'chicks'));

    }

    public function feeding()
    {
        $chicken=Poultry::all();
        $Count=Poultry::sum('number');
        $eggs=Egg::sum('eggs_number');
        $eggsRecord=Egg::all();
        $price=Price::all();
        $totalSales=Sales::sum('total');
        $sales = Sales::orderBy('created_at', 'desc')->get();

        $feed=Feed::all();

        // Convert today's date to the format "d M Y"
        $todayFormatted = Carbon::today()->format('d M Y');

        // Find the eggs laid today based on the formatted date
        $todaysEggs = Egg::where('date', 'LIKE', $todayFormatted . '%')->sum('eggs_number');
        return view('Admin.feeding', compact('chicken', 'Count', 'eggs', 'eggsRecord', 'todaysEggs', 'price', 'totalSales', 'sales', 'feed'));
    }


    public function profile()
    {
        if (Auth::id()) {
            $usertype = Auth::user()->usertype;

            if ($usertype === 'farmer') {
                $bidder = auth()->user();

                return view('Admin.profile', compact('bidder'));
            }
            else if ( $usertype == 'users')
            {
                // $user = User::find()

                $user = auth()->user();

                return  view('Users.profile', compact('user'));
            }
        }
    }

    public function employees()
    {
        if (Auth::id()) {
            $usertype = Auth::user()->usertype;

            if ($usertype === 'farmer') {
                $users = User::all();

                $normal = User::where('usertype', 'users')->get();
                $admin = User::where('usertype', 'farmer')->get();
                $Count = Poultry::sum('number');
                $eggs = Egg::sum('eggs_number');
                $totalSales = Sales::sum('total');
                $todayFormatted = Carbon::today()->format('d M Y');

                // Find the eggs laid today based on the formatted date
                $todaysEggs = Egg::where('date', 'LIKE', $todayFormatted . '%')->sum('eggs_number');
                $distinctSalesTypes = Sales::select('salesType', \DB::raw('SUM(quantity) as totalQuantity'))
                    ->groupBy('salesType')
                    ->get();

                return view('Admin.Employees', compact('users', 'normal', 'Count', 'eggs', 'totalSales', 'admin', 'todaysEggs'));
            }else if ( $usertype == 'users')
            {
                $chicken=Poultry::all();
                $Count=Poultry::sum('number');
                $eggs=Egg::sum('eggs_number');
                $eggsRecord=Egg::all();
                $totalSales=Sales::sum('total');


                return view('Users.index', compact('chicken', 'eggs', 'eggsRecord', 'totalSales', 'Count'));
            }
        }else {

            return view('auth.login');
        }
    }


    public function Addingchicks()
    {
        $chicks = Chick::all();
        $chicken=Poultry::all();
        $Count=Poultry::sum('number');
        $eggs=Egg::sum('eggs_number');
        $eggsRecord=Egg::all();
        $totalSales=Sales::sum('total');

        return view('Users.Chicks', compact('chicks', 'chicken', 'Count', 'eggs', 'eggsRecord', 'totalSales'));
    }

    public function research()
    {
        if (Auth::id()) {
            $usertype = Auth::user()->usertype;

            if ($usertype === 'farmer') {
                $users = User::all();

                $normal = User::where('usertype', 'users')->get();
                $admin = User::where('usertype', 'farmer')->get();
                $Count = Poultry::sum('number');
                $eggs = Egg::sum('eggs_number');
                $totalSales = Sales::sum('total');
                $todayFormatted = Carbon::today()->format('d M Y');

                // Find the eggs laid today based on the formatted date
                $todaysEggs = Egg::where('date', 'LIKE', $todayFormatted . '%')->sum('eggs_number');
                $distinctSalesTypes = Sales::select('salesType', \DB::raw('SUM(quantity) as totalQuantity'))
                    ->groupBy('salesType')
                    ->get();

                return view('Admin.research', compact('users', 'normal', 'Count', 'eggs', 'totalSales', 'admin', 'todaysEggs'));
                //return view('Admin.research', compact('users', 'normal', 'Count', 'eggs', 'totalSales', 'admin', 'todaysEggs'));
            }else if ( $usertype == 'users')
            {
                $chicken=Poultry::all();
                $Count=Poultry::sum('number');
                $eggs=Egg::sum('eggs_number');
                $eggsRecord=Egg::all();
                $totalSales = Sales::sum('total');


                return view('Users.research', compact('chicken', 'eggs', 'eggsRecord', 'totalSales', 'Count'));
            }
        }else {

            return view('auth.login');
        }
    }


}
