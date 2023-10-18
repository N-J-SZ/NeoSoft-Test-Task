<?php

  require_once('../App/Views/header.php');

  echo '<div class="col-lg-6 offset-lg-3">
    <h3 class="mb-3 mt-3">Felhasználó törlése</h3>
    <h6>Biztosan törlöd az alábbi felhasználót?</h6>
    <form method="POST" action="'.URLROOT.'/Users/destroy/">

      <input type="hidden" name="ID" value="'.$data[0]->ID.'">

      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="name" name="name" placeholder="" value="'.$data[0]->name.'" disabled>
        <label for="name">Felhasználónév</label>
      </div>

      <div class="form-floating mb-3">
        <input type="email" class="form-control" name="email" placeholder="" value="'.$data[0]->email.'" disabled>
        <label for="email">E-mail cím</label>
      </div>

      <input type="submit" class="btn btn-danger mb-3" value="Törlés">
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