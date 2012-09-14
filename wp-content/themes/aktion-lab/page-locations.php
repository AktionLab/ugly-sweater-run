<?php
/*
Template Name: Locations Template
*/
?>

<script type="text/javascript">
$(function() {
  $("#location-map a.icon").hover(
    function() {
      $(this).find("span")
        //.css("left", left)
        //.css("top", top) 
        .show();
    },
    function() {
      $(this).find("span").hide();
    }
  );
});
</script>
  <div id="location-map">
    <a class="icon chicago" href="/chicago-il"><span>Chicago | TBD</span></a> 
    <a class="icon memphis" href="/memphis-tn"><span>Memphis | Dec 8</span></a> 
    <a class="icon denver" href="/denver-co"><span>Denver | Dec 8</span></a> 
    <a class="icon scottsdale" href="/scottsdale-az"><span>Scottsdale | TBD</span></a> 
    <a class="icon omaha" href="/omaha-ne"><span>Omaha | TBD</span></a> 
    <a class="icon louisville" href="/louisville-co"><span>Louisville | Dec 1</span></a> 
  </div>