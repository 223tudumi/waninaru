<script type="text/javascript">
$(function() {
    jQuery('.list').jcarousel({
    	wrap: 'circular'
    });
});
</script>
<script type="text/javascript">
$(function(){
     $('a img').hover(function(){
        $(this).attr('src', $(this).attr('src').replace('_off', '_on'));
          }, function(){
             if (!$(this).hasClass('currentPage')) {
             $(this).attr('src', $(this).attr('src').replace('_on', '_off'));
        }
   });
});
</script>
<script type='text/javascript'>//<![CDATA[ 
$(function(){
$("#showoverlay").click(function() {
    $("body").append("<div id='overlay'></div>");
    $("#overlay").fadeTo(300, 0.7);
    $("#modalbox").fadeIn(300);
});
$("#close").click(function() {
    $("#modalbox, #overlay").fadeOut(300, function() {
        $("#overlay").remove();
    });

});
$(window).resize(function() {
    $("#modalbox").css({
        top: ($(window).height() - $("#modalbox").outerHeight()) / 2,
        left: ($(window).width() - $("#modalbox").outerWidth()) / 2
    });
});
$(window).resize();
});//]]>  
</script>
<script type="text/javascript">
$(document).ready(function() {
$('form').formtips({ 
class_name: 'tipped'
});
});
</script>