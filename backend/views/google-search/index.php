<?php
/* @var $this yii\web\View */
?>

<!--<form id="search" action="https://www.google.com/cse">
    <div>
        <input type="hidden" name="cx" value="015478557852572190756:uadg1dmibw0" />
        <input type="hidden" name="ie" value="UTF-8" />
        <input type="hidden" name="q" size="31" value="php" />
        <input type="submit" name="sa" value="Поиск" />
    </div>
</form>

<script type="text/javascript" src="http://www.google.com/coop/cse/brand?form=cse-search-box&amp;lang=en"></script>



<h1>google-search/index</h1>
<script>s
    (function() {
        var cx = '015478557852572190756:uadg1dmibw0';
        var gcse = document.createElement('script');
        gcse.type = 'text/javascript';
        gcse.async = true;
        gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(gcse, s);
    })();
</script>
<gcse:search></gcse:search>-->

<div class="m-p-g">
    <div class="m-p-g__thumbs" data-google-image-layout data-max-height="350">
<?php
//var_dump($json['items']);
 foreach ($json['items'] as $item) { ?>
             <img src="<?=$item['link']?>" data-full="<?=$item['link']?>" class="m-p-g__thumbs-img" />
<?php } ?>
         </div>

         <div class="m-p-g__fullscreen"></div>
     </div>

    <script>
        var elem = document.querySelector('.m-p-g');

        document.addEventListener('DOMContentLoaded', function() {
            var gallery = new MaterialPhotoGallery(elem);
        });
    </script>