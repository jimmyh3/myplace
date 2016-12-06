<!DOCTYPE html 
      PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html
      xmlns="http://www.w3.org/1999/xhtml" 
      xml:lang="en-US"
      lang="en-US">
<head>
     
</head>

</html>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<div id="headerwrap">
    <div class="container">
        <div class="row">
            <h1>myPlace</h1><br>
            <h3>Apartments for SFSU students</h3><br><br>
            <p><a href="<?php echo URL; ?>home" class="w3-btn w3-padding-large w3-large">APARTMENTS</a></p>
            <div class="col-lg-6 col-lg-offset-3">
            </div>
        </div>
    </div>
</div>

<div class="container" style="padding-top: 30px;" id="mainPage">
    <div class="row">
        <div id="result_test"></div>
        <div class="col-md-3">
            <form id="ajax_filter_form" method="POST">

                <div class="panel panel-footer clearfix">
                    <p class="lead">Filters</p>

                    <div class="form-group">
                        <label for="sort_by_sel">Sort By:</label>
                        <select class="form-control" id="sort_by_sel">
                            <option>Any</option>
                            <option>Price: Low to High</option>
                            <option>Price: High to Low</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="bedroom_sel">Bedrooms:</label>
                        <select name="bedroom" class="form-control" id="bedroom_sel">
                            <option value="">Any</option>
                            <option value="1">1</option>
                            <option value="2">2</option>                        
                            <option value="3">3+</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="price_sel">Price:</label>
                        <!--<input name="min_price" type="text" class="form-control" id="min_price" placeholder="Minimum">-->
                        <input name="actual_price[]" type="text" class="form-control" id="min_price" placeholder="Minimum">
                    </div>                   

                    <div class="form-group">
                        <!--<input name="max_price" type="text" class="form-control" id="max_price" placeholder="Maximum">-->
                        <input name="actual_price[]" type="text" class="form-control" id="max_price" placeholder="Maximum">
                    </div>

                    <div class="form-group">
                        <label for="price_sel">Price:</label>
                        <select class="form-control" id="price_sel">
                            <option>Any</option>
                            <option>Lowest to highest</option>
                            <option>Highest to lowest</option>
                            <option>Less than $500</option>
                            <option>Between $500 and $999</option>
                            <option>Between $1000 and $1499</option>
                            <option>$1500+</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="area_code">Zip code:</label>
                        <input name="area_code" type="text" class="form-control" id="area_code" placeholder="Any">
                    </div>

                    <label>Availability Term:</label>
                    <div class="input-group">
                        <select name="begin_term" class="form-control" id="start_term_sel">
                            <option value="">Any</option>
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
                        </select>

                        <span class="input-group-addon">-</span>
                        <select name="end_term" class="form-control" id="end_term_sel">
                            <option value="">Any</option>
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
                        </select>
                    </div>

                    <div class="checkbox" class="list-group-item">
                        <label> <input type="checkbox" name="pet_friendly" value="">Pet Friendly</label>
                    </div>

                    <div class="checkbox" class="list-group-item">
                        <label> <input type="checkbox" name="parking" value="">Parking Available</label>
                    </div>

                    <div class="checkbox" class="list-group-item">
                        <label> <input type="checkbox" value="">Laundry Available</label>
                    </div>

                    <div class="checkbox" class="list-group-item">
                        <label> <input type="checkbox" value="">No Smoking</label>
                    </div>

                    <div class="checkbox" class="list-group-item">
                        <label> <input type="checkbox" value="">Shared Room</label>
                    </div>

                    <div class="checkbox" class="list-group-item">
                        <label> <input type="checkbox" value="">Furnished</label>
                    </div>

                    <div class="checkbox" class="list-group-item">
                        <label> <input type="checkbox" value="">Wheelchair accessible</label>
                    </div>

                    <input type="reset" class="btn btn-danger" value="Clear">
                    <input type="submit" class="btn btn-info pull-right" value="Filter">
                </div>
            </form>
        </div>
        
        <div class="col-md-9">
            <div class="row" id="results">
            <h3>Featured Apartments</h3><br>
                
                <?php echo $this->search(); ?>
                <?php
                //For testing
                //$results = "";
                //$users = $this->user_db->getUsers();
                //foreach( $users as $user) {
                //    $results .= "Id: " . $user->id . "<br>Name: " . $user->name . "<br>Email: " . $user->email . "<br>Password: " . $user->password . "<br>Type: " . $user->usertype . "<br><br>"; 
                //}
                //echo $results; ?>

            </div>
        </div>
    </div>
</div>
