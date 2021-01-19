@extends('layouts.app')

@section('content')
<style>
   
</style>
<br>
<div class="container">
    <div style="page-break-after: always;">
      @if ($orderCom)

      <h1> Property Invoice  # {{ $orderCom->property_id  }}</h1>
      <table class="table table-borderComed table-successs">
        <thead>
          <tr>
          <td colspan="2">Status :: {{ $orderCom->payment ? "Paid" : "Not Payment Not made"}}</td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="width: 50%;"><address>
               <strong>Organization Name</strong>
             {{$orderCom->org_name}}<br />
              </address>
              <b> text_telephone </b>  {{$orderCom->contact_no}} <br />
              <b> Address </b>  {{$orderCom->property_address}} <br />
            
              <b> Email </b>  {{$orderCom->email}} <br />
              
            <td style="width: 50%;"><b> Date </b> {{$orderCom->updated_at}} <br />
              <b> Invoice_no </b>  34234231121 <br />
              <b> Payment ID </b>  {{$orderCom->id}} <br />
            
          </tr>
        </tbody>
      </table>
   
      <table class="table table-bordered">
        <thead>
          <tr>
            <td class="text-right"><b>Total Payment {{ $orderCom->payment ? "Made" : "To be made"}} </b></td>
          </tr>
        </thead>
        <tbody>
  
            <td class="text-right"> &#x20A6;{{number_format($orderCom->charge()->charge)}}</b> </td>
        </tbody>
    </table>
    <button class="btn btn-success">Print</button><br><br>





        @elseif($order)
        

        <h1> Property Invoice  # {{ $order->property_id  }}</h1>
      <table class="table table-bordered table-successs">
        <thead>
          <tr>
          <td colspan="2">Status :: {{ $order->payment ? "Paid" : "Not Payment Not made"}}</td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="width: 50%;"><address>
               <strong> Name</strong>
             {{$order->firstname}} {{$order->surname}}<br />
              </address>
              <b> text_telephone </b>  {{$order->phone_number}} <br />
              <b> Address </b>  {{$order->property_address}} <br />
              <b> Email </b>  {{$order->email}} <br />
              
            <td style="width: 50%;"><b> Date </b> {{$order->updated_at}} <br />
              <b> Invoice_no </b>  1211122121 <br />
              <b> Payment ID </b>  {{$order->id}} <br />
            
          </tr>
        </tbody>
      </table>
   
      <table class="table table-bordered">
        <thead>
          <tr>
            <td class="text-right"><b>Total Payment {{ $order->payment ? "Made" : "To be made"}} </b></td>
          </tr>
        </thead>
        <tbody>
  
            <td class="text-right"> &#x20A6;{{number_format($order->charge)}}</b> </td>
        </tbody>
    </table>
    <button class="btn btn-success">Print</button><br><br>

    @else
     

       <div class="alert alert-danger">
           <h4>Ooops something went wronge</h4>
       </div>

      @endif
      
    </div>
  </div>
@endsection  
