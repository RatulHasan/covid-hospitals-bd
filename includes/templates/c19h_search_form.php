<?php
/***
 * C19h Search form file
 *
 * @since 1.0.0
 *
 * @author Ratul Hasan <tanjilhasanratul@gmail.com>
 *
 * @package Covid\Hospitals
 */

?>

<div class="col-md-8 offset-md-2 mt-4">
    <form action="<?php echo esc_url_raw( get_permalink() ); ?>" method="get">
        <div class="input-group">
            <input id="c19h_search" autocomplete="off" value="<?php echo isset( $_GET['search'] )? esc_attr( $_GET['search'] ) : '';?>" name="search" type="search" class="form-control" placeholder="Search by district or hospital name" aria-label="Search by district or hospital name" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjUiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNSAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik01LjE1MTM5IDExQzUuMTUxMzkgNy42OTEgNy44NDIzOSA1IDExLjE1MTQgNUMxNC40NjA0IDUgMTcuMTUxNCA3LjY5MSAxNy4xNTE0IDExQzE3LjE1MTQgMTQuMzA5IDE0LjQ2MDQgMTcgMTEuMTUxNCAxN0M3Ljg0MjM5IDE3IDUuMTUxMzkgMTQuMzA5IDUuMTUxMzkgMTFaTTIwLjg1ODQgMTkuMjkzTDE3LjQ2MzQgMTUuODk3QzE4LjUxNjQgMTQuNTQzIDE5LjE1MTQgMTIuODQ2IDE5LjE1MTQgMTFDMTkuMTUxNCA2LjU4OSAxNS41NjI0IDMgMTEuMTUxNCAzQzYuNzQwMzcgMyAzLjE1MTM3IDYuNTg5IDMuMTUxMzcgMTFDMy4xNTEzNyAxNS40MTEgNi43NDAzNyAxOSAxMS4xNTE0IDE5QzEyLjk5NzQgMTkgMTQuNjk0NCAxOC4zNjUgMTYuMDQ4NCAxNy4zMTJMMTkuNDQ0NCAyMC43MDdDMTkuNjM5NCAyMC45MDIgMTkuODk1NCAyMSAyMC4xNTE0IDIxQzIwLjQwNzQgMjEgMjAuNjYzNCAyMC45MDIgMjAuODU4NCAyMC43MDdDMjEuMjQ5NCAyMC4zMTYgMjEuMjQ5NCAxOS42ODQgMjAuODU4NCAxOS4yOTNaIiBmaWxsPSIjMzQzQzQ0Ii8+Cjwvc3ZnPgo=" alt="Search">
            </button>
            <div class="autocomplete"></div>
            <?php wp_nonce_field( 'c19h_search', 'c19h_search_field' ); ?>
        </div>
    </form>
</div>
