<?php
/**
 * 连接数据库的操作
 * @return mysqli
 * 返回一个代表到 MySQL 服务器的连接的对象。
 */
function connect()
{
    //面向过程方式的连接方式
    $mysqli = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_DBNAME);
    //$mysqli = new mysqli(DB_HOST, DB_USER, DB_PWD,DB_DBNAME);
    //判断是否连接成功
    if (!$mysqli) {
        echo mysqli_connect_error("连接数据库失败。");
    }
    //关闭连接
    //mysqli_close($mysqli);
    return $mysqli;
}

/*
 * 完成插入的操作
 * @param $mysqli
 * @param $table
 * @param $array
 * @return int|string
 */
function insert($mysqli, $table, $array)
{
    $keys = join(",", array_keys($array));
    $vals = "'" . join("','", array_values($array)) . "'";
    $sql = "insert {$table}($keys) values({$vals})";
    mysqli_query($mysqli, $sql);
    return mysqli_insert_id($mysqli);
}

/*
 * 更新操作
 * @param $mysqli
 * @param $table
 * @param $array
 * @param null $where
 * @return int
 */
function update($mysqli, $table, $array, $where = null)
{
    $str = null;
    foreach ($array as $key => $val) {
        if ($str == null) {
            $sep = "";
        } else {
            $sep = ",";
        }
        $str .= $sep . $key . "='" . $val . "'";
    }
    $sql = "update {$table} set {$str}" . ($where == null ? null : " where " . $where);
    mysqli_query($mysqli, $sql);
    return mysqli_affected_rows($mysqli);
}


/**删除操作
 * @param $mysqli
 * @param $table
 * @param null $where
 * @return int
 */
function delete($mysqli, $table, $where = null)
{
    $where = $where == null ? null : " where " . $where;
    $sql = "delete from {$table}{$where}";
    mysqli_query($mysqli, $sql);
    return mysqli_affected_rows($mysqli);
}


/**查询返回一条记录
 * @param $mysqli
 * @param $sql
 * @param int $result_type
 * @return array|null
 */
function fetchOne($mysqli, $sql, $result_type = MYSQLI_ASSOC)
{

    $result = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_array($result, $result_type);
    //printf ("%s : %s :%s",$row["username"],$row["password"],$row["email"]);
    return $row;

}

/**
 * 查询返回所有记录
 * @param $mysqli
 * @param $sql
 * @param int $result_type
 * @return mixed
 */
function fetchAll($mysqli, $sql, $result_type = MYSQLI_ASSOC)
{
    $result = mysqli_query($mysqli, $sql);
    while (@$row = mysqli_fetch_array($result, $result_type)) {
        $rows[] = $row;
    }
    return rows;
}

/**得到结果集中的数量
 * @param $mysqli
 * @param $sql
 * @return int
 */
function getResultNum($mysqli, $sql)
{
    $result = mysqli_query($mysqli, $sql);
    return mysqli_num_rows($result);
}

/**
 * 关闭数据库
 * @param $mysqli
 */
function close($mysqli)
{
    mysqli_close($mysqli);
}


?>