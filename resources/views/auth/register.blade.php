@extends('layouts.app-hanouti')

@section('title-page')
Sign in/up
@endsection

@section('links')
    <style>
        .app-hanouti {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: var(--color-white-light);
        }

        .container {
            margin: auto auto;
            background-color: var(--color-white-light);
            /* background-color: red; */
        }

        .container .sign-container {
            background: var(--color-white-primary);
            box-shadow: 2px 5px 5px rgba(0, 0, 0, .15), -2px -5px 5px rgba(0, 0, 0, .15);
            position: relative;
            overflow: hidden;
            width: 100%;
            height: 100%;
            min-height: 60rem;
            border-radius: 1rem;
            -webkit-border-radius: 1rem;
            -moz-border-radius: 1rem;
            -ms-border-radius: 1rem;
            -o-border-radius: 1rem;
        }

        .sign-container .form-container {
            position: absolute;
            top: 0;
            height: 100%;
            transition: all 600ms ease-in-out;
            -webkit-transition: all 600ms ease-in-out;
            -moz-transition: all 600ms ease-in-out;
            -ms-transition: all 600ms ease-in-out;
            -o-transition: all 600ms ease-in-out;
        }

        .form-container.sign-up-container {
            right: 0;
            width: 50%;
            z-index: 1;
            /* background-color: red; */
            opacity: 0;
            transform: translateX(-50%);
            -webkit-transform: translateX(-50%);
            -moz-transform: translateX(-50%);
            -ms-transform: translateX(-50%);
            -o-transform: translateX(-50%);
        }

        .sign-container.right-panel-active .sign-up-container {
            transform: translateX(0);
            -webkit-transform: translateX(0);
            -moz-transform: translateX(0);
            -ms-transform: translateX(0);
            -o-transform: translateX(0);
            opacity: 1;
            z-index: 50;
        }

        .sign-container .sign-in-container {
            left: 0;
            width: 50%;
            z-index: 2;
            transform: translateX(0);
            -webkit-transform: translateX(0);
            -moz-transform: translateX(0);
            -ms-transform: translateX(0);
            -o-transform: translateX(0);
        }

        .sign-container.right-panel-active .sign-in-container {
            transform: translateX(50%);
            -webkit-transform: translateX(50%);
            -moz-transform: translateX(50%);
            -ms-transform: translateX(50%);
            -o-transform: translateX(50%);
            opacity: 0;
        }

        .sign-container .overlay-container {
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
            overflow: hidden;
            z-index: 100;
            transition: transform 600ms ease-in-out;
            -webkit-transition: transform 600ms ease-in-out;
            -moz-transition: transform 600ms ease-in-out;
            -ms-transition: transform 600ms ease-in-out;
            -o-transition: transform 600ms ease-in-out;
        }

        .sign-container.right-panel-active .overlay-container {
            transform: translateX(-100%);
            -webkit-transform: translateX(-100%);
            -moz-transform: translateX(-100%);
            -ms-transform: translateX(-100%);
            -o-transform: translateX(-100%);
        }

        .overlay-container .overlay {
            /* background: #FF6776; */
            background: linear-gradient(to right, var(--color-orange-primary), #FF5722) no-repeat 0 0 / cover;
            color: var(--color-white-primary);
            position: relative;
            left: -100%;
            height: 100%;
            width: 200%;
            transform: translateX(0);
            -webkit-transform: translateX(0);
            -moz-transform: translateX(0);
            -ms-transform: translateX(0);
            -o-transform: translateX(0);
            transition: transform 600ms ease-in-out;
            -webkit-transition: transform 600ms ease-in-out;
            -moz-transition: transform 600ms ease-in-out;
            -ms-transition: transform 600ms ease-in-out;
            -o-transition: transform 600ms ease-in-out;
        }

        .sign-container.right-panel-active .overlay {
            transform: translateX(50%);
            -webkit-transform: translateX(50%);
            -moz-transform: translateX(50%);
            -ms-transform: translateX(50%);
            -o-transform: translateX(50%);
        }

        .overlay .overlay-panel {
            position: absolute;
            top: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 0 4rem;
            height: 100%;
            width: 50%;
            text-align: center;
            transform: translateX(0);
            -webkit-transform: translateX(0);
            -moz-transform: translateX(0);
            -ms-transform: translateX(0);
            -o-transform: translateX(0);
            transition: transform 600ms ease-in-out;
            -webkit-transition: transform 600ms ease-in-out;
            -moz-transition: transform 600ms ease-in-out;
            -ms-transition: transform 600ms ease-in-out;
            -o-transition: transform 600ms ease-in-out;
        }

        .overlay .overlay-panel.overlay-left {
            transform: translateX(-20%);
            -webkit-transform: translateX(-20%);
            -moz-transform: translateX(-20%);
            -ms-transform: translateX(-20%);
            -o-transform: translateX(-20%);
        }

        .sign-container.right-panel-active .overlay-left {
            transform: translateX(0);
            -webkit-transform: translateX(0);
            -moz-transform: translateX(0);
            -ms-transform: translateX(0);
            -o-transform: translateX(0);
        }

        .overlay .overlay-panel.overlay-right {
            right: 0;
            transform: translateX(0);
            -webkit-transform: translateX(0);
            -moz-transform: translateX(0);
            -ms-transform: translateX(0);
            -o-transform: translateX(0);
        }

        .sign-container.right-panel-active .overlay-right {
            transform: translateX(20%);
            -webkit-transform: translateX(20%);
            -moz-transform: translateX(20%);
            -ms-transform: translateX(20%);
            -o-transform: translateX(20%);
        }

        .sign-container h1 {
            font-weight: 700;
            font-size: 4rem;
        }

        .sign-container p {
            font-size: 2rem;
            font-weight: 200;
            line-height: 2.5rem;
            letter-spacing: 1px;
            margin: 2rem 0 3rem;
        }

        .form-container form {
            background: var(--color-white-primary);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 0 5rem;
            height: 100%;
            width: 100%;
            max-width: 50rem;
            margin: auto auto;
        }

        .form-container form h1 {
            margin-bottom: 2rem;
        }

        .form-container form input {
            background-color: var(--color-white-primary);
            border: none;
            outline: none
            border-bottom: 1px solid var(--color-black-light);
            font-size: 1.6rem;
            letter-spacing: .5px;
            outline: none;
            padding: .8rem 0;
            margin: 1rem auto;
            width: 100%;
            max-width: 40rem;
        }

        .form-container form input:focus,
        .form-container form input:active{
            outline: none
        }

        .form-container form input:-internal-autofill-selected {
            background-color: var(--color-white-primary);
        }

        .form-container form button.action-btn {
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            width: 100%;
            max-width: 40rem;
            margin: 2rem auto;
        }

        .form-container form input:focus,
        .form-container form input:active {
            background-color: var(--color-white-primary);
        }

        .sign-container button {
            outline: none;
            border: 1px solid var(--color-orange-primary);
            background-color: var(--color-orange-primary);
            color: var(--color-white-primary);
            font-size: 1.6rem;
            font-weight: bold;
            padding: 1rem 4rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: transform 80ms ease-in;
            -webkit-transition: transform 80ms ease-in;
            -moz-transition: transform 80ms ease-in;
            -ms-transition: transform 80ms ease-in;
            -o-transition: transform 80ms ease-in;
            border-radius: 5px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            -ms-border-radius: 5px;
            -o-border-radius: 5px;
        }

        .sign-container button:active {
            transform: scale(.95);
            -webkit-transform: scale(.95);
            -moz-transform: scale(.95);
            -ms-transform: scale(.95);
            -o-transform: scale(.95);
        }

        .sign-container button.btn {
            background: transparent;
            border-color: var(--color-white-light);
        }

        .form-container.sign-in-container .links-container-plus {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            max-width: 40rem;
        }

        .links-container-plus .check {
            position: relative;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: start;
        }

        .links-container-plus .check input[type='checkbox'] {
            position: relative;
            top: 0;
            width: 3rem;
            height: 3rem;
            -webkit-appearance: none;
            outline: none;
            border: none;
            background-color: transparent;
            transition: 500ms all ease;
            -webkit-transition: 500ms all ease;
            -moz-transition: 500ms all ease;
            -ms-transition: 500ms all ease;
            -o-transition: 500ms all ease;
        }

        .links-container-plus .check input[type='checkbox']::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 4px solid var(--color-orange-primary);
            background-color: transparent;
            box-sizing: border-box;
            transition: all 500ms ease;
            -webkit-transition: all 500ms ease;
            -moz-transition: all 500ms ease;
            -ms-transition: all 500ms ease;
            -o-transition: all 500ms ease;
            border-radius: 5px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            -ms-border-radius: 5px;
            -o-border-radius: 5px;
        }

        .links-container-plus .check input:checked[type='checkbox']::before {
            border-left: none;
            border-top: none;
            width: 20px;
            border-color: var(--color-orange-primary);
            transform: rotate(45deg) translate(5px, -10px);
            -webkit-transform: rotate(45deg) translate(5px, -10px);
            -moz-transform: rotate(45deg) translate(5px, -10px);
            -ms-transform: rotate(45deg) translate(5px, -10px);
            -o-transform: rotate(45deg) translate(5px, -10px);
        }

        .links-container-plus .check label {
            position: absolute;
            font-size: 1.5rem;
            white-space: nowrap;
            margin-left: 5rem;
        }

        .links-container-plus a {
            transition: all 300ms ease;
            -webkit-transition: all 300ms ease;
            -moz-transition: all 300ms ease;
            -ms-transition: all 300ms ease;
            -o-transition: all 300ms ease;
        }

        .links-container-plus a:hover {
            color: var(--color-orange-primary);
        }

        .or-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            width: 100%;
        }

        .or-container span {
            font-size: 1.5rem;
            white-space: nowrap;
        }

        .or-container .line {
            height: 1px;
            width: 100%;
            margin-right: 1rem;
            background-color: var(--color-orange-primary);
            border-radius: 2px;
            -webkit-border-radius: 2px;
            -moz-border-radius: 2px;
            -ms-border-radius: 2px;
            -o-border-radius: 2px;
        }

        .sign-up-container .phone-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }

        .phone-container .box-indicatif {
            margin-right: 2rem;
            background-color: red;
            /* height: 50%; */
        }

        .box-indicatif select {
            background-color: var(--color-white-primary);
            color: var(--color-black-primary);
            padding: .5rem;
            border: none;
            font-size: 1.6rem;
            outline: none;
            -webkit-appearance: button;
        }

        .phone-container input {
            width: 100%;
        }


        /* Start of social media  */

        .social-container.social-media {
            display: flex;
            flex-direction: row;
        }

        .social-container .media {
            margin-right: 2rem;
        }

        .social-container .media a {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 4rem;
            height: 4rem;
            border: 1.5px solid rgba(0, 0, 0, .2);
            border-radius: 50%;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            -ms-border-radius: 50%;
            -o-border-radius: 50%;
            transition: all 300ms ease;
            -webkit-transition: all 300ms ease;
            -moz-transition: all 300ms ease;
            -ms-transition: all 300ms ease;
            -o-transition: all 300ms ease;
        }

        .social-container .media path {
            transition: all 300ms ease;
            -webkit-transition: all 300ms ease;
            -moz-transition: all 300ms ease;
            -ms-transition: all 300ms ease;
            -o-transition: all 300ms ease;
        }


        /* End of social media  */


        /* Facebook start */

        #facebook {
            width: 3rem;
        }

        #facebook circle {
            fill: none;
        }

        #facebook path {
            fill: var(--color-black-primary);
            opacity: .8;
        }

        .social-container .media a:hover #facebook path {
            fill: #3B5998;
            opacity: 1;
        }

        .social-container .media a.facebook:hover {
            border: 1.5px solid #3B5998;
        }


        /* Facebook End */


        /* Start of google */

        #google {
            width: 3rem;
        }

        #google circle {
            fill: none;
        }

        #google path {
            fill: var(--color-black-primary);
            opacity: .8;
        }

        .social-container .media a:hover #google path {
            fill: #DC4E41;
            opacity: 1;
        }

        .social-container .media a.google:hover {
            border: 1.5px solid #DC4E41;
        }


        /* End of google */


        /* Start of linkedIn */

        #linkedIn {
            width: 3rem;
        }

        #linkedIn circle {
            fill: none;
        }

        #linkedIn path {
            fill: var(--color-black-primary);
            opacity: .8;
        }

        .social-container .media a:hover #linkedIn path {
            fill: #007AB9;
            opacity: 1;
        }

        .social-container .media a.linkedIn:hover {
            border: 1.5px solid #007AB9;
        }


        /* End of linkedIn */


        /* Start of youtube */

        #youtube {
            width: 5rem;
        }

        #youtube circle {
            fill: none;
        }

        #youtube path {
            fill: var(--color-black-primary);
            opacity: .8;
        }
        .social-container .media a:hover #youtube path {
            fill: #CA3737;
            opacity: 1;
        }
        .social-container .media a.youtube:hover {
            border: 1.5px solid #CA3737;
        }
        /* End of youtube */
    </style>
@endsection

@section('main-content')
    <div class="container">
        <div class="sign-container right-panel-active" id='sign-container'>
            <div class="form-container sign-up-container">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <h1>Create Account</h1>
                    <input type="text" placeholder="First name" required name="first_name" autofocus value="{{ old('first_name') }}">
                    <input type="text" placeholder="Last name" required name="last_name" value="{{ old('last_name') }}">
                    <input type="email" placeholder="Email" required name="email" value="{{ old('email') }}" autocomplete="email">
                    <div class="phone-container">
                        <div class="box-indicatif">
                            <select name="indicatif">
                                <option value="+235">+ 235</option>
                                <option value="+212">+ 212</option>
                                <option value="+237">+ 237</option>
                                <option value="+74">+ 74</option>
                                <option value="+1">+ 1</option>
                            </select>
                        </div>
                        <input type="phone" placeholder="Phone" name="phone" required value="{{ old('phone') }}">
                    </div>
                    <input type="password" placeholder="Password" name="password" required>
                    <input type="password" placeholder="Confirm password" name="password_confirmation" required>
                    <button type="submit" class="action-btn">
                        <span>SIGN UP</span>
                        <span class="material-icons">trending_flat</span>
                    </button>
                    <div class="or-container">
                        <div class="line"></div>
                        <span>Create account with social media</span>
                    </div>
                    <ul class="social-container social-media">
                        <li class="media">
                            <a href="#" class="facebook">
                                <svg id="facebook" style="enable-background:new 0 0 112.196 112.196;" version="1.1" viewBox="0 0 112.196 112.196" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g>
                                        <circle cx="56.098" cy="56.098" r="56.098" />
                                        <path d="M70.201,58.294h-10.01v36.672H45.025V58.294h-7.213V45.406h7.213v-8.34   c0-5.964,2.833-15.303,15.301-15.303L71.56,21.81v12.51h-8.151c-1.337,0-3.217,0.668-3.217,3.513v7.585h11.334L70.201,58.294z"/>
                                    </g>
                                </svg>
                            </a>
                        </li>
                        <li class="media">
                            <a href="#" class="google">
                                <svg id="google" style="enable-background:new 0 0 112.196 112.196;" version="1.1" viewBox="0 0 112.196 112.196" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g>
                                        <g>
                                            <circle cx="56.098" cy="56.097" id="XMLID_30_" r="56.098"/>
                                        </g>
                                        <g>
                                            <path d="M19.531,58.608c-0.199,9.652,6.449,18.863,15.594,21.867c8.614,2.894,19.205,0.729,24.937-6.648    c4.185-5.169,5.136-12.06,4.683-18.498c-7.377-0.066-14.754-0.044-22.12-0.033c-0.012,2.628,0,5.246,0.011,7.874    c4.417,0.122,8.835,0.066,13.252,0.155c-1.115,3.821-3.655,7.377-7.51,8.757c-7.443,3.28-16.94-1.005-19.282-8.813    c-2.827-7.477,1.801-16.5,9.442-18.675c4.738-1.667,9.619,0.21,13.673,2.673c2.054-1.922,3.976-3.976,5.864-6.052    c-4.606-3.854-10.525-6.217-16.61-5.698C29.526,35.659,19.078,46.681,19.531,58.608z"/>
                                            <path d="M79.102,48.668c-0.022,2.198-0.045,4.407-0.056,6.604c-2.209,0.022-4.406,0.033-6.604,0.044    c0,2.198,0,4.384,0,6.582c2.198,0.011,4.407,0.022,6.604,0.045c0.022,2.198,0.022,4.395,0.044,6.604c2.187,0,4.385-0.011,6.582,0    c0.012-2.209,0.022-4.406,0.045-6.615c2.197-0.011,4.406-0.022,6.604-0.033c0-2.198,0-4.384,0-6.582    c-2.197-0.011-4.406-0.022-6.604-0.044c-0.012-2.198-0.033-4.407-0.045-6.604C83.475,48.668,81.288,48.668,79.102,48.668z"/>
                                            <g>
                                                <path d="M19.531,58.608c-0.453-11.927,9.994-22.949,21.933-23.092c6.085-0.519,12.005,1.844,16.61,5.698     c-1.889,2.077-3.811,4.13-5.864,6.052c-4.054-2.463-8.935-4.34-13.673-2.673c-7.642,2.176-12.27,11.199-9.442,18.675     c2.342,7.808,11.839,12.093,19.282,8.813c3.854-1.38,6.395-4.936,7.51-8.757c-4.417-0.088-8.835-0.033-13.252-0.155     c-0.011-2.628-0.022-5.246-0.011-7.874c7.366-0.011,14.743-0.033,22.12,0.033c0.453,6.439-0.497,13.33-4.683,18.498     c-5.732,7.377-16.322,9.542-24.937,6.648C25.981,77.471,19.332,68.26,19.531,58.608z" />
                                                <path d="M79.102,48.668c2.187,0,4.373,0,6.57,0c0.012,2.198,0.033,4.407,0.045,6.604     c2.197,0.022,4.406,0.033,6.604,0.044c0,2.198,0,4.384,0,6.582c-2.197,0.011-4.406,0.022-6.604,0.033     c-0.022,2.209-0.033,4.406-0.045,6.615c-2.197-0.011-4.396,0-6.582,0c-0.021-2.209-0.021-4.406-0.044-6.604     c-2.197-0.023-4.406-0.033-6.604-0.045c0-2.198,0-4.384,0-6.582c2.198-0.011,4.396-0.022,6.604-0.044     C79.057,53.075,79.079,50.866,79.102,48.668z" />
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </a>
                        </li>
                        <li class="media">
                            <a href="#" class="linkedIn">
                                <svg id="linkedIn" style="enable-background:new 0 0 112.196 112.196;" version="1.1" viewBox="0 0 112.196 112.196" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g>
                                        <circle cx="56.098" cy="56.097" r="56.098"/>
                                        <g>
                                            <path d="M89.616,60.611v23.128H76.207V62.161c0-5.418-1.936-9.118-6.791-9.118    c-3.705,0-5.906,2.491-6.878,4.903c-0.353,0.862-0.444,2.059-0.444,3.268v22.524H48.684c0,0,0.18-36.546,0-40.329h13.411v5.715    c-0.027,0.045-0.065,0.089-0.089,0.132h0.089v-0.132c1.782-2.742,4.96-6.662,12.085-6.662    C83.002,42.462,89.616,48.226,89.616,60.611L89.616,60.611z M34.656,23.969c-4.587,0-7.588,3.011-7.588,6.967    c0,3.872,2.914,6.97,7.412,6.97h0.087c4.677,0,7.585-3.098,7.585-6.97C42.063,26.98,39.244,23.969,34.656,23.969L34.656,23.969z     M27.865,83.739H41.27V43.409H27.865V83.739z"/>
                                        </g>
                                    </g>
                                </svg>
                            </a>
                        </li>
                        <li class="media">
                            <a href="#" class="youtube">
                                <svg enable-background="new 0 0 48 48" id="youtube" version="1.1" viewBox="0 0 48 48" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <circle cx="24" cy="24" r="24"/>
                                    <path d="M35.2,18.5c0-0.1,0-0.2-0.1-0.3c0,0,0-0.1,0-0.1c-0.3-0.9-1.1-1.5-2.1-1.5h0.2c0,0-3.9-0.6-9.2-0.6  c-5.2,0-9.2,0.6-9.2,0.6H15c-1,0-1.8,0.6-2.1,1.5c0,0,0,0.1,0,0.1c0,0.1,0,0.2-0.1,0.3c-0.1,1-0.4,3.1-0.4,5.5  c0,2.4,0.3,4.5,0.4,5.5c0,0.1,0,0.2,0.1,0.3c0,0,0,0.1,0,0.1c0.3,0.9,1.1,1.5,2.1,1.5h-0.2c0,0,3.9,0.6,9.2,0.6  c5.2,0,9.2-0.6,9.2-0.6H33c1,0,1.8-0.6,2.1-1.5c0,0,0-0.1,0-0.1c0-0.1,0-0.2,0.1-0.3c0.1-1,0.4-3.1,0.4-5.5  C35.6,21.6,35.4,19.5,35.2,18.5z M27.4,24.5l-4.7,3.4C22.6,28,22.5,28,22.4,28c-0.1,0-0.2,0-0.3-0.1c-0.2-0.1-0.3-0.3-0.3-0.5v-6.8  c0-0.2,0.1-0.4,0.3-0.5c0.2-0.1,0.4-0.1,0.6,0l4.7,3.4c0.1,0.1,0.2,0.3,0.2,0.5C27.7,24.2,27.6,24.4,27.4,24.5z"/>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </form>
            </div>
            <div class="form-container sign-in-container">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <h1>Sign in</h1>
                    <input type="email" placeholder="Email" name="email" required autocomplete="email" autofocus>
                    <input type="password" placeholder="Password" name="password" required>
                    <div class="links-container-plus">
                        <div class="check">
                            <input type="checkbox" name="remember" id='remember-me' {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember-me">Remember me</label>
                        </div>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">Forgot your password?</a>
                        @endif
                    </div>
                    <button class="action-btn" type="submit" >
                        <span>Log in</span>
                        <span class="material-icons">trending_flat</span>
                    </button>
                    <div class="or-container">
                        <div class="line"></div>
                        <span>Connect with social media</span>
                    </div>
                    <ul class="social-container social-media">
                        <li class="media">
                            <a href="#" class="facebook">
                                <svg id="facebook" style="enable-background:new 0 0 112.196 112.196;" version="1.1" viewBox="0 0 112.196 112.196" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g>
                                        <circle cx="56.098" cy="56.098" r="56.098" />
                                        <path d="M70.201,58.294h-10.01v36.672H45.025V58.294h-7.213V45.406h7.213v-8.34   c0-5.964,2.833-15.303,15.301-15.303L71.56,21.81v12.51h-8.151c-1.337,0-3.217,0.668-3.217,3.513v7.585h11.334L70.201,58.294z"/>
                                    </g>
                                </svg>
                            </a>
                        </li>
                        <li class="media">
                            <a href="#" class="google">
                                <svg id="google" style="enable-background:new 0 0 112.196 112.196;" version="1.1" viewBox="0 0 112.196 112.196" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g>
                                        <g>
                                            <circle cx="56.098" cy="56.097" id="XMLID_30_" r="56.098"/>
                                        </g>
                                        <g>
                                            <path d="M19.531,58.608c-0.199,9.652,6.449,18.863,15.594,21.867c8.614,2.894,19.205,0.729,24.937-6.648    c4.185-5.169,5.136-12.06,4.683-18.498c-7.377-0.066-14.754-0.044-22.12-0.033c-0.012,2.628,0,5.246,0.011,7.874    c4.417,0.122,8.835,0.066,13.252,0.155c-1.115,3.821-3.655,7.377-7.51,8.757c-7.443,3.28-16.94-1.005-19.282-8.813    c-2.827-7.477,1.801-16.5,9.442-18.675c4.738-1.667,9.619,0.21,13.673,2.673c2.054-1.922,3.976-3.976,5.864-6.052    c-4.606-3.854-10.525-6.217-16.61-5.698C29.526,35.659,19.078,46.681,19.531,58.608z"/>
                                            <path d="M79.102,48.668c-0.022,2.198-0.045,4.407-0.056,6.604c-2.209,0.022-4.406,0.033-6.604,0.044    c0,2.198,0,4.384,0,6.582c2.198,0.011,4.407,0.022,6.604,0.045c0.022,2.198,0.022,4.395,0.044,6.604c2.187,0,4.385-0.011,6.582,0    c0.012-2.209,0.022-4.406,0.045-6.615c2.197-0.011,4.406-0.022,6.604-0.033c0-2.198,0-4.384,0-6.582    c-2.197-0.011-4.406-0.022-6.604-0.044c-0.012-2.198-0.033-4.407-0.045-6.604C83.475,48.668,81.288,48.668,79.102,48.668z"/>
                                            <g>
                                                <path d="M19.531,58.608c-0.453-11.927,9.994-22.949,21.933-23.092c6.085-0.519,12.005,1.844,16.61,5.698     c-1.889,2.077-3.811,4.13-5.864,6.052c-4.054-2.463-8.935-4.34-13.673-2.673c-7.642,2.176-12.27,11.199-9.442,18.675     c2.342,7.808,11.839,12.093,19.282,8.813c3.854-1.38,6.395-4.936,7.51-8.757c-4.417-0.088-8.835-0.033-13.252-0.155     c-0.011-2.628-0.022-5.246-0.011-7.874c7.366-0.011,14.743-0.033,22.12,0.033c0.453,6.439-0.497,13.33-4.683,18.498     c-5.732,7.377-16.322,9.542-24.937,6.648C25.981,77.471,19.332,68.26,19.531,58.608z" />
                                                <path d="M79.102,48.668c2.187,0,4.373,0,6.57,0c0.012,2.198,0.033,4.407,0.045,6.604     c2.197,0.022,4.406,0.033,6.604,0.044c0,2.198,0,4.384,0,6.582c-2.197,0.011-4.406,0.022-6.604,0.033     c-0.022,2.209-0.033,4.406-0.045,6.615c-2.197-0.011-4.396,0-6.582,0c-0.021-2.209-0.021-4.406-0.044-6.604     c-2.197-0.023-4.406-0.033-6.604-0.045c0-2.198,0-4.384,0-6.582c2.198-0.011,4.396-0.022,6.604-0.044     C79.057,53.075,79.079,50.866,79.102,48.668z" />
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </a>
                        </li>
                        <li class="media">
                            <a href="#" class="linkedIn">
                                <svg id="linkedIn" style="enable-background:new 0 0 112.196 112.196;" version="1.1" viewBox="0 0 112.196 112.196" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g>
                                        <circle cx="56.098" cy="56.097" r="56.098"/>
                                        <g>
                                            <path d="M89.616,60.611v23.128H76.207V62.161c0-5.418-1.936-9.118-6.791-9.118    c-3.705,0-5.906,2.491-6.878,4.903c-0.353,0.862-0.444,2.059-0.444,3.268v22.524H48.684c0,0,0.18-36.546,0-40.329h13.411v5.715    c-0.027,0.045-0.065,0.089-0.089,0.132h0.089v-0.132c1.782-2.742,4.96-6.662,12.085-6.662    C83.002,42.462,89.616,48.226,89.616,60.611L89.616,60.611z M34.656,23.969c-4.587,0-7.588,3.011-7.588,6.967    c0,3.872,2.914,6.97,7.412,6.97h0.087c4.677,0,7.585-3.098,7.585-6.97C42.063,26.98,39.244,23.969,34.656,23.969L34.656,23.969z     M27.865,83.739H41.27V43.409H27.865V83.739z"/>
                                        </g>
                                    </g>
                                </svg>
                            </a>
                        </li>
                        <li class="media">
                            <a href="#" class="youtube">
                                <svg enable-background="new 0 0 48 48" id="youtube" version="1.1" viewBox="0 0 48 48" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <circle cx="24" cy="24" r="24"/>
                                    <path d="M35.2,18.5c0-0.1,0-0.2-0.1-0.3c0,0,0-0.1,0-0.1c-0.3-0.9-1.1-1.5-2.1-1.5h0.2c0,0-3.9-0.6-9.2-0.6  c-5.2,0-9.2,0.6-9.2,0.6H15c-1,0-1.8,0.6-2.1,1.5c0,0,0,0.1,0,0.1c0,0.1,0,0.2-0.1,0.3c-0.1,1-0.4,3.1-0.4,5.5  c0,2.4,0.3,4.5,0.4,5.5c0,0.1,0,0.2,0.1,0.3c0,0,0,0.1,0,0.1c0.3,0.9,1.1,1.5,2.1,1.5h-0.2c0,0,3.9,0.6,9.2,0.6  c5.2,0,9.2-0.6,9.2-0.6H33c1,0,1.8-0.6,2.1-1.5c0,0,0-0.1,0-0.1c0-0.1,0-0.2,0.1-0.3c0.1-1,0.4-3.1,0.4-5.5  C35.6,21.6,35.4,19.5,35.2,18.5z M27.4,24.5l-4.7,3.4C22.6,28,22.5,28,22.4,28c-0.1,0-0.2,0-0.3-0.1c-0.2-0.1-0.3-0.3-0.3-0.5v-6.8  c0-0.2,0.1-0.4,0.3-0.5c0.2-0.1,0.4-0.1,0.6,0l4.7,3.4c0.1,0.1,0.2,0.3,0.2,0.5C27.7,24.2,27.6,24.4,27.4,24.5z"/>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Welcome back!</h1>
                        <p>Already a member? Connect with your credentials to get access of deals around you</p>
                        <button class="btn" id="signIn">Sign in</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>Hello Friend!</h1>
                        <p>News around? Your are welcome! <br>Start by creating your account.</p>
                        <button class="btn" id="signUp">Sign up</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts-links')
    <script>
        const signUpBtn = document.getElementById('signUp');
        const signInBtn = document.getElementById('signIn');
        const container = document.getElementById('sign-container');

        signUpBtn.addEventListener('click', () => container.classList.add('right-panel-active'));
        signInBtn.addEventListener('click', () => container.classList.remove('right-panel-active'));
    </script>
@endsection
