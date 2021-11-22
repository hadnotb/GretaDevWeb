<svg class="svg-html" id='Avatar' viewBox ="0 0 <?=$size?> <?=$size?>" width ="550px" height="550px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    
    <?php foreach($grid as $rowIndex => $row):?>
        <?php foreach($row as $colIndex => $color): ?>
            <rect class ="rectangle" x ="<?=$colIndex?>" y="<?=$rowIndex?>" width="1" height="1" fill="<?=$color?>"/>
        <?php endforeach?>    
    <?php endforeach?>
</svg>