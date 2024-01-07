</body>
<footer class="footer-distributed">
  <div class="nav1">
            <div class="footer-left" style="width:500px">
                <a href="navbar-brand"> <img class="logo" src="../images/Logo Design2.png" style="width: 100px; height: 100px; margin-left: 40px"></a>
                <br>
                <p class="footer-links">
                    <a>Home</a> |
                    
                    <a href="#">Tour</a> |
                
                    <a href="#">Liên Hệ</a> |
                
                    <a href="#">Giới Thiệu</a>
                    
                </p>

                <p class="footer-company-name">Copy right © 2020 by LamNgocHan</p>
            </div>

            <div class="footer-center" style="width:600px">

                <div>
                    <a href="https://www.google.com/maps/place/Tr%C6%B0%E1%BB%9Dng+%C4%90%E1%BA%A1i+H%E1%BB%8Dc+Tr%C3%A0+Vinh/@9.9234516,106.3439444,17z/data=!3m1!4b1!4m6!3m5!1s0x31a0175ea296facb:0x55ded92e29068221!8m2!3d9.9234516!4d106.3465193!16s%2Fm%2F0vb3nkd?entry=ttu"><i class="fa fa-map-marker"></i></a>
                    <p><span>Domestic travel</span> 128A, Nguyễn Thị Minh Khai, Trà Vinh</p>
                </div>

                <div>
                    <a href="tel:0111111111"><i class="fa fa-phone"></i></a>
                    <p>+84 111 111 111</p>
                </div>

                <div>
                    <a href="mailto:mytour_vku@gmail.com"><i class="fa fa-envelope"></i></a><p>domestic@gmail.com</p>
                    <p></p>
                </div>

            </div>

            <div class="footer-right" style="width:300px">

                <p class="footer-company-about">
                    <span>VỀ CHÚNG TÔI</span>
                    <br>
                    Mọi thắc mắc của quý khách xin gửi về địa chỉ email để được giải đáp.
                </p>

                <div class="footer-icons">

                    <a href="https://www.facebook.com/profile.php?id="><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-youtube"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>

                </div>

            </div>
<!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v9.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="103452331732438"
  theme_color="#0A7CFF"
  logged_in_greeting="Xin Chào! Bạn cần giúp gì?"
  logged_out_greeting="Xin Chào! Bạn cần giúp gì?">
      </div>
  </div>
        </footer>
  </div>
</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
    <script type="text/javascript">
    function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>
      <script src="assets/js/extention/choices.js"></script>
    <script src="assets/js/extention/flatpickr.js"></script>
    <script>
      flatpickr(".datepicker",
      {});

    </script>
    <script>
      const choices = new Choices('[data-trigger]',
      {
        searchEnabled: false,
        itemSelectText: '',
      });

    </script>
</body>
</html>