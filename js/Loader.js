
https://loading.io/#


<div id="loader" class="col-xs-7 col-xs-offset-5" style="display:none">
  <?= Html::img('/images/Spinner.svg' ) ?>
</div>


$(function(){
  $('.update-db').click(function(event){
    $("#loader").css("display","block");
    event.preventDefault();
    event.stopPropagation();
    $.ajax({
      method:'GET',
      url:'/konsib/dump',
    }).done(function(res){
      if(res==='success'){
        $("#loader").css("display","none");
      }else{
        alert("Ошибка создания дампа контактов!");
        $("#loader").css("display","none");
      }
    });
  });
});

//Загрузка спомощью css
<script>
  $(window).on('load', function () {
    $preloader = $('.loaderArea'),
      $loader = $preloader.find('.loader');
    $loader.fadeOut();
    $preloader.delay(350).fadeOut('slow');
  });
</script>