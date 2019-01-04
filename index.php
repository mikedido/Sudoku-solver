<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Sudoku resolver</title>
    
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script type="text/javascript" src="js/sudokuGrilled.js"></script>
    
  
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

      <h2 id="timer">Time : 0.00</h2>

      <a id="btn-clear" href="javascript: clearGrille()" class="btn btn-primary  active" role="button" aria-pressed="true">Clear</a>
      <a id="btn-resolve" href="javascript: submitGrille()" class="btn btn-primary  active" role="button" aria-pressed="true">Resolve</a>
      <a id="btn-stop" href="javascript: stopExecution()" class="btn btn-primary  disabled" role="button" aria-pressed="true">Stop</a>
    </div>
  </body>
  
</html>