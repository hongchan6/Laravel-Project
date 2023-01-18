<!doctype html>
<html>
<head>
    <title>@yield('title')</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
   
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar navbar-success bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" >Work Integreted Learning</a>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="https://s5267134.elf.ict.griffith.edu.au/webAppDev/assignment/part2/public/">Home</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="https://s5267134.elf.ict.griffith.edu.au/webAppDev/assignment/part2/public/add_project">Project Register</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="https://s5267134.elf.ict.griffith.edu.au/webAppDev/assignment/part2/public/student_list">Student List</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="https://s5267134.elf.ict.griffith.edu.au/webAppDev/assignment/part2/public/top_list">Top 3</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="https://s5267134.elf.ict.griffith.edu.au/webAppDev/assignment/part2/public/assignment">Assignment</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="https://s5267134.elf.ict.griffith.edu.au/webAppDev/assignment/part2/public/doc">Document</a>
        </li>

      </ul>
    </div>
  </div>
</nav>

    <div class="content">
        @yield('content')
    </div>
    
</body>
</html>