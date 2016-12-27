<?php

/*-----------------------------------------------------------------------------------*/
/*	 [packages] Shortcode
/*-----------------------------------------------------------------------------------*/

function randgroupPackages($atts, $content = null) {
	extract(shortcode_atts(array(
		"type" => 'email',
		"style" => 'table',
		"headline" => 'Select Your Business Email Package',
	), $atts));

	// buffer output
	ob_start();

	if ($size != 'short') {

	}

	// style
	if ($style == 'grid') {

		?>

	</div><!-- break pf content -->
</div><!-- break span8-->




	<style>
	.accordion-heading .accordion-toggle {
		background-color: #ddd;
	}
	.accordion-heading a.accordion-toggle {
		color: #555;
	}
	.accordion-heading .accordion-toggle:hover {
		background-color: #057CCF;
	}
	.accordion-heading a.accordion-toggle:hover {
		color: #fff;
	}
	.label h5 {
		font-size: 20px;
	}
	</style>

	<div class="row-fluid">
		<div class="span12">
			<h2><?php echo $headline; ?></h2>
		</div>
	</div>
	<div class="row-fluid">

		<div class="span4">
			<span class="text-center label" style="width:98%;"><h5>Rand Group<br/> Essentials</h5></span>

			<div class="accordion" id="package1">
				  <div class="accordion-group">
					<div class="accordion-heading">
					  <a class="accordion-toggle" data-toggle="collapse" data-parent="#package1" href="#Email1">
						  Email &amp; Infrastructure
					  </a>
					</div>
					<div id="Email1" class="accordion-body collapse in">
					  <div class="accordion-inner">

						<label class="checkbox">
						<input type="checkbox" checked disabled> <a href="" data-toggle="tooltip" title="Powered by Microsoft">Unlimited Email</a>
						</label>
						<label class="checkbox">
						<input type="checkbox" checked disabled> <a href="" data-toggle="tooltip" title="Fine print goes here">Unlimited Cloud Storage</a>
						</label>
						<label class="checkbox">
						<input type="checkbox" checked disabled> Anti-Virus
						</label>
						<label class="checkbox">
						<input type="checkbox" checked disabled> Anti-Malware
						</label>
						<label class="checkbox">
						<input type="checkbox" checked disabled> Spam filtering
						</label>
						<label class="checkbox">
						<input type="checkbox" checked disabled> Advanced Threat Protection
						</label>
						<label class="checkbox">
						<input type="checkbox" checked disabled> Advanced Meeting Scheduling
						</label>
						<label class="checkbox">
						<input type="checkbox" checked disabled> Unlimited Data Storage
						</label>
						<label class="checkbox">
						<input type="checkbox" checked disabled> Single Sign On for up to 2007 applications
						</label>
						<label class="checkbox">
						<input type="checkbox" checked disabled> Email and Document Rights Management
						</label>
						<label class="checkbox">
						<input type="checkbox" checked disabled> Mobile Device and Application Management
						</label>
						<label class="checkbox">
						<input type="checkbox" checked disabled> Self Service Password Reset
						</label>
						<label class="checkbox">
						<input type="checkbox" checked disabled> Internal Social Media Platform
						</label>
						<label class="checkbox">
						<input type="checkbox" checked disabled> Instant Messaging
						</label>
						<label class="checkbox">
						<input type="checkbox" checked disabled> Online Meetings
						</label>
						<label class="checkbox">
						<input type="checkbox" checked> Email Migration
						</label>
						<label class="checkbox">
						<input type="checkbox"> Account and Email Setup and Configuration
						</label>
						<label class="checkbox">
						<input type="checkbox"> Unlimited Training & Support
						</label>
						<label class="checkbox">
						<input type="checkbox"> Online Support Portal
						</label>
						<label class="checkbox">
						<input type="checkbox"> Managed Services
						</label>
						<label class="checkbox">
						<input type="checkbox"> Unlimited Cloud File Backup
						</label>
						<label class="checkbox">
						<input type="checkbox"> Unlimited Server Recovery
						</label>
						<label class="checkbox">
						<input type="checkbox"> Server Performance Optimization
						</label>
						<label class="checkbox">
						<input type="checkbox"> Application Performance Optimization
						</label>



					  </div>
					</div>
				  </div>
				</div>

			<a class="btn-danger btn btn-large btn-block" href="#sendMessage" data-target="#sendMessage" data-toggle="modal"></i> Request a Quote</a>

		</div>


		<div class="span4">
			<span class="text-center label label-inverse" style="width:98%;"><h5>Rand Group<br/> Growth</h5></span>

			<div class="accordion" id="package2">
			  <div class="accordion-group">
				<div class="accordion-heading">
				  <a class="accordion-toggle" data-toggle="collapse" data-parent="#package2" href="#Email">
					Email &amp; Infrastructure
				  </a>
				</div>
				<div id="Email" class="accordion-body collapse in">
				  <div class="accordion-inner">

					<label class="checkbox">
					<input type="checkbox" checked disabled> <a href="" data-toggle="tooltip" title="Powered by Microsoft">Unlimited Email</a>
					</label>
					<label class="checkbox">
					<input type="checkbox" checked disabled> <a href="" data-toggle="tooltip" title="Fine print goes here">Unlimited Cloud Storage</a>
					</label>
					<label class="checkbox">
					<input type="checkbox" checked disabled> Anti-Virus
					</label>
					<label class="checkbox">
					<input type="checkbox" checked disabled> Anti-Malware
					</label>
					<label class="checkbox">
					<input type="checkbox" checked disabled> Spam filtering
					</label>
					<label class="checkbox">
					<input type="checkbox" checked disabled> Advanced Threat Protection
					</label>
					<label class="checkbox">
					<input type="checkbox" checked disabled> Advanced Meeting Scheduling
					</label>
					<label class="checkbox">
					<input type="checkbox" checked disabled> Unlimited Data Storage
					</label>
					<label class="checkbox">
					<input type="checkbox" checked disabled> Single Sign On for up to 2007 applications
					</label>
					<label class="checkbox">
					<input type="checkbox" checked disabled> Email and Document Rights Management
					</label>
					<label class="checkbox">
					<input type="checkbox" checked disabled> Mobile Device and Application Management
					</label>
					<label class="checkbox">
					<input type="checkbox" checked disabled> Self Service Password Reset
					</label>
					<label class="checkbox">
					<input type="checkbox" checked disabled> Internal Social Media Platform
					</label>
					<label class="checkbox">
					<input type="checkbox" checked disabled> Instant Messaging
					</label>
					<label class="checkbox">
					<input type="checkbox" checked disabled> Online Meetings
					</label>
					<label class="checkbox">
					<input type="checkbox" checked> Email Migration
					</label>
					<label class="checkbox">
					<input type="checkbox" checked> Account and Email Setup and Configuration
					</label>
					<label class="checkbox">
					<input type="checkbox" checked> Unlimited Training & Support
					</label>
					<label class="checkbox">
					<input type="checkbox" checked> Online Support Portal
					</label>
					<label class="checkbox">
					<input type="checkbox" checked> Managed Services
					</label>
					<label class="checkbox">
					<input type="checkbox" checked> Unlimited Cloud File Backup
					</label>
					<label class="checkbox">
					<input type="checkbox" checked> Unlimited Server Recovery
					</label>
					<label class="checkbox">
					<input type="checkbox" checked> Server Performance Optimization
					</label>
					<label class="checkbox">
					<input type="checkbox" checked> Application Performance Optimization
					</label>



				  </div>
				</div>
			  </div>

			  <div class="accordion-group">
				<div class="accordion-heading">
				  <a class="accordion-toggle" data-toggle="collapse" data-parent="#package2" href="#Collaboration">
					Collaboration
				  </a>
				</div>
				<div id="Collaboration" class="accordion-body collapse">
				  <div class="accordion-inner">

					<label class="checkbox">
					<input type="checkbox" checked> Intranet Site Set Up
					</label>
					<label class="checkbox">
					<input type="checkbox" checked> Department-specific Collaboration Sites
					</label>
					<label class="checkbox">
					<input type="checkbox" checked> Real Time Co-Authoring of Documents
					</label>
					<label class="checkbox">
					<input type="checkbox" checked> Companywide Document Governance
					</label>

				  </div>
				</div>
			  </div>

			  <div class="accordion-group">
				<div class="accordion-heading">
				  <a class="accordion-toggle" data-toggle="collapse" data-parent="#package2" href="#Automation">
					Process Automation
				  </a>
				</div>
				<div id="Automation" class="accordion-body collapse">
				  <div class="accordion-inner">

					<label class="checkbox">
					<input type="checkbox" checked> Human Resources Onboarding
					</label>
					<label class="checkbox">
					<input type="checkbox" checked> Vendor Onboarding
					</label>
					<label class="checkbox">
					<input type="checkbox" checked> Customer Onboarding
					</label>
					<label class="checkbox">
					<input type="checkbox" checked> Sales Tax Automation
					</label>
					<label class="checkbox">
					<input type="checkbox" checked> Supply Chain Management
					</label>

				  </div>
				</div>
			  </div>

			</div>

			<a class="btn-danger btn btn-large btn-block" href="#sendMessage" data-target="#sendMessage" data-toggle="modal"></i> Request a Quote</a>


		</div><!-- span4 -->


		<div class="span4">
			<span class="text-center label label-success" style="width:98%;"><h5>Rand Group<br/> Success</h5></span>
			<div class="accordion" id="package3">

				  <div class="accordion-group">
					<div class="accordion-heading">
					  <a class="accordion-toggle" data-toggle="collapse" data-parent="#package3" href="#Email3">
						Email &amp; Infrastructure
					  </a>
					</div>
					<div id="Email3" class="accordion-body collapse in">
					  <div class="accordion-inner">

						<label class="checkbox">
						<input type="checkbox" checked disabled> <a href="" data-toggle="tooltip" title="Powered by Microsoft">Unlimited Email</a>
						</label>
						<label class="checkbox">
						<input type="checkbox" checked disabled> <a href="" data-toggle="tooltip" title="Fine print goes here">Unlimited Cloud Storage</a>
						</label>
						<label class="checkbox">
						<input type="checkbox" checked disabled> Anti-Virus
						</label>
						<label class="checkbox">
						<input type="checkbox" checked disabled> Anti-Malware
						</label>
						<label class="checkbox">
						<input type="checkbox" checked disabled> Spam filtering
						</label>
						<label class="checkbox">
						<input type="checkbox" checked disabled> Advanced Threat Protection
						</label>
						<label class="checkbox">
						<input type="checkbox" checked disabled> Advanced Meeting Scheduling
						</label>
						<label class="checkbox">
						<input type="checkbox" checked disabled> Unlimited Data Storage
						</label>
						<label class="checkbox">
						<input type="checkbox" checked disabled> Single Sign On for up to 2007 applications
						</label>
						<label class="checkbox">
						<input type="checkbox" checked disabled> Email and Document Rights Management
						</label>
						<label class="checkbox">
						<input type="checkbox" checked disabled> Mobile Device and Application Management
						</label>
						<label class="checkbox">
						<input type="checkbox" checked disabled> Self Service Password Reset
						</label>
						<label class="checkbox">
						<input type="checkbox" checked disabled> Internal Social Media Platform
						</label>
						<label class="checkbox">
						<input type="checkbox" checked disabled> Instant Messaging
						</label>
						<label class="checkbox">
						<input type="checkbox" checked disabled> Online Meetings
						</label>
						<label class="checkbox">
						<input type="checkbox" checked disabled> Email Migration
						</label>
						<label class="checkbox">
						<input type="checkbox" checked disabled> Account and Email Setup and Configuration
						</label>
						<label class="checkbox">
						<input type="checkbox" checked disabled> Unlimited Training & Support
						</label>
						<label class="checkbox">
						<input type="checkbox" checked disabled> Online Support Portal
						</label>
						<label class="checkbox">
						<input type="checkbox" checked disabled> Managed Services
						</label>
						<label class="checkbox">
						<input type="checkbox" checked disabled> Unlimited Cloud File Backup
						</label>
						<label class="checkbox">
						<input type="checkbox" checked disabled> Unlimited Server Recovery
						</label>
						<label class="checkbox">
						<input type="checkbox" checked disabled> Server Performance Optimization
						</label>
						<label class="checkbox">
						<input type="checkbox" checked disabled> Application Performance Optimization
						</label>



					  </div>
					</div>
				  </div>

				  <div class="accordion-group">
					<div class="accordion-heading">
					  <a class="accordion-toggle" data-toggle="collapse" data-parent="#package3" href="#Collaboration3">
						Collaboration
					  </a>
					</div>
					<div id="Collaboration3" class="accordion-body collapse">
					  <div class="accordion-inner">

						<label class="checkbox">
						<input type="checkbox" checked> Intranet Site Set Up
						</label>
						<label class="checkbox">
						<input type="checkbox" checked disabled> Department-specific Collaboration Sites
						</label>
						<label class="checkbox">
						<input type="checkbox" checked disabled> Real Time Co-Authoring of Documents
						</label>
						<label class="checkbox">
						<input type="checkbox" checked disabled> Companywide Document Governance
						</label>

					  </div>
					</div>
				  </div>

				  <div class="accordion-group">
					<div class="accordion-heading">
					  <a class="accordion-toggle" data-toggle="collapse" data-parent="#package3" href="#Automation3">
						Process Automation
					  </a>
					</div>
					<div id="Automation3" class="accordion-body collapse">
					  <div class="accordion-inner">

						<label class="checkbox">
						<input type="checkbox" > Human Resources Onboarding
						</label>
						<label class="checkbox">
						<input type="checkbox" > Vendor Onboarding
						</label>
						<label class="checkbox">
						<input type="checkbox" > Customer Onboarding
						</label>
						<label class="checkbox">
						<input type="checkbox" > Sales Tax Automation
						</label>
						<label class="checkbox">
						<input type="checkbox" > Supply Chain Management
						</label>

					  </div>
					</div>
				  </div>
				  <div class="accordion-group">
					<div class="accordion-heading">
					  <a class="accordion-toggle" data-toggle="collapse" data-parent="#package3" href="#Financials3">
						Financials Management
					  </a>
					</div>
					<div id="Financials3" class="accordion-body collapse">
					  <div class="accordion-inner">

						<label class="checkbox">
						<input type="checkbox" checked disabled> Microsoft Dynamics ERP / Financial Management
						</label>
						<label class="checkbox">
						<input type="checkbox" checked disabled> GAAP compliance
						</label>
						<label class="checkbox">
						<input type="checkbox" checked disabled> Sarbanes-Oxley Act (SOX) compliance
						</label>
						<label class="checkbox">
						<input type="checkbox" checked disabled> System documentation development for SOX
						</label>
						<label class="checkbox">
						<input type="checkbox" checked disabled> Audit support through PBC assistance
						</label>
						<label class="checkbox">
						<input type="checkbox" checked disabled> Sub-ledger account schedule creation and support
						</label>
						<label class="checkbox">
						<input type="checkbox" checked disabled> Accounting and reconciliation support
						</label>
						<label class="checkbox">
						<input type="checkbox" checked disabled> Business analysis support through report creation
						</label>
						<label class="checkbox">
						<input type="checkbox" checked disabled> Business process automation support
						</label>
						<label class="checkbox">
						<input type="checkbox" checked disabled> Training materials preparation
						</label>
					  </div>
					</div>
				  </div>
				<div class="accordion-group">
					<div class="accordion-heading">
					  <a class="accordion-toggle" data-toggle="collapse" data-parent="#package3" href="#Reporting3">
						Reporting &amp; Analytics
					  </a>
					</div>
					<div id="Reporting3" class="accordion-body collapse">
					  <div class="accordion-inner">

						<label class="checkbox">
						<input type="checkbox" checked disabled> Executive Dashboards
						</label>
						<label class="checkbox">
						<input type="checkbox" checked> Operations Dashboards
						</label>
						<label class="checkbox">
						<input type="checkbox" checked> HR Dashboards
						</label>
						<label class="checkbox">
						<input type="checkbox" checked> Combined Reporting from ERP, CRM &amp; Other
						</label>
						<label class="checkbox">
						<input type="checkbox" > Warehouse Management System
						</label>
						<label class="checkbox">
						<input type="checkbox" > Time &amp; Expense Tracking
						</label>
					  </div>
					</div>
				  </div>

			  <div class="accordion-group">
					<div class="accordion-heading">
					  <a class="accordion-toggle" data-toggle="collapse" data-parent="#package3" href="#Sales3">
						Sales &amp; Marketing
					  </a>
					</div>
					<div id="Sales3" class="accordion-body collapse">
					  <div class="accordion-inner">

						<label class="checkbox">
						<input type="checkbox" checked> Customer Relationship Management (CRM)
						</label>
						<label class="checkbox">
						<input type="checkbox"> Revenue Generation Website
						</label>
						<label class="checkbox">
						<input type="checkbox"> Content Management System
						</label>
						<label class="checkbox">
						<input type="checkbox"> PCI Compliance
						</label>
						<label class="checkbox">
						<input type="checkbox"> Customer Portal
						</label>
						<label class="checkbox">
						<input type="checkbox"> Vendor Portal
						</label>
						<label class="checkbox">
						<input type="checkbox"> Proposal Management System
						</label>
						<label class="checkbox">
						<input type="checkbox"> Contract Management System
						</label>

					  </div>
					</div>
				  </div>

				</div>
			<a class="btn-danger btn btn-large btn-block" href="#sendMessage" data-target="#sendMessage" data-toggle="modal"></i> Request a Quote</a>

		</div>



	</div><!-- row-fluid -->


<div class="span8 offset2">
	<div class="pf-content">

<?php
} elseif ($style == 'table') {
		?>
	</div><!-- break pf content -->
</div><!-- break span8-->

<div class="span10 offset1">


	<div class="row-fluid">
	<h2><?php echo $headline; ?></h2>


		<table id="table-packages" class="table table-bordered table-fixed table-hover">
			<thead>
						<tr>
						  <th ></th>
						  <th><span class="text-center label" style="width:150px;"><h5>Office 365<br/>Exchange Online</h5></span></th>
						  <th><span class="text-center label label-inverse" style="width:150px;"><h5>Office 365<br/>Business Premium</h5></span></th>
						  <th><span class="text-center label label-success" style="width:150px;"><h5>Rand Group<br/>Business Success</h5></span></th>
						</tr>
		  </thead>
			<tbody>
				<tr class="info">
					<td colspan="5"><h4>Email &amp; Infrastructure</h4></td>
				</tr>
				<tr>
					<td>Unlimited Email</td>
					<td><input type="checkbox" checked disabled></td>
					<td><input type="checkbox" checked disabled></td>
					<td><input type="checkbox" checked disabled></td>
				</tr>
				<tr>
					<td>Email Migration</td>
					<td><input type="checkbox" checked disabled></td>
					<td><input type="checkbox" checked disabled></td>
					<td><input type="checkbox" checked disabled></td>
				</tr>
				<tr>
					<td>Setup and Configuration</td>
					<td><input type="checkbox" checked disabled></td>
					<td><input type="checkbox" checked disabled></td>
					<td><input type="checkbox" checked disabled></td>
				</tr>
				<tr>
					<td>Unlimited Cloud Storage</td>
					<td><input type="checkbox" checked disabled></td>
					<td><input type="checkbox" checked disabled></td>
					<td><input type="checkbox" checked disabled></td>
				</tr>
				<tr>
					<td>Best In Class Microsoft Technology</td>
					<td><input type="checkbox" checked disabled></td>
					<td><input type="checkbox" checked disabled></td>
					<td><input type="checkbox" checked disabled></td>
				</tr>
				<tr>
					<td>Self Service Password Reset</td>
					<td><input type="checkbox" checked disabled></td>
					<td><input type="checkbox" checked disabled></td>
					<td><input type="checkbox" checked disabled></td>
				</tr>
				<tr>
					<td>Anti-Virus</td>
					<td><input type="checkbox" checked disabled></td>
					<td><input type="checkbox" checked disabled></td>
					<td><input type="checkbox" checked disabled></td>
				</tr>
				<tr>
					<td>Anti-Malware</td>
					<td><input type="checkbox" checked disabled></td>
					<td><input type="checkbox" checked disabled></td>
					<td><input type="checkbox" checked disabled></td>
				</tr>
				<tr>
					<td>Spam filtering</td>
					<td><input type="checkbox" checked disabled></td>
					<td><input type="checkbox" checked disabled></td>
					<td><input type="checkbox" checked disabled></td>
				</tr>
				<tr>
					<td>Advanced Threat Protection</td>
					<td><input type="checkbox" checked disabled></td>
					<td><input type="checkbox" checked disabled></td>
					<td><input type="checkbox" checked disabled></td>
				</tr>
				<tr>
					<td>Advanced Meeting Scheduling</td>
					<td><input type="checkbox" checked disabled></td>
					<td><input type="checkbox" checked disabled></td>
					<td><input type="checkbox" checked disabled></td>
				</tr>

				<tr>
					<td>Email and Document Rights Management</td>
					<td><input type="checkbox" checked disabled></td>
					<td><input type="checkbox" checked disabled></td>
					<td><input type="checkbox" checked disabled></td>
				</tr>
				<tr>
					<td>Mobile Device and Application Management</td>
					<td><input type="checkbox" checked disabled></td>
					<td><input type="checkbox" checked disabled></td>
					<td><input type="checkbox" checked disabled></td>
				</tr>
				<tr>
					<td>Internal Social Media Platform</td>
					<td><input type="checkbox" disabled></td>
					<td><input type="checkbox" checked disabled></td>
					<td><input type="checkbox" checked disabled></td>
				</tr>
				<tr>
					<td>Instant Messaging</td>
					<td><input type="checkbox" disabled></td>
					<td><input type="checkbox" checked disabled></td>
					<td><input type="checkbox" checked disabled></td>
				</tr>
				<tr>
					<td>Online Meetings</td>
					<td><input type="checkbox" disabled></td>
					<td><input type="checkbox" checked disabled></td>
					<td><input type="checkbox" checked disabled></td>
				</tr>
				<tr>
					<td>Single Sign On for up to 2007 applications</td>
					<td><input type="checkbox" disabled></td>
					<td><input type="checkbox" checked disabled></td>
					<td><input type="checkbox" checked disabled></td>
				</tr>
				<tr>
					<td>Unlimited Server Backup to Cloud</td>
					<td><input type="checkbox" disabled></td>
					<td><input type="checkbox" disabled></td>
					<td><input type="checkbox" checked disabled></td>
				</tr>
				<tr>
					<td>Unlimited Disaster Recovery</td>
					<td><input type="checkbox" disabled></td>
					<td><input type="checkbox" disabled></td>
					<td><input type="checkbox" checked disabled></td>
				</tr>
				<tr>
					<td>Server Performance Optimization</td>
					<td><input type="checkbox" disabled></td>
					<td><input type="checkbox" disabled></td>
					<td><input type="checkbox" checked disabled></td>
				</tr>
				<tr>
					<td>Application Performance Optimization</td>
					<td><input type="checkbox" disabled></td>
					<td><input type="checkbox" disabled></td>
					<td><input type="checkbox" checked disabled></td>
				</tr>
				<tr>
					<td>Unlimited Training & Support</td>
					<td><input type="checkbox" disabled></td>
					<td><input type="checkbox" disabled></td>
					<td><input type="checkbox" checked disabled></td>
				</tr>
				<tr>
					<td>Online Support Portal</td>
					<td><input type="checkbox" disabled></td>
					<td><input type="checkbox" disabled></td>
					<td><input type="checkbox" checked disabled></td>
				</tr>
				<tr>
					<td>Managed Services</td>
					<td><input type="checkbox" disabled></td>
					<td><input type="checkbox" disabled></td>
					<td><input type="checkbox" checked disabled></td>
				</tr>
				<tr class="info">
					<td colspan="5"><h4>Productivity Applications</h4></td>
				</tr>
				<tr>
					<td>Web version of Outlook, Word, Excel, and PowerPoint (desktop version of apps not included)</td>
					<td><input type="checkbox" checked disabled></td>
					<td><input type="checkbox" checked disabled></td>
					<td><input type="checkbox" checked disabled></td>
				</tr>
				<tr>
					<td>Desktop version of Office 2016: Outlook, Word, Excel, and PowerPoint</td>
					<td><input type="checkbox" disabled></td>
					<td><input type="checkbox" checked disabled></td>
					<td><input type="checkbox" checked disabled></td>
				</tr>

				<tr class="info">
					<td colspan="5"><h4>Collaboration</h4></td>
				</tr>
				<tr>
					<td>Best In Class Intranet Software</td>
					<td><input type="checkbox" disabled></td>
					<td><input type="checkbox" checked disabled></td>
					<td><input type="checkbox" checked disabled></td>
				</tr>
				<tr>
					<td>Intranet Site Set Up</td>
					<td><input type="checkbox" disabled></td>
					<td><input type="checkbox" ></td>
					<td><input type="checkbox" checked disabled></td>
				</tr>
				<tr>
					<td>Department-specific Collaboration Sites</td>
					<td><input type="checkbox" disabled></td>
					<td><input type="checkbox" checked disabled></td>
					<td><input type="checkbox" checked disabled></td>
				</tr>
				<tr>
					<td>Real Time Co-Authoring of Documents</td>
					<td><input type="checkbox" disabled></td>
					<td><input type="checkbox" checked disabled></td>
					<td><input type="checkbox" checked disabled></td>
				</tr>
				<tr>
					<td>Company-wide Document Governance</td>
					<td><input type="checkbox" disabled></td>
					<td><input type="checkbox" ></td>
					<td><input type="checkbox" checked disabled></td>
				</tr>
				<tr>
					<td></td>
					<td colspan="4"><a class="btn-primary btn btn-large btn-block" href="#sendMessage" data-target="#sendMessage" data-toggle="modal"></i> Request a Quote</a></td>
				</tr>

			</tbody>


		</table>


	</div><!-- row-fluid -->

</div><!-- span10 -->
<div class="span8 offset2">
	<div class="pf-content">
<?php
}

	$output = ob_get_contents();
	ob_end_clean();
	return $output;

}
add_shortcode('packages', 'randgroupPackages');

?>