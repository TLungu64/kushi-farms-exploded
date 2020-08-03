@extends('layouts.app')

@section('title')

    Home

@endsection

@section('header')

    <div class="cycle-slideshow noMobile noPad" data-cycle-fx="fadeout" data-cycle-slides="> div" data-cycle-timeout="8000">
        <div style="background:url(images/plantation_3.jpeg)  no-repeat center center;">
            <div class="cycle-overlay">
                <h1>
                    For the love of family <br /> For the love of farming <br /> For fresh produce
                </h1>
                <p>



                </p>
            </div>
        </div>
        <div style="background:url(images/cattle_3.jpeg)  no-repeat center center;">
            <div class="cycle-overlay">
                <h1>
                    We do it for you<br />
                </h1>
                <p>

                    <!-- Go to page -->
                    <a href="/our-story/" class="button">Our Story</a>

                </p>
            </div>
        </div>
        <div style="background:url(images/bananas_6.jpeg)  no-repeat center center;">
            <div class="cycle-overlay">
                <h1>The best in organic farming</h1>
                <p>

                    <!-- Go to page -->
                    <a href="/next-gen-compost/" class="button">Learn more</a>

                </p>
            </div>
        </div>
    </div>

@endsection

@section('mobileHero')

    <img src="images/cattle_3.jpeg" />
    
@endsection

@section('sideBar')

    <h2>Our Prices</h2>
    <p>
        <table class="table table-bordered">
            <!-- <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">price</th>
                </tr>
                </thead> -->
            <tbody>
                <tr>
                    <th scope="row">cattle</th>
                    <td>K5000/head</td>
                </tr>
                <tr>
                    <th scope="row">bananas</th>
                    <td>K400/ton</td>
                </tr>
                <tr>
                    <th scope="row">goats</th>
                    <td colspan="2">K250/head</td>
                </tr>
            </tbody>
        </table>
    </p>
    <p>
        <h6><a href="/our-produce">Show More...</a></h6>
    </p>
    <h2>Contact Us</h2>
    <p>
        Looking to hear from us for all other enquiries please do not hesitate to contact us:
    </p>
    <div aria-hidden="true" data-icon="&#xe002;" class="contact">
        +260 97 7567533
    </div>
    <div aria-hidden="true" data-icon="&#xe000;" class="contact">
        <a href="mailto:info@kushifarms.com">
            info@kushifarms.com
        </a>
    </div>
    <div aria-hidden="true" data-icon="&#xe001;" class="contact">
        <a href="https://maps.google.com.au/maps?q=Lakeland,+Queensland,+Australia&hl=en&sll=-15.802825,144.854736&sspn=6.593014,11.689453&gl=au&hnear=Lakeland+Queensland&t=m&z=9&iwloc=A" target="_blank">Mkushi, Zambia</a></div>
    
@endsection

@section('mainContent')
    
    <div class="row introPanel">
        <p class="introLarge">
            Leading producers of fresh produce and organically grown live stock.
        </p>
    </div>
    <div class="container">
        <div class="half">

            <div class="row homePanel">
                <img src="images/customers.jpeg" alt="Our Vision">
                <h3>Our Vision</h3>
                <p>
                    We aim to the the countries leading producer of fresh produce and purely organically grown live stock.
                </p>
                <!-- Go to page -->
                <a href="/vision/" class="button">
                    Read More
                </a>
            </div>
            <div class="row homePanel">
                <img src="images/plantation_1.jpeg" alt="Next-Gen Compost">
                <h3>
                    Organic Farming
                </h3>
                <p>
                    Organic wast produced on our farm is used to produce compost. This is part of our commitment in producing heathier and naturally grown food.
                </p>

                <!-- Go to page -->
                <a href="/next-gen-compost/" class="button">Read more</a>
            </div>
        </div>

        <div class="half">
            <div class="row homePanel">
                <img src="images/delivary_1.jpeg" alt="Work for Us">
                <h3>
                    Work with Us
                </h3>
                <p>
                    We produce all year round and always looking enthusiastic people to join the the family.<br /><br />
                </p>

                <!-- Go to page -->
                <a href="/work-us/" class="button">Read More</a>
            </div>
            <div class="row homePanel">
                <img src="images/irrigation.jpeg" alt="Our Location">
                <h3>
                    Our Location
                </h3>
                <p>
                    Rich soils and favorable wether give as the advantage of producing the best and healthiest of cash crops and livestock. <br /><br />
                </p>

                <!-- Go to page -->
                <a href="/location/" class="button">
                    Read More
                </a>
            </div>
        </div>
        <div id="sideBar" class="third homeSide noPad mobileOnly "></div>
    </div>

@endsection