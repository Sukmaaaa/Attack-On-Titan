<html>
    <head>
        <title>Hello</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('mainPage.css') }}">


        <style>
            body{
                background-color: black;
            }

            .carousel-item{
                transition-duration:0.5s ;
            }

            div#social-links {
                margin: 0 auto;
                max-width: 500px;
            }
            div#social-links ul li {
                display: inline-block;
            }          
            div#social-links ul li a {
                padding: 20px;
                border: 1px solid #ccc;
                margin: 1px;
                font-size: 30px;
                color: #222;
                background-color: #ccc;
            }
        </style>
    </head>

<body>

<!-- NAVBAR1 -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container">
    <!-- SEARCH BAR -->
    <form class="d-flex in-line">
        <input class="form-control mt-2 btn-sm searchbar" id="searchBar" name="q" type="search" placeholder="Search..." aria-label="Search"  style="background-color: black; color:white">
      </form>

    <!-- END SEARCHBAR -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    </div>
</nav>
<!-- END NAVBAR1 -->

<!-- NAVBAR2 -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #2B4865;">
  <div class="container-fluid">
  <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarSupportedContent">
            <div></div>
            <div>
                <div style="font-weight: medium;">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#Home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#AnimeList">Anime List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#Genres">Genres</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#Character">Character</a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>
  </div>
</nav>
<!-- END NAVBAR2 -->

<!-- RATE -->
<div class="d-flex flex-row container">
    <!-- CAROUSEL -->
    <div id="carouselExampleCaptions" class="carousel slide mt-3 col-6" data-bs-ride="carousel" style="width: 600px; height:323px">
        <!-- INDICATOR -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <!-- CAROUSEL CONTENT -->
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="https://assets.pikiran-rakyat.com/crop/0x0:0x0/x/photo/2021/03/31/3506245394.jpg" class="d-block w-100" alt="..." style="border-radius:5px; height:323px; filter: blur(8px);
        -webkit-filter: blur(8px);">
            <div class="carousel-caption d-none d-md-block">
                <h5 style="justify-content: start;">Nanatsu no Taizai</h5>
                <p>Some representative placeholder content for the first slide.</p>
            </div>
            </div>
            <div class="carousel-item">
            <img src="https://cdn0-production-images-kly.akamaized.net/7FS1-KeOukYDVOP0dHrP60crEuk=/640x360/smart/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/3278875/original/079595800_1603728453-Anime-Demon-Slayer-Kimetsu-no-Yaiba.jpg" class="d-block w-100" alt="..." style="border-radius:5px; height:323px; filter: blur(8px);
        -webkit-filter: blur(8px);">
            <div class="carousel-caption d-none d-md-block">
                <h5>Kimetsu no Yaiba</h5>
                <p>Some representative placeholder content for the second slide.</p>
            </div>
            </div>
            <div class="carousel-item">
            <img src="https://img.okezone.com/content/2022/02/13/206/2546601/harap-sabar-jujutsu-kaisen-season-2-rilis-2023-GDCwqVExKM.jpg" class="d-block w-100" alt="..." style="border-radius:5px; height:323px; filter: blur(8px);
        -webkit-filter: blur(8px);">
            <div class="carousel-caption d-none d-md-block">
                <h5>Jujutsu Kaisen</h5>
                <p>Some representative placeholder content for the third slide.</p>
            </div>
            </div>
        </div>
    </div>
    <!-- END CAROUSEL -->
    
    <!-- TRENDING -->
    <div class="card text-white cardTrending mt-3 ms-3">
        <a href="#">
            <img src="https://animesonline.club/assets/imgs/serie/wotaku-ni-koi-wa-muzukashii_1608528811.jpg" class="card-img trending col-md-6"/>
        </a>
        <div class="card-img-overlay" style="margin: auto;">
            <h4 class="card-title text-center" style="margin: auto;">hehe</h4>
            <p class="card-text">aaa</p>
        </div>
    </div>

    <!-- <div class="card bg-dark text-white">
        <img src="https://animesonline.club/assets/imgs/serie/wotaku-ni-koi-wa-muzukashii_1608528811.jpg" class="card-img" alt="...">
        <div class="card-img-overlay">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text">Last updated 3 mins ago</p>
        </div>
    </div> -->
    <!-- END TRENDING -->
</div>
<!--END RATE -->

<!-- HOT SERIES UPDATE -->
<div class="container mt-4">
    <div class="card bg-dark" style="color:white;"> 
        <div class="card-header" style="background-color: #2B4865;">
            <strong class="identyHead"> Hot Series Update</strong>
        </div>
                   

        <div class="card-body card-outline">
           
                            
        </div>
    </div>
</div>
<!-- END HOT SERIES UPDATE -->

<!-- LATEST RELEASE UPDATE -->
<div class="container mt-4">
    <div class="card bg-dark" style="color:white;"> 
        <div class="card-header" style="background-color: #2B4865;">
            <strong class="identyHead">Latest Release</strong>
        </div>
                   

        <div class="card-body card-outline">
           
                            
        </div>
    </div>
</div>
<!-- LATESET RELEASE UPDATE -->

<!-- FOOTER1 -->
<nav class="navbar navbar-expand-lg navbar-dark mt-5" style="background-color: #2B4865;">
  <div class="container-fluid">
  <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarSupportedContent">
            <div></div>
            <div>
                <div style="font-weight: medium;">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <!-- <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#Home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#AnimeList">Anime List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#Genres">Genres</a>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#Character">Character</a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>
  </div>
</nav>
<!-- END ENDFOOTER1 -->

<!-- FOOTER2 -->
<div class="card bg-dark">
<div class="mt-4">{!! $shareComponent !!}</div> <br>
    <div class="container text-white d-flex justify-content-center">
        <div class="row">
            <div class="col text-center" style="font-size: medium">Copyright &#169; 2022 autumnNime. All Rights Reserved <br>
            <p class="">
            Disclaimer: This site autumnNime.test does not store any files on its server. All contents are provided by non-affiliated third parties.
            </p>
        </div>
        </div> <br>
        <div class="row" style="font-size: small">
            <div class="col">
                
            </div>
        </div>
    </div>
</div>

<!-- END FOOTER2 -->

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="jquery.min.js"></script>
    <script src="owlcarousel/owl.carousel.min.js"></script>
    <script>
        const searchBar = document.getElementById("searchBar");

        searchBar?.addEventListener("keyup", function(e) {
            let val = searchBar.value;
            let query = `?q=${val}`;

            const xhttp = new XMLHttpRequest();
            xhttp.responseType = "document";
            xhttp.onload = function(e) {
                let result = this.responseXML.getElementById("searchBar").innerHTML;
                return (searchBar.innerHTML = result);
            };
            xhttp.open("GET", query);
            xhttp.send();
        });
    </script>
</html>