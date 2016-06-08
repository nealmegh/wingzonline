<div id="refined-search" class="remodal" data-remodal-id="refine_search">

    <h2>Refine Search</h2>
    <form action="http://www.wingzonline.net/available-aircraft/" method="post">

        <div class="label">Date/Time & Company:</div>
        <div class="search-aicraft-input pickup-return">
            <input type="text" placeholder="Pick Up:" name="dt_pick_up" id="dt_pick_up" class="dtimepicker"></input>
            <input type="text" placeholder="Return:" class="dtimepicker" id="dt_return" name="dt_return"></input>
            <div id="blu-arrow-down-wrapper" class="pull-left which-company">
                <select name="choose_company" value="" class="blu-arrow-down">
                    <option value="">Which Company:</option>
                    <option>Lorem Ipsum</option>
                    <option>Dolor Sit</option>
                    <option>Vehicula Ornare</option>
                    <option>Foo</option>
                    <option>Bar</option>
                    <option>Baz</option>
                    <option>Qux</option>
                    <option>Zoobie</option>
                    <option>Frang</option>
                </select>

            </div>

            <input type="hidden" name="action" value="search"/>
            <input type="hidden" name="airport_id" value="" id="airport_id" />
            <input type="hidden" name="airport_zip" value="" id="airport_zip" />
            <input type="hidden" name="aircraft_make_id" value="" id="aircraft_make_id" />
            <input type="hidden" name="aircraft_model_id" value="" id="aircraft_model_id" />
            <input type="hidden" name="number_of_seats" value="" id="number_of_seats" />
            <input type="hidden" name="price_range_begin" value="" id="price_range_begin" />
            <input type="hidden" name="price_range_end" value="" id="price_range_end" />
            <input type="hidden" name="company" id="company"/>
        </div>
        <div class="clearfix"></div>

        <div class="grey-bg">
            <div class="label margintop40">Airport</div>
            <div class="airport-details">

                <div id="blu-arrow-down-wrapper" class="pull-left airport_wrapper">
                    <select class="blu-arrow-down" id="choose_airport" name="choose_airport" value="">
                        <option value="">Choose Airport:</option>
                    </select>

                </div>
                <div id="blu-arrow-down-wrapper" class="pull-left airport_id_wrapper">
                    <select class="blu-arrow-down" id="choose_airport_id" name="choose_airport_id" value="">
                        <option value="">Choose Airport ID:</option>
                    </select>
                </div>
                <div class="clearfix"></div>
                <p class="advanced-search-or"><span>Or</span></p>
                <div class="clearfix"></div>
                <input type="text" id="airport_zip_advanced" name="airport_zip" placeholder="Zip: XXXX" value=""/>
                <div id="blu-arrow-down-wrapper" class="pull-left raius-wrapper">
                    <select class="blu-arrow-down" id="airport_radius" name="airport_radius" value="">
                        <option value="">Radius: 30 mi</option>
                    </select>
                </div>
            </div>
        </div>


        <div class="clearfix"></div>
        <div class="label">Aircraft</div>
        <div class="aircraft-details">
            <div id="blu-arrow-down-wrapper" class="pull-left choose_make_wrapper">
                <select class="blu-arrow-down" id="choose_make" name="choose_make" value="">
                    <option value="">Make:</option>
                </select>
            </div>
            <div id="blu-arrow-down-wrapper" class="pull-left choose_model_wrapper">
                <select class="blu-arrow-down" id="choose_model" name="choose_model" value="">
                    <option value="">Model:</option>
                </select>
            </div>
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

        </div>





        <!--
            <input type="hidden" name="dt_return" id="dt_return_advanced"  value="" />
            <input type="hidden" name="dt_pick_up" id="dt_pick_up_advanced"  value="" />
            <input type="hidden" name="action" value="search"/>
            <input type="hidden" name="from_modal" value="1"/>
            <div class="advanced-search-dates">
                <div class="advanced-search-pick-up" id="advanced_search_pick_up" onclick="toggle_calendar_pickup()">
                    <p class="advanced-search-pick-up-title">Pick Up</p>
                    <p class="advanced-search-pick-up-month">Mar</p>
                    <p class="advanced-search-pick-up-day">24</p>
                    <p class="advanced-search-pick-up-time">04:00am</p>
                </div>
                <div class="advanced-search-return"  id="advanced_search_return" onclick="toggle_calendar_return()">
                    <p class="advanced-search-return-title">Return</p>
                    <p class="advanced-search-return-month">Mar</p>
                    <p class="advanced-search-return-day">24</p>
                    <p class="advanced-search-return-time">04:30am</p>

                </div>
            </div>
            <div id='dt_pick_up_modal' style="display:none;">
                Pick Up<br/>
            </div>
            <div id='dt_return_modal' style="display:none;">
                Return<br/>
            </div>

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

               -->

        <div class="clearfix"></div>
        <div class="grey-bg">
            <div class="label margintop40">Price Range</div>
            <div class="range-slider-wrapper">
                <div class="range-slider-container">
                    <div class="nstSlider"
                         data-range_min="0"
                         data-cur_min="0"
                         data-range_max="0"
                         data-cur_max="300">
                        <div class="bar"></div>
                        <div class="leftGrip"></div>
                        <div class="rightGrip"></div>
                    </div>
                    <div class="leftLabel"></div>
                    <div class="rightLabel"></div>
                    <input type="hidden" id="price_range_begin_advanced" name="price_range_begin" />
                    <input type="hidden" id="price_range_end_advanced" name="price_range_end"/>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>

        <!-- <hr/> -->
        <div class="advanced-search-find-availability">
            <!--button class="remodal-confirm">Find Availability</button-->

            <span><input type="submit" value="Find Availability" class="btn btn-default find-availability" /></span>
        </div>





    </form>
</div>
<script type="text/javascript">
    //Search
    $(document).on('confirm', '.remodal', function () {

        $("#dt_return_modal").toggle(false);
        $("#dt_pick_up_modal").toggle(false);
        $("#company").val($("#company_advanced").val());
        $("#airport_id").val($("#airport_id_advanced").val());
        $("#airport_zip").val($("#airport_zip_advanced").val());
        $("#aircraft_make_id").val($("#aircraft_make_id_advanced").val());
        $("#aircraft_model_id").val($("#aircraft_model_id_advanced").val());
        $("#number_of_seats").val($("#number_of_seats_advanced").val());
        $("#price_range_begin").val($("#price_range_begin_advanced").val());
        $("#price_range_end").val($("#price_range_end_advanced").val());
        $("#from_modal").val('1');
        $("#frm_search_aircraft").submit();
    });


    // RANGE SLIDER JQUERY
    $('.nstSlider').nstSlider({
        "crossable_handles": false,
        "left_grip_selector": ".leftGrip",
        "right_grip_selector": ".rightGrip",
        "value_bar_selector": ".bar",
        "value_changed_callback": function(cause, leftValue, rightValue) {
            $(this).parent().find('.leftLabel').text(leftValue);
            $(this).parent().find('.rightLabel').text(rightValue);
            $('#price_range_begin_advanced').val(leftValue);
            $('#price_range_end_advanced').val(rightValue);
        }
    });


    var moment = rome.moment;
    rome(dt_pick_up, {
        "inputFormat": "MM/DD/YYYY"
        ,time: false
    });
    rome(dt_pick_up_modal,{
        initialValue: moment().format('YYYY-MM-DD H:' + '00a')
        ,dateValidator: rome.val.beforeEq(dt_return_modal)
        ,timeValidator: rome.val.beforeEq(dt_return_modal)
        //"inputFormat": "MM/DD/YYYY h:mma"
        ,"timeFormat": "h:mma"
        ,autoClose:'time'
    }).on('data', function (value) {
        $('#dt_pick_up_advanced').val(moment(value).format("MM/DD/YYYY h:mma"));
        //$('#dt_return_advanced').val(moment(value).add(30,'minutes').format("MM/DD/YYYY h:mma"));
        rome(dt_return_modal).setValue(moment(value).add(30,'minutes').format());

        change_modal_date_pick();
        change_modal_date_return();

    });

    function toggle_calendar_pickup()
    {
        $( "#dt_pick_up_modal" ).toggle("slow");
        $( "#dt_return_modal" ).toggle(false);
    }

    rome(dt_return_modal,{
        initialValue: moment().format('YYYY-MM-DD H:' + '00a')
        ,dateValidator: rome.val.afterEq(dt_pick_up_modal)
        ,timeValidator: rome.val.afterEq(dt_pick_up_modal)
        //,"inputFormat": "MM/DD/YYYY h:mma"
        ,"timeFormat": "h:mma"
        ,autoClose:'time'
    }).on('data', function (value) {
        $('#dt_return_advanced').val(moment(value).format("MM/DD/YYYY h:mma"));
        change_modal_date_return();
        //$( "#dt_return_modal" ).toggle("slow");
    });

    function toggle_calendar_return()
    {
        $( "#dt_return_modal" ).toggle("slow");
        $( "#dt_pick_up_modal" ).toggle(false);

    }

    $( document ).ready(function() {
        /* Auto Complete Start */
        $('#search_keyword').autocomplete({
            serviceUrl: 'http://www.wingzonline.net/wp-content/themes/wingzonline/wingzonline_includes/ajax/autocomplete_keywords_ajax.php',
            onSelect: function (suggestion) {
            }
        });



        $('#company').autocomplete({
            serviceUrl: 'http://www.wingzonline.net/wp-content/themes/wingzonline/wingzonline_includes/ajax/autocomplete_keywords_ajax.php?opt=company',
            onSelect: function (suggestion) {
            }
        });


        $('#company_advanced').autocomplete({
            serviceUrl: 'http://www.wingzonline.net/wp-content/themes/wingzonline/wingzonline_includes/ajax/autocomplete_keywords_ajax.php?opt=company',
            onSelect: function (suggestion) {
            }
        });



        $('#airport_id_advanced').autocomplete({
            serviceUrl: 'http://www.wingzonline.net/wp-content/themes/wingzonline/wingzonline_includes/ajax/autocomplete_keywords_ajax.php?opt=airport',
            onSelect: function (suggestion) {
            }
        });


        $('#aircraft_make_id_advanced').autocomplete({
            serviceUrl: 'http://www.wingzonline.net/wp-content/themes/wingzonline/wingzonline_includes/ajax/autocomplete_keywords_ajax.php?opt=make',
            onSelect: function (suggestion) {
            }
        });

        $('#aircraft_model_id_advanced').autocomplete({
            serviceUrl: 'http://www.wingzonline.net/wp-content/themes/wingzonline/wingzonline_includes/ajax/autocomplete_keywords_ajax.php?opt=model',
            onSelect: function (suggestion) {
            }
        });

        /*Auto Complate End */
    });


    function change_modal_date_pick() {
        String.prototype.splice = function( idx, rem, s ) {
            return (this.slice(0,idx) + s + this.slice(idx + Math.abs(rem)));
        };

        var var_pick = $('#dt_pick_up_advanced').val().splice(-2,0,' ');

        var month = moment(new Date(var_pick)).format('MMMM');
        var day = moment(new Date(var_pick)).format('DD');
        var time = moment(new Date(var_pick)).format('h:mma');



        $( ".advanced-search-pick-up-month").html(month);
        $( ".advanced-search-pick-up-day").html(day);
        $( ".advanced-search-pick-up-time").html(time);

    }


    function change_modal_date_return() {
        String.prototype.splice = function( idx, rem, s ) {
            return (this.slice(0,idx) + s + this.slice(idx + Math.abs(rem)));
        };

        var var_return = $('#dt_return_advanced').val().splice(-2,0,' ');

        var month = moment(new Date(var_return)).format('MMMM');
        var day = moment(new Date(var_return)).format('DD');
        var time = moment(new Date(var_return)).format('h:mma');

        $( ".advanced-search-return-month").html(month);
        $( ".advanced-search-return-day").html(day);
        $( ".advanced-search-return-time").html(time);

    }



</script>




<script type="text/javascript">
    var moment = rome.moment;
    rome(dt_pick_up, {
        initialValue: moment().format('MM/DD/YYYY h:' + '00a'),
        dateValidator: rome.val.beforeEq(dt_return)
        ,timeValidator: rome.val.before(dt_return)
        ,"inputFormat": "MM/DD/YYYY h:mma"
        ,"timeFormat": "h:mma"
        ,"timeInterval": 1800
        ,autoClose:'time'
    }).on('data', function (value) {
        var time_pick = new Date(moment(value).format());
        var time_return = new Date(moment(dt_return.value).format());
        //rome(dt_pick_up_modal).setValue(value);
        change_modal_date_pick();

    });

    rome(dt_return, {
        initialValue: moment().format('MM/DD/YYYY h:' + '00a'),
        dateValidator: rome.val.afterEq(dt_pick_up)
        ,timeValidator: rome.val.after(dt_pick_up)
        ,"inputFormat": "MM/DD/YYYY h:mma"
        ,"timeFormat": "h:mma"
        ,autoClose:'time'
        ,"timeInterval": 1800
    }).on('data', function (value) {

        var time_pick = new Date(moment(dt_pick_up.value).format());
        var time_return = new Date(moment(value).format());
        //rome(dt_return_modal).setValue(value);
        change_modal_date_return();
    });




    $( document ).ready(function() {
        $("#dt_pick_up").val('');
        $("#dt_return").val('');

        $("#frm_search_aircraft").validate({
            ignore: []
            ,rules: {
                dt_pick_up:{
                    required:true
                }
                ,dt_return:{
                    required:true
                }

            },



            showErrors: function (errorMap, errorList) {
                $("#error_summary").html("Please Choose Pick Up and Return Date/Time");
                if (this.numberOfInvalids() > 0) {
                    $("#error_summary").show();
                } else {
                    $("#error_summary").hide();
                }
            }
            ,errorPlacement: function () {
                return false; // <- kill default error labels
            }


        });

        /*
         $.validator.addMethod("greaterThan",function(value, element, params) {

         if (!/Invalid|NaN/.test(new Date(value))) {
         return new Date(value) > new Date($(params).val());
         }

         return isNaN(value) && isNaN($(params).val())
         || (Number(value) > Number($(params).val()));
         },'Must be greater than {0}.');

         */



    });





</script>