@php

    use Ecommerce\Backend\Controllers\Admin\HomePage\Models\HomePageSetting;

        $categoryProductSliderSectionOne = HomePageSetting::where('key', 'product_slider_section_one')->first();

        if ($categoryProductSliderSectionOne && isset($categoryProductSliderSectionOne->value)) {
            $categoryProductSliderSectionOne = json_decode($categoryProductSliderSectionOne->value);

            $lastKey = [];

            foreach ($categoryProductSliderSectionOne as $key => $category) {
                if ($category === null) {
                    break;
                }
                $lastKey = [$key => $category];
            }

            if (!empty($lastKey)) {
                $key = array_keys($lastKey)[0];
                $id = $lastKey[$key];

                if ($key === 'category') {
                    $category = \Ecommerce\Backend\Controllers\Admin\Category\Models\Category::find($id);
                    $products = \Ecommerce\Backend\Controllers\Admin\Product\Models\Product::withAvg('reviews', 'rating')
                        ->withCount('reviews')
                        ->with(['variants', 'category', 'productImageGalleries'])
                        ->where('category_id', $category->id)
                        ->orderBy('id', 'DESC')
                        ->take(12)
                        ->get();
                } elseif ($key === 'sub_category') {
                    $category = \Ecommerce\Backend\Controllers\Admin\SubCategory\Models\SubCategory::find($id);
                    $products = \Ecommerce\Backend\Controllers\Admin\Product\Models\Product::withAvg('reviews', 'rating')
                        ->withCount('reviews')
                        ->with(['variants', 'category', 'productImageGalleries'])
                        ->where('sub_category_id', $category->id)
                        ->orderBy('id', 'DESC')
                        ->take(12)
                        ->get();
                } else {
                    $category = \Ecommerce\Backend\Controllers\Admin\ChildCategory\Models\ChildCategory::find($id);
                    $products = \Ecommerce\Backend\Controllers\Admin\Product\Models\Product::withAvg('reviews', 'rating')
                        ->withCount('reviews')
                        ->with(['variants', 'category', 'productImageGalleries'])
                        ->where('child_category_id', $category->id)
                        ->orderBy('id', 'DESC')
                        ->take(12)
                        ->get();
                }
            } else {
                $products = collect(); // Empty collection if no valid category is found
            }
        } else {
            $products = collect(); // Empty collection if $categoryProductSliderSectionOne is not set or doesn't have a value
        }
@endphp

<section id="wsus__electronic">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="wsus__section_header">
{{--                    <h3>{{$category->name}}</h3>--}}
{{--                    <a class="see_btn" href="{{route('products.index', ['category' => $category->slug])}}">see more <i--}}
{{--                            class="fas fa-caret-right"></i></a>--}}
                </div>
            </div>
        </div>
        <div class="row flash_sell_slider">
            @foreach ($products as $product)
                <x-product-card :product="$product"/>
            @endforeach
        </div>
    </div>
</section>
