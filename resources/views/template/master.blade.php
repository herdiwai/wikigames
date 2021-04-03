<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
     <title>@yield('title') | {{ config('app.name') }}</title>

     <!-- General CSS Files -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

     <!-- CSS Libraries -->
     <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
     
     <!-- Template CSS -->
     <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
     <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
</head>

<body>
     <div id="app">
     <div class="main-wrapper">
          @include('template.navbar')
          @include('template.sidebar')
     <!-- Main Content -->
     <div class="main-content">
          <section class="section">
               <div class="section-header">
                    <h1>@yield('title')</h1>
               </div>
                    @include('custom-flash-message.flash-message')
                    @yield('content')
                      
               <div class="section-body">
               </div>
          </section>
               @yield('modal')
     </div>
          @include('template.footer')
