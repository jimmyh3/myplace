<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<!-- 
Corner Ribbon ~~!>
<style>
@import url('http://fonts.googleapis.com/css?family=Noto+Sans:400,700');

*{
  margin: 0;
  padding: 0;
}

body{
  background: #f0f0f0;
  font-family: 'Noto Sans', sans-serif;
}

h1{
  width: 500px;
  height: 100px;
  position: fixed;
  top: 50%;
  left: 50%;
  margin: -100px 0 0 -275px;
  font-size: 3.2em;
  font-weight: 700;
  text-align: center;
  text-transform: uppercase;
  line-height: 100px;
  color: #aaa;
}

h2{
  width: 500px;
  height: 100px;
  position: fixed;
  top: 50%;
  left: 50%;
  margin: 0 0 0 -225px;
  font-size: 1.6em;
  font-weight: 400;
  text-align: center;
  line-height: 100%;
  color: #bbb;
}

/* The ribbons */

.corner-ribbon{
  width: 200px;
  background: #e43;
  position: absolute;
  top: 25px;
  left: -50px;
  text-align: center;
  line-height: 50px;
  letter-spacing: 1px;
  color: #f0f0f0;
  transform: rotate(-45deg);
  -webkit-transform: rotate(-45deg);
}

/* Custom styles */

.corner-ribbon.sticky{
  position: fixed;
}

.corner-ribbon.shadow{
  box-shadow: 0 0 3px rgba(0,0,0,.3);
}

/* Different positions */

.corner-ribbon.top-left{
  top: 25px;
  left: -50px;
  transform: rotate(-45deg);
  -webkit-transform: rotate(-45deg);
}

.corner-ribbon.top-right{
  top: 25px;
  right: -50px;
  left: auto;
  transform: rotate(45deg);
  -webkit-transform: rotate(45deg);
}

.corner-ribbon.bottom-left{
  top: auto;
  bottom: 25px;
  left: -50px;
  transform: rotate(45deg);
  -webkit-transform: rotate(45deg);
}

.corner-ribbon.bottom-right{
  top: auto;
  right: -50px;
  bottom: 25px;
  left: auto;
  transform: rotate(-45deg);
  -webkit-transform: rotate(-45deg);
}

/* Colors */

.corner-ribbon.white{background: #f0f0f0; color: #555;}
.corner-ribbon.black{background: #333;}
.corner-ribbon.grey{background: #999;}
.corner-ribbon.blue{background: #39d;}
.corner-ribbon.green{background: #2c7;}
.corner-ribbon.turquoise{background: #1b9;}
.corner-ribbon.purple{background: #95b;}
.corner-ribbon.red{background: #e43;}
.corner-ribbon.orange{background: #e82;}
.corner-ribbon.yellow{background: #ec0;}
</style>

End of Corner Ribbon~~!>
 -->
<div id="headerwrap">
    <div class="container">
        <div class="row">
            <h1>myPlace</h1><br>
            <h3>Apartments for SFSU students</h3><br><br>
            <p><button class="w3-btn w3-padding-large w3-large" id="ajax_view_all_apartments">ALL APARTMENTS</button></p>
            <div class="col-lg-6 col-lg-offset-3">
            </div>
        </div>
    </div>
</div>

<div class="container" style="padding-top: 30px;" id="mainPage">
    <div class="row">
        <div id="result_test"></div>
        <div class="col-md-3">
            
            
<!--            <form id="ajax_filter_form" method="POST">
                <div class="form-group">
                    <label for="sort_by_sel">Sort By:</label>
                    <select class="form-control" id="sort_by_sel">
                    Storing order value breaks search function since order is not a searchable column in the database 
                    <select name="order" class="form-control" id="sort_by_sel">
                        <option value="0">Any</option>
                        <option value="1">Price: Low to High</option>
                        <option value="2">Price: High to Low</option>
                    </select
                </div>
                <input type="submit" class="btn btn-info pull-right" value="Sort">
            </form>-->
            
            
            <form id="ajax_filter_form" method="POST">

                <div class="panel panel-footer clearfix">
                    <p class="lead">Filters</p>

                    <form>
                        <div class="form-group">
                            <label for="sort_by_sel">Sort By:</label>
                            <!--<select class="form-control" id="sort_by_sel">-->
                            <!--Storing order value breaks search function since order is not a searchable column in the database--> 
                            <select name="order" class="form-control" id="sort_by_sel">
                                <option value="0">Any</option>
                                <option value="1">Price: Low to High</option>
                                <option value="2">Price: High to Low</option>
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
                        <input name="min_price" type="text" class="form-control" id="min_price" placeholder="Minimum">
                    </div>                   

                    <div class="form-group">
                        <!--<input name="max_price" type="text" class="form-control" id="max_price" placeholder="Maximum">-->
                        <input name="max_price" type="text" class="form-control" id="max_price" placeholder="Maximum">
                    </div>

<!--                    <div class="form-group">
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
                    </div>-->

                    <div class="form-group">
                        <label for="area_code">Zip code:</label>
                        <input name="area_code" type="text" class="form-control" id="area_code" placeholder="Any">
                    </div>

<!--                    <label>Availability Term:</label>
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
                    </div>-->
                
                    <div class="checkbox" class="list-group-item">
                        <label> <input type="checkbox" name="pet_friendly" value="1">Pet Friendly</label>
                    </div>

                    <div class="checkbox" class="list-group-item">
                        <label> <input type="checkbox" name="parking" value="1">Parking Available</label>
                    </div>

                    <div class="checkbox" class="list-group-item">
                        <label> <input type="checkbox" name="laundry" value="1">Laundry</label>
                    </div>

                    <div class="checkbox" class="list-group-item">
                        <label> <input type="checkbox" name="smoking" value="0">No Smoking</label>
                    </div>
                    
                    <div class="checkbox" class="list-group-item">
                        <label> <input type="checkbox" name="shared_room" value="1">Shared Room</label>
                    </div>

                    <div class="checkbox" class="list-group-item">
                        <label> <input type="checkbox" name="furnished" value="1">Furnished</label>
                    </div>

                    <div class="checkbox" class="list-group-item">
                        <label> <input type="checkbox" name="wheel_chair_access" value="1">Wheelchair Access</label>
                    </div>

                    <input type="reset" class="btn btn-danger" value="Clear">

                    <input type="submit" class="btn btn-info pull-right" value="Filter">
                </div>
            </form>
        </div>
    
        <div class="col-md-9">
            <div class="row" id="results">
                <div>
                    <h3>Featured Apartments</h3><br>
                    <?php echo $this->formatApartment( $this->apartment_db->getFeaturedApartments()); ?>
                </div>
                <div>
                    <h6 style="visibility: hidden;">.</h6>
                    <hr>
                    <h3>All Apartments</h3>
                    <?php echo $this->search() ?>    
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo URL; ?>js/myplace-message.js"></script>
