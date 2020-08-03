@extends('layouts.app')

@section('title')

    Our Produce

@endsection

@section('header')

    <div class="row hero noMobile noPad" style="background:url(images/bananas_5.jpeg)  no-repeat center top;"></div>

@endsection

@section('mobileHero')

    <img src="/images/bananas_5.jpeg">
    
@endsection

@section('sideBar')

    <div id="sideMenu">
        <h1>Trends</h1>
        <p>
            <img src="images/chart.png" alt="trends">
        </p>
    </div>

    <div class="container noMobile">
        <h2>Hear This...</h2>

        <p>We aim to be the countries leading producers of freshly produced crops and organically grown live stock...<br />
        </p>
        <p>As part of our commitment to producing healthy foods for our values customers, we implement the latest technics in organic farming.</a>
        </p>
    </div>
    
@endsection

@section('mainContent')
    
    <div class="row introPanel">
        <p class="introLarge">Have a look at what we have to offer </p>
    </div>
    <!-- <hr class="sep"> -->
    <div class="row">
        <div class="half">
            <div class="row homePanel">
                <img src="images/cattle_2.jpeg" alt="cattle">
                <h2>Cattle</h2>
                <p>K5000 per head</p>
            </div>
        </div>

        <div class="half">
            <div class="row homePanel">
                <img src="images/turkey.jpeg" alt="Chickens">
                <h2>Chickens</h2>
                <p>K80 per bird</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="half">
            <div class="row homePanel">
                <img src="images/bananas_7.jpeg" alt="Bananas">
                <h2>Bananas</h2>
                <p>K600 per ton</p>
            </div>
        </div>
        <div class="half">
            <div class="row homePanel">
                <img src="images/goats.jpeg" alt="Goats">
                <h2>Goats</h2>
                <p>K600 per ton</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="half">
            <div class="row homePanel">
                <img src="images/sheep_1.jpeg" alt="Bananas">
                <h2>Sheep</h2>
                <p>K700 per ton</p>
            </div>
        </div>
        <div class="half">
            <div class="row homePanel">
                <img src="images/green_house_2_crop.jpg" alt="Goats">
                <h2>Vegetables</h2>
                <p>K100 per ton</p>
            </div>
        </div>
    </div>

@endsection