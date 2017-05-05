<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Document </title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css"/>

</head>
<body>
    @include ('partials.nav')

    <div class="container">
        @include('flash::message')
        @yield('content')
    </div>

{{--<script src ="/js/output.js"></script>--}}
<script src="//code.jquery.com/jquery.js" ></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script>
    $('#flash-overlay-modal').modal();
    $('div.alert').not('.alert-important').delay(3000).slideUp(300);

    //clear and reset modal
    $('body').on('hidden.bs.modal', '.modal', function () {
        $(this).removeData('bs.modal');
        $('.resp').html("");
    });

</script>

@yield('footer')

</body>
</html>