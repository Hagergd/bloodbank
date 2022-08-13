<!DOCTYPE html>
<html lang="en" dir="rtl">
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

       
        @include('front.layouts.head')
        
        
    </head>
    <body>
    

        @include('front.layouts.header')
        
        
        @include('front.layouts.main-header')
    
            @yield('contents')
        
    
        @include('front.layouts.footer')
        
        
        @include('front.layouts.footer-scripts')

    </body>
</html>