@extends('app')

@section('page-title')
    Have your shop in our list
@endsection

@section('content')
<div class="container main-content-padded">
    <div class="row">
        <div class="col-lg-8">
            @include('shared/_form_errors')
            <form class="form-horizontal" method="post" action="{{ route('coffee-shop.applied') }}">
                <div class="form-group @if($errors->any()) {{$errors->has('name') ? 'has-error' : 'has-success'}} @endif">
                    <label for="name" class="col-sm-3 control-label">Name:</label>

                    <div class="col-sm-9">
                        <input id="name"
                               name="name"
                               type="text"
                               placeholder="The name of your coffee shop..."
                               class="form-control"
                               value="{{old('name', $coffeeShop->name)}}">
                    </div>
                </div>

                <div class="form-group @if($errors->any()) {{$errors->has('location') ? 'has-error' : 'has-success'}} @endif">
                    <label for="field-maps-location" class="col-sm-3 control-label">Address:</label>

                    <div class="col-sm-9">
                        <input id="field-maps-location"
                               name="location"
                               type="text"
                               placeholder="The address of your coffee shop..."
                               class="form-control"
                               value="{{old('location', $coffeeShop->location)}}">
                    </div>
                </div>

                <div class="form-group @if($errors->any()) {{$errors->has('postal_code') ? 'has-error' : 'has-success'}} @endif">
                    <label for="postal_code" class="col-sm-3 control-label">Postal code:</label>

                    <div class="col-sm-9">
                        <input id="postal_code"
                               name="postal_code"
                               type="text"
                               placeholder="Postal code..."
                               class="form-control"
                               value="{{old('postal_code', $coffeeShop->postal_code)}}">
                    </div>
                </div>

                <div class="form-group @if($errors->any()) {{$errors->has('phone_number') ? 'has-error' : 'has-success'}} @endif">
                    <label for="phone_number" class="col-sm-3 control-label">Phone number:</label>

                    <div class="col-sm-9 col-md-6">
                        <input id="phone_number"
                               name="phone_number"
                               type="text"
                               placeholder="Phone number..."
                               class="form-control"
                               value="{{old('phone_number', $coffeeShop->phone_number)}}">
                    </div>
                </div>

                <div class="form-group @if($errors->any()) {{$errors->has('opening_times') ? 'has-error' : 'has-success'}} @endif">
                    <label for="opening_times" class="col-sm-3 control-label">Opening times:</label>

                    <div class="col-sm-9 col-md-6">
                        <textarea id="opening_times"
                                  name="opening_times"
                                  placeholder="Mon-Wed: 09am-05pm, Fri-Sun: 09am-06pm"
                                  class="form-control">{{old('opening_times', $coffeeShop->opening_times)}}</textarea>
                    </div>
                </div>

                <div class="form-group @if($errors->any()) {{$errors->has('comment') ? 'has-error' : 'has-success'}} @endif">
                    <label for="comment" class="col-sm-3 control-label">Comment:</label>

                    <div class="col-sm-9">
                        <textarea id="comment"
                                  name="comment"
                                  placeholder="Anything particular to say?"
                                  class="form-control">{{old('comment', $coffeeShop->comment)}}</textarea>
                    </div>
                </div>

                <div class="form-group @if($errors->any()) {{$errors->has('spec_independent') ? 'has-error' : 'has-success'}} @endif">
                    <div class="col-sm-offset-3 col-sm-9">
                        <div class="checkbox">
                            <label for="spec-independent">
                                <input type="checkbox"
                                       id="spec-independent"
                                       name="spec_independent"
                                       @if(old('spec_independent', $coffeeShop->spec_independent)) checked @endif>
                                Independent
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group @if($errors->any()) {{$errors->has('spec_food_available') ? 'has-error' : 'has-success'}} @endif">
                    <div class="col-sm-offset-3 col-sm-9">
                        <div class="checkbox">
                            <label for="spec-food-available">
                                <input type="checkbox"
                                       id="spec-food-available"
                                       name="spec_food_available"
                                       @if(old('spec_food_available', $coffeeShop->spec_food_available)) checked @endif>
                                Food available
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group @if($errors->any()) {{$errors->has('spec_dog_friendly') ? 'has-error' : 'has-success'}} @endif">
                    <div class="col-sm-offset-3 col-sm-9">
                        <div class="checkbox">
                            <label for="spec-dog-friendly">
                                <input type="checkbox"
                                       id="spec-dog-friendly"
                                       name="spec_dog_friendly"
                                       @if(old('spec_dog_friendly', $coffeeShop->spec_dog_friendly)) checked @endif>
                                Dog friendly
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group @if($errors->any()) {{$errors->has('spec_free_wifi') ? 'has-error' : 'has-success'}} @endif">
                    <div class="col-sm-offset-3 col-sm-9">
                        <div class="checkbox">
                            <label for="spec-free-wifi">
                                <input type="checkbox"
                                       id="spec-free-wifi"
                                       name="spec_free_wifi"
                                       @if(old('spec_free_wifi', $coffeeShop->spec_free_wifi)) checked @endif>
                                Free wifi
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group @if($errors->any()) {{$errors->has('spec_geek_friendly') ? 'has-error' : 'has-success'}} @endif">
                    <div class="col-sm-offset-3 col-sm-9">
                        <div class="checkbox">
                            <label for="spec-geek-friendly">
                                <input type="checkbox"
                                       id="spec-geek-friendly"
                                       name="spec_geek_friendly"
                                       @if(old('spec_geek_friendly', $coffeeShop->spec_geek_friendly)) checked @endif>
                                Geek friendly
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group @if($errors->any()) {{$errors->has('spec_meeting_friendly') ? 'has-error' : 'has-success'}} @endif">
                    <div class="col-sm-offset-3 col-sm-9">
                        <div class="checkbox">
                            <label for="spec-meeting-friendly">
                                <input type="checkbox"
                                       id="spec-meeting-friendly"
                                       name="spec_meeting_friendly"
                                       @if(old('spec_meeting_friendly', $coffeeShop->spec_meeting_friendly)) checked @endif>
                                Meeting friendly
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group @if($errors->any()) {{$errors->has('spec_charging_ports') ? 'has-error' : 'has-success'}} @endif">
                    <div class="col-sm-offset-3 col-sm-9">
                        <div class="checkbox">
                            <label for="spec-charging-ports">
                                <input type="checkbox"
                                       id="spec-charging-ports"
                                       name="spec_charging_ports"
                                       @if(old('spec_charging_ports', $coffeeShop->spec_charging_ports)) checked @endif>
                                Charging ports
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group @if($errors->has('g-recaptcha-response')) has-errors @endif">
                    <label for="recaptcha" class="col-sm-3 control-label">Robot verification:</label>

                    <div class="col-sm-9">
                        <div id="recaptcha"
                             class="g-recaptcha"
                             data-sitekey="6LdFiAcTAAAAAIbzqXSusUhI7FKB6IuZT6tKYLJP"></div>
                    </div>
                </div>

                <input type="hidden"
                       name="latitude"
                       value="{{old('latitude', $coffeeShop->latitude)}}"
                       id="latitude-field">
                <input type="hidden"
                       name="longitude"
                       value="{{old('longitude', $coffeeShop->longitude)}}"
                       id="longitude-field">
                <input type="hidden"
                       name="place_id"
                       value="{{old('place_id', $coffeeShop->place_id)}}"
                       id="place-id-field">
                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}">

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <input type="submit" class="btn btn-primary" value="Send your request">
                    </div>
                </div>
            </form>
        </div>

        <div class="col-lg-4">
            <div id="maps-container" @if(isset($position)) data-position="{{$position}}" @endif></div>
        </div>
    </div>
</div>
@endsection

@section('vendor_scripts')
    <script type="text/javascript" src="//www.google.com/recaptcha/api.js"></script>
    <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
@endsection
