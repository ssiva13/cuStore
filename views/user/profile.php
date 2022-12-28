<?php

use app\components\Event;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$name = ($model->staff) ? $model->staff->full_name : $model->username;

$this->title =  $name . ' | ' . env('APP_NAME');
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $name;
$this->params['view-actions'] = [];
?>
<div class="user-view box box-primary">

    <div class="row">
        <div class="col-md-12">
            <div class="card card-widget widget-user shadow">
                <div class="widget-user-header bg-gradient-cyan" >
                    <h3 class="widget-user-username">
                        <?= ($model->staff) ? $model->staff->full_name : $model->username?>
                    </h3>
                    <h5 class="widget-user-desc">
                        <?= ($model->staff && $model->staff->fkPosition) ? $model->staff->fkPosition->name : ""?>
                    </h5>
                </div>
                <div class="widget-user-image">
                    <?= Html::img(Yii::getAlias('@web').'/images/default-150x150.png', [ 'class' => "user-image img-circle elevation-2", 'alt' => ($model->staff) ? $model->staff->full_name : $model->username ]) ?>
                </div>
                <div class="card-footer">
                    <div class="row">

                        <div class="col-sm-4">
                            <div class="description-block">
                                <h5 class="description-header">35</h5>
                                <span class="description-text">PRODUCTS Borrowed</span>
                            </div>

                        </div>

                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">Department</h5>
                                <span class="description-text">Department Description</span>
                            </div>

                        </div>

                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">232</h5>
                                <span class="description-text">Unread Notifications</span>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-6 col-12">
            <div class="info-box bg-gradient-gray-dark">
                <span class="info-box-icon"><i class="far fa-bookmark"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Bookmarks</span>
                    <span class="info-box-number">41,410</span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 70%"></div>
                    </div>
                    <span class="progress-description">70% Increase in 30 Days</span>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-6 col-12">
            <div class="info-box bg-gradient-purple">
                <span class="info-box-icon"><i class="far fa-thumbs-up"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Likes</span>
                    <span class="info-box-number">41,410</span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 70%"></div>
                    </div>
                    <span class="progress-description">70% Increase in 30 Days</span>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-6 col-12">
            <div class="info-box bg-gradient-navy">
                <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Events</span>
                    <span class="info-box-number">41,410</span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 70%"></div>
                    </div>
                    <span class="progress-description">70% Increase in 30 Days</span>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-6 col-12">
            <div class="info-box bg-gradient-olive">
                <span class="info-box-icon"><i class="fas fa-comments"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Comments</span>
                    <span class="info-box-number">41,410</span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 70%"></div>
                    </div>
                    <span class="progress-description">70% Increase in 30 Days</span>
                </div>
            </div>
        </div>
    </div>
</div>
