<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'My App')</title>
</head>

<body>
  <nav>
    <a href="/">Home</a>
  </nav>

  <!-- Main Content Placeholder -->
  <div class="container">
    @yield('content')
  </div>
</body>

</html>