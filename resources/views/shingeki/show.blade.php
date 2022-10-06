<html>

<head>
  <title>AutumnNime</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="{{ asset('wikiHome.css') }}">
</head>

<body>
 <!-- NEW NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container">
        <a class="navbar-brand navbar-expand-lg" href="#">AutumnNime</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
        <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarSupportedContent">
            <div></div>
            <div><ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{url('attack#Home')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('attack#Synopsis')}}">Synopsis</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('attack#Series')}}">Series</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('attack#Character')}}">Character</a>
                </li>
            </ul></div>
        </div>
    </div>
</nav>
<!-- END NEW NAVBAR -->


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
            <td colspan="6">{{$episode->description}}</td>
          </tr>
        </a>
      @endforeach
    </x-adminlte-datatable>
<!-- END EPISODE TABLE -->
  <!-- Jangan ke bawahin -->



            <!-- END CONTENT AREA -->
        </div>
    </div>
</div>
<!-- END SIDE MENU -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
 
</body>

</html>