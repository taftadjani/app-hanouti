<div class="container">
    <section class="shop-by-categories">
        <div class="top-title-2">
            <h1>SHOP BY CATEGORY</h1>
        </div>
        <div class="bottom">
            @foreach ($categories as $category)
                <a href="{{ route('categories.show',['category'=>$category->id]) }}">
                    <h3 class="title">{{ $category->name }}</h3>
                </a>
            @endforeach
        </div>
    </section>
</div>

