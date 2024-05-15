<?php
function getMethod($status){
    $text = "<strong class='stt stt-2'>Thanh toán sau</strong>";
    if($status == 1){
        $text = "<strong class='stt stt-1'>Thanh toán onepay</strong>";
    }
    return $text;
}
?>