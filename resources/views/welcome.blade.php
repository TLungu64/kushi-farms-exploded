@extends('layouts.app')

@section('title', 'Kushi Farms')

@section('siteHeader')

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
        <div style="background:url(/images/bananas_6.jpeg)  no-repeat center center;">
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