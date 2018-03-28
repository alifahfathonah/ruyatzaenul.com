<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Oops, 404 Not Found | CEP CCIT FTUI</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('frontend.includes.head')
</head>

<body>
    <div class="wrapper">

      <div class="container">
        <div class="row">
          <div class="col-sm-12 text-center mt-130">
            <img src="{{ asset('images/logo/logoccit.png') }}" alt="">
            <h1 class="page-title mt-30">Sorry, nothing to see here!</h1>
            <h3>We can't seem to find the page you're looking for.</h3>
            <p>Error Code: 404</p>

            <a href="{{ route('front.beranda') }}" class="btn btn-primary">Back to Home</a>
          </div>
        </div>
      </div>

      <div id="toTop">
          <i class="fa fa-chevron-up"></i>
      </div>
    </div>

    @include('frontend.includes.footscript')


</body>

</html>
