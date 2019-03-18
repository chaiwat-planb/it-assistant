<?php

namespace common\models;

use yii\db\Expression;
use yii\behaviors\TimestampBehavior;
use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property int $task_id รหัสการแจ้ง
 * @property string $task_name ปัญหา
 * @property string $type ประเภท
 * @property string $user ผู้แจ้ง
 * @property string $priority ระดับความเร่งด่วน
 * @property string $staff ผู้รับผิดชอบ
 * @property string $status สถานะ
 * @property string $created_at
 * @property string $updated_at
 * @property string $complete_date วันที่แก้ปัญหาเสร็จ
 * @property string $solution วิธีแก้ปัญหา
 * @property string $description รายละเอียด
 */
class Tasks extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    const STATUS_verified = 6;
    const STATUS_reject = 5;

    public function behaviors() {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    public static function tableName() {
        return 'tasks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['task_name', 'type', 'user', 'priority', 'staff'], 'required'],
            [['priority', 'status', 'evidence_start_img', 'evidence_end_img'], 'string'],
            [['created_at', 'updated_at', 'complete_date'], 'safe'],
            [['task_name', 'type', 'user', 'staff'], 'string', 'max' => 100],
            [['solution', 'description'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'task_id' => 'รหัสการแจ้ง',
            'task_name' => 'ปัญหา',
            'type' => 'ประเภท',
            'user' => 'ผู้แจ้ง',
            'priority' => 'ระดับความเร่งด่วน',
            'staff' => 'ผู้รับผิดชอบ',
            'evidence_start_img' => 'หลักฐานการแจ้ง',
            'evidence_end_img' => 'หลักฐานการแก้ไข',
            'status' => 'สถานะ',
            'created_at' => 'วัน/เวลาที่แจ้ง',
            'updated_at' => 'วันที่อัพเดท',
            'complete_date' => 'วันที่แก้ปัญหาเสร็จ',
            'solution' => 'วิธีแก้ปัญหา',
            'description' => 'รายละเอียด',
        ];
    }

    public function getTasktype() {
        return $this->hasOne(Tasktype::className(), ['id' => 'type_names']);
    }

    public function getUser() {
        return Yii::$app->user->identity->username;
    }

    public function getDepartmentIT() {
        return $this->hasOne(Employee::className(), ['id' => 'firstname']);
    }

    public static function getStatusList() {
        return [
            self::STATUS_verified => 'ใช่',
            self::STATUS_reject => 'ไม่ใช่',
                //other values
        ];
    }

    public static function getCountTask() {
        return $model = Tasks::find()->count();
    }

    public static function getCountPendingTask() {
        return $model = Tasks::find()
                ->where(['status' => 'pending'])
                ->orderBy('task_id')
                ->count();
    }

    public static function getCountVerifiedTask() {
        return $model = Tasks::find()
                ->where(['status' => 'verified'])
                ->orderBy('task_id')
                ->count();
    }

    public static function getCountCompleteTask() {
        return $model = Tasks::find()
                ->where(['status' => 'complete'])
                ->orderBy('task_id')
                ->count();
    }

    public static function getCountRejectTask() {
        return $model = Tasks::find()
                ->where(['status' => 'reject'])
                ->orderBy('task_id')
                ->count();
    }

}
