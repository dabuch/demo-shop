</main>

<footer>
    
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <center><h3>WARRANTY</h3></center>
        <hr style="color: white;">
          <center><img src="images/satisfaction-100-guaranteed.png"> </center>
      </div>

      <div class="col-md-4">
        <center><h3>OUR SOCIAL MEDIA</h3></center>
        <hr style="color: white;"><br>
        <center>
          <div class="social">
            <a href="https://web.facebook.com/kennomej/" target="_blank"><img src="images/social-7.png" class="rounded-circle" alt="Avatar" style="width:40px"></a>
            <a href="https://www.instagram.com/kennomej/" target="_blank"><img src="images/social-9.png" class="rounded-circle" alt="Avatar" style="width:40px"></a>
          </div>
        </center><br>


      </div>

      <div class="col-md-4">
        <center><h3>OUR CONTACTS</h3></center>
        <hr style="color: white;">
        <address>
            <p><i class="fa fa-home"></i>&nbsp; &nbsp;<strong>Address :</strong> 1 Demo Street,  <br>
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Your District. <br>
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;State.<br><br>
            <i class="fa fa-phone"></i> &nbsp; &nbsp;<strong>Phone :</strong> &nbsp; +(234) 08037114003 <br><br>
            <i class="fa fa-envelope"></i> &nbsp; &nbsp;<strong>Email :</strong>&nbsp; &nbsp;  info@demo-shop.com</p>
        </address>


      </div>

      <hr style="color: white;">

      <div class="container">
        <p style="float: left;">© <?php echo date('Y');?>. Demo Shop. All Rights Reserved.</p> 
        <p style="float: right;">Website By: <a href="#" target="_blank">Abuchi</a></p> 
    
      </div>

  </div>

</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="js/bootstrap.bundle.min.js"></script>
<script src="bootstrap-icons/bootstrap-icons.json"></script>
<script src="swiper/swiper-bundle.min.js"></script>
<script src="js/owl.carousel.min.js"></script>

    <!-- Initialize Swiper -->
    <script type="text/javascript">
      var swiper = new Swiper(".mySwiper", {
        slidesPerView: 4,
        spaceBetween: 30,
        autoplay: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
      });
    </script>

<script>
       $(document).ready(function(){
            //-- Click on detail
            $("ul.menu-items > li").on("click",function(){
                $("ul.menu-items > li").removeClass("active");
                $(this).addClass("active");
            })

            $(".attr,.attr2").on("click",function(){
                var clase = $(this).attr("class");

                $("." + clase).removeClass("active");
                $(this).addClass("active");
            })

            //-- Click on QUANTITY
            $(".btn-minus").on("click",function(){
                var now = $(".section > div > input").val();
                if ($.isNumeric(now)){
                    if (parseInt(now) -1 > 0){ now--;}
                    $(".section > div > input").val(now);
                }else{
                    $(".section > div > input").val("1");
                }
            })            
            $(".btn-plus").on("click",function(){
                var now = $(".section > div > input").val();
                if ($.isNumeric(now)){
                    $(".section > div > input").val(parseInt(now)+1);
                }else{
                    $(".section > div > input").val("1");
                }
            })                        
        }) 
</script>


    
  </body>
</html>