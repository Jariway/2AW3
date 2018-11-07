<table name="tableBooks" border="1">
     <?php
        
        
        foreach ($lista as $pais) {       
     ?>
     	<tr>
               <td><?php echo $pais->getCode()?></td>
               <td><?php echo $pais->getName();?></td>
               <td><?php echo $pais->getContinent();?></td>
               <td><?php echo $pais->getSurfaceArea();?></td>
               <td><?php echo $pais->getIndepYear();?></td>
               <td><?php echo $pais->getPopulation();?></td>
               <td><?php echo $pais->getLifeExpectancy();?></td>
               <td><?php echo $pais->getCapital();?></td>
               
	</tr>
        <?php } ?>
</table>