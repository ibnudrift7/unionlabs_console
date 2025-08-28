<?php 
$cover_img = Yii::app()->baseUrl.ImageHelper::thumb(1366,369, '/images/static/'. $this->setting['contact_hero_cover'] , array('method' => 'adaptiveResize', 'quality' => '90'));
?>
<div class="outers_cont_inside_page back-white">
    <h1 style="visibilty: none; display:none;">Contact - {{ app_name }}</h1>
    <div class="insides_toppage_blocks prelatife">
        <div class="blocks_bottom_intop_page pg_about">
            <img src="<?php echo $cover_img ?>" alt="Cover" class="img-responsive center-block illustration">
        </div>
        <div class="posn_block_text">
            <div class="prelatife container">
                <div class="box-text-illustration">
                    <span>Contact</span> <div class="clear"></div>
                    <h3><?php echo $this->setting['contact_hero_title'] ?></h3>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>

    <div class="blocks_breadcrumbs_out">
        <div class="prelatife container">
            <div class="insides">
                <div class="row">
                    <div class="col-md-30 col-sm-30">
                        <nav aria-label="breadcrumb">
                          <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact</li>
                          </ol>
                        </nav>
                    </div>
                    <div class="col-md-30 col-sm-30">
                        <div class="text-rights backs_page">
                            <a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>">Back</a>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    
    <section class="default_sc blocksn_about_tc1 back-white" id="insides_page_about1">
        <div class="prelatife container">
            <div class="insides content-text">
                <h2 class="def-title">our contact</h2>
                <div class="py-0"></div>
                <div class="row">
                    <div class="col-md-15">
                        
                    </div>
                    <div class="col-md-45">

                        <div class="our_contact_address">
                            <h3>PT. SUMBER SELAMAT</h3>
                            <div class="row">
                                <div class="col-md-30">
                                     <div class="lists_address_info">
                                        <h6>Kantor Pusat</h6>
                                        <div class="py-1"></div>
                                        <p>Jalan Kramat Gantung 75 <br>
                                            Surabaya 60174<br>
                                            Jawa Timur - Indonesia</p>
                                     </div>
                                </div>
                                <div class="col-md-30">
                                    <div class="lists_address_info">
                                        <h6>Call Us</h6>
                                        <div class="py-1"></div>
                                        <p>Email. <br>
                                        info@sumberselamat.com</p>
                                        <p>Whatsapp. <br>
                                        <a href="https://wa.me/6287855570870">0878 5557 0870</a> (WA Only)</p>
                                     </div>
                                </div>
                            </div>

                        </div>

                        <div class="py-3"></div>
                        <div class="lines-grey"></div>
                        <div class="py-3"></div>

                        <!-- start form -->
                        <div class="rights_contact">                            
                            <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
                                              'type'=>'',
                                              'enableAjaxValidation'=>false,
                                              'clientOptions'=>array(
                                                  'validateOnSubmit'=>false,
                                              ),
                                              'htmlOptions' => array(
                                                  'enctype' => 'multipart/form-data',
                                              ),
                                          )); ?>
                               <?php echo $form->errorSummary($model, '', '', array('class'=>'alert alert-danger')); ?>
                                <?php if(Yii::app()->user->hasFlash('success')): ?>
                                    <?php $this->widget('bootstrap.widgets.TbAlert', array(
                                        'alerts'=>array('success'),
                                        'fade'=>false,
                                    )); ?>
                                <?php endif; ?>

                              <div class="form-group">
                                <label for="input1">Name</label>
                                <?php echo $form->textField($model, 'name', array('class'=>'form-control', 'placeholder'=> '')); ?>
                              </div>

                              <div class="form-group">
                                <label for="input1">Email</label>
                                <?php echo $form->textField($model, 'email', array('class'=>'form-control', 'placeholder'=> '')); ?>
                              </div>
                              <div class="form-group">
                                <label for="input1">Subject</label>
                                <?php echo $form->textField($model, 'subject', array('class'=>'form-control', 'placeholder'=> '')); ?>
                              </div>
                              <div class="form-group">
                                <label for="input1">Company</label>
                                <?php echo $form->textField($model, 'company', array('class'=>'form-control', 'placeholder'=> '')); ?>
                              </div>
                              <div class="form-group">
                                <label for="input1">Message</label>
                                <?php echo $form->textArea($model, 'body', array('class'=>'form-control', 'rows'=>2)); ?>
                              </div>

                              <div class="g-recaptcha" data-sitekey="6LfiJdcUAAAAAPc_3AiDzu79QR58UF270YH-EWB2"></div>
                              <br>
                              <button type="submit" class="btn btn-dark">SUBMIT</button>
                            <?php $this->endWidget(); ?>

                        </div>
                        <!-- end form -->

                        <div class="clear"></div>
                    </div>
                </div>
                
                <div class="py-3"></div>

                <div class="clear"></div>
            </div>
        </div>
    </section>

</div>