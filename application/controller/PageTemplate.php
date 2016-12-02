<?php

/*
 * 
 * Author: Ilya
 */

class PageTemplate extends Controller {
    
    public $user = '';
    
    public function search() {
        // TODO move from home.php
        $query = "";
        $filters = "";
        if( isset( $_POST['query']))    
            $query = $_POST['query'];
        if( isset($_POST['filters']))
            $filters = $_POST['filters'];
      
        $query_array = explode(" ", $query);
        
        $filters_array = array();
        
        /* rawurldecode() converts any "%##" (unsafe chars) to its actual value */
        /* parse_str() creates array of key/value pairs based on a URL argument string */
        parse_str(rawurldecode($filters), $filters_array);
        
        /* Minor handling for $filters_array and $query_array */
        foreach ($filters_array as $f_key=>$f_val)
        {
            /* Remove empty value elements in array */
            if ($f_val === ''){
                unset($filters_array[$f_key]);
            }
            
            /* Pass any unique values from $filters to $query */
            if ((is_numeric($f_val) || is_string($f_val)) &&
                                     (!in_array ($f_val,$query_array))){
                array_push($query_array, $f_val);
            }
        }
        
        $apartments = $this->apartment_db->search( $query_array, $filters_array);
        
        $results = "";
        if( !$apartments) {
            $results = "No Results!";
        } else {
            $results .=  $this->displayApartments( $apartments);   
        }

        echo $results;
    }
    
//    private function formatApartment() {
    private function displayApartments($apartments) {
        // TODO move from home.php
        $results = '<div class="pull-right">Total apartments:' . count( $apartments) . ' </div><br><br><div class="row">';
        $i = 0;
        foreach ( $apartments as $apartment) {
            $results .= '<div class="col-sm-4 col-lg-4 col-md-4">
                    <div class="thumbnail">';
            if( isset( $apartment->thumbnail)){
                $results .= '<img src="data:image/jpeg;base64,'.base64_encode( $apartment->thumbnail).'" alt="" style="cursor: pointer;height:150px;width:320px;" data-toggle="modal" data-target="#aptModal">'; 
            } else {
                $results .= '<img src="http://placehold.it/320x150" alt="" style="cursor: pointer;height:150px;width:320px;" data-toggle="modal" data-target="#aptModal">';
            }
            $results .= '<div class="caption">';
            if( isset( $apartment->actual_price)) $results .= '<h4 class="pull-right">$'. htmlspecialchars( $apartment->actual_price).'</h4>';
            if( isset( $apartment->id))$results .= '<h4><a href="" data-toggle="modal" data-target="#aptModal">'.htmlspecialchars( $apartment->id).'</a></h4>
                             <ul class="columns" data-columns="2">';
            if( isset( $apartment->rental_term)) $results .= '<li>Rent term: '.htmlspecialchars( $apartment->rental_term).'</li>';
            if( isset( $apartment->bedroom)) $results .= '<li>Bedrooms: '.htmlspecialchars( $apartment->bedroom).'</li>';
            if( isset( $apartment->area_code)) $results .= '<li>Area code: '.htmlspecialchars( $apartment->area_code).'</li>';
            $results .= '</ul>
                        </div>
                        <div class="ratings">
                            <!--<button type="button" class="btn btn-success btn-sm pull-right">Rent now</button>-->
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#aptModal'.$i.'">See more details</button>
                            <div class="modal fade" id="aptModal'.$i.'" role="dialog" style="color: #000">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Details on Apartment</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="row">
                                                    <div class="row-height">
                                                        <div class="col-sm-6 col-height">
                                                         <!--http://www.bootply.com/XiWUwjbGtB -->
                                                            <!-- main slider carousel -->
                                                            <div class="row">
                                                                <div class="col-md-12" id="slider">
                                                                    <div class="col-md-12" id="carousel-bounding-box">
                                                                        <div id="myCarousel" class="carousel slide">
                                                                            <!-- main slider carousel items -->
                                                                            <div class="carousel-inner">';
            $images = $this->apartment_db->getImageDB( $apartment->id);
            $j = 0;
            
            foreach( $images as $image) {
                if( $j == 0) {
                    $results .= '<div class="active item" data-slide-number="'.$j.'"><img src="data:image/jpeg;base64,'.base64_encode( $image->image).'" class="img-responsive" style="width:1200px;height:480;"></div>';
                } else {
                    $results .= '<div class="item" data-slide-number="'.$j.'"><img src="data:image/jpeg;base64,'.base64_encode( $image->image).'" class="img-responsive" style="width:1200px;height:480;"></div>';
                }
                $j++;
            }
            
            $results .= '</div>
                                                                            <!-- main slider carousel nav controls --> <a class="carousel-control left" href="#myCarousel" data-slide="prev">‹</a>
                                                                            <a class="carousel-control right" href="#myCarousel" data-slide="next">›</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/main slider carousel-->
                                                            <br>
                                                            <!-- thumb navigation carousel -->
                                                            <div class="col-md-12 hidden-sm hidden-xs" id="slider-thumbs">
                                                                <!-- thumb navigation carousel items -->
                                                                <ul class="list-inline">';
            
            $j = 0;
            foreach( $images as $image) {
                if( $j == 0){
                    $results .= '<li> <a id="carousel-selector-'.$j.'" class="selected"><img src="data:image/jpeg;base64,'.base64_encode( $image->image).'" class="img-responsive" style="height:80px;width:60px;"></a></li>';
                } else {    
                    $results .= '<li> <a id="carousel-selector-'.$j.'"><img src="data:image/jpeg;base64,'.base64_encode( $image->image).'" class="img-responsive" style="height:80px;width:60px;"></a></li>';
                }
                $j++;
            }    
            
            $results .= '</ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-height col-top">';
            if( isset( $apartment->description)) $results .= '<h1> Description </h1>
                                                            <p align ="justify" style="padding-right: 20px">'
                                                            . htmlspecialchars( $apartment->description) .    
                                                            '</p>';                                                        
            $results .= '</div>
                                                    </div>
                                                </div>

                                                <!--<div class="col-sm-6 col-height">

                                                    <h1> Map </h1>

                                                    <div id="map" style="width:400px;height:400px;background:yellow"></div>

                                                    <script>
                                                        function myMap() {
                                                            var mapCanvas = document.getElementById("map");
                                                            var mapOptions = {
                                                                center: new google.maps.LatLng(51.5, -0.2), zoom: 10
                                                            };
                                                            var map = new google.maps.Map(mapCanvas, mapOptions);
                                                        }
                                                    </script>

                                                    <script src="https://maps.googleapis.com/maps/api/js?callback=myMap"></script>

                                                </div>-->

                                                <div class="col-sm-6 col-height">

                                                    <h1> Amenities/Filtered </h1>
                                                    <ul style="font-size: 16px">';
            if( isset( $apartment->actual_price)) $results .= '<li> <strong>Price: </strong>$'. htmlspecialchars( $apartment->actual_price) .'</li>';
            if( isset( $apartment->bedroom)) $results .= '<li> <strong>Bedrooms: </strong>'. htmlspecialchars( $apartment->bedroom) .'</li>';
            if( isset( $apartment->area_code)) $results .= '<li> <strong>Zip code: </strong>'. htmlspecialchars( $apartment->area_code) .'</li>';
//            if( isset( $apartment->)) $results .= '<li> <strong>Distance: </strong>'..'</li>';
            if( isset( $apartment->rental_term)) $results .= '<li> <strong>Availability term: </strong>'. htmlspecialchars( $apartment->rental_term) .'</li>';
            if( isset( $apartment->pet_friendly)) {
                $results .= '<li> <strong>Pet friendly: </strong>';
                if( $apartment->actual_price == 0)
                    $results .= htmlspecialchars ( 'No');
                else
                    $results .= htmlspecialchars ( 'Yes');
                $results .= '</li>';
            }
            if( isset( $apartment->parking)) {
                $results .= '<li> <strong>Parking available: </strong>';
                if( $apartment->parking == 0)
                    $results .= htmlspecialchars ( 'No');
                else
                    $results .= htmlspecialchars ( 'Yes');
                $results .= '</li>';    
            }
//            if( isset( $apartment->actual_price)) $results .= '<li> <strong>Tags: </strong>Spacious, comfy, inviting</li';>
            $results .= '</ul>

                                                    <!--<button type="button" class="btn btn-success btn-lg">Rent now</button>-->

                                                    <p>
                                                        <br>
                                                        Or need more information before renting apartment? Contact landlord below.
                                                        <br>
                                                    </p>
                                                      
                                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#contactLandlord">Contact Landlord</button>

                                                    <div id="contactLandlord" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="contactLandlordLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                    <h3 id="myModalLabel">Contact form</h3>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form class="form-horizontal col-sm-12">
                                                                        <div class="form-group"><label>Name</label><input class="form-control required" placeholder="Your name" data-placement="top" data-trigger="manual" data-content="Must be at least 3 characters long, and must only contain letters." type="text"></div>
                                                                        <div class="form-group"><label>E-Mail</label><input class="form-control email" placeholder="email@you.com (so that we can contact you)" data-placement="top" data-trigger="manual" data-content="Must be a valid e-mail address (user@gmail.com)" type="text"></div>
                                                                        <div class="form-group"><label>Message</label><textarea class="form-control" placeholder="Your message here.." data-placement="top" data-trigger="manual" rows="5"></textarea></div>
                                                                        <div class="form-group"><button type="submit" class="btn btn-success pull-right">Send It!</button> <p class="help-block pull-left text-danger hide" id="form-error">&nbsp; The form is not valid. </p></div>
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>'; 
            $i++;
        }
        
        $results .= '<div class="col-sm-4 col-lg-4 col-md-4">
                    <p>Click below to view more results</p>
                    <a class="btn btn-primary">More results</a>
                </div>';
        return $results;
    }
    
    public function login() {
        
        //TODO create login
    }
    
    public function logout() {
        $user = '';
        //TODO create logout
    }
    
    public function checkLogin() {
        // TODO check if implementation needed
    }
    
    private function validateEmail( $email) {
        $email_validation = explode( '@', $email);
        if($email_validation[1] == "mail.sfsu.edu") {
            // TODO
        }
        return $email;
    }
}
