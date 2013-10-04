<div>
    <h3><?php e($engagement->ID_PCET.' - '.$structure->NOM_TYPE.' - '.$structure->Nom_Commune.$structure->Nom_Departement.$structure->NOM_EPCI.$structure->nom_pays.$structure->nom_pnr) ?>
    </h3>
</div><br />
<table class="table table-striped table-bordered">
    <tbody>
        <tr>
            <th>Implication de la DDT(M)</th>
            <td><?php echo auto_typography($engagement->COMMENT_DDT)?></td>
        </tr>
        <tr>
            <th>Date de délibération de la collectivité</th>   
            <td>
                <?php if($engagement->DATE_DELIB !== '0000-00-00'): ?>
                    <?php e(date("d/m/Y", strtotime(($engagement->DATE_DELIB)))) ?>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <th>Date du courrier de la collectivité notifiant sa délibération à l'État (Préfecture)</th>         
            <td>
                <?php if($engagement->NOTIF_DELIB_ETAT !== '0000-00-00'): ?>
                    <?php e(date("d/m/Y", strtotime(($engagement->NOTIF_DELIB_ETAT)))) ?>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <th>Date du courrier de la collectivité notifiant sa délibération au Conseil Régional</th>
            <td>
                <?php if($engagement->NOTIF_DELIB_CR !== '0000-00-00'): ?>
                    <?php e(date("d/m/Y", strtotime(($engagement->NOTIF_DELIB_CR)))) ?>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <th>Date courrier de notification d'engagement de la collectivité à l'<abbr title="Union Sociale de l'Habitat">USH</abbr></th>
            <td>
                <?php if($engagement->NOTIF_USH !== '0000-00-00'): ?>
                    <?php e(date("d/m/Y", strtotime(($engagement->NOTIF_USH)))) ?>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <th>Consultation aval USH souhaitée ?</th>
            <td>
                <?php if($engagement->REP_USH == '1'): ?>
                    <?php echo "Oui"; ?>
                <?php else: ?>
                    <?php echo "Non"; ?>
                <?php endif; ?> 
            </td>
        </tr>
        <tr>
            <th>Date du courrier de réponse de l'<abbr title="Union Sociale de l'Habitat">USH</abbr></th>
            <td>
                <?php if($engagement->DATE_REP_USH !== '0000-00-00'): ?>
                    <?php e(date("d/m/Y", strtotime(($engagement->DATE_REP_USH)))) ?>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <th>Date du « Porter-à-connaissance » de l'État</th>
            <td>
                <?php if($engagement->DATE_PAC !== '0000-00-00'): ?>
                    <?php e(date("d/m/Y", strtotime(($engagement->DATE_PAC)))) ?>
                <?php endif; ?>
            </td>
        </tr>
    </tbody>
</table>