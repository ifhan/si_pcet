<div>
    <h3><?php e($avis->ID_PCET.' - '.$structure->NOM_TYPE.' - '.$structure->Nom_Commune.$structure->Nom_Departement.$structure->NOM_EPCI.$structure->nom_pays.$structure->nom_pnr) ?>
    </h3>
</div><br />
<table class="table table-striped table-bordered">
    <tbody>
        <tr>
            <th>Date de la sollicitation de l'avis de l'État</th>
            <td>
                <?php if($avis->DEM_ETAT_AVIS !== '0000-00-00'): ?>
                    <?php e(date("d/m/Y", strtotime(($avis->DEM_ETAT_AVIS)))) ?>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <th>Date du rendu de l'avis de l'État</th>
            <td>
                <?php if($avis->REP_ETAT_AVIS !== '0000-00-00'): ?>
                    <?php e(date("d/m/Y", strtotime(($avis->REP_ETAT_AVIS)))) ?>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <th>Date de la sollicitation de l'avis du Conseil régional</th>
            <td>
                <?php if($avis->DEM_REG_AVIS !== '0000-00-00'): ?>
                    <?php e(date("d/m/Y", strtotime(($avis->DEM_REG_AVIS)))) ?>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <th>Date du rendu de l'avis du Conseil régional</th>
            <td>
                <?php if($avis->REP_REG_AVIS !== '0000-00-00'): ?>
                    <?php e(date("d/m/Y", strtotime(($avis->REP_REG_AVIS)))) ?>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <th>Date de la sollicitation de l'avis de l'ADEME</th>
            <td>
                <?php if($avis->DEM_ADEME_AVIS !== '0000-00-00'): ?>
                    <?php e(date("d/m/Y", strtotime(($avis->DEM_ADEME_AVIS)))) ?>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <th>Date du rendu de l'avis de l'ADEME</th>
            <td>
                <?php if($avis->REP_ADEME_AVIS !== '0000-00-00'): ?>
                    <?php e(date("d/m/Y", strtotime(($avis->REP_ADEME_AVIS)))) ?>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <th>Points positifs</th>
            <td><?php echo auto_typography($avis->PP_AVIS) ?></td>
        </tr>
        <tr>
            <th>Points négatifs</th>
            <td><?php echo auto_typography($avis->PN_AVIS) ?></td>
        </tr> 
        <tr>
            <th>Date d'adoption du PCET</th>
            <td>
                <?php if($avis->DATE_ADOPT_AVIS !== '0000-00-00'): ?>
                    <?php e(date("d/m/Y", strtotime(($avis->DATE_ADOPT_AVIS)))) ?>
                 <?php endif; ?>
            </td>
        
        </tr>
    </tbody>
</table>