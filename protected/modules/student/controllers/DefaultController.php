<?php

class DefaultController extends Controller {

    public function actionIndex() {
        $this->render('index');
    }

    public function actionFee() {
        if ($_SESSION['profile']['user_type'] == 'student') {
            $this->redirect(array('/students/students/fees', 'id' => $_SESSION['profile']['id']));
        }
    }
    
    public function actionExamination() {
        if ($_SESSION['profile']['user_type'] == 'student') {
            $this->redirect(array('/students/students/assesments', 'id' => $_SESSION['profile']['id']));
        }
    }
    
    

}
