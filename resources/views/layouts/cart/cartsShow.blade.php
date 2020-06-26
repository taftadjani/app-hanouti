@extends('layouts.app-hanouti')

@section('title-page')
    All carts
@endsection

@section('links')
<style>
    .cart-show{
        margin-top: 2rem;
    }

    .cart-show form .row{
        display: flex;
        flex-direction: row;
        align-items: flex-end;
        justify-content: space-between;
    }

    .cart-show form .row .col:last-child{
        margin-left: 1rem;
    }

    .cart-show form .row .col{
        width: 50%;
    }
    .cart-show form .row .col:first-child select{
        width: 100%;
        padding: .5rem 1rem;
        font-size: 1.6rem;
        height: 30rem;
    }
    .cart-show form .row .col:first-child select option{
        line-height: 3rem;
    }

    .cart-show form .row .col button{
        cursor: pointer;
        border: 1px solid var(--color-black-primary);
        padding: 1rem 2rem;
        border-radius: .5rem;
        font-size: 1.6rem;
        letter-spacing: 1px;
        transition: all 300ms linear;
    }

    .cart-show form .row .col button:hover{
        color: var(--color-orange-primary);
        border-color: var(--color-orange-primary);
    }
</style>
@endsection

@section('main-content')
   <div class="container">
       <div class="cart-show">
           <form action="{{ route('carts.destroy.many') }}"  method="POST">
                @csrf
                @method("DELETE")
               <div class="row">
                    <div class="col">
                        <select name="carts_id[]" multiple required>
                            @foreach ($carts as $key=>$cart)
                                <option value="{{ $cart->id }}">{{ $key+1 }} - {{ $cart->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <button type="submit">
                            <span>Delete carts</span>
                        </button>
                    </div>
               </div>
           </form>
       </div>
   </div>
@endsection

@section('scripts-links')
@endsection

