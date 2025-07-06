<!-- ===== FOOTER ====== -->
<footer>
    <div class="content">
        <div class="top">
            <div class="logo-details">
                <!-- <i class="fab fa-slack footer_slack"></i> -->
                <span class="logo_name text-capitalize"><?php echo $site_title; ?></span>
            </div>
            <div class="media-icons">
                <a href="<?php echo $facebook; ?>"><i class="fab fa-facebook-f"></i></a>
                <a href="<?php echo $twitter; ?>"><i class="fab fa-twitter"></i></a>
                <a href="<?php echo $insta; ?>"><i class="fab fa-instagram"></i></a>
                <a href="<?php echo $linkd; ?>"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
        <div class="link-boxes">
            <ul class="footer_box">
                <li class="link_name">Company</li>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="blog.php">Our Blog</a></li>
                <li><a href="shop.php">Our Shop</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
            <ul class="footer_box">
                <li class="link_name">Pages</li>
                <li><a href="candidate.php">Entery</a></li>
                <li><a href="faq-page.php">FAQ's</a></li>
                <li><a href="user-guide.php">User Guide</a></li>
                <li><a href="policy.php">Privacy Policy</a></li>
                <li><a href="terms-and-condition.php">Terms and Conditions</a></li>
            </ul>
            <ul class="footer_box">
                <li class="link_name">Account</li>
                <li><a href="signup.php">Sign Up</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="user-profile.php">My Profile</a></li>
            </ul>
            <ul class="footer_box">
                <li class="link_name">Matches</li>
                <li><a href="Shedule.php">Shedules</a></li>
            </ul>
        </div>
    </div>
    <div class="bottom-details">
        <div class="bottom_text">
            <span class="copyright_text">Copyright © 2023 <a href="#">Eldritch.</a>All rights reserved</span>
            <span class="policy_terms">
                <a href="policy.php">Privacy policy</a>
                <a href="terms-and-condition.php">Terms &amp; condition</a>
            </span>
        </div>
    </div>
</footer>
<!-- jQuery Code -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- google map api key -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCdre1QHws5Com3uu74OYKrefyrq72GWZk&libraries=places&loading=async" async></script>


<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
</script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
    crossorigin="anonymous"></script>

<script src="user/assets/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="user/assets/lib/fancy-box/jquery.fancybox.min.js"></script>
<script src="admin/assets/js/datatables-simple-demo.js"></script>
<script src="user/assets/js/main.js"></script>
<script src="user/assets/js/ajax.js"></script>

<script>
    $(function() {
        // (Optional) Active an item if it has the class "is-active"	
        $(".accordion > .accordion-item.is-active").children(".accordion-panel").slideDown();

        $(".accordion > .accordion-item").click(function() {
            // Cancel the siblings
            $(this).siblings(".accordion-item").removeClass("is-active").children(".accordion-panel")
                .slideUp();
            // Toggle the item
            $(this).toggleClass("is-active").children(".accordion-panel").slideToggle("ease-out");
        });
    });

    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: YOUR_LATITUDE,
                lng: YOUR_LONGITUDE
            },
            zoom: 14
        });
    }


    // Sticky Nav
    let sticky = document.getElementById("nav-sticky");
    window.addEventListener("scroll", () => {
        let scrollTop = window.scrollY;
        if (scrollTop > 200) {
            sticky.classList.add("sticky");
        } else {
            if (scrollTop < 200) {
                sticky.classList.remove("sticky");
            }
        }
    });

    function togglePasswordVisibility() {
        let passwordCheckButton = document.getElementById('passwordCheck');
        let passwordInputs = document.querySelectorAll('input[type="password"], input[data-password]');
 if (!passwordCheckButton) return;
        passwordCheckButton.addEventListener('change', function() {
            passwordInputs.forEach(input => {
                input.type = this.checked ? 'text' : 'password';
            });
        });
    }
    document.addEventListener("DOMContentLoaded", function() {
        togglePasswordVisibility();
    });
</script>
</body>

</html>