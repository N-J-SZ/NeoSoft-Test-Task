<?php

  require_once('../App/Views/header.php');

  echo '<div class="col-lg-6 offset-lg-3">
    <h3 class="mb-3 mt-3">Új felhasználó hozzáadása</h3>';

    if (isset($_SESSION['error'])){
      echo '<div class="alert alert-danger">'.$_SESSION['error'].'</div>';
    }

    echo '<form method="POST" action="'.URLROOT.'/Users/store">
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="name" name="name" placeholder="">
        <label for="name">Felhasználónév</label>
      </div>

      <div class="form-floating mb-3">
        <input type="email" class="form-control" name="email" placeholder="">
        <label for="email">E-mail cím</label>
      </div>

      <div class="form-floating mb-3">
        <input type="password" class="form-control" name="passwd" placeholder="">
        <label for="passwd">Jelszó</label>
      </div>

      <div class="form-floating mb-3">
        <input type="password" class="form-control" name="confirm" placeholder="">
        <label for="confirm">Jelszó megerősítése</label>
      </div>
      <input type="submit" class="btn btn-primary mb-3" value="Mentés">
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