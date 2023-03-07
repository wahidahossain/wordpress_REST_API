

<?php

//select MAX(NUMBER) as 'NUMBER' from "SALES_ORDER_HEADER" where NUMBER NOT LIKE 'Q%'
// select * from "SALES_ORDER_HEADER" where NUMBER = '0001227171'

//select * from "SALES_ORDER_DETAIL" where BVRVADDDATE = '20230208'

//select * from SALES_ORDER_DETAIL where NUMBER = '0001227171' AND
//(RECNO = 1 or
//RECNO = 2 
//)

// select * from SALES_ORDER_DETAIL where NUMBER LIKE '%0001227171%'
?>


<!DOCTYPE html>
<html>
<body>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

<script>
function count_title() {
  var el_t = document.getElementById("titletag");
  var maxLength = 10;
  //var el_c = document.getElementById("ctitle");
 // el_c.innerHTML = maxLength - el_t.value.length;
//   el_t.oninput = function() {
//    var max = document.getElementById("ctitle").innerHTML = maxLength - this.value.length;
   
//   };
  if(el_t.value.length>=10){
        alert("Alert: Customer name field have more than 40 characters!")
}
}
// function count_mdesc() {
//   var el_t = document.getElementById("metadesc");
//   var maxLength = 320;
//   var el_c = document.getElementById("cmdesc");
//   el_c.innerHTML = maxLength - el_t.value.length;
//   el_t.oninput = function() {
//     document.getElementById("cmdesc").innerHTML = maxLength - this.value.length;
    
//   };
// }


window.onload = function() {
    count_title();
};

// var maxLength = $(this).attr("maxlength");
//         if(maxLength == $(this).val().length) {
//         alert("You can't write more than " + maxLength +" chacters")
// }

</script>

<script>                                                  
        // $("input").on("keyup",function() {
        // var maxLength = $(this).attr("maxlength");
        // if(maxLength == $(this).val().length) {
        // alert("You can't write more than " + maxLength +" chacters")
        // }
        // })
</script>
<label for="titletag">Title</label><br>
<div class="wrap">
<textarea name="text" id="titletag" cols="100" rows="1" oninput="count_title('ctitle')">Default title (variable length).</textarea><span id="ctitle" class="counter"></span></div><br><br>
<a href="test.php">Link</a>

</body>
</html>
