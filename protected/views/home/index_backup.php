<!-- Masthead -->
<?php
$criteria = new CDbCriteria;
$criteria->with = array('description');
$criteria->addCondition('description.language_id = :language_id');
$criteria->addCondition('active = 1');
$criteria->params[':language_id'] = $this->languageID;
$criteria->group = 't.id';
$criteria->order = 't.id ASC';
$slide = Slide::model()->with(array('description'))->findAll($criteria);
?>
<header class="masthead text-white text-center p-0">
  <div class="overlay"></div>
  <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" data-interval="4500">
    <div class="carousel-inner">
      <?php foreach ($slide as $key => $value): ?>
        <div class="carousel-item active">
          <img class="d-block w-100" src="<?php echo Yii::app()->baseUrl . ImageHelper::thumb(1919, 770, '/images/slide/' . $value->image, array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="First slide">
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</header>

<!-- Icons Grid -->
<section class="features-icons bg-light text-center">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="features-icons-item mx-auto mb-lg-0">
          <h3>Sebuah kawasan hunian terpadu yang eksklusif, hadir di Surabaya.</h3>
          <p class="lead mb-0">Satu diantara karya Group Ciputra menghadirkan kawasan hunian terpadu yang eksklusif, yang modern, green dan smart dengan fasilitas lengkap untuk memenuhi segala kebutuhan keluarga.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Call to Action -->
<section id="contact-us" class="call-to-action text-black">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-xl-9 mx-auto text-center">
        <h2 class="mb-4">Contact Us</h2>
      </div>
      <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
        <div class="py-3"></div>
        <div class="row mx-auto">
          <div class="col-md-7">
            <address>
              <a target="_blank" href="<?= $this->setting['contact_address_tx'] ?>"><i class="fa fa-map-marker"></i> &nbsp;CitraLand Surabaya</a>
            </address>
            <address>
              <i class="fa fa-envelope"></i> &nbsp;<?= $this->setting['contact_email'] ?>
            </address>
            <address>
              <i class="fa fa-phone"></i> &nbsp;Phone : <?= $this->setting['contact_phone'] ?>
            </address>
            <address>
              <i class="fa fa-whatsapp"></i> &nbsp;WA : <?= $this->setting['contact_whatsapp'] ?>
            </address>

          </div>
          <!-- <div class="col-md-7">
          <form>
            <div class="form-group">
              <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
            <div class="form-group">
              <input type="email" name="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
              <input type="text" name="subject" class="form-control" placeholder="Subject">
            </div>
            <div class="form-group">
              <textarea name="message" rows="4" class="form-control" placeholder="Messages"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div> -->
        </div>

      </div>
    </div>
  </div>
</section>

<style type="text/css">
  address a {
    color: #000;
    text-decoration: none;
  }
</style>