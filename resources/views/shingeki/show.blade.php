<html>

<head>
  <title>Kyojin Wiki</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="{{ asset('wikiHome.css') }}">
</head>

<body>
  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container-fluid ms-3">
      <a class="navbar-brand navbar-expand-lg" href="#">Attack on Titan</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav>
  <!-- END NAVBAR -->

  
  <!-- SIDE MENU -->
    <div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-lg-2 px-sm-2 px-0 bg-dark fixed">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <!-- <a href="#" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Menu</span>
                </a> -->
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="{{route('attack.index')}}" class="nav-link align-middle px-0" style="color:white">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Main Page</span>
                        </a>
                    </li>
                    <li>
                        <!-- <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span> </a> -->
                        <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                            <!-- <li class="w-100">
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 1 </a>
                            </li> -->
                            <!-- <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 2 </a>
                            </li> -->
                        </ul>
                    </li>
                    <li>
                        <a href="{{ url('/attack#Series') }}" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline" style="color:white">Season</span></a>
                    </li>
                    <li>
                        <a href="{{ url('/attack#Character')}}" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                            <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline" style="color:white">Character</span></a>
                        <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 1</a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 2</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <!-- <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">Products</span> </a>
                            <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 1</a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 2</a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 3</a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 4</a>
                            </li>
                        </ul>
                    </li> -->
                    <!-- <li>
                        <a href="#" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Customers</span> </a>
                    </li> -->
                </ul>
                <hr>
                <!-- <div class="dropdown pb-4">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false"> -->
                        <!-- <img src="" alt="hugenerd" width="30" height="30" class="rounded-circle"> -->
                    <!-- </a>
                </div> -->
            </div>
        </div>
        <div class="col py-3">
            <!-- CONTENT AREA -->
            {{-- NEW IDENTY --}}
        <section id="Home">
          <div class="mt-3 ms-5"><img class="ms-5" src="https://i.imgflip.com/6592dd.png" width="200"></div>
            <hr class="col-12">
          <div class="container d-flex flex-row justify-content-between">

          <div class="col-6">
            <iframe class="d-flex" width="560" height="315" src="{{ $series->trailer }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"> 
            </iframe>
            <p class="mt-3">{{ $series->article }}</p>
          </div>
          <!-- END NEW IDENTY -->
          {{-- CARD INFORMATION --}}
      <div class="d-flex justify-content-end">
        <div class="card bg-dark" style="width: 22rem; color:white;">
            <div class="card-header card-dark text-center" style="background-color: #2B4865;">
              <strong class="identyHead"><i> Attack on Titan</i></strong>
            </div>
        
            <div class="card-header text-center">
              <div class="flex-inline container" name="headCard">
                <em style="font-size: 110%;">{{ $series->title }}</em>
              </div>
            </div>

            <div class="card-body">
              <!-- IMAGE -->
              <div class="row justify-content-center">
                <img src="{{ $series->cover }}" class="identyImg" width="100">
              </div>
              <!-- END IMAGE -->

            <!-- SEASON & NO EPISODES -->
            <div class="card-body">
              <div class="row text-center">
                <strong class="col" style="font-size: medium">Total Seasons</strong>
                <strong class="col" style="font-size: medium">Total Episodes </strong>
              </div>

              <div class="row text-center">
                <p class="col" style="font-size: small">{{ count($serieshehe) }}</p>
                <p class="col" style="font-size: small">{{ count($episodes) }}</p>
              </div>
              <!-- END SEASON & NO EPISODES -->

              <div class="text-center" style="background-color: #444C96; height: 30px; border-radius:5px">
                <strong style="font-size: medium;">Information</strong>
              </div>

              <!-- GENRE -->
              <div class="row justify-content-between mt-3">
                <strong class="col" style="font-size: small;"> Title </strong>
                <p class="col" style="font-size: small">Attack on Titan <br>
                                                        進撃の巨人 <br>
                                                        Shingeki no Kyojin
                </p>
              </div>

              <div class="row justify-content-between">
                <strong class="col" style="font-size: small"> Genre </strong>
                <div class="col" style="font-size: small;">
                  @foreach($genreName as $genre)
                    <p>{{$genre}}</p>
                  @endforeach
                </div>
            </div>
              <!-- END GENRE -->

              <!-- COUNTRY OF ORIGIN -->
              <div class="row">
                <strong class="col" style="font-size: small">Country of origin</strong>
                <p class="col" style="font-size: small"> {{ $series->countryOfOrigin }} </p>
              </div>
              <!-- END COUNTRY OF ORIGIN -->

              <!-- NO OF EPISODES -->
              <div class="row">
                <strong class="col" style="font-size: small"> No. of episodes</strong>
                <p class="col" style="font-size: small">{{ count($episodes) }}</p>
              </div>
              <!-- END NO OF EPISODES -->

              <!-- PREVIOUS & NEXT -->
              <div class="text-center" style="background-color: #444C96; height: 30px; border-radius:5px">
                <strong style="font-size: medium;">Season Chronology</strong>
              </div>
              
              @php
              $seasonNext = $series->id;
              $minId = '
              <div class="d-flex justify-content-end mt-3" style="font-size: small;">
                <a class="btn btn-primary btn-sm justify-content-end" href="'.URL::to( 'attack/' . $next ).'" role="button">Next</a>
              </div>
              ';
              $notMoreThanMax = '
              <div class="d-flex justify-content-between mt-3" style="font-size: small;">
                <a class="btn btn-primary btn-sm" href="'.URL::to( 'attack/' . $previous ).'" role="button">Previous</a>
                <a class="btn btn-primary btn-sm" href="'.URL::to( 'attack/' . $next ).'" role="button">Next</a>
              </div>
              ';
              $maxId = '
              <div class="d-flex justify-content-start mt-3" style="font-size: small;">
                <a class="btn btn-primary btn-sm justify-content-start" href="'.URL::to( 'attack/' . $previous ).'" role="button">Previous</a>
              </div>
              ';


              if($seasonNext == $series->min('id')){
                echo $minId;
              } else if($seasonNext < $series->max('id')){
                echo $notMoreThanMax;
              } else{
                echo $maxId;
              }
              @endphp
                 
                     <!-- END PREVIOUS & NEXT -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  {{-- END CARD INFORMATION --}}
  <!-- EPISODE TABLE -->
  @php
        
        $heads = [['label' => 'No.', 'width' => 5], 'Title Card', "Title", 'Directed by', 'Writen by', 'Original Air Date'];
        $i = 1;
        $newEpisodes = [];
        foreach ($episodes as $key => $value) {
          $episode = $Episode::find($value->episode_id);

          $newEpisodes[] = [$i++,  '<img width="75" src="'.$episode->titleCard.'">', $episode->title, $episode->directedBy, $episode->writenBy, $episode->originalAirDate];
        }
        //title card, episoe title
        $config = [
            'data' => $newEpisodes,
            'order' => [[1, 'asc']],
            'columns' => [null, null, ['orderable' => false]],
        ];
    @endphp

      <h2 class="container mt-5">Episodes List</h2>
      <x-adminlte-datatable with-buttons :config="$config" :heads="$heads" head-theme="dark" id="episodeTable"
                theme="dark" bordered beautify class="mt-3 container">
          @foreach ($config['data'] as $key => $row)
          <tr>
            @foreach ($row as $cell)
              <td style="background-color: #2C3333;"> {!! $cell !!}</td>
            @endforeach
          </tr>

          <tr>
            <td colspan="6">{{$episodes[$key]->description}}</td>
          </tr>
        </a>
      @endforeach
    </x-adminlte-datatable>
<!-- END EPISODE TABLE -->
  <!-- Jangan ke bawahin -->
</div>



            <!-- END CONTENT AREA -->
        </div>
    </div>
</div>
<!-- END SIDE MENU -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
 
</body>

</html>