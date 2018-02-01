<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DepartmentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Departments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="departments-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Departments', ['value'=>Url::to('index.php?r=departments/create'), 
        'class' => 'btn btn-success', 'id'=>'modalButton']) ?>
    </p>

    <?php
        Modal::begin([
            'header'=>'<h4>Departments</h4>',
            'id'=>'modal',
            'size'=>'modal-lg',
            ]);

        echo  "<div id='modalContent'></div>";

        Modal::end();

    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function($model){
                if($model->department_status == 'inactive'){
                    return ['class'=>'danger'];
                }
                else{
                    return ['class'=>'success'];
                }
            },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'companies_company_id',
                'value'=>'companiesCompany.company_name',
            ],
            [
                'attribute'=>'branches_branch_id',
                'value'=>'branchesBranch.branch_name',
            ],
            'department_name',
            'department_created_date',
            // 'department_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
