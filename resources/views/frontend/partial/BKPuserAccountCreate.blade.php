@extends('app')

{{--@include('frontend.partial.state')--}}

@section('content')

    <div id="content">
        <section>

            <header style="background-image: url('/frontend/images/available-aircraft.jpg')">
                <h1 class="page-title">Create User Account</h1>
            </header>

            <div class="wrap cf">
                <div class="m-all t-all d-all cf">
                    <section class="entry-content cf">

                        <div id='divCreateAccount'>
                            <p style="text-align: center;">Sign up for a <strong>FREE</strong> account with Wingz Online!</p>

                            <h2></h2>
                            <ul class="error">
                            </ul>
                            {!! Form::open(['url'=>'create-user-account', 'id'=>'frm_create_account']) !!}

                                <p class="h2">Register</p>
                                @if (count($errors) > 0)
                                    <label for="username" class="error create-account-error" generated="true">{{ $errors->first('username') }}</label>
                                @endif
                                {!! Form::text('username', null, ['placeholder'=>'Username:']) !!}

                                @if (count($errors) > 0)
                                    <label for="password" class="error create-account-error" generated="true">{{ $errors->first('password') }}</label>
                                @endif
                                {!! Form::password('password', ['placeholder'=>'Password:']) !!}


                                @if (count($errors) > 0)
                                    <label for="confirm_password" class="error create-account-error" generated="true">{{ $errors->first('confirm_password') }}</label>
                                @endif
                                {!! Form::password('confirm_password', ['placeholder'=>'Confirm Password:']) !!}

                                @if (count($errors) > 0)
                                    <label for="email" class="error create-account-error" generated="true">{{ $errors->first('email') }}</label>
                                @endif
                                {!! Form::text('email', null, ['placeholder'=>'Email']) !!}

                                <p class="h2">User Contact Info</p>
                                @if (count($errors) > 0)
                                    <label for="first_name" class="error create-account-error" generated="true">{{ $errors->first('first_name') }}</label>
                                @endif
                                {!! Form::text('first_name', null, ['placeholder'=>'First Name:']) !!}

                                @if (count($errors) > 0)
                                    <label for="lastname" class="error create-account-error" generated="true">{{ $errors->first('lastname') }}</label>
                                @endif
                                {!! Form::text('last_name', null, ['placeholder'=>'Last Name:']) !!}


                                @if (count($errors) > 0)
                                    <label for="address" class="error create-account-error" generated="true">{{ $errors->first('personal_address') }}</label>
                                @endif
                                {!! Form::text('personal_address', null, ['placeholder'=>'Address:']) !!}


                                @if (count($errors) > 0)
                                    <label for="city" class="error create-account-error" generated="true">{{ $errors->first('personal_city') }}</label>
                                @endif
                                {!! Form::text('personal_city', null, ['placeholder'=>'City:']) !!}


                                @if (count($errors) > 0)
                                    <label for="state" class="error create-account-error" generated="true">{{ $errors->first('personal_state') }}</label>
                                @endif
                                <div class="custom-select">
                                    {{--<select name="personal_state" id="state" >--}}
                                    {{--</select>--}}
                                    {!! Form::select('personal_state', $states, null,['id'=>'state']) !!}
                                </div>

                                @if (count($errors) > 0)
                                    <label for="zip" class="error create-account-error" generated="true">{{ $errors->first('personal_zip') }}</label>
                                @endif
                                {!! Form::text('personal_zip', null, ['placeholder'=>'Zip:']) !!}

                                @if (count($errors) > 0)
                                    <label for="phone" class="error create-account-error" generated="true">{{ $errors->first('personal_phone') }}</label>
                                @endif
                                {!! Form::text('personal_phone', null, ['placeholder'=>'Phone:']) !!}

                                @if (count($errors) > 0)
                                    <label for="fax" class="error create-account-error" generated="true">{{ $errors->first('personal_fax') }}</label>
                                @endif
                                {!! Form::text('personal_fax', null, ['placeholder'=>'Fax:']) !!}

                                <p class="h2">Account Type</p>
                                @if (count($errors) > 0)
                                    <label for="account_type" class="error create-account-error" generated="true">{{ $errors->first('account_type') }}</label>
                                @endif

                                <div id="divCompany" style="display: none;">

                                    <p class="text-center" style="margin-bottom: 10px;"><strong>Company Details</strong></p>
                                    @if (count($errors) > 0)
                                        <label for="company_name" class="error create-account-error" generated="true">{{ $errors->first('company_name') }}</label>
                                    @endif
                                    {!! Form::text('company_name', null, ['placeholder'=>'Company Name:']) !!}

                                    @if (count($errors) > 0)
                                        <label for="company_website" class="error create-account-error" generated="true">{{ $errors->first('company_website') }}</label>
                                    @endif
                                    {!! Form::text('company_website', null, ['placeholder'=>'Website URL:']) !!}

                                    @if (count($errors) > 0)
                                        <label for="company_address" class="error create-account-error" generated="true">{{ $errors->first('company_address') }}</label>
                                    @endif
                                    {!! Form::text('company_address', null, ['placeholder'=>'Company Address:']) !!}

                                    @if (count($errors) > 0)
                                        <label for="company_city" class="error create-account-error" generated="true">{{ $errors->first('company_city') }}</label>
                                    @endif
                                    {!! Form::text('company_city', null, ['placeholder'=>'Company City:']) !!}

                                    @if (count($errors) > 0)
                                        <label for="company_state" class="error create-account-error" generated="true">{{ $errors->first('company_state') }}</label>
                                    @endif

                                    {!! Form::select('company_state', $states, null,['id'=>'state']) !!}


                                    @if (count($errors) > 0)
                                        <label for="company_email" class="error create-account-error" generated="true">{{ $errors->first('company_email') }}</label>
                                    @endif
                                    {!! Form::text('company_email', null, ['placeholder'=>'Email:']) !!}

                                    @if (count($errors) > 0)
                                        <label for="company_phone" class="error create-account-error" generated="true">{{ $errors->first('company_phone') }}</label>
                                    @endif
                                    {!! Form::text('company_phone', null, ['placeholder'=>'Phone:']) !!}

                                    @if (count($errors) > 0)
                                        <label for="company_fax" class="error create-account-error" generated="true">{{ $errors->first('company_fax') }}</label>
                                    @endif
                                    {!! Form::text('company_fax', null, ['placeholder'=>'Fax:']) !!}

                                    <p class="text-center" style="margin-bottom: 10px;"><strong>Airport Name</strong></p>

                                    @if (count($errors) > 0)
                                        <label for="airport_id" class="error create-account-error" generated="true">{{ $errors->first('airport_id') }}</label>
                                    @endif
                                    {!! Form::select('airport_id', $airports, null, ['class'=>'isairport']) !!}
                                    <p style="font-size: 15px;text-align: center;margin-top: -9px;">*Airport ID will be assigned automatically</p>

                                    <hr />
                                </div>

                                <!--Renter and Instructor-->
                                <div id="divRenterInstructor" style="display: none;">
                                    <div id="div_license">
                                        <p class="text-center" style="margin-bottom: 10px;"><strong>Default Company (Optional)</strong></p>


                                        @if (count($errors) > 0)
                                            <label for="company_id" class="error create-account-error" generated="true">{{ $errors->first('company_id') }}</label>
                                        @endif
                                        <div class="custom-select">
                                            <select name="company_id" id="instructor_company_id">
                                                <option value="" disabled="disabled" selected="selected">Choose Company:</option>
                                                @foreach($companies as $company)
                                                <option value="{{ $company->id }}">{{ $company->name }}s</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <p class="text-center" style="margin-bottom: 10px;"><strong>Flight Review Date</strong></p>
                                        @if (count($errors) > 0)
                                            <label for="last_flight_review_date" class="error create-account-error" generated="true">{{ $errors->first('last_flight_review_date') }}</label>
                                        @endif
                                        {!! Form::text('last_flight_review_date', null, ['id'=>'last_flight_review_date', 'class'=>'dtpickerr','placeholder'=>'Last Flight Review Date:']) !!}

                                        <p class="text-center" style="margin-bottom: 10px;"><strong>Custom Flight Date</strong></p>
                                        @if (count($errors) > 0)
                                            <label for="custom_date" class="error create-account-error" generated="true">{{ $errors->first('custom_date') }}</label>
                                        @endif
                                        {!! Form::text('custom_date', null, ['id'=>'custom_date', 'class'=>'dtpickerr', 'placeholder'=>'Custom Date:']) !!}

                                        <p class="text-center" style="margin-bottom: 10px;"><strong>Medical Class</strong></p>
                                        @if (count($errors) > 0)
                                            <label for="medical_class" class="error create-account-error" generated="true">{{ $errors->first('medical_class') }}</label>
                                        @endif
                                        <div class="custom-select">
                                            <select name="medical_class" id="medical_class" onchange="">
                                                <option value="" disabled="disabled" selected="selected">Choose Medical Class:</option>
                                                <option value="First">First</option>
                                                <option value="Second">Second</option>
                                                <option value="Third">Third</option>
                                            </select>
                                        </div>

                                        @if (count($errors) > 0)
                                            <label for="medical_class_date" class="error create-account-error" generated="true">{{ $errors->first('medical_class_date') }}</label>
                                        @endif
                                        {!! Form::text('medical_class_date', null, ['id'=>'medical_class_date', 'class'=>'dtpicker', 'placeholder'=>'Medical Class Date:']) !!}


                                        <p class="text-center" style="margin-bottom: 10px;"><strong>Pilot License</strong></p>

                                        <label for="licenseid" class="select-wrapper">
                                            <div class="custom-select">
                                                <select name="license_id" id="license_id" onchange="document.getElementById('license_text').value=this.options[this.selectedIndex].text">
                                                    <option value="" disabled="disabled" selected="selected">Choose License</option>
                                                    @foreach($licenses as $license)
                                                        <option value="{{ $license->id }}">{{ $license->name }}s</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </label>

                                        <!--<label for="license_number">License Number:</label>-->
                                        {!! Form::text('license_number', null, ['placeholder'=>'License Number:']) !!}

                                        <!--<label for="license_exp_date">Expiration Date:</label>-->
                                        <input type="hidden" name="license_exp_date" id="license_exp_date" placeholder="Expiration Date:" value="2015-01-01"/>
                                        <!--<label for="license_issue_date">Issue Date:</label>-->
                                        <input type="hidden" name="license_issue_date" id="license_issue_date" placeholder="Issue Date:"  value="2015-01-01"/>
                                        <a class="btn" href="#license" id="btnAdd" onclick="AddLicense();" >+ Add License</a>
                                        <input type="hidden" name="license_text" id="license_text" value="" />
                                        <div id="divResult"></div>
                                    </div>
                                    <hr />
                                </div>

                                <div id="div_terms-policy-agreement">

                                    <div class="terms-policy-agreement-check">

                                        <input type="checkbox" name="terms_policy_agreement" value="terms-policy-agreement" id="terms_policy_agreement" />
                                    </div>
                                    <!-- </div> -->
                                    <div class="terms-policy-agreement-content">
                                        I have read and accepted the <a href="{{ url('/') }}" target="_blank">Terms of Use</a> and <a href="{{ url('/') }}" target="_blank">Privacy Policy</a>.
                                    </div>
                                    @if (count($errors) > 0)
                                        <label for="terms_policy_agreement" class="error create-account-error" generated="true">{{ $errors->first('terms_policy_agreement') }}</label>
                                    @endif
                                </div>

                                <hr>

                                <div class="join-wingz-online-button">
                                    <p class="text-center"><input type="submit" class="btn submit" name="btn_submit" value="Join Wingz Online" /></p>
                                </div>

                            {!! Form::close() !!}
                        </div>
                        <script type="text/javascript">

                            var moment = rome.moment;
                            rome(medical_class_date, {
                                "inputFormat": "MM/DD/YYYY"
                                ,time: false
                            });

                            rome(custom_date, {
                                "inputFormat": "MM/DD/YYYY"
                                ,time: false
                            });

                            rome(last_flight_review_date, {
                                "inputFormat": "MM/DD/YYYY"
                                ,time: false
                            });

                            rome(license_exp_date, {
                                "inputFormat": "MM/DD/YYYY"
                                ,time: false
                            });

                            rome(license_issue_date, {
                                "inputFormat": "MM/DD/YYYY"
                                ,time: false
                            });


                            $('#account_type').on('change', function() {
                                customDisplay(this);
                            });

                            $('#account_type').is(':selected', function() {
                                console.log(this);
                                customDisplay(this);
                            });

                            function customDisplay(custom) {

                                if(custom.value=='renter' || custom.value=='instructor')
                                {

                                    $("#divInstructor" ).hide();
                                    $("#divCompany" ).hide();
                                    $("#divRenterInstructor").show();
                                    $("#div_terms-policy-agreement").show();

                                }else if(custom.value=='company'){
                                    $("#divInstructor" ).hide();
                                    $("#divCompany" ).show();
                                    $("#div_terms-policy-agreement").show();
                                    $("#divRenterInstructor").hide();

                                }else{
                                    $( "#divInstructor" ).hide();
                                    $( "#divCompany" ).hide();
                                    $( "#divRenterInstructor").hide();
                                    $( "#div_terms-policy-agreement").hide();
                                }

                            }

                            function AddLicense(){


                                $.post('../wp-content/themes/wingzonline/wingzonline_includes/ajax/license_ajax.html', {
                                    license_id: $('#license_id').val(),
                                    license_number: $('#license_number').val(),
                                    license_exp_date: $('#license_exp_date').val(),
                                    license_issue_date: $('#license_issue_date').val(),
                                    license_text: $('#license_text').val(),
                                    action: 'add'

                                }, function(response) {
                                    // log the response to the console
                                    $('#divResult').html(response);
                                    var foundin = $('#divResult').text().indexOf('required') > -1;
                                    if(!foundin)
                                    {
                                        $('#license_id').val('');
                                        $('#license_number').val('');
                                        $('#license_exp_date').val('');
                                        $('#license_issue_date').val('');
                                        $('#license_text').val('');

                                    }

                                    var found = $('#divResult').html().indexOf('tblAddedLicenses') > -1;

                                    if(!found){
                                        $("#hdnResult").val('');
                                    }else{
                                        $("#hdnResult").val('pass');
                                    }

                                });



                            }

                            function RemoveLicense(arrayId)
                            {
                                $.post('../wp-content/themes/wingzonline/wingzonline_includes/ajax/license_ajax.html', {
                                    arrayID: arrayId,
                                    action: 'delete'
                                }, function(response) {
                                    // log the response to the console

                                    $('#divResult').html(response);

                                    var found = $('#divResult').html().indexOf('tblAddedLicenses') > -1;

                                    if(!found){
                                        $("#hdnResult").val('');
                                    }else{
                                        $("#hdnResult").val('pass');
                                    }

                                });
                            }

                        </script>


                    </section>




                </div><!--end col-->

            </div><!--end wrap-->

        </section><!--end intro-->

    </div><!--end content-->


@endsection