<?php

  require_once('../App/Views/header.php');

  echo '<div class="col-lg-6 offset-lg-3">
    <h3 class="mb-3 mt-3">Felhasználók törlése</h3>
    <h6>Biztosan törlöd az összes felhasználót?</h6>
    <form method="POST" action="'.URLROOT.'/Users/destroyAll">

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