<div>
    <h1>Tabella Anagrafica PHP</h1>
    <table>
    	<tr>
    		<th>Nome</th>
    		<th>Cognome</th>
    		<th>Anno</th>
    		<th>Modifica</th>
    		<th>Elimina</th>
    	</tr>
    	<?php $i=0; foreach($elenco as $row): ?>	
    		<?php if($i%2==0):?>
    			<tr class="pari">
    		<?php else: ?>
    			<tr>
    		<?php endif; ?>
    			<td><?php echo $row->getNome(); ?></td>
    			<td><?php echo $row->getCognome(); ?></td>
    			<td><?php echo $row->getAnno(); ?></td>
    	 	    <td><a href="?model=persona&action=edit&id=<?php echo $row->getIndice(); ?>">Modifica</a></td>
    			<td><a href="javascript:void(0)" onclick="elimina(<?php echo $row->getIndice(); ?>)">Elimina</a></td>		
    		</tr>
    	<?php $i++; endforeach; ?>
    </table>
	<form role="form" method="post" action="?model=persona&action=new">
		<input class="btn btn-dark" type="submit" value="Aggiungi">
	</form>   
</div>
<script>
	function elimina(id){
		if(confirm("Sei sicuro di voler eliminare la persona N. "+id))
			window.location.href = "?model=persona&action=delete&id=" + id;
	}
</script>