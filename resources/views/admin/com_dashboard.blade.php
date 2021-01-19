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
                <h4 style="padding:10px;font-weight:bolder" class="wow fadeIn">You are welcome {{  Auth::guard('commercial')->user()->firstname }} </h4>
        </div>
        <div class="col-md-6">
            @if (Auth::guard('commercial')->user()->payment==true)
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
            $data=Auth::guard('commercial')->user();
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
                    <b>&#x20A6;{{number_format($data->charge()->charge)}}</b>
                    </li>
                    <hr>
                    <li>
                        <strong>Property Address</strong><br>
                        <b>{{$data->property_address}}</b>
                    </li>
                    <hr>

                    <h4 class="header">Organization Information</h4>
                    <li>
                        <strong>Organization name</strong><br>
                        <b>{{$data->org_name}}</b>
                    </li>
                    <hr>
                    <li>
                        <strong>Registration Number</strong><br>
                        <b>{{$data->registration_no}}</b>
                    </li>
                    <hr>
                    <li>
                        <strong>Contact Number</strong><br>
                        <b>{{$data->contact_no}}</b>
                    </li>
                    <hr>
                    <li>
                        <strong>Land Use</strong><br>
                        <b>{{$data->use}}</b>
                    </li>
                    <hr>
                    <li>
                        <strong>Email Address</strong><br>
                        <b>{{$data->email}}</b>
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
                 firstName: "{{$data->org_name}}",
                 lastName: "",
                 email: "{{$data->email}}",
                 narration: "Land Use Charge",
                 amount: {{$data->charge()->charge}},
                 onSuccess: function (response) {
                     $.ajax({
                            method:"POST",
                         url:"/payment",
                         data:{payment:true,type:'commercial','property_id':{{$data->property_id}} },
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
