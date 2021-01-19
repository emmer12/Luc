@extends('layouts.app')

@section('content')
  <!--==========================
      Intro Section
      ============================-->
  <section id="intro" class="wow fadeIn">
      <div class="intro-content">
          <div class="row">
              <div class="col-md-7 col-lg-7 text-left">
                  <div class="intro-main-text-left" style="width:100%">
                      <h2>Here You Can:</h2>
                      <ul class="custom-main-list">
                          <li><i class="ion-android-checkmark-circle"></i> Update Your Information</li>
                          <li><i class="ion-android-checkmark-circle"></i> View Your Bills</li>
                          <li><i class="ion-android-checkmark-circle"></i> Pay Online or at Bank</li>
                          <li><i class="ion-android-checkmark-circle"></i> Download Your Receipt</li>
                      </ul>
                  </div>
              </div>
              <div class="col-md-5 col-lg-5">
                  <div class="intro-main-text-right" style="margin-top:20px; text-align:left">
                  <a href="{{route('map.view')}}" class="btn-projects main-start-here"><i
                              class="fa fa-angle-double-right"></i>Start Here</a>
                      <div class="intro-main-help">
                          <div class="row">
                              <div class="col-md-2 hidden-xs">
                                  <i class="fa fa-question-circle"></i>
                              </div>
                              <div class="col-md-10">
                              Don't Know Your Property ID ? <br> <a href="{{route('guidelines.view')}}"> Search Here</a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div id="intro-carousel" class="owl-carousel">
          <div class="item" style="background-image: url('/extranet/img/1.jpg');"></div>
          <!--
             <div class="item" style="background-image: url('/assets/extranet/img/2.jpg');"></div>-->
      </div>
  </section>
  <!-- #intro -->
  <main id="main">
      <!--==========================
         Services Section
         ============================-->
      <section id="services">
          <div class="container">
              <div class="section-header d-none">
                  <h2>Services</h2>
                  <p>Welcome to the official portal of Enugu State Property and Land Use Charge. Sed tamen tempor magna
                      labore dolore dolor sint tempor duis magna elit veniam aliqua esse amet veniam enim export quid quid
                      veniam aliqua eram noster malis nulla duis fugiat culpa esse aute nulla ipsum velit export irure
                      minim illum fore</p>
              </div>
              <div class="row">
                  <div class="col-lg-6">
                      <div class="box wow fadeInLeft">
                          <div class="icon"><i class="fa fa-map-marker"></i></div>
                          <h4 class="title"><a href="property/apply.html">Pin Your PID</a></h4>
                          <p class="description">Have you forgotten your Property ID or you want to pin your property identification number</p>
                          <p class="text-right mob-center"><a class="btn btn-success action-button-blue"
                                                              href="/register">Pin Property ID</a></p>
                          <!--<span class="pull-right hidden-xs"><i class="fa fa-angle-right"></i>-->
                      </div>
                  </div>
                  <div class="col-lg-6">
                      <div class="box wow fadeInRight">
                          <div class="icon"><i class="fa fa-question"></i></div>
                          <h4 class="title"><a href="login.html">Guide lines of the Website</a></h4>
                          <p class="description">are you new to; click the next button to see the guidlines for the website</p>
                          <p class="text-right mob-center"><a class="btn btn-success action-button-blue" href="{{route('guidelines.view')}}">Guidelines</a></p>
                      </div>
                  </div>


              </div>
          </div>
      </section>
      <!-- #services -->


@endsection
