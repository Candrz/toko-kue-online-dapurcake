@extends('master')
@section('content')
    {{-- Start Banner Category --}}
    <div data-bs-ride="carousel" id="carouselExampleCaptions" class=" container carousel slide mx-auto mt-5 mb-2"
        style="height: 300px; ">
        <div class="carousel-indicators">
            @foreach ($categories as $key => $category)
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $key }}"
                    class="{{ $key == 0 ? 'active' : '' }}" aria-current="{{ $key == 0 ? 'true' : 'false' }}"
                    aria-label="Slide {{ $key + 1 }}"></button>
            @endforeach
        </div>
        <div class="carousel-inner h-100 w-100">
            @foreach ($categories as $key => $category)
                <div class="carousel-item h-100 {{ $key == 0 ? 'active' : '' }}">
                    <img src="{{ asset('storage/' . $category->icon) }}" class="d-block w-100 h-100"
                        alt="{{ $category->name }}">
                    <div class="carousel-caption d-none d-md-block bg-blend-difference">
                        <h5>{{ $category->name }}</h5>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bsslide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bsslide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    {{-- Start Banner Category --}}
    {{-- Start List Category --}}
    <div class="mx-2 px-0 pt-2 d-flex flex-wrap justify-content-center">
        @foreach ($categories as $category)
            <a href="{{ route('product.category', [$category->slug]) }}"
                class="btn category bg-cream rounded-full shadow-sm mb-3 d-inline-flex justify-content-center gap-1 align-itemscenter fw-semibold fs-6 mx-1 text-decoration-none">
                <img src="{{ asset('storage/' . $category->icon) }}" alt="" srcset="" width="40"
                    height="40" class=" rounded-circle bg-cover">
                <span>
                    {{ $category->name }}
                </span>
            </a>
        @endforeach
    </div>
    {{-- End List Category --}}
    {{-- Start List Product --}}
    <div class="container mt-2">
        <div class="row g-3">
            @foreach ($products as $product)
                <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-3 ">
                    <div class="card bg-transparent shadow-sm ">
                        <img src="{{ asset('storage/' . $product->thumbnail) }}" class="card-img-top img-product"
                            alt="..." height="120">
                        <div style="max-height:150px;height:150px" class="card-body ">
                            <h5 class="card-title fs-6">{{ $product->name }}</h5>
                            <a href="{{ route('product.category', [$product->category->slug]) }}"
                                class="badge btn rounded-pill bg-warning text-center text-decoration-none">
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
    {{-- End List Product --}}
@endsection
