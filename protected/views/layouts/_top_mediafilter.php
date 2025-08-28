<!-- video, podcast, album -->
 <?php
 $activeSts = $active;
//  $arrList = ['video', 'album', 'podcast'];
$arrList = MediaTypes::model()->findAll();
// $arrList = CHtml::listData($arrList, 'name', 'name');
$arrFx = [];
foreach ($arrList as $key => $value) {
    $arrFx[strtolower($value->name)] = strtolower($value->name);
}

 $strClass = 'text-[#A1A1A1]  w-[290px] py-3 font-medium hover:text-[#fff] hover:bg-[#6B46C1] transition-colors md:text-md text-xs';
 $strClassActive = 'media-gradient text-white  w-[290px] py-3 font-medium md:text-md text-xs';
?>
<div class="flex justify-center space-x-8">
    
    <?php foreach ($arrFx as $key => $value) { 
        // echo $value. "<br>" . $activeSts;
        ?>
    <button 
    onclick="window.location.href='<?= Yii::app()->createUrl('media/index', ['type' => $value]); ?>';"
    class="<?= $activeSts == $value ? $strClassActive : $strClass ?>"><?= strtoupper($value) ?></button>
    <?php } ?>

    <!-- <button 
    onclick="window.location.href='<?= Yii::app()->createUrl('media/album'); ?>';"
    class="<?= $activeSts == $arrFx['album'] ? $strClassActive : $strClass ?>">ALBUM & MUSIK</button>
    <button 
    onclick="window.location.href='<?= Yii::app()->createUrl('media/podcast'); ?>';"
    class="<?= $activeSts == $arrFx['podcast'] ? $strClassActive : $strClass ?>">PODCAST</button> -->
</div>