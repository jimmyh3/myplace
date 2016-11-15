<?php
/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Home extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        // load views

        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';
        
    }

    public function search( ) {
        $query = "default";
        $filters = "default";
        if( isset( $_POST['query']))    
            $query = $_POST['query'];
        if( isset($_POST['filters']))
            $filters = $_POST['filters'];
        
        $query_array = explode(" ", $query);
         
        $apartments = $this->model->getApartmentDB( $query_array, $filters);
        $results = "";
        if( !$apartments) {
            $results = "No Results!";
        } else {
            $results .= $this->displayApartments( $apartments);   
        }

        echo $results;
    }
       
    public function displayApartments( $apartments)
    {
        $results = "";
        foreach ( $apartments as $apartment) {
                $results .= '<div class="col-sm-4 col-lg-4 col-md-4">
                    <div class="thumbnail">';
                if( isset($apartment->thumbnail)) $results .= '<img src="data:image/jpeg;base64,'.base64_encode($apartment->thumbnail).'">';    
                if( isset($apartment->actual_price)) $results .= '<div class="caption"><h4 class="pull-right">'.htmlspecialchars($apartment->actual_price, ENT_QUOTES, 'UTF-8').'</h4>';
                if( isset($apartment->id)) $results .= '<h4><a href="#">'.htmlspecialchars($apartment->id, ENT_QUOTES, 'UTF-8').'</a></h4>';
                if( isset($apartment->description)) $results .= htmlspecialchars($apartment->description, ENT_QUOTES, 'UTF-8');
                $results .='</div><div class="ratings"><button type="button" class="btn btn-primary btn-sm pull-right">Rent now</button>
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#aptModal">See more details</button>
                            <div class="modal fade" id="aptModal" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Modal Header</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="row">
                                                    <div class="row-height">
                                                        <div class="col-sm-6 col-height">
                                                            <div class="row">
                                                                <div class="col-md-12" id="slider">
                                                                    <div class="col-md-12" id="carousel-bounding-box">
                                                                        <div id="myCarousel" class="carousel slide">
                                                                            <div class="carousel-inner">
                                                                                <div class="active item" data-slide-number="0">
                                                                                    <img src="http://placehold.it/1200x480&amp;text=one" class="img-responsive">
                                                                                </div>
                                                                                <div class="item" data-slide-number="1">
                                                                                    <img src="http://placehold.it/1200x480&amp;text=two" class="img-responsive">
                                                                                </div>
                                                                                <div class="item" data-slide-number="2">
                                                                                    <img src="http://placehold.it/1200x480&amp;text=three" class="img-responsive">
                                                                                </div>
                                                                                <div class="item" data-slide-number="3">
                                                                                    <img src="http://placehold.it/1200x480&amp;text=four" class="img-responsive">
                                                                                </div>
                                                                                <div class="item" data-slide-number="4">
                                                                                    <img src="http://placehold.it/1200x480&amp;text=five" class="img-responsive">
                                                                                </div>
                                                                                <div class="item" data-slide-number="5">
                                                                                    <img src="http://placehold.it/1200x480&amp;text=six" class="img-responsive">
                                                                                </div>
                                                                                <div class="item" data-slide-number="6">
                                                                                    <img src="http://placehold.it/1200x480&amp;text=seven" class="img-responsive">
                                                                                </div>
                                                                                <div class="item" data-slide-number="7">
                                                                                    <img src="http://placehold.it/1200x480&amp;text=eight" class="img-responsive">
                                                                                </div>
                                                                            </div>
                                                                            <a class="carousel-control left" href="#myCarousel" data-slide="prev">‹</a>

                                                                            <a class="carousel-control right" href="#myCarousel" data-slide="next">›</a>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <br>

                                                            <div class="col-md-12 hidden-sm hidden-xs" id="slider-thumbs">

                                                                <ul class="list-inline">
                                                                    <li> <a id="carousel-selector-0" class="selected">
                                                                            <img src="http://placehold.it/80x60&amp;text=one" class="img-responsive">
                                                                        </a></li>
                                                                    <li> <a id="carousel-selector-1">
                                                                            <img src="http://placehold.it/80x60&amp;text=two" class="img-responsive">
                                                                        </a></li>
                                                                    <li> <a id="carousel-selector-2">
                                                                            <img src="http://placehold.it/80x60&amp;text=three" class="img-responsive">
                                                                        </a></li>
                                                                    <li> <a id="carousel-selector-3">
                                                                            <img src="http://placehold.it/80x60&amp;text=four" class="img-responsive">
                                                                        </a></li>
                                                                    <li> <a id="carousel-selector-4">
                                                                            <img src="http://placehold.it/80x60&amp;text=five" class="img-responsive">
                                                                        </a></li>
                                                                    <li> <a id="carousel-selector-5">
                                                                            <img src="http://placehold.it/80x60&amp;text=six" class="img-responsive">
                                                                        </a></li>
                                                                    <li> <a id="carousel-selector-6">
                                                                            <img src="http://placehold.it/80x60&amp;text=seven" class="img-responsive">
                                                                        </a></li>
                                                                    <li> <a id="carousel-selector-7">
                                                                            <img src="http://placehold.it/80x60&amp;text=eight" class="img-responsive">
                                                                        </a></li>
                                                                </ul>

                                                            </div>


                                                        </div>

                                                        <div class="col-sm-6 col-height col-top">


                                                            <h1> Description </h1>';
                                                            
                if( isset($apartment->description)) $results .= htmlspecialchars($apartment->description, ENT_QUOTES, 'UTF-8');
                $results .= '</div></div></div>
                                                <div class="col-sm-6 col-height">
                                                    // map goes here
                                                </div>

                                                <div class="col-sm-6 col-height">

                                                    <h1> Amenities/Filtered </h1>
                                                    <p>
                                                        Blah blah blah...<br>
                                                        Maybe tags at the bottom <br>
                                                        Contact button<br>

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
                                            <p>This is a small modal.</p>
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
        }
        return $results;
    }
    
    public function getFilters() {
        if( isset($_POST['filters'])) {
            $result = array();
            $filters = explode('&',$_POST['filters']);
            foreach( $filters as $filter) {
                $key_value = explode( '=', $filter);
                if( $key_value[ 1] !== '') $result[ $key_value[ 0]] = $key_value[ 1];
            }
            echo $result;
        } else 
            echo "Filters not found";
    }
}
