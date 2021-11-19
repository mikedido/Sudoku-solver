/**
 * Algorithme soduku resolving : backtracking
 */

function sudokuResolver(gridHtml) {
    let grid = new grid()

    while (true) {
        

    }

}


let requests = [];
let grille = [
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

 function checkGrille(grille)
 {

   return true;
 }