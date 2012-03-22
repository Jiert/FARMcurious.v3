<?php

	function register_my_menus() {
	  register_nav_menus(
	    array('header-menu' => __( 'Choose Your Menu' ) )
	  );
	}
	
	add_action( 'init', 'register_my_menus' );

	if ( function_exists( 'add_theme_support' ) ) { 
	  add_theme_support( 'post-thumbnails' ); 
	}
	
	
	function the_post_thumbnail_caption() {
	  global $post;
	
	  $thumbnail_id    = get_post_thumbnail_id($post->ID);
	  $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));
	
	  if ($thumbnail_image && isset($thumbnail_image[0])) {
	    echo '<span>'.$thumbnail_image[0]->post_excerpt.'</span>';
	  }
	}
	
	
	// Add custom Meta Box  
	function add_custom_meta_box() {  
	    add_meta_box(  
	        'custom_meta_box', // $id  
	        'Product Information: ', // $title  
	        'show_custom_meta_box', // $callback  
	        'post', // $page  
	        'normal', // $context  
	        'high'); // $priority  
	}  
	add_action('add_meta_boxes', 'add_custom_meta_box');  
	
	//OLD META DATA:
	//Product Image
	//Product Thumbnail
	//Product Price:  $17.00
	//Product Weight  2
	
	
	
	//Product PRICE: $17:00
	//Charge SHIPPING:  Y/N?
	//PRODUCT WEIGHT: 2
	//Charge Tax Y/N ?
	//DISCOUNT INFO: %
	//In stock? Y/N
	
	//Product Options:... need to think this one through
	
	//PROMOTION CODE
	//BUYERS NOTE
	//INSTOCK / SOLDOUT?
	//INCLUDE KIT OR OTHER PRODUCT
	//PRODUCT OPTIONS: COLORS, SIZE, ECT
	
	
	// Field Array for custom meta boxes  
    $prefix = 'custom_';  
    $custom_meta_fields = array(  
        
        array(  
            'label'=> 'Product Prices:',  
            'desc'  => 'Add a list of prices for this product separated by a comma <b><i>in the same order as the sizes.</i></b>: "$1.99, $2.99, $3.99".',  
            'id'    => $prefix.'prices',  
            'type'  => 'text'  
        ),
        
        array(  
            'label'=> 'Product Weight:',  
            'desc'  => 'How much does this product weigh in pounds?  Expected Value: 2.',  
            'id'    => $prefix.'weight',  
            'type'  => 'text'  
        ),
          
        array(  
            'label'=> 'Free Shipping?',  
            'desc'  => 'Click here if no shipping costs are required.',  
            'id'    => $prefix.'shipping',  
            'type'  => 'checkbox'  
        ),
        
        array(  
            'label'=> 'Remove Tax?',  
            'desc'  => 'Click here for no tax charges.',  
            'id'    => $prefix.'taxexempt',  
            'type'  => 'checkbox'  
        ),
        
        array(  
            'label'=> 'Out of stock?',  
            'desc'  => 'Click here if this product is out  of stock.',  
            'id'    => $prefix.'instock',  
            'type'  => 'checkbox'  
        ),
        
        array(  
            'label'=> 'Product Discount:',  
            'desc'  => 'Add a percent value this product should be discounted.',  
            'id'    => $prefix.'discount',  
            'type'  => 'text'  
        ),
        
        array(  
            'label'=> 'Product Colors:',  
            'desc'  => 'Add a list of colors for this product separated by a comma:"Red, Blue, Green".',  
            'id'    => $prefix.'colors',  
            'type'  => 'text'  
        ),
        
        array(  
            'label'=> 'Product Sizes:',  
            'desc'  => 'Add a list of sizes for this product separated by a comma: "big, bigger, biggest".',  
            'id'    => $prefix.'sizes',  
            'type'  => 'text'  
        )
         
    );
    
    /*
    	Need a way for Farmcurious to set which options are currently available for the product, which will appear in the drop down for the customer
    	Example: What colors are available for the bamboo utensils?
    	Super Fancy: Aero Grow bags: customer would show 20gal, 10gal, each with their own price.  That way Nicole doesn't need to add grow bag post for each size.
    
    	http://code.google.com/apis/checkout/developer/Google_Checkout_Shopping_Cart_Annotating_Products.html
    	
    	<span class="product-attr-color">Blue</span>
    	
    	
    	http://codex.wordpress.org/Function_Reference/post_meta_Function_Examples
    	
    	
		<div class="product">
		  <img class="product-image" src="files/google_tshirt.jpg"/>
		  <span class="product-title">Google T-shirt</span>
		  Price: <span class="product-price">$12.99</span><br/>
		  Shipping: <span class="product-shipping">$4.99</span>
		
		  <!-- The shopping cart automatically adds the selected color -->
		  Color: <br/>
		    <input class="product-attr-color" name="color" type="radio" value="blue"/> blue<br/>
		    <input class="product-attr-color" name="color" type="radio" value="green"/> green<br/>
		    <input class="product-attr-color" name="color" type="radio" value="red"/> red<br/>
		
		  <!-- The shopping cart automatically adds the selected size -->
		  Size: <select class="product-attr-size">
		          <option>Small</option>
		          <option>Medium</option>
		          <option>Large</option>
		          <option>X-Large</option>
		        </select> 
		  <div role="button" alt="Add to cart" tabindex="0" class="googlecart-add-button">
		  </div> 
		</div>
    
    	How do we set different prices based on the size of a product?
    	idea of PRICE POINTS
    
    
    */


	// The Callback for custom meta box  
	function show_custom_meta_box() {  
	global $custom_meta_fields, $post;  
	// Use nonce for verification  
	echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
	  
	    // Begin the field table and loop  
	    echo '<table class="form-table">';  
	    foreach ($custom_meta_fields as $field) {  
	        // get value of this field if it exists for this post  
	        $meta = get_post_meta($post->ID, $field['id'], true);  
	        // begin a table row with  
	        echo '<tr> 
	                <th><label for="'.$field['id'].'">'.$field['label'].'</label></th> 
	                <td>';  
	                switch($field['type']) {  
	                    // case items will go here
	                    	
                    	// text  
						case 'text':  
						    echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" /> 
						        <br /><span class="description">'.$field['desc'].'</span>';  
						break;
						
						// textarea  
						case 'textarea':  
						    echo '<textarea name="'.$field['id'].'" id="'.$field['id'].'" cols="60" rows="4">'.$meta.'</textarea> 
						        <br /><span class="description">'.$field['desc'].'</span>';  
						break;
						
						// checkbox  
						case 'checkbox':  
						    echo '<input type="checkbox" name="'.$field['id'].'" id="'.$field['id'].'" ',$meta ? ' checked="checked"' : '','/> 
						        <label for="'.$field['id'].'">'.$field['desc'].'</label>';  
						break; 
						
						
						// select  
						case 'select':  
						    echo '<select name="'.$field['id'].'" id="'.$field['id'].'">';  
						    foreach ($field['options'] as $option) {  
						        echo '<option', $meta == $option['value'] ? ' selected="selected"' : '', ' value="'.$option['value'].'">'.$option['label'].'</option>';  
						    }  
						    echo '</select><br /><span class="description">'.$field['desc'].'</span>';  
						break; 
							 
	                } //end switch  
	        echo '</td></tr>';  
	    } // end foreach  
	    echo '</table>'; // end table  
	
	}

      // Save the Data  from Custom Meta Box
    function save_custom_meta($post_id) {  
        global $custom_meta_fields;  
      
        // verify nonce  
        if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__)))  
            return $post_id;  
        // check autosave  
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)  
            return $post_id;  
        // check permissions  
        if ('page' == $_POST['post_type']) {  
            if (!current_user_can('edit_page', $post_id))  
                return $post_id;  
            } elseif (!current_user_can('edit_post', $post_id)) {  
                return $post_id;  
        }  
      
        // loop through fields and save the data  
        foreach ($custom_meta_fields as $field) {  
            $old = get_post_meta($post_id, $field['id'], true);  
            $new = $_POST[$field['id']];  
            if ($new && $new != $old) {  
                update_post_meta($post_id, $field['id'], $new);  
            } elseif ('' == $new && $old) {  
                delete_post_meta($post_id, $field['id'], $old);  
            }  
        } // end foreach  
    }  
    add_action('save_post', 'save_custom_meta'); 
		

?>