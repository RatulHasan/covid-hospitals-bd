<?php
/***
 * C19h file
 *
 * @since 1.0.0
 *
 * @author Ratul Hasan <tanjilhasanratul@gmail.com>
 *
 * @package Covid\Hospitals
 */

?>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <img width="100%" src="<?php echo esc_url_raw( C19H_ASSETS . '/banner.svg' ); ?>" alt="banner">
        </div>
        <div class="col-md-12 text-center mt-4">
            <h2> <?php esc_html_e( 'Welcome to Hospital Update', 'covid-hospitals-bd' ); ?> </h2>
            <p class="text-sm"><?php esc_html_e( 'COVID Dedicated Hospital\'s Information Bangladesh', 'covid-hospitals-bd' ); ?></p>
        </div>
        <?php
        require_once C19H_INC_DIR . '/templates/c19h_search_form.php';
        ?>
        <div class="col-md-12 text-center mt-4">
            <h3> <?php esc_html_e( 'Currently available', 'covid-hospitals-bd' ); ?> </h3>
            <p class="text-sm"><?php esc_html_e( 'Tap on each for details', 'covid-hospitals-bd' ); ?></p>
        </div>
        <div class="col-md-8 offset-md-2 mt-4">
            <?php
            foreach ( $c19h_available_details as $key => $c19h_available_detail ) {
                if ( 'hfnc' === $key ) {
                    $value = esc_html__( 'High flow nasal cannula Beds', 'covid-hospitals-bd' );
                    $class = 'dark';
                } elseif ( 'icu' === $key ) {
                    $value = esc_html__( 'ICU Beds', 'covid-hospitals-bd' );
                    $class = 'danger';
                } elseif ( 'hdu' === $key ) {
                    $value = esc_html__( 'High Dependency Unit Beds', 'covid-hospitals-bd' );
                    $class = 'warning';
                } elseif ( 'gb' === $key ) {
                    $value = esc_html__( 'General Beds', 'covid-hospitals-bd' );
                    $class = 'success';
                } else {
                    $value = ucwords( esc_html( str_replace( '_', ' ', $key ) ) );
                    $value = ucwords( esc_html( str_replace( '-', ' ', $value ) ) );
                    $class = 'info';
                }
                ?>
                <a href="<?php echo esc_url_raw( wp_nonce_url( get_permalink() . '?available=details&type=' . $key, 'c19h_available_details' ) ); ?>">
                    <div class="alert alert-<?php echo esc_attr( $class ); ?>" role="alert">
                        <?php echo esc_html( $value ); ?>
                        <span class="float-right">
                    <?php
                    echo esc_html( $c19h_available_detail );
                    ?>
                        </span>
                    </div>
                </a>
                <?php
            }
            ?>
        </div>
    </div>
</div>
