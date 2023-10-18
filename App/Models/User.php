<?php
class User
{

    private $server = SERVERURL; //'http://localhost/NeoSoft/API/server.php';

    public function __construct()
    {
        // empty constructor
    }

    // GET ALL USERS
    public function getUsers()
    {
        return json_decode(file_get_contents($this->server . '?table=users'));
    }

    // GET ONE USER
    public function getUser($id)
    {
        return json_decode(file_get_contents($this->server . '?table=users&field=ID&value=' . $id));
    }

    // INSERT USER
    public function createUser($user)
    {
        $data = [
            'table' => 'users',
            'values' => [
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => sha1($user['passwd'])
            ]
        ];

        $options = [
            'http' => [
                'method' => 'POST',
                'header' => 'Content-type: application/x-www-form-urlencoded',
                'content' => http_build_query($data),
            ]
        ];

        $context = stream_context_create($options);

        return json_decode(file_get_contents($this->server, false, $context));

    }

    // UPDATE USER
    public function updateUser($user)
    {
        $data = [
            'table' => 'users',
            'field' => "ID",
            'value' => $user['ID'],
            'values' => [
                'name' => $user['name'],
                'email' => $user['email']
            ]
        ];

        $options = [
            'http' => [
                'method' => 'PATCH',
                'header' => 'Content-type: application/x-www-form-urlencoded',
                'content' => json_encode($data)
            ]
        ];

        $context = stream_context_create($options);

        return json_decode(file_get_contents($this->server, false, $context));

    }

    // DELETE USER
    public function deleteUser($user)
    {
        $data = [
            'table' => 'users',
            'field' => 'ID',
            'value' => $user['ID']
        ];

        $options = [
            'http' => [
                'method' => 'DELETE',
                'header' => 'Content-type: application/x-www-form-urlencoded',
                'content' => json_encode($data)
            ]
        ];

        $context = stream_context_create($options);

        return json_decode(file_get_contents($this->server, false, $context));
    }

    // DELETE ALL USER
    public function deleteAllUser()
    {
        $data = [
            'table' => 'users'
        ];

        $options = [
            'http' => [
                'method' => 'DELETE',
                'header' => 'Content-type: application/x-www-form-urlencoded',
                'content' => json_encode($data)
            ]
        ];

        $context = stream_context_create($options);

        return json_decode(file_get_contents($this->server, false, $context));
    }

    // UPDATE USER
    public function switchUser($id, $status)
    {
        $data = [
            'table' => 'users',
            'field' => "ID",
            'value' => $id,
            'values' => [
                'status' => $status
            ]
        ];
        var_dump($data);
        $options = [
            'http' => [
                'method' => 'PATCH',
                'header' => 'Content-type: application/x-www-form-urlencoded',
                'content' => json_encode($data)
            ]
        ];

        $context = stream_context_create($options);

        return json_decode(file_get_contents($this->server, false, $context));

    }
}
?>