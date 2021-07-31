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
<style>
    .autocomplete {
        /*the container must be positioned relative:*/
        position: relative;
        display: inline-block;
    }
    .autocomplete-items {
        position: absolute;
        border: 1px solid #d4d4d4;
        border-bottom: none;
        border-top: none;
        z-index: 99;
        /*position the autocomplete items to be the same width as the container:*/
        top: 100%;
        left: 0;
        right: 0;
    }
    .autocomplete-items div {
        padding: 10px;
        cursor: pointer;
        background-color: #fff;
        border-bottom: 1px solid #d4d4d4;
    }
    .autocomplete-items div:hover {
        /*when hovering an item:*/
        background-color: #e9e9e9;
    }
    .autocomplete-active {
        /*when navigating through the items using the arrow keys:*/
        background-color: DodgerBlue !important;
        color: #ffffff;
    }
</style>
<form action="<?php echo esc_url_raw( get_permalink() ); ?>" method="get">
    <div class="col-md-8 offset-md-2 mt-4">
        <div class="input-group input-group-sm">
            <input id="c19h_search" autocomplete="off" value="<?php echo isset( $_GET['search'] )? sanitize_text_field( wp_unslash( $_GET['search'] ) ) : '';?>" name="search" type="search" class="form-control" placeholder="Search by district or hospital name" aria-label="Search by district or hospital name" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjUiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNSAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik01LjE1MTM5IDExQzUuMTUxMzkgNy42OTEgNy44NDIzOSA1IDExLjE1MTQgNUMxNC40NjA0IDUgMTcuMTUxNCA3LjY5MSAxNy4xNTE0IDExQzE3LjE1MTQgMTQuMzA5IDE0LjQ2MDQgMTcgMTEuMTUxNCAxN0M3Ljg0MjM5IDE3IDUuMTUxMzkgMTQuMzA5IDUuMTUxMzkgMTFaTTIwLjg1ODQgMTkuMjkzTDE3LjQ2MzQgMTUuODk3QzE4LjUxNjQgMTQuNTQzIDE5LjE1MTQgMTIuODQ2IDE5LjE1MTQgMTFDMTkuMTUxNCA2LjU4OSAxNS41NjI0IDMgMTEuMTUxNCAzQzYuNzQwMzcgMyAzLjE1MTM3IDYuNTg5IDMuMTUxMzcgMTFDMy4xNTEzNyAxNS40MTEgNi43NDAzNyAxOSAxMS4xNTE0IDE5QzEyLjk5NzQgMTkgMTQuNjk0NCAxOC4zNjUgMTYuMDQ4NCAxNy4zMTJMMTkuNDQ0NCAyMC43MDdDMTkuNjM5NCAyMC45MDIgMTkuODk1NCAyMSAyMC4xNTE0IDIxQzIwLjQwNzQgMjEgMjAuNjYzNCAyMC45MDIgMjAuODU4NCAyMC43MDdDMjEuMjQ5NCAyMC4zMTYgMjEuMjQ5NCAxOS42ODQgMjAuODU4NCAxOS4yOTNaIiBmaWxsPSIjMzQzQzQ0Ii8+Cjwvc3ZnPgo=" alt="Search">
            </button>
            <div class="autocomplete"></div>
            <?php wp_nonce_field( 'c19h_search', 'c19h_search_field' ); ?>
        </div>
    </div>
</form>
<script>
    var districts = ["Bagerhat","Bandarban","Barguna","Barishal","Bhola","Bogura","Brahmanbaria","Chandpur","Chapai Nawabganj","Chattogram","Chuadanga","Cox's Bazar","Cumilla","Dhaka","Dinajpur","Faridpur","Feni","Gaibandha","Gazipur","Gopalganj","Habiganj","Jamalpur","Jashore","Jhalokati","Jhenaidah","Joypurhat","Khagrachari","Khulna","Kishoreganj","Kurigram","Kushtia","Lakshmipur","Lalmonirhat","Madaripur","Magura","Manikganj","Meherpur","Moulvibazar","Munshiganj","Mymensingh","Naogaon","Narail","Narayanganj","Narsingdi","Natore","Netrokona","Nilphamari","Noakhali","Pabna","Panchagarh","Patuakhali","Pirojpur","Rajbari","Rajshahi","Rangamati","Rangpur","Satkhira","Shariatpur","Sherpur","Sirajganj","Sunamganj","Sylhet","Tangail","Thakurgaon"];

    autocomplete(document.getElementById("c19h_search"), districts);
    function autocomplete(inp, arr) {
        /*the autocomplete function takes two arguments,
        the text field element and an array of possible autocompleted values:*/
        var currentFocus;
        /*execute a function when someone writes in the text field:*/
        inp.addEventListener("input", function(e) {
            var a, b, i, val = this.value;
            /*close any already open lists of autocompleted values*/
            closeAllLists();
            if (!val) { return false;}
            currentFocus = -1;
            /*create a DIV element that will contain the items (values):*/
            a = document.createElement("DIV");
            a.setAttribute("id", this.id + "autocomplete-list");
            a.setAttribute("class", "autocomplete-items");
            /*append the DIV element as a child of the autocomplete container:*/
            this.parentNode.appendChild(a);
            /*for each item in the array...*/
            for (i = 0; i < arr.length; i++) {
                /*check if the item starts with the same letters as the text field value:*/
                if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                    /*create a DIV element for each matching element:*/
                    b = document.createElement("DIV");
                    /*make the matching letters bold:*/
                    b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                    b.innerHTML += arr[i].substr(val.length);
                    /*insert a input field that will hold the current array item's value:*/
                    b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                    /*execute a function when someone clicks on the item value (DIV element):*/
                    b.addEventListener("click", function(e) {
                        /*insert the value for the autocomplete text field:*/
                        inp.value = this.getElementsByTagName("input")[0].value;
                        /*close the list of autocompleted values,
                        (or any other open lists of autocompleted values:*/
                        closeAllLists();
                    });
                    a.appendChild(b);
                }
            }
        });
        /*execute a function presses a key on the keyboard:*/
        inp.addEventListener("keydown", function(e) {
            var x = document.getElementById(this.id + "autocomplete-list");
            if (x) x = x.getElementsByTagName("div");
            if (e.keyCode == 40) {
                /*If the arrow DOWN key is pressed,
                increase the currentFocus variable:*/
                currentFocus++;
                /*and and make the current item more visible:*/
                addActive(x);
            } else if (e.keyCode == 38) { //up
                /*If the arrow UP key is pressed,
                decrease the currentFocus variable:*/
                currentFocus--;
                /*and and make the current item more visible:*/
                addActive(x);
            } else if (e.keyCode == 13) {
                /*If the ENTER key is pressed, prevent the form from being submitted,*/
                e.preventDefault();
                if (currentFocus > -1) {
                    /*and simulate a click on the "active" item:*/
                    if (x) x[currentFocus].click();
                }
            }
        });
        function addActive(x) {
            /*a function to classify an item as "active":*/
            if (!x) return false;
            /*start by removing the "active" class on all items:*/
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1);
            /*add class "autocomplete-active":*/
            x[currentFocus].classList.add("autocomplete-active");
        }
        function removeActive(x) {
            /*a function to remove the "active" class from all autocomplete items:*/
            for (var i = 0; i < x.length; i++) {
                x[i].classList.remove("autocomplete-active");
            }
        }
        function closeAllLists(elmnt) {
            /*close all autocomplete lists in the document,
            except the one passed as an argument:*/
            var x = document.getElementsByClassName("autocomplete-items");
            for (var i = 0; i < x.length; i++) {
                if (elmnt != x[i] && elmnt != inp) {
                    x[i].parentNode.removeChild(x[i]);
                }
            }
        }
        /*execute a function when someone clicks in the document:*/
        document.addEventListener("click", function (e) {
            closeAllLists(e.target);
        });
    }
</script>
<style></style>
