<script type="text/javascript">
$(document).ready(function(){

     $("#otro").click(function() {
		 $("#seccioncaptcha").load('{{url('captchanuevo')}}') ;
     });
 
 });    
</script>

<img src = "{{asset('captchas/'.$captcha->ruta)}}"height = '80' widht='80'>
<input type = 'button'  class="btn btn-primary"  value = 'Otro' id='otro'>
<br>
<input type = 'hidden' name='textcap' id='textcap' value = '{{$captcha->idcap}}'>