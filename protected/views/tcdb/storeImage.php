<?php
/**
 * Created by PhpStorm.
 * User: Dung
 * Date: 12/1/2017
 * Time: 5:07 PM
 */

?>
<style type="text/css">
    .store-image{
        position: relative;
        height: 100vh;
        width: 100%;
    }
</style>
<div class="store-image"></div>
<script type="text/javascript">
    $(document).ready(function () {
        var urlImage = localStorage.getItem('image');
        $('.store-image').css({
            'background': 'url(' + urlImage + ') no-repeat',
            'background-size': 'cover',
            'width': ''+window.innerWidth+'',
            'height': ''+window.innerHeight+''
        })
    })
</script>