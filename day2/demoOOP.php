<?php
// class Person 
// {
//     public $name;
//     public $age;

//     public function __construct($name,$age){
//         $this->$name=$name;
//         $this->$age=$age;
//     }
// }

// $p= new Person();
// $p->name ="Dong";
// echo "Name=$p->name";

// class Person
// {

// }

// class Student extends Person
// {

// }



abstract class Member
{
    public string $user_name;
    protected array $roles;

    // Hàm abstract để lớp con override
    protected abstract function initRoles();

    // Hàm khởi tạo
    public function __construct(string $user_name)
    {
        $this->user_name = $user_name;
        $this->initRoles();
    }

    // Hiển thị danh sách role
    public function listRoles()
    {
        echo implode(',', $this->roles);
    }
}

// Lớp con kế thừa và override hàm initRoles
class Administrator extends Member
{
    public function initRoles()
    {
        $this->roles = [
            'manage_user', 'edit_role', 'edit_post',
            'delete_user', 'view_post', 'delete_post'
        ];
    }
}

// Dùng thử
$user_a = new Administrator('Mr A');
$user_a->listRoles(); // Output: manage_user,edit_role,edit_post,delete_user,view_post,delete_post
