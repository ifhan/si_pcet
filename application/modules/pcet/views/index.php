<div>
	<h1 class="page-header">PCET en Pays de la Loire</h1>
</div>

<br />

<?php if (isset($records) && is_array($records) && count($records)) : ?>
				
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
                            <th>Identifiant du PCET</th>
                            <th>Type</th>
                            <th>Collectivit&eacute;</th>
                            <th>Statut</th>
                            <th>État d'avancement</th>
                            <th>Site web</th>
			</tr>
		</thead>
		<tbody>
		
		<?php foreach ($records as $record) : ?>
			
			<tr>
                            <td><?php echo anchor('/pcet/show/'. $record->id, '<i class="icon-search">&nbsp;</i>' .  $record->ID_PCET) ?>
                            <td><?php e($record->NOM_TYPE) ?></td>
                            <td><?php e($record->Nom_Commune) ?><?php e($record->Nom_Departement) ?><?php e($record->NOM_EPCI) ?><?php e($record->nom_pays) ?><?php e($record->nom_pnr) ?></td>
                            <td><?php e($record->STATUT_PCET) ?></td>
                            <td><?php e($record->NOM_PHASE) ?></td>
                            <td width="10%">
                                <?php if(!empty($record->INTERNET_PCET)): ?>
                                    <?php echo anchor($record->INTERNET_PCET, '<i class="icon-globe">&nbsp;</i>Consulter', 'target="_blank"'); ?>
				<?php endif; ?>
                            </td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
<?php endif; ?>