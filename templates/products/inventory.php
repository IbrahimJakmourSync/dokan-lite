<?php $personalize  = get_post_meta( $post_id, '_personalize', true );$additional_note_seller  = get_post_meta( $post_id, '_additional_note_seller', true );$processing_time  = get_post_meta( $post_id, '_processing_time', true );?>
<div class="dokan-product-inventory dokan-edit-row">
    <div class="dokan-section-heading" data-togglehandler="dokan_product_inventory">
        <h2><i class="fa fa-cubes" aria-hidden="true"></i> <?php esc_html_e( 'Note for the seller', 'dokan-lite' ); ?></h2>
        <p><?php esc_html_e( 'Manage Seller.', 'dokan-lite' ); ?></p>
        <a href="#" class="dokan-section-toggle">
            <i class="fa fa-sort-desc fa-flip-vertical" aria-hidden="true"></i>
        </a>
        <div class="dokan-clearfix"></div>
    </div>

    <div class="dokan-section-content">

        <div class="content-half-part dokan-form-group">
            <label for="_personalize" class="form-label"><?php esc_html_e( 'Personalize', 'dokan-lite' ); ?> <span><?php esc_html_e( '(Personalize Note)', 'dokan-lite' ); ?></span></label>
            <select id="_personalize" name="_personalize">
              <option value="" disabled selected>Choose an option</option>
               <option value="1" <?php if($personalize=="1"){ echo "selected";}?>>Required</option> 
               <option value="0" <?php if($personalize=="0"){ echo "selected";}?>>Not Required</option> 
            </select>
        </div>
        
         <div class="content-half-part dokan-form-group">
            <label for="_additional_note_seller" class="form-label"><?php esc_html_e( 'Additional Note', 'dokan-lite' ); ?> <span><?php esc_html_e( '(Additional Note)', 'dokan-lite' ); ?></span></label>
            <select id="_additional_note_seller" name="_additional_note_seller">
              <option value="" disabled selected>Choose an option</option>
               <option value="1" <?php if($additional_note_seller=="1"){ echo "selected";}?>>Required</option> 
               <option value="0" <?php if($additional_note_seller=="0"){ echo "selected";}?>>Not Required</option> 
            </select>
        </div>
        
        <div class="content-half-part dokan-form-group">
            <label for="_processing_time" class="form-label"><?php esc_html_e( 'Processing Time', 'dokan-lite' ); ?> <span><?php esc_html_e( '(Processing Note ( if Stock is 0 ))', 'dokan-lite' ); ?></span></label>
              <input type="text" name="_processing_time" id="_processing_time" value="<?php echo $processing_time;?>">
        </div>

        <div class="dokan-clearfix"></div>
    </div><!-- .dokan-side-right -->
</div><!-- .dokan-product-inventory -->


<div class="dokan-product-inventory dokan-edit-row <?php echo esc_attr( $class ); ?>">
    <div class="dokan-section-heading" data-togglehandler="dokan_product_inventory">
        <h2><i class="fa fa-cubes" aria-hidden="true"></i> <?php esc_html_e( 'Inventory', 'dokan-lite' ); ?></h2>
        <p><?php esc_html_e( 'Manage inventory for this product.', 'dokan-lite' ); ?></p>
        <a href="#" class="dokan-section-toggle">
            <i class="fa fa-sort-desc fa-flip-vertical" aria-hidden="true"></i>
        </a>
        <div class="dokan-clearfix"></div>
    </div>

    <div class="dokan-section-content">

        <div class="content-half-part dokan-form-group hide_if_variation">
            <label for="_sku" class="form-label"><?php esc_html_e( 'SKU', 'dokan-lite' ); ?> <span><?php esc_html_e( '(Stock Keeping Unit)', 'dokan-lite' ); ?></span></label>
            <?php dokan_post_input_box( $post_id, '_sku' ); ?>
        </div>

        <div class="content-half-part hide_if_variable">
            <label for="_stock_status" class="form-label"><?php esc_html_e( 'Stock Status', 'dokan-lite' ); ?></label>

            <?php dokan_post_input_box( $post_id, '_stock_status', array( 'options' => array(
                'instock'     => __( 'In Stock', 'dokan-lite' ),
                'outofstock' => __( 'Out of Stock', 'dokan-lite' ),
            ) ), 'select' ); ?>
        </div>

        <div class="dokan-clearfix"></div>

        <div class="dokan-form-group hide_if_variation hide_if_grouped">
            <?php dokan_post_input_box( $post_id, '_manage_stock', array( 'label' => __( 'Enable product stock management', 'dokan-lite' ) ), 'checkbox' ); ?>
        </div>

        <div class="show_if_stock dokan-stock-management-wrapper dokan-form-group dokan-clearfix">

            <div class="content-half-part hide_if_variation">
                <label for="_stock" class="form-label"><?php esc_html_e( 'Stock quantity', 'dokan-lite' ); ?></label>
                <input type="number" class="dokan-form-control" name="_stock" placeholder="<?php esc_attr__( '1', 'dokan-lite' ); ?>" value="<?php echo esc_attr( wc_stock_amount( $_stock ) ); ?>" min="0" step="1">
            </div>

            <?php if ( version_compare( WC_VERSION, '3.4.7', '>' ) ) : ?>
            <div class="content-half-part hide_if_variation">
                <label for="_low_stock_amount" class="form-label"><?php esc_html_e( 'Low stock threshold', 'dokan-lite' ); ?></label>
                <input type="number" class="dokan-form-control" name="_low_stock_amount" placeholder="<?php esc_attr__( '1', 'dokan-lite' ); ?>" value="<?php echo esc_attr( wc_stock_amount( $_low_stock_amount ) ); ?>" min="0" step="1">
            </div>
            <?php endif; ?>

            <div class="content-half-part hide_if_variation last-child">
                <label for="_backorders" class="form-label"><?php esc_html_e( 'Allow Backorders', 'dokan-lite' ); ?></label>

                <?php dokan_post_input_box( $post_id, '_backorders', array( 'options' => array(
                    'no'     => __( 'Do not allow', 'dokan-lite' ),
                    'notify' => __( 'Allow but notify customer', 'dokan-lite' ),
                    'yes'    => __( 'Allow', 'dokan-lite' )
                ) ), 'select' ); ?>
            </div>
            <div class="dokan-clearfix"></div>
        </div><!-- .show_if_stock -->

        <div class="dokan-form-group hide_if_grouped">
            <label class="" for="_sold_individually">
                <input name="_sold_individually" id="_sold_individually" value="yes" type="checkbox" <?php checked( $_sold_individually, 'yes' ); ?>>
                <?php esc_html_e( 'Allow only one quantity of this product to be bought in a single order', 'dokan-lite' ) ?>
            </label>
        </div>

        <?php if ( $post_id ): ?>
            <?php do_action( 'dokan_product_edit_after_inventory' ); ?>
        <?php endif; ?>

        <?php do_action( 'dokan_product_edit_after_downloadable', $post, $post_id ); ?>
        <?php do_action( 'dokan_product_edit_after_sidebar', $post, $post_id ); ?>
        <?php do_action( 'dokan_single_product_edit_after_sidebar', $post, $post_id ); ?>

    </div><!-- .dokan-side-right -->
</div><!-- .dokan-product-inventory -->
<script>
// uncheck product stock management choose custom product start   
jQuery(document).ready(function($) {   
        $('#product_type').change(function(){
        // this is the select itself, so use its val()
           var currentSelectVal = $(this).val();
            if(currentSelectVal=="variable"){
            $("#_manage_stock").prop("checked", false);
            $(".dokan-stock-management-wrapper").hide();
            }
        });
    });    
// uncheck product stock management choose custom product end  
</script>    