<?php
namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function list()
    {
        $categories = Category::where('pid', 0)->get();

        return view('pages.category.list')->with([
            'categories' => $categories
        ]);

    }

    public function save(Request $request)
    {
        $category = Category::create([
            'name' => $request->category_name,
            'pid' => $request->pid
        ]);

        return response()->json([
            'category' => $category
        ]);
    }

    public function update(Request $request)
    {
        $category = Category::where('id', $request->category_id)->update([
            'name' => $request->category_name,
            'pid' => $request->pid
        ]);

        return response()->json([
            'category' => $category
        ]);
    }

    public function get_subcategories(Request $request)
    {
        $categories = Category::where('pid', $request->category_id)->get();

        return response()->json([
            'categories' => $categories
        ]);
    }

    public function get_category(Request $request)
    {
        $category = Category::where('id', $request->category_id)->first();

        return response()->json([
            'category' => $category
        ]);
    }

    public function delete(Request $request)
    {
        Category::where('id', $request->category_id)->delete();

        return response()->json([
            'msg' => 'deleted'
        ]);
    }
}
