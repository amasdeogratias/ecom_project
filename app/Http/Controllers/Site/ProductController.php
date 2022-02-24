<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\ProductContract;
use App\Contracts\AttributeContract;
use Cart;


class ProductController extends Controller
{
    protected $productRepository;

    protected $attributeRepository;

    public function __construct(ProductContract $productRepository, AttributeContract $attributeRepository)
    {
        $this->productRepository = $productRepository;
        $this->attributeRepository = $attributeRepository;
    }

    public function show($slug)
    {
        $product = $this->productRepository->findProductBySlug($slug);
        $attributes = $this->attributeRepository->listAttributes();

        // dd($product);
        return view('site.pages.product', compact('product', 'attributes'));
    }

    public function addToCart(Request $request)
    {
        // dd($request->all());
        $product = $this->productRepository->findProductById($request->input('productId'));
        $options = $request->except('_token', 'productId', 'price', 'qty');
        Cart::add(uniqid(), $product->name, $request->input('price'), $request->input('qty'), $options);

        return redirect()->back()->with('message', 'Item added to cart successfully.');
    }

    public function allProducts()
    {
        $allProducts = $this->productRepository->listAll();
        return view('site.pages.homepage', compact('allProducts'));
    }


}
