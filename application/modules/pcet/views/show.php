<div>
	<h1 class="page-header">Plans Climat-Énergie Territoriaux (PCET) en Pays de la Loire</h1>
        <h2>Identifiant du PCET : <?php e($pcet->ID_PCET) ?></h2>
</div><br />
<h3>Collectivité porteuse du PCET</h3>
<table class="table table-striped table-bordered">
    <tbody>
        <tr>
            <th>Type de collectivité</th>
            <td><?php e($structure->NOM_TYPE) ?></td>
        </tr>
        <tr>
            <th>Nom</th>
            <td><?php e($structure->Nom_Commune) ?><?php e($structure->Nom_Departement) ?><?php e($structure->NOM_EPCI) ?><?php e($structure->nom_pays) ?><?php e($structure->nom_pnr) ?></td>
        </tr>
        <tr>
            <th>D&eacute;partement</th>
            <td><?php e($structure->DEPARTEMENT_id)?></td>
        </tr>
        <tr>
            <th>Site web</th>
            <td><?php echo anchor($pcet->INTERNET_PCET, '<i class="icon-globe">&nbsp;</i>Consulter', 'target="_blank"'); ?></td>
        </tr>
    </tbody>
</table>
<div class="accordion" id="accordion2">
    <div class="accordion-group">
        <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                <h3>Informations sur le PCET</h3>
            </a>
        </div>
        <div id="collapseOne" class="accordion-body collapse in">
            <div class="accordion-inner">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <th>Statut</th>
                            <td><?php e($pcet->STATUT_PCET) ?></td>
                        </tr>
                        <tr>
                            <th>État d'avancement</th>
                            <td><?php e($phase->NOM_PHASE) ?></td>
			</tr>
                        <tr>		
                            <th>Commentaires</th>
                            <td><?php e($pcet->ETAT_PCET) ?></td>
			</tr>
                        <tr>
                            <th>Contrat ADEME</th>
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
                            <th>Type de contrat</th>
                            <td><?php e($pcet->TYPE_CONTRAT_ADEME_PCET) ?></td>
			</tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php if($avis): ?>
    <div class="accordion-group">
        <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
                <h3>Avis sur le PCET</h3>
            </a>
        </div>
        <div id="collapseThree" class="accordion-body collapse">
            <div class="accordion-inner">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <th>Date de la sollicitation de l'avis de l'État</th>
                            <td><?php e(date("d/m/Y", strtotime(($avis->DEM_ETAT_AVIS)))) ?></td>
                        </tr>
                        <tr>        
                            <th>Date du rendu de l'avis de l'État</th>   
                            <td><?php e(date("d/m/Y", strtotime(($avis->REP_ETAT_AVIS)))) ?></td>
                        </tr>
                        <tr>
                            <th>Date de la sollicitation de l'avis du Conseil régional</th>
                            <td><?php e(date("d/m/Y", strtotime(($avis->DEM_REG_AVIS)))) ?></td>
                        </tr>
                        <tr>
                            <th>Date du rendu de l'avis du Conseil régional</th>
                            <td><?php e(date("d/m/Y", strtotime(($avis->REP_REG_AVIS)))) ?></td>
                        </tr>
                        <tr>
                            <th>Date de la sollicitation de l'avis de l'ADEME</th>
                            <td><?php e(date("d/m/Y", strtotime(($avis->DEM_ADEME_AVIS)))) ?></td>
                        </tr>
                        <tr>
                            <th>Date du rendu de l'avis de l'ADEME</th>
                            <td><?php e(date("d/m/Y", strtotime(($avis->REP_ADEME_AVIS)))) ?></td>
                        </tr>
                        <tr>
                            <th>Points positifs</th>
                            <td><?php e($avis->PP_AVIS) ?></td>
                        </tr>
                        <tr>
                            <th>Points négatifs</th>
                            <td><?php e($avis->PN_AVIS) ?></td>
                        </tr>    
                        <tr>
                            <th>Date d'adoption du PCET</th>
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
                <h3>Volet "Diagnostic"</h3>
            </a>
        </div>
        <div id="collapseFour" class="accordion-body collapse">
            <div class="accordion-inner">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>Diagnostic "Gaz à effet de serre"</th>
                        <td><?php e($diagnostic->GES_DIAG) ?></td>
                    </tr>
                    <tr>
                        <th>Consommation du territoire (<abbr title="kilotonne d'équivalent pétrole">ktep</abbr>)</th>
                        <td><?php e($diagnostic->CONSO_KTEP_T) ?></td>
                    </tr>
                    <tr>
                        <th>Émissions du territoire (<abbr title="tonne équivalent CO2">teq-CO2</abbr>)</th>
                        <td><?php e($diagnostic->EMIS_CO2_T) ?></td>
                    </tr>
                    <tr>
                        <th>Consommation "Patrimoine et compétence" (<abbr title="kilotonne d'équivalent pétrole">ktep</abbr>)</th>
                        <td><?php e($diagnostic->CONSO_KTEP_PC) ?></td>
                    </tr>
                    <tr>
                        <th>Émissions "Patrimoine et compétence" (<abbr title="tonne équivalent CO2">teq-CO2</abbr>)</th>
                        <td><?php e($diagnostic->EMIS_CO2_PC) ?></td>
                    </tr>   
                    <tr>
                        <th>Bilan <abbr title="Gaz à effets de serre" class="initialism">GES</abbr> Territorial</th>
                        <td><?php e($diagnostic->ID_GES_BILAN_T) ?></td>
                    </tr>  
                    <tr>
                        <th>Bilan <abbr title="Gaz à effets de serre" class="initialism">GES</abbr> "Patrimoine et Compétence"</th>
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
                <h3>Volet "Adaptation"</h3>     
            </a>   
        </div>   
        <div id="collapseFive" class="accordion-body collapse">    
            <div class="accordion-inner">    
                <table class="table table-striped table-bordered">  
                    <tr>   
                        <th>Étude de vulnérabilité</th>   
                        <td>
                            <?php if($adaptation->VULNERABLE_ADAPT == '1'): ?>
                                    <?php echo "Oui"; ?>
                            <?php else: ?>
                                    <?php echo "Non"; ?>
                            <?php endif; ?>    
                        </td>    
                    </tr>
                    <tr> 
                        <th>Méthode employée</th>    
                        <td><?php e($adaptation->METHODE_ADAPT) ?></td>
                    </tr>                    
                    <tr>  
                        <th>Aléas identifiés</th>   
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
                <h3>Volet "Indicateurs & Actions"</h3>
            </a>
        </div>
        <div id="collapseSix" class="accordion-body collapse">
            <div class="accordion-inner">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>Tableau des actions et des indicateurs</th>
                        <td>
                            <?php if($indicateur->TABLEAU_DE_BORD == '1'): ?>
                                    <?php echo "Oui"; ?>
                            <?php else: ?>
                                    <?php echo "Non"; ?>
                            <?php endif; ?> 
                        </td>
                    </tr>
                    <tr>
                        <th>Nombres d'indicateurs</th>
                        <td><?php e($indicateur->NB_TOTAL_INDICATEURS) ?></td>
                    </tr>
                    <tr>
                        <th>Nombres d'indicateurs quantitatifs</th>
                        <td><?php e($indicateur->NB_INDICATEURS_QT) ?></td>
                    </tr>
                    <tr>
                        <th>Nombres d'indicateurs qualitatifs</th>
                        <td><?php e($indicateur->NB_INDICATEURS_QL) ?></td>
                    </tr>
                    <tr>
                        <th>Nombres d'actions</th>
                        <td><?php e($indicateur->NB_TOTAL_ACTIONS) ?></td>
                    </tr>                    
                </table>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>