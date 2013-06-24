<h3>Identifiant du PCET : <?php e($pcet->ID_PCET) ?></h3>
<h4>Collectivité porteuse du PCET</h4>
<table class="table table-striped table-bordered">
    <tbody>
        <tr>
            <td>Type de collectivité</td>
            <td><?php e($structure->NOM_TYPE) ?></td>
        </tr>
        <tr>
            <td>Nom</td>
            <td><?php e($structure->Nom_Commune) ?><?php e($structure->Nom_Departement) ?><?php e($structure->NOM_EPCI) ?><?php e($structure->nom_pays) ?><?php e($structure->nom_pnr) ?></td>
        </tr>
        <tr>
            <td>D&eacute;partement</td>
            <td><?php e($structure->DEPARTEMENT_id)?></td>
        </tr>
        <tr>
            <td>Site web</td>
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
                            <td>Statut</td>
                            <td><?php e($pcet->STATUT_PCET) ?></td>
                        </tr>
                        <tr>
                            <td>État d'avancement</td>
                            <td><?php e($phase->NOM_PHASE) ?></td>
			</tr>
                        <tr>		
                            <td>Commentaires</td>
                            <td><?php e($pcet->ETAT_PCET) ?></td>
			</tr>
                        <tr>
                            <td>Contrat ADEME</td>
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
                            <td>Type de contrat</td>
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
                            <td>Implication de la DDT(M)</td>
                            <td><?php e($engagement->COMMENT_DDT) ?></td>
                        </tr>
                        <tr>        
                            <td>Date de délibération de la collectivité</td>   
                            <td><?php e(date("d/m/Y", strtotime(($engagement->DATE_DELIB)))) ?></td>
                        </tr>
                        <tr>
                            <td>Date du courrier de la collectivité notifiant sa délibération à l'État (Préfecture)</td>
                            <td><?php e(date("d/m/Y", strtotime(($engagement->NOTIF_DELIB_ETAT)))) ?></td>
                        </tr>
                        <tr>
                            <td>Date du courrier de la collectivité notifiant sa délibération au Conseil Régional</td>
                            <td><?php e(date("d/m/Y", strtotime(($engagement->NOTIF_DELIB_CR)))) ?></td>
                        </tr>
                        <tr>
                            <td>Date courrier de notification d'engagement de la collectivité à l'<abbr title="Union Sociale de l'Habitat">USH</abbr></td>
                            <td><?php e(date("d/m/Y", strtotime(($engagement->NOTIF_USH)))) ?></td>
                        </tr>
                        <tr>
                            <td>Consultation aval USH souhaitée ?</td>
                            <td>
                                <?php if($engagement->REP_USH == '1'): ?>
                                    <?php echo "Oui"; ?>
                                <?php else: ?>
                                        <?php echo "Non"; ?>
                                <?php endif; ?> 
                            </td>
                        </tr>
                        <tr>
                            <td>Date du courrier de réponse de l'<abbr title="Union Sociale de l'Habitat">USH</abbr></td>
                            <td><?php e(date("d/m/Y", strtotime(($engagement->DATE_REP_USH)))) ?></td>
                        </tr>  
                        <tr>
                            <td>Date du « Porter-à-connaissance » de l'État</td>
                            <td><?php e(date("d/m/Y", strtotime(($engagement->DATE_PAC)))) ?></td>
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
                            <td>Date de la sollicitation de l'avis de l'État</td>
                            <td><?php e(date("d/m/Y", strtotime(($avis->DEM_ETAT_AVIS)))) ?></td>
                        </tr>
                        <tr>        
                            <td>Date du rendu de l'avis de l'État</td>   
                            <td><?php e(date("d/m/Y", strtotime(($avis->REP_ETAT_AVIS)))) ?></td>
                        </tr>
                        <tr>
                            <td>Date de la sollicitation de l'avis du Conseil régional</td>
                            <td><?php e(date("d/m/Y", strtotime(($avis->DEM_REG_AVIS)))) ?></td>
                        </tr>
                        <tr>
                            <td>Date du rendu de l'avis du Conseil régional</td>
                            <td><?php e(date("d/m/Y", strtotime(($avis->REP_REG_AVIS)))) ?></td>
                        </tr>
                        <tr>
                            <td>Date de la sollicitation de l'avis de l'ADEME</td>
                            <td><?php e(date("d/m/Y", strtotime(($avis->DEM_ADEME_AVIS)))) ?></td>
                        </tr>
                        <tr>
                            <td>Date du rendu de l'avis de l'ADEME</td>
                            <td><?php e(date("d/m/Y", strtotime(($avis->REP_ADEME_AVIS)))) ?></td>
                        </tr>
                        <tr>
                            <td>Points positifs</td>
                            <td><?php e($avis->PP_AVIS) ?></td>
                        </tr>
                        <tr>
                            <td>Points négatifs</td>
                            <td><?php e($avis->PP_AVIS) ?></td>
                        </tr>    
                        <tr>
                            <td>Date d'adoption du PCET</td>
                            <td><?php e(date("d/m/Y", strtotime(($avis->DATE_ADOPT_AVIS)))) ?></td>
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
                        <td>Diagnostic "Gaz à effet de serre"</td>
                        <td><?php e($diagnostic->GES_DIAG) ?></td>
                    </tr>
                    <tr>
                        <td>Consommation du territoire (<abbr title="kilotonne d'équivalent pétrole">ktep</abbr>)</td>
                        <td><?php e($diagnostic->CONSO_KTEP_T) ?></td>
                    </tr>
                    <tr>
                        <td>Émissions du territoire (<abbr title="tonne équivalent CO2">teq-CO2</abbr>)</td>
                        <td><?php e($diagnostic->EMIS_CO2_T) ?></td>
                    </tr>
                    <tr>
                        <td>Consommation "Patrimoine et compétence" (<abbr title="kilotonne d'équivalent pétrole">ktep</abbr>)</td>
                        <td><?php e($diagnostic->CONSO_KTEP_PC) ?></td>
                    </tr>
                    <tr>
                        <td>Émissions "Patrimoine et compétence" (<abbr title="tonne équivalent CO2">teq-CO2</abbr>)</td>
                        <td><?php e($diagnostic->EMIS_CO2_PC) ?></td>
                    </tr>   
                    <tr>
                        <td>Bilan <abbr title="Gaz à effets de serre" class="initialism">GES</abbr> Territorial</td>
                        <td><?php e($diagnostic->ID_GES_BILAN_T) ?></td>
                    </tr>  
                    <tr>
                        <td>Bilan <abbr title="Gaz à effets de serre" class="initialism">GES</abbr> "Patrimoine et Compétence"</td>
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
                        <td>Étude de vulnérabilité</td>   
                        <td>
                            <?php if($adaptation->VULNERABLE_ADAPT == '1'): ?>
                                    <?php echo "Oui"; ?>
                            <?php else: ?>
                                    <?php echo "Non"; ?>
                            <?php endif; ?>    
                        </td>    
                    </tr>
                    <tr> 
                        <td>Méthode employée</td>    
                        <td><?php e($adaptation->METHODE_ADAPT) ?></td>
                    </tr>                    
                    <tr>  
                        <td>Aléas identifiés</td>   
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
                <h4>Volet "Indicateurs & Actions"</h4>
            </a>
        </div>
        <div id="collapseSix" class="accordion-body collapse in">
            <div class="accordion-inner">
                <table class="table table-striped table-bordered">
                    <tr>
                        <td>Tableau des actions et des indicateurs</td>
                        <td>
                            <?php if($indicateur->TABLEAU_DE_BORD == '1'): ?>
                                    <?php echo "Oui"; ?>
                            <?php else: ?>
                                    <?php echo "Non"; ?>
                            <?php endif; ?> 
                        </td>
                    </tr>
                    <tr>
                        <td>Nombres d'indicateurs</td>
                        <td><?php e($indicateur->NB_TOTAL_INDICATEURS) ?></td>
                    </tr>
                    <tr>
                        <td>Nombres d'indicateurs quantitatifs</td>
                        <td><?php e($indicateur->NB_INDICATEURS_QT) ?></td>
                    </tr>
                    <tr>
                        <td>Nombres d'indicateurs qualitatifs</td>
                        <td><?php e($indicateur->NB_INDICATEURS_QL) ?></td>
                    </tr>
                    <tr>
                        <td>Nombres d'actions</td>
                        <td><?php e($indicateur->NB_TOTAL_ACTIONS) ?></td>
                    </tr>                    
                </table>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>