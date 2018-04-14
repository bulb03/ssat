<?php
    include 'YEAR.php';

    try
    {
        $yearModel = new YEAR;
        $conn = $yearModel->connect_db();
        $yearList = $yearModel->list($conn);
    }
    catch (Exception $e)
    {
        context.Response.StatusCode = 500;
        context.Response.Write(JsonConvert.SerializeObject((new ErrorResponse { msg = e.Message, trace = e.StackTrace }), Formatting.Indented));
    }
?>