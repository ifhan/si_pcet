<h3>Identifiant du PCET : <?php e($pcet->ID_PCET) ?></h3>
<h4>Collectivité porteuse du PCET</h4>
<table class="table table-striped table-bordered">
    <tbody>
        <tr>
            <td><strong>Type de collectivité</strong></td>
            <td><?php e($structure->NOM_TYPE) ?></td>
        </tr>
        <tr>
            <td><strong>Nom</strong></td>
            <td><?php e($structure->Nom_Commune) ?><?php e($structure->Nom_Departement) ?><?php e($structure->NOM_EPCI) ?><?php e($structure->nom_pays) ?><?php e($structure->nom_pnr) ?></td>
        </tr>
        <tr>
            <td><strong>D&eacute;partement</strong></td>
            <td><?php e($structure->DEPARTEMENT_id)?></td>
        </tr>
        <tr>
            <td><strong>Site web</strong></td>
            <td><?php echo anchor($pcet->INTERNET_PCET, '<i class="icon-globe">&nbsp;</i>Consulter', 'target="_blank"'); ?></td>
        </tr>
    </tbody>
</table><br />
<div class="accordion" id="accordion2">
    <div class="accordion-group">
        <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                <h4>Informations sur le PCET</h4>
            </a>
        </div>
        <div id="collapseOne" class="accordion-body collapse in">
            <div class="accordion-inner">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <td><strong>Statut</strong></td>
                            <td><?php e($pcet->STATUT_PCET) ?></td>
                        </tr>
                        <tr>
                            <td><strong>État d'avancement</strong></td>
                            <td><?php e($phase->NOM_PHASE) ?></td>
			</tr>
                        <tr>		
                            <td><strong>Commentaires</strong></td>
                            <td><?php e($pcet->ETAT_PCET) ?></td>
			</tr>
                        <tr>
                            <td><strong>Contrat ADEME</strong></td>
                            <td>
                                <?php if($pcet->CONTRAT_ADEME_PCET == '1'): ?>
                                    <?php echo "Oui"; ?>
                                <?php else: ?>
                                    <?php echo "Non"; ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php if($pcet->CONTRAT_ADEME_PCET == '1'): ?>
                        <tr>
                            <td><strong>Type de contrat</strong></td>
                            <td><?php e($pcet->TYPE_CONTRAT_ADEME_PCET) ?></td>
			</tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php if($engagement): ?>
    <div class="accordion-group">
        <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                <h4>Engagement de la démarche</h4>
            </a>
        </div>
        <div id="collapseTwo" class="accordion-body collapse in">
            <div class="accordion-inner">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <td><strong>Implication de la DDT(M)</strong></td>
                            <td><?php e($engagement->COMMENT_DDT) ?></td>
                        </tr>
                        <tr>        
                            <td><strong>Date de délibération de la collectivité</strong></td>   
                            <td>
                                <?php if($engagement->DATE_DELIB !== '0000-00-00'): ?>
                                    <?php e(date("d/m/Y", strtotime(($engagement->DATE_DELIB)))) ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Date du courrier de la collectivité notifiant sa délibération à l'État (Préfecture)</strong></td>
                            <td>
                                <?php if($engagement->NOTIF_DELIB_ETAT !== '0000-00-00'): ?>
                                    <?php e(date("d/m/Y", strtotime(($engagement->NOTIF_DELIB_ETAT)))) ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Date du courrier de la collectivité notifiant sa délibération au Conseil Régional</strong></td>
                            <td>
                                <?php if($engagement->NOTIF_DELIB_CR !== '0000-00-00'): ?>
                                    <?php e(date("d/m/Y", strtotime(($engagement->NOTIF_DELIB_CR)))) ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Date courrier de notification d'engagement de la collectivité à l'<abbr title="Union Sociale de l'Habitat">USH</abbr></strong></td>
                            <td>
                                <?php if($engagement->NOTIF_USH !== '0000-00-00'): ?>
                                    <?php e(date("d/m/Y", strtotime(($engagement->NOTIF_USH)))) ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Consultation aval USH souhaitée ?</strong></td>
                            <td>
                                <?php if($engagement->REP_USH == '1'): ?>
                                    <?php echo "Oui"; ?>
                                <?php else: ?>
                                        <?php echo "Non"; ?>
                                <?php endif; ?> 
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Date du courrier de réponse de l'<abbr title="Union Sociale de l'Habitat">USH</abbr></strong></td>
                            <td>
                                <?php if($engagement->DATE_REP_USH !== '0000-00-00'): ?>
                                    <?php e(date("d/m/Y", strtotime(($engagement->DATE_REP_USH)))) ?>
                                <?php endif; ?>
                            </td>
                        </tr>  
                        <tr>
                            <td><strong>Date du « Porter-à-connaissance » de l'État</strong></td>
                            <td>
                                <?php if($engagement->DATE_PAC !== '0000-00-00'): ?>
                                    <?php e(date("d/m/Y", strtotime(($engagement->DATE_PAC)))) ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php endif; ?>    
    <?php if($avis): ?>
    <div class="accordion-group">
        <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
                <h4>Avis sur le PCET</h4>
            </a>
        </div>
        <div id="collapseThree" class="accordion-body collapse in">
            <div class="accordion-inner">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <td><strong>Date de la sollicitation de l'avis de l'État</strong></td>
                            <td>
                                <?php if($avis->DEM_ETAT_AVIS !== '0000-00-00'): ?>
                                    <?php e(date("d/m/Y", strtotime(($avis->DEM_ETAT_AVIS)))) ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>        
                            <td><strong>Date du rendu de l'avis de l'État</strong></td>   
                            <td>
                                <?php if($avis->REP_ETAT_AVIS !== '0000-00-00'): ?>
                                    <?php e(date("d/m/Y", strtotime(($avis->REP_ETAT_AVIS)))) ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Date de la sollicitation de l'avis du Conseil régional</strong></td>
                            <td>
                                <?php if($avis->DEM_REG_AVIS !== '0000-00-00'): ?>
                                    <?php e(date("d/m/Y", strtotime(($avis->DEM_REG_AVIS)))) ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Date du rendu de l'avis du Conseil régional</strong></td>
                            <td>
                                <?php if($avis->REP_REG_AVIS !== '0000-00-00'): ?>
                                    <?php e(date("d/m/Y", strtotime(($avis->REP_REG_AVIS)))) ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Date de la sollicitation de l'avis de l'ADEME</strong></td>
                            <td>
                                <?php if($avis->DEM_ADEME_AVIS !== '0000-00-00'): ?>
                                    <?php e(date("d/m/Y", strtotime(($avis->DEM_ADEME_AVIS)))) ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Date du rendu de l'avis de l'ADEME</strong></td>
                            <td>
                                <?php if($avis->REP_ADEME_AVIS !== '0000-00-00'): ?>
                                    <?php e(date("d/m/Y", strtotime(($avis->REP_ADEME_AVIS)))) ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Points positifs</strong></td>
                            <td><?php e($avis->PP_AVIS) ?></td>
                        </tr>
                        <tr>
                            <td><strong>Points négatifs</strong></td>
                            <td><?php e($avis->PP_AVIS) ?></td>
                        </tr>    
                        <tr>
                            <td><strong>Date d'adoption du PCET</strong></td>
                            <td>
                                <?php if($avis->DATE_ADOPT_AVIS !== '0000-00-00'): ?>
                                    <?php e(date("d/m/Y", strtotime(($avis->DATE_ADOPT_AVIS)))) ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if($diagnostic): ?>
    <div class="accordion-group">
        <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">
                <h4>Volet "Diagnostic"</h4>
            </a>
        </div>
        <div id="collapseFour" class="accordion-body collapse in">
            <div class="accordion-inner">
                <table class="table table-striped table-bordered">
                    <tr>
                        <td><strong>Diagnostic "Gaz à effet de serre"</strong></td>
                        <td><?php e($diagnostic->GES_DIAG) ?></td>
                    </tr>
                    <tr>
                        <td><strong>Consommation du territoire (<abbr title="kilotonne d'équivalent pétrole">ktep</abbr>)</strong></td>
                        <td><?php e($diagnostic->CONSO_KTEP_T) ?></td>
                    </tr>
                    <tr>
                        <td><strong>Émissions du territoire (<abbr title="tonne équivalent CO2">teq-CO2</abbr>)</strong></td>
                        <td><?php e($diagnostic->EMIS_CO2_T) ?></td>
                    </tr>
                    <tr>
                        <td><strong>Consommation "Patrimoine et compétence" (<abbr title="kilotonne d'équivalent pétrole">ktep</abbr>)</strong></td>
                        <td><?php e($diagnostic->CONSO_KTEP_PC) ?></td>
                    </tr>
                    <tr>
                        <td><strong>Émissions "Patrimoine et compétence" (<abbr title="tonne équivalent CO2">teq-CO2</abbr>)</strong></td>
                        <td><?php e($diagnostic->EMIS_CO2_PC) ?></td>
                    </tr>   
                    <tr>
                        <td><strong>Bilan <abbr title="Gaz à effets de serre" class="initialism">GES</abbr> Territorial</strong></td>
                        <td><?php e($diagnostic->ID_GES_BILAN_T) ?></td>
                    </tr>  
                    <tr>
                        <td><strong>Bilan <abbr title="Gaz à effets de serre" class="initialism">GES</abbr> "Patrimoine et Compétence"</strong></td>
                        <td><?php e($diagnostic->ID_GES_BILAN_T) ?></td>
                    </tr>                    
                </table>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if($adaptation): ?>
    <div class="accordion-group">    
        <div class="accordion-heading"> 
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFive">        
                <h4>Volet "Adaptation"</h4>     
            </a>   
        </div>   
        <div id="collapseFive" class="accordion-body collapse in">    
            <div class="accordion-inner">    
                <table class="table table-striped table-bordered">  
                    <tr>   
                        <td><strong>Étude de vulnérabilité</strong></td>   
                        <td>
                            <?php if($adaptation->VULNERABLE_ADAPT == '1'): ?>
                                    <?php echo "Oui"; ?>
                            <?php else: ?>
                                    <?php echo "Non"; ?>
                            <?php endif; ?>    
                        </td>    
                    </tr>
                    <tr> 
                        <td><strong>Méthode employée</strong></td>    
                        <td><?php e($adaptation->METHODE_ADAPT) ?></td>
                    </tr>                    
                    <tr>  
                        <td><strong>Aléas identifiés</strong></td>   
                        <td><?php e($adaptation->ALEA_ADAPT) ?></td> 
                    </tr>
                </table> 
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if($indicateur): ?>
    <div class="accordion-group">
        <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseSix">
                <h4>Plans d'actions</h4>
            </a>
        </div>
        <div id="collapseSix" class="accordion-body collapse in">
            <div class="accordion-inner">
                <table class="table table-striped table-bordered">
                    <tr>
                        <td><strong>Tableau des actions et des indicateurs</strong></td>
                        <td>
                            <?php if($indicateur->TABLEAU_DE_BORD == '1'): ?>
                                    <?php echo "Oui"; ?>
                            <?php else: ?>
                                    <?php echo "Non"; ?>
                            <?php endif; ?> 
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Nombres d'indicateurs</strong></td>
                        <td><?php e($indicateur->NB_TOTAL_INDICATEURS) ?></td>
                    </tr>
                    <tr>
                        <td><strong>Nombres d'indicateurs quantitatifs</strong></td>
                        <td><?php e($indicateur->NB_INDICATEURS_QT) ?></td>
                    </tr>
                    <tr>
                        <td><strong>Nombres d'indicateurs qualitatifs</strong></td>
                        <td><?php e($indicateur->NB_INDICATEURS_QL) ?></td>
                    </tr>
                    <tr>
                        <td><strong>Nombres d'actions</strong></td>
                        <td><?php e($indicateur->NB_TOTAL_ACTIONS) ?></td>
                    </tr>                    
                </table>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if($contacts): ?>
    <div class="accordion-group">
        <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseSeven">
                <h4>Contacts</h4>
            </a>
        </div>
        <div id="collapseSeven" class="accordion-body collapse in">
            <div class="accordion-inner">
                <ul>
                    <?php foreach ($contacts as $contact): ?>
                    <li>
                        <?php e($contact->CIVILITE.' '.$contact->NOM_CONTACT.' '.$contact->PRENOM) ?>
                        <?php if($contact->POSTE): ?><br /><i class="icon-briefcase">&nbsp;</i><?php e($contact->POSTE) ?><?php endif; ?>
                        <br /><?php echo mailto($contact->MAIL, '<i class="icon-envelope">&nbsp;</i> ' .  $contact->MAIL, 'target="_blank"'); ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>