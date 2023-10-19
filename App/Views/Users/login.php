<?php

  require_once('../App/Views/header.php');

  echo '<div class="col-lg-6 offset-lg-3">
    <h3 class="mb-3 mt-3">Felhasználó authentikáció</h3>
    <form method="POST" action="'.URLROOT.'/Users/logincheck/">

      <div class="form-floating mb-3">
        <input type="email" class="form-control" id="email" name="email" placeholder="">
        <label for="email">E-mail cím</label>
      </div>

      <div class="form-floating mb-3">
        <input type="password" class="form-control" name="passwd" placeholder="" >
        <label for="passwd">Jelszó</label>
      </div>

      <input type="submit" class="btn btn-primary mb-3" value="Belépés">
      <a href="'.URLROOT.'/Users/index" class="btn btn-secondary mb-3"><i class="bi bi-arrow-left-circle"></i>&nbsp; Vissza a felhasználók listájára...</a>
      </form>
  </div>

  <script type="text/javascript">
    let nameField = document.querySelector("#name");  
    window.addEventListener("load", ()=>{
      nameField.focus();
    });
  </script>';

  require_once('../App/Views/footer.php');

?>