<div class="container">
    <section class="shop-by-categories">
        <div class="top-title-2">
            <h1>SHOP BY CATEGORY</h1>
            <a href="{{ route('categories.index') }}" class="show-all">
                <div>
                    <span>Show all</span>
                    <span class="material-icons">arrow_right_alt</span>
                </div>
            </a>
        </div>
        <div class="bottom">
            @foreach ($categories as $category)
                <a href="{{route('categories.show',['category'=>$category->id])}}">
                    <div class="img"></div>
                    <h3 class="title">{{ $category->name }}</h3>
                </a>
            @endforeach
        </div>
    </section>
</div>
