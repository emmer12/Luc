@extends('layouts.app')

@section('content')
<style>
    .info-dispaly{
        position: relative;
        background: oldlace;
        margin:10px;
        box-shadow: 2px 2px 3px #ddd;
        left:50%;
        transform:translateX(-50% );
        padding: 0px;
    }
    .info-dispaly .header{
        background: white;
        padding: 10px;
    }
    .info-dispaly ul li{
        background: white;
        padding: 10px;
        border-left:2px solid green;
        list-style: none
    }
    .info-dispaly ul li strong{
        font-weight: 700;
        font-size: 18px;
        color:darkgreen;
        padding: 5px;
    }
    .info-dispaly ul li b{
        font-weight: 700;
        padding: 10px;

    }
</style>
<div class="container">
    <br>
    <div class="row">
        <div class="col-md-6">
                <h4 style="padding:10px;font-weight:bolder" class="wow fadeIn">You are welcome {{  Auth::guard('residential')->user()->firstname }} </h4>
        </div>
        <div class="col-md-6">
            @if (Auth::guard('residential')->user()->payment==true)
            <div class="alert alert-success">Payment has been made On this application</div>
                @else
            <div class="alert alert-danger">Payment has not been made On this application</div>
            <form >
                <button type="button" class="btn btn-success" onclick="makePayment()"> Pay Now </button>
            </form>

            @endif
        </div>
    </div>
    <div class="row">
        @php
            $data=Auth::guard('residential')->user();
        @endphp
        <div class="col-md-6 info-dispaly">
            <div class="">
                <h4 class="header">Property Infromation</h4>
                 <ul>
                    <li>
                        <strong>Property Id</strong><br>
                        <b>{{$data->property_id}}</b>
                    </li> <hr>
                    <li>
                        <strong>Charge</strong><br>
                    <b>&#x20A6;{{number_format($data->charge)}}</b>
                    </li>
                    <hr>
                    <li>
                        <strong>Property Address</strong><br>
                        <b>{{$data->address}}</b>
                    </li>
                    <hr>
                    <li>
                        <strong>Property Title</strong><br>
                        <b>{{$data->property_title}}</b>
                    </li>
                    <hr>
                    <li>
                        <strong>Type Of Occupancy</strong><br>
                        <b>{{$data->type_of_o}}</b>
                    </li>
                    <hr>
                    <br>
                    <h4 class="header">User Information</h4>
                    <li>
                        <strong>Firstname</strong><br>
                        <b>{{$data->firstname}}</b>
                    </li>
                    <hr>
                    <li>
                        <strong>Surname</strong><br>
                        <b>{{$data->surname}}</b>
                    </li>
                    <hr>
                    <li>
                        <strong>Middle name</strong><br>
                        <b>{{$data->middlename}}</b>
                    </li>
                    <hr>
                    <li>
                        <strong>Date of Birth</strong><br>
                        <b>{{$data->date_o_b}}</b>
                    </li>
                    <hr>
                    <li>
                        <strong>Occupation</strong><br>
                        <b>{{$data->occupation}}</b>
                    </li>
                    <hr>
                    <li>
                        <strong>Email Address</strong><br>
                        <b>{{$data->email}}</b>
                    </li>
                    <hr>
                    <li>
                        <strong>Phone Number</strong><br>
                        <b>{{$data->phone_number}}</b>
                    </li>
                    <hr>

                    <li>
                        <strong>Property status</strong><br>
                        @if ($data->payment==true)
                          <div class="alert alert-success">Payment has been made On this application</div>
                           @else
                          <div class="alert alert-danger">Payment has not been made On this application</div>
                          <form >
                              <button type="button" class="btn btn-success" onclick="makePayment()"> Pay Now </button>
                            </form>

                            @endif
                        </li>
                        <hr>


                    </ul>
                </div>
            </div>
        </div>
        {{-- <h1>Yiou are welcome to your dashboard {{ Auth::guard('residential')->user()->id }}</h1> --}}
    </div>



    <script src="http://www.remitademo.net/payment/v1/remita-pay-inline.bundle.js"></script>
    <script>
        function makePayment() {
            var paymentEngine = RmPaymentEngine.init({
                    key: 'dGFpd29lbW1hbnVlbDAwMTFAZ21haWwuY29tfDQyNDg0NzQyfDQ3YzlhN2JhN2Q5NTViYTM0MjFlNmMyNTRjZTkzYjRlMmE1Mjc1ZWUxMGEzYTIzMzE3ZDk1OGI2YTY2MzEyYjYxNjM2Y2M1ZDM1MzI1OWYyMDU3NmIwZjA3NDliYWM5MTJlNjBhYTNlNTJhOWE1ODA2YzdmZjAzNzM2NjAxYTVk',
                     customerId: "{{$data->property_id}}",
                     firstName: "{{$data->firstname}}",
                     lastName: "{{$data->surname}}",
                     email: "{{$data->email}}",
                     narration: "Land Use Charge",
                     amount: 7000,
                     onSuccess: function (response) {
                        $.ajax({
                         method:"POST",
                         url:"/payment",
                         data:{payment:true,type:'residential','property_id':{{$data->property_id}} },
                         success:function(data){
                             if (data.success) {
                                 Window.location.href={{ route("payment.invoice",$data->property_id) }};
                             }
                         }
                     })
                     console.log('callback Successful Response', response);
                     },
                     onError: function (response) {
                     console.log('callback Error Response', response);
                     },
                     onClose: function () {
                     console.log("closed");
                     }
                     });
                     paymentEngine.showPaymentWidget();
                   }
               </script>


@endsection
