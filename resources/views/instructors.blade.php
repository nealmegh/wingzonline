@extends('static-layout')

@section('content')

    <div id="content">
        <section>

            <header>
                <h1 class="page-title"></h1>
            </header>

            <div class="wrap cf">
                <div class="m-all t-all d-all cf">

                    <section class="entry-content cf">

                        <div id='divCreateAccount'>

                            <div>
                                <div class="login-form-admin">

                                    <h1 class="margintop40 text-center" style=""><strong>Instructor Sign Up</strong></h1><hr>
                                    <p  style="text-align: center;">
                                        Sign up for a <strong>FREE</strong> account before<br> you are eligible to be booked by renters:
                                    </p>

                                    <p  style="text-align: center;">
                                        <strong>Register</strong>
                                    </p>

                                    <div class="login" id="theme-my-login1">

                                        {!! Form::open(['url'=>'wingz/instructors']) !!}
                                        {{--<form name="loginform" id="loginform1" action="" method="post">--}}
                                            <p>
                                                <input type="text" name="first_name" id="user_login1" class="input" placeholder="FIRST NAME" value="" size="20" />
                                            </p>
                                            <p>
                                                <input type="text" name="last_name" id="user_login1" class="input" placeholder="LAST NAME" value="" size="20" />
                                            </p>
                                            <p>
                                                <input type="text" name="username" id="user_login1" class="input" placeholder="USERNAME" value="" size="20" /><span class="fa fa-user login-u-icon"></span>
                                                <!-- <span class="glyphicon glyphicon-user login-u-icon"></span> -->
                                            </p>

                                            <p>
                                                <label for="password" class="error create-account-error" generated="true"></label>
                                                <input type="password" name="password" id="password" placeholder="Password:" />
                                                <span class="fa fa-lock login-u-icon"></span>
                                            </p>
                                            <p>
                                                <label for="confirm_password" class="error create-account-error" generated="true"></label>
                                                <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password:" />
                                            </p>
                                            <p>
                                                <label for="email" class="error create-account-error" generated="true"></label>
                                                <input type="text" name="personal_email" id="email" value="" placeholder="Email:" />
                                            </p>

                                            <p  style="text-align: center;">
                                                <strong>Address</strong>
                                            </p>

                                            <label for="address" class="error create-account-error" generated="true"></label>
                                            <input type="text" name="personal_address" id="address" value="" placeholder="Address:" />
                                            <label for="city" class="error create-account-error" generated="true"></label>
                                            <input type="text" name="personal_city" id="city" value="" placeholder="City:" />

                                            <label for="state" class="select-wrapper error create-account-error" generated="true"></label>
                                            <div class="marginbottom10" id="blu-arrow-wrapper">
                                                <select name="personal_state" id="blu-arrow">
                                                    <option value="" disabled="disabled" selected="selected">Select State:</option>
                                                    <option value="AL" >Alabama</option>
                                                    <option value="AK" >Alaska</option>
                                                    <option value="AZ" >Arizona</option>
                                                    <option value="AR" >Arkansas</option>
                                                    <option value="CA" >California</option>
                                                    <option value="CO" >Colorado</option>
                                                    <option value="CT" >Connecticut</option>
                                                    <option value="DE" >Delaware</option>
                                                    <option value="DC" >District Of Columbia</option>
                                                    <option value="FL" >Florida</option>
                                                    <option value="GA" >Georgia</option>
                                                    <option value="HI" >Hawaii</option>
                                                    <option value="ID" >Idaho</option>
                                                    <option value="IL" >Illinois</option>
                                                    <option value="IN" >Indiana</option>
                                                    <option value="IA" >Iowa</option>
                                                    <option value="KS" >Kansas</option>
                                                    <option value="KY" >Kentucky</option>
                                                    <option value="LA" >Louisiana</option>
                                                    <option value="ME" >Maine</option>
                                                    <option value="MD" >Maryland</option>
                                                    <option value="MA" >Massachusetts</option>
                                                    <option value="MI" >Michigan</option>
                                                    <option value="MN" >Minnesota</option>
                                                    <option value="MS" >Mississippi</option>
                                                    <option value="MO" >Missouri</option>
                                                    <option value="MT" >Montana</option>
                                                    <option value="NE" >Nebraska</option>
                                                    <option value="NV" >Nevada</option>
                                                    <option value="NH" >New Hampshire</option>
                                                    <option value="NJ" >New Jersey</option>
                                                    <option value="NM" >New Mexico</option>
                                                    <option value="NY" >New York</option>
                                                    <option value="NC" >North Carolina</option>
                                                    <option value="ND" >North Dakota</option>
                                                    <option value="OH" >Ohio</option>
                                                    <option value="OK" >Oklahoma</option>
                                                    <option value="OR" >Oregon</option>
                                                    <option value="PA" >Pennsylvania</option>
                                                    <option value="RI" >Rhode Island</option>
                                                    <option value="SC" >South Carolina</option>
                                                    <option value="SD" >South Dakota</option>
                                                    <option value="TN" >Tennessee</option>
                                                    <option value="TX" >Texas</option>
                                                    <option value="UT" >Utah</option>
                                                    <option value="VT" >Vermont</option>
                                                    <option value="VA" >Virginia</option>
                                                    <option value="WA" >Washington</option>
                                                    <option value="WV" >West Virginia</option>
                                                    <option value="WI" >Wisconsin</option>
                                                    <option value="WY" >Wyoming</option>

                                                </select>
                                            </div>

                                            <label for="zip" class="error create-account-error" generated="true"></label>
                                            <input type="text" name="personal_zip" id="zip" value="" placeholder="Zip:" />

                                            <label for="phone" class="error create-account-error" generated="true"></label>
                                            <input type="text" name="personal_phone" id="phone" value="" placeholder="Phone:" />
                                            <p><hr></p>
                                            <p style="text-align: center;">
                                                <strong>Instructor's Company</strong>
                                            </p>

                                            <label for="state" class="select-wrapper error create-account-error" generated="true"></label>
                                            <div class="" id="blu-arrow-wrapper">
                                                <select name="company" id="blu-arrow">
                                                    <option value="" disabled="disabled" selected="selected">Company</option>
                                                    <option value="AL" >Alabama</option>
                                                    <option value="AK" >Alaska</option>
                                                    <option value="AZ" >Arizona</option>

                                                </select>
                                            </div>



                                            <div id="div_terms-policy-agreementt">
                                                <p class="terms-policy-agreement">
                                                    <!-- <div class="squaredFour"> -->
                                                    <label for="terms_policy_agreement" class="error create-account-error" generated="true"></label>
                                                <div class="terms-policy-agreement-check">
                                                    <input type="checkbox" name="terms_policy_agreement" value="terms-policy-agreement" id="terms_policy_agreement" />
                                                </div>
                                                <!-- </div> -->
                                                <div class="terms-policy-agreement-content">
                                                    I have read and accepted the <a href="../terms-conditions/index.html" target="_blank">Terms of Use</a> and <a href="../privacy-policy/index.html" target="_blank">Privacy Policy</a>.
                                                </div>
                                                </p>
                                            </div>




                                            <input type="hidden" name="_wp_original_http_referer" value="/" />


                                            <p class="submit">
                                                <input type="submit" id="wp-submit1" class="btn no-radius" value="Join Wingz Online" />

                                            </p>
                                        </form>

                                    </div>

                                </div>
                            </div><!-- end remodal -->



                        </div>


                    </section>




                </div><!--end col-->

            </div><!--end wrap-->

        </section><!--end intro-->

    </div><!--end content-->


@endsection