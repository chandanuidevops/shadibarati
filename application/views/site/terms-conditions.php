<!DOCTYPE html>
<html lang="en">

<head>

    <?php
    $seo = seo();
    $m_titl = '';
    $m_descp = '';
    $m_key = '';
    $m_can = '';

    if (!empty($seo[0])) {
        foreach ($seo as $key => $value) {
            $pages = strtolower($value->page);
            if($pages== 'terms-conditions' || $pages == 'Terms-Conditions' || $pages == 'Terms & Conditions' || $pages == 'terms-&-conditions' || $pages == 'terms & conditions' || $pages == 'Terms & Conditions' || $pages == 'Terms and Conditions' || $pages == 'terms and conditions'){
                $m_titl     = $value->title;
                $m_descp    = $value->m_desc;
                $m_key      = $value->keywords;
                $m_can      = $value->can_link; 
                $m_description = $value->description; 
                
            }
        }
    }
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="<?php echo $m_descp ?>" />
    <link rel="canonical" href="<?php echo current_url(); ?>" />
    <meta name="keywords" content="<?php echo $m_key ?>" />
    <meta name="p:domain_verify" content="14689d3a8168f4758e45146daa554c8b"/>
    <title><?php echo $m_titl ?> | Shaadi Baraati</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/slick/slick.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
     <?php $this->load->view('includes/favicon.php');  ?>
     <style>
         .term-blt li {
    padding: 5px 0;
    font-size: 14px;
}
.trsection strong {
    font-weight: 600;
}

.trsection ul li {
    list-style-type: disc;
}
     </style>
</head>

<body >
   
<div id="demo">
        <?php $this->load->view('includes/header.php'); ?>
        
        <section class="contact-back sec">
            <div class="row">
                <div class="col l12 s12">
                    <div class="banner-up ">
                        <h5 class="white-text">Terms & Conditions</h5>
                    </div>
                </div>
            </div>
        </section>
    <section class="trsection">
        <div class="container-fluide">
                <h5 >Terms & Conditions : Baraati Media & Entertainment Pvt Ltd </h5>
                <p>Welcome to ShaadiBaraati.com. These are the terms and conditions governing your use of the Site ("herein after referred to as Acceptable Usage Policy "AUP"). By accessing ShaadiBaraati.com either through the website or any other electronic device, you acknowledge, accept and agree to the following terms of the AUP, which are designed to make sure that ShaadiBaraati.com works for everyone. This AUP is effective from the time you log in to ShaadiBaraati.com, By accepting this AUP, you are also accepting and agreeing to be bound by the Privacy Policy and the Listing Policy. ​</p>
                
                <p class="tcheading">Using ShaadiBaraati.com</p>
                <p>You agree and understand that ShaadiBaraati.com is an internet enabled electronic platform that facilitates communication for the purposes of advertising and distributing information pertaining to goods and or services. You further agree and understand that we do not endorse, market or promote any of the listings, postings or information, nor do we at any point in time come into possession of or engage in the distribution of any of the goods and/ or services, you have posted, listed or provided information about on our site. While interacting with other users on our site, with respect to any listing, posting or information we strongly encourage you to exercise reasonable diligence as you would in traditional off line channels and practice judgment and common sense before committing to or complete intended sale, purchase of any goods or services or exchange of information.</p>
                <p>While making use of ShaadiBaraati.com classifieds and other services such as the discussion forums, comments and feedback and other services interalia, you will post in the appropriate category or area and you agree that your use of the Site shall be strictly governed by this AUP including the policy for listing of your Classified which shall not violate the prohibited and restricted items policy (herein after referred to as the Listing Policy.) (Listing Policy) The listing policy shall be read as part of this AUP and is incorporated in this AUP by way of reference: </p>
                <p>"Your Information" is defined as any information you provide to us or other users of the Site during the registration, posting, listing or replying process of classifieds, in the feedback area (if any), through the discussion forums or in the course of using any other feature of the Services. You agree that you are the lawful owner having all rights, title and interest in your information, and further agree that you are solely responsible and accountable for Your Information and that we act as a mere platform for your online distribution and publication of Your Information.</p>

                <p class="m0">You agree that your listing, posting and / or Information :    </p>
                <ul>
                    <li>shall "not be fraudulent, misrepresent, mislead or pertain to the sale of any illegal, counterfeit, stolen goods and / or services;</li>
                    <li>shall not pertain to goods , services of which you are not the lawful owner or you do not have the authority or consent to 'list' which do not belong to you or you do not have the authority for;</li>
                    <li>shall not infringe any intellectual property, trade secret, or other proprietary right or rights of publicity or privacy of any third party;</li>
                    <li>shall not consist of material that is an expression of bigotry, racism or hatred based on age, gender, race, religion, caste, class, lifestyle preference, and nationality and / or is in the nature of being derogatory, slanderous to any third party;</li>
                    <li>shall not be obscene, contain pornography or contain "indecent representation of women" within the meaning of the Indecent Representation of Women (Prohibition) Act, 1986.</li>
                    <li>shall not distribute or contain spam, multiple / chain letters, or pyramid schemes in any of its forms;</li>
                    <li>shall not distribute viruses or any other technologies that may harm ShaadiBaraati.com or the interests or property of ShaadiBaraati.com users or impose an unreasonable load on the infrastructure or interfere with the proper working of ShaadiBaraati.com;</li>
                    <li>shall not, directly or indirectly, offer, attempt to offer, trade or attempt to trade in any goods and services, the dealing of which is prohibited or restricted in any manner under the provisions of any applicable law, rule, regulation or guideline for the time being in force.</li>
                    <li>shall not be placed in a wrong category or in an incorrect area of the site;</li>
                    <li>shall not be placed in any other ShaadiBaraati.com site except on the site that relates to the city in which you are located;</li>
                    <li>shall not list or post or pertain to information that is either prohibited or restricted under the laws of the Republic of India and such listing, posting or information shall not violate ShaadiBaraati's Listing Policy.</li>
                </ul>

                <p class="tcheading">Eligibility</p>
                <p>Use of <a href="//www.shaadibaraati.com">www.shaadibaraati.com</a> either by registration or by any other means, is available only to persons, who are Citizens of the Republic of India, who are 18 yrs of age and above and persons who can enter into a legally binding contract, and or are not barred by any law for the time being in force. If you access ShaadiBaraati.com, either by registration on the Site or by any other means, not as an individual but on behalf of a legal entity, you represent that you are fully authorized to do so and the listing, posting or information placed on the site on behalf of the legal entity is your responsibility and you agree to be accountable for the same to other users of the Site.</p>

                <p class="tcheading">Abuse of Shaadi Baraati</p>
                <p>You agree to inform us if you come across any listing or posting that is offensive or violates our listing policy or infringes any intellectual property rights to <a href="mailto:info@shaadibaraati.com">info@shaadibaraati.com</a>, this will enable us to keep the site working efficiently and in a safe manner. We reserve the right to take down any posting, listing or information and or limit or terminate our services and further take all reasonable technical and legal steps to prevent the misuse of the Site in keeping with the letter and spirit of this AUP and the listing policy. In the event you encounter any problems with the use of our site or services you are requested to report the problem to <a href="mailto:info@shaadibaraati.com">info@shaadibaraati.com</a>.</p>
                
                <p class="tcheading">Violations by User</p>
                <p>You agree that in the event your listing, posting or your information violates any provision of this AUP or the listing policy, we shall have the every right to terminate and or suspend your membership of the Site and refuse to provide you or any person acting on your behalf, access to the Site.</p>
                

                <p class="tcheading">Content</p>
                <p>The Site contains content that includes Your Information, ShaadiBaraati.com information and information from other users. You agree not to copy, modify, or distribute such content (other than Your Information), ShaadiBaraati's copyrights or trademarks. When you give us any content as part of Your Information, you are granting us a non-exclusive, worldwide, perpetual, irrevocable, royalty-free, sub-licensable right and license to use, reproduce, , publish, translate, distribute, perform and display such content (in whole or part) worldwide through the Site as well as on any of our affiliates or partners websites, publications and mobile platform. We need these rights with respect to the content in Your Information in order to host and display your content. If you believe that there is a violation, please notify to <a href="mailto:info@shaadibaraati.com">info@shaadibaraati.com</a></p>
                

                <p class="tcheading">Liability</p>
                <p>You agree not to hold www.shaadibaraati.com or any of its officers, employees, agents responsible or accountable for any of your listing, postings or information and nor shall we, our officers, employees or agents be liable for any misuse, illegal activity or third party content as most postings,listings or information are generated by various users directly and we do not have any role in the creation, publication or distribution of the posting, listing or information, nor are we in a position to have editorial control over the substance or content contained in the listings, postings, or information, save and except to the extent provided in Sec 3 above.</p>
                <p>You understand and agree that we do not guarantee the accuracy or legitimacy of any listing, posting, and information by other users. You further agree that we are not liable for any loss of money, goodwill, or reputation, or any special, indirect, or consequential damages arising out of your use of the site or as a result of any sale, purchase of goods and services with other users of the site. We also cannot guarantee continuous or secure access to our Services. Accordingly, to the extent legally permitted, we exclude all implied warranties, of merchant ability, fitness or quality of the Site and our services.</p>

                <p class="tcheading">Personal Information</p>
                <p>By using Shaadibaraati.com, you agree to the collection, transfer, storage and use of any personal information provided by you on the Site by Shaadibaraati. We may update this AUP or the listing policy at any time and may notify you of such updates via a post on the boards and /or through email communications. The modified AUP and /or Listing Policy shall come into effect either at the time you place your next posting, listing or information on the Site or after a period of 30 days from the date of the update, whichever is sooner. If we or our corporate affiliates are involved in a merger or acquisition, we may share personal information with another company, but this AUP shall continue to apply.</p>


                <p class="tcheading">Third Party Content and Services</p>
                <p>ShaadiBaraati.com may provide, on its site, links to sites operated by other entities. If the user decides to view this site, they shall do so at their own risk, subject to that site's terms and conditions of use and privacy policy that may be different from those of this site. It is the user's responsibility to take all protective measures to guard against viruses or other destructive elements they may encounter on these sites. Shaadi Baraati makes no warranty or representation regarding, and do not endorse any linked website or the information appearing thereon or any of the products or services described thereon.</p>
                <p>Further, user's interactions with organizations and/or individuals found on or through the service, including payment and delivery of goods and services, and any other terms, conditions, warranties or representations associated with such dealings, are solely between the user and such organization and/or individual. The user should make whatever investigation they feel necessary or appropriate before proceeding with any offline or online transaction with any of these third parties.</p>
                

                <p class="tcheading">Third Party Content and Services</p>
                <p>The User agrees to indemnify and hold Shaadi Baraati, its officers, subsidiaries, affiliates, successors, assigns, directors, officers, agents, service providers, suppliers and employees, harmless from any claim or demand, including reasonable attorney fees and court costs, made by any third party due to or arising out of content submitted by the user, users use of the service, breach by the user of any of the representations and warranties herein, or user's violation of any rights of another.</p>

                <p class="tcheading">Applicable law</p>
                <p>This site is created and controlled by <b>Baraati Media & Entertainment Pvt Ltd.</b> The laws of India shall apply and courts in Bengaluru shall have jurisdiction in respect of all the terms, conditions and disclaimers.</p>
                
                <p class="tcheading">Force Majeure</p>
                <p>Shaadibaraati.com shall have no liability to the user for any interruption or delay, to access the Site irrespective of the cause.</p>
                
                <p class="tcheading">Entire Agreement</p>
                <p>This Terms of Service constitute the entire agreement between the parties with respect to the subject matter hereof and supersedes and replaces all prior or contemporaneous understandings or agreements, written or oral, regarding such subject matter. The clauses as above shall survive the termination or expiry of this agreement.</p>

                
        
            <h5 class="tcheading" >Terms & Conditions – Paid Vendors </h5>
            <p> <strong>Shaadi Baraati</strong> is a division of <strong>Baraati Media & Entertainment Pvt Ltd.</strong> Shaadi Baraati provides information & assistance to Vendor in providing leads of Shaadi Baraati customers for marriage related services. The condition for opting services of Shaadi Baraati is mentioned herein below: ​</p>
            <ul class="term-blt">
                <li><strong>Eligibility -</strong> Vendor is engaged in the business of providing Matrimonial Services and has agreed to provide service for the Leads from Shaadi Baraati.</li>
                <li>Customer information shall be provided to the Vendor(s) by way of shared Lead(s). There is no exclusivity in providing Lead(s). </li>
                <li>Lead feedback from the Vendor is to be submitted to Shaadi Baraati within 24 hours.</li>
                <li>The Vendor(s) shall pay advance as may be mutually agreed with ShaadiBaraati.com.</li>
                <li>The Vendor shall pay the agreed commission to Shaadibaraati.com once the Vendor closes the deal with the Customer. The amount of commission shall be deducted from the Advance provided and the Vendor shall pay the balance it any to Shaadi Baraati within 3 (three) working days of the intimation of the balance outstanding.</li>
                <li><strong>Invoicing:</strong> Shaadi Baraati will raise an invoice for the l commission for the converted leads on monthly basis to the Vendor(s). </li>
                <li>Once the Advance amount is fully deducted, the Vendor shall provide further Advance amount in respect of leads as agreed mutually between the parties. </li>
                <li>SB shall have the right to conduct surprise inspections in respect of the Mandapam (s) to check on the leads provided by SB which has been converted into business between the Vendor and the Customer </li>
                <li>SB shall have the right to conduct surprise inspections in respect of the Mandapam (s) to check on the leads provided by SB which has been converted into business between the Vendor and the Customer </li>
                <li>Vendor(s) are required to exercise due care and caution while interacting with the customer and satisfy themselves before they agree to provide services to the customer. </li>
                <li>Vendor(s) are required to exercise due care and caution while interacting with the customer and satisfy themselves before they agree to provide services to the customer. </li>
                <li>If Baraati Media & entertainment Pvt Ltd receive feedback/ complaints against Vendor(s) service, then Baraati Media & Entertainment Pvt Ltd. shall have the right to remove the Vendor(s) from the Lead shared list and shall not deal with such Vendor(s).</li>
                <li><strong>Policy -</strong> Baraati Media & Entertainment Pvt Ltd has the right to change its terms and conditions without notice to the Vendor(s).</li>
                <li><strong>Taxes:-</strong> Taxes including GST and Deduction of tax at source shall be applicable at applicable rates as on date.</li>
                <li><strong>Relation between parties -</strong> Each party shall be and act as an independent contractor and not as partner, joint venture, or agent of the other. </li>
                <li><strong>Confidential Information- </strong> The term "Confidential Information" means all know-how, methods, financial, business, technical information, Customer information disclosed by or for a party, but not including any information the Vendor(s) can demonstrate is (a) was furnished to it without restriction by a third party, (b) generally available in public without breach of these terms or (c) independently developed by it without reliance on such information. Except for the specific rights granted by this Agreement, the Vendor(s) shall not possess access, use or disclose any of Baraati Media & Entertainment Pvt Ltd Confidential Information without its prior written consent, and shall use reasonable care to protect the Confidential Information. . Promptly after any termination of these terms Vendor(s) shall return the Confidential Information, records and materials to Baraati Media & Entertainment Pvt Ltd. </li> 
                <li><strong>Limitation of Liability -</strong> In no event will Baraati Media & Entertainment Pvt Ltd. be liable to the Vendor(s) in               connection with these terms for a) any indirect, consequential, incidental, punitive; exemplary or special losses, whether arising in agreement, tort or otherwise; b) loss of data/programs, loss of profits or revenue, loss of anticipated savings or loss of goodwill, even if such losses or damages were reasonably foreseeable or where Baraati Media & Entertainment Pvt Ltd. has been advised of the possibility of such losses or damages.</li>
                <li><strong>Refund- </strong> The advance payment made to Baraati Media & Entertainment Pvt Ltd. towards Any package is treated as no refundable. Payments once made cannot be assigned to any person/Party or adjusted towards any other service</li>
                <li><strong>Termination-</strong>  No Termination once activated from either side for termination of this agreement.</li>
                <li><strong>Indemnity-</strong> The Vendor shall indemnify and keep indemnified Baraati Media & Entertainment Pvt Ltd. against all loss, damages, and claims, actions that are initiated against Baraati Media & Entertainment Pvt Ltd. for any act or omission by Vendor to (i) leads shared by Baraati Media & Entertainment Pvt Ltd. ; (ii) for breach of confidentiality of these terms and Customer information; (iv) for breach of applicable law. </li>
                <li><strong>Jurisdiction and Dispute Resolution -</strong>  Any disputes arising out of or in connection with this agreement, during its subsistence and after its termination in any manner whatsoever, including the validity of this Agreement shall be referred to arbitration of a sole arbitrator nominated by the Baraati Media & Entertainment Pvt Ltd. to the dispute in accordance with the provisions contained in the Arbitration and Conciliation Act, 1996 or any amendment made thereto. The place of Arbitration shall be Bengaluru and the language of Arbitration shall be English. The decision of the arbitrator shall be final and binding on the parties.</li>
            </ul>

        </div>
    </section>

    <?php    
        if (!empty($m_description)) { ?>
        <section class="result-body conts p0" style="border-top: 1px solid #e3e3e3;">
            <div class="container-2">
                <div class="row m0">
                    <div class="col l11 m12 s12">
                        <?php echo (!empty($m_description))?$m_description:''; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php } ?>
 

        <?php $this->load->view('includes/footer'); ?>
   </div>
    <!-- script -->
    <script src="<?php echo base_url()?>assets/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/vue.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/axios.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/script.js"></script>

      <script>
    var demo = new Vue({
        el: '#demo',
        data: {
            email: '',
            emailError: '',
           
        },

        methods: {
            // mobile number check on database
            // email check on database
            emailCheck() {
                this.emailError = '';
                const formData = new FormData();
                formData.append('email', this.email);
                axios.post('<?php echo base_url() ?>home/emailcheck', formData)
                    .then(response => {
                        if (response.data == '1') {
                            this.emailError = 'You are already subscribed.';
                        } else {
                            this.emailError = '';
                        }
                    })
                    .catch(error => {
                        if (error.response) {
                            this.errormsg = error.response.data.error;
                        }
                    })
            },
            checkForm() {
                if (this.emailError == '') {


                    this.$refs.form.submit()
                } else {}
            }
        },
    });



    
    </script>

    
</body>

</html>