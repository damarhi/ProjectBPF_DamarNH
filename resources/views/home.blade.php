@extends('layouts.app_home')
@section('content')
<main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section light-background">

        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
                    <h1>Welcome to <span>BizLand</span></h1>
                    <p>We are team of talented designers making websites with Bootstrap</p>
                    <div class="d-flex">
                        <a href="#about" class="btn-get-started">Get Started</a>

                    </div>
                </div>
            </div>
        </div>

    </section><!-- /Hero Section -->

    <!-- Featured Services Section -->
    <!-- About Section -->
    <section id="about" class="about section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>About</h2>
            <p><span>Find Out More</span> <span class="description-title">About Us</span></p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-3">

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <img src="/BizLand/assets/img/about.jpg" alt="" class="img-fluid">
                </div>

                <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="about-content ps-0 ps-lg-3">
                        <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
                        <p class="fst-italic">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore
                            magna aliqua.
                        </p>
                        <ul>
                            <li>
                                <i class="bi bi-diagram-3"></i>
                                <div>
                                    <h4>Ullamco laboris nisi ut aliquip consequat</h4>
                                    <p>Magni facilis facilis repellendus cum excepturi quaerat praesentium libre trade
                                    </p>
                                </div>
                            </li>
                            <li>
                                <i class="bi bi-fullscreen-exit"></i>
                                <div>
                                    <h4>Magnam soluta odio exercitationem reprehenderi</h4>
                                    <p>Quo totam dolorum at pariatur aut distinctio dolorum laudantium illo direna
                                        pasata redi</p>
                                </div>
                            </li>
                        </ul>
                        <p>
                            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                            reprehenderit in voluptate
                            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in
                            culpa qui officia deserunt mollit anim id est laborum
                        </p>
                    </div>

                </div>
            </div>

        </div>

    </section><!-- /About Section -->
    <!-- Services Section -->
    <section id="services" class="services section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Services</h2>
            <p><span>Check Our</span> <span class="description-title">Services</span></p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item position-relative">
                        <span class="advanced">Advanced</span>
                        <h3>Ultimate</h3>
                        <h4><sup>$</sup>49<span> / month</span></h4>
                        <ul>
                            <li>Aida dere</li>
                            <li>Nec feugiat nisl</li>
                            <li>Nulla at volutpat dola</li>
                            <li>Pharetra massa</li>
                            <li>Massa ultricies mi</li>
                        </ul>
                        <div class="btn-wrap">
                            <a href="#" class="btn btn-info btn-sm">Buy Now</a>
                        </div>
                    </div>
                </div><!-- End Service Item -->


            </div>

        </div>

    </section><!-- /Services Section -->
    <!-- Contact Section -->
    <section id="contact" class="contact section">

        <!-- Section Title -->

    </section><!-- /Contact Section -->

</main>

<footer id="footer" class="footer">

    <div class="footer-newsletter">
        <div class="container">
            <div class="container section-title" data-aos="fade-up">
                <h2>Contact</h2>
                <p><span>Need Help?</span> <span class="description-title">Contact Us</span></p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-5">

                        <div class="info-wrap">
                            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                                <i class="bi bi-geo-alt flex-shrink-0"></i>
                                <div>
                                    <h3>Address</h3>
                                    <p>A108 Adam Street, New York, NY 535022</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                                <i class="bi bi-telephone flex-shrink-0"></i>
                                <div>
                                    <h3>Call Us</h3>
                                    <p>+1 5589 55488 55</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                                <i class="bi bi-envelope flex-shrink-0"></i>
                                <div>
                                    <h3>Email Us</h3>
                                    <p>info@example.com</p>
                                </div>
                            </div><!-- End Info Item -->

                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus"
                                frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen=""
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
                            data-aos-delay="200">
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <label for="name-field" class="pb-2">Your Name</label>
                                    <input type="text" name="name" id="name-field" class="form-control"
                                        required="">
                                </div>

                                <div class="col-md-6">
                                    <label for="email-field" class="pb-2">Your Email</label>
                                    <input type="email" class="form-control" name="email" id="email-field"
                                        required="">
                                </div>

                                <div class="col-md-12">
                                    <label for="subject-field" class="pb-2">Subject</label>
                                    <input type="text" class="form-control" name="subject" id="subject-field"
                                        required="">
                                </div>

                                <div class="col-md-12">
                                    <label for="message-field" class="pb-2">Message</label>
                                    <textarea class="form-control" name="message" rows="10" id="message-field" required=""></textarea>
                                </div>

                                <div class="col-md-12 text-center">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>

                                    <button type="submit">Send Message</button>
                                </div>

                            </div>
                        </form>
                    </div><!-- End Contact Form -->

                </div>

            </div>

        </div>
    </div>

</footer>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
</div>
@endsection
