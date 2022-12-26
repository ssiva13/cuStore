<?php
/** @var yii\web\View $this */

use app\models\Building;
use app\models\BuildingFloor;
use app\models\Department;
use app\models\Gender;
use app\models\Honorific;
use app\models\ItemCategory;
use app\models\Office;
use app\models\Position;
use yii\bootstrap5\Html;
use yii\helpers\StringHelper;
use yii\helpers\Url;

$this->title = 'Lookup Values';
$this->params['breadcrumbs'][] = $this->title;
$this->params['view-actions'] = [];
?>
<div class="lookup-index box box-primary">

    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-12">
            <div class="small-box bg-gradient-navy">
                <div class="inner">
                    <h3> <?= Position::find()->count() ?> </h3>
                    <p class="info-box-text font-weight-bold"> <?= pluralize(camel2words(StringHelper::basename(Position::className()))) ?> </p>
                </div>
                <div class="icon text-white">
                    <i class="fa fa-user-md"></i>
                </div>
                <?= Html::a(
                    'View '. pluralize(camel2words(StringHelper::basename(Position::className()))) . ' <i class="fas fa-arrow-circle-right"></i>',
                    'javascript:void(0)', [
                        'class' => 'small-box-footer showModalButton full',
                        'title' => pluralize(camel2words(StringHelper::basename(Position::className()))),
                        'value' => Url::toRoute(['/position']),
                    ]
                )?>
                
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-12">
            <div class="small-box bg-gradient-gray-dark">
                <div class="inner">
                    <h3> <?= Honorific::find()->count() ?> </h3>
                    <p class="info-box-text font-weight-bold"> <?= pluralize(camel2words(StringHelper::basename(Honorific::className()))) ?> </p>
                </div>
                <div class="icon text-white">
                    <i class="fa fa-id-badge"></i>
                </div>
                <?= Html::a(
                    'View '. pluralize(camel2words(StringHelper::basename(Honorific::className()))) . ' <i class="fas fa-arrow-circle-right"></i>',
                    'javascript:void(0)', [
                        'class' => 'small-box-footer showModalButton full',
                        'title' => pluralize(camel2words(StringHelper::basename(Honorific::className()))),
                        'value' => Url::toRoute(['/honorific']),
                    ]
                )?>

            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-12">
            <div class="small-box bg-gradient-cyan">
                <div class="inner">
                    <h3> <?= Gender::find()->count() ?> </h3>
                    <p class="info-box-text font-weight-bold"> <?= pluralize(camel2words(StringHelper::basename(Gender::className()))) ?> </p>
                </div>
                <div class="icon text-white">
                    <i class="fa fa-transgender-alt"></i>
                </div>
                <?= Html::a(
                    'View '. pluralize(camel2words(StringHelper::basename(Gender::className()))) . ' <i class="fas fa-arrow-circle-right"></i>',
                    'javascript:void(0)', [
                        'class' => 'small-box-footer showModalButton full',
                        'title' => pluralize(camel2words(StringHelper::basename(Gender::className()))),
                        'value' => Url::toRoute(['/gender']),
                    ]
                )?>

            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-12">
            <div class="small-box bg-gradient-olive">
                <div class="inner">
                    <h3> <?= ItemCategory::find()->count() ?> </h3>
                    <p class="info-box-text font-weight-bold"> <?= pluralize(camel2words(StringHelper::basename(ItemCategory::className()))) ?> </p>
                </div>
                <div class="icon text-white">
                    <i class="fa fa-object-group"></i>
                </div>
                <?= Html::a(
                    'View '. pluralize(camel2words(StringHelper::basename(ItemCategory::className()))) . ' <i class="fas fa-arrow-circle-right"></i>',
                    'javascript:void(0)', [
                        'class' => 'small-box-footer showModalButton full',
                        'title' => pluralize(camel2words(StringHelper::basename(ItemCategory::className()))),
                        'value' => Url::toRoute(['/item-category']),
                    ]
                )?>

            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-12">
            <div class="small-box bg-gradient-purple">
                <div class="inner">
                    <h3> <?= Building::find()->count() ?> </h3>
                    <p class="info-box-text font-weight-bold"> <?= pluralize(camel2words(StringHelper::basename(Building::className()))) ?> </p>
                </div>
                <div class="icon text-white">
                    <i class="fa fa-building"></i>
                </div>
                <?= Html::a(
                    'View '. pluralize(camel2words(StringHelper::basename(Building::className()))) . ' <i class="fas fa-arrow-circle-right"></i>',
                    'javascript:void(0)', [
                        'class' => 'small-box-footer showModalButton full',
                        'title' => pluralize(camel2words(StringHelper::basename(Building::className()))),
                        'value' => Url::toRoute(['/building']),
                    ]
                )?>

            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-12">
            <div class="small-box bg-gradient-danger">
                <div class="inner">
                    <h3> <?= BuildingFloor::find()->count() ?> </h3>
                    <p class="info-box-text font-weight-bold"> <?= pluralize(camel2words(StringHelper::basename(BuildingFloor::className()))) ?> </p>
                </div>
                <div class="icon text-white">
                    <i class="fa fa-building"></i>
                </div>
                <?= Html::a(
                    'View '. pluralize(camel2words(StringHelper::basename(BuildingFloor::className()))) . ' <i class="fas fa-arrow-circle-right"></i>',
                    'javascript:void(0)', [
                        'class' => 'small-box-footer showModalButton full',
                        'title' => pluralize(camel2words(StringHelper::basename(BuildingFloor::className()))),
                        'value' => Url::toRoute(['/building-floor']),
                    ]
                )?>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-12">
            <div class="small-box bg-gradient-maroon">
                <div class="inner">
                    <h3> <?= Office::find()->count() ?> </h3>
                    <p class="info-box-text font-weight-bold"> <?= pluralize(camel2words(StringHelper::basename(Office::className()))) ?> </p>
                </div>
                <div class="icon text-white">
                    <i class="fa fa-briefcase"></i>
                </div>
                <?= Html::a(
                    'View '. pluralize(camel2words(StringHelper::basename(Office::className()))) . ' <i class="fas fa-arrow-circle-right"></i>',
                    'javascript:void(0)', [
                        'class' => 'small-box-footer showModalButton full',
                        'title' => pluralize(camel2words(StringHelper::basename(Office::className()))),
                        'value' => Url::toRoute(['/office']),
                    ]
                )?>

            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-12">
            <div class="small-box bg-gradient-pink">
                <div class="inner">
                    <h3> <?= Department::find()->count() ?> </h3>
                    <p class="info-box-text font-weight-bold"> <?= pluralize(camel2words(StringHelper::basename(Department::className()))) ?> </p>
                </div>
                <div class="icon text-white">
                    <i class="fa fa-id-card"></i>
                </div>
                <?= Html::a(
                    'View '. pluralize(camel2words(StringHelper::basename(Department::className()))) . ' <i class="fas fa-arrow-circle-right"></i>',
                    'javascript:void(0)', [
                        'class' => 'small-box-footer showModalButton full',
                        'title' => pluralize(camel2words(StringHelper::basename(Department::className()))),
                        'value' => Url::toRoute(['/department']),
                    ]
                )?>
            </div>
        </div>
    </div>


    <div class="row">
    </div>
    
</div>
