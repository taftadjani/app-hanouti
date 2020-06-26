{{-- Search input --}}

{{-- Products results --}}
@extends('layouts.app-hanouti')

@section('title-page')
    Search result
@endsection

@section('links')
  <style>
      .search-container{
          display: flex;
          flex-direction: row;
          align-items: center;
          justify-content: center;
          margin-top: 2rem;
      }
    .search {
        display: flex;
        flex-direction: row;
        height: 3rem;
        background-color: var(--color-white-light);
        border-radius: 3rem;
        -webkit-border-radius: 3rem;
        -moz-border-radius: 3rem;
        -ms-border-radius: 3rem;
        -o-border-radius: 3rem;
    }

    .search-link i {
        pointer-events: none;
    }

    .search:hover>.search-link {
        color: var(--color-orange-primary);
    }


    .search .search-input {
        border: none;
        border-bottom: 1px solid var(--color-orange-primary);
        background: none;
        outline: none;
        width: 30rem;
        padding: 0 1.5rem;
        font-size: 1.8rem;
        line-height: 3rem;
        letter-spacing: .5px;
        transition: all 0.5s;
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
        -ms-transition: all 0.5s;
        -o-transition: all 0.5s;
    }

    .search .search-link {
        display: flex;
        justify-content: center;
        align-items: center;
        border: none;
        height: 3rem;
        width: 3rem;
        border-radius: 50%;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        -ms-border-radius: 50%;
        -o-border-radius: 50%;
        transition: all 350ms ease;
        -webkit-transition: all 350ms ease;
        -moz-transition: all 350ms ease;
        -ms-transition: all 350ms ease;
        -o-transition: all 350ms ease;
    }

    .search .search-link:hover {
        color: var(--color-orange-primary);
    }

  </style>

    {{--  Including productcontainer Style --}}
    <link rel="stylesheet" href="{{asset('css/product-container.css')}}">
@endsection

@section('main-content')
    <div class="container">
        <div class="search-container">
            <div class="search">
                <form id="search-form" action="{{ route('search-result') }}" method="GET">
                    @csrf
                    <input type="text" class="search-input" id="top-search-input" name="data" placeholder="Type to search" value="{{ $data }}">
                </form>
                <a href="#"  id="top-search-link" class="search-link">
                    <i class="material-icons">
                    search
                    </i>
                </a>
            </div>
        </div>
    </div>

    {{--  Including Product container 1 Content --}}
    @if (count($products)>0)
        @include('layouts.product-container-1',['products'=>$products, 'title'=> "Products"])
    @endif
@endsection

@section('scripts-links')
    <script>

        //  Start of the search handle
        selectElement('#top-search-link').addEventListener('click', (e) => {
            if (!(selectElement('#top-search-input').value === undefined ||
                    selectElement('#top-search-input').value === "")) {
                selectElement('#search-form').submit();
            } else {
                e.target.preventDefault();
            }
        })
        selectElement('#top-search-input').addEventListener('keydown', (e) => {
            if (e.key == 'Enter') {
                if ((selectElement('#top-search-input').value === undefined ||
                        selectElement('#top-search-input').value === "")) {
                    e.preventDefault();
                }
            } else {
                console.log(e.key);
            }
        });
        // End of the search handle

    </script>
    {{--  Including product-container Scripts --}}
    <script src="{{asset('js/product-container.js')}}"></script>
@endsection
