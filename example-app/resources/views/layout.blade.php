 <!DOCTYPE html>
 <html>
    <head>
        <style>
                body .header{
                    background-color:#eb3c3c;
                    height: 6rem;
                    margin-bottom:2rem;
                    display:flex;
                    color:white;
                    font-family:'Roboto', sans-serif;
                }

                body .header .title{
                    display:flex;
                    justify-content:center;
                    align-items: center;
                    margin-left:31rem;
                }

                body .header .a img{
                    height:2rem;
                    margin-top:3.8rem;
                    margin-left:0.2rem;
                }
        </style>
    </head>

    <body>
        <header class="header" @yield('Header')>
            <img src=" {{ asset('Images/logo1.jpg') }} ">
            <a class="a" href="{{ url('/welcome') }}" ><img src=" {{ asset('Images/home.png') }} "></a>
            <h3 class="title" style="margin-left:28rem">@yield('titulo')</h3>
        </header>

        <div class="conteudo">@yield('conteudo')</div>
    </body>

</html>