<?php


class QueryBuilder
{
    protected $pdo;

    /**
     * QueryBuilder constructor.
     * @param $pdo
     */
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param $table
     * @param $param
     * Saves the data to the database
     * return the last created ID
     */
    public function insert($table, $param)
    {
        $sql = sprintf(
            'insert into %s (%s) value (%s)',
            $table,
            implode(', ', array_keys($param)),
            ':' . implode(', :', array_keys($param))
        );

        try{
            $statement = $this->pdo->prepare($sql);
            $statement->execute($param);
            return $this->pdo->lastInsertId();
        }   catch (Exception $exception) {
            die($exception->getMessage());
        }
    }

    /**
     * Pulls all users out of the database
     */
    public function users()
    {
        $sql = "select p.photo, s.firstName, s.lastName, s.reportSubject, s.email
        from user as s
        left join profile as p on p.idUser = s.id";



        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute();
            $data = $statement->fetchAll();
            return $data;
//            var_dump($data);
        } catch (Exception $exception) {
            die($exception->getMessage());
        }
    }

    public function getAllCountries() {
        $sql = "select * from countries";

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute();
            $data = $statement->fetchAll();
            return $data;
        } catch (Exception $exception) {
            die($exception->getMessage());
        }
    }

    /**
     * Counts all users in the database
     * return their number
     */
    public function countUser()
    {
        $sql = 'select count(id) as count from user';

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute();
            $count = $statement->fetchColumn();
            return $count;
        } catch (Exception $exception) {
            die($exception->getMessage());
        }
    }

    /**
     * @param $email
     * @return bool
     * Checking in the database on unique field email
     */
    public function checkEmail($email){
        $sql = sprintf(
            'select count(id) as count from user where email="%s" ',
            $email
        );
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $count = $statement->fetchAll()[0];
        return $count['count'] > 0 ? true : false;
    }
}