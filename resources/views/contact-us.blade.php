@extends('layouts.app')

@section('title')

    Contact Us

@endsection

@section('header')

    <div class="row hero noMobile noPad" style="background:url(images/field_1.jpeg)  no-repeat center top;"></div>
    
@endsection

@section('mobileHero')

    <img src="images/field_1.jpeg">
    
@endsection

@section('sideBar')

    <div id="sideMenu">
        <h1>Contact Us</h1>
    </div>

    <p>T: +260 97 7567533</p>
    <p>A: Mkushi, Zambia</p>
    <p>P: 10101 Mkushi</p>
    <p>E: <a href="mailto:info@kushifarms.com">info@kushifarms.com</a></p>
    
@endsection

@section('mainContent')

    <div class="row introPanel">
        <p class="introLarge"></p>
    </div>
    <div class="container">
        <h2><img width="900" height="600" src="images/map.PNG" /></h2>
        <h2></h2>
        <p></p>


    </div>
    <hr class="sep">
    <div class="row">
        <div class="half">
            <div class="row homePanel">
                <img src="images/mkushi-town.jpg" alt="Where is Mukushi? ">
                <h2>Where is Mkushi?</h2>
                <p>Take a look at Google Maps to see where in Mkushi to find Kushi Farms</p>
                <!-- Go to new window -->
                <a href="https://www.google.com/maps/place/Mkushi/@-14.1242825,29.0106205,9z/data=!3m1!4b1!4m5!3m4!1s0x1915a2635d4c111f:0x8ea780669e12866e!8m2!3d-13.9727057!4d29.6035495" class="button" target="_blank">See Map</a>
            </div>
        </div>
        <div class="half">
            <div class="row homePanel">
                <img src="images/bananas_5.jpeg" alt="Red Valley Farms Gallery">
                <h2>Gallery</h2>
                <p>Have a see at Kushi Farms</p>
                <!-- Show Gallery in Shadowbox -->
                <a href="images/bananas_8.jpeg" class="button" rel="shadowbox[gallery]" title="<span class='title'></span> ">View Gallery</a>

                <a href="images/onions.jpeg" rel="shadowbox[gallery]" title="<span class='title'>insert title</span>: insert caption "></a>

                <a href="images/bananas_9.jpeg" rel="shadowbox[gallery]" title="<span class='title'>insert title</span>: insert caption "></a>

                <a href="images/plantation_2.jpeg" rel="shadowbox[gallery]" title="<span class='title'>insert title</span>: insert caption "></a>

                <a href="images/plantation_5.jpeg" rel="shadowbox[gallery]" title="<span class='title'>insert title</span>: insert caption "></a>

                <a href="images/plantation_1.jpeg" rel="shadowbox[gallery]" title="<span class='title'>insert title</span>: insert caption "></a>

                <a href="images/beans.jpeg" rel="shadowbox[gallery]" title="<span class='title'>insert title</span>: insert caption "></a>

                <a href="images/cattle_3.jpeg" rel="shadowbox[gallery]" title="<span class='title'>insert title</span>: insert caption "></a>

                <a href="images/customers.jpeg" rel="shadowbox[gallery]" title="<span class='title'>insert title</span>: insert caption "></a>

                <a href="images/delivary_1.jpeg" rel="shadowbox[gallery]" title="<span class='title'>insert title</span>: insert caption "></a>

                <a href="images/field_1.jpeg" rel="shadowbox[gallery]" title="<span class='title'>insert title</span>: insert caption "></a>

                <a href="images/goats.jpeg" rel="shadowbox[gallery]" title="<span class='title'>insert title</span>: insert caption "></a>

                <a href="images/green_house.jpeg" rel="shadowbox[gallery]" title="<span class='title'>insert title</span>: insert caption "></a>

                <a href="images/plantation_3.jpeg" rel="shadowbox[gallery]" title="<span class='title'>insert title</span>: insert caption "></a>

                <a href="images/green_house_2.jpeg" rel="shadowbox[gallery]" title="<span class='title'>insert title</span>: insert caption "></a>

                <a href="images/irrigation.jpeg" rel="shadowbox[gallery]" title="<span class='title'>insert title</span>: insert caption "></a>

                <a href="images/load.jpeg" rel="shadowbox[gallery]" title="<span class='title'>insert title</span>: insert caption "></a>

                <a href="images/maize.jpeg" rel="shadowbox[gallery]" title="<span class='title'>insert title</span>: insert caption "></a>

            </div>
        </div>
    </div>
@endsection