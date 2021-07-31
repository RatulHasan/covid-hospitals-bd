<?php
/***
 * C19h details file
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
        <?php
        require_once C19H_INC_DIR . '/templates/c19h_search_form.php';
        $key = isset( $_GET['type'] ) ? sanitize_text_field( wp_unslash( $_GET['type'] ) ) : '';
        if ( ! empty( $key ) || ! empty( $_GET['search'] ) ) {
            echo wp_kses_post( '<h3><a href=' . get_permalink() . '>' . __( 'Home', 'covid-hospitals-bd' ) . '</a></h3>' );
        }
        if ( 'icu_hfc' === $key ) {
            $value = esc_html__( 'High flow nasal cannula Beds', 'covid-hospitals-bd' );
            $class = 'dark';
        }
        if ( 'icu' === $key ) {
            $value = esc_html__( 'ICU Beds', 'covid-hospitals-bd' );
            $class = 'danger';
        }
        if ( 'hdu' === $key ) {
            $value = esc_html__( 'High Dependency Unit Beds', 'covid-hospitals-bd' );
            $class = 'warning';
        }
        if ( 'gb' === $key ) {
            $value = esc_html__( 'General Beds', 'covid-hospitals-bd' );
            $class = 'success';
        }
        ?>
        <div class="col-md-8 offset-md-2">
            <div class="card-header fixed-bottom text-center alert alert-<?php echo esc_attr( $class ); ?>">
                <span class="text-start">
                    <?php echo esc_html( $value ); ?>
                </span>
            </div>
            <?php
            if ( $_GET['search'] ) {
                $nonce = isset( $_GET['c19h_search_field'] ) ? sanitize_text_field( wp_unslash( $_GET['c19h_search_field'] ) ) : '';
                if ( ! wp_verify_nonce( $nonce, 'c19h_search' ) ) {
                    wp_die( esc_html__( 'Are you cheating?', 'custom-role-creator' ) );
                }
                $all_datas = $c19h_available_details;
            } else {
                $all_datas = $c19h_available_details->hospitals;
            }
            foreach ( $all_datas->data as $key => $c19h_available_detail ) {
                ?>
                <div class="card box mt-4">
                    <h4 class="card-header">
                        <?php esc_html_e( 'Hospital name:', 'covid-hospitals-bd' ); ?>
                        <?php echo esc_html( $c19h_available_detail->name ); ?>
                    </h4>
                    <div class="card-body">
                        <h4 class="card-title">
                            <?php esc_html_e( 'District: ', 'covid-hospitals-bd' ); ?>
                            <?php echo esc_html( $c19h_available_detail->district ); ?>
                        </h4>
                        <p class="card-text">
                            <?php esc_html_e( 'Bed information', 'covid-hospitals-bd' ); ?>
                        </p>
                        <table class="table table-bordered table-striped table-secondary font-monospace">
                            <thead>
                            <tr>
                                <th><?php esc_html_e( 'Type', 'covid-hospitals-bd' ); ?></th>
                                <th><?php esc_html_e( 'Available', 'covid-hospitals-bd' ); ?></th>
                                <th><?php esc_html_e( 'Total', 'covid-hospitals-bd' ); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <?php esc_html_e( 'ICU', 'covid-hospitals-bd' ); ?>
                                </td>
                                <td class="text-success text-end">
                                    <?php echo esc_html( ( $c19h_available_detail->icu_beds - $c19h_available_detail->icu_beds_occupied ) ); ?>
                                </td>
                                <td class="text-end">
                                    <?php echo esc_html( ( $c19h_available_detail->icu_beds ) ); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php esc_html_e( 'High flow nasal cannula Beds', 'covid-hospitals-bd' ); ?>
                                </td>
                                <td class="text-success text-end">
                                    <?php
                                    echo esc_html(
                                        ( $c19h_available_detail->icu_hfn_beds - $c19h_available_detail->icu_hfn_beds_occupied )
                                    );
                                    ?>
                                </td>
                                <td class="text-end">
                                    <?php echo esc_html( ( $c19h_available_detail->icu_hfn_beds ) ); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php esc_html_e( 'High Dependency Unit', 'covid-hospitals-bd' ); ?>
                                </td>
                                <td class="text-success text-end">
                                    <?php
                                    echo esc_html(
                                        ( $c19h_available_detail->icu_hdu_beds - $c19h_available_detail->icu_hdu_beds_occupied )
                                    );
                                    ?>
                                </td>
                                <td class="text-end">
                                    <?php echo esc_html( ( $c19h_available_detail->icu_hdu_beds ) ); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php esc_html_e( 'General Beds', 'covid-hospitals-bd' ); ?>
                                </td>
                                <td class="text-success text-end">
                                    <?php
                                    echo esc_html(
                                        ( $c19h_available_detail->general_beds - $c19h_available_detail->general_beds_occupied )
                                    );
                                    ?>
                                </td>
                                <td class="text-end">
                                    <?php echo esc_html( ( $c19h_available_detail->general_beds ) ); ?>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                            <?php esc_html_e( 'Last update', 'covid-hospitals-bd' ); ?>
                            <?php echo esc_html( human_time_diff( strtotime( $c19h_available_detail->updated_at ) ) . ' ago' ); ?>
                        </div>
                </div>
                <?php
            }

            $total_pages   = $all_datas->last_page;
            $prev_page_url = $all_datas->prev_page_url;
            $next_page_url = $all_datas->next_page_url;

            // phpcs:ignore
            $current    = isset( $_GET['current_page'] ) ? $_GET['current_page'] : 1;
            $link_pages = paginate_links(
                array(
					'format'  => '?current_page=%#%',
					'current' => $current,
					'total'   => $total_pages,
					'type'    => 'array',
				)
            );
            ?>
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-end">
                    <?php
                    if ( is_array( $link_pages ) ) {
                        echo '<nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">';
                        foreach ( $link_pages as $link_page ) {
                            echo "<li class='page-item'><span class='page-link'>" . wp_kses_post( $link_page ) . '</span></li>';
                        }
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </div>
</div>
