<?php $pageName = "Contact"; ?>
<?php include ('head.php'); ?>
<?php include('form-process.php'); ?>

<div class="container">
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="well" style="margin-top: 10%;">
				<h3>Contactformulier</h3>
				<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
				<form role="form" id="contactForm" data-toggle="validator" class="shake">
					<div class="row">
						<div class="form-group col-sm-6">
							<label for="name" class="h4">Naam</label>
							<input type="text" class="form-control" id="name" placeholder="Jane Doe" required>
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group col-sm-8">
							<label for="email" class="h4">E-mail</label>
							<input type="email" class="form-control" id="email" placeholder="voorbeeld@domein.nl" required>
							<div class="help-block with-errors"></div>
						</div>
					</div>
					<div class="form-group">
						<label for="message" class="h4 ">Bericht of Vraag</label>
						<textarea id="message" class="form-control" rows="5" placeholder="Vul hier een bericht of vraag in." required></textarea>
						<div class="help-block with-errors"></div>
					</div>
					<button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right ">Verstuur</button>
					<div id="msgSubmit" class="h3 text-center hidden"></div>
					<div class="clearfix"></div>
				</form>
			</div>
		</div>
	</div>

<?php include ('footer.php'); ?>