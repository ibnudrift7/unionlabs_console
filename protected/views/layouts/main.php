<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta name="keywords" content="<?php echo CHtml::encode($this->metaKey); ?>">
    <meta name="description" content="<?php echo CHtml::encode($this->metaDesc); ?>">

    <?php echo $this->setting['google_tools_webmaster']; ?>
    <?php echo $this->setting['google_tools_analytic']; ?>

    <meta property="og:title" content="<?php echo CHtml::encode($this->pageTitle); ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo Yii::app()->request->baseUrl; ?>" />
    <meta property="og:description" content="<?php echo htmlspecialchars($this->metaDesc, ENT_QUOTES, 'UTF-8'); ?>" />
    <meta property="og:image" content="<?php echo Yii::app()->baseUrl; ?>/asset/images/logo-head.png" />
    <meta property="og:site_name" content="<?php echo CHtml::encode($this->pageTitle); ?>" />

    <!-- start customs -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script type="text/javascript">
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'purple-custom': '#6B46C1',
                        'blue-custom': '#4F46E5',
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.8s ease-in-out',
                        'slide-up': 'slideUp 0.8s ease-out',
                        'slide-in-left': 'slideInLeft 0.8s ease-out',
                        'slide-in-right': 'slideInRight 0.8s ease-out',
                        'float': 'float 3s ease-in-out infinite',
                    }
                }
            }
        }
    </script>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
    <!-- end customs -->
</head>
<body data-spy="scroll" id="page-top">
    
    <?php echo $content ?>

    <style type="text/css">
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideUp {
            from {
                transform: translateY(30px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes slideInLeft {
            from {
                transform: translateX(-30px);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideInRight {
            from {
                transform: translateX(30px);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-5px);
            }
        }

        .hero-gradient {
            background: linear-gradient(to top, #175AF2 0%, #6920D9 100%);
        }

        .media-gradient {
            background: linear-gradient(to bottom, #6920D9 2%, #175AF2 100%);
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .default_content {
            /* margin: 0; */
        }
        .default_content span, 
        .default_content p {
            margin-bottom: 20px;
        }

        .gradient-c1{
            background: linear-gradient(to bottom, #4e1eaf, #1943c0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .add-background-leaf:before{
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('<?php echo $this->assetBaseurl ?>add-background-leaf.png');
            background-repeat: no-repeat;
            background-size: contain;
            background-position: center;
            z-index: 2;
        }


        .bg_articles_home{
            background: url('<?php echo $this->assetBaseurl ?>bg-article-home.jpg');
            background-size: cover;
            background-position: center;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .hm-gradient-c2{
            background: linear-gradient(to top, #175AF2 2%, #6920D9 100%);
            z-index: 1;
        }
        .hm-gradient-c2:after{
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 15%;
            background-color: #fff;
            z-index: 2;
        }
        .customs-shadow:before{
            box-sizing: border-box;
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 25%;
            z-index: 2;
            background: linear-gradient(180deg, rgba(23, 90, 242, 0) 0%, #6920D9 132.81%);
            border-radius: 0px 0px 12px 12px;
        }

        .head_home{
            height: 10vh;
        }
        .head_home .hero-gradient{
            background: transparent;
            z-index: 1;
        }

        .bg-gradient-customsQuestion{
            background: linear-gradient(to bottom, #6920D9 2%, #175AF2 100%);
        }
        
        .customAffixHeader{
            background: linear-gradient(to top, rgba(23, 90, 242, 0.9) 2%, rgba(105, 32, 217, 0.9) 100%) !important;
        }

        @media (max-width: 768px) {
            .head_home{
                height: 7vh;
            }
        }
    </style>
</body>
</html>