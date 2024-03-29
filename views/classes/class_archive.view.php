<main>
	<!-- archive class start -->
	<section>
		<div class="container">
			<!-- Title -->
			<div class="row mb-4">
				<div class="col-lg-8 mx-auto text-center">
					<h3 class="fs-2 text-secondary" style="margin-top: -50px;">Archive Classroom</h3>
					<p>Choose your classroom archive to restore! </p>
				</div>
			</div>
			<!-- Tabs content START -->
			<div class="tab-content" id="course-pills-tabContent">
				<!-- Content START -->
				<div class="tab-pane fade show active" id="course-pills-tabs-1" role="tabpanel" aria-labelledby="course-pills-tab-1">
					<div class="row g-4">
						<!-- Card item START -->
						<?php
						if (count($classNoun) > 0) {
							foreach ($classNoun as $class) {
								if ($class['archive'] == 1) { ?>
									<div class="col-sm-6 col-lg-4 col-xl-3">
										<div class=" card_class card shadow h-100">
											<!-- Image -->
											<img src="../../assets/images/classes/<?= $class['image'] ?>" class="card-img-top" alt="course image" style='width:350px; height:200px; object-fit: cover;'>
											<!-- Card body -->
											<div class="nav-item dropdown d-flex justify-content-end">
												<a class="nav-link " href="#" id="pagesMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
											</div>
											<div class="card-body pb-0">
												<!-- Title -->
												<h5 class="card-title fw-normal"><a class="text-decoration-none" href="/stream?id=<?= $class['id'] ?>"><?= $class['title']; ?></a></h5>
												<p class="mb-2 text-truncate-2"><?= $class['section']; ?></p>
											</div>
											<!-- Card footer -->
											<div class="card-footer pt-3 pb-3">
												<?php if ($_SESSION['user']['role'] == "teacher") { ?>
													<div class="d-flex">
														<a href="../../controllers/classes/archive.delete.controller.php?id=<?= $class['id'] ?>" onclick="if (!confirm('Are you sure to delete it?')) { return false; }" class="btn mx-1 h6 fw-light mb-0 btn-outline-danger"><i class="fas fa-trash text-danegr "></i></a>
														<a href="../../controllers/classes/restore.controller.php?id=<?= $class['id'] ?>" onclick="if (!confirm('Are you sure to archive it?')) { return false; }" class="btn mx-1 h6 fw-light mb-0 btn-outline-secondary"><i class="bi bi-bootstrap-reboot"></i></a>
													</div>

												<?php
												} else { ?>
													<a href="../../controllers/classes/archive.delete.controller.php?id=<?= $class['id'] ?>" onclick="if (!confirm('Are you sure to delete it?')) { return false; }" class="btn mx-1 h6 fw-light mb-0 btn-outline-danger"><i class="fas fa-ban text-danegr "></i></a>
												<?php } ?>
											</div>
										</div>
									</div>
							<?php }
							}
						} else { ?>
							<div class="tab-pane fade show active d-flex justify-content-center">
								<img src="../../assets/images/about/25.png" alt="" width="300px">
							</div>
						<?php } ?>
						<!-- Card item END -->
					</div>
				</div>

				<!-- Content END -->
			</div>
	</section>
	<!-- =================class archive end========= -->

</main>