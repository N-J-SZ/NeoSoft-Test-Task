<?php
class Users extends BaseController
{
    private $model;

    public function __construct()
    {
        // create User model object
        $this->model = $this->model('User');
    }

    // list users
    public function index()
    {
        $this->view('Users/index', $this->model->getUsers());
    }

    // show new user form
    public function create()
    {
        $this->view('Users/newuser', []);
    }

    // insert new user to database
    public function store()
    {

        if (empty($_POST['name'] || empty($_POST['email'] || empty($_POST['passwd']) || empty($_POST['confirm'])))) {
            $_SESSION['error'] = 'Nem adtál meg minden adatot!';
            header("location: " . URLROOT . '/Users/create');
        } else {
            if ($_POST['passwd'] != $_POST['confirm']) {
                $_SESSION['error'] = 'A megadott jelszavak nem egyeznek!';
                header("location: " . URLROOT . '/Users/create');
            } else {
                if (isset($_SESSION['error'])) {
                    unset($_SESSION['error']);
                }
                $this->model->createUser($_POST);
                header("location: " . URLROOT . '/Users/index');
            }
        }
    }

    // change user status
    public function switch ($id)
    {
        if (!isset($_POST['status'])) {
            $status = 0;
        } else {
            $status = 1;
        }
        $this->model->switchUser($id, $status);
        header("location: " . URLROOT . '/Users/index');
    }

    // show user information form
    public function show($id)
    {
        $this->view('Users/infouser', $this->model->getUser($id));
    }

    // show user modification form
    public function edit($id)
    {
        $this->view('Users/updateuser', $this->model->getUser($id));
    }

    // update user data in database
    public function update()
    {
        $this->model->updateUser($_POST);
        header("location: " . URLROOT . '/Users/index');
    }

    // show delete user form
    public function delete($id)
    {
        $this->view('Users/deleteuser', $this->model->getUser($id));
    }

    // delete user from database
    public function destroy()
    {
        $this->model->deleteUser($_POST);
        header("location: " . URLROOT . '/Users/index');
    }

    // show delete all users form
    public function deleteAll()
    {
        $this->view('Users/deletealluser', []);
    }

    // delete all users from database
    public function destroyAll()
    {
        $this->model->deleteAllUser($_POST);
        header("location: " . URLROOT . '/Users/index');
    }

    // show login form
    public function login()
    {
        $this->view('Users/login', []);
    }

    // update user data in database
    public function logincheck()
    {
        $user = ($this->model->loginCheck($_POST));
        if($user){
            $this->show($user[0]->ID);
        }
        else{
            $this->show(null);
        }
       // header("location: " . URLROOT . '/Users/index');
    }
}
?>