<div class="left-side-bar">
	<div class="brand-logo">
		<a href="index.php">
			<img src="../vendors/images/deskapp-logo-svg.png" width="150" alt="" class="dark-logo">
			<img src="../vendors/images/deskapp-logo-white-svg.png" width="150" alt="" class="light-logo">
		</a>
		<div class="close-sidebar" data-toggle="left-sidebar-close">
			<i class="ion-close-round"></i>
		</div>
	</div>
	<div class="menu-block customscroll">
		<div class="sidebar-menu">
			<ul id="accordion-menu">
				<li class="dropdown">
					<a href="index.php" class="dropdown-toggle no-arrow">
						<span class="micon dw dw-house-1"></span><span class="mtext">Dashboard</span>
					</a>
				</li>
				<!-- <li class="dropdown">
						<a href="signature.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house-1"></span><span class="mtext">Signature</span>
						</a>
					</li> -->
				<li class="dropdown">
					<a href="javascript:;" class="dropdown-toggle">
						<span class="micon dw dw-calendar"></span><span class="mtext">Manage NPD</span>
					</a>
					<ul class="submenu">
						<?php
							$query = mysqli_query($conn, "select * from tblemployees where emp_id = '$session_id'") or die(mysqli_error());
							$row = mysqli_fetch_array($query);
							$empDept = $row['Department'];
							if ($empDept == 'INFORMATION TECHNOLOGY') {   ?>
								<li><a href="opennpds.php">Open NPDs</a></li>
								<li><a href="inprocessnpds.php">In Process NPDs</a></li>
						<?php } elseif($empDept == 'MIS') { ?>
							<li><a href="opennpdsl2.php">Open NPDs</a></li>
							<li><a href="inprocessnpdsl2.php">In Process NPDs</a></li>
						<?php } elseif($empDept == 'PURCHASE') { ?>
							<li><a href="opennpdsl3.php">Open NPDs</a></li>
							<li><a href="inprocessnpdsl3.php">In Process NPDs</a></li>
						<?php } elseif($empDept == 'Production') { ?>
							<li><a href="opennpdsl4.php">Open NPDs</a></li>
							<li><a href="inprocessnpdsl4.php">In Process NPDs</a></li>	
						<?php } else { ?>
							<li><a href="#">No Access</a></li>
							<!-- <li><a href="inprocessnpdsl3.php">In Process NPDs</a></li> -->
						<?php } ?>
					</ul>
				</li>
				<!-- <li class="dropdown">
						<a href="chat.php?sender=9&receiver=11" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-chat3"></span><span class="mtext">Chat</span>
						</a>
					</li> -->
				<li>
					<div class="dropdown-divider"></div>
				</li>
				<li>
					<div class="sidebar-small-cap">Extra</div>
				</li>
			</ul>
		</div>
	</div>
</div>