<?php

  require_once('../App/Views/header.php');

  echo '<div class="col-lg-6 offset-lg-3">
    <h3 class="mb-3 mt-3">Felhasználó információ</h3>';

    echo '
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="name" name="name" placeholder="" value="'.$data[0]->name.'" disabled>
        <label for="name">Felhasználónév</label>
      </div>

      <div class="form-floating mb-3">
        <input type="email" class="form-control" name="email" placeholder="" value="'.$data[0]->email.'" disabled>
        <label for="email">E-mail cím</label>
      </div>

      <div class="form-floating mb-3">
        <input type="text" class="form-control" name="reg" placeholder="" value="'.$data[0]->reg.'" disabled>
        <label for="reg">Regisztráció</label>
      </div>

      <div class="form-floating mb-3">
        <input type="text" class="form-control" name="last" placeholder="" value="'.$data[0]->last.'" disabled>
        <label for="last">Ut.belépés</label>
      </div>

      <div class="form-floating mb-3">
        <input type="text" class="form-control" name="status" placeholder="" value="'.($data[0]->status == 1 ? 'Aktív': 'Inaktív').' felhasználó" disabled>
        <label for="status">Státusz</label>
      </div>
     
      <a href="'.URLROOT.'/Users/index" class="btn btn-secondary mb-3"><i class="bi bi-arrow-left-circle"></i>&nbsp; Vissza a felhasználók listájára...</a>

  </div>';

  require_once('../App/Views/footer.php');

?>