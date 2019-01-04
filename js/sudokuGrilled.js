
    var requests = [];
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
      if (!checkGrille(grille)) {
        return;
      }
      var btnResolve = document.getElementById('btn-resolve');
      var btnStop = document.getElementById('btn-stop');
      
      btnResolve.classList.add('disabled');
      btnResolve.classList.remove('active');

      btnStop.classList.add('active');
      btnStop.classList.remove('disabled');

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

            btnResolve.classList.add('active');
            btnResolve.classList.remove('disabled');

            btnStop.classList.add('disabled');
            btnStop.classList.remove('active');
          }  
          else 
          {
            console.log("Error: returned status code " + req.status + " " + req.statusText);
          }  
       } 
      }; 
      
      req.open('POST', "main.php", true); 
      req.send(data);
      requests.push(req);
    }

    function stopExecution()
    {
      console.log('stop');
      requests.forEach(function(request) {
        request.abort()
      });
      var btnResolve = document.getElementById('btn-resolve');
      var btnStop = document.getElementById('btn-stop');
      
      btnResolve.classList.add('active');
      btnResolve.classList.remove('disabled');

      btnStop.classList.add('disabled');
      btnStop.classList.remove('active');

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