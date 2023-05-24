<?php
  require('header.php');
  $product_id=mysqli_real_escape_string($con,$_GET['id']);
  $get_product=get_product($con,'','',$product_id);
  $noProduct=$obj->noProduct();
?>
  <!-- Product Details -->
  <section class="section product-detail">
    <div class="details container">
      <div class="left">
        <div class="main">
          <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$get_product['0']['image']?>" alt="">
        </div>
        <div class="thumbnails">
          <div class="thumbnail">
          <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$get_product['0']['image']?>" alt="">
          </div>
          <div class="thumbnail">
          <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$get_product['0']['image']?>" alt="">
          </div>
          <div class="thumbnail">
          <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$get_product['0']['image']?>" alt="">
          </div>
          <div class="thumbnail">
          <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$get_product['0']['image']?>" alt="">
          </div>
        </div>
      </div>
      <div class="right">
        <span></span>
        <h1><?php echo $get_product['0']['name']?></h1>
        <div class="price"><?php echo 'Rs '.$get_product['0']['price']?></div>
        <form>
          <div>
            <input type="number" class="qty" id="qty">
          </div>
        </form>

        <form class="form">
          <a href="javascript:void(0)" onclick="manage_cart('<?php echo $get_product['0']['id']?>','add')" class="addCart">Add To Cart</a>
          <a href="javascript:void(0)" onclick="compare_product('<?php echo $get_product['0']['id']?>','add','non')" class="addCompare">Add To Compare</a><br><br>
          <a href="customize_product.php?id=<?php echo $get_product['0']['id']?>" class="addCustom">Customize Product</a>

        </form>
        <h3>Material: <span style="color: gray; font-size:2rem;"><?php echo $get_product['0']['meta_title']?></span></h3>
        <h3>Size:<span style="color: gray; font-size:2rem;"><?php echo $get_product['0']['meta_title']?></span></h3>
        <h3>Product Detail</h3>
        <p>
        <?php echo $get_product['0']['description']?>
        </p>
      </div>
    </div>
  </section>

<h2 style="text-align: center;">Customer Reviews</h2>

 <!--Product Reviews-->
 <section class="review">
   <div class="rate-val">
     <div class="val">
       <h1><span id="average_rating"></span>/5.0</h1>
     </div>
     <div class="rate-stars">
       <i class="fas fa-star main_star"></i>
       <i class="fas fa-star main_star"></i>
       <i class="fas fa-star main_star"></i>
       <i class="fas fa-star main_star"></i>
       <i class="fas fa-star main_star"></i>
     </div>
   </div>
   <div class="bars">
     <div class="bar1">
       <label for="">5</label><i id="review_star" class="fas fa-star"></i>
          <progress class="line1" max="100" value="" id="five_star_progress"></progress>
          <p>(<span id="total_five_star_review">0</span>)</p>
     </div>
     <div class="bar2">
       <label for="">4</label><i id="review_star" class="fas fa-star"></i>
       <progress class="line2" max="100" value="" id="four_star_progress"></progress>
       <p>(<span id="total_four_star_review">0</span>)</p>
     </div>
     <div class="bar3">
       <label for="">3</label><i id="review_star" class="fas fa-star"></i>
       <progress class="line3" max="100" value="" id="three_star_progress"></progress>
       <p>(<span id="total_three_star_review">0</span>)</p>
     </div>
     <div class="bar4">
       <label for="">2</label><i id="review_star" class="fas fa-star"></i>
       <progress class="line4" max="100" value="" id="two_star_progress"></progress>
       <p>(<span id="total_two_star_review">0</span>)</p>
     </div>
     <div class="bar5">
       <label for="">1</label><i id="review_star" class="fas fa-star"></i>
       <progress class="line5" max="100" value=""  id="one_star_progress"></progress>
       <p>(<span id="total_one_star_review">0</span>)</p>
     </div>
   </div>
   <div class="add-review">
     <div class="review-btn">
       <h3>Please add your review</h3><br>
       <?php
          if(isset($_SESSION['USER_ID'])){
            echo '<button id="open-modal">Add Review</button>';
          }else{
            echo '<h4>Please login to add review</h4>';
          }
       ?>
     </div>
   </div>
</section>

<!--Customer Reviews-->
<section class="line"></section>
<div id="customer-reviews">

</div>
<section class="customer-reviews">
  <!--<div class="customer-letter">
    <h3>B</h3>
  </div>
  <div class="stars">
       <i class="fas fa-star"></i>
       <i class="fas fa-star"></i>
       <i class="fas fa-star"></i>
       <i class="fas fa-star"></i>
       <i class="fas fa-star"></i>
  <p class="comment">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
  <p class="comment-date"> <span>By John smith</span> 2022/03/25</p>
  </div>-->
</section>



<!--Add Review Modal-->
<section class="review-modal" id="review-modal">
  <div class="close-btn" id="close-btn">&times;</div>
  <h2>Add your review</h2>
  <div class="stars">
       <i class="fas fa-star star-light submit_star" id="star_1" data-index="1"></i>
       <i class="fas fa-star star-light submit_star" id="star_2" data-index="2"></i>
       <i class="fas fa-star star-light submit_star" id="star_3" data-index="3"></i>
       <i class="fas fa-star star-light submit_star" id="star_4" data-index="4"></i>
       <i class="fas fa-star star-light submit_star" id="star_5" data-index="5"></i>
  </div>
  <div class="input-review">
    <textarea name="review" id="review" cols="30" rows="5"></textarea>
  </div>
  <div class="review-btn">
       <button id="add-modal" onclick="add_review('<?php echo $get_product['0']['id']?>')">Add Review</button>
     </div>
</section>


  <!-- Related Products -->


<section class="section modal" id="compare">
    <div class="title">
      <h2>Compare Products</h2>
      <span>Select from the premium product brands and save plenty money</span>
    </div>

     <!--QR code-->
     <div class="popup">
  <span class="popuptext" id="myPopup"><img src="images/qr-code.png" alt="" srcset="">Scan the QR code</span>
</div>
  </section>



<div class="compare">
<a href="show_compare.php"><span>
          <small class="pcount d-flex"><?php echo $noProduct?></small>
            <i class="fas fa-balance-scale"></i>          
</span>
</a>
</div>

  <?php
    require('footer.php');
  ?>

  <!-- Custom Scripts -->
  <script src="./js/index.js"></script>
  <script type="text/javascript">
      var ratedIndex;
    resetStarColor();
    resetReviewStar();
    $('.fa-star').on('click', function(){
     ratedIndex=parseInt($(this).data('index'));
     return ratedIndex;
    });
  
    $('.submit_star').mouseover(function(){
      resetStarColor();
      var currentIndex=parseInt($(this).data('index'));
      for(var i=0; i<=currentIndex; i++){
          $('.submit_star:eq('+i+')').css('color', 'rgb(255, 200, 0)');
      }
    });
  
    $('.fa-star').mouseleave(function(){
      resetStarColor();
      if (ratedIndex !=-1) {
        for(var i=0; i<=ratedIndex; i++){
          $('.submit_star:eq('+i+')').css('color', 'rgb(255, 200, 0)');
        }
      }
    });

function resetStarColor(){
  $('.submit_star').css('color', 'black');
}

function resetReviewStar(){
  $('.main_star').css('color', 'black');
}

function add_review(id){
    var review=$('#review').val();
    if(review == ''){
      alert("Please write the review");
      return false;
    }else{
        $.ajax({
            url:"add_review.php",
            method:"POST",
            data:{ratedIndex:ratedIndex, review:review, id:id},
            success:function(data){
              $('#reveiw-modal').show('hide');
              alert(data);
              location.reload();
            }
        });
    }
}

    var id='<?php echo $get_product['0']['id']?>';
    $(document).ready(function(){
            
  $.ajax({
      url:"add_review.php",
      method:"POST",
      data:{action:'load_data',id:id},
      dataType:"JSON",
      success:function(data){
        $('#average_rating').text(data.average_rating);
        $('#total_review').text(data.total_review);
        
        console.log(data);

        var count_star=0;
        $('.main_star').each(function(){
            count_star++;
            if(Math.ceil(data.average_rating)>=count_star){
              $(this).css('color', 'rgb(255, 200, 0)');
              $(this).css('color', '');
            }
        });
              
                $('#total_five_star_review').text(data.five_star_review);

                $('#total_four_star_review').text(data.four_star_review);

                $('#total_three_star_review').text(data.three_star_review);

                $('#total_two_star_review').text(data.two_star_review);

                $('#total_one_star_review').text(data.one_star_review);

                $('#five_star_progress').prop('value', (data.five_star_review/data.total_review) * 100);

                $('#four_star_progress').prop('value', (data.four_star_review/data.total_review) * 100);

                $('#three_star_progress').prop('value', (data.three_star_review/data.total_review) * 100);

                $('#two_star_progress').prop('value', (data.two_star_review/data.total_review) * 100);

                $('#one_star_progress').prop('value', (data.one_star_review/data.total_review) * 100);

                if(data.review_data.length > 0)
                {
                    var html = '';

                    for(var count = 0; count < data.review_data.length; count++)
                    {
                        html +='<section class="customer-reviews">';

                        html += '<div class="customer-letter">';

                        html += '<h3><i class="fas fa-user"></i></h3>';

                        html += '</div>';

                        html += '<div class="stars">';

                        html += '<i class="fas fa-star"></i>';

                        html += '<i class="fas fa-star"></i>';

                        html += '<i class="fas fa-star"></i>';

                        html += '<i class="fas fa-star"></i>';

                        html += '<i class="fas fa-star"></i>';


                        html += '<p class="comment">'+data.review_data[count].review+'</p>';

                        html += '<p class="comment-date"></p>';

                        html += '</div>';

                       

                        html +='</section>';
                        html +='<br>';
                    }

                    $('#customer-reviews').html(html);
                }
      }
  });
    });
  </script>
</body>

</html>