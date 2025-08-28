<!-- Start contents -->
<div class="md:py-7 py-5"></div>
<div class="main-contents">
        <div class="container mx-auto md:px-4 px-2 py-8 md:max-w-6xl max-w-full">
            <div class="grid lg:grid-cols-2 gap-8 items-center">
                <!-- Left Section - Customer Service Illustration -->
                <div class="flex justify-center items-center">
                    <div class="relative">
                        <!-- Background Circle -->
                        <div class="absolute inset-0 bg-blue-100 rounded-full w-56 h-56 md:w-96 md:h-96 -z-10"></div>
                        
                        <!-- Main Illustration Container -->
                        <div class="img-illustrasi">
                            <img src="<?php echo $this->assetBaseurl ?>bgn-contact.png" alt="Customer Service Illustration" class="w-full h-full object-cover max-w-[300px] md:max-w-[500px]">
                        </div>
                    </div>
                </div>

                <!-- Right Section - Contact Form -->
                <div class="bg-gradient-customsQuestion rounded-lg md:p-8 p-6 text-white m-2 md:m-0">
                    <h2 class="md:text-3xl text-2xl font-bold mb-4">Kamu Tanya, Kami Menjawab!</h2>
                    
                    <p class="md:mb-2 mb-1">Jangan ragu untuk menghubungi.</p>
                    <p class="md:mb-6 mb-4">Kami dengan senang hati akan membantu Anda!</p>

                    <div class="mb-8">
                        <p class="mb-2">Email:</p>
                        <a href="mailto:<?php echo $this->setting['contact_email'] ?>" class="underline text-white hover:text-purple-200 transition-colors">
                            <?php echo $this->setting['contact_email'] ?>
                        </a>
                    </div>

                    <!-- Contact Form -->
                    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                        'type' => '',
                        'enableAjaxValidation' => false,
                        'clientOptions' => array(
                        'validateOnSubmit' => false,
                        ),
                        'htmlOptions' => array(
                        'enctype' => 'multipart/form-data',
                        'id' => 'contactForm',
                        'class' => 'space-y-4',
                        ),
                    )); ?>
                        <?php echo $form->errorSummary($model, '', '', array('class' => 'alert alert-danger')); ?>
                        <?php if (Yii::app()->user->hasFlash('success')) : ?>
                            <?php $this->widget('bootstrap.widgets.TbAlert', array(
                                'alerts' => array('success'),
                            )); ?>
                        <?php endif; ?>

                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <?php echo $form->textField($model, 'name', array('class' => 'w-full pl-10 pr-4 py-3 bg-white bg-opacity-20 border border-white border-opacity-30 rounded-lg text-white placeholder-gray-200 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50', 'required' => true, 'placeholder' => 'Name')) ?>
                        </div>

                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <?php echo $form->textField($model, 'email', array('class' => 'w-full pl-10 pr-4 py-3 bg-white bg-opacity-20 border border-white border-opacity-30 rounded-lg text-white placeholder-gray-200 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50', 'required' => true, 'placeholder' => 'Email')) ?>
                        </div>

                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <?php echo $form->textField($model, 'phones', array('class' => 'w-full pl-10 pr-4 py-3 bg-white bg-opacity-20 border border-white border-opacity-30 rounded-lg text-white placeholder-gray-200 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50', 'required' => true, 'placeholder' => 'Phone')) ?>
                        </div>

                        <div class="relative">
                            <div class="absolute top-3 left-0 pl-3 pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <?php echo $form->textArea($model, 'message', array('class' => 'w-full pl-10 pr-4 py-3 bg-white bg-opacity-20 border border-white border-opacity-30 rounded-lg text-white placeholder-gray-200 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50 resize-none', 'rows' => 6, 'required' => true, 'placeholder' => 'Message')) ?>
                        </div>
                        <div class="g-recaptcha" data-sitekey="6LfZvqQrAAAAAMrHZ8KEBnCj34YhekgQoYnpxH79"></div>
                        <button 
                            type="submit" 
                            class="w-full bg-white text-purple-600 font-bold py-3 px-6 rounded-lg hover:bg-gray-100 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50"
                        >
                            KIRIM
                        </button>
                    <?php $this->endWidget(); ?>
                </div>
            </div>

            <!-- Bottom Quote Section -->
            <div class="mt-12 text-center pb-12">
                <p class="text-gray-700 italic mb-4 text-lg">
                    "Idam Vo Natinam Hatu Sukihita Hontu Natayo. Sabbe Sotto Bhavantu Sukhitatta."
                </p>
                <p class="text-gray-600 mb-2">
                    "Semoga timbungan jasa ini melimpah pada sanak keluarga, semoga sanak keluarga berbahagia. Semoga semua makhluk turut berbahagia."
                </p>
                <p class="text-gray-500 italic">
                    Sadhu... Sadhu... Sadhu...
                </p>
            </div>
        </div>

        <div class="clear"></div>
    </div>
    <!-- End contents -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <style>
        .alert.alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
            margin-bottom: 1rem;
            font-size: 0.875rem;
        }
        .alert.alert-success {
            background-color: #d4edda;
            color: #155724;
            border-color: #c3e6cb;
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
            margin-bottom: 1rem;
            font-size: 0.875rem;
        }
    </style>