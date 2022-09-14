<html>
    <head>
        <title>Kyojin Wiki</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="{{ asset('wikiHome.css') }}">
    </head>
<body>
  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container">
        <a class="navbar-brand navbar-expand-lg" href="#">Attack on Titan</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
     <!-- END NAVBAR -->

     {{-- NEW IDENTY --}}
<section id="Home">
    <div class="mt-3 ms-5"><img class="ms-5" src="https://i.imgflip.com/6592dd.png" width="200"></div>
    <hr class="col-12">
        <div class="container d-flex flex-row justify-content-between">
            <div class="col-6">
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Perferendis praesentium excepturi dignissimos optio vel, a explicabo ducimus omnis itaque in eum provident asperiores, corporis dolorem nisi laborum sapiente eveniet dolore. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ex cupiditate aliquam ipsam debitis. Aperiam deleniti, iste vero quos ea quisquam ex dolores iusto esse totam maiores numquam omnis reiciendis culpa! Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis animi possimus culpa molestias corporis tenetur placeat ducimus impedit doloribus voluptates nisi, ut laboriosam rerum quos mollitia nemo sit consequuntur? Deleniti?
                </p>

                <p>
                   Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquam saepe molestias facilis illum, veritatis ut, culpa dicta dolorum necessitatibus repellendus esse nostrum quos nam fugit distinctio officiis. Sunt, deleniti ea! Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias nobis velit culpa pariatur rem! Ipsum sapiente rerum sed quaerat culpa expedita et ipsam a assumenda autem! Eius numquam quo aliquid. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto ea ratione natus quo qui sunt
                </p>

                <p>
                   Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa expedita eius, dolor eum voluptate aperiam fuga consequuntur vel id fugit vitae magni, laudantium, nulla rerum vero nihil corporis labore quam. Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                </p>
            </div>

            {{-- CARD INFORMATION --}}
              <div class="d-flex justify-content-end">
                  <div class="card card-dark" style="width: 22rem;"> 
                        <div class="card-header text-center text-bg-dark">
                          <strong class="identyHead"><i> Attack on Titan</i></strong>
                      </div>
                      <div class="card-header text-center">
                                <div class="flex-inline container" name="headCard">
                                    <em style="font-size: 110%;">{{ $news->article }}</em>
                              </div>
                        </div>
                      <div class="card-body">
                        <!-- IMAGE -->
                          <div class="row justify-content-center">
                              <img src="{{ $news->image }}" class="identyImg " width="100">

                              <div class="col-fill identyDescription"><p>
                                Cover art of the first Blu-ray volume
                              </p></div>
                        <!-- END IMAGE -->
                      </div>
                              
                      <!-- GENRE -->
                      <div class="card-body">
                              <div class="row">
                                  <strong class="col" style="font-size: small"> Genre </strong>

                                  <p class="col" style="font-size: small">
                                      Action <br>
                                      Dark Fantasy <br>
                                      Post Apocalyptic
                                  </p>
                              </div>
                      <!-- END GENRE -->

                      <!-- COUNTRY OF ORIGIN -->
                      <div class="row">
                        <strong class="col" style="font-size: small">Country of origin</strong>
                        <p class="col" style="font-size: small"> Japan </p>
                      </div>
                      <!-- END COUNTRY OF ORIGIN -->

                      <!-- NO OF EPISODES -->
                      <div class="row">
                        <strong class="col" style="font-size: small"> No. of episodes</strong>
                        <p class="col" style="font-size: small">This series information is still in development...</p>
                      </div>
                      <!-- END NO OF EPISODES -->
                      </div>
                  </div>
                </div>
            </div>
          </div>
          {{-- END CARD INFORMATION --}}
</section>
{{-- END NEW IDENTY --}}

</body>
</html>