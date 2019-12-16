<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "coordinator".
 *
 * @property int $id
 * @property string $unversity
 * @property string $country
 * @property string $address
 * @property string|null $activity_type
 * @property int|null $project_id
 * @property string|null $logo
 * @property float|null $eu_contribution
 * @property string|null $web_site
 * @property string|null $org_contact
 * @property string|null $type
 * @property string|null $country_flag
 * @property int|null $created_at
 * @property int|null $created_by
 * @property int|null $updated_at
 * @property int|null $updated_by
 */
class Coordinator extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'coordinator';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['unversity', 'country', 'address'], 'required'],
            [['project_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['eu_contribution'], 'number'],
            [['type'], 'string'],
            [['unversity', 'address', 'activity_type', 'web_site', 'org_contact'], 'string', 'max' => 800],
            [['country', 'logo', 'country_flag'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'unversity' => 'Unversity',
            'country' => 'Country',
            'address' => 'Address',
            'activity_type' => 'Activity Type',
            'project_id' => 'Project ID',
            'logo' => 'Logo',
            'eu_contribution' => 'Eu Contribution',
            'web_site' => 'Web Site',
            'org_contact' => 'Org Contact',
            'type' => 'Type',
            'country_flag' => 'Country Flag',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
}
