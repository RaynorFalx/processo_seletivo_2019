<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="pt-br"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Desafio - 2</title>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta name="author" content=""/>
        <meta name="description" content=""/>
        <meta name="keywords" content=""/>
        <meta name="robots" content="index, follow"/>

        <!-- Favicon -->
        <link rel="shortcut icon" href="../../../favicon.png">

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

        <!--[if (gte IE 6)&(lte IE 8)]>
        <script type="text/javascript" src="selectivizr.js"></script>
        <noscript>
            <link rel="stylesheet" href="[fallback css]"/>
        </noscript>
        <![endif]-->

    </head>
    <body>
    <!--[if lt IE 7]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
        your browser</a> to improve your experience.</p>
    <![endif]-->

    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <section class="conteudo-internas">
        <div class="centraliza">
            <div class="conteudo-esquerda">
                <div class="lista">
                    <!--Lista de Noticias-->
                    <form action="/search" class="form-group row">
                        <div class="col-12 busca">
                            <input type="text" class="form-control col-8" placeholder="Digite sua busca" name="search">
                            <button class="btn btn-primary col-2"> Buscar</button>
                        </div>
                    </form>
                    <hr>
                    <!--Notícia-->
                    @foreach($responseData['noticias'] as $idx => $noticia)
                        @if($idx < 5)
                            <article class="box-noticia">
                                <a href={{$noticia['url']}}>
                                    <figure>
                                        <img src={{$noticia['imagem']}}>
                                    </figure>
                                    <div class="texto-lista-noticias">
                                        <span class="data-lista-noticia">{{$noticia['data_formatada']}}</span>
                                        <h1>{{$noticia['titulo']}}</h1>
                                        @if(strlen($noticia['texto']) >= 500)
                                            <p>
                                                {{
                                                    html_entity_decode(strip_tags(substr($noticia['texto'], 0, 500))). "..."
                                                }}
                                            </p>
                                        @else
                                            <p>
                                                {{
                                                    html_entity_decode(strip_tags($noticia['texto']))
                                                }}
                                            </p>
                                        @endif

                                    </div>
                                </a>
                            </article>
                            <hr>
                        @endif
                    @endforeach
                    <!--Fim Notícia-->

                    <hr>
                    <ul class="pagination">
                        <li class="active page-item">
                            <a class="page-link" href="/paginator" name="page" id="1">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="/paginator">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="/paginator">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                    <!--Fim Paginação-->
                </div><!--Fim Lista de Noticias-->
            </div> <!-- final conteudo-esquerda -->
        </div> <!-- final centraliza -->
    </section>
</body>
</html>