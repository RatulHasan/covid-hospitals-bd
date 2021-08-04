<?php
/***
 * C19h single file
 *
 * @since 1.0.1
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
        ?>
        <div class="col-md-8 offset-md-2">
            <?php
            // phpcs:ignore
            if ( ! empty( $_GET['hospital'] ) ) {
				?>
            <h3><a class="text-decoration-none" href="javascript:history.back()">&larr; <?php echo esc_html__( 'Back', 'covid-hospitals-bd' ); ?></a></h3>
				<?php
            }
			?>
            <div class="card box mt-4">
                <h4 class="card-header">
                    <?php esc_html_e( 'Hospital name:', 'covid-hospitals-bd' ); ?>
                    <?php echo esc_html( $c19h_available_detail->name ); ?>
                </h4>
                <div class="card-body">
                    <p class="card-title">
                        <?php esc_html_e( 'District: ', 'covid-hospitals-bd' ); ?>
                        <?php echo esc_html( $c19h_available_detail->district ); ?>
                    </p>

                    <?php
                    $address = esc_html( $c19h_available_detail->address );
                    if ( ! empty( $address ) ) {
                        ?>
                        <p class="card-title">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg> <?php echo esc_html( $address ); ?>
                        </p>
                        <?php
                    }
                    $website = esc_html( $c19h_available_detail->website );
                    if ( ! empty( $website ) ) {
                        ?>
                        <p class="card-title">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-globe2" viewBox="0 0 16 16">
                                <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855-.143.268-.276.56-.395.872.705.157 1.472.257 2.282.287V1.077zM4.249 3.539c.142-.384.304-.744.481-1.078a6.7 6.7 0 0 1 .597-.933A7.01 7.01 0 0 0 3.051 3.05c.362.184.763.349 1.198.49zM3.509 7.5c.036-1.07.188-2.087.436-3.008a9.124 9.124 0 0 1-1.565-.667A6.964 6.964 0 0 0 1.018 7.5h2.49zm1.4-2.741a12.344 12.344 0 0 0-.4 2.741H7.5V5.091c-.91-.03-1.783-.145-2.591-.332zM8.5 5.09V7.5h2.99a12.342 12.342 0 0 0-.399-2.741c-.808.187-1.681.301-2.591.332zM4.51 8.5c.035.987.176 1.914.399 2.741A13.612 13.612 0 0 1 7.5 10.91V8.5H4.51zm3.99 0v2.409c.91.03 1.783.145 2.591.332.223-.827.364-1.754.4-2.741H8.5zm-3.282 3.696c.12.312.252.604.395.872.552 1.035 1.218 1.65 1.887 1.855V11.91c-.81.03-1.577.13-2.282.287zm.11 2.276a6.696 6.696 0 0 1-.598-.933 8.853 8.853 0 0 1-.481-1.079 8.38 8.38 0 0 0-1.198.49 7.01 7.01 0 0 0 2.276 1.522zm-1.383-2.964A13.36 13.36 0 0 1 3.508 8.5h-2.49a6.963 6.963 0 0 0 1.362 3.675c.47-.258.995-.482 1.565-.667zm6.728 2.964a7.009 7.009 0 0 0 2.275-1.521 8.376 8.376 0 0 0-1.197-.49 8.853 8.853 0 0 1-.481 1.078 6.688 6.688 0 0 1-.597.933zM8.5 11.909v3.014c.67-.204 1.335-.82 1.887-1.855.143-.268.276-.56.395-.872A12.63 12.63 0 0 0 8.5 11.91zm3.555-.401c.57.185 1.095.409 1.565.667A6.963 6.963 0 0 0 14.982 8.5h-2.49a13.36 13.36 0 0 1-.437 3.008zM14.982 7.5a6.963 6.963 0 0 0-1.362-3.675c-.47.258-.995.482-1.565.667.248.92.4 1.938.437 3.008h2.49zM11.27 2.461c.177.334.339.694.482 1.078a8.368 8.368 0 0 0 1.196-.49 7.01 7.01 0 0 0-2.275-1.52c.218.283.418.597.597.932zm-.488 1.343a7.765 7.765 0 0 0-.395-.872C9.835 1.897 9.17 1.282 8.5 1.077V4.09c.81-.03 1.577-.13 2.282-.287z"/>
                            </svg> <a href="<?php echo esc_html( $website ); ?>" target="_blank"><?php echo esc_html( $website ); ?></a>
                        </p>
                        <?php
                    }
                    ?>
                    <p class="card-title">
                        <?php
                        $rating = esc_html( $c19h_available_detail->rating );
                        $rating = ! empty( $rating ) ? $rating : 0;
                        for ( $i = 1; $i <= $rating; $i++ ) {
                            ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" style="color: orange" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                            </svg>
                            <?php
                        }
                        if ( 5 > $rating ) {
                            $rating_with_out = 5 - $rating;
                            for ( $i = 1; $i <= $rating_with_out; $i++ ) {
                                ?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                    <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                </svg>
                                <?php
                            }
                        }
                        ?>
                    </p>
                    <div class="table-responsive mt-4">
                        <h5 class="card-text">
                            <?php esc_html_e( 'Bed information', 'covid-hospitals-bd' ); ?>
                        </h5>
                        <table class="table table-bordered table-striped table-secondary">
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
                                <td class="text-success text-right">
                                    <?php echo esc_html( ( $c19h_available_detail->icu_beds - $c19h_available_detail->icu_beds_occupied ) ); ?>
                                </td>
                                <td class="text-right">
                                    <?php echo esc_html( ( $c19h_available_detail->icu_beds ) ); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php esc_html_e( 'High flow nasal cannula Beds', 'covid-hospitals-bd' ); ?>
                                </td>
                                <td class="text-success text-right">
                                    <?php
                                    echo esc_html(
                                        ( $c19h_available_detail->icu_hfn_beds - $c19h_available_detail->icu_hfn_beds_occupied )
                                    );
                                    ?>
                                </td>
                                <td class="text-right">
                                    <?php echo esc_html( ( $c19h_available_detail->icu_hfn_beds ) ); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php esc_html_e( 'High Dependency Unit', 'covid-hospitals-bd' ); ?>
                                </td>
                                <td class="text-success text-right">
                                    <?php
                                    echo esc_html(
                                        ( $c19h_available_detail->icu_hdu_beds - $c19h_available_detail->icu_hdu_beds_occupied )
                                    );
                                    ?>
                                </td>
                                <td class="text-right">
                                    <?php echo esc_html( ( $c19h_available_detail->icu_hdu_beds ) ); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php esc_html_e( 'General Beds', 'covid-hospitals-bd' ); ?>
                                </td>
                                <td class="text-success text-right">
                                    <?php
                                    echo esc_html(
                                        ( $c19h_available_detail->general_beds - $c19h_available_detail->general_beds_occupied )
                                    );
                                    ?>
                                </td>
                                <td class="text-right">
                                    <?php echo esc_html( ( $c19h_available_detail->general_beds ) ); ?>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive mt-4">
                        <h5 class="card-text">
                            <?php esc_html_e( 'Oxygen information', 'covid-hospitals-bd' ); ?>
                        </h5>
                        <table class="table table-bordered table-striped table-secondary">
                            <tbody>
                            <tr>
                                <td>
                                    <?php esc_html_e( 'Total bed with central oxygen supply point', 'covid-hospitals-bd' ); ?>
                                </td>
                                <td class="text-success text-right">
                                    <?php echo esc_html( $c19h_available_detail->oxygen_total_supply_point ); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php esc_html_e( 'Total oxygen concentrator available', 'covid-hospitals-bd' ); ?>
                                </td>
                                <td class="text-success text-right">
                                    <?php echo esc_html( $c19h_available_detail->oxygen_total_concentrator ); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php esc_html_e( 'Total oxygen cylinder', 'covid-hospitals-bd' ); ?>
                                </td>
                                <td class="text-success text-right">
                                    <?php echo esc_html( $c19h_available_detail->oxygen_total_cylinder ); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php esc_html_e( 'High flow nasal cannula', 'covid-hospitals-bd' ); ?>
                                </td>
                                <td class="text-success text-right">
                                    <?php esc_html_e( 'Available: ', 'covid-hospitals-bd' ); ?>
                                    <?php echo esc_html( ( $c19h_available_detail->oxygen_total_hfnc - $c19h_available_detail->oxygen_used_hfnc ) ); ?>
                                    <br />
                                    <?php esc_html_e( 'Total: ', 'covid-hospitals-bd' ); ?>
                                    <?php echo esc_html( $c19h_available_detail->oxygen_total_hfnc ); ?>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <iframe src="https://www.google.com/maps?q=<?php echo esc_html( ( $c19h_available_detail->name ) ); ?>&output=embed" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    <div class="text-center mt-4">
                        <a target="_blank" href="https://www.google.com/maps/dir/Current+Location/<?php echo esc_html( ( $c19h_available_detail->name ) ); ?>" class="border btn btn-primary text-decoration-none py-2 px-4 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg> <?php esc_html_e( 'Direction', 'covid-hospitals-bd' ); ?>
                        </a>
                        <?php
                        $phone_number = esc_html( $c19h_available_detail->phone_number );
                        if ( ! empty( $phone_number ) ) {
                            ?>
                            <a href="tel:<?php echo esc_html( $phone_number ); ?>" class="btn btn-primary text-decoration-none py-2 px-4 text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                                    <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                </svg> <?php esc_html_e( 'Call Hospital', 'covid-hospitals-bd' ); ?>
                            </a>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="float-left">
                        <?php esc_html_e( 'Last update', 'covid-hospitals-bd' ); ?>
                        <?php echo esc_html( human_time_diff( strtotime( $c19h_available_detail->dghs_update ) ) . ' ago' ); ?>
                    </div>
                    <div class="float-right">
                        <?php esc_html_e( 'Updated by', 'covid-hospitals-bd' ); ?>
                        <?php echo esc_html( $c19h_available_detail->update_by ); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
