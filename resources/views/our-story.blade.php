@extends('layouts.app')

@section('title')

    Our Story

@endsection

@section('header')

    <div class="row hero noMobile noPad" style="background:url(images/cattle_1.jpeg)  no-repeat center top;"></div>

@endsection

@section('mobileHero')

    <img src="images/cattle_1.jpeg">
    
@endsection

@section('sideBar')

    <div class="container noMobile">
        <h2>About Us</h2>

        <p>
            Kushi farms was founded in 2018 by a family with a passion for agriculture. The goal was to be the best at growing freshly and organically grown produce. In the time of our existence with have worked very hard to developed and improve our farming methods
            to the satisfaction of our clients and health expectations.
        </p>
        <p>
            Here at Kushi Farms we like to believe that we produce the best quality of vegetables and the healthiest of livestock money can buy. There is a great deal of passion and professionalism that is poured into our work in order for us to keep our ambitions
            of being the best in the industry.
        </p>
    </div>
    
@endsection

@section('mainContent')
    
<div class="row introPanel">
    <p class="introLarge">We are Kushi Farms. A family owned farm in Mkushi that adopts the most healthy mixed farming techniques in growing its produce.</p>
</div>
<div class="container">
    <p>Whatever we sell to our customers is grown knowing that it is eventually consumed by people who desire good health. Our products include livestock such as beef cattle, sheep and goat. Then have portray: free range village chicken,
        turkeys, ducks, quells, guinea fowl. We also have local Vegetables: chibwabwa, rape, chinese cabbage, cabbage, tomatoes and onions. Banana plantations, field crops such as maize and soya beans.</p>


    </div>
    <hr class="sep">
    <div class="row">
        <div class="half">
            <div class="row homePanel">
                <img src="images/irrigation.jpeg" alt="irrigation">
                <h2>Gallery</h2>
                <p>Have a look at our gallery for a sneak peek at our operations.</p>
                <!-- Show Gallery in Shadowbox -->
                <a href="images/bananas_1.jpeg" class="button" rel="shadowbox[gallery]" title="<span class='title'>insert title</span>: insert caption ">View Gallery</a>

                <a href="images/turkey.jpeg" rel="shadowbox[gallery]" title="<span class='title'>insert title</span>: insert caption "></a>

                <a href="images/bananas_2.jpeg" rel="shadowbox[gallery]" title="<span class='title'>insert title</span>: insert caption"></a>

                <a href="images/sheep_1.jpeg" rel="shadowbox[gallery]" title="<span class='title'>insert title</span>: insert caption "></a>

                <a href="images/shade_stracture.jpeg" rel="shadowbox[gallery]" title="<span class='title'>insert title</span>: insert caption "></a>

                <a href="images/bananas_3.jpeg" rel="shadowbox[gallery]" title="<span class='title'>insert title</span>: insert caption  "></a>

                <a href="images/plantation_4.jpeg" rel="shadowbox[gallery]" title="<span class='title'>insert title</span>: insert caption "></a>

                <a href="images/cabages.jpeg" rel="shadowbox[gallery]" title="<span class='title'>insert title</span>: insert caption "></a>

                <a href="images/bananas_4.jpeg" rel="shadowbox[gallery]" title="<span class='title'>insert title</span>: insert caption "></a>

                <a href="images/cattle_2.jpeg" rel="shadowbox[gallery]" title="<span class='title'>insert title</span>: insert caption "></a>

                <a href="images/sheep_2.jpeg" rel="shadowbox[gallery]" title="<span class='title'>insert title</span>: insert caption "></a>

                <a href="images/bananas_5.jpeg" rel="shadowbox[gallery]" title="<span class='title'>insert title</span>: insert caption "></a>

                <a href="images/delivary_2.jpeg" rel="shadowbox[gallery]" title="<span class='title'>insert title</span>: insert caption "></a>

                <a href="images/plants.jpeg" rel="shadowbox[gallery]" title="<span class='title'>insert title</span>: insert caption "></a>

                <a href="images/bananas_6.jpeg" rel="shadowbox[gallery]" title="<span class='title'>insert title</span>: insert caption "></a>

                <a href="images/cattle_1.jpeg" rel="shadowbox[gallery]" title="<span class='title'>insert title</span>: insert caption "></a>

                <a href="images/bananas_7.jpeg" rel="shadowbox[gallery]" title="<span class='title'>insert title</span>: insert caption "></a>

                <a href="images/field_2.jpeg" rel="shadowbox[gallery]" title="<span class='title'>insert title</span>: insert caption "></a>

            </div>
        </div>
        <div class="half">
            <div class="row homePanel">
                <img src="images/map.PNG" alt="Where is Lakeland? ">
                <h2>Where in Mkushi</h2>
                <p>Take a look at Google Maps to see where in Mkushi to find Kushi Farms</p>
                <!-- Go to new window -->
                <a href="https://www.google.com/maps/place/Mkushi/@-14.1242825,29.0106205,9z/data=!3m1!4b1!4m5!3m4!1s0x1915a2635d4c111f:0x8ea780669e12866e!8m2!3d-13.9727057!4d29.6035495" class="button">See Map</a>


            </div>
        </div>
    </div>

    <script src="js/jquery.ui.widget.js"></script>
        <script src="js/jquery.iframe-transport.js"></script>
        <script src="js/jquery.fileupload.js"></script>

        <script>
            $(document).ready(function() {
                $(".ajax-upload-field").each(function(index) {
                    var section = $(this).data('section');
                    var recordNum = $(this).data('recordnum');
                    var preSaveTempId = $(this).data('presavetempid');
                    var fieldName = $(this).data('fieldname');

                    $(this).fileupload({
                        url: "?frontEndUploader_receiveFile=1&sectionName=" + encodeURIComponent(section) + "&recordNum=" + encodeURIComponent(recordNum) + "&preSaveTempId=" + encodeURIComponent(preSaveTempId) + "&fieldName=" + encodeURIComponent(fieldName),
                        dataType: 'json',
                        done: function(e, data) {
                            if (data.result.errors) {
                                alert(data.result.errors);
                            }
                            progress = 0;
                            getUploads(section, recordNum, preSaveTempId, fieldName);

                        },
                        progressall: function(e, data) {
                            var progress = parseInt(data.loaded / data.total * 100, 10);
                            $('#' + fieldName + recordNum + preSaveTempId + '_progress').css(
                                'width',
                                progress + '%'
                            );
                        }
                    }).prop('disabled', !$.support.fileInput).parent().addClass($.support.fileInput ? undefined : 'disabled');
                });

                $(document.body).on('click', '.delete-image', function(event) {
                    event.preventDefault();
                    num = $(this).data('num');
                    var section = $(this).data('section');
                    var recordNum = $(this).data('recordnum');
                    var preSaveTempId = $(this).data('presavetempid');
                    var fieldName = $(this).data('fieldname');
                    $.ajax({
                        url: "?frontEndUploader_deleteUpload=1&sectionName=" + encodeURIComponent(section) + "&recordNum=" + encodeURIComponent(recordNum) + "&preSaveTempId=" + encodeURIComponent(preSaveTempId) + "&fieldName=" + encodeURIComponent(fieldName) + "&uploadNum=" + encodeURIComponent(num),
                    }).done(function(data) {
                        if (data.success) {
                            getUploads(section, recordNum, preSaveTempId, fieldName);
                        } else if (data.errors) {
                            alert(data.errors);
                        }
                    });
                });
            });

            function getUploads(section, recordNum, preSaveTempId, fieldName) {
                $.ajax({
                    url: "?frontEndUploader_updateDisplayUploads=1&sectionName=" + encodeURIComponent(section) + "&recordNum=" + encodeURIComponent(recordNum) + "&preSaveTempId=" + encodeURIComponent(preSaveTempId) + "&fieldName=" + encodeURIComponent(fieldName),
                }).done(function(html) {
                    $("#" + fieldName + recordNum + preSaveTempId + "-files-list").html(html);
                });
            }
        </script>

@endsection