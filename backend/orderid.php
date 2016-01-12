<?php 
  
  // QUERY and JSON for PRICES 
  //--------------------------------------------------------------------------
  // 1) Connect to mysql database
  //--------------------------------------------------------------------------
  include 'DB.php';

  $con = new mysqli($host, $user, $pass, $databaseName);

  //--------------------------------------------------------------------------
  // 2) Query database for data
  //--------------------------------------------------------------------------

  $resultprices = $con->query("SELECT price FROM $tableproducts UNION SELECT price FROM $tablecountries");
  $resultcountries = $con->query("SELECT country FROM $tablecountries");

  $rowsprices = array();
  $rowscountries = array();

  //retrieve and print every price record
  while($r = mysqli_fetch_row($resultprices)){
  $rowsprices[] = $r; 
  }
  //retrieve and print every country record
  while($d = mysqli_fetch_row($resultcountries)){
  $rowscountries[] = $d; 
  }

  //--------------------------------------------------------------------------
  // 3) echo result as json 
  //--------------------------------------------------------------------------
  // DDBB Connection Closed
  $con -> close();
  // json encode two arrays one for prices and one for countries
  echo json_encode(array($rowsprices,$rowscountries));

  ?>


