<?php 

Trait Model
{
    // 将 Trait 添加到 Model
    use Database;

    //用户数据表
    
    // protected $table = 'users';
    protected $limit = '10';
    protected $offset = '0';
    protected $order_type = "desc";
    protected $order_column = "id";
    // 条件查询语句

    public function getAll()
    {
 
        $query .= "select * from $this->table order by $this->order_column $this->order_type limit $this->limit offset $this->offset";

        return $this->query($query);
    }
    public function where($data,$data_not=[])
    {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);

        $query = "select * from $this->table where ";
        foreach($keys as $key){
            $query .= $key ." = :".$key ." && "; //id=:id
        }
        foreach($keys_not as $key){
            $query .= $key ." != : ".$key ." && "; //id=:id
        }
        $query = trim($query," && ");
        $query .= " order by $this->order_column $this->order_type limit $this->limit offset $this->offset";
        // $this->query($query,['id'=>''])

        // echo $query;
        $data = array_merge($data, $data_not);
        // show($data);
        return $this->query($query, $data);
    }
    
    public function first($data,$data_not=[])
    {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);

        $query = "select * from $this->table where ";
        foreach($keys as $key){
            $query .= $key ." = :".$key ." && "; //id=:id
        }
        foreach($keys_not as $key){
            $query .= $key ." != : ".$key ." && "; //id=:id
        }
        $query = trim($query," && ");
        $query .= " limit $this->limit offset $this->offset";
        // $this->query($query,['id'=>''])

        // echo $query;
        $data = array_merge($data, $data_not);
        // show($data);
        $result = $this->query($query, $data);
        if ($result)
            return $result[0];
        return false;
    }

    public function insert($data)
    {
        if(!empty($this->allowedColumns)){
            foreach($data as $key=>$value){
                if(!in_array($key,$this->allowedColumns))
                {
                    unset($data[$key]);
                }
            }
        }
        $keys = array_keys($data);
        $query = "insert into $this->table (".implode(",", $keys).") values (:".implode(",:",$keys).")";

        // echo $query;
        $this->query($query, $data);
        return false;
    }

    public function update($id,$data,$id_column='id')
    {
        if(!empty($this->allowedColumns)){
            foreach($data as $key=>$value){
                if(!in_array($key,$this->allowedColumns))
                {
                    unset($data[$key]);
                }
            }
        }
        // 指定
        $data[$id_column] = $id;

        $keys = array_keys($data);

        $query = "update $this->table set ";
        foreach($keys as $key){
            $query .= $key ." = :".$key ." , "; //id=:id
        }

        $query = trim($query," , ");

        $query .= "  where $id_column = :$id_column";
        // return $query;
        $this->query($query, $data);
        return false;
    }

    public function delete($id,$id_column='id')
    {
        
        $data[$id_column] = $id;
        $query = "delete from $this->table where $id_column = :$id_column ";
        $this->query($query, $data);
        return $query;
        // return false;
    }
}