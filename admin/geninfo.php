<?php
// Initialize the session
session_start();
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['name']) || empty($_SESSION['name'])){
  header("location: login.php");
  exit;
} else {
	if(($_SESSION['name'][0]<>'Administrator') && ($_SESSION['name'][0]<>'Administrator (Elevated)')) {
		header("location: logout.php");
		exit;
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<?php 
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/includes.php");
	get_header();
?>		
</head>

<body>

    <div id="wrapper">

        <?php admin_nav(); ?>

        <div id="page-wrapper">

            <div class="container-fluid">
				<br/>
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
					   <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-terminal"></i>  <a href="index.php">Student Portal</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-university"></i> General Information
                            </li>
                        </ol>
						<!--<div class="alert alert-success" role="alert">
						  You are currently signed in as <a href=""><?php echo $_SESSION["name"][1]?></a>
						</div>-->
                    </div>
                </div>
                <!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-info">
							<div class="panel-heading" style="text-align: center;" id="exTab2">	
								<ul class="nav nav-pills nav-justified">
									<li class="active">
									<a  href="#1" data-toggle="tab"><i class="fa fa-fw fa-eye"></i> Mission and Vision</a>
									</li>
									<li><a href="#2" data-toggle="tab"><i class="fa fa-fw fa-university"></i> University Core Values</a>
									</li>
									<li><a href="#3" data-toggle="tab"><i class="fa fa-fw fa-dot-circle-o"></i> Goals and Objectives</a>
									</li>
								</ul>
							</div>

							<div class="panel-body tab-content ">
								<div class="tab-pane active" id="1">
									<p style="text-align: center;"><span style="color:#555555;"><span style="font-size:16px;"><strong>VISION</strong></span></span></p>
									<p style="text-align: center;"><span style="color:#555555;"><span style="font-size:16px;">A world-class university dedicated to the development of virtuous human resources and innovations for inclusive growth.</span></span></p>
									<hr/>
									<p style="text-align: center;"><span style="color:#555555;"><span style="font-size:16px;"><strong>MISSION</strong></span></span></p>
									<p style="text-align: center;"><span style="color:#555555;"><span style="font-size:16px;">To develop globally competitive professionals and industry-ready graduates via various modalities and generate new knowledge and technologies for the improvement of the quality of life.</span></span></p>
								</div>
								<div class="tab-pane" id="2">
									<ol style="text-align: justify;">
										<li><span style="color:#555555;"><span style="font-size:16px;">Excellence</span></span></li>
										<li><span style="color:#555555;"><span style="font-size:16px;">Integrity</span></span></li>
										<li><span style="color:#555555;"><span style="font-size:16px;">Service to God and Nation</span></span></li>
									</ol>
								</div>
								<div class="tab-pane" id="3">
									<ol style="text-align: justify;">
										<li><span style="color:#555555;"><span style="font-size:14px;">Offer a wide range of academic programs at the certificate, associate, baccalaureate, masters and doctorate levels;</span></span></li>
										<li><span style="color:#555555;"><span style="font-size:14px;">Maintain a broad range of research programs both in the basic and applied sciences, especially in the arts, agriculture, agribusiness, agroforestry, fisheries, teacher education, rural sociology, management, and technology which will generate knowledge and provide a basis for solutions to the development needs of the province and region;</span></span></li>
										<li><span style="color:#555555;"><span style="font-size:14px;">Provide off-campus instructional&nbsp; continuing education and extension services to meet the needs&nbsp; of residents of the province and the region within the context of the regional and national non-formal education; and</span></span></li>
										<li><span style="color:#555555;"><span style="font-size:14px;">Serve as the locus for the regional cooperative and development center for public and private colleges and universities in the Ilocos region.</span></span></li>
									</ol>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-info">
							<div class="panel-heading" style="text-align: center;" id="exTab2">	
								<ul class="nav nav-pills nav-justified">
									<li class="active">
									<a  href="#4" data-toggle="tab"><i class="fa fa-fw fa-eye"></i> Rights of Students</a>
									</li>
									<li><a href="#5" data-toggle="tab"><i class="fa fa-fw fa-university"></i> Duties and Responsibilities</a>
									</li>
									<li><a href="#6" data-toggle="tab"><i class="fa fa-fw fa-dot-circle-o"></i> Student Conduct</a>
									</li>
								</ul>
							</div>

							<div class="panel-body tab-content ">
								<div class="tab-pane active" id="4">
									<p style="text-align: center;"><span style="color:#555555;"><span style="font-size:16px;">Subject to limitations prescribed by law and the university policies and regulations, every pupil or student of the university shall enjoy the following rights:</span></span></p>
									<hr/>
									<ol style="text-align: justify;">
										<li>The right to receive quality and relevant education through competent instruction in accordance to national goals, educational objectives, and the standards of the university for his full development as human being.</li>
										<li>The right to guidance and counseling services to provide himself with appropriate opportunities to know himself, to make decisions, and to elect the field of work suited to his potentials.</li>
										<li>The right to free expression of beliefs and opinions as long as it does not disrupt the administrative, academic and discipline of the university.</li>
										<li>The right to publish a school organ or similar publication.</li>
										<li>The right to invite resource speakers during convocation, fora, symposia, and assemblies of similar nature.</li>
										<li>The right to participate in the formulation and development of policies affecting the university in the relation to the locality/region and nation through representation in the appropriate bodies of the university to be determined by the Board of Regents.</li>
										<li>The right to establish, join and participate in organizations, societies and clubs recognized by the university for the purposes not contrary the law.</li>
										<li>The right to be given reasonable protection within the university premises.</li>
										<li>The right to be informed of his rights as well as the policies, rules, and regulations affecting him.</li>
										<li>The right to participate in curricular and co-curricular activities.</li>
										<li>The right to be respected as a person with human dignity, to full physical, social, intellectual and moral development, to humane and healthful conditions of learning.</li>
										<li>The right to enjoy academic freedom.</li>
										<li>The right to redress of grievances against any wrong or injustice committed against him by other students or by any member of the academic community in accordance with the defined procedures and channels of authority therein.</li>
										<li>The right to subjected to disciplinary action only after requisites of due process have been fully complied with.</li>
										<li>The right to access to his university records, the confidentiality of which the university shall keep and maintain.</li>
										<li>The right to pursue and continue his course until the graduates except in cases of academic deficiency or violation of disciplinary regulations.</li>
										<li>The right to be given assistance on work opportunities through current and available information.</li>
										<li>The right to be expeditious issuance of official documents like certificates, diplomas, transcript of records, grades and transfer credential.</li>
										<li>The right to be free from involuntary contributions except those approved by their own organizations, clubs or societies.</li>
									</ol>
								</div>
								<div class="tab-pane" id="5">
									<p style="text-align: center;"><span style="color:#555555;"><span style="font-size:16px;">Every student shall:</span></span></p>
									<ol style="text-align: justify;">
										<li>Love God and his fellowmen as he loves himself.</li>
										<li>Strive to lead a virtuous and useful life.</li>
										<li>Observe the Code of Student Conduct promulgated by the university.</li>
										<li>Do his best to develop his potentials for service, specially by undergoing an education suited to his abilities so that he may become an asset to society.</li>
										<li>Respect the customs and traditions of our people, its duly constituted authorities, the laws of the land, and the rules and policies of the university.</li>
										<li>Participate actively in civic affairs and in the promotion of the general welfare and in the attainment of a just, orderly and compassionate society.</li>
										<li>Help in the exercise of individual and social rights, the strengthening of freedom, and enhancement of cooperation among communities and regions in the pursuit of national progress.</li>
										<li>Uphold the academic and moral integrity of the university by trying to achieve excellence and moral uprightness.</li>
										<li>Promote and preserve the peace and order in the university by observing the rules on discipline and harmonious relationship with fellow students and with the university personnel.</li>
										<li>Exercise his rights responsively in the knowledge that he is answerable to God for any violation of the general welfare and of the rights of the others.</li>
									</ol>
								</div>
								<div class="tab-pane" id="6">
									<p style="text-align: center;"><span style="color:#555555;"><span style="font-size:16px;">Students shall observe, at all times, the laws of the land and the rules and regulations of the university.</span></span></p>
									<p style="text-align: center;"><span style="color:#555555;"><span style="font-size:16px;">No disciplinary proceedings shall be instituted except for conduct prohibited by laws or by rules and regulations promulgated by the duly constituted authorities of the university.</span></span></p>
									<p style="text-align: center;"><span style="color:#555555;"><span style="font-size:16px;">When a student is accepted in any college or unit of the university, a binding contract is establish between him and MMSU whereby both agree to conform to the laws of the land and to the rules and regulations of the university. Upon his registration, the student assumes all his duties and responsibilities toward the country, the university, the college or unit where he belongs, the university personnel and his fellow students. </span></span></p>
									<hr/>
									<p style="text-align: center;"><span style="color:#555555;"><span style="font-size:16px;"><strong>SPECIFIC MISCONDUCT</strong></span></span></p>
									<p style="text-align: center;"><span style="color:#555555;"><span style="font-size:16px;">A student shall be subject to disciplinary action for committing any of the following offenses: </span></span></p>
									<p style="text-align: center;"><span style="color:#555555;"><span style="font-size:16px;"><strong>Major Offenses:</strong></span></span></p>
									<ol style="text-align: justify;">
										<li>Cheating in examinations and/or any act of dishonesty like forging and/or tampering academic or offcial records or documents.</li>
										<li>Carrying firearm or deadly weapon within the university premises, as long as this shall not apply to bladed items which are needed in connection with instruction, experiments and field work which have prior permit from the dean/director or instructor of the college/unit.</li>
										<li>Drinking liqour or drunken behavior within the university premises.</li>
										<li>Unauthorized or illegal possesion or use/distribution of prohibited drugs, chemicals or substances like marijuana, rugby, shabu, opiates, heroine, ecstasy or any of its form.</li>
										<li>Gambling within the university premises.</li>
										<li>Conducting illegal activities like hazing or harmful initiation rites.</li>
										<li>Creating and/or participating in disorder, tumultous, or other serious disturbances such as illegal assembly and demonstrations with violence within the uiversity premises.</li>
										<li>Intentionally making false statements, practicing or attempting to practice any deception, fraud or forgery in connection with his admission and graduation from the university.</li>
										<li>Bringing the name of the university in shame.</li>
										<li>Willful destruction or vandalism of university properties or properties belonging to personnel, students or visitors while in campus.</li>
										<li>Commission of a minor offense for the third time.</li>
										<li>Committing acts of lasciviousness. within the campus.</li>
										<li>Willfull and habitual disregard of the established policies and regulations.</li>
										<li>Inflicting physical injuries tp personnel, students, or visitors within the campus.</li>
										<li>Threatening another to inflict injury upon his personn honor, property, or any act amounting to a crime.</li>
										<li>Physical attack on a person by reason of his office. Stealing or any attempt thereof.</li>
										<li>Any other form of serious misconduct.</li>
									</ol>
									<p style="text-align: center;"><span style="color:#555555;"><span style="font-size:16px;"><strong>Sanctions for Major Offenses</strong></span></span></p>
									<p style="text-align: center;"><span style="color:#555555;"><span style="font-size:16px;">The gravity of the offense, the circumstances attending to its commission and the frequency of the act shall determine the nature of the disciplinary action or penalty to be imposed under this category in which case the sanctions below shall be applied: </span></span></p>
									<ol style="text-align: justify;">
										<li>Suspension for a maximum period not exceeding 20 percent of the prescribed school days.</li>
										<li>Probation with automatic suspension for the rest of the semester.</li>
										<li>Suspension for one semester.</li>
										<li>Suspension for two semesters.</li>
										<li>Dismissal or dropping from the university upon which the transfer credentials of the offender shall be issued immediately.</li>
										<li>Expulsion</li>
									</ol>
									<p style="text-align: center;"><span style="color:#555555;"><span style="font-size:16px;"><strong>Minor Offenses</strong></span></span></p>
									<p style="text-align: center;"><span style="color:#555555;"><span style="font-size:16px;">A student shall be subjected to disciplinary sction for committing any of the following minor offenses: </span></span></p>
									<ol style="text-align: justify;">
										<li>Open and public display of arrogance and disrespect to school authorities and other personnel. </li>
										<li>Disrupting one's class or that of others by shouting, whistling, running,  raucous unrestrained laughter and other similar disturbances. </li>
										<li>Causing and/or participating in verbal tussles and other minor disturbances within the university premises.</li>
										<li>Using other's ID card or lending one's ID card to another.</li>
										<li>Any other form of minor misconduct.</li>
									</ol>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

		<footer class="sticky-footer">
		  <div class="container">
			<div class="text-center">
			  <small>Copyright © CpE Student Portal <?php echo date('Y') ?></small>
			</div>
		  </div>
		</footer>
		<!-- /footer -->
		
		<script>
			$( document ).ready(function() {
					$('li', '#tabs').filter(function() {
						return !! $(this).find('a[href="geninfo.php"]').length;
					  })
					  .addClass('active');
			});
		</script>
	
		
    </div>
    <!-- /#wrapper -->
	
</body>

</html>
