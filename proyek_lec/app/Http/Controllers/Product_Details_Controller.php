<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cart_Details;
use App\Models\History_Details;
use App\Models\History_Header;
use App\Models\Product_Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Product_Details_Controller extends Controller
{
    //
    public function add_product(Request $request)
    {
        //Insert Product ke Database

        $product_name = $request->product_name;
        $product_category = Product_Category::where('category_name', $request->category_name)->first();
        $product_detail = $request->product_detail;
        $product_photo = $request->file('product_img');
        $product_price = $request->product_price;

        $this->validate($request, [
            'product_name' => 'required',
            'product_detail' => 'required',
            'product_img' => 'required|mimes:png,jpg,jpeg',
            'product_price' => 'required|numeric|min:0|not_in:0'
        ]);

        Storage::putFileAs('/public/images/', $product_photo, $product_photo->getClientOriginalName());
        DB::table('product_details')->insert([
            'product_name' => $product_name,
            'product_categories_id' => $product_category->id,
            'product_detail' => $product_detail,
            'product_price' => $product_price,
            'product_photo' => $product_photo->getClientOriginalName(),
        ]);

        return redirect()->back()->with('addedProduct', 'Successfully added this product.');
    }

    public function update_product(Request $request)
    {
        $product_name = $request->product_name;
        $product_detail = $request->product_detail;
        $product_category = $request->product_category;
        $product_price = $request->product_price;
        $img = $request->file('product_photo');
        $this->validate($request, [
            'product_name' => 'required',
            'product_category' => 'required',
            'product_detail' => 'required',
            'product_price' => 'required',
            'product_photo' => 'required|mimes:png,jpg,jpeg'
        ]);
        dd($img);
        Storage::putFileAs('/public/images', $img, $img->getClientOriginalName());
        DB::table('product_details')->where('id', $request->route('id'))->update([
            'product_name' => $product_name,
            'product_categories_id' => $product_category,
            'product_detail' => $product_detail,
            'product_price' => $product_price,
            'product_photo' => $img->getClientOriginalName(),
        ]);
        return redirect()->back()->with('updatedSuccessfully', 'Successfully updated this product.');
    }

    public function delete_product($id)
    {
        DB::table('product_details')->where('id', $id)->delete();
        return redirect('/manage');
    }

    public function addToCart(Request $request)
    {
        $validation = $request->validate([
            'quantity' => ['required', 'gt:0']
        ]);
        $quantity = $request->quantity;
        $id = $request->id;
        $cart = Cart::where('user_id', Auth::id())->first();
        $cart_details = Cart_Details::where('cart_id', $cart->id)->where('product_details_id', $id)->first();

        if (empty($cart_details)) {
            Cart_Details::insert([
                'cart_id' => $cart->id,
                'product_details_id' => $id,
                'quantity' => $quantity
            ]);
        } else {
            $quantity += $cart_details->quantity;
            $cart_details->quantity = $quantity;
            $cart_details->save();
        }
        return redirect()->back()->with('addedSuccessfully', 'Successfully added this product(s) to your cart.');
    }

    public function deleteCart($id)
    {
        Cart_Details::where('id', $id)->delete();
        return redirect('/cart');
    }

    public function transferCartHistory()
    {
        $cart = Cart::where('user_id', Auth::id())->first();
        $cart_details = Cart_Details::where('cart_id', $cart->id)->get();
        if (empty($cart_details)) {
            return redirect()->back();
        }
        $history_header = new History_Header;
        $history_header->user_id = Auth::id();
        $history_header->save();
        foreach ($cart_details as $cart_detail) {
            $history_detail = new History_Details;
            $history_detail->history_headers_id = $history_header->id;
            $history_detail->product_details_id = $cart_detail->product_details_id;
            $history_detail->qty = $cart_detail->quantity;
            $history_detail->save();
            $cart_detail->delete();
        }
        return redirect()->back()->with('purchasedSuccessfully', 'Successfully bought! Thank you for shopping with us!');
    }
}
