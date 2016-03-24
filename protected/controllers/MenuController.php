<?php

class MenuController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'rolemenu', 'roles'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Menu;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Menu'])) {
            if ($_POST['Menu']['parent_id'] == '') {
                $_POST['Menu']['parent_id'] = NULL;
            }
            $model->attributes = $_POST['Menu'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }
        $menu_dropdown = $this->menuDropDwon(null, '');
//        var_dump($menu_dropdown);
//        die;
        $this->render('create', array(
            'model' => $model,
            'menu_dropdown' => $menu_dropdown,
        ));
    }

    public function menuDropDwon($menu_id = null, $prefix = '') {
        $menu_dropdown_html = '';
        if ($menu_id == null) {
            $menus = Yii::app()->db->createCommand()->select("*")
                    ->from("menu")->where("parent_id IS NULL")
                    ->order(array('title'))
                    ->queryAll(); //Menu::model()->findAll();
//            var_dump($menus);
//            die;
        } else {
            $menus = Yii::app()->db->createCommand()->select("*")
                    ->from("menu")->where("parent_id=:parent_id", array(':parent_id' => $menu_id))
                    //->order(array('title'))
                    ->queryAll();
            //$menus = Menu::model()->findAll("parent_id=:menu_id", array(':menu_id' => $menu_id));
        }

        if (count($menus) > 0) {
            foreach ($menus as $menu) {
                $menu_dropdown_html.='<option value="' . $menu['id'] . '">' . $prefix . $menu['title'] . '</option>';
                $menu_dropdown_html.=$this->menuDropDwon($menu['id'], $prefix . "--");
            }
        }
        return $menu_dropdown_html;
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Menu'])) {
            if ($_POST['Menu']['parent_id'] == '') {
                $_POST['Menu']['parent_id'] = NULL;
            }
            $model->attributes = $_POST['Menu'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }
        $menu_dropdown = $this->menuDropDwon(null, '');
        $this->render('update', array(
            'model' => $model,
            'menu_dropdown' => $menu_dropdown,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Menu');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Menu('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Menu']))
            $model->attributes = $_GET['Menu'];
        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionRoles() {
        $roles = Yii::app()->db->createCommand()->select('*')->from("roles")->queryAll();
        $this->render('roles', array(
            'roles' => $roles,
        ));
    }

    public function actionRoleMenu() {
        if (isset($_POST['menu_items'])) {
            Yii::app()->db->createCommand()->delete("role_menu", "role_id=:role_id", array(
                'role_id' => $_POST['role_id'],
            ));
            foreach ($_POST['menu_items'] as $menu_item) {
                Yii::app()->db->createCommand()->insert("role_menu", array(
                    'role_id' => $_POST['role_id'],
                    'menu_id' => $menu_item
                ));
            }
        }

        $existing_menus = Yii::app()->db->createCommand()->select('menu_id')
                ->from("role_menu")->where("role_id=:role_id", array(':role_id' => $_GET['id']))
                //->group("role_id")
                ->queryAll();
        $existing_menu_id = array();
        foreach ($existing_menus as $existing_menu) {
            $existing_menu_id[] = $existing_menu['menu_id'];
        }
        //var_dump($existing_menu_id);
        $menu_items = Menu::model()->findAll("parent_id IS NULL");
        $menu_items_html = '';
        foreach ($menu_items as $menu_item) {
            $menu_items_html.='<li>';
            $checked = in_array($menu_item->id, $existing_menu_id) ? 'checked="checked"' : '';
            $menu_items_html.='<input type="checkbox" name="menu_items[]" value="' . $menu_item->id . '" ' . $checked . ' /> ';
            $menu_items_html.=$menu_item->title;
            $menu_items_html.='';
            $menu_items_html.=$this->childMenu($menu_item->id, $existing_menu_id);
            $menu_items_html.='</li>';
        }
        $this->render('rolemenu', array(
            'menu_items_html' => $menu_items_html,
        ));
    }

    protected function childMenu($parent_id, $existing_menu_id) {
        $menu_items = Menu::model()->findAll("parent_id = :parent_id", array(':parent_id' => $parent_id));
        $menu_items_html = '';
        if (count($menu_items) > 0) {
            $menu_items_html.='<ul>';
            foreach ($menu_items as $menu_item) {
                $menu_items_html.='<li>';
                $checked = in_array($menu_item->id, $existing_menu_id) ? 'checked="checked"' : '';
                $menu_items_html.='<input type="checkbox" name="menu_items[]" value="' . $menu_item->id . '" ' . $checked . '  /> ';
                $menu_items_html.=$menu_item->title;
                $menu_items_html.='';
                $menu_items_html.=$this->childMenu($menu_item->id, $existing_menu_id);
                $menu_items_html.='</li>';
            }
            $menu_items_html.='</ul>';
        }

        return $menu_items_html;
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Menu the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Menu::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Menu $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'menu-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
