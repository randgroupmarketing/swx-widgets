<?php

/*-----------------------------------------------------------------------------------*/
/*	 [packages] Shortcode
/*-----------------------------------------------------------------------------------*/

function randgroupPackages( $atts, $content = null ) {
	extract( shortcode_atts( array(
		"type"     => 'email',
		"style"    => 'table',
		"headline" => 'Select Your Business Email Package',
	), $atts ) );

	// buffer output
	ob_start();

	// not in use yet
	if ( ! function_exists( 'row' ) ) {
		function row( $label, $col1, $col2, $col3 ) {

			if ( isset( $col1 ) ) {
				$col1_properties = $col1;
			} else {
				$col1_properties = "checked disabled";
			}
			if ( isset( $col2 ) ) {
				$col2_properties = $col2;
			} else {
				$col2_properties = "checked disabled";
			}
			if ( isset( $col3 ) ) {
				$col3_properties = $col3;
			} else {
				$col3_properties = "checked disabled";
			}

			echo "<tr>";
			echo "<td>" . $label . "</td>";
			echo "<td><input type=\"checkbox\" " . $col1_properties . "></td>";
			echo "<td><input type=\"checkbox\" " . $col2_properties . "></td>";
			echo "<td><input type=\"checkbox\" " . $col3_properties . "></td>";
			echo "</tr>";

		}
	}

	if ( $size != 'short' ) {

	}

	// style
	if ( $style == 'grid' ) {

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
									<input type="checkbox" checked disabled> <a href="" data-toggle="tooltip"
									                                            title="Powered by Microsoft">Email</a>
								</label>
								<label class="checkbox">
									<input type="checkbox" checked disabled> <a href="" data-toggle="tooltip"
									                                            title="Fine print goes here">Cloud
										Storage</a>
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
									<input type="checkbox" checked disabled> Data Storage
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
									<input type="checkbox"> Training & Support
								</label>
								<label class="checkbox">
									<input type="checkbox"> Online Support Portal
								</label>
								<label class="checkbox">
									<input type="checkbox"> Managed Services
								</label>
								<label class="checkbox">
									<input type="checkbox"> Cloud File Backup
								</label>
								<label class="checkbox">
									<input type="checkbox"> Server Recovery
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

				<a class="btn-danger btn btn-large btn-block" href="#sendMessage" data-target="#sendMessage"
				   data-toggle="modal"></i> Request a Quote</a>

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
									<input type="checkbox" checked disabled> <a href="" data-toggle="tooltip"
									                                            title="Powered by Microsoft">Email</a>
								</label>
								<label class="checkbox">
									<input type="checkbox" checked disabled> <a href="" data-toggle="tooltip"
									                                            title="Fine print goes here">Cloud
										Storage</a>
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
									<input type="checkbox" checked disabled> Data Storage
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
									<input type="checkbox" checked> Training & Support
								</label>
								<label class="checkbox">
									<input type="checkbox" checked> Online Support Portal
								</label>
								<label class="checkbox">
									<input type="checkbox" checked> Managed Services
								</label>
								<label class="checkbox">
									<input type="checkbox" checked> Cloud File Backup
								</label>
								<label class="checkbox">
									<input type="checkbox" checked> Server Recovery
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
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#package2"
							   href="#Collaboration">
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
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#package2"
							   href="#Automation">
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

				<a class="btn-danger btn btn-large btn-block" href="#sendMessage" data-target="#sendMessage"
				   data-toggle="modal"></i> Request a Quote</a>


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
									<input type="checkbox" checked disabled> <a href="" data-toggle="tooltip"
									                                            title="Powered by Microsoft">Email</a>
								</label>
								<label class="checkbox">
									<input type="checkbox" checked disabled> <a href="" data-toggle="tooltip"
									                                            title="Fine print goes here">Cloud
										Storage</a>
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
									<input type="checkbox" checked disabled> Data Storage
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
									<input type="checkbox" checked disabled> Training & Support
								</label>
								<label class="checkbox">
									<input type="checkbox" checked disabled> Online Support Portal
								</label>
								<label class="checkbox">
									<input type="checkbox" checked disabled> Managed Services
								</label>
								<label class="checkbox">
									<input type="checkbox" checked disabled> Cloud File Backup
								</label>
								<label class="checkbox">
									<input type="checkbox" checked disabled> Server Recovery
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
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#package3"
							   href="#Collaboration3">
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
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#package3"
							   href="#Automation3">
								Process Automation
							</a>
						</div>
						<div id="Automation3" class="accordion-body collapse">
							<div class="accordion-inner">

								<label class="checkbox">
									<input type="checkbox"> Human Resources Onboarding
								</label>
								<label class="checkbox">
									<input type="checkbox"> Vendor Onboarding
								</label>
								<label class="checkbox">
									<input type="checkbox"> Customer Onboarding
								</label>
								<label class="checkbox">
									<input type="checkbox"> Sales Tax Automation
								</label>
								<label class="checkbox">
									<input type="checkbox"> Supply Chain Management
								</label>

							</div>
						</div>
					</div>
					<div class="accordion-group">
						<div class="accordion-heading">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#package3"
							   href="#Financials3">
								Financials Management
							</a>
						</div>
						<div id="Financials3" class="accordion-body collapse">
							<div class="accordion-inner">

								<label class="checkbox">
									<input type="checkbox" checked disabled> Microsoft Dynamics ERP / Financial
									Management
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
									<input type="checkbox" checked disabled> Sub-ledger account schedule creation and
									support
								</label>
								<label class="checkbox">
									<input type="checkbox" checked disabled> Accounting and reconciliation support
								</label>
								<label class="checkbox">
									<input type="checkbox" checked disabled> Business analysis support through report
									creation
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
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#package3"
							   href="#Reporting3">
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
									<input type="checkbox"> Warehouse Management System
								</label>
								<label class="checkbox">
									<input type="checkbox"> Time &amp; Expense Tracking
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
				<a class="btn-danger btn btn-large btn-block" href="#sendMessage" data-target="#sendMessage"
				   data-toggle="modal"></i> Request a Quote</a>

			</div>


		</div><!-- row-fluid -->


		<div class="span8 offset2">
		<div class="pf-content">

		<?php
	} elseif ( $style == 'table' ) {
		?>
		</div><!-- break pf content -->
		</div><!-- break span8-->

		<div class="span10 offset1">


			<div class="row-fluid">
				<h2><?php echo $headline; ?></h2>


				<table id="table-packages" class="table table-bordered table-fixed table-hover">
					<thead>
					<tr>
						<th style="width:444px;background-color:#FFF"></th>
						<th style="background-color:#FFF"><span class="text-center label" style="width:150px;"><h5>Office 365<br/>Exchange Online</h5></span>
						</th>
						<th style="background-color:#FFF"><span class="text-center label label-inverse"
						                                        style="width:150px;"><h5>Office 365<br/>E3</h5></span>
						</th>
						<th style="background-color:#FFF"><span class="text-center label label-success"
						                                        style="width:150px;"><h5>Rand Group<br/>Business Success</h5></span>
						</th>
					</tr>
					</thead>
					<tbody>
					<tr class="info">
						<td colspan="5"><h4>Email</h4></td>
					</tr>
					<?php

					// example
					// row('Email','disabled','','checked');
					//row('Email','disabled','','checked');

					?>
					<tr>
						<td>Business class email, calendar, and contacts with a 50 GB inbox per user</td>
						<td><input type="checkbox" checked disabled></td>
						<td><input type="checkbox" checked disabled></td>
						<td><input type="checkbox" checked disabled></td>
					</tr>
					<tr>
						<td>Shared calendars & contacts</td>
						<td><input type="checkbox" checked disabled></td>
						<td><input type="checkbox" checked disabled></td>
						<td><input type="checkbox" checked disabled></td>
					</tr>
					<tr>
						<td>Advanced email with archiving and legal hold</td>
						<td><input type="checkbox" checked disabled></td>
						<td><input type="checkbox" checked disabled></td>
						<td><input type="checkbox" checked disabled></td>
					</tr>
					<tr>
						<td>Rights management, data loss prevention, and encryption</td>
						<td><input type="checkbox" checked disabled></td>
						<td><input type="checkbox" checked disabled></td>
						<td><input type="checkbox" checked disabled></td>
					</tr>
					<tr>
						<td>email storage for in-place archive</td>
						<td><input type="checkbox" checked disabled></td>
						<td><input type="checkbox" checked disabled></td>
						<td><input type="checkbox" checked disabled></td>
					</tr>
					<tr>
						<td>Compliance solutions to support archiving, auditing and eDiscovery, mailbox and internal
							site search and legal hold
						</td>
						<td><input type="checkbox" disabled></td>
						<td><input type="checkbox" checked disabled></td>
						<td><input type="checkbox" checked disabled></td>
					</tr>
					<tr>
						<td>Unified eDiscovery center</td>
						<td><input type="checkbox" disabled></td>
						<td><input type="checkbox" checked disabled></td>
						<td><input type="checkbox" checked disabled></td>
					</tr>
					<tr>
						<td>Advanced security for your data, that helps protect against unknown malware and viruses</td>
						<td><input type="checkbox" checked disabled></td>
						<td><input type="checkbox" checked disabled></td>
						<td><input type="checkbox" checked disabled></td>
					</tr>
					<tr class="info">
						<td colspan="5"><h4>Collaboration</h4></td>
					</tr>
					<tr>
						<td>File storage and sharing with 1 TB storage per user</td>
						<td><input type="checkbox" disabled></td>
						<td><input type="checkbox" checked disabled></td>
						<td><input type="checkbox" checked disabled></td>
					</tr>
					<tr>
						<td>Intranet site for your teams</td>
						<td><input type="checkbox" disabled></td>
						<td><input type="checkbox" checked disabled></td>
						<td><input type="checkbox" checked disabled></td>
					</tr>
					<tr>
						<td>Real time co-authoring of documents</td>
						<td><input type="checkbox" disabled></td>
						<td><input type="checkbox" checked disabled></td>
						<td><input type="checkbox" checked disabled></td>
					</tr>
					<tr>
						<td>online meetings, IM, and audio, HD video, and web conferencing</td>
						<td><input type="checkbox" disabled></td>
						<td><input type="checkbox" checked disabled></td>
						<td><input type="checkbox" checked disabled></td>
					</tr>
					<tr>
						<td>Corporate social network</td>
						<td><input type="checkbox" disabled></td>
						<td><input type="checkbox" checked disabled></td>
						<td><input type="checkbox" checked disabled></td>
					</tr>
					<tr>
						<td>Meeting broadcast on the Internet to up to 10,000 people</td>
						<td><input type="checkbox" disabled></td>
						<td><input type="checkbox" checked disabled></td>
						<td><input type="checkbox" checked disabled></td>
					</tr>
					<tr class="info">
						<td colspan="5"><h4>Infrastructure</h4></td>
					</tr>
					<tr>
						<td>Self service password reset</td>
						<td><input type="checkbox" disabled></td>
						<td><input type="checkbox" checked disabled></td>
						<td><input type="checkbox" checked disabled></td>
					</tr>
					<tr>
						<td>Corporate video portal</td>
						<td><input type="checkbox" disabled></td>
						<td><input type="checkbox" checked disabled></td>
						<td><input type="checkbox" checked disabled></td>
					</tr>
					<tr>
						<td>Enterprise management of apps with Group Policy, Telemetry, Shared Computer Activation</td>
						<td><input type="checkbox" disabled></td>
						<td><input type="checkbox" checked disabled></td>
						<td><input type="checkbox" checked disabled></td>
					</tr>
					<tr>
						<td>Information Protection including Rights Management and Data Loss Prevention for emails</td>
						<td><input type="checkbox" disabled></td>
						<td><input type="checkbox" checked disabled></td>
						<td><input type="checkbox" checked disabled></td>
					</tr>
					<tr>
						<td>Single Sign On for 2,000+ applications</td>
						<td><input type="checkbox" disabled></td>
						<td><input type="checkbox" checked disabled></td>
						<td><input type="checkbox" checked disabled></td>
					</tr>
					<tr>
						<td>Company-wide Document Governance</td>
						<td><input type="checkbox" disabled></td>
						<td><input type="checkbox" disabled></td>
						<td><input type="checkbox" checked disabled></td>
					</tr>
					<tr class="info">
						<td colspan="5"><h4>Productivity Applications</h4></td>
					</tr>
					<tr>
						<td>Fully installed Office applications on up to 5 PCs or Macs per user</td>
						<td><input type="checkbox" disabled></td>
						<td><input type="checkbox" checked disabled></td>
						<td><input type="checkbox" checked disabled></td>
					</tr>
					<tr>
						<td>Office on tablets and phones</td>
						<td><input type="checkbox" disabled></td>
						<td><input type="checkbox" checked disabled></td>
						<td><input type="checkbox" checked disabled></td>
					</tr>
					<tr>
						<td>Online versions of Office</td>
						<td><input type="checkbox" disabled></td>
						<td><input type="checkbox" checked disabled></td>
						<td><input type="checkbox" checked disabled></td>
					</tr>
					<tr class="info">
						<td colspan="5"><h4>Rand Group</h4></td>
					</tr>
					<tr>
						<td>Setup and Configuration</td>
						<td><input type="checkbox" checked disabled></td>
						<td><input type="checkbox" checked disabled></td>
						<td><input type="checkbox" checked disabled></td>
					</tr>
					<tr>
						<td>Server Backup to Cloud</td>
						<td><input type="checkbox" disabled></td>
						<td><input type="checkbox" disabled></td>
						<td><input type="checkbox" checked disabled></td>
					</tr>
					<tr>
						<td>Disaster Recovery</td>
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
						<td>Training & Support</td>
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
					<tr>
						<td>Intranet Site Set Up</td>
						<td><input type="checkbox" disabled></td>
						<td><input type="checkbox" disabled></td>
						<td><input type="checkbox" checked disabled></td>
					</tr>
					<tr>
						<td>Department-specific Collaboration Sites</td>
						<td><input type="checkbox" disabled></td>
						<td><input type="checkbox" disabled></td>
						<td><input type="checkbox" checked disabled></td>
					</tr>
					<tr>
						<td></td>
						<td colspan="4"><a class="btn-primary btn btn-large btn-block" href="#sendMessage"
						                   data-target="#sendMessage" data-toggle="modal"></i> Request a Quote</a></td>
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

add_shortcode( 'packages', 'randgroupPackages' );

?>