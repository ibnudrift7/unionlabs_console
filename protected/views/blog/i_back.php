<div class="clear"></div>
<div class="subpage defaults_static">
  <div class="top_title_page margin-bottom-40">
    <div class="prelatife container">
      <h2 class="title_pg">Tips & Saran</h2>
    </div>
  </div>

  <div class="middle inside_content">
    <div class="prelatife container">
      <div class="content-text text-left">
      <?php if ($dataBlog->getTotalItemCount() > 0): ?>
      <?php $data = $dataBlog->getData(); ?>
      <div class="outers_listing_news defaults_t">
            <div class="row default">
              <div class="col-md-6">
                <div class="items featured">
                    <div class="pict"><a href="<?php echo CHtml::normalizeUrl(array('detail', 'id'=>$data[0]->id)); ?>"><img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(648,450, '/images/blog/'.$data[0]->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="img-responsive"></a></div>
                    <div class="desc">
                        <div class="titles"><?php echo $data[0]->description->title ?></div>
                        <div class="clear"></div>
                        <a href="<?php echo CHtml::normalizeUrl(array('detail', 'id'=>$data[0]->id)); ?>" class="btn btn-default btns_news_default">BACA ARTIKEL</a>
                    </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="row default">
                    <?php foreach ($data as $key => $value): ?>
                    <?php if ($key > 0 AND $key < 5): ?>
                    <div class="col-md-6 col-sm-6">
                        <div class="items">
                          <div class="pict top_nf"><a href="<?php echo CHtml::normalizeUrl(array('detail', 'id'=>$value->id)); ?>"><img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(312,216, '/images/blog/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="img-responsive"></a></div>
                          <div class="desc">
                              <div class="titles"><?php echo $value->description->title ?></div>
                              <div class="clear"></div>
                              <a href="<?php echo CHtml::normalizeUrl(array('detail', 'id'=>$value->id)); ?>" class="btn btn-default btns_news_default">BACA ARTIKEL</a>
                          </div>
                        </div>
                    </div>
                    <?php endif ?>
                    <?php endforeach ?>
                  </div>
              </div>
            </div>

            <div class="row default">
              <?php foreach ($data as $key => $value): ?>
              <?php if ($key > 4): ?>
                <div class="col-md-3 col-sm-3">
                    <div class="items">
                      <div class="pict"><a href="<?php echo CHtml::normalizeUrl(array('detail', 'id'=>$value->id)); ?>"><img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(312,216, '/images/blog/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="img-responsive"></a></div>
                      <div class="desc">
                          <div class="titles"><?php echo $value->description->title ?></div>
                          <div class="clear"></div>
                          <a href="<?php echo CHtml::normalizeUrl(array('detail', 'id'=>$value->id)); ?>" class="btn btn-default btns_news_default">BACA ARTIKEL</a>
                      </div>
                    </div>
                </div>
              <?php endif ?>
              <?php endforeach ?>
            </div>
            <div class="clear"></div>
        </div>
      <?php else: ?>
        <h3>No data blog</h3>
      <?php endif ?>
        <!-- end listing news -->
        <div class="clear height-10"></div>
      <div class="clear"></div>
    </div>
    <!-- end content berita artikel -->
    <div class="text-center bgs_paginations">
      <?php $this->widget('CLinkPager', array(
        'pages' => $dataBlog->getPagination(),
        'header' => '',
        'htmlOptions' => array('class' => 'pagination'),
      )) ?>
    </div>

      <div class="clear"></div>
    </div>

    <div class="clear"></div>
  </div>

  <div class="clear"></div>
</div>



<style type="text/css">
  .outers_listing_news.defaults_t .items .pict.top_nf{
    position: relative;
    max-height: 164px;
    overflow: hidden;
  }
  .outers_listing_news.defaults_t .items .desc .titles{
    height: auto;
    overflow: hidden;
    clear: left;
    text-align: left;
    text-overflow: ellipsis;
    white-space: nowrap;
    font-size: 16px;
  }
  .outers_listing_news.defaults_t .items{
    padding-bottom: 2rem;
  }  
</style>
