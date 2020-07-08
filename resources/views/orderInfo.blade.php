@extends('admin-seller')

@section('title-page')
    Get payment info
@endsection

@section('links')
    {{--  Including navigation style --}}

    <style>

        .create {
            margin-top: 10rem;
        }

        .create > form {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
                -ms-flex-direction: column;
                    flex-direction: column;
            width: 100%;
        }

        .create > form > .row {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
                -ms-flex-direction: row;
                    flex-direction: row;
            -webkit-box-pack: justify;
                -ms-flex-pack: justify;
                    justify-content: space-between;
            width: 100%;
        }

        .create > form > .row > .col {
            width: 49%;
            margin-bottom: 2.5rem;
        }

        .create > form > .row > .col * {
            width: 100%;
        }

        .create > form > .row > .col textarea {
            resize: none;
            font-size: 1.6rem;
            height: 15rem;
            padding: .5rem 1rem;
            background-color: var(--cwl);
            border: none;
            outline: none;
        }

        .create > form > .row > .col > .title {
            font-size: 2rem;
            margin-bottom: 1rem;
            font-weight: 400;
        }

        .create > form > .row > .col select,
        .create > form > .row > .col input {
            height: 3.5rem;
            padding: .5rem 1rem;
            font-size: 1.6rem;
            font-weight: 400;
            border: none;
            outline: none;
            background-color: var(--cwl);
            border-radius: .5rem;
            -webkit-border-radius: .5rem;
            -moz-border-radius: .5rem;
            -ms-border-radius: .5rem;
            -o-border-radius: .5rem;
        }

        .create > form > .row > .col select.multiple {
            height: 15rem;
        }

        .create > form > .row > .col > .value.error {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
                -ms-flex-direction: row;
                    flex-direction: row;
            -webkit-box-align: center;
                -ms-flex-align: center;
                    align-items: center;
            -webkit-box-pack: center;
                -ms-flex-pack: center;
                    justify-content: center;
            height: 100%;
            color: var(--cre);
        }

        .create > form > .row.title {
            -webkit-box-pack: center;
                -ms-flex-pack: center;
                    justify-content: center;
            margin-bottom: 2rem;
        }

        .create > form > .row.title > h3 {
            font-size: 2.5rem;
            font-weight: 500;
        }

        .create > form > .row.actions {
            -webkit-box-pack: end;
                -ms-flex-pack: end;
                    justify-content: flex-end;
        }

        .create > form > .row.actions button {
            border: 1px solid var(--cbp);
            padding: 1rem 3rem;
            font-size: 1.8rem;
            font-weight: 500;
            border-radius: .5rem;
            -webkit-border-radius: .5rem;
            -moz-border-radius: .5rem;
            -ms-border-radius: .5rem;
            -o-border-radius: .5rem;
            cursor: pointer;
            transition: all 300ms linear;
            -webkit-transition: all 300ms linear;
            -moz-transition: all 300ms linear;
            -ms-transition: all 300ms linear;
            -o-transition: all 300ms linear;
        }

        .create > form > .row.actions button:hover {
            border-color: var(--cop);
            color: var(--cop);
        }
    </style>
    {{--  Including footer style --}}

@endsection




@section('main-content')

    <div class="container">
        <div class="create">
            <form action="{{ route('carts.order') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row title">
                    <h3>Order info</h3>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="title">
                            <span>Payment method</span>
                        </div>
                         <div class="value">
                             <select name="payment_method">
                                 @foreach ($payments as $payment)
                                     <option value="{{ $payment->id }}">{{ $payment->name }}</option>
                                 @endforeach
                             </select>
                         </div>
                   </div>
                    @if ($deliveryModes->count()>0)
                        <div class="col">
                            <div class="title">
                                <span>Delivery modes</span>
                            </div>
                            <div class="value">
                                <select name="delivery_mode">
                                    @foreach ($deliveryModes as $deliveryMode)
                                        <option value="{{ $deliveryMode->id }}">{{ $deliveryMode->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif
                </div>
                <input type="number" name="cart" hidden value="{{ $cart->id }}">

                <div class="row actions">
                    <button type="submit">
                        <span>Buy now</span>
                    </button>
                </div>
            </form>
        </div>
   </div>
@endsection








@section('scripts-links')
@endsection
