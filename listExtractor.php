<?php

    $criteria = $_POST["criteria"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "travels";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $listQuery="";

    if($criteria == 'Country')
    {
        $listQuery ="SELECT CountryName FROM geocountries, travelimagedetails";
        $listQuery .= " WHERE travelimagedetails.CountryCodeISO = geocountries.ISO GROUP BY CountryName";
    }
    else
    {
        $listQuery = "SELECT AsciiName AS CityName FROM geocities, travelimagedetails";
        $listQuery .= " WHERE travelimagedetails.CityCode = geocities.GeoNameID GROUP BY AsciiName";
    }

    $result = $conn->query($listQuery);

    $list = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $list[] = $row;
    }

    echo json_encode($list);


?>