SELECT sub.nombre_sub_menu 
FROM table_sub_menu sub 
INNER JOIN table_menu_sub_menu t ON sub.id_sub_menu = t.id_sub_menu 
INNER JOIN table_menu tm ON tm.id_menu = t.id_menu WHERE tm.id_menu =2