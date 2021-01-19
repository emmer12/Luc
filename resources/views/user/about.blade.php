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
            <h4 class="header">About</h4>
            <p>The land use charges law, No 5 of 2014 application to real / landed properties in Ondo State was passed into the law by Ondo State Government with which commenced in march 2014. The Ondo State land use charges law, 2014 is provide for levying and collection of land use charges and for the consideration of all properties and land based rates into a new land use charges.</p>
            <p>Our aim is to see to the effective and efficient collection of land use charges for property owners.</p>
            <p>The website is developed to aid land administration through computer technology.</p>
        </div>    
    </div>          
</div>   
@endsection  
