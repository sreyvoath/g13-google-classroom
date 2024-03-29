<main>
	<section class="pt-0">
		<!-- Main banner background image -->
		<div class="container-fluid px-0">
			<div class="bg-blue h-100px h-md-200px rounded-0" style="background:url(assets/images/pattern/04.png) no-repeat center center; background-size:cover;">
			</div>
		</div>
		<div class="container mt-n4">
			<div class="row">
				<!-- Profile banner START -->
				<div class="col-12">
					<div class="card bg-transparent card-body p-0">
						<div class="row d-flex justify-content-between">
							<!-- Avatar -->
							<div class="col-auto mt-4 mt-md-0">
								<div class="avatar avatar-xxl mt-n3">
									<img class="avatar-img rounded-circle border border-white border-3 shadow" src="../../assets/images/profiles/<?= $_SESSION['user']['image'] ?>" alt="">
								</div>
							</div>
							<!-- Profile info -->
							<div class="col d-md-flex justify-content-between align-items-center mt-4">
								<div>
									<h1 class="my-1 fs-4"><?= $_SESSION['user']['name'] ?><i class="bi bi-patch-check-fill text-info small"></i></h1>
									<ul class="list-inline mb-0">
										<li class="list-inline-item h6 fw-light me-3 mb-1 mb-sm-0"><i class="fas fa-star text-warning me-2"></i>4.5/5.0</li>
										<li class="list-inline-item h6 fw-light me-3 mb-1 mb-sm-0"><i class="fas fa-user-graduate text-orange me-2"></i>75+ Enrolled Students</li>
										<li class="list-inline-item h6 fw-light me-3 mb-1 mb-sm-0"><i class="fas fa-book text-purple me-2"></i>4 Modules</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- Profile banner END -->
				</div>
			</div>
		</div>
	</section>
	<div class="container">
		<div class="row mb-4 d-flex align-items-center justify-content-center">
			<!-- Search bar -->
			<script src="../../js/main.js"></script>
			<div class="col-sm-6 col-xl-4">
				<form class="bg-body shadow rounded p-2">
					<div class="input-group input-borderless">
						<input class="form-control me-1" id="search" type="search" placeholder="Search instructor">
						<button type="button" class="btn btn-primary mb-0 rounded"><i class="fas fa-search"></i></button>
					</div>
				</form>
			</div>
			<!-- Select option -->
			<?php
			require_once "models/class.model.php";
			require_once "database/database.php";
			$classes = getClasses($_SESSION['user']['id']);
			?>
			<div class="col-sm-6 col-xl-3 mt-3 mt-lg-0">
				<form class="bg-body shadow rounded p-2 input-borderless">
					<select class="form-select form-select-sm js-choice" aria-label=".form-select-sm" id="selectedClass" onchange="filterData()">
						<option disabled selected>All Classes</option>
						<?php foreach ($classes as $class) : ?>
							<?php if ($class['archive'] == 0) : ?>
								<option value="<?= $class['title'] ?>"><?= $class['title'] ?></option>
							<?php endif ?>
						<?php endforeach; ?>
					</select>
				</form>
			</div>

			<!-- Button -->
			<div class="col-sm-6 col-xl-2 mt-3 mt-xl-0 d-grid">
				<a href="/teacher" class="btn btn-lg btn-primary mb-0">Filter Results</a>
			</div>
		</div>
	</div>
	<section class="pt-0">
		<div class="container">
			<div class="row">
				<!-- Right sidebar START -->
				<div class="col-xl-3">
					<!-- Responsive offcanvas body START -->
					<nav class="navbar navbar-light navbar-expand-xl mx-0">
						<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
							<!-- Offcanvas header -->
							<div class="offcanvas-header bg-light">
								<h5 class="offcanvas-title" id="offcanvasNavbarLabel">My profile</h5>
								<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
							</div>
							<!-- Offcanvas body -->
							<div class="offcanvas-body p-3 p-xl-0">
								<div class="bg-dark border rounded-3 pb-0 p-3 w-100">
									<!-- Dashboard menu -->
									<div class="list-group list-group-dark list-group-borderless">
										<a class="list-group-item <?= urlIs("/teacher") ? "active" : "" ?> " href="/teacher"><i class="bi bi-basket fa-fw me-2"></i>My Classroom</a>
										<a class="list-group-item " href="#"><i class="bi bi-people fa-fw me-2"></i>Students</a>
										<a class="list-group-item " href="#"><i class="bi bi-star fa-fw me-2"></i>Reviews</a>
										<a class="list-group-item text-danger bg-danger-soft-hover" href="/user-signout"><i class="fas fa-sign-out-alt fa-fw me-2"></i>Sign Out</a>
									</div>
								</div>
							</div>
						</div>
					</nav>
					<!-- Responsive offcanvas body END -->
				</div>
				<div class="col-xl-9">
					<!-- Card START -->
					<div class="card border rounded-3">
						<!-- Card header START -->
						<div class="card-header border-bottom">
							<h3 class="mb-0">My Classroom List</h3>
						</div>
						<!-- Table body START -->
						<div class="card-body">
							<table class="table">
								<!-- PHP loop for classes START -->
								<?php foreach ($classes as $class) : ?>
									<?php if ($class['archive'] == 0) : ?>
										<tbody class="tbodySearch" id="tbodySearch">
											<tr>
												<!-- Course item -->
												<td>
													<div class="  card_class d-flex align-items-center justify-content-between">
														<!-- Content -->
														<div class="d-flex align-items-center">
															<!-- Image -->
															<div class="w-100px">
																<img src="../../assets/images/classes/<?= $class['image'] ?>" class="rounded" alt="">
															</div>
															<div class="mb-0 ms-2">
																<!-- Title -->
																<h6><a href="/stream?id=<?=$class['id'] ?>"><?= $class['title'] ?></a></h6>
																<!-- Info -->
																<div class="d-sm-flex">
																	<p class="h6 fw-light mb-0 small me-3"><i class="fas fa-table text-orange me-2"></i>0 lectures</p>
																	<p class="h6 fw-light mb-0 small"><i class="fas fa-check-circle text-success me-2"></i>0 Completed</p>
																</div>
															</div>
														</div>
														<!-- Buttons -->
														<div class="d-flex">
															<a href="../../controllers/teachers/teacher_edit.controller.php?id=<?= $class['id'] ?>" class="btn mx-1 h6 fw-light mb-0 btn-outline-info text-white"><i class="bi bi-pen text-dark "></i></a>
															<a href="../../controllers/teachers/teacher_delete.controller.php?id=<?= $class['id'] ?>" onclick="if (!confirm('Are you sure to delete it?')) { return false; }" class="btn mx-1 h6 fw-light mb-0 btn-outline-danger"><i class="fas fa-trash text-dark"></i></a>
														</div>
													</div>


						</div>
						</td>
						</tr>
						</tbody>
					<?php endif ?>
				<?php endforeach; ?>
				<!-- PHP loop for classes END -->
				</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>