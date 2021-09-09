<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verify Email</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <link href="{{ asset('css/verify-email.css') }}" rel="stylesheet">
</head>
<body class="d-flex h-100 text-center text-white bg-dark">

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="mb-auto">
    </header>

    <main class="px-3">
        <h1>Please check your email.</h1>
        <p class="lead">A verification link has been sent to {{ auth()->user()->email }}. Please confirm your email address to access this page.</p>
        <p class="lead">If you did not get the message please click <a id="link" href="javascript:void(0)">resend</a></p>
    </main>

    <footer class="mt-auto text-white-50">
    </footer>
</div>

<form id="form" action="{{ route('verification.send') }}" method="post">@csrf</form>

<script>
    let button = document.getElementById('link');
    button.addEventListener( 'click', function() {
        document.getElementById('form').submit();
    });
</script>

</body>
</html>
