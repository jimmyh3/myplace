<div id="headerwrap">
		<div class="container">
			<div class="row">
				<h1>myPlace</h1>
				<br>
				<h3>Apartments for SFSU students</h3>
				<br>
				<br>
				<div class="col-lg-6 col-lg-offset-3">
				</div>
			</div>
		</div><!-- /container -->
	</div><!-- /headerwrap -->   

<div class="container" style="padding-top: 30px;" id="mainPage">
     
        
    <div class="row">
        <div id="result_test"></div>
        <div class="col-md-3">

        <form id="ajax_filter_form" method="POST">
            <p class="lead">Refine your search</p>
            <div class="panel panel-footer">

                <div class="form-group">
                    <label for="sort_by_sel">Sort By:</label>
                    <select class="form-control" id="sort_by_sel">
                        <option>Any</option>
                        <option>Price: Low to High</option>
                        <option>Price: High to Low</option>
                        <option>Distance: Closest to SFSU</option>
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
                    <label> 
                        <input type="hidden" name="pet_friendly" value="" />
                        <input type="checkbox" name="pet_friendly" value="true">Pet Friendly
                    </label>
                </div>
                

                <div class="checkbox" class="list-group-item">
                    <label>
                        <input type="hidden" name="parking" value="" />
                        <input type="checkbox" name="parking"value="true">Parking available
                    </label>
                </div>
                
                <input type="submit" class="btn btn-info" value="Refine" />
            </div>
        </form>
        </div>

        <div class="col-md-9">
            <div class="row" id="results">
                <?php echo $this->search(); ?>
            </div>
        </div>

    </div>
</div>

