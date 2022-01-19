<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\ProductContract;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductContract $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function show($slug)
    {
        $product = $this->productRepository->findProductBySlug($slug);

        dd($product);
    }
}
