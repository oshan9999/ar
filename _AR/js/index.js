const openNav = document.querySelector(".open-btn");
const closeNav = document.querySelector(".close-btn");
const menu = document.querySelector(".nav-list");

openNav.addEventListener("click", () => {
  menu.classList.add("show");
});

closeNav.addEventListener("click", () => {
  menu.classList.remove("show");
});

// Fixed Nav
const navBar = document.querySelector(".nav");
const navHeight = navBar.getBoundingClientRect().height;
window.addEventListener("scroll", () => {
  const scrollHeight = window.pageYOffset;
  if (scrollHeight > navHeight) {
    navBar.classList.add("fix-nav");
  } else {
    navBar.classList.remove("fix-nav");
  }
});

// Scroll To
const links = [...document.querySelectorAll(".scroll-link")];
links.map((link) => {
  if (!link) return;
  link.addEventListener("click", (e) => {
    e.preventDefault();

    const id = e.target.getAttribute("href").slice(1);

    const element = document.getElementById(id);
    const fixNav = navBar.classList.contains("fix-nav");
    let position = element.offsetTop - navHeight;

    window.scrollTo({
      top: position,
      left: 0,
    });

    navBar.classList.remove("show");
    menu.classList.remove("show");
    document.body.classList.remove("show");
  });
});


//User registration form
function user_register(){
  var name=jQuery("#name").val();
  var email=jQuery("#email").val();
  var phone=jQuery("#phone").val();
  var usertype=jQuery("#usertype").val();
  var password=jQuery("#password").val();

  if (name=="") {
    alert("Please enter name");
  }
  else if(email==""){
    alert("Please enter email");
  }
  else if(usertype=="Select"){
    alert("Please select user type");
  }
  else if(password==""){
    alert("Please enter password");
  }
  else if(phone==""){
    alert("Please enter mobile number");
  }
  else{
    jQuery.ajax({
            url:'register_submit.php',
            type:'post',
            data:'name='+name+'&email='+email+'&phone='+phone+'&usertype='+usertype+'&password='+password,
            success:function(result){
                alert(result);
                window.location.href="login.php?result=Inserted";
              }
    });
  }
}

//User Login function

function user_login(){
  var username=jQuery("#username").val();
  var password=jQuery("#pass").val();

  if (username=="") {
    alert("Please enter name");
  }
  else if(password==""){
    alert("Please enter password");
  }
  else{
    jQuery.ajax({
            url:'login_submit.php',
            type:'post',
            dataType:'JSON',
            data:'username='+username+'&pass='+password,
            success:function(result){
                //alert(result);
               // result=result.trim();
               //result=JSON.parse(result);
                if (result=='wrong') {
                  window.location.href="login.php";
                }if (result.userType=="Plant distributor") {
                  window.location.href="./plant_distributor";
                }else if(result.userType=="Garden designer"){
                  window.location.href="./dectoration_distributor";
                }else if(result.userType=="Landscape architecture"){
                  window.location.href="./landscape_architecture";
                }
                else if(result.userType=="Customer"){
                  window.location.href="index.php";
                }else{
                  alert('please check your email and password again');
                }
              }
    });
  }
}


//Add to cart


//Manage cart
function manage_cart(pid,type){
  if (type=='update') {
    var qty=jQuery("#"+pid+"qty").val();
  }else{
    var qty=jQuery("#qty").val();
  }
  jQuery.ajax({
            url:'manage_cart.php',
            type:'post',
            data:'pid='+pid+'&qty='+qty+'&type='+type,
            success:function(result){
                if (type=='update' || type=='remove') {
                  window.location.href='cart.php';
                }
                jQuery('.count').html(result);
              }
    });

}

//Compare products
function compare_product(pid,type,ptype){
  jQuery.ajax({
    url:'compare_product.php',
    type:'post',
    data:'pid='+pid+'&qty='+1+'&type='+type+'&ptype='+ptype,
    success:function(result){
      if (type=='update' || type=='remove') {
        window.location.href='show_compare.php';
      }
      jQuery('.pcount').html(result);
    }
  });
}
 

//Product compare modal
function popupModal(){
  var modal=document.getElementById("compare");
  modal.classList.toggle("show");
}


//Popup QR code
function myFunction(){
  var pop=document.getElementById("myPopup");
  pop.classList.toggle("show");
}


//Search Box
 $(document).ready(function(){
  $('#query').keyup(function(){
    var searchText=$(this).val();
    if (searchText !='') {
      $.ajax({
        url:'search.php',
        method:'post',
        data:{query:searchText},
        success:function($data){
          $("#auto-com").fadeIn('fast').html($data);
        }
      });
    }else{
          $("#auto-com").html('');
    } 
  });
  $(document).on("click","#auto-com li",function(){
    $("#query").val($(this).text());
    $("#auto-com").fadeOut();
  });
});

//Review Modal popup

var modal=document.getElementById("review-modal");

var btn=document.getElementById("open-modal");

var span=document.getElementById("close-btn");

btn.onclick=function(){
  modal.style.display="block";
  fadeIn(modal, 30);
}

span.onclick=function(){
  modal.style.display="none";
  
}

function fadeIn(element, time) {
  var fadingFrom = 0;
  element.style.opacity = 0;
  var fading = setInterval(function () {
      var fade = fadingFrom / time;
      element.style.display = "block";
      element.style.opacity = fade;
      fadingFrom++;
      if (fadingFrom == time) {
          element.style.opacity = 1;
          clearInterval(fading);
          fadingFrom = 0;
          return false;
      }
  }, time);
}


//Mouse Enter On 
  
  

