@extends('layout.main', ['title' => 'Welcome'])
    

@section('container')
        <!-- jumbotron -->
        <div class="jumbotron">
            <div class="d-flex">
                <H5 class="display-4 mt-5"></H5>
            </div>
            <p class="efek-ngetik"></p>
        </div>
        <!-- end jumbotron -->


        <!-- Page content-->
        <div class="container">
                <div class="my-5 primary"> 
                 <h4 class="mb-4 pb-3">Primary</h4> 
                </div>
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Blog post-->
                            @forelse( $posts as $post)
                            <div class="card mb-4">
                                @if( $post->thumbnail)
                                    <a href="{{ route('posts.show', $post->slug )}}"><img class="card-img-top" src="{{ $post->takeImage }}" /></a>
                                @endif
                                <div class="card-body">
                                    <div class="small text-muted">Punished on {{$post->created_at->format('D M, Y')}}</div>
                                    <h2 class="card-title h4">{{$post->title}}</h2>
                                    <p class="card-text">{{ Str::limit($post->body, 150, '.')}}</p>
                                    <a class="btn btn-sm btn-primary" href="{{ Route('posts.show', $post->slug) }}">Read more →</a>
                                </div>
                            </div>
                            @empty
                                <div class="alert alert-success">
                                    there's not find
                                </div>
                            @endforelse
                            <!-- Blog post-->
                           
                        </div>
                    </div>
                    <!-- Pagination-->
                    <nav aria-label="Pagination">
                        <hr class="my-0" />
                        <div>
                            {{$posts->links()}}
                        </div>
                    </nav>
                </div>
                
                
                
                
                <!-- Side widgets-->
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-header">Categories</div>
                        <div class="card-body">
                            <div class="row">
                                @forelse( $categories as $category )
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="{{ route('categories.show', $category->slug) }}">{{$category->title}}</a></li>
                                    </ul>
                                </div>
                                @empty
                                 <div class="alert alert-success">
                                    there's  not find
                                 </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                        <!-- Side widget-->
                    <div class="card mb-4">
                        <div class="card-body">
                            <iframe src="http://binasriwijaya.ac.id/index.html" frameborder="0"></iframe>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">Side Widget</div>
                        <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
                        <P class="display-4 ml-3"></P>
                    </div>
                        <div class="card-body">
                            <div class="icon d-flex">
                                <a href="https://mail.google.com"><i class="fas fa-envelope-square"></i></a>
                                <a href="https://www.facebook.com/iiron23"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://api.whatsapp.com/send?phone=6289666035046&text=Halo%20Admin%20Saya%20Mau%20Order"><i class="fab fa-whatsapp-square"></i></a>
                                <a href=""><i  class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    <div class="card mb-4">
                        <div class="card-header"> 
                            <h5 class="font-weight-bolder"> Populer </h5>
                        </div>
                                @forelse( $populer as $post)
                                <div class="card-body ">
                                        <p class="font-weight-bolder"> {{$post->title}}</p>
                                        <div>
                                            <p> {{Str::limit($post->body, '150', '.')}} <a href="{{ route('posts.show', $post->slug)}}" class="p-0">Read more</a ></p>
                                        </div>
                                        <div class="small">
                                        Punished On {{$post->created_at->format('d M, Y')}}
                                        </div>
                                </div>
                                @empty
                                    <div class="alert-success my-3 mx-2">
                                        there's not find
                                    </div>
                                @endforelse
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p></div>
            <div class="container"><p class="m-0 text-center text-white">Sumatera selatan </p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>

@endsection
