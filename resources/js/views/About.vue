<template>
<div>
  <!-- Start about section -->
  <section class="about-section section-gap-full relative" id="about-section">
    <div class="container">
      <div class="row align-items-center justify-content-between">
        <div class="col-lg-6 col-md-6 about-left">
          <img class="img-fluid" :src="'../img/user2.png'">
        </div>
        <div class="col-lg-5 col-md-5 about-right">
          <h3>About Us</h3>
          <h1>All the Thinks you Need to know About Us</h1>
          <p>
            But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain
            was born and I will give you
            a complete account of the system, and expound the actual teachings of the great explorer of the
            truth,
            the master-builder of human happiness.
          </p>
          <a class="primary-btn" style="color:white;">Know More</a>
        </div>
      </div>
    </div>
    <div class="floating-shapes">
      <span data-parallax='{"x": 150, "y": -20, "rotateZ":500}'>
        <img :src="'../img/shape/fl-shape-1.png'" alt="">
      </span>
      <span data-parallax='{"x": 250, "y": 150, "rotateZ":500}'>
        <img :src="'../img/shape/fl-shape-2.png'" alt="">
      </span>
      <span data-parallax='{"x": -180, "y": 80, "rotateY":2000}'>
        <img :src="'../img/shape/fl-shape-3.png'" alt="">
      </span>
      <span data-parallax='{"x": -20, "y": 180}'>
        <img :src="'../img/shape/fl-shape-4.png'" alt="">
      </span>
      <span data-parallax='{"x": 300, "y": 70}'>
        <img :src="'../img/shape/fl-shape-5.png'" alt="">
      </span>
      <span data-parallax='{"x": 250, "y": 180, "rotateZ":1500}'>
        <img :src="'../img/shape/fl-shape-6.png'" alt="">
      </span>
      <span data-parallax='{"x": 180, "y": 10, "rotateZ":2000}'>
        <img :src="'../img/shape/fl-shape-7.png'" alt="">
      </span>
      <span data-parallax='{"x": 60, "y": -100}'>
        <img :src="'../img/shape/fl-shape-9.png'" alt="">
      </span>
      <span data-parallax='{"x": -30, "y": 150, "rotateZ":1500}'>
        <img :src="'../img/shape/fl-shape-10.png'" alt="">
      </span>
    </div>
  </section>
  <!-- End about section -->
  <!-- Start feature section -->
  <section class="feature-section section-gap-full" id="feature-section">
    <div class="container">
      <div class="row align-items-center feature-wrap">
        <div class="col-lg-4 header-left">
          <h1>
            An exceptionally unique experience to you
          </h1>
          <a class="primary-btn" style="color: white;">Know More
            <span class="ti-arrow-right"></span>
          </a>
        </div>
        <div class="col-lg-8">
          <div class="row features-wrap">
            <div class="col-md-6">
              <div class="single-feature relative">
                <div class="overlay overlay-bg"></div>
                <span class="ti-palette"></span>
                <h3>Awesome Design</h3>
                <p>
                  His many legs, pitifully thin compared with the size of the rest of him, waved
                  about helplessly as he looked.
                </p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="single-feature relative">
                <div class="overlay overlay-bg"></div>
                <span class="ti-heart"></span>
                <h3>Made With Love</h3>
                <p>
                  His many legs, pitifully thin compared with the size of the rest of him, waved
                  about helplessly as he looked.
                </p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="single-feature relative">
                <div class="overlay overlay-bg"></div>
                <span class="ti-loop"></span>
                <h3>Constant Update</h3>
                <p>
                  His many legs, pitifully thin compared with the size of the rest of him, waved
                  about helplessly as he looked.
                </p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="single-feature relative">
                <div class="overlay overlay-bg"></div>
                <span class="ti-headphone-alt"></span>
                <h3>Full Free Chat</h3>
                <p>
                  His many legs, pitifully thin compared with the size of the rest of him, waved
                  about helplessly as he looked.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End feature section -->


</div>
</template>
