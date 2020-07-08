<div class="container">
    <div class="content">
        <div class="store-container">
            <div class="img-container">
                @if ($store->cover)
                    <img src="{{ url('/uploads/images/'.$store->cover) }}" alt="The photo">
                @else
                    <div class="no-img">No photo</div>
                @endif
            </div>
            <div class="content-container">
                <div class="top">
                    <div class="name">
                        <span>{{ $store->name }}</span>
                    </div>
                    <div class="followers">
                        <span class="count">{{ $store->follows->count() }}</span>
                        <span> followers</span>
                    </div>
                </div>
                <div class="center">
                    <div class="item">
                        <span>{{ $store->mail }}</span>
                    </div>
                    <div class="item">
                        <span>{{ $store->indicatif }} {{ $store->phone }}</span>
                    </div>
                    <div class="item">
                        <span>{{ $store->description }}</span>
                    </div>
                </div>
                <div class="bottom">
                   @auth
                        <form action="{{ route('follows.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="followable_type" value="store" hidden>
                            <input type="number" name="followable_id" value="{{ $store->id }}" hidden>
                            <button type="submit">Follow</button>
                        </form>
                    @endauth
                    @guest
                        <div></div>
                    @endguest

                    <div class="founder">
                        <span>Belong to : </span>
                        <span class="name">
                            @if ($store->storeable_type == 'user')
                                {{ $store->storeable->first_name }} {{ $store->storeable->last_name }}
                            @elseif ($store->storeable_type == 'company')
                            {{ $store->storeable->name }}
                            @endif
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
