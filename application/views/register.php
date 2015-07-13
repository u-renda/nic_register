<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="NEZindaCLUB">
    <link rel="shortcut icon" href="<?php echo base_url('assets/images'); ?>/nic-favicon.ico">
    <title>NEZindaCLUB - Register</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/css'); ?>/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/css'); ?>/uniform.default.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/css'); ?>/components.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/css'); ?>/register.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
		<u><h2>Register Member</h2></u>
        <form role="form" action="register_form" method="post">
			<div class="form-group">
				<label>Tipe ID</label>
				<?php echo form_dropdown('idcard_type', $idcard_lists, '', 'class="form-control"'); ?>
			</div>
			<div class="form-group">
				<label>No ID (KTP/SIM/Passport/Kartu Pelajar)</label>
				<input type="text" class="form-control" placeholder="123456789" name="idcard_no">
				<p class="help-block">* Tanpa spasi.</p>
			</div>
			<div class="form-group">
				<label>Nama Lengkap</label>
				<input type="text" class="form-control" placeholder="Agnez Mo" name="fullname">
			</div>
			<div class="form-group">
				<label>Jenis Kelamin</label>
				<div class="radio-list">
					<label class="radio-inline">
					<div class="radio" id="uniform-optionsRadios4"><span class="checked"><input type="radio" name="gender" id="optionsRadios4" value="M" checked=""></span></div> Laki-laki </label>
					<label class="radio-inline">
					<div class="radio" id="uniform-optionsRadios5"><span><input type="radio" name="gender" id="optionsRadios5" value="F"></span></div> Perempuan </label>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="col-md-12">Tempat, Tanggal Lahir</label>
					<div class="col-md-6">
						<input type="text" class="form-control" placeholder="Jakarta" name="birth_place">
					</div>
					<div class="col-md-6">
						<input type="text" class="form-control" placeholder="DD-MM-YYYY" name="birth_date">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label>No Handphone</label>
				<input type="text" class="form-control" placeholder="08xxxxxxxx" name="phone_no">
				<p class="help-block">* Tanpa spasi.</p>
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" class="form-control" placeholder="nezindaclub.official@gmail.com" name="email">
			</div>
			<div class="form-group">
				<label>Status</label>
				<?php echo form_dropdown('marital_status', $marital_lists, '', 'class="form-control"'); ?>
			</div>
			<div class="form-group">
				<label>Alamat Sesuai ID</label>
				<textarea class="form-control" rows="3" name="idcard_address"></textarea>
			</div>
			<div class="form-group">
				<label>Alamat Pengiriman</label>
				<textarea class="form-control" rows="3" name="ship_address"></textarea>
			</div>
			<div class="form-group">
				<label>Kota</label>
				<?php echo form_dropdown('kota', $kota_lists, '', 'class="form-control"'); ?>
			</div>
			<div class="form-group">
				<label>Kode Pos</label>
				<input type="text" class="form-control" placeholder="12345">
			</div>
			<div class="form-group">
				<label>Agama</label>
				<input type="text" class="form-control" placeholder="Islam/Kristen/Katolik/Budha/Hindu/Lainnya(sebutkan)" name="religion">
			</div>
			<div class="form-group">
				<label>Pekerjaan</label>
				<input type="text" class="form-control" placeholder="Pelajar/Mahasiswa/PNS/Lainnya(sebutkan)" name="occupation">
			</div>
			<div class="form-group">
				<label>T-shirt</label>
				<div class="radio-list">
					<label class="radio-inline">
					<div class="radio" id="uniform-optionsRadios4"><span class="checked"><input type="radio" name="shirt_size" id="optionsRadios4" value="M" checked=""></span></div> M </label>
					<label class="radio-inline">
					<div class="radio" id="uniform-optionsRadios5"><span><input type="radio" name="shirt_size" id="optionsRadios5" value="XL"></span></div> XL </label>
				</div>
			</div>
			<div class="form-group">
				<label>Foto ID</label>
				<input type="file" id="exampleInputFile" name="idscan_path">
			</div>
			<div class="form-group">
				<label>Foto Diri (close up)</label>
				<input type="file" id="exampleInputFile" name="photo_path">
			</div>
			<input type="submit" class="btn btn-primary" name="submit" value="Submit">
        </form>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url('assets/js'); ?>/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url('assets/js'); ?>/bootstrap.min.js"></script>
  </body>
</html>
