<html lang="pt-br">

<head>
    <title>Faculdade - Vendauto</title>
    <meta http-equiv="Content-Language" content="pt-br">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/icons/css/all.css">
    <style>
        body {
            padding: 0;
            margin: 0;
        }
        nav.navbar.navbar-expand-lg.navbar-dark.bg-dark {
            margin-bottom: 20px;
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
        .pagination {
            justify-content: center;
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
  <script src="/js/bootstrap.js"></script>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });

    var text_max = $('#textareaLimited').attr('maxlength');
    $('#count_message').html(text_max + ' caracteres sobrando');
    $('#textareaLimited').keyup(function() {
        var text_length = $('#textareaLimited').val().length;
        var text_remaining = text_max - text_length;
        $('#count_message').html(text_remaining + ' caracteres sobrando');
    });
</script>
</body>
</html>
