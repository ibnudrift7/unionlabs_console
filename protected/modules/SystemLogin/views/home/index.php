<style>
  body {
    background-color: #f0f2f5;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .login-card {
    width: 32%;
    height: 65vh;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
  }

  .welcome-side {
    background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
    color: white;
    height: 100%;
  }

  .form-side {
    background: white;
    height: 100%;
  }

  .btn-custom {
    background: #1e3c72;
    border-color: #1e3c72;
  }

  .btn-custom:hover {
    background: #2a5298;
    border-color: #2a5298;
  }

  .form-control:focus {
    border-color: #1e3c72;
    box-shadow: 0 0 0 0.25rem rgba(30, 60, 114, 0.25);
  }

  .welcome-image {
    max-width: 80%;
    height: auto;
  }

  @media (max-width: 992px) {
    .login-card {
      width: 90%;
      height: auto;
    }
  }
</style>

<div class="login-card">
  <div class="row g-0 h-100">

    <!-- Right Column - Login Form -->
    <div class="col-lg-12 form-side d-flex align-items-center justify-content-center p-4">
      <div class="w-100" style="max-width: 350px;">
        <div class="text-center mb-4">
          <h2 class="fw-bold"><?= Yii::app()->name ?></h2>
          <p class="text-muted small">Login to <b>Backend System</b></p>
        </div>

        <?php
        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
          'id' => 'verticalForm',
          'enableClientValidation' => false,
          'clientOptions' => array(
            'validateOnSubmit' => false,
          ),
          'htmlOptions' => array('class' => 'needs-validation'),
        )); ?>
        <div class="div">
          <?php if ($form->errorSummary($model)) : ?>
            <div class="alert alert-danger">
              <?php echo $form->errorSummary($model); ?>
            </div>
          <?php endif; ?>
        </div>
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <div class="input-group">
            <span class="input-group-text">@</span>
            <input type="email" name="LoginForm[username]" class="form-control" id="yourUsername" placeholder="Enter your Email" required>
          </div>
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" name="LoginForm[password]" class="form-control" id="yourPassword" placeholder="Enter your password" required>
        </div>

        <div class="mb-3 d-flex justify-content-between align-items-center">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="remember">
            <label class="form-check-label" for="remember">Remember me</label>
          </div>
        </div>

        <button type="submit" class="btn btn-custom text-white w-100 py-2 mb-3">
          Login
        </button>

        <div class="text-center">
          <p class="text-muted small">
            Copyright &copy; 2025 by Budhist Worship Center - Admin.<br>
            All Rights Reserved.
          </p>
        </div>
        <?php $this->endWidget(); ?>
      </div>
    </div>
  </div>
</div>
<style>
  .alert.alert-block.alert-error{
    padding: 0;
    margin: 0;
    font-size: 13px;
  }
  .alert.alert-block.alert-error p{
    margin-bottom: 0.2rem;
  }
  .alert.alert-block.alert-error ul{
    margin-bottom: 0;
  }
</style>