@extends('layouts.app')

@section('content')
    <h1>Ricky Morty</h1>

    <div id="filters">
        <input type="number" id="name-filter" placeholder="Id Location" required>
        <button id="fetchButton">Search</button>
    </div>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div id="modalContent"></div>
        </div>
    </div>

    <div class="container">
        <div id="characters">

        </div>
    </div>
@endsection

