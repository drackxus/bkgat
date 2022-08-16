<?php
global $current_user;
global $post;
wp_get_current_user();
if (is_user_logged_in()) {
  $loginUser = "true";
  $idUser = $current_user->ID;
  $idPost = $post->ID;
}
?>
<style>
    .theChampFacebookSvg {
        background: url(data:image/svg+xml;charset=utf8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22100%25%22%20height%3D%22100%25%22%20viewBox%3D%22-5%20-5%2042%2042%22%3E%3Cpath%20d%3D%22M17.78%2027.5V17.008h3.522l.527-4.09h-4.05v-2.61c0-1.182.33-1.99%202.023-1.99h2.166V4.66c-.375-.05-1.66-.16-3.155-.16-3.123%200-5.26%201.905-5.26%205.405v3.016h-3.53v4.09h3.53V27.5h4.223z%22%20fill%3D%22%23fff%22%3E%3C%2Fpath%3E%3C%2Fsvg%3E) no-repeat center center !important;
    }
    .theChampTwitterSvg {
        background: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIHZpZXdCb3g9Ii04IC04IDY0IDY0Ij4NCjxwYXRoIGQ9Ik0gMzggMTkgcSAyIC0xIDQgLTUgcSAtMS41IDIgLTQgMiBxIDEuNSAtMSAzLjUgLTUgcSAtMS41IDIgLTUgMiBjIC01IC01IC0xMyAtMiAtMTIgNiBxIC03IDEgLTE1IC04IHEgLTIgNCAxIDkgcSAtMSAwIC0zIC0xIHEgMCA1IDUgNyBxIC0xIC41IC0zIDAgcSAxIDQgOCA2IHEgLTUgMyAtMTEgMyBjIDE0IDggMzAgMCAzMS41IC0xNCIgc3Ryb2tlLXdpZHRoPSIwLjMiIGZpbGw9IiNmZmYiPjwvcGF0aD4NCjwvc3ZnPg==) left no-repeat !important;
    }
    .theChampWhatsappSvg {
        background: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIHZpZXdCb3g9Ii01IC01IDQwIDQwIj48cGF0aCBpZD0iYXJjMSIgc3Ryb2tlPSIjZmZmIiBzdHJva2Utd2lkdGg9IjIiIGZpbGw9Im5vbmUiIGQ9Ik0gMTEuNTc5Nzk4NTY2NzQzMzE0IDI0LjM5NjkyNjIwNzg1OTA4NSBBIDEwIDEwIDAgMSAwIDYuODA4NDc5NTU3MTEwMDc5IDIwLjczNTc2NDM2MzUxMDQ2Ij48L3BhdGg+PHBhdGggZD0iTSA3IDE5IGwgLTEgNiBsIDYgLTEiIHN0cm9rZT0iI2ZmZiIgc3Ryb2tlLXdpZHRoPSIyIiBmaWxsPSJub25lIj48L3BhdGg+PHBhdGggZD0iTSAxMCAxMCBxIC0xIDggOCAxMSBjIDUgLTEgMCAtNiAtMSAtMyBxIC00IC0zIC01IC01IGMgNCAtMiAtMSAtNSAtMSAtNCIgZmlsbD0iI2ZmZiI+PC9wYXRoPjwvc3ZnPg==) left no-repeat !important;
    }    
    .theChampEmailSvg {
        background: url(data:image/svg+xml;charset=utf8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22100%25%22%20height%3D%22100%25%22%20viewBox%3D%22-4%20-4%2043%2043%22%3E%3Cpath%20d%3D%22M%205.5%2011%20h%2023%20v%201%20l%20-11%206%20l%20-11%20-6%20v%20-1%20m%200%202%20l%2011%206%20l%2011%20-6%20v%2011%20h%20-22%20v%20-11%22%20stroke-width%3D%221%22%20fill%3D%22%23fff%22%3E%3C%2Fpath%3E%3C%2Fsvg%3E) no-repeat center center !important;
    }    
</style>
<script>
    jQuery(document).ready(function() {
        jQuery.ajax({
              type: "post",
              url: MyAjax.url,
              data: {
                action: "test_reto",
                user: '<?php echo $idUser; ?>',
                post: '<?php echo $idPost; ?>',
              },
              beforeSend: function() {
                jQuery('#loader').css('display', 'flex');
              },
              error: function(response) {
                console.log(response);
                jQuery('#loader').css('display', 'none');
              },
              success: function(response_json) {
                 jQuery('#loader').css('display', 'none');
                 response = JSON.parse(response_json);
                console.log(response);
                 if(response[0].popup == 'visualizaciones') {
                    jQuery('.msgAlert').css('display', 'flex');
                    jQuery('.msgAlert .txtMsg').html('<h4 class="felicitaciones" style="text-transform:uppercase;">RETO ACTIVADO:</h4><div class="content_cont_h1_line"></div><br>'+ response[0].mensaje +'<br><br><div class="list_retos_logrados_el"> <div><video style="filter: brightness(0.4)"> <source src="'+ response[0].video +'" type="video/mp4"> </video></div><h3>'+ response[0].titulo +'</h3></div></div>');
                    jQuery('.msgAlert .aMsg').css('display', 'block');
                    jQuery('.msgAlert .txtMsg').css('margin-bottom', '-10px');
                    jQuery('.msgAlert .txtMsg').css('width', '100%');
                    jQuery('.msgAlert .aMsg').html('Ir a la búsqueda de más contenidos');
                    jQuery('.msgAlert .aMsg').css('font-size', '12px');
                    jQuery('.msgAlert .aMsg').attr('href', '<?php echo home_url(); ?>');
                 }
                 
                 if(response[0].popup == 'completado') {
                    jQuery('.msgAlert').css('display', 'flex');
                    jQuery('.msgAlert .txtMsg').html(`<h4 class="felicitaciones" style="text-transform:uppercase;">RETO ACTIVADO:</h4><div class="content_cont_h1_line"></div><br><div class="list_retos_logrados_el"> <div><video autoplay muted loop playsinline> <source src="`+ response[0].video +`" type="video/mp4"> </video></div><h3>`+ response[0].titulo +`</h3></div><p style="color: black;text-align: center;font-family: Gatorade black;font-size: 17px;width: 100%;margin: 0;padding: 20px 0px 8px;line-height: 19px;">¡COMPARTE TU MEDALLA CON TUS AMIGOS E INVITALOS AL DESAFIO!</p><div class="the_champ_sharing_container the_champ_horizontal_sharing" style="padding-bottom:20px;" ss-offset="0" super-socializer-data-href="<?php echo home_url('retos'); ?>"> <div style="font-weight:bold" class="the_champ_sharing_title"></div><ul class="the_champ_sharing_ul" style="display:flex;justify-content:center;align-items:center;width:100%;"> <li class="theChampSharingRound"> <i style="width:35px;height:35px;border-radius:999px;" alt="Facebook" title="Facebook" class="theChampSharing theChampFacebookBackground" onclick='theChampPopup("https://www.facebook.com/sharer/sharer.php?u=<?php echo home_url('retos'); ?>&quote=¡Hoy supere otro Reto! Únete y Alcanza tu máximo potencial. Acepta el reto <?php echo home_url(); ?>")'> <ss style="display:block;border-radius:999px;" class="theChampSharingSvg theChampFacebookSvg"> </ss> </i> </li><li class="theChampSharingRound"> <i style="width:35px;height:35px;border-radius:999px;" alt="Twitter" title="Twitter" class="theChampSharing theChampTwitterBackground" onclick='theChampPopup("http://twitter.com/intent/tweet?text=¡Hoy supere otro Reto!🏆 únete y Alcanza tu máximo potencial 💪🏼Acepta el reto  👉 <?php echo home_url(); ?>&amp;url=<?php echo home_url('retos'); ?>")' > <ss style="display:block;border-radius:999px;" class="theChampSharingSvg theChampTwitterSvg"></ss> </i> </li><li class="theChampSharingRound"> <i style="width:35px;height:35px;border-radius:999px;" alt="Whatsapp" title="Whatsapp" class="theChampSharing theChampWhatsappBackground" onclick='theChampPopup("https://web.whatsapp.com/send?text=¡Hoy supere otro Reto!🏆 únete y Alcanza tu máximo potencial 💪🏼Acepta el reto  👉 <?php echo home_url('retos'); ?>")' > <ss style="display:block" class="theChampSharingSvg theChampWhatsappSvg"></ss> </i> </li><li class="theChampSharingRound"> <i style="width:35px;height:35px;border-radius:999px;" alt="Email" title="Email" class="theChampSharing theChampEmailBackground" onclick="window.open('mailto:?subject=¡Hoy supere otro Reto!🏆 únete y Alcanza tu máximo potencial 💪🏼Acepta el reto  👉 gatorade.lat&amp;body=' + decodeURIComponent('<?php echo home_url('retos'); ?>' ), '_blank')"> <ss style="display:block" class="theChampSharingSvg theChampEmailSvg"></ss> </i> </li></ul> <div style="clear:both"></div></div>`);
                    jQuery('.msgAlert .aMsg').css('display', 'block');
                    jQuery('.msgAlert .txtMsg').css('margin-bottom', '-32px');
                    jQuery('.msgAlert .txtMsg').css('width', '100%');
                    jQuery('.msgAlert .aMsg').html('IR A TU PERFIL');
                    jQuery('.msgAlert .aMsg').attr('href', '<?php echo home_url('perfil'); ?>');
                 }
              }
            })
    });
</script>