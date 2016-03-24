<?php

class TimetableEntriesController extends Controller {

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
                'actions' => array('index', 'view', 'assigned'),
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
        $model = new TimetableEntries;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['TimetableEntries'])) {
            $model->attributes = $_POST['TimetableEntries'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
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

        if (isset($_POST['TimetableEntries'])) {
            $model->attributes = $_POST['TimetableEntries'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
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
        $dataProvider = new CActiveDataProvider('TimetableEntries');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new TimetableEntries('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['TimetableEntries']))
            $model->attributes = $_GET['TimetableEntries'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /*
     * Show timetable according to user. 
     * for example for student show all timetable of the batch student belongs to
     * and for teacher show timetable of those which subject is assigned to the teacher.
     */

    public function actionAssigned() {
        if ($_SESSION['profile']['user_type'] == 'employee') {
            $condition = "timetable_entries.employee_id=:employee_id";
            $condition_param = array(':employee_id' => $_SESSION['profile']['id']);
        }
        if ($_SESSION['profile']['user_type'] == 'student') {
            $condition = "timetable_entries.batch_id=:batch_id";
            $condition_param = array(':batch_id' => $_SESSION['profile']['batch_id']);
        }
        
        $result = Yii::app()->db->createCommand()->select("*")->from("class_timings")
                ->join("timetable_entries", "timetable_entries.class_timing_id=class_timings.id")
                ->where($condition, $condition_param)
                ->queryAll();
        $dataProvider = new CArrayDataProvider($result);
        $this->render('assigned', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return TimetableEntries the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = TimetableEntries::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param TimetableEntries $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'timetable-entries-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
