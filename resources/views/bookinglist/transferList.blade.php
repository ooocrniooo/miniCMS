@extends('app')

@section('content')
<div class="container">
    <h1>Transfer booking list</h1>
    <table class="table table-responsive table-bordered table-hover table-striped">
        <thead style="background-color: #add8e6">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Agencija</th>
            <th>Do/Odlazak</th>
            <th>Time</th>
            <th>FlightNr</th>
            <th>From/To</th>
            <th>Persons</th>
            <th>Direction</th>
            <th>Payment</th>
            <th>More</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
    @foreach($list as $itm)
        <tr>
            <td>{{$itm->ID}}</td>
            <td>{{$itm->Ime}}<br>{{$itm->Prezime}}</td>
            <td>{{$itm->Agencija}}</td>
            <td>{{$itm->Dolazak}}<br>{{$itm->Odlazak}}</td>
            <td>{{$itm->Arrival}}<br>{{$itm->ArrivalBack}}</td>
            <td>{{$itm->FlightNr}}</td>
            <td>{{$itm->Od}}<br>{{$itm->Do}}</td>
            <td>{{$itm->Osoba}}</td>
            <td>{{$itm->Smjer}}</td>
            <td>{{$itm->NacinPlacanja}}</td>
            <td>More</td>
            <td>Delete</td>
        </tr>
    @endforeach
        </tbody>
    </table>
{!! $list->render() !!}
</div>
@endsection