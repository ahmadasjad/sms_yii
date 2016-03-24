<?php

class LoginController extends Controller {

    public $defaultAction = 'login';
    public $layout = '//layouts/login_layout';

    /**
     * Displays the login page
     */
    public function actionLogin() {


        if (Yii::app()->user->isGuest) {
            $model = new UserLogin;
            // collect user input data
            if (isset($_POST['UserLogin'])) {
                $model->attributes = $_POST['UserLogin'];
                // validate user input and redirect to previous page if valid
                if ($model->validate()) {
                    $this->lastViset();
                    $roles = Rights::getAssignedRoles(Yii::app()->user->Id); // check for single role
                    foreach ($roles as $role) {
                        if (sizeof($roles) == 1 and $role->name == 'parent') {
                            $this->redirect(array('/portal'));
                        }
                        if (sizeof($roles) == 1 and $role->name == 'student') {
                            $this->generateMenu($_POST['UserLogin']['username'], 3);
                            $this->redirect(array('/student'));
                        }
                        if (sizeof($roles) == 1 and $role->name == 'teacher') {
                            $this->generateMenu($_POST['UserLogin']['username'], 2);
                            $this->redirect(array('/teacher'));
                        }
                        if (Yii::app()->user->checkAccess('admin')) {
                            $this->generateMenu($_POST['UserLogin']['username'], 1);
                            $this->redirect(array('/dashboard'));
                            if (Yii::app()->user->returnUrl == '/index.php')                                
                                $this->redirect(Yii::app()->controller->module->returnUrl);
//                                die(Yii::app()->user->returnUrl);
                            else                                
                                $this->redirect(Yii::app()->user->returnUrl);
//                                die(Yii::app()->user->returnUrl);
                        }
                        else {
                            $this->redirect(array('/students'));
                        }
                    }
                }
            }
            // display the login form
            $this->render('/user/login', array('model' => $model));
        } else
            $this->redirect(Yii::app()->controller->module->returnUrl);
    }

    private function generateMenu($username, $role_id) {
        $menus = Yii::app()->db->createCommand()->select("menu.*")->from("menu")
                ->join("role_menu", "role_menu.menu_id=menu.id")
                ->where("role_menu.role_id=:role_id and menu.parent_id IS NULL", array(':role_id' => $role_id))
                ->queryAll();
        $_SESSION['menus'] = $menus;
        foreach ($_SESSION['menus'] as $key => $menu) {
            $child_menus = Yii::app()->db->createCommand()->select("menu.*")->from("menu")
                    ->join("role_menu", "role_menu.menu_id=menu.id")
                    ->where("role_menu.role_id=:role_id and menu.parent_id=:parent_id", array(':role_id' => $role_id, ':parent_id' => $menu['id']))
                    ->queryAll();
            if (count($child_menus) > 0) {
                $_SESSION['child_menu']["$key"] = $child_menus;
            }
        }
        if ($role_id != 1) {
            if ($role_id == 2) {
                $profile_table = 'employees';
            }
            if ($role_id == 3) {
                $profile_table = 'students';
            }
            $profile = Yii::app()->db->createCommand()->select("$profile_table.*")
                            ->from("$profile_table")
                            ->join("users", "users.id=$profile_table.uid")
                            ->where("users.username=:username", array(':username' => $username))->queryRow();

            $_SESSION['profile'] = $profile;
            if ($role_id == 2) {
                $_SESSION['profile']['user_type'] = 'employee';
                $_SESSION['profile']['profile_link'] = 'employees/employees/view&id=' . $profile['id'];
            }
            if ($role_id == 3) {
                $_SESSION['profile']['user_type'] = 'student';
                $_SESSION['profile']['profile_link'] = 'students/students/view&id=' . $profile['id'];
            }
            //$_SESSION['profile']['user_type'] = 'student';
            //$_SESSION['profile']['profile_link'] = 'students/students/view&id=' . $profile['id'];
            $_SESSION['profile']['full_name'] = $_SESSION['profile']['first_name'] . ' ' . $_SESSION['profile']['middle_name'] . ' ' . $_SESSION['profile']['last_name'];
        }
    }

    private function lastViset() {
        $lastVisit = User::model()->notsafe()->findByPk(Yii::app()->user->id);
        $lastVisit->lastvisit = time();
        $lastVisit->save();
    }

}
