<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel {{ app()->version() }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                display: flex;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .framwork_title {
                font-weight: 600;
                padding-top: 20px;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .columns:nth-child(even) .box {  }
            .columns:nth-child(odd) .box { background: #F0F0F0; }
            .content ul {list-style: none;}
            .post-content {border-right: 1px solid #ccc;}
            .pagination-link.is-current {
                background-color: #ff3860;
                border-color: #ff3860;
                color: #fff;
            }
            .pagination-previous {border: none;}
        </style>
    </head>
    <body>
        <div class="flex container position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    MAQE Forums
                    <p class="subtitle">Subtitle</p>
                </div>
                <div class="post-container">
                    <p class="subtitle">Posts</p>
                    @foreach($posts as $post)
                        <div class="columns is-multiline">
                            <div class="column">
                                <div class="box post">
                                    <div class="columns is-vcentered">
                                        <div class="column is-four-fifths post-content">
                                            <article class="media">
                                                <div class="media-left">
                                                    <figure class-"image is-96x96">
                                                        <img src="{{$post['image_url']}}" />
                                                    </figure>
                                                </div>
                                                <div class="media-content">
                                                    <h2>{{$post['title']}}</h2>
                                                    <p class="is-medium has-text-grey-dark ">{{$post['body']}}</p>
                                                    <p class="is-medium has-text-grey-light is-italic">
                                                        <span class="icon">
                                                            <i class="far fa-clock"></i>
                                                        </span>
                                                        {{$post['created_at']}}
                                                    </p>
                                                </div>
                                            </article>
                                        </div>
                                        <div class="column post-author">
                                            <article class="media">
                                                <div class="media-content">
                                                    <div class="image has-text-centered">
                                                        <figure class="image is-64x64 is-inline-block">
                                                            <img class="is-rounded" src="{{$post['author']['avatar_url']}}">
                                                        </figure>
                                                    </div>
                                                    <h4 class="has-text-centered has-text-danger has-text-weight-semibold">{{$post['author']['name']}}</h4>
                                                    <p class="is-medium has-text-centered has-text-black has-text-weight-semibold">{{$post['author']['role']}}</p>
                                                    <p class="is-medium has-text-centered has-text-black has-text-weight-semibold">
                                                        <span class="icon">
                                                            <i class="fas fa-map-marker-alt"></i>
                                                        </span>
                                                            {{$post['author']['place']}}
                                                    </p>
                                                </div>
                                            </article>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <nav class="pagination is-centered is-rounded" role="navigation">
                    <ul class="pagination-list">
                        <li><a class="pagination-previous">Previous</a></li>
                        <li><a class="pagination-link is-current" aria-label="Goto page 1">1</a></li>
                        <li><a class="pagination-link" aria-label="Goto page 2">2</a></li>
                        <li><a class="pagination-link" aria-label="Goto page 3">3</a></li>
                        <li><a class="pagination-link" aria-label="Goto page 4">4</a></li>
                        <li><a class="pagination-link" aria-label="Goto page 5">5</a></li>
                        <li><a class="pagination-link" aria-label="Goto page 6">6</a></li>
                        <li><a class="pagination-link" aria-label="Goto page 7">7</a></li>
                        <li><a class="pagination-link" aria-label="Goto page 8">8</a></li>
                        <li><a class="pagination-previous">Next page</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </body>
</html>
