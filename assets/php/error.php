<?
    function ReturnData($Array)
    {
        return json_encode($Array);
    }
    function PrintErrors()
    {
        ini_set('display_errors', '1');
        ini_set('display_startup_errors', '1');
        error_reporting(E_ALL);
    }
?>