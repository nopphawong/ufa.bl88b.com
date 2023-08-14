 // var bgSection01 = $('.bgSection01').find('img').attr('src');
 //   $(".section01").css('background', 'linear-gradient(45deg, #000000c2 0%, transparent 70%),url('+ bgSection01 + ')right center');

 // var bgSection02 = $('.bgSection02').find('img').attr('src');
 //   $(".section03").css('background', 'url('+ bgSection02 + ')center center');

 // var bgSection03 = $('.bgSection03').find('img').attr('src');
 //   $(".section04").css('background', 'url('+ bgSection03 + ')center center');

 // var bgSection04 = $('.bgSection04').find('img').attr('src');
 //   $(".section05").css('background', 'linear-gradient(45deg, #00000000 0%, transparent 70%),url('+ bgSection04 + ')center center');

 // var bgSection05 = $('.bgSection05').find('img').attr('src');
 //   $(".x-footer .-mobile-application-container").css('background', 'linear-gradient(45deg, #00000000 0%, transparent 70%),url('+ bgSection05 + ')center center');

 // var bgSection06 = $('.bgSection06').find('img').attr('src');
 //   $(".x-footer .-mobile-application-container.creditbg").css('background', 'url('+ bgSection06 + ')center center');

 // var bgSection07 = $('.bgSection07').find('img').attr('src');
 //   $(".section07").css('background', 'url('+ bgSection07 + ')center center');


         alldeleteBtn = document.querySelectorAll('.delete')
         alldeleteBtn.forEach(onebyone => {
            onebyone.addEventListener('click',deleteINsession)
         })

function deleteINsession(){
    removable_id = this.id;
    $('#p' + removable_id).removeClass("active");
    $('#p' + removable_id).find("span").removeClass("hide");
    $.ajax({
                url:'/cartprocess/cart.php',
                method:'POST',
                dataType:'json',
                data:{ 
                      id_to_remove:removable_id,
                      action:'remove' 
                },
                success:function(data){
                        $('#displayCheckout').html(data);
                        $('.overlaycart').addClass('show'); 


 


           alldeleteBtn = document.querySelectorAll('.delete')
         alldeleteBtn.forEach(onebyone => {
            onebyone.addEventListener('click',deleteINsession)
         })
                      }
              }).fail( function(xhr, textStatus, errorThrown) {
        alert(xhr.responseText);
    });

}


        $('.add').click(function() { 
            $(this).addClass("active");

            $(this).find("i").addClass("fa-cart-plus");
            $(this).find("i").removeClass("fa-cart-arrow-down");
            $(this).find("span").addClass("hide");

            id = $(this).data('id');
            name = $('#name' + id).val();
            price = $('#price' + id).val();
            quantity = $('#quantity' + id).val();
              $.ajax({
                url:'/cartprocess/cart.php',
                method:'POST',
                dataType:'json',
                data:{
                      cart_id : id,
                      cart_name : name,
                      cart_price : price,
                      cart_quantity : quantity,
                      action:'add' 
                },
                success:function(data){
                    if ($('.overlaycart').hasClass('show')) {
                        $('#displayCheckout').html(data);
                        $('.overlaycart').addClass('show'); 
                    } else {
                        $('#displayCheckout').html(data);
                    }
 

                        alldeleteBtn = document.querySelectorAll('.delete')
         alldeleteBtn.forEach(onebyone => {
            onebyone.addEventListener('click',deleteINsession)
         })
                      }
              }).fail( function(xhr, textStatus, errorThrown) {
        alert(xhr.responseText);
    });
        
        });



// BUTTON PROCESS
$(document).on("click",".buttonstep.step04",function() {

      $.ajax({
                url:'/cartprocess/cart.php',
                method:'POST',
                dataType:'json',
                data:{ 
                      action:'clear' 
                },
                success:function(data){
                        $('#displayCheckout').html(data);

                        $('.btncart').removeClass('active'); 
                        $('.btncart').find("span").removeClass("hide");


           alldeleteBtn = document.querySelectorAll('.delete')
         alldeleteBtn.forEach(onebyone => {
            onebyone.addEventListener('click',deleteINsession)
         })
                      }
              }).fail( function(xhr, textStatus, errorThrown) {
        alert(xhr.responseText);
    });

});




$(document).ready(function(e){


    // Submit form data via Ajax
   $(document).on("submit","#formcheckout",function(e) {
        e.preventDefault();
     document.getElementById('submitcheckout').value = 'โปรดรอสักครู่...';
  var testMail = $('#emailcart').val();
var check_email = '[a-zA-Z0-9]{0,}([.]?[a-zA-Z0-9]{1,})[@](gmail.com)';
var patt = new RegExp(check_email);
var result = patt.test(testMail);
if (!result) {
     $('.cartstep').hide(); 
  $('.buttonstep').hide(); 
  $('.buttonstep.step02').css('display','flex');
  $('.cartstep.step02').show(); 
     $('#alertemail').hide(); 
    $('#alertemail').show(); 
  $('#alertemail').html('โปรดกรอกอีเมลล์ @gmail.com ให้ถูกต้อง'); 
   document.getElementById('submitcheckout').value = 'ยืนยันการชำระเงิน';
}else{

    if (document.getElementById("image").files.length == 0)
{   $('#alertupload').show(); 
    $('#alertupload').html('โปรดอัพโหลดสลิปการโอนเงิน'); 
 document.getElementById('submitcheckout').value = 'ยืนยันการชำระเงิน';
  //upload your selected file here
}
else
{
    $.ajax({
       type: "POST",
       url: "/cartprocess/checkout.php",
       data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
       success: function(result) {
              if(result.status == 1) // Success
              {     
                $('#alertupload').hide(); 
                $('#alertupload').html('โปรดอัพโหลดสลิปการโอนเงิน'); 
                  let inputVal = $('#emailcart').val();
                  $('#emailcustomer').html(inputVal); 
                  $('.cartstep').hide(); 
                  $('.buttonstep').hide(); 
                  $('.totalcart').hide();
                  $('.buttonstep.step04').css('display','flex');
                  $('.cartstep.step04').show(); 
                  $('.btncart').hide();
                document.getElementById('submitcheckout').value = 'ยืนยันการชำระเงิน';
              }
              else // Err
              {
                alert(result.message);
              }
            }
          });
}


}
  
});
});

$(document).on("click","#finishbtn",function() {
  $('.cartstep').hide(); 
                  $('.buttonstep').hide(); 
                  $('.totalcart').show();
                  $('.buttonstep.step01').css('display','flex');
                  $('.cartstep.step01').show(); 
                  $('.btncart').show();
});



$(document).on("click",".buttonstep.step01 button",function() {
  $('.cartstep').hide(); 
  $('.buttonstep').hide(); 
  $('.buttonstep.step02').css('display','flex');
  $('.cartstep.step02').show(); 
});

$(document).on("click",".buttonstep.step01 button",function() {
  $('.cartstep').hide(); 
  $('.buttonstep').hide(); 
  $('.buttonstep.step02').css('display','flex');
  $('.cartstep.step02').show(); 
});


$(document).on("click",".buttonstep.step02 .back",function() {
  $('.cartstep').hide(); 
  $('.buttonstep').hide(); 
  $('.buttonstep.step01').css('display','flex');
  $('.cartstep.step01').show(); 
});

$(document).on("click",".buttonstep.step02 .next",function() {
  var testMail = $('#emailcart').val();
var check_email = '[a-zA-Z0-9]{0,}([.]?[a-zA-Z0-9]{1,})[@](gmail.com)';
var patt = new RegExp(check_email);
var result = patt.test(testMail);
if (!result) {
    $('#alertemail').hide(); 
    $('#alertemail').show(); 
  $('#alertemail').html('โปรดกรอกอีเมลล์ @gmail.com ให้ถูกต้อง'); 
}else{
    $('.cartstep').hide(); 
  $('.buttonstep').hide(); 
  $('.buttonstep.step03').css('display','flex');
  $('.cartstep.step03').show();
  $('#alertemail').hide(); 
}

});

$(document).on("click",".buttonstep.step03 .back",function() {
  $('.cartstep').hide(); 
  $('.buttonstep').hide(); 
  $('.buttonstep.step02').css('display','flex');
  $('.cartstep.step02').show(); 
});


// BUTTON PROCESS






$(document).on("click",".fakebutton,.cartbutton",function() {
  $('.overlaycart').toggleClass('show');
  $('.navheader').toggleClass('cartopen'); 
});

$(document).on("click",".closebutton",function() {
  $('.overlaycart').toggleClass('show');
  $('.navheader').toggleClass('cartopen'); 
});

$(document).on("click","#cp_btn",function() {
  var copyText = document.getElementById("pwd_spn");
    var textArea = document.createElement("textarea");
    textArea.value = copyText.textContent;
    document.body.appendChild(textArea);
    textArea.select();
    document.execCommand("Copy");
   $('#cp_btn').html('คัดลอกแล้ว'); 
   setTimeout(function() { 
         $('#cp_btn').html('คัดลอกบัญชี');
    }, 2000);
});



jarallax(document.querySelectorAll('.jarallax'), {
    speed: .7
});


$('a[href^="https://"]').attr('target','_blank');
$('.thisscript').remove();


var swiper = new Swiper(".gslidesec01", {
     effect: "cube",
        grabCursor: true,
        cubeEffect: {
          shadow: true,
          slideShadows: true,
          shadowOffset: 20,
          shadowScale: 0.94,
        },
        autoplay: {
          delay: 4000,
          disableOnInteraction: false,
        },
      });             


var swiper = new Swiper(".graphic", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        initialSlide: 1,
        coverflowEffect: {
          rotate: 20,
          stretch: 0,
          depth: 100,
          modifier: 1,
          slideShadows: true,
        },
      });



var swiper = new Swiper(".creditslide01", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        initialSlide: 3,
        coverflowEffect: {
          rotate: 20,
          stretch: 0,
          depth: 50,
          modifier: 1,
          slideShadows: true,
        },
      });





function openTabDesign(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("themetabct");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
$('.tablinks').first().addClass("active");




$('.openimgctn button, .overlayimg').on('click', function () {
        $('.openimg').hide();
});

$('.btnviewweb').on('click', function () {
        $('.openimg').show();
        var srcimg = $(this).parent("div").find("img").attr("src");
        $('#imgshowweb').attr('src',srcimg);
});
$(this).attr('id')

$("a[href='#contactmodal'").on('click', function () {
    $('.contactdiv').css('display','flex');
});

$('.incontactdiv button, .overlaycontact').on('click', function () {
        $('.contactdiv').css('display','none');
});


         
$('.sidebarbtn').on('click', function () {
  $('.sidebarbtn').toggleClass('open'); 
  $('.sidebarbtn').toggleClass('hamopen');
});

$('#sidebar ul li a').on('click', function () {
        $('#sidebar').removeClass('active');
        $('.overlay').removeClass('active');
          $('.sidebarbtn').toggleClass('open'); 
          $('.sidebarbtn').toggleClass('hamopen');
});


    $('#dismiss, .overlay').on('click', function () {
        $('#sidebar').removeClass('active');
        $('.overlay').removeClass('active');
          $('.sidebarbtn').toggleClass('open'); 
         $('.sidebarbtn').toggleClass('hamopen');
    });
    $('.sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        $('.overlay').toggleClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });







    
//เมาส์ hover ไลน์โชว์ QRcode
const tip = document.querySelector(".tip");
const trigger = document.querySelector(".tip_trigger");

trigger.addEventListener("mouseover", function () {
    if(window.innerWidth > 768){
       tip.style.display = "unset";
  setTimeout(() => {
    tip.style.opacity = 1;
    tip.style.transform = "scale(1)"
  }, 1)
    }else{
      
    }

});

trigger.addEventListener("mouseleave", function () {
  tip.style.transform = "scale(0.95)"
  tip.style.opacity = 0;
  tip.style.display = "none";
});

trigger.addEventListener("mousemove", function (e) {
  let mousex = e.pageX + 20;
  let mousey = e.pageY + 20;
  const tipWidth = tip.offsetWidth;
  const tipHeight = tip.offsetHeight;
  const tipVisX = window.innerWidth - (mousex + tipWidth);
  const tipVisY = window.innerHeight - (mousey + tipHeight);

  if (tipVisX < 20) mousex = e.pageX - tipWidth - 20;
  if (tipVisY < 20) mousey = e.pageY - tipHeight - 20;

  tip.style.top = mousey + 'px';
  tip.style.left = mousex + 'px';
});






























