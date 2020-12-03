<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category_add()
    {
        return view('backend.category_add_form');
    }

    public function category_add_post(Request $request)
    {

        $validatedData = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
            'category_description' => 'required',
        ]);



        $category = new Category;
        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->publication_status = $request->publication_status;
        $category->save();
        return back()->with('category_add_msg', 'Category Added Successfully');
    }

    public function category_manage()
    {
        $categories = Category::paginate(10);
        return view('backend.category_manage', compact('categories'));
    }

    public function category_edit($id)
    {

        $category = Category::findOrFail($id);
        return view('backend.category_edit', compact('category'));
    }
    public function category_edit_post(Request $request)
    {
        $validatedData = $request->validate([
            'category_name' => 'required',
            'category_description' => 'required',
        ]);
        $id = $request->category_id;
        $category = Category::findOrFail($id);
        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->publication_status = $request->publication_status;
        $category->save();
        return back()->with('category_add_msg', 'Category Updated Successfully');
    }
    public function category_publish($id)
    {
        $category = Category::findOrFail($id);
        $category->publication_status = 1;
        $category->save();
        return back();
    }

    public function category_unpublish($id)
    {
        $category = Category::findOrFail($id);
        $category->publication_status = 0;
        $category->save();
        return back();
    }

    public function category_delete($id)
    {
        Category::findOrFail($id)->delete();
        return back()->with('category_delete_message', 'Category Deleted Successfully');
    }
}
