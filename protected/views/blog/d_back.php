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
      
      <div class="outers_listing_news defaults_t">
            <div class="row default">
              <div class="col-md-6">
                  <div class="block_details_news">
                    <h3><?php echo $dataBlog->description->title ?></h3>
                    <div class="clear height-20"></div>
                    <?php echo $dataBlog->description->content ?>
                    <div class="clear"></div>
                  </div>
              </div>
              <div class="col-md-6">
                <div class="picture_bigImage">
                    <div class="pict">
                      <img src="<?php echo Yii::app()->baseUrl.'/images/blog/'. $dataBlog->image ?>" alt="" class="img-responsive w-100">
                    </div>
                </div>
                <div class="clear height-40"></div>

                <div class="blocks_others_article">
                  <div class="tops"><h5>Artikel Tips & Trik Lainnya</h5></div>
                  <div class="row default">
                    <?php foreach ($dataBlogs->getData() as $key => $value): ?>
                        
                      <div class="col-md-6 col-sm-6">
                          <div class="items">
                            <div class="pict"><a href="<?php echo CHtml::normalizeUrl(array('detail', 'id'=>$value->id)); ?>"><img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(312,216, '/images/blog/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="img-responsive"></a></div>
                            <div class="desc">
                                <div class="titles"><?php echo $value->description->title ?></div>
                                <div class="clear"></div>
                                <a href="<?php echo CHtml::normalizeUrl(array('detail', 'id'=>$value->id)); ?>" class="btn btn-default btns_news_default">BACA ARTIKEL</a>
                            </div>
                          </div>
                      </div>
                    <?php endforeach ?>
                    </div>
                  <div class="clear height-0"></div>

                  <div class="clear"></div>
                </div>

                
              </div>
            </div>

            <div class="clear"></div>
        </div>
        <!-- end listing news -->
        <div class="clear height-10"></div>
      <div class="clear"></div>
    </div>
    <!-- end content berita artikel -->


      <div class="clear"></div>
    </div>

      <div class="blocks_bottom_backTips back-white">
        <div class="prelatife container">
          <div class="inside text-center">
            <a href="<?php echo CHtml::normalizeUrl(array('/blog/index')); ?>" class="btn btn-link btns_bloc_back_saran">KEMBALI KE TIPS & SARAN</a>
            <div class="clear"></div>
          </div>
        </div>
      </div>
    <div class="clear"></div>
  </div>

  <div class="clear"></div>
</div>
<style type="text/css">
  .subpage.defaults_static .middle.inside_content{
    padding-bottom: 0;
  }
  img.w-100{
    width: 100%;
  }
</style>


