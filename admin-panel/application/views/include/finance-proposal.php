<?php $this->ci =& get_instance();

?>

<div class="row ">
                           <div class="col l3 m6 s12 p0">
                              <a href="<?php echo base_url('finance/new-proposal') ?>">
                                 <div class="list-dashboard white  z-depth-0 <?php echo ($this->uri->segment(2) == 'new-proposal')?'green-active':''; ?>" >
                                    <p class="para-p1 m0 center-align grey-text">New Proposal (<?php echo count($this->ci->preload->newProposal()) ?>)</p>
                                 </div>
                              </a>
                           </div>
                           <div class="col l2 m6 s12 p0">
                              <a href="<?php echo base_url('finance/all-proposal') ?>">
                                 <div class="list-dashboard white z-depth-0 <?php echo ($this->uri->segment(2) == 'all-proposal')?'green-active':''; ?>">
                                    <p class="para-p1 grey-text m0 center-align">All Proposal (<?php echo count($this->ci->preload->allProposal()) ?>)</p>
                                 </div>                                 
                              </a>
                           </div>
                           <div class="col l3 m6 s12 p0">
                             <a href="<?php echo base_url('finance/approved-proposal') ?>">
                                 <div class="list-dashboard white z-depth-0 <?php echo ($this->uri->segment(2) == 'approved-proposal')?'green-active':''; ?>" >
                                    <p class="para-p1 grey-text m0 center-align">Approved (<?php echo count($this->ci->preload->approvedProposal()) ?>)</p>
                                 </div>
                              </a>
                           </div>
                           <div class="col l2 m6 s12 p0">
                           <a href="<?php echo base_url('finance/rejected-proposal') ?>">
                                 <div class="list-dashboard white z-depth-0 <?php echo ($this->uri->segment(2) == 'rejected-proposal')?'green-active':''; ?>">
                                    <p class="para-p1 grey-text m0 center-align">Rejected (<?php echo count($this->ci->preload->rejectProposal()) ?>)</p>
                                 </div>
                              </a>
                           </div>
                           
                           <!-- <div class="col l2 m6 s12 p0">
                              <a href="<?php echo base_url('finance/cleared-proposal') ?>">
                                 <div class="list-dashboard white z-depth-0 <?php echo ($this->uri->segment(2) == 'cleared-proposal')?'green-active':''; ?>">
                                    <p class="para-p1 grey-text m0 center-align">Payment cleared (<?php echo count($this->ci->preload->payProposal()) ?>)</p>
                                 </div>                                 
                              </a>
                           </div> -->
                           <div class="col l2 m6 s12 p0">
                              <a href="<?php echo base_url('finance/live-proposal') ?>">
                                 <div class="list-dashboard white z-depth-0 <?php echo ($this->uri->segment(2) == 'live-proposal')?'green-active':''; ?>">
                                    <p class="para-p1 grey-text m0 center-align">Live (<?php echo count($this->ci->preload->liveProposal()) ?>)</p>
                                 </div>                                 
                              </a>
                           </div>
                           
                        </div>