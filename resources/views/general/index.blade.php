@extends('layouts.general.layouts_general')
@section('title','GU ELECTION | Index')
@section('content')
<section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        <ol id="hero-carousel-indicators" class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <div class="carousel-item active" style="background-image: url('assets/img/index-page-1.jpg')">
            <div class="carousel-container">
              <div class="container">
                {{-- <h2 class="animate__animated animate__fadeInDown">Gu Student Election Portal</h2> --}}
                <p class="animate__animated animate__fadeInUp">Online Student Election protal for General Election</p>
                <a href="{{url('/login')}}" class="btn-get-started scrollto animate__animated animate__fadeInUp">Cast you vote</a>
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url('assets/img/index-page-1.jpg')">
            <div class="carousel-container">
              <div class="container">
                {{-- <h2 class="animate__animated animate__fadeInDown">Gu Student Election Portal</h2> --}}
                <p class="animate__animated animate__fadeInUp">Online Student Election protal for General Election</p>
                <a href="{{url('/login')}}" class="btn-get-started scrollto animate__animated animate__fadeInUp">Cast you vote</a>
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url('assets/img/index-page-1.jpg')">
            <div class="carousel-container">
              <div class="container">
                {{-- <h2 class="animate__animated animate__fadeInDown">Gu Student Election Portal</h2> --}}
                <p class="animate__animated animate__fadeInUp">Online Student Election protal for General Election</p>
                <a href="{{url('/login')}}" class="btn-get-started scrollto animate__animated animate__fadeInUp">Cast you vote</a>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
</section>
<!-- ======= About Section ======= -->
    <div id="about" class="about-area area-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>About GU Election</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- single-well start-->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="well-left">
              <div class="single-well">
                <a href="#">
                  <img src="{{asset('assets/img/index-page-1.jpg')}}" alt="">
                </a>
              </div>
            </div>
          </div>
          <!-- single-well end-->
          {{-- <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="well-middle">
              <div class="single-well">
                <a href="#">
                  <h4 class="sec-head">project Maintenance</h4>
                </a>
                <p>
                  Redug Lagre dolor sit amet, consectetur adipisicing elit. Itaque quas officiis iure aspernatur sit adipisci quaerat unde at nequeRedug Lagre dolor sit amet, consectetur adipisicing elit. Itaque quas officiis iure
                </p>
                <ul>
                  <li>
                    <i class="bi bi-check"></i> Interior design Package
                  </li>
                  <li>
                    <i class="bi bi-check"></i> Building House
                  </li>
                  <li>
                    <i class="bi bi-check"></i> Reparing of Residentail Roof
                  </li>
                  <li>
                    <i class="bi bi-check"></i> Renovaion of Commercial Office
                  </li>
                  <li>
                    <i class="bi bi-check"></i> Make Quality Products
                  </li>
                </ul>
              </div>
            </div>
          </div> --}}
          <!-- End col-->
        </div>
      </div>
    </div><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <div id="services" class="services-area area-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline services-head text-center">
              <h2>Registration</h2>
            </div>
          </div>
        </div>
        {{-- @if(!isset($studentDetails)) --}}
          <div class="row text-center">
              <div class="col-md-4 offset-md-4">
                  <form method="POST" action="{{ url('/register/getStudentData') }}">
                      @csrf
                      <div class="row pt-3">
                          <div class="col-md-11">
                              <input type="text" name="registration_id" placeholder="Enter Registration Number" class="form-control">
                          </div>
                          <div class="col-md-1">
                              <input type="submit" class="btn btn-sm btn-outline-success" value="Search">
                          </div>
                      </div>    
                  </form> 
              </div>
          </div>
        {{-- @elseif(isset($studentDetails))
          <div class="row text-center">
            <div class="col-md-6 offset-md-3">
                <div class="row">
                  <div class="col-md-6">
                    <div class="row">Name: {{$studentDetails->name}}</div>
                    <div class="row">Mobile: {{$studentDetails->mobile}}</div>
                    <div class="row">DOB: {{$studentDetails->dob}}</div>
                    <div class="row">Password: <input type="password" name="password" id="password"/></div>
                    <div class="row">Confirm Password: <input type="text" name="confirm-password" id="confirmPassword"></div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">Registration Number: {{$studentDetails->registration_id}}</div>
                    <div class="row">Email: {{$studentDetails->email}}</div>
                    <div class="row">Gender: {{$studentDetails->gender_name}}</div>
                    <div class="row"><input type="submit" name="submit" class="btn btn-success" value="Register"></div>
                  </div>
                </div>
            </div>
          </div>
        @endif --}}
      </div>
    </div><!-- End Services Section -->


    <!-- ======= Rviews Section ======= -->
    <div class="reviews-area">
      <div class="row g-0">
        <div class="col-lg-6">
          <img src="assets/img/about/2.jpg" alt="" class="img-fluid">
        </div>
        <div class="col-lg-6 work-right-text d-flex align-items-center">
          <div class="px-5 py-5 py-lg-0">
            <h2>contact us</h2>
            <h4>Incase of any query or complans contact us.</h4>
            <a href="#contact" class="ready-btn scrollto">Contact us</a>
          </div>
        </div>
      </div>
    </div><!-- End Rviews Section -->

    <!-- ======= Portfolio Section ======= -->
    <div id="candidates" class="portfolio-area area-padding fix">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Our Candidates</h2>
            </div>
          </div>
        </div>
        <div class="row wesome-project-1 fix">
          <!-- Start Portfolio -page -->
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-card">Card</li>
              <li data-filter=".filter-web">Web</li>
            </ul>
          </div>
        </div>

        <div class="row awesome-project-content portfolio-container">

          <!-- portfolio-item start -->
          <div class="col-md-4 col-sm-4 col-xs-12 portfolio-item filter-app portfolio-item">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="assets/img/portfolio/1.jpg" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="portfolio-lightbox" data-gallery="myGallery" href="assets/img/portfolio/1.jpg">
                      <h4>Business City</h4>
                      <span>Web Development</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- portfolio-item end -->

          <!-- portfolio-item start -->
          <div class="col-md-4 col-sm-4 col-xs-12 portfolio-item filter-web">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="assets/img/portfolio/2.jpg" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="portfolio-lightbox" data-gallery="myGallery" href="assets/img/portfolio/2.jpg">
                      <h4>Blue Sea</h4>
                      <span>Photosho</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- portfolio-item end -->

          <!-- portfolio-item start -->
          <div class="col-md-4 col-sm-4 col-xs-12 portfolio-item filter-card">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="assets/img/portfolio/3.jpg" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="portfolio-lightbox" data-gallery="myGallery" href="assets/img/portfolio/3.jpg">
                      <h4>Beautiful Nature</h4>
                      <span>Web Design</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- portfolio-item end -->

          <!-- portfolio-item start -->
          <div class="col-md-4 col-sm-4 col-xs-12 portfolio-item filter-web">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="assets/img/portfolio/4.jpg" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="portfolio-lightbox" data-gallery="myGallery" href="assets/img/portfolio/4.jpg">
                      <h4>Creative Team</h4>
                      <span>Web design</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- portfolio-item end -->

          <!-- portfolio-item start -->
          <div class="col-md-4 col-sm-4 col-xs-12 portfolio-item filter-app">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="assets/img/portfolio/5.jpg" alt="" /></a>
                <div class="add-actions text-center text-center">
                  <div class="project-dec">
                    <a class="portfolio-lightbox" data-gallery="myGallery" href="assets/img/portfolio/5.jpg">
                      <h4>Beautiful Flower</h4>
                      <span>Web Development</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- portfolio-item end -->

          <!-- portfolio-item start -->
          <div class="col-md-4 col-sm-4 col-xs-12 portfolio-item filter-web">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="assets/img/portfolio/6.jpg" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="portfolio-lightbox" data-gallery="myGallery" href="assets/img/portfolio/6.jpg">
                      <h4>Night Hill</h4>
                      <span>Photoshop</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- portfolio-item end -->

        </div>
      </div>
    </div><!-- End Portfolio Section -->

    <!-- ======= Contact Section ======= -->
    <div id="contact" class="contact-area">
      <div class="contact-inner area-padding">
        <div class="contact-overly"></div>
        <div class="container ">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="section-headline text-center">
                <h2>Contact us</h2>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- Start contact icon column -->
            <div class="col-md-4">
              <div class="contact-icon text-center">
                <div class="single-icon">
                  <i class="bi bi-phone"></i>
                  <p>
                    Call: <br>
                    <span>Monday-Friday (9am-5pm)</span>
                  </p>
                </div>
              </div>
            </div>
            <!-- Start contact icon column -->
            <div class="col-md-4">
              <div class="contact-icon text-center">
                <div class="single-icon">
                  <i class="bi bi-envelope"></i>
                  <p>
                    Email: info@example.com<br>
                    <span>Web: https://gauhati.ac.in/</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="contact-icon text-center">
                <div class="single-icon">
                  <i class="bi bi-geo-alt"></i>
                  <p>
                    Location: Jalukbari<br>
                    <span>Guwahati</span>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">

            <!-- Start Google Map -->
            <div class="col-md-6">
              <!-- Start Map -->
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d913580.800571676!2d90.899890702922!3d26.562706673615825!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x375a44c762f12a67%3A0x95386a0503457611!2sGauhati%20University!5e0!3m2!1sen!2sin!4v1664610204508!5m2!1sen!2sin" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
              <!-- End Map -->
            </div>
            <!-- End Google Map -->
            
            <!-- Start  contact -->
            <div class="col-md-6">
              <div class="form contact-form">
                <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                  <div class="form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                  </div>
                  <div class="form-group mt-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                  </div>
                  <div class="form-group mt-3">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                  </div>
                  <div class="form-group mt-3">
                    <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                  </div>
                  <div class="my-3">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your message has been sent. Thank you!</div>
                  </div>
                  <div class="text-center"><button type="submit">Send Message</button></div>
                </form>
              </div>
            </div>
            <!-- End Left contact -->
          </div>
        </div>
      </div>
    </div><!-- End Contact Section -->
@endsection
@section('js_content')
<script type="text/javascript">

</script>
@endsection