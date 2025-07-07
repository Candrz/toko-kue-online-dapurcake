@extends('master')
@section('content')
    {{-- Start Category Banner --}}
    <div class="container d-flex mt-5 ">
        <img src="{{ asset('storage/' . $category->icon) }}" class="banner rounded mx-auto" height="300px" alt="">
    </div>
    {{-- End Category Banner --}}
    {{-- Start Product Item --}}
    <div class="container mt-2">
        <div class="row g-3">
            @foreach ($products as $product)
                <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-3 ">
                    <div class="card bg-transparent shadow-sm ">
                        <img src="{{ asset('storage/' . $product->thumbnail) }}" class="card-img-top 
img-product"
                            alt="..." height="120">
                        <div style="max-height:150px;height:150px" class="card-body ">
                            <h5 class="card-title fs-6">{{ $product->name }}</h5>
                            <a href="{{ route('product.category', [$product->category->slug]) }}"
                                class="badge btn rounded-pill bg-warning text-center 
text-decoration-none">
                                {{ $product->category->name }}</a>
                            <p class="price fs-6 mt-4">Rp. <span
                                    class="fw-semibold fs-5 m-0 p-0">{{ number_format($product->price, 0, ',', '.') }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{-- End Product Item --}}
@endsection
