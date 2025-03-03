<?php

namespace App\Traits;

/**
 * Flash Alert Notification
 */
trait FlashAlert
{
    public function alertCreated()
    {
        return [
            'type' => 'success',
            'message' => 'Data successfully created!'
        ];
    }

    public function alertUpdated()
    {
        return [
            'type' => 'success',
            'message' => 'Data successfully updated!'
        ];
    }

    public function alertDeleted()
    {
        return [
            'type' => 'success',
            'message' => 'Data successfully deleted!'
        ];
    }

    public function alertNotFound()
    {
        return [
            'type' => 'warning',
            'message' => 'Data not found!'
        ];
    }

    public function alertDanger()
    {
        return [
            'type' => 'error',
            'message' => 'Something wrong!'
        ];
    }

    public function permissionDenied()
    {
        return [
            'type' => 'error',
            'message' => 'you don’t have permission to access!'
        ];
    }

    public function alertAssign()
    {
        return [
            'type' => 'success',
            'message' => 'Data successfully assigned!'
        ];
    }

    public function alertReview()
    {
        return [
            'type' => 'success',
            'message' => 'Review successfully submitted!'
        ];
    }
}
