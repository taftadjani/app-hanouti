<div class="container">
    <!-- START STORES -->
    <div class="centering">
        <div class="center-title">
            <h3>{{$title}}</h3>
        </div>
        <div class="center-content">
            @foreach ($stores as $store)
                <a href="{{ route('stores.show',['store'=>$store->id]) }}" class="store-link">{{ $store->name }}</a>
            @endforeach
        </div>
    </div>
    {{ $stores->links()}}
    <!-- END STORES -->
</div>
