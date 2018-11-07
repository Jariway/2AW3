<table name="tableBooks" border="1">
<tr>
<th>City</th>
<th>Country Code</th>
<th>City Population</th>
<th>Country Name</th>
<th>Country Population</th>
<th>Continent</th>
<th>Capital</th>
</tr>
     <?php
        
        // No hace falta un foreach porque sólo devuelve un resultado pero no me da tiempo a arreglarlo
        foreach ($lista as $ciudad) {       
     ?>
     	<tr>
               <td><?php echo $ciudad->getName();?></td>
               <td><?php echo $ciudad->getCountryCode();?></td>
               <td><?php echo $ciudad->getPopulation();?></td>
               <td><?php echo $ciudad->getCountry()->getName();?></td>
               <td><?php echo $ciudad->getCountry()->getPopulation();?></td>
               <td> <?php echo $ciudad->getCountry()->getContinent();?></td>
               <td><?php echo $ciudad->getCountry()->getCapital();?></td>
            
	</tr>
        <?php } ?>
</table>