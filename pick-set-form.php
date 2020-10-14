<link rel = "stylesheet" type="text/css" href = "css.css">
<nav class ="flex-container">
	<a href ="insert-set-form.php">Insert new set</a>
	<a href ="select-sets.php">Select a set</a>
</nav>

<?php
  $set = $_GET["set"];
  $setName = $_GET["setName"];
?>
<script>

  window.addEventListener("DOMContentLoaded",()=>{
    const pick = document.getElementById("pick");
    const pick_num = document.getElementById("pick_num");
    const display = document.getElementById("display");
    const title = document.getElementById("title");
    var name = "<?=$setName?>";
    title.innerHTML = name;
    console.log(name + "sdsd");
    var set = "<?=$set?>";
    const data_set = set.replace(/\s/g,'');
    var lotto_numbers = data_set.split(',');
    pick.addEventListener("click",pickSet);
    function resetData(){
      lotto_numbers = data_set.split(',');
    }
    function pickSet(){
      if(pick_num.value <= lotto_numbers.length && pick_num.value >=0){
        display.innerHTML = "";
        pickedSet =[];
        var index = Math.floor(Math.random()*Math.floor(lotto_numbers.length));
        for (var i = 0; i < pick_num.value; i++) {
          var reset = true;
          while(reset){
            var index = Math.floor(Math.random()*Math.floor(lotto_numbers.length));
            if(!(pickedSet.includes(lotto_numbers[index]))){
              reset = false;
            }
          }

          if(!(pickedSet.includes(lotto_numbers[index]))){
            pickedSet.push(lotto_numbers[index]);
          }
        }
        pickedSet.forEach((num)=>{
            display.innerHTML = display.innerHTML+ "[" + num + "]"+ "   ";
        });

      }else{
          if(pick_num.value >=0){
            display.innerHTML = "You can't pick more than the set size, the size is: "+lotto_numbers.length;
            }else{
                display.innerHTML = "value must be a positive number";
            }
      }
    }

  });

</script>

<div class ="center-container">
    <p id ="title">
    </p>
    <p id ="display" style="font-size:100px;"></p>
    <form>
      <input id ="pick_num" type ="text" placeholder ="enter amount to pick"/>
      <button type ="button" id ="pick">Pick</button>
    </form>
</div>
