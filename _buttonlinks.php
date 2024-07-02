<!DOCTYPE html>
<html>
  <head>
    <title>England Birminghan Mission Alumni </title>
  </head>
<body>
  <?php
   if(session_id() == ''){
      session_start();
$_SESSION["id"] = '';
      
       if($_SESSION["firstname"] == ''){
 $_SESSION["firstname"] = $firstname = '';
      
       $_SESSION["lastname"] = $lastname = ''; }
       
   }
  
  
  
?>Presidents:
    <button onclick="window.location.href=
    'sel_presidents.php';">
    Order by Start Date</button>
    <button onclick="window.location.href=
    'sel_presidentsOBN.php';">
    Order by Start Year Desc</button>
    <button onclick="window.location.href=
    'sel_presidentsOBN.php';">
    Order by Name
    </button>
    <button onclick="window.location.href=
    'sel_presidentsOBStart.php';">
    Order by Start Year
    </button>
    <button onclick="window.location.href=
    'sel_presidentsOBSD.php';">
    Order by
    </button>
    <button onclick="window.location.href=
    'alumni.php';">
    Add President
    </button>
    <Br>Alumni:
<button onclick="window.location.href=
    'alumni_missionLife.php';">
    Alumni Mission Life
    </button>
    <button onclick="window.location.href=
    'alumni.php';">
    Alumni Contact
    </button>
    <button onclick="window.location.href=
    'alumni_LifeUpdateReflection.php';">
    Alumni Life Update & reflection
    </button>
    <button onclick="window.location.href=
    'alumni.php';">
    Alumni Address
    </button>
     <button onclick="window.location.href=
    'AddAlumni.php';">
    Add Alumni 
    </button> 
    <button onclick="window.location.href=
    'AddTempalumni.php';">
    Add Alumni2 
    </button>
    <Br>Geographic:
    <button onclick="window.location.href=
    'areas.php';">
    Mission Areas
    </button>
    <button onclick="window.location.href=
    'city.php';">
    Alumni City
    </button>
    <button onclick="window.location.href=
    'state.php';">
    Alumni State
    </button>
    <button onclick="window.location.href=
    'country.php';">
    Alumni Country
    </button>
    <Br>Search:
    <button onclick="window.location.href=
    'search3options.php';">
    Search ID / FirstName / Lastname
    </button>
    <button onclick="window.location.href=
    'searchoption2.html';">
    Search Option 2
    </button>
    <button onclick="window.location.href=
    'searchcomp.php';">
    Search comp
    </button>
    <button onclick="window.location.href=
    'searchOptionAlumniLN.php';">
    Search OptionAlumniLN
    </button>
    <button onclick="window.location.href=
    'searchArea.php';">
    Search Area Php works
    </button>
    <button onclick="window.location.href=
    'searchOptionComp.html';">
    SearchOptionComp
    </button>
    <button onclick="window.location.href=
    'searchcompview.php';">
    Search compview php works
    </button>

    <?Php
//       $_SESSION["firstname"] = $firstname ;
  //     $_SESSION["lastname"] = $lastname ;

       ?>
  </body>
</html>