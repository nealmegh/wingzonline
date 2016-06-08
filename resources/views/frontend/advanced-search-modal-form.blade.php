<div class="remodal" data-remodal-id="div_advanced_search">

    <h2>Advanced Search</h2>
    <p>Wingz Online makes it easy to schedule an aircraft.</p>
    <form action="{{ url('aircraft/available') }}" method="get">

        <input type="hidden" name="dt_return" id="dt_return_advanced"  value="" />
        <input type="hidden" name="dt_pick_up" id="dt_pick_up_advanced"  value="" />
        <input type="hidden" name="action" value="search"/>
        <input type="hidden" name="from_modal" value="1"/>
        <div class="advanced-search-dates">
            <div class="advanced-search-pick-up" id="advanced_search_pick_up" onclick="toggle_calendar_pickup()">
                <p class="advanced-search-pick-up-title">Pick Up</p>
                <p class="advanced-search-pick-up-month">Jun</p>
                <p class="advanced-search-pick-up-day">02</p>
                <p class="advanced-search-pick-up-time">03:30am</p>
            </div>
            <div class="advanced-search-return"  id="advanced_search_return" onclick="toggle_calendar_return()">
                <p class="advanced-search-return-title">Return</p>
                <p class="advanced-search-return-month">Jun</p>
                <p class="advanced-search-return-day">02</p>
                <p class="advanced-search-return-time">04:00am</p>

            </div>
        </div>
        <div id='dt_pick_up_modal' style="display:none;">
            Pick Up<br/>
        </div>
        <div id='dt_return_modal' style="display:none;">
            Return<br/>
        </div>
        <p class="search-label">Company</p>
        <div>
            <input type="text" placeholder="Company:"  id="company_advanced" name="company"  value=""></input>

        </div>
        <p class="search-label">Airport</p>
        <input type="text" placeholder="Airport or ID:"  id="airport_id_advanced" name="airport_id" value="">
        <p class="advanced-search-or"><span>Or</span></p>
        <input type="text" id="airport_zip_advanced" name="airport_zip" placeholder="Zip:" value=""/>
        <p class="search-label">Aircraft</p>
        <input type="text" placeholder="Make:" id="aircraft_make_id_advanced" name="aircraft_make_id" value=""/>
        <input type="text" placeholder="Model:"  id="aircraft_model_id_advanced" name="aircraft_model_id" value=""/>

        <div class="increment-counter">
            <div class="qty-container">
                <div class="qtyminus-container">
                    <input type='button' value='-' class='qtyminus' field='quantity' />
                </div>
                <input type='text' id="number_of_seats_advanced" name="number_of_seats" class='qty' placeholder="# Seats"  value=""/>
                <div class="qtyplus-container">
                    <input type='button' value='+' class='qtyplus' field='quantity' />
                </div>
            </div>
        </div>


        <hr/>



        <p class="search-label">Price Range <span>(Hourly)</span></p>
        <div class="range-slider-container">
            <div class="nstSlider"
                 data-range_min="120"
                 data-cur_min="120"
                 data-range_max="170"
                 data-cur_max="170">
                <div class="bar"></div>
                <div class="leftGrip"></div>
                <div class="rightGrip"></div>
            </div>
            <div class="leftLabel"></div>
            <div class="rightLabel"></div>
            <input type="hidden" id="price_range_begin_advanced" name="price_range_begin" />
            <input type="hidden" id="price_range_end_advanced" name="price_range_end"/>
        </div>


        <!-- <hr/> -->
        <div class="advanced-search-find-availability">
            <!--button class="remodal-confirm">Find Availability</button-->
            <input type="submit" name="btn_submit" value="Find Availability" class="button"/>
        </div>

        <div class="advanced-search-cancel">
            <a class="remodal-cancel" href="#">Cancel</a>
        </div>



    </form>
</div>