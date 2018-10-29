<?php
date_default_timezone_set('Europe/Stockholm');
$now = new DateTime();
$hunt_start = new DateTime($current_hunt['start_time']);
$diff = $hunt_start->diff($now);
?>
<div>
    <h2 class="live-header h3 mt-2 mb-2">Live!</h2>
    <ul class="list-unstyled h5">
        <li><strong>Drev:</strong> <?php echo $current_hunt['beat']; ?></li>
        <li><strong>Pass:</strong> <?php echo $current_hunt['stand']; ?></li>
        <li><strong>Tid:</strong> <span class="js-time-elapsed" data-starttime="<?php echo $current_hunt['start_time']; ?>"><?php echo $diff->format('%h:%i:%s'); ?></span></li>
    </ul>
</div>
<?php if ($current_hunt['longitud']) : ?>
    <a href="https://www.google.com/maps/search/?api=1&query=<?php echo $current_hunt['latitud'] . ',' . $current_hunt['longitud']; ?>" target="_blank" class="d-flex mt-2 flex-column align-items-center h6">
        <figure class="icon icon--map">
            <?php echo file_get_contents( get_template_directory() . '/assets/img/icon-map.svg' ); ?>
        </figure>
        <span class="text-center">Hitta till Stefan</span>
    </a>
<?php endif; ?>