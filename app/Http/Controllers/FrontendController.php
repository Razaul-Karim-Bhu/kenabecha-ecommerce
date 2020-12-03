<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $latest_products = Product::where('publication_status', 1)->orderBy('id', 'desc')->take(8)->get();
        $all_products = Product::where('publication_status', 1)->orderBy('id', 'DESC')->get();
        // $all_categories = Category::where('publication_status', 1)->orderBy('id', 'DESC')->get();
        return view('frontend.index', compact('latest_products', 'all_products'));
    }
    public function product_detail($id)
    {
        $product = Product::find($id);
        $related_products = Product::where('category_id', $product->category_id)->where('publication_status', 1)->where('id', '!=', $product->id)->get();
        return view('frontend.product_detail', compact('product', 'related_products'));
    }
    public function shop_page_view()
    {
        $all_products = Product::where('publication_status', 1)->orderBy('id', 'DESC')->paginate(12);
        // $all_categories = Category::where('publication_status', 1)->orderBy('id', 'DESC')->get();
        return view('frontend.shop_page_view', compact('all_products'));
    }
    public function product_show_by_category($id)
    {
        // $all_categories = Category::where('publication_status', 1)->orderBy('id', 'DESC')->get();
        $all_products = Product::where('publication_status', 1)->where('category_id', $id)->orderBy('id', 'DESC')->paginate(6);
        return view('frontend.shop_page_view', compact('all_products'));
    }
}
