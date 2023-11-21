<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
        <header style="background-color: {{$tenant->color ?? ''}};" class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
          <div class="col-md-3 mb-2 mb-md-0">
            <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
              <svg class="bi" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
              <img style="max-width: 100px;" src="{{getUserAvatar($tenant->logo ?? '')}}" alt="" srcset="">
            
            </a>
          </div>
    
          <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="#" class="nav-link px-2 link-secondary">Home</a></li>
           
            <li><a href="#" class="nav-link px-2">FAQs</a></li>
            <li><a href="#" class="nav-link px-2">About</a></li>
          </ul>
    
          <div class="col-md-3 text-start">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}">
                            <button type="button" class="btn btn-outline-primary me-2">Dashboard</button>
                        </a>
                    @else
                        <a href="{{ route('login') }}">
                            <button type="button" class="btn btn-outline-primary me-2">Login</button>
                        </a>
                        @tenant()
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">
                                <button type="button" class="btn btn-primary">Register</button>
                            </a>
                        @endif
                        @endtenant()
                    @endauth
                </div>
            @endif

          </div>
        </header>

      <div class="container">
        <div class="row">
            @foreach($posts as $post)
            <div class="col-sm-4 mb-3">
                <div class="card">
                    <img src="{{$post->url_cover}}" style="width: 100%;height: 200px;" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{$post->title}}</h5>
                      <p class="card-text">{{ Str::words($post->body, 10, '...') }}</p>
                      <a href="{{ route('blog.post', ['id' =>"$post->id"])}}" class="btn btn-primary">See Post</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>