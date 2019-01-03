<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Sudoku resolver</title>
    
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    
    <style type="text/css">
    
      html, body {
        background-color: #FAFAFA
      }
      table {
        border: 2px solid #000000;
      }
      td {
        border: 1px solid #000000;
        text-align: center;
        vertical-align: middle;  
      }
      input {
        color: #000000;
        padding: 0;
        border: 0;
        text-align: center;
        width: 48px;
        height: 48px;
        font-size: 24px;
        background-color: #FFFFFF;
        outline: none;
      }
      input:disabled {
        background-color: #EEEEEE;
      }
      #cell-0,  #cell-1,  #cell-2  { border-top:    2px solid #000000; }
      #cell-2,  #cell-11, #cell-20 { border-right:  2px solid #000000; }
      #cell-18, #cell-19, #cell-20 { border-bottom: 2px solid #000000; }
      #cell-0,  #cell-9,  #cell-18 { border-left:   2px solid #000000; }
      #cell-3,  #cell-4,  #cell-5  { border-top:    2px solid #000000; }
      #cell-5,  #cell-14, #cell-23 { border-right:  2px solid #000000; }
      #cell-21, #cell-22, #cell-23 { border-bottom: 2px solid #000000; }
      #cell-3,  #cell-12, #cell-21 { border-left:   2px solid #000000; }
      #cell-6,  #cell-7,  #cell-8  { border-top:    2px solid #000000; }
      #cell-8,  #cell-17, #cell-26 { border-right:  2px solid #000000; }
      #cell-24, #cell-25, #cell-26 { border-bottom: 2px solid #000000; }
      #cell-6,  #cell-15, #cell-24 { border-left:   2px solid #000000; }
      #cell-27, #cell-28, #cell-29 { border-top:    2px solid #000000; }
      #cell-29, #cell-38, #cell-47 { border-right:  2px solid #000000; }
      #cell-45, #cell-46, #cell-47 { border-bottom: 2px solid #000000; }
      #cell-27, #cell-36, #cell-45 { border-left:   2px solid #000000; }
      #cell-30, #cell-31, #cell-32 { border-top:    2px solid #000000; }
      #cell-32, #cell-41, #cell-50 { border-right:  2px solid #000000; }
      #cell-48, #cell-49, #cell-50 { border-bottom: 2px solid #000000; }
      #cell-30, #cell-39, #cell-48 { border-left:   2px solid #000000; }
      #cell-33, #cell-34, #cell-35 { border-top:    2px solid #000000; }
      #cell-35, #cell-44, #cell-53 { border-right:  2px solid #000000; }
      #cell-51, #cell-52, #cell-53 { border-bottom: 2px solid #000000; }
      #cell-33, #cell-42, #cell-51 { border-left:   2px solid #000000; }
      #cell-54, #cell-55, #cell-56 { border-top:    2px solid #000000; }
      #cell-56, #cell-65, #cell-74 { border-right:  2px solid #000000; }
      #cell-72, #cell-73, #cell-74 { border-bottom: 2px solid #000000; }
      #cell-54, #cell-63, #cell-72 { border-left:   2px solid #000000; }
      #cell-57, #cell-58, #cell-59 { border-top:    2px solid #000000; }
      #cell-59, #cell-68, #cell-77 { border-right:  2px solid #000000; }
      #cell-75, #cell-76, #cell-77 { border-bottom: 2px solid #000000; }
      #cell-57, #cell-66, #cell-75 { border-left:   2px solid #000000; }
      #cell-60, #cell-61, #cell-62 { border-top:    2px solid #000000; }
      #cell-62, #cell-71, #cell-80 { border-right:  2px solid #000000; }
      #cell-78, #cell-79, #cell-80 { border-bottom: 2px solid #000000; }
      #cell-60, #cell-69, #cell-78 { border-left:   2px solid #000000; }

      .error {
        background-color: red;
        color: white;
      }
    </style>
  </head>
  <body>

    <div class="container">
      
      <h1>Sudoku resolver</h1>

      <table id="grid">

        <tr>
          <td><input id="cell-0"  type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-1"  type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-2"  type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          
          <td><input id="cell-3"  type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-4"  type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-5"  type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          
          <td><input id="cell-6"  type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-7"  type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-8"  type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
        </tr>

        <tr>
          <td><input id="cell-9"  type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-10" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-11" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          
          <td><input id="cell-12" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-13" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-14" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          
          <td><input id="cell-15" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-16" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-17" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
        </tr>

        <tr>          
          <td><input id="cell-18" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-19" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-20" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          
          <td><input id="cell-21" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-22" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-23" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          
          <td><input id="cell-24" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-25" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-26" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
        </tr>

        <tr>          
          <td><input id="cell-27" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-28" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-29" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          
          <td><input id="cell-30" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-31" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-32" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          
          <td><input id="cell-33" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-34" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-35" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
        </tr>

        <tr>          
          <td><input id="cell-36" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-37" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-38" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          
          <td><input id="cell-39" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-40" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-41" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          
          <td><input id="cell-42" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-43" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-44" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
        </tr>

        <tr>          
          <td><input id="cell-45" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-46" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-47" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          
          <td><input id="cell-48" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-49" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-50" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          
          <td><input id="cell-51" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-52" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-53" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
        </tr>

        <tr>          
          <td><input id="cell-54" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-55" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-56" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          
          <td><input id="cell-57" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-58" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-59" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          
          <td><input id="cell-60" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-61" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-62" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
        </tr>

        <tr>          
          <td><input id="cell-63" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-64" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-65" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          
          <td><input id="cell-66" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-67" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-68" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          
          <td><input id="cell-69" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-70" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-71" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
        </tr>

        <tr>          
          <td><input id="cell-72" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-73" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-74" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          
          <td><input id="cell-75" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-76" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-77" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          
          <td><input id="cell-78" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-79" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
          <td><input id="cell-80" type="text" minlength="0" maxlength="1" onkeydown="return isNumeric(event, id)"></td>
        </tr>

      </table>

      <p id="timer">time : 0.00</p>

      <form id="myform" action="handle-data.php">
        <input type='text' name='query' />
          <a href="javascript: clearGrille()">Clear</a>
          <a href="javascript: submitGrille()">Resolve</a>
      </form>
    </div>
  </body>
  <script>
    
    var grille = [
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0]
      ];

    function isNumeric(event, idCell) {
        
        var number = ['1', '2', '3', '4', '5', '6', '7', '8', '9', 'Backspace'];

        if (!isInArray(event.key, number)) {
          
          return false;
        }

       line = Math.floor(idCell.substring(5)/9);
       column = idCell.substring(5)%9;

       if (event.key == "Backspace"){
          grille[line][column] = 0;
          document.getElementById(idCell).classList.remove("error");
       } else {
          grille[line][column] = event.key;
       }

       if (!checkLine(grille, line, column, event.key) || !checkColumn(grille, line, column, event.key) || !checkBloc(grille, line, column, event.key)) {
          document.getElementById(idCell).classList.add("error");
       } 
    }

    /**
    * Clear the grid
    *
    *
    */
    function clearGrille()
    {
      var allInputElements = document.getElementsByTagName('input');

      for (var element = 0; element < allInputElements.length; element++) {
        allInputElements[element].value= '';
        allInputElements[element].classList.remove("error");
      }

      grille =  [
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0]
      ];

    }
    
    function createInstance()
    {
      var req = null;
      if(window.XMLHttpRequest) {
        req = new XMLHttpRequest();
      }
      else if (window.ActiveXObject) {
        try {
          req = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
           try {
            req = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
                alert("XHR not created");
              }
          }
        }
        return req;
    }
    /**
    * Submit the grille to be resolved
    *
    */
    function submitGrille()
    {
      console.log('submit');
      if (!checkGrille(grille)) {
        return;
      }
      var data = new FormData();
      data.append('grid', JSON.stringify(grille));

      var req = createInstance();
      req.onreadystatechange = function()
      { 
        if(req.readyState == 4)
        {
          if(req.status == 200)
          {
            result = JSON.parse(req.response);
            //remplissage de la grid
            fillGrid(result.grid);
            showExecutionTime(result.time);
          }  
          else 
          {
            console.log("Error: returned status code " + req.status + " " + req.statusText);
          }  
       } 
      }; 
      
      req.open('POST', "main.php", true); 
      req.send(data);
    }


    function fillGrid(grid)
    {
      var cellNumber = 0;

      for(var i=0; i<9; i++) {
        for(var j=0; j<9; j++) {

          element = document.getElementById('cell-'+cellNumber);
          element.value = grid[i][j];
          cellNumber++;
        }
      }
    }

    function showExecutionTime(time)
    {
      document.getElementById('timer').innerHTML = 'time : '+ time;
    }

    /**
    * Check if the value is in the array
    *
    * bool
    */
    function isInArray(value, array)
    {  
      return array.indexOf(value) > -1;
    }

    /**
    * Check all the ligne
    *
    */
    function checkLine(grile, line, column, value)
    {
      for (var j=0; j<9; j++) {
        if (grille[line][j] == value && j != column) {
          return false;
        }
      }

      return true;
    }

    /**
    * Check all the column
    *
    */
    function checkColumn(grile, line, column, value)
    {
      for (var i=0; i<9; i++) {
        if (grille[i][column] == value && i != line) {
          return false;
        }
      }

      return true;
    }

    /**
    * Check he bloc
    *
    */
    function checkBloc(grile, line, column, value)
    {
      var blocLine = 3*Math.floor(line/3);
      var blocColumn = 3*Math.floor(column/3);

      for (var i=blocLine; i<blocLine+3; i++) {
        for (var j=blocColumn; j<blocColumn+3; j++) {
          if (grille[i][j] == value && i != line && j != column) {
            return false;
          }
        }
      }
      return true;
    }

    function checkGrille(grille)
    {

      return true;
    }

  </script>
</html>