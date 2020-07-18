<?php
   class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('gotimisoara.db');
      }
   }
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
      echo "Baza de date deschisa cu succes !\n";
   }

   $sql =<<<EOF
      CREATE TABLE contact
      (
      ID INTEGER PRIMARY KEY AUTOINCREMENT,
      firstname           TEXT    NOT NULL,
      lastname           TEXT    NOT NULL,
      email            TEXT     NOT NULL,
      message        TEXT);
EOF;

   $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "Tabela a fost creata cu succes !\n";
   }
   $db->close();
?>