<div class="container">
    <!-- START STORES -->
    <div class="centering">
        <div class="center-title">
            <h3>ALL STORES</h3>
        </div>
        <div class="center-content">
            @foreach ($stores as $store)
                <a href="{{ route('stores.show',['store'=>$store->id]) }}" class="store-link">{{ $store->name }}</a>
            @endforeach
        </div>
    </div>
    <!-- END STORES -->
</div>
