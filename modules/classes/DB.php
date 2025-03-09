<?php

// this class is created as a singleton class because it's only created one time and not every time.
// Singleton class is a class that is instanciated only once and not again and again.
class DB // DB connection
{
    // Properties for mysql connection :
    // "static" is used because we're not using again and again this variable, ex. server name.
    /**
     * @var string
     */
    private static $serverName = SERVER_NAME; // SERVER_NAME is a constant defined in config file

    /**
     * @var string
     */
    private static $username = USER_NAME; // USER_NAME is a constant defined in config file

    /**
     * @var string
     */
    private static $password = PASSWORD; // PASSWORD is a constant defined in config file

    /**
     * @var string
     */
    private static $db_name = DB_NAME; // DB_NAME is a constant defined in config file

    /**
     * @var
     */
    public static $conn; // connection is created inside this property

    private final function __construct() // constructor instantiated only once because this class is a singleton class
    {
        // Instantiated only once
    }

    /**
     * Method to create DB connection
     * @return mysqli
     */

    // the first execution of this function will create the connection, then whenever we execute the function again it will only return it = singleton class.
    public static function createConnection()
    {
        if (!isset(self::$conn)) { // if there is no connection to the DB create it, else return this connection
            self::$conn = new mysqli(self::$serverName, self::$username, self::$password, self::$db_name); // create the connection if it doesn't existe
           // self is used because we declared the conn variable as static
           // whenever we declare a property as static, we us self::$nameProperty
        
        }

        return self::$conn; // else return the connection if it already exists
    }

    public function insert()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }
}

global $dbConn; // global variable to which we assign the DB connection that we are returning from createConnection function "return self::$conn"
$dbConn = DB::createConnection();