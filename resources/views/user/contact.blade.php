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
        background: white;
        padding: 10px;
        font-weight: 700;
        color: green;
        box-shadow: 2px 2px 3px #ddd;
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
    .info-dispaly ul li span{
        font-weight: 300;
        padding: 10px;
        
    }
</style>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-8 info-dispaly">
            <div class="">
                <h4 class="header">Contect Us</h4>
                <div class="alert alert-info"><i class="fa fa-question"></i> The Akure metropolis land use charges collection is open for 24 hours a day, and in the Sundays in a week. Your enquiiries and sujestions are highly welcome. </div>
                 <ul>
                    <li>
                        <strong>Email:</strong><br>
                        <span>Fadolahassan@yahoo.com</span><br>
                        <span>Fadolahassan@gmail.com</span><br>
                    </li>
                    <li>
                        <strong>Phone Number:</strong><br>
                        <span>07036622228</span><br>
                        <span>08143675018</span><br>
                    </li>
                    <li>
                        <strong>Location:</strong><br>
                        <span>Department of survay and geoinformatices, school of Environmental technology, The Federal University Of Technology Akure.</span><br>
                    </li>
                    
                
                </ul>               
            </div>
        </div>
    </div>
</div>
@endsection
