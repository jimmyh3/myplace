<?php

    echo "<h3>This is test.php dumping ground for test output. </h3>";
    foreach($apartments as $apartment)
    {
        echo "<p>Apartment Record</p>";
        //echo "<p>" . $apartment->tags . "</p>";
        
        foreach($apartment->tags as $tags)
        {
            echo "<p>" . $tags . "</p>";
        }
    }
?>

<!--<div class="container">
    <p><strong>This is the testing page for your garbage. </strong></p>
</div>-->


