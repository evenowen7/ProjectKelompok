<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\History_Header;
use App\Models\Product_Category;
use App\Models\Product_Details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class Home_Controller extends Controller
{
    //
    public function index()
    {
        // $products = Product_Details::where('product_categories_id')->get();
        // $categories= Product_Category::find('id');

        // return view('home', compact('categories', 'products'));

        // $categories = Product_Category::where('id')->get();
        // $products = Product_Details::find('product_details_id');

        // return view('home', compact('categories', 'products'));

        $categories = Product_Category::with('product_details')->get();

        return view('home', compact('categories'));
    }

    public function registerIndex()
    {
        return view('register');
    }
    public function registerIndexID()
    {
        App::setLocale('id');
        return view('register');
    }
    public function loginIndex()
    {
        App::setLocale('en');
        return view('login');
    }
    public function loginIndexID()
    {
        App::setLocale('id');
        return view('login');
    }
    public function profileIndex()
    {
        return view('profile');
    }
    public function manageIndex(Request $request)
    {
        $search_query = $request->query('search');
        $products = Product_Details::where('product_name', 'LIKE', "%$search_query%")->paginate(15)->appends(['search' => $search_query]);
        return view('/manage', compact('products'));
    }
    public function productIndex($id)
    {
        $products = DB::table('product_details')->where('id', $id)->first();
        return view('product', compact('products'));
    }
    public function categoryIndex($id)
    {
        $productsList = DB::table('product_details')->where('product_categories_id', $id)->paginate(5);
        $categories = Product_Category::find($id);
        return view('category', compact('productsList', 'categories'));
    }
    public function searchIndex(Request $request)
    {
        $search_query = $request->search;
        if ($search_query == "") {
            return Redirect('/home');
        }
        $products = Product_Details::where('product_name', 'LIKE', "%$search_query%")->get();
        return view('/searchresult', compact('products', 'search_query'));
    }
    public function addIndex()
    {
        $categories = Product_Category::all();
        return view('add', compact('categories'));
    }

    public function updateIndex($id)
    {
        $categories = Product_Category::with('product_details')->get();
        $products = DB::table('product_details')->where('id', $id)->first();
        return view('update', compact('products', 'categories'));
    }

    public function cartIndex()
    {
        $cart = Cart::where('user_id', Auth::id())->first();
        return view('/cart', compact('cart'));
    }

    public function historyIndex()
    {
        $history = History_Header::where('user_id', Auth::id())->orderBy('id', 'DESC')->get();
        return view ('/history', compact('history'));
    }
}
