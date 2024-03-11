<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <title>Tunnelbana</title>
</head>
<body>
<?php 
// Arrayen som håller alla stationer
$linje19 = ['Hagsätra', 'Rågsved', 'Högdalen', 'Bandhagen', 'Stureby', 'Svedmyra', 'Sockenplan', 'Enskede Gård', 'Globen', 'Gullmarsplan', 'Skanstull',
'Medborgarplatsen', 'Slussen', 'Gamla Stan', 'T-Centralen',
'Hötorget', 'Rådmansgatan', 'Odenplan', 'S:T Eriksplan',
'Fridhemsplan', 'Thorildsplan', 'Kristineberg', 'Alvik',
'Stora Mossen', 'Abrahamsberg', 'Brommaplan', 'Åkeshov',
'Ängbyplan', 'Islandstorget', 'Blackeberg', 'Råcksta', 'Vällingby',
'Johannelund', 'Hässelby Gård', 'Hässelby Strand'];

?>
<!-- Form för selecting "Från" och "Till" stationerna -->
<form method="POST" action="#">
  <!-- The dropdown som hjälper bestämma "Fråm" -->
    <label for="from">Från: </label>
<select id="from" name="from">
  <?php foreach($linje19 as $key => $value) { ?>
    <option value="<?php echo $key ?>"><?php echo $value ?></option>
  <?php }?>
</select>

<!-- The dropdown som hjälper bestämma "Till" -->
  <label for="to">Till: </label>
<select id="to" name="to">
  <?php foreach($linje19 as $key => $value) { ?>
    <option value="<?php echo $key ?>"><?php echo $value ?></option>
  <?php }?>
</select>
    <input type="submit" value="Sök">
</form> 

<?php 
$from = $_POST['from']; // "from" från select
$to = $_POST['to'];  //"to" från select

// Beräkna antalet stationer mellan Från-stationen och Till-stationen
$stations_between = abs($from - $to);

// 3 minuter per station
$time_travel = $stations_between * 3; 

// Nuvarande tid i antal sekunder
$current_time = time(); 
// Beräkna förväntad ankomsttid
$arrival = date("H:i", $current_time + ($time_travel * 60)); 
?>
<!-- Information om din resa -->
<h2>Information om din resa</h2>
<!-- Stationerna mellan -->
    <p>Antal stationer mellan Från-stationen och Till-stationen: <?php echo $stations_between; ?></p>
    <!-- Tiden som resan kommer att ta -->
    <p>Beräknad restid: <?php echo $time_travel; ?> minuter</p>
    <!-- Och vilken tid du kommer vara där -->
    <p>Förväntad ankomsttid till destinationen: <?php echo $arrival; ?></p>
</body>
</html>