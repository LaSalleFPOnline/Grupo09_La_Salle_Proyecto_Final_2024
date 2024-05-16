<!DOCTYPE html>
<html lang="es">
  @include('includes.header')
  <body>
    <div class="wrapper">
      @include('includes.menuTienda')
      <div id="content">
        @include('includes.navbarTienda')
        <div id="page">
          <h1>@yield('title')</h1>
          @yield('content')
        </div>
      </div>
    </div>
  </body>
  @include('includes.footer')
  @yield('script')
</html>