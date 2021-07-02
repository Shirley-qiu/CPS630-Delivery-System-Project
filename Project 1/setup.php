<?php

$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE P2S";
if ($conn->query($sql) === TRUE) {

    echo "1. Database created successfully <br/>";
    $conn->select_db("P2S");

// users table
    $table1 = "CREATE TABLE USERS (
    user_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    tel_num VARCHAR(12),
    email VARCHAR(40),
    address VARCHAR(40),
    city_c VARCHAR(3),
    username VARCHAR(30),
    password CHAR(128),
    balance DECIMAL(5,2),
    salt VARCHAR(12),
    hashed_pw CHAR(32)
    )";

    if ($conn->query($table1) === TRUE) {
        echo "2. Table USERS created successfully <br/>";
    } else {
        echo "Error creating table: " . $conn->error;
    }
// insert into USERS
    $ins_sql_u = "INSERT INTO USERS (user_id, name, tel_num, email, address, city_c, username, password, balance,salt,hashed_pw)
    VALUES (1, 'Admin Ad', '1245242', 'admin@gmail.com', '34 Admin Rd', '416', 'Admin', 'admin', 56.25,1234,'c93ccd78b2076528346216b3b2f701e6')";
      if ($conn->query($ins_sql_u) === TRUE) {
      echo "New record created successfully <br/>";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $ins_sql_u = "INSERT INTO USERS (user_id, name, tel_num, email, address, city_c, username, password, balance)
    VALUES (2, 'John Doe', '1245242', 'john@gmail.com', '34 Dundas Rd', '416', 'JohnD', 'aefikh2f', 56.25),
       (3, 'Jane Smith', '5732058', 'jane@hotmail.com', '125 Chruch Ave', '416', 'Jane', 'wx4etba2r', 85.20),
       (4, 'Ann Wang', '2947046', 'annie@gmail.com', '12 Spadina Dr', '647', 'Annie', 'r298ywfo', 34.78)";

    if ($conn->query($ins_sql_u) === TRUE) {
      echo "New record created successfully <br/>";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

// car table
    $table2 = "CREATE TABLE CARS (
    car_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    model VARCHAR(30) NOT NULL,
    car_c VARCHAR(10),
    availability VARCHAR(10),
    img VARCHAR(30),
    price DECIMAL(7,2)
    )";

    if ($conn->query($table2) === TRUE) {
        echo "3. Table CARS created successfully <br/>";
    } else {
        echo "Error creating table: " . $conn->error;
    }

// insert into cars table
    $ins_sql_c = "INSERT INTO CARS (car_id, model, car_c, availability, img, price)
    VALUES (1, '2021 BMW 740', '25', 'yes', '1.png', 80000),
           (3, '2021 BMW 750', '28', 'yes', '2.png', 103000),
           (4, '2021 BMW ALPINA B7', '36', 'yes', '3.png', 86000)";

    if ($conn->query($ins_sql_c) === TRUE) {
      echo "New record created successfully <br/>";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

// trip table
    $table3 = "CREATE TABLE TRIPS (
    trip_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    car_id_fk INT(6) UNSIGNED,
    source_c VARCHAR(10),
    destin_c VARCHAR(10),
    distance DECIMAL(5,2),
    price DECIMAL(7,2),
    FOREIGN KEY (car_id_fk) REFERENCES cars(car_id)
    )";

    if ($conn->query($table3) === TRUE) {
        echo "4. Table TRIPS created successfully <br/>";
    } else {
        echo "Error creating table: " . $conn->error;
    }

// insert into trips table
    $ins_sql_t = "INSERT INTO TRIPS (trip_id, car_id_fk, source_c, destin_c, distance, price)
    VALUES (2, '4', 'toronto', 'new york', '', 86000),
           (3, '4', 'dfdfs', 'sdfdsfsf', '', 86000),
           (4, '4', 'dfdfs', 'sdfdsfsf', '', 86000),
           (5, '4', 'dfdfs', 'sdfdsfsf', '', 86000),
           (6, '3', 'dfdfs', 'sdfdsfsf', '', 103000),
           (7, '3', 'New Delhi', 'Gurgaon', '', 103000),
           (8, '4', 'oran', 'mascara', '', 86000)";

    if ($conn->query($ins_sql_t) === TRUE) {
      echo "New record created successfully <br/>";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

// flower table
    $table4 = "CREATE TABLE FLOWERS (
    flower_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    store_c VARCHAR(10),
    price DECIMAL(5,2),
    img VARCHAR(30)
    )";

    if ($conn->query($table4) === TRUE) {
        echo "5. Table FLOWERS created successfully <br/>";
    } else {
        echo "Error creating table: " . $conn->error;
    }

// insert into flowers table
$ins_sql_f = "INSERT INTO FLOWERS (flower_id, store_c, price, img)
    VALUES (1, 'fl store', '12', '5.jpg'),
           (2, 'dz store', '50', '4.jpg'),
           (3, 'us store', '23', '6.jpg')";

    if ($conn->query($ins_sql_f) === TRUE) {
      echo "New record created successfully <br/>";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

// orders table
    $table5 = "CREATE TABLE ORDERS (
    order_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id_fk INT(6) UNSIGNED,
    trip_id_fk INT(6) UNSIGNED,
    flower_id_fk INT(6) UNSIGNED,
    date_issued DATETIME,
    date_completed DATETIME,
    t_price DECIMAL(5,2),
    pay_c VARCHAR(10),
    FOREIGN KEY (user_id_fk) REFERENCES users(user_id),
    FOREIGN KEY (trip_id_fk) REFERENCES trips(trip_id),
    FOREIGN KEY (flower_id_fk) REFERENCES flowers(flower_id)
    )";

    if ($conn->query($table5) === TRUE) {
        echo "6. Table ORDERS created successfully <br/>";
    } else {
        echo "Error creating table: " . $conn->error;
    }


} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();


?>
