<?php

namespace App\Http\Controllers;

use App\Models\market_item;
use App\Http\Requests\StoreMarketItemsValidation;


class MarketItemController extends Controller
{
    public function index()
    {
        $data = market_item::all();
        return view('admin.market_items.index', compact('data'));
    }

    public function create()
    {
        return view('admin.market_items.form');
    }

    public function store(StoreMarketItemsValidation $request)
    {
        $new_data = $request->validated();
        if ($request->hasFile('image')) {
            $name = $request->file('image')->hashName();
            $request->file('image')->move("food-imgs", $name);

            $new_data['image'] = $name;
        }

        market_item::create($new_data);
        return redirect(route('admin.market_items.index', absolute: false));
    }

    public function show(string $id)
    {
        $data = market_item::findOrFail($id);
        return view('admin.market_items.show', compact('data'));
    }

    public function edit(string $id)
    {
        $data = market_item::findOrFail($id);
        return view('admin.market_items.form', compact('data'));
    }

    public function update(StoreMarketItemsValidation $request, string $id)
    {
        $old_data = market_item::findOrFail($id);
        $new_data = $request->validated();

        $name = $old_data->image;
        if ($request->hasFile('image')) {
            $name = $request->file('image')->hashName();
            $request->file('image')->move("food-imgs", $name);
            if ($request->image) {
                unlink("food-imgs/$old_data->image");
            }
        }

        $new_data['image'] = $name;

        market_item::findOrFail($id)->update($new_data);
        return redirect()->route('admin.market_items.index')->with('message', 'data updated successfully');
    }

    public function destroy(string $id)
    {
        $data = market_item::findOrFail($id);

        if ($data->image) {
            unlink("food-imgs/$data->image");
        }

        $data->delete();
        return redirect()->route('admin.market_items.index')->with('message', 'data deleted successfully');
    }
}
