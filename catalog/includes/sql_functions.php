<?php
  function showLoginErrors($err_code) {
    switch ($err_code) {
    case 0:
        echo "please enter values for username and password";
        break;
    case 1:
        echo "Didn't enter password";
        break;
    case 2:
        echo "Didn't enter username";
        break;
    }
  }

  function showUsers($usernames, $passwords, $images) {
    $output = '';
    $output .= "<table>
    <thead>
      <tr>
        <th>Username</th>
        <th>Password</th>
        <th>Image Exists</th>
      </tr>
    </thead>";
    for ($i = 0; $i < count($usernames); $i++) {
        $output .= "<tr><th>";
        $output .= $usernames[$i];
        $output .= "</th><th>"; 
        $output .= $passwords[$i];
        $output .= "</th><th>"; 
        $output .= (isset($images[$usernames[$i]])) ? "Yes" : "No";
        $output .= "</th></tr>";
    }
    $output .= "</table>";
    
    echo $output;
  }

  function CatalogSqlQuery($command) {
    $HOST = 'localhost';
    $USER = 'pizza2d1';
    $PASS = 'password';
    $DB = 'catalog';
    $conn = mysqli_connect($HOST,$USER,$PASS,$DB);
    $results = mysqli_query($conn, $command);

    mysqli_close($conn);
  }
  function getProductsSql() {
    $HOST = 'localhost';
    $USER = 'pizza2d1';
    $PASS = 'password';
    $DB = 'catalog';
    $conn = mysqli_connect($HOST,$USER,$PASS,$DB);
    $sql = 'SELECT * FROM product';
    $results = mysqli_query($conn, $sql);
    if (mysqli_num_rows($results) > 0) {
      while ($x = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
          $names[$x["id"]] = $x["name"];
          $descriptions[$x["id"]] = $x["description"];
          $images[$x["id"]] = $x["image"];
          $prices[$x["id"]] = $x["price"];
      }
    } else {
      $names = [];
      $descriptions = [];
      $images = [];
      $prices = [];
    }
    mysqli_close($conn);
    return [$names, $descriptions, $images, $prices];
  }
  function getUsersSql() {
    $HOST = 'localhost';
    $USER = 'pizza2d1';
    $PASS = 'password';
    $DB = 'catalog';
    $conn = mysqli_connect($HOST,$USER,$PASS,$DB);
    $sql = 'SELECT * FROM user';
    $results = mysqli_query($conn, $sql);
    if (mysqli_num_rows($results) > 0) {
      while ($x = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
          $usernames[$x["id"]] = $x["username"];
          $passwords[$x["id"]] = $x["password"];
      }
    } else {
      $usernames = [];
      $passwords = [];
    }
    mysqli_close($conn);
    return [$usernames, $passwords];
  }
  function pizzaHash($plaintext) {
    $salt1 = 'kajslngeognjalONsejWfp';
    $salt2 = 'POePNepizbpEbpinrpnqm';
    $hashedPassword = hash('sha256', $salt1.$plaintext.$salt2);
    return $hashedPassword;
  }
?>
