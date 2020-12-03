<?php

namespace App\Http\Controllers;

use DB;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class ProductController extends Controller
{
    public function product_add()
    {
        $categories =  DB::table('categories')->where('publication_status', 1)->get();
        return view('backend.product_add', compact('categories'));
    }

    public function product_save(Request $request)
    {

        $validatedData = $request->validate([
            'product_name' => 'required',
            'category_id' => 'required',
            'product_summary' => 'required',
            'product_description' => 'required',
            'product_price' => 'required|integer',
            'publication_status' => 'required',
        ]);

        $last_inserted_id = DB::table('products')->insertGetId([
            'product_name' => $request->product_name,
            'category_id' => $request->category_id,
            'product_summary' => $request->product_summary,
            'product_description' => $request->product_description,
            'product_price' => $request->product_price,
            'publication_status' => $request->publication_status,
            'created_at' => Carbon::now(),

        ]);


        // print_r($request->all());
        if ($request->hasFile('product_image')) {
            $file_name = $last_inserted_id . '.' . $request->product_image->getClientOriginalExtension();
            Image::make($request->product_image)->resize(300, 200)->save(base_path('public/uploads/product_image/' . $file_name));
            DB::table('products')
                ->where('id', $last_inserted_id)
                ->update([
                    'product_image' => $file_name,
                ]);
        }
        return back()->with('product_add_msg', 'Product Added Successfully');
    }
    public function product_manage()
    {

        $products =  Product::orderBy('id', 'DESC')->paginate(5);
        $trashed =  Product::onlyTrashed()->paginate(5);
        return view('backend.product_manage', compact('products', 'trashed'));
    }

    public function unpublished_product($id)
    {
        $affected = DB::table('products')
            ->where('id', $id)
            ->update(['publication_status' => 0]);
        return back();
    }
    public function published_product($id)
    {
        $affected = DB::table('products')
            ->where('id', $id)
            ->update(['publication_status' => 1]);
        return back();
    }
    public function product_delete($id)
    {
        // $affected = DB::table('products')
        //     ->where('id', $id)
        //     ->delete();
        Product::find($id)->delete();
        return back()->with('product_delete', 'Product Delete Successfully');
    }

    public function product_edit($id)
    {
        $products =  DB::table('products')->where('id', $id)->first();
        $categories =  DB::table('categories')->where('publication_status', 1)->get();
        return view('backend.product_edit', compact('categories', 'products'));
    }
    public function product_update(Request $request)
    {
        $validatedData = $request->validate([
            'product_name' => 'required',
            'category_id' => 'required',
            'product_summary' => 'required',
            'product_description' => 'required',
            'product_price' => 'required|integer',
            'publication_status' => 'required',
        ]);
        DB::table('products')->where('id', $request->product_id)->update([
            'product_name' => $request->product_name,
            'category_id' => $request->category_id,
            'product_summary' => $request->product_summary,
            'product_description' => $request->product_description,
            'product_price' => $request->product_price,
            'publication_status' => $request->publication_status,
        ]);
        if ($request->hasFile('product_image')) {
            $product = Product::find($request->product_id);
            if ($product->product_image == 'default_image.jpg') {
                $file_name =  $request->product_id . '.' . $request->product_image->getClientOriginalExtension();
                Image::make($request->product_image)->resize(300, 200)->save(base_path('public/uploads/product_image/' . $file_name));
                DB::table('products')
                    ->where('id', $request->product_id)
                    ->update([
                        'product_image' => $file_name,
                    ]);
            } else {
                unlink(base_path('public/uploads/product_image/' . $product->product_image));
                $file_name =  $request->product_id . '.' . $request->product_image->getClientOriginalExtension();
                Image::make($request->product_image)->resize(300, 200)->save(base_path('public/uploads/product_image/' . $file_name));
                DB::table('products')
                    ->where('id', $request->product_id)
                    ->update([
                        'product_image' => $file_name,
                    ]);
            }
        }
        return back()->with('product_add_msg', 'Product Updated Successfully');
    }
    public function product_restore($id)
    {
        Product::withTrashed()->where('id', $id)->restore();
        return back()->with('product_add_msg', 'Product Restored Successfully');
    }
    public function product_destroy($id)
    {

        $product = Product::onlyTrashed()->find($id);
        if ($product->product_image == 'default_image.jpg') {
            Product::withTrashed()->where('id', $id)->forceDelete();
        } else {
            unlink(base_path('public/uploads/product_image/' . $product->product_image));
            Product::withTrashed()->where('id', $id)->forceDelete();
        }

        return back()->with('product_add_msg', 'Product Permanently Deleted');
    }
}
