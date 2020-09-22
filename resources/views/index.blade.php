<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
    <style>
        @import url("https://fonts.googleapis.com/css?family=Source+Sans+Pro:600&display=swap");
        * {
            box-sizing: border-box;
        }
        *::before, *::after {
            box-sizing: border-box;
        }

        body {
            font-family: "Source Sans Pro", sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            min-height: 100vh;
        }

        input[type=checkbox] {
            position: relative;
            width: 1.5em;
            height: 1.5em;
            color: #363839;
            border: 1px solid #bdc1c6;
            border-radius: 4px;
            appearance: none;
            outline: 0;
            cursor: pointer;
            transition: background 175ms cubic-bezier(0.1, 0.1, 0.25, 1);
        }
        input[type=checkbox]::before {
            position: absolute;
            content: "";
            display: block;
            top: 2px;
            left: 7px;
            width: 8px;
            height: 14px;
            border-style: solid;
            border-color: #fff;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
            opacity: 0;
        }
        input[type=checkbox]:checked {
            color: #fff;
            border-color: #06842c;
            background: #06842c;
        }
        input[type=checkbox]:checked::before {
            opacity: 1;
        }
        input[type=checkbox]:checked ~ label::before {
            clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
        }

        label {
            position: relative;
            cursor: pointer;
            font-size: 1.5em;
            font-weight: 600;
            padding: 0 0.25em 0;
            user-select: none;
        }
        label::before {
            position: absolute;
            content: attr(data-content);
            color: #9c9e9f;
            clip-path: polygon(0 0, 0 0, 0% 100%, 0 100%);
            text-decoration: line-through;
            text-decoration-thickness: 3px;
            text-decoration-color: #363839;
            transition: clip-path 200ms cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }
        A {
            text-decoration: none;
            color: #363839;
        }
        A:hover {
            text-decoration: none;
            color: #363839;
        }

    </style>
    <title>{{$title}}</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center">{{$pagetitle}}</h1><hr/>
        @yield('content')
    </div>

    {{--<script>

        $(function() {

            $('#todo').change(function(){


                var id = $(this).val();
                var completed = $("input:checkbox").is(":checked") ? 1:0;

                $.ajax({



                    type: "POST",

                    data: {id:id,completed :completed},

                    url: '{{ route('update_completed_task') }}',


                    headers: {

                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')

                    },
                    error: function (msg) {

                        alert('Ошибка');

                    }

                });

            });

        })

    </script>--}}
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
