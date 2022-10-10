<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Chickgo</title>
        <link href="favicon.png" rel="icon">
        
    <link href="landing/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="landing/vendor/aos/aos.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="landing/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

    <link href="boxicons/css/boxicons.min.css" rel="stylesheet">

    <link href="landing/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="landing/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="landing/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="landing/css/style.css" rel="stylesheet">

        <style>
            body {
                width: 100%;
                height: 100%;
                background-image: linear-gradient(45deg, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0.89) 100%), url('/img/background.jpg');
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-position: center;
                background-size: cover;
            }

            .card{
                background-color: rgba(0, 0, 0, 0.6);
                color:aliceblue;
                border-radius: 20px;
            }
        </style>
    </head>
    <body>
        <header id="header" class="fixed-top header-scrolled">
            <div class="container d-flex align-items-center">
                <a href="/dashboard" class="logo me-auto"><img src="img/chickgo_horizontal.png" alt="" class="img-fluid" style="height:100%;"></a>        
                <nav id="navbar" class="navbar">
                    <ul>
                        <a class="getstarted scrollto" href="/logout">Logout</a>
                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav>
            </div>
        </header>

        <div class="container" style="margin-top: 100px;">
            <div class="row">
                <div class="col-xl-3 mb-3">
                    <div class="card">
                        <div class="card-body">
                            NH3 : <p id="nh3" style="display: inline">{{$nh3}}</p> ppm
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 mb-3">
                    <div class="card">
                        <div class="card-body">
                            H2S : <p id="h2s" style="display: inline">{{$h2s}}</p> ppm
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 mb-3">
                    <div class="card">
                        <div class="card-body">
                            Temperature : <p id="suhu" style="display: inline">{{$suhu}}</p> °C
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 mb-3">
                    <div class="card">
                        <div class="card-body">
                            Humidity : <p id="kelembapan" style="display: inline">{{$kelembapan}}</p> %
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-3">
            <div class="card p-3">
                <div class="row">
                    <div class="col">
                        <h4>Feeding Schedule</h4>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Schedule</button>
                    </div>
                </div>
                <table class="table mt-3" style="color: aliceblue;">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Time</th>
                        <th scope="col">Volume</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($jadwalPakans as $jadwalPakan)
                            <tr>
                                <th>{{$loop->index+1}}</th>
                                <td>{{$jadwalPakan->time}}</td>
                                <td>{{$jadwalPakan->volume}}</td>
                                <form method="POST" action="/deleteSchedule">@csrf
                                    <input type="hidden" name="id" value="{{$jadwalPakan->id}}">
                                    <td><button type="submit" style="background: none; padding:none; border:none; font-size:25px; color:aliceblue;"><i class='bx bx-trash'></i></button></td>
                                </form>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>


        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <form method="POST" action="/addSchedule">@csrf
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Schedule</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Time</label>
                            <input type="time" name="time" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Volume</label>
                            <input type="number" name="volume" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
              </div>
            </div>
          </div>




        <script src="landing/vendor/aos/aos.js"></script>
        <script src="landing/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="landing/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="landing/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="landing/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="landing/vendor/waypoints/noframework.waypoints.js"></script>
        <script src="landing/vendor/php-email-form/validate.js"></script>
        <script type="text/javascript">
            let nowLength = 0;
            let lastLength = 0;
			function AjaxFunction(){
				var httpxml = new XMLHttpRequest();
				function stateck() {
					if(httpxml.readyState == 4){
                        var response = JSON.parse(httpxml.responseText);
                        document.getElementById("nh3").innerHTML=response['latest']['nh3'];
                        document.getElementById("h2s").innerHTML=response['latest']['h2s'];
                        document.getElementById("suhu").innerHTML=response['latest']['temp'];
                        document.getElementById("kelembapan").innerHTML=response['latest']['humidity'];                        
					}
				}
				httpxml.onreadystatechange = stateck;
				httpxml.open("GET", "api", true);
				httpxml.send(null);
			}

			setInterval(function() {
				AjaxFunction();
			}, 100);
	    </script>

        <script type="text/javascript">
            (function() {
            "use strict";
            const select = (el, all = false) => {
                el = el.trim()
                if (all) {
                return [...document.querySelectorAll(el)]
                } else {
                return document.querySelector(el)
                }
            }
            const on = (type, el, listener, all = false) => {
                let selectEl = select(el, all)
                if (selectEl) {
                if (all) {
                    selectEl.forEach(e => e.addEventListener(type, listener))
                } else {
                    selectEl.addEventListener(type, listener)
                }
                }
            }
            on('click', '.mobile-nav-toggle', function(e) {
                select('#navbar').classList.toggle('navbar-mobile')
                this.classList.toggle('bi-list')
                this.classList.toggle('bi-x')
            })
            on('click', '.navbar .dropdown > a', function(e) {
                if (select('#navbar').classList.contains('navbar-mobile')) {
                e.preventDefault()
                this.nextElementSibling.classList.toggle('dropdown-active')
                }
            }, true)
            })()
        </script>
    </body>
</html>