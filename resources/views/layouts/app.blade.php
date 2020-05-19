<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
         .-.      _______                             .  '  *   .  . '
        {}``; |==|_______D                              .  * * -+-
       / ('        /|\                             .    * .    '  *
  (   /  |        / | \                                * .  ' .  .
    \(_)_]]      /  |  \                            *   *  .   .
                                                   '   *
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,user-scalable=0"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .loading:after {
            overflow: hidden;
            display: inline-block;
            vertical-align: bottom;
            -webkit-animation: ellipsis steps(4,end) 6000ms infinite;
            animation: ellipsis steps(4,end) 6000ms infinite;
            content: "\2026"; /* ascii code for the ellipsis character */
            width: 0px;
        }

        @keyframes ellipsis {
            to {
                width: 1.25em;
            }
        }

        @-webkit-keyframes ellipsis {
            to {
                width: 1.25em;
            }
        }
    </style>
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
    <livewire:styles>
</head>
<body>
    <div id="app">

        @include('layouts.partials.nav')

        <main class="py-4">

            @yield('content')

        </main>

        @include('layouts.partials.footer')
    </div>
    <livewire:scripts>
</body>
                                .do-"""""'-o..
                             .o""            ""..
                           ,,''                 ``b.
                          d'                      ``b
                         d`d:                       `b.
                        ,,dP                         `Y.
                       d`88                           `8.
ooooooooooooooooood888`88'                            `88888888888bo,
d                    Y:d8P                              8,          `b
8                    P,88b                             ,`8           8
8                   ::d888,                           ,8:8.          8
:                   dY88888                           `' ::          8
:                   8:8888                               `b          8
:                   Pd88P',...                     ,d888o.8          8
:                   :88'dd888888o.                d8888`88:          8
:                  ,:Y:d8888888888b             ,d88888:88:          8
:                  :::b88d888888888b.          ,d888888bY8b          8
:                   b:P8;888888888888.        ,88888888888P          8
:                   8:b88888888888888:        888888888888'          8
:                   8:8.8888888888888:        Y8888888888P           8
,                   YP88d8888888888P'          ""888888"Y            8
:                   :bY8888P"""""''                     :            8
:                    8'8888'                            d            8
:                    :bY888,                           ,P            8
:                     Y,8888           d.  ,-         ,8'            8
:                     `8)888:           '            ,P'             8
:                      `88888.          ,...        ,P               8
:                       `Y8888,       ,888888o     ,P                8
:                         Y888b      ,88888888    ,P'                8
:                          `888b    ,888888888   ,,'                 8
:                           `Y88b  dPY888888OP   :'                  8
:                             :88.,'.   `' `8P-"b.                   8
:.                             )8P,   ,b '  -   ``b                  8
::                            :':   d,'d`b, .  - ,db                 8
::                            `b. dP' d8':      d88'                 8
::                             '8P" d8P' 8 -  d88P'                  8
::                            d,' ,d8'  ''  dd88'                    8
::                           d'   8P'  d' dd88'8                     8
:                          ,:   `'   d:ddO8P' `b.                    8
:                  ,dooood88: ,    ,d8888""    ```b.                 8
:               .o8"'""""""Y8.b    8 `"''    .o'  `"""ob.            8
:              dP'         `8:     K       dP''        "`Yo.         8
:             dP            88     8b.   ,d'              ``b        8
:             8.            8P     8""'  `"                 :.       8
:            :8:           :8'    ,:                        ::       8
:            :8:           d:    d'                         ::       8
:            :8:          dP   ,,'                          ::       8
:            `8:     :b  dP   ,,                            ::       8
:            ,8b     :8 dP   ,,                             d        8
:            :8P     :8dP    d'                       d     8        8
:            :8:     d8P    d'                      d88    :P        8
:            d8'    ,88'   ,P                     ,d888    d'        8
:            88     dP'   ,P                      d8888b   8         8
'           ,8:   ,dP'    8.                     d8''88'  :8         8
'           :8   d8P'    d                      d"'  88   :8         8
'           d: ,d8P'    ,8P                          88   :P         8
'           8 ,88P'     d'                           88   ::         8
'         ,8 d8P       8                             88   ::         8
'         d: 8P       ,:                            :88   ::         8
'         8',8:,d     d'                            :8:   ::         8
'         ,8,8P'8'    ,8                            :8'   ::         8
'         :8`' d'     d'                            :8    ::         8
'         `8  ,P     :8                             :8:   ::         8
'          8, `      d8.                            :8:   8:         8
'          :8       d88:                            d8:   8          8
,          `8,     d8888                            88b   8          8
:           88   ,d::888                            888   Y:         8
:           YK,oo8P :888                            888.  `b         8
:           `8888P  :888:                          ,888:   Y,        8
:            ``'"   `888b                          :888:   `b        8
:                    8888                           888:    ::       8
:                    8888:                          888b     Y.      8
:                    8888b                          :888     `b      8
:                    88888.                         `888,     Y      8
`....................................................................
</html>
