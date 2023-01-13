<?php
/**
 * Created by ssiva on 08/01/2023
 */

namespace app\modules\api\v1;

use Yii;
use yii\web\Response;
use yii\web\ServerErrorHttpException;

class DeleteAction extends \yii\rest\DeleteAction
{
    /**
     * Deletes a model.
     * @param mixed $id id of the model to be deleted.
     * @throws ServerErrorHttpException on failure.
     */
    public function run($id)
    {
        $model = $this->findModel($id);
        
        if ($this->checkAccess) {
            call_user_func($this->checkAccess, $this->id, $model);
        }
        
        if ($model->delete() === false) {
            throw new ServerErrorHttpException('Failed to delete the object for unknown reason.');
        }
        return [
            'status' => 204,
            'message' => 'Deleted Successfully'
        ];
    }
}