<?php

/**
 * MyPlaceUtils is a storage class of commonly used functions and misc functions.
 *
 * @author Jimmy
 */
class MyPlaceUtils {
    
    /**
     * Creates a thumbnail of the given width and height based on the given image.
     * 
     * @param String $image_file - directory path with image file name.
     * @param int $thumbnail_width - the desired width of the thumbnail.
     * @param int $thumbnail_height - the desired height of the thumbnail. 
     * @return String - the thumbnail data to be encoded and displayed.
     */
    public static function createThumbnail($image_file, $thumbnail_width, $thumbnail_height){

        /* Get the dimensions of the original image */
        list($width,$height) = getimagesize($image_file);

        /* Create a blank thumbnail of given width and height */
        $thumbnail_canvas    = imagecreatetruecolor($thumbnail_width,$thumbnail_height);
        /* Extract and convert the contents of the given image file as resource type */
        $given_image_rsrc    = imagecreatefromstring(file_get_contents($image_file));

        /* Copy/draw the original image onto the thumbnail canvas at given sizes */
        imagecopyresized($thumbnail_canvas,$given_image_rsrc,0,0,0,0,$thumbnail_width,$thumbnail_height,$width,$height);

        /* Buffer and capture the raw data from the newly created thumbnail */
        ob_start();                     //activate buffer to capture output content
        imagepng($thumbnail_canvas);    //outputs the thumbnail content.
        $thumbnail_contents = \ob_get_contents();   //capture contents in buffer
        ob_end_clean();                 //deactivate buffer
        
        return $thumbnail_contents;
    }
}
