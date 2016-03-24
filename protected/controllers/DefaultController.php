<?php

class DefaultController extends RController {

    public function filters() {
        return array(
            'rights', // perform access control for CRUD operations
        );
    }

    public function actionIndex() {
        if (!empty($_SESSION['profile']['user_type'])) {
            $this->redirect(array('/' . $_SESSION['profile']['user_type']));
        }
        $this->render('index');
    }

}
