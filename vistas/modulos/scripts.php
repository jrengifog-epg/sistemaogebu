
<script src="<?php echo URL; ?>vistas/js/config.js"></script>
<script src="<?php echo URL; ?>vistas/js/app.js"></script>
<script src="<?php echo URL; ?>vistas/js/login.js"></script>
<script type="text/javascript">
        /* Sidebar - Side navigation menu on mobile/responsive mode */
        function toggleNavbar(collapseID) {
            document.getElementById(collapseID).classList.toggle("hidden");
            document.getElementById(collapseID).classList.toggle("bg-white");
            document.getElementById(collapseID).classList.toggle("m-2");
            document.getElementById(collapseID).classList.toggle("py-3");
            document.getElementById(collapseID).classList.toggle("px-6");
        }

        /* Function for dropdowns */
        function openDropdown(event, dropdownID) {
            let element = event.target;
            while (element.nodeName !== "A") {
                element = element.parentNode;
            }
            var popper = new Popper(element, document.getElementById(dropdownID), {
                placement: "bottom-end",
            });
            document.getElementById(dropdownID).classList.toggle("hidden");
            document.getElementById(dropdownID).classList.toggle("block");
        }

        (function () {
            /* Add current date to the footer */
            document.getElementById(
                "javascript-date"
            ).innerHTML = new Date().getFullYear();

        })();
    </script>