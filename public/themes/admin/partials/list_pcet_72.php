                    <?php if(isset($pcets)): ?>
                        <?php echo form_dropdown('indicateur_ID_PCET',$pcets,set_value('indicateur_ID_PCET', isset($pcets['ID_PCET']) ? $pcets['ID_PCET'] : ''),'Sélectionner un PCET');?>
                    <?php else: ?>
                        <div class="control-group">
                            <div class='controls'>
                                <a href="<?php echo site_url(SITE_AREA .'/sarthe/pcet/create') ?>" class="btn" type="button">Ajouter un PCET</a>
                                <span class='help-inline'>si aucun PCET n'a pas été saisi pour ce département.</span>
                            </div>
                        </div>                    
                    <?php endif; ?>
