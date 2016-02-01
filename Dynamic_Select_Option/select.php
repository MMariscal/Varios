<html>
    <head>
        <link rel="stylesheet" type="text/css" href="select_style.css">
        <script type="text/javascript" src="../bower_components/jQuery/dist/jquery.js"></script>
        <script type="text/javascript">

        function fetch_select(val)
            {
               $.ajax({
                 type: 'post',
                 url: 'fetch_data.php',
                 data: {
                   get_option:val
                 },
                 success: function (response) {
                   document.getElementById("new_select").innerHTML=response;
                 }
               });
            }

        </script>

    </head>

   <body>
     <p id="heading">Dynamic Select Option Menu Using Ajax and PHP</p>
	 <center>
	   <div id="select_box">

         <select onchange="fetch_select(this.value);">
           <option>
              Select product
           </option>

           <?php
             $host = 'localhost';
             $user = 'user';
             $pass = '123456';

             mysql_connect($host, $user, $pass);

             mysql_select_db('NatuPruebas');

             $select=mysql_query("select nombre from Producto group by nombre");
             while($row=mysql_fetch_array($select))
             {
              echo "<option>".$row['nombre']."</option>";
             }
           ?>

         </select>

         <select id="new_select">
         </select>

       </div>
	 </center>


   </body>
</html>
