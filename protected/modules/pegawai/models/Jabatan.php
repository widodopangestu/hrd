<?php

/**
 * This is the model class for table "jabatan".
 *
 * The followings are the available columns in table 'jabatan':
 * @property integer $id
 * @property string $nama
 * @property double $gaji
 * @property string $created
 * @property string $updated
 * @property integer $jabatan_id
 *
 * The followings are the available model relations:
 * @property Jabatan $jabatan
 * @property Jabatan[] $jabatans
 * @property Pegawai[] $pegawais
 * @property TunjanganJabatan[] $tunjanganJabatans
 */
class Jabatan extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Jabatan the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'jabatan';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('nama, gaji, jabatan_id', 'required'),
            array('jabatan_id', 'numerical', 'integerOnly' => true),
            array('gaji', 'numerical'),
            array('nama', 'length', 'max' => 50),
            array('created, updated', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, nama, gaji, created, updated, jabatan_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'jabatan' => array(self::BELONGS_TO, 'Jabatan', 'jabatan_id'),
            'jabatans' => array(self::HAS_MANY, 'Jabatan', 'jabatan_id'),
            'pegawais' => array(self::HAS_MANY, 'Pegawai', 'jabatan_id'),
            'tunjanganJabatans' => array(self::HAS_MANY, 'TunjanganJabatan', 'jabatan_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'nama' => 'Nama Jabatan',
            'gaji' => 'Gaji',
            'created' => 'Created',
            'updated' => 'Updated',
            'jabatan_id' => 'Tingkat Jabatan',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('nama', $this->nama, true);
        $criteria->compare('gaji', $this->gaji);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('updated', $this->updated, true);
        $criteria->compare('jabatan_id', $this->jabatan_id);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    /**
     * Adds a tunjanganJabatan to this issue
     */
    public function addTunjanganJabatan($tunjanganJabatan) {
        $tunjanganJabatan->jabatan_id = $this->id;
        return $tunjanganJabatan->save();
    }

    public function behaviors() {
        return array(
            'timestamps' => array(
                'class' => 'zii.behaviors.CTimestampBehavior',
                'createAttribute' => 'created',
                'updateAttribute' => 'updated',
                'setUpdateOnCreate' => true,
            ),
        );
    }

}