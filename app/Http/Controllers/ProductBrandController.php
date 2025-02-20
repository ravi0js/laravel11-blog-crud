<?php

namespace App\Http\Controllers; 

use App\Models\ProductBrand; 
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Storage;

class ProductBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product_brands = ProductBrand::query()->orderBy("created_at", "DESC")->paginate(10);
        return view("productBrand.index", [
            "product_brands" => $product_brands
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("productBrand.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "brand_name" => "required|string|max:255",
            "brand_icon" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "banner" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "background_color" => "nullable|string",
            "tagline" => "nullable|string|max:255",
            "description" => "nullable|string",
            "status" => "required|in:active,inactive",
        ]);

        // Handle file uploads
        if ($request->hasFile('brand_icon')) {
            $data['brand_icon'] = $request->file('brand_icon')->store('brands/icons', 'public');
        }

        if ($request->hasFile('banner')) {
            $data['banner'] = $request->file('banner')->store('brands/banners', 'public');
        }

        $data["added_by"] = auth()->id();
        ProductBrand::create($data);

        return to_route("productBrand.index")->with("success", "Brand Created Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product_brand = ProductBrand::find($id);

        return view("productBrand.show", compact("product_brand"));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product_brand = ProductBrand::find($id);
        return view("productBrand.edit", [
            "product_brand" => $product_brand
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $productBrand = ProductBrand::findOrFail($id);

        $request->validate([
            'brand_name' => 'required|string|max:255',
            'brand_icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $productBrand->brand_name = $request->brand_name;
        $productBrand->background_color = $request->background_color;
        $productBrand->tagline = $request->tagline;
        $productBrand->description = $request->description;
        $productBrand->status = $request->status;

        // Handle Brand Icon Upload
        if ($request->hasFile('brand_icon')) {
            if ($productBrand->brand_icon) {
                Storage::delete($productBrand->brand_icon);
            }
            $productBrand->brand_icon = $request->file('brand_icon')->store('brands');
        }

        // Handle Banner Upload
        if ($request->hasFile('banner')) {
            if ($productBrand->banner) {
                Storage::delete($productBrand->banner);
            }
            $productBrand->banner = $request->file('banner')->store('banners');
        }

        $productBrand->save();

        return redirect()->route('productBrand.index')->with('success', 'Brand updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductBrand $product_brand)
    {
        // Delete images from storage
        if ($product_brand->brand_icon) {
            Storage::disk('public')->delete($product_brand->brand_icon);
        }

        if ($product_brand->banner) {
            Storage::disk('public')->delete($product_brand->banner);
        }

        $product_brand->delete();

        return to_route("productBrand.index")->with("success", "Brand deleted successfully!");
    }
}