<?php

require_once('../App/Views/header.php');

echo '<h3 class="mb-3 mt-3">Felhasználók kezelése</h3>
    <div class="row"> 
      <div class="col-lg-6">
        <a href="'.URLROOT.'/Users/create" class="btn btn-primary mb-3"><i class="bi bi-plus-circle-fill"></i>&nbsp; Új felhasználó hozzáadása</a>
        <a href="'.URLROOT.'/Users/deleteAll" class="btn btn-danger mb-3"><i class="bi bi-trash-fill"></i>&nbsp; Összes felhasználó törlése</a>
      </div>
      <div class="col-lg-6 text-end">
        <a href="'.URLROOT.'/Users/login" class="btn btn-success mb-3"><i class="bi bi-person-check-fill"></i>&nbsp; Felhasználó authentikáció</a>
      </div>
    </div>
    <table class="table table-hover table-stripped">
      <thead class="table-secondary">
        <tr>
          <th>#</th>
          <th>Név</th>
          <th>E-mail</th>
          <th>Regisztráció</th>
          <th>Ut.belépés</th>
          <th>Státusz</th>
          <th class="text-end">Műveletek</th>
        </tr>
      </thead>
      <tbody>';
    
      foreach ($data as $index=>$user) {
        echo '<tr>
              <td>'.($index+1).'.</td>
              <td>'.$user->name.'</td>
              <td>'.$user->email.'</td>
              <td>'.$user->reg.'</td>
              <td>'.(($user->last != null && $user->last != '0000-00-00 00:00:00') ? $user->last : 'még nem lépett be').'</td>
              <td>
                <div class="form-check form-switch">
                  <form method="POST" action="'.URLROOT.'/Users/switch/'.$user->ID.'" id="form'.$index.'">
                    <input class="form-check-input" type="checkbox" role="switch" name="status" '.($user->status == 1 ? 'checked' : '').' value="'.($user->status == 1 ? 0 : 1).'" onclick="DoSubmit('.$index.')" title="Aktív/Inaktív">
                  </form>
                </div>

              </td>
              <td class="text-end">
                <a href="'.URLROOT.'/Users/show/'.$user->ID.'" class="btn btn-secondary" title="Információ"><i class="bi bi-info-circle-fill"></i></a>
                <a href="'.URLROOT.'/Users/edit/'.$user->ID.'" class="btn btn-warning" title="Módosítás"><i class="bi bi-pencil-fill"></i></a>
                <a href="'.URLROOT.'/Users/delete/'.$user->ID.'" class="btn btn-danger" title="Törlés"><i class="bi bi-x-circle-fill"></i></a>
              </td>
            </tr>';
    }

    echo '<tfoot class="table-light">
        <tr>
          <td colspan="7" class="text-center text-muted">Összesen: '.sizeof($data).' felhasználó</td>
        </tr>
      </tfoot>
      </tbody>
    </table>

    <script type="text/javascript">
    function DoSubmit(idx){
      let frm = "#form"+idx;
      document.querySelector(frm).submit();
    }
    </script>';

  require_once('../App/Views/footer.php');

?>