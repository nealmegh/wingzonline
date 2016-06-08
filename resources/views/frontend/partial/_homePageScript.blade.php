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
    rome(dt_pick_up_modal,{
        initialValue: moment().format('YYYY-MM-DD H:' + '30a')
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
        initialValue: moment().format('YYYY-MM-DD H:' + '30a')
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
        initialValue: moment().format('MM/DD/YYYY h:' + '30a'),
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
        initialValue: moment().format('MM/DD/YYYY h:' + '30a'),
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
            /*

             messages:{
             dt_pick_up: "Please Choose Pick Up and Return Date/Time",
             dt_return: "Return date is required"
             }


             ,errorContainer: $('#error_summary')
             ,errorLabelContainer: $('#error_summary ul')
             ,wrapper: 'li'
             */


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