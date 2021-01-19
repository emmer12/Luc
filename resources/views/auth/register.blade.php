@extends('layouts.app')

@section('content')
  {{-- <link href="{{asset('css/custom.css')}}" rel="stylesheet"> --}}
  {{-- <link href="{{asset("css/home.css")}}" rel="stylesheet"> --}}
  {{-- <link href="{{asset('css/print.css')}}" rel="stylesheet"> --}}
  <style>
    .residential-form{
      position: relative;
      border:2px solid #eee;
      padding: 20px;
      left:50%;
      transform: translateX(-50%);
    }
    .hide{
      /* display:none; */
    }

      .required:after {
          content: " *";
          color: #FF1A1A;
          font-size: 12px;
          font-weight: 400;
      }
      .website-wrapper label{
        font-size: 12px
      }
      .website-wrapper {
        background:white;
        padding: 10px;
        margin:20px;
        border: 1px solid grey;
      }
  		@media (max-width:764px) {
  		 .large-panel-white {
           background-color: #F5FAF5;
           border: 1px solid #007B21;
           *border-top: 0px solid #007B21;
           border-bottom: 1px solid #007B21;
           padding: 10px 30px;
  		 margin: 0px 0px;
           padding-bottom:30px;
  		}
  		.mob-left {
  		text-align:left !important;
  		}
  		.mob-center {
  		text-align: center !important;
  		}
  		.mob-mt-n10 {
  		margin-top: -10px;
  		}
  		.mob-mt-n15 {
  		margin-top: -15px;
  		}
          .page-instructions {
              margin:-18px 0px;
              margin-top: -36px;
          }
      }
      .nav-r{
        background: #3c4439;
        padding: 10px;
        color: white;
      }
      .nav-r li{
        list-style: none;
        display: inline;
        background: #007B21;
        line-height: 50px;
        margin-left: 10px;
        padding: 10px;
        border-left:2px solid #007B21;
        cursor: pointer;
        font-weight: 700;
        color: #ccc;
      }
      .nav-r .nav-active{
        color:white;
        border-bottom:4px solid white;
      }
      .tog:not(.residential-f){
        display: none
      }
      form.loading:before{
        height: 100%;
        width: 100%;
        top:0px;
        position: absolute;
        content: "";
        background: rgba(255, 255, 255, 0.8);
        z-index: 100;

      }
      form.loading:after{
        position: absolute;
        content: '';
        top: 50%;
        left: 50%;
        margin: -1.5em 0em 0em -1.5em;
        width: 3em;
        height: 3em;
        -webkit-animation: segment-spin 0.6s linear;
        animation: segment-spin 0.6s linear;
        -webkit-animation-iteration-count: infinite;
        animation-iteration-count: infinite;
        border-radius: 500rem;
        border-color: #767676 rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1);
        border-style: dotted;
        border-width: 0.2em;
        -webkit-box-shadow: 0px 0px 0px 1px transparent;
        box-shadow: 0px 0px 0px 1px transparent;
        visibility: visible;
        z-index: 101;
        
      }
      @-webkit-keyframes segment-spin {
        from {
          -webkit-transform: rotate(0deg);
          transform: rotate(0deg);
        }

        to {
          -webkit-transform: rotate(360deg);
          transform: rotate(360deg);
        }
      }

      @keyframes segment-spin {
        from {
          -webkit-transform: rotate(0deg);
          transform: rotate(0deg);
        }

        to {
          -webkit-transform: rotate(360deg);
          transform: rotate(360deg);
        }
}

  </style>
<br><br>

<style>
  
</style>

  <div class="container">
    {{-- Residential Form --}}
    <div class=" row">
      <div class="form residential-form col-md-7 col-md-offset-2">    
        <div class="nav-r">
          <ul>
            <li class="nav-active" data-nav="residential">Residential</li>
            <li data-nav="commercial"="">Commercial | Industial | Financial Institution</li>
          </ul>
        </div>
        <br>
        <div class="tog residential-f residential" >
          <h4>Residential Form</h4>
          @if (session('msg'))
            <div class="alert alert-danger">{{ session('msg') }}</div>
          @endif
          <div class="msg"></div>
          <br>
          <div class="page-instructions">
            Please fill the form below to request for property ID. Fields marked with an
            asterisk <span style="color:red; font-weight:800">*</span> are mandatory.
          </div><br>
          <form class="residental-submit" id="form-r" action="index.html" method="post">
            {{ csrf_field() }}
            <fieldset class="form-group">
             <label for="" class="required">Property Id</label>
               <select class="c-select form-control property_id" name="property_id">
                 <option selected>Property ID</option>
                 @foreach ($properties as $property)
               <option value="{{$property->property_id}}">{{$property->property_id}}</option>
                 @endforeach
               </select>
           </fieldset>
            <fieldset class="form-group">
              <label for="property_address" class="required">Property Address</label>
              <input type="text" class="form-control disabled"  required name="property_address" id="property_address" placeholder="Property address">
            </fieldset>
            
            <fieldset class="form-group">
              <label for="title" class="required">Title</label>
              <input type="text" name="title" class="form-control"  id="title" placeholder="Title">
            </fieldset>
            
            <fieldset class="form-group">
              <label for="date-o-b" class="required">Date of Birth</label>
              <input type="date" class="form-control" required id="date-o-b" placeholder="Date of Birth" name="date_o_b">
            </fieldset>
            
            <div class="row">
              <div class="col-md-4">
                <fieldset class="form-group">
                  <label for="surname" class="required">Surname</label>
                  <input type="text" class="form-control" required id="surname" placeholder="Surname" name="surname">
                  </fieldset>
                </div>
                <div class="col-md-4">
                  <fieldset class="form-group">
                    <label for="firstname" class="required">Firstname</label>
                    <input type="text" class="form-control" required id="firstname" placeholder="firstnaem" name="firstname">
                  </fieldset>
                </div>
                <div class="col-md-4">
                  <fieldset class="form-group">
                    <label for="middle_name" class="required">Middle Name</label>
                    <input type="text" class="form-control" required id="middle_name" placeholder="Middle Name" name="middle_name">
                  </fieldset>
                </div>
              </div>
              <div class="row">
                  <div class="col-md-6">
                    <fieldset class="form-group">
                      <label for="phone_number" class="required">Phone Number</label>
                      <input type="number" class="form-control" required id="phone_number" placeholder="Surname" name="phone_number">
                      </fieldset>
                    </div>
                    <div class="col-md-6">
                      <fieldset class="form-group">
                        <label for="email" class="required">Email</label>
                        <input type="email" class="form-control" required id="email" placeholder="firstnaem" name="email">
                      </fieldset>
                    </div>
                    
                  </div>
              <fieldset class="form-group">
                <label for="place_o_w">Place Of Work (Name and Address)</label>
                <input type="text" class="form-control" id="place_o_w" placeholder="Place of Work" name="place_o_w">
              </fieldset>
              <fieldset class="form-group">
                <label for="type_of-o" class="required">Type of Ownership</label>
                <input type="text" class="form-control" required id="type_of-o" placeholder="Type of Ownership" name="type_of_o">
              </fieldset>
              <fieldset class="form-group">
                  <label for="occupation" class="required">Occupation</label>
                  <input type="text" class="form-control" required id="occupation" placeholder="Occupation" name="occupation">
                </fieldset>
              <div class="row">
                <div class="col-md-6">
                    <fieldset class="form-group">
                      <label for="password" class="required">password</label>
                      <input type="password"  class="form-control" id="password" placeholder="*******" name="password">
                    </fieldset>
                  </div>
                  <div class="col-md-6">
                    <fieldset class="form-group">
                      <label for="c-password" class="required">Confirm Password</label>
                      <input type="password"  class="form-control" id="c-password" placeholder="*******" name="c_password">
                    </fieldset>
                  </div>
                </div>
                <label style="margin-left:20px" class="required" for="clerify" class="c-input c-checkbox">
                  <input type="checkbox" id="clerify" required name="clerify" class="">
                  <span class="c-indicator"></span>
                  I hereby cirtify
                </label>
                
                <div class="row">
                  <div class="col-md-12 text-right text-center mob-mt-n15 mob-left"><br>
                    <button class="btn btn-lpanel-green btn-md" type="submit">Register
                    </button>
                  </div>
                </div>
                <br><br>
                
                
              </form>
            </div>


            {{-- commercial form --}}

            <div class="tog commercial">
              <h4>Commercial | Industial | Financial Institution</h4>
              <div class="msg"></div>
              @if (session('msg'))
                <div class="alert alert-danger">{{ session('msg') }}</div>
              @endif
                <div class="page-instructions">
                  Please fill the form below to request for property ID. Fields marked with an
                  asterisk <span style="color:red; font-weight:800">*</span> are mandatory.
                </div><br>
                <form class="commercial-submit form-c" id="form-c" action="index.html" method="post">
                  {{ csrf_field() }}
                  <fieldset class="form-group">
                   <label for="" class="required">Property Id</label>
                     <select required class="c-select form-control" name='property_id'>
                        <option selected>Property ID</option>
                        @foreach ($properties as $property)
                      <option value="{{$property->property_id}}">{{$property->property_id}}</option>
                        @endforeach
                     </select>
                 </fieldset>
                  <fieldset class="form-group">
                    <label for="property_address" class="required">Property Address</label>
                    <input type="text" class="form-control" required id="property_address" name='property_address' placeholder="Another input">
                  </fieldset>
                  
                  <fieldset class="form-group">
                    <label for="name_of_org" class="required">Name of Organization</label>
                    <input type="text" class="form-control" required id="name_of_org" name="org_name" placeholder="Another input">
                  </fieldset>
                  
                  <fieldset class="form-group">
                    <label for="registration_no" class="required">Registration Number</label>
                    <input type="number" class="form-control" required id="registration_no" name="registration_no" placeholder="Another input">
                  </fieldset>
                  
                  <fieldset class="form-group">
                    <label for="contact_no" class="required">Contact Number</label>
                    <input type="text" class="form-control" required id="contact_no" name="contact_no" placeholder="Another input">
                  </fieldset>
                  
                  <fieldset class="form-group">
                      <label for="email" class="required">Email</label>
                      <input type="email" required class="form-control" id="email" name="email" placeholder="example@mail.com">
                    </fieldset>

                    <fieldset class="form-group">
                        <label for="use" class="required">Use of Property</label>
                          <select class="c-select form-control" required id="use" name="use">
                          <option selected>Use of Property</option>
                              @foreach ($lucs as $luc)
                                <option value="{{ $luc->landuse }}">{{$luc->landuse}}</option>
                              @endforeach
                          </select>
                      </fieldset>
                    <div class="row">
                      <div class="col-md-6">
                          <fieldset class="form-group">
                            <label class="required" for="password">password</label>
                            <input type="password" required class="form-control" name="password" id="password" placeholder="*******">
                          </fieldset>
                        </div>
                        <div class="col-md-6">
                          <fieldset class="form-group">
                            <label for="c_password" class="required">Confirm Password</label>
                            <input type="password" name="c_password" class="form-control" required id="c_password" placeholder="*******">
                          </fieldset>
                        </div>
                      </div>
                      <label style="margin-left:20px" class="c-input c-checkbox">
                        <input type="checkbox" class="clerify">
                        <span class="c-indicator"></span>
                        I hereby confirm that the details provided above are correct and true.
                      </label>
                      <div class="row">
                        <div class="col-md-12 text-right text-center mob-mt-n15 mob-left"><br>
                          <button class="btn btn-lpanel-green btn-md" type="submit">Register
                          </button>
                        </div>
                      </div>
                      <br><br>
                      
                      
                    </form>
                  </div>


                  
            </div>
            


    </div>
  </div>
  <br>
  <br>

@endsection
