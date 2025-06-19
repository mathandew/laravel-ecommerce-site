<!DOCTYPE html>
<html>

<head>

    <!-- css links -->
    @include('home.css')

</head>

<body>
    <div class="hero_area">

        <!-- header section -->
        @include('home.header')

        <!-- slider section -->
        @include('home.slider')

    </div>

        <!-- shop section -->
        @include('home.product')

        <!-- contact section -->
        @include('home.contact')
        <br><br><br>

        <!-- info section -->
        @include('home.footer')

        <!-- js links -->
        @include('home.js')


</body>

</html>