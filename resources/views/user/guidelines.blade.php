@extends('layouts.app')

@section('content')
<style>
    .info-dispaly{
        position: relative;
        background:white;
        margin:10px;
        box-shadow: 2px 2px 3px #ddd;
        left:50%;
        transform:translateX(-50% );        
        padding: 10px;          
    }
    .info-dispaly .header{
        background: white;
        padding: 10px;
        font-weight: 700;
        color: green;
        box-shadow: 2px 2px 3px #ddd;


    }
    .info-dispaly ul {
        border-left:2px solid green;

    }
    .info-dispaly ul li{
        background: white;
        padding: 10px;
        list-style-type: square;
    }
    .info-dispaly ul li strong{
        font-weight: 700;
        font-size: 18px;
        color:darkgreen;
        padding: 5px;
    }
    .info-dispaly ul li span{
        font-weight: 300;
        padding: 10px;
        
    }
</style>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-8 info-dispaly">
            <h4 class="header">Guidelines of the website.</h4>
            <ul>
                <li>Click on the start button</li>
                <li>Click on your property identification number (pin) attached to your building on the web map displayed.</li>
                <li>The pin will enable you to login to input your password for an existing user while the new user signup a display form to be filled.</li>
                <li>After login in to the dashboard, the profile of the property owner will be displayed including the status of the payment.</li>
                <li>Payment can be done online using Remita platform.</li>
                <li>Receipt will be downloaded after payment notification.</li>      
                <li>An email will be sent to property owner email account.</li>    
                <li>The status of the property owner will change automatically  to payment is successfully done. </li>    
            </ul>   
        </div>    
    </div>          
</div>   
@endsection
    

