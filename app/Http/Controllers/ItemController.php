<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Review;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function list()
    {
        $items = Item::all();

        return view('pages.item')->with([
            'items' => $items
        ]);
    }

    public function get_categories_subcategories(Request $request)
    {
        $categories = Category::where('pid', 0)->get();
        $subcategories = Category::where('pid', '>', 0)->get();

        return response()->json([
            'categories' => $categories,
            'subcategories' => $subcategories
        ]);
    }

    public function save(Request $request)
    {
        // die(print_r($request->categories));
        $item = Item::create([
            'name' => $request->item_name,
            'categories' => $request->categories,
            'subcategories' => $request->subcategories,
            'description' => $request->description,
            'rate' => 0
        ]);

        return response()->json([
            'item' => $item
        ]);
    }

    public function update(Request $request)
    {
        // die(print_r($request->categories));
        $item = Item::where('id', $request->item_id)->update([
            'name' => $request->item_name,
            'categories' => $request->categories,
            'subcategories' => $request->subcategories,
            'description' => $request->description,
            'rate' => 0
        ]);

        return response()->json([
            'item' => $item
        ]);
    }

    public function delete(Request $request)
    {
        Item::where('id', $request->item_id)->delete();

        return response()->json([
            'msg' => 'deleted'
        ]);
    }

    public function get_item(Request $request)
    {
        $item = Item::where('id', $request->item_id)->first();

        return response()->json([
            'item' => $item
        ]);
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;

        $items = Item::all();

        $new_items = array();
        foreach($items as $item)
        {
            $categories = json_decode($item->categories);
            $subcategories = json_decode($item->subcategories);
            // die(print_r($categories));
            // die(print_r(array_search('[value] => '.$keyword, $subcategories)));
            $category_boolean = false;
            $subcategory_boolean = false;
            foreach($categories as $category)
            {
                if($category->value == $keyword)
                {
                    $category_boolean = true;
                }
            }

            foreach($subcategories as $subcategory)
            {
                if($subcategory->value == $keyword)
                {
                    $subcategory_boolean = true;
                }
            }

            if($category_boolean == true || $subcategory_boolean == true || $keyword == $item->name)
            {
                array_push($new_items, $item);
            }
        }


        // return response()->json([
        //     'items' => $new_items
        // ]);

        return view('pages.home')->with(['items'=> $new_items]);
    }

    public function review(Request $request)
    {
        Review::create([
            'item_id' => $request->item_id,
            'rating' => $request->rating,
            'description' => $request->description
        ]);

        $rating_avg = Review::where('item_id', $request->item_id)->selectRaw('avg(rating) as rating')->first();

        // die(print_r($rating_avg->rating));

        Item::where('id', $request->item_id)->update([
            'rate' => round($rating_avg->rating)
        ]);

        return response()->json([
            'msg' => 'review saved'
        ]);
    }
}
