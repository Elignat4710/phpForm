<?php

class Connection
{
    public static function make($config)
    {
        /**
         * Connection to the database
         */
        try {
            return new PDO(
                $config['connection'].';dbname='.$config['name'],
                $config['username'],
                $config['password'],
                $config['options']
            );
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
    }
}