<table name="tableBooks" border="1">
     <?php
        
        
        foreach ($lista as $pais) {       
     ?>
     	<tr>
               <td><?php echo $pais->getName();?></td>
               <td><?php echo $pais->getContinent();?></td>
               <td><?php echo $pais->getPopulation();?></td>
            
	</tr>
        <?php } ?>
</table>