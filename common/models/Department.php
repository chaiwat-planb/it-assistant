<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "assets".
 *
 * @property string $id รหัสทรัพย์สิน
 * @property string $name ชื่อทรัพย์สิน
 * @property string $model โมเดล
 * @property string $serial ซีเรียล
 * @property string $mac_address แมกแอดเดรส
 * @property string $purchase_date วันที่ซื้อ
 * @property string $purchase_cost ราคาซื้อ
 * @property string $order_number หมายเลขการสั่งซื้อ
 * @property string $description รายละเอียด
 * @property string $image รูปภาพ
 * @property int $user_id ผู้ใช้
 * @property string $status สถานะ
 * @property int $warranty_months ประกัน/เดือน
 * @property int $supplier_id ผู้ผลิต/ผู้จัดจำหน่าย
 */
class Department extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'department';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['name'], 'string', 'max' => 200],
            [['location'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'รหัสแผนก',
            'name' => 'ชื่อแผนก',
            'location' => 'ที่ตั้ง',
        ];
    }

}
