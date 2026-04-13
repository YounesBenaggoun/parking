<?php


#[\AllowDynamicProperties]
class PrincipalModel
{
    protected static $table;
    public $id;

    public function __construct($id = 0)
    {
        $this->id = intval($id);
        $this->init();
    }
    private function prepareSql()
    {
        $data = [];
        foreach (self::attributes() as $attribute)
        {
            if (isset($this->$attribute))
                $data[$attribute] =  trim($this->$attribute);
        }
        return $data;
    }
    static function attributes()
    {
        $req = "SHOW COLUMNS FROM  " . static::$table;
        $resultat = Database::findBySql($req);
        $attributes = [];
        foreach ($resultat as $field)
        {
            if ($field->Field != "id")
                $attributes[] = $field->Field;
        }
        return $attributes;
    }
    private function create()
    {
        $data = $this->prepareSql();
        $columns = implode(",", array_keys($data));
        $params = ":" . implode(",:", array_keys($data));
        $query = "INSERT INTO " . static::$table . " ($columns) VALUES ($params)";
        $id = Database::insertQuery($query, $data);
        if ($id)
        {
            $this->id = $id;
        }
    }
    private function update()
    {
        $data = $this->prepareSql();
        $setClause = '';
        foreach ($data as $key => $value)
        {
            $setClause .= " $key = :$key , ";
        }
        $setClause = rtrim($setClause, ', ');
        $query = "UPDATE " . static::$table . " SET $setClause  WHERE id = $this->id ";
        return Database::query($query, $data);
    }
    public function save()
    {
        if ($this->id)
            return $this->update();
        else
            return $this->create();
    }
    private function init()
    {
        if (!$this->id)
            return false;
        $res = Database::findById(static::$table, $this->id);
        if (!$res)
        {
            return false;
        }
        foreach ($res as $key => $value)
        {
            $this->$key = $value;
        }
    }
    public function remove()
    {
        if (!$this->id)
            return false;
        $req = "DELETE FROM " . static::$table . " WHERE  id =  :id ; ";
        return Database::query($req, [":id" => $this->id]);
    }
    public static function findAll()
    {
        $req = "SELECT * FROM  " . static::$table . " ";
        $tab = Database::findBySql($req);
        return $tab;
    }
    public static function findByAttribute($attribute, $val)
    {
        return Database::findByAttribute(static::$table, $attribute, $val);
    }
}
