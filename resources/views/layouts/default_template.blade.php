<html lang="pt-br">

<head>
    <title>Faculdade - Vendauto</title>
    <meta http-equiv="Content-Language" content="pt-br">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/icons/css/all.css">
    <style>
        body {
            padding-top: 54px;
            padding-bottom: 0;
            margin-bottom: 0;
        }
        @media (min-width: 992px) {
            body {
                padding-top: 56px;
            }
        }
        .footer {
            margin-top: 20px;
            width: 100%;
            height: 60px;
            line-height: 60px; /* Vertically center the text there */
            background-color: #f5f5f5;
            text-align: center;
        }
        .card-deck{
            margin-bottom: 20px;
        }
        .btn.btn-primary{
            color:#fff!important;
            font-weight: bold;
        }
        .circle-icon {
            background-color: #ffffff;
            padding: 10px;
            border-radius: 50%;
            color: #343a40;
        }
    </style>
</head>
<body>

@include('components.navigation_search')

  <main role="main" class="container">

      @yield('content')

  </main>
<footer class="footer">
    @include('components.footer')
</footer>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="js/bootstrap.js"></script>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
</body>
</html>
