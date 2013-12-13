<script type="text/javascript">
$(function() {
    jQuery('.list').jcarousel({
    	wrap: 'both' //ループの種類を指定
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

<script type="text/javascript">
$(document).ready(function() {
$('form').formtips({ 
class_name: 'tipped'
});
});
</script>

<script type="text/javascript">
$('#image').change(function() {
    var file = $(this).prop('files')[0];
    var fr = new FileReader();
    fr.onload = function() {
        $('#preview').attr('src', fr.result);   // 読み込んだ画像データをsrcにセット
    }
    fr.readAsDataURL(file);  // 画像読み込み
});
</script>